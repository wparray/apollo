#####

<img src="https://www.wparray.com/static/apollo.svg" width="150" height="auto"/>

# WordPress Plugin Boilerplate

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