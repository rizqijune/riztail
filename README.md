# PNYA - A Tailwind Bludit Theme

Made with **[Gulp with TailwindCSS v3 Starter Kit](https://github.com/lazymozek/gulp-with-tailwindcss)** with some modification and package update. Still working in progress.

## Features

* Easy configuration using `config.js`
* Live reload on file/assets changes using `browser-sync`
* SCSS support
* Alpine.JS (Hardcode)
* Dark Mode support
* Minification of styles and scripts on production build
* Minification of images on production build using `imagemin`
* Includes following tailwindcss plugins (can be disabled/enabled with `config.js`)
    * [@tailwindcss/forms](https://github.com/tailwindlabs/tailwindcss-forms)
    * [@tailwindcss/typography](https://tailwindcss.com/docs/typography-plugin)
    * [@tailwindcss/container-queries](https://github.com/tailwindlabs/tailwindcss-container-queries)

***

## Quick Start

You can get started by clicking on `Use this template` for creating new repo using this template or simply by cloning it.

* Build with Volta Node manager
* Node@21.5.0
* Yarn@4.0.2

You can use pnpm instead of yarn. npm is not recomended.

Install dev dependencies

```sh
yarn // or pnpm install
```

Start development server with live preview

```sh
yarn dev // or pnpm dev
```

Generate build files for production server

```sh
yarn prod or yarn build // or pnpm prod
```

All dev files are present in `src` folder. The build version can be found in `build` folder after running `yarn build` command.

## Configuration

All configurations are found in `config.js` file in the root directory. You can configure browser default port, enable/disable plugins by simply updating boolean values (Default is set to `true`) and many more.

```js
const config = {
  tailwindjs: "./tailwind.config.js",
  port: 9050, // default port
  // purgecss options
  purgecss: {
    content: ["src/**/*.{html,js,php}"],
    ...
  },
  // imagemin options for image optimizations
  imagemin: {
    png: [0.7, 0.7], // range between min (0) and max (1) as quality - 70% with current values for png images,
    jpeg: 70, // % of compression for jpg, jpeg images
  },
};

// tailwind plugins
const plugins = {
  typography: true, // set to false to disable
  forms: true,
  containerQueries: true,
};
...
```

## Todo

* [ ] Live Preview
* [ ] Auto copy build to `bl-theme`
* [ ] Remove comment in prod
* [ ] Make it more responsive
* [ ] Easy personalized with config
* [ ] All in one command
* [ ] Use API instead of manual inser php code

## Made with

* Based on **[Gulp with TailwindCSS v3 Starter Kit](https://github.com/lazymozek/gulp-with-tailwindcss)**
* Components from [Starter Dashboard Layout](https://github.com/Kamona-WD/starter-dashboard-layout)
* Bludit 3.15.0

## License

This project is open source and available under the [MIT License](https://github.com/lazymozek/gulp-with-tailwindcss/blob/main/LICENSE).
