<br>
<br>

<img src="https://www.wparray.com/static/apollo.svg" width="150" height="auto" alt="apollo"/>

# WordPress Plugin Boilerplate

![GitHub Release](https://img.shields.io/github/v/release/wparray/apollo?include_prereleases) ![GitHub License](https://img.shields.io/github/license/wparray/apollo) [![Codacy Badge](https://app.codacy.com/project/badge/Grade/fbcef8300f734965ab59b7ac93a28f8f)](https://app.codacy.com/gh/wparray/apollo/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade) ![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg) ![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/wparray/apollo) ![GitHub repo size](https://img.shields.io/github/repo-size/wparray/apollo)

Apollo is like a cheat code for speeding up your WordPress plugin projects. It's designed with OOP principles in mind, so your plugins will be easy to manage and expand. And it's packed with modern tools like Webpack, Tailwind, and BrowserSync to make your life even easier.

The whole point of Apollo is to be super flexible. Whether you're a PHP pro or you prefer working with JS frameworks like Vue or React, Apollo can handle it all.

But remember, it's not a one-size-fits-all solution where you can just copy and paste stuff. Think of Apollo as your starting point, giving you the boost you need to create top-notch WordPress plugins with less hassle.

## Getting Started

### 1. Install Dependencies

```bash
composer install
yarn install
```

### 2. Start Dev Environment

```bash
yarn dev
```

## Configuration & Defaults

You can modify the configurations by editing `config` in `.dev/webpack.mix.js`.

```javascript
mix.browserSync({
	proxy: "http://localhost:8888",
	open: "external",
	port: 3000,
	files: ["*.php", "src/**/**/*"],
});
```

More will be documented soon but in the meantime, feel free to explore the package since the PHP classes and functions are pretty self-explanatory.

Brought to you by [WPArray](https://www.wparray.com).
