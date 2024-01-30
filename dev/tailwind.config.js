const options = require("./config"); //options from config.js

const allPlugins = {
  typography: require("@tailwindcss/typography"),
  forms: require("@tailwindcss/forms"),
  containerQueries: require("@tailwindcss/container-queries"),
  colors: require("tailwindcss/colors")
};

const plugins = Object.keys(allPlugins)
  .filter((k) => options.plugins[k])
  .map((k) => {
    if (k in options.plugins && options.plugins[k]) {
      return allPlugins[k];
    }
  });

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  darkMode: ["class", '[data-theme="dark"]'],
  theme: {
    extend: {
      colors: {
        accent:{
          1: "hsl(var(--color-accent-1) / <alpha-value>)",
          2: "hsl(var(--color-accent-2) / <alpha-value>)",
        },
        primary: "hsl(var(--color-primary) / <alpha-value>)",
        secondary: "hsl(var(--color-secondary) / <alpha-value>)",
        htm: "hsl(var(--color-htm) / <alpha-value>)",
        pth: "hsl(var(--color-pth) / <alpha-value>)",
        danger: "hsl(var(--color-danger) / <alpha-value>)",
        warning:"hsl(var(--color-warning) / <alpha-value>)",
        good:"hsl(var(--color-good) / <alpha-value>)",
        info:"hsl(var(--color-info) / <alpha-value>)",
      },
      backgroundImage: (theme) => ({
        'gradientku': `linear-gradient(to bottom right, ${theme('colors.violet.400')}, ${theme('colors.violet.600')})`,
      }),
    },
  },
  plugins: plugins,
};
