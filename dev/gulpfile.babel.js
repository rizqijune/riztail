import { src, dest, watch, series, parallel } from "gulp";
import clean from "gulp-clean";
import options from "./config";
import browserSync from "browser-sync";
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);
import postcss from "gulp-postcss";
import concat from "gulp-concat";
import uglify from "gulp-terser";
import imagemin from "gulp-imagemin";
import mozjpeg from "imagemin-mozjpeg";
import pngquant from "imagemin-pngquant";
import purgecss from "gulp-purgecss";
import logSymbols from "log-symbols";
import filter from "gulp-filter";
import includePartials from "gulp-file-include";
const cssGsub = require("gulp-css-gsub");
const rename = require("gulp-rename");

const { create } = browserSync;
const server = create();

function livePreview(done) {
  server.init({
    proxy: "localhost"
  });
  done();
}

function previewReload(done) {
  console.log(`${logSymbols.info} Reloading Browser Preview.`);
  server.reload();
  done();
}

function devHTML() {
  return src(`${options.paths.src.base}/**/*.{html,php}`)
    .pipe(includePartials())
    .pipe(dest("../"));
}

function devStyles() {
  const tailwindcss = require("tailwindcss");
  const autoprefixer = require("autoprefixer");
  return src(`${options.paths.src.css}/**/*.scss`)
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss([tailwindcss(options.config.tailwindjs), autoprefixer()]))
    .pipe(concat({ path: "style.css" }))
    .pipe(dest("../css"));
}

function devScripts() {
  return src([
    `${options.paths.src.js}/libs/**/*.js`,
    `${options.paths.src.js}/external/*.js`,
    `${options.paths.src.js}/*.js`,
  ])
    .pipe(concat({ path: "scripts.js" }))
    .pipe(uglify())
    .pipe(dest("../js"));
}

function devSingleScript() {
  return src(`${options.paths.src.js}/single/*.js`).pipe(dest("../js"));
}

function devImages() {
  return src(`${options.paths.src.img}/**/*`).pipe(dest("../img"));
}

function devFonts() {
  return src(`${options.paths.src.fonts}/**/*`).pipe(dest("../fonts"));
}

function devThirdParty() {
  return src(`${options.paths.src.thirdParty}/**/*`).pipe(dest("../thirdParty"));
}

function devJSON() {
  return src([`${options.paths.src.base}/languages/*.json`]).pipe(dest("../languages"));
}

function devMeta() {
  return src(`${options.paths.src.base}/metadata.json`).pipe(dest("../"));
}

function watchFiles() {
  watch(
    `${options.paths.src.base}/**/*.{html,php}`,
    series(devHTML, devStyles, previewReload)
  );
  watch(
    [options.config.tailwindjs, `${options.paths.src.css}/**/*.scss`],
    series(devStyles, previewReload)
  );
  watch(`${options.paths.src.js}/**/*.js`, series(devScripts, previewReload));
  watch(`${options.paths.src.img}/**/*`, series(devImages, previewReload));
  watch(`${options.paths.src.fonts}/**/*`, series(devFonts, previewReload));
  watch(
    `${options.paths.src.thirdParty}/**/*`,
    series(devThirdParty, previewReload)
  );
  console.log(`${logSymbols.info} Watching for Changes..`);
}

function devClean() {
  console.log(`${logSymbols.info} Cleaning dist folder for a fresh start.`);

  const filterOptions = {
    restore: true,
    passthrough: false,
  };

  return src([
    "../**/*",
    "!../dev/**/*.json",
    "!../dev/**/*.php",
    "!../dev/**/*.css",
    "!../dev/**/*.js",
  ])
    .pipe(filter(["**/*", "!dev/**"], filterOptions))
    .pipe(clean({ force: true }))
    .pipe(filter.restore);
}

// function cssGsubTask() {
//   return src('../css/style.css')
//     .pipe(cssGsub({
//       jsIn: '../js/scripts.js',
//       jsOut: '../js/scripts.min.js'
          // prefix: "d"
//     }))
//     .pipe(rename('style.min.css'))
//     .pipe(dest('../css'));
// }

const devBuild = parallel(
  devHTML,
  devStyles,
  devScripts,
  devSingleScript,
  devImages,
  devFonts,
  devThirdParty,
  devJSON,
  devMeta,
  // cssGsubTask
);

const dev = series(devBuild, livePreview, watchFiles);

module.exports = {
  dev: dev
};