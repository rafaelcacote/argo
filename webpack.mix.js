const mix = require("laravel-mix");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

mix
	.js("resources/js/app.js", "public/js")
	.sass("resources/sass/app.scss", "public/css")
	.version();

mix.webpackConfig({
	plugins: [
		new BrowserSyncPlugin({
			proxy: "http://localhost:8000", // Altere para o URL do seu servidor Laravel
			files: [
				"app/**/*",
				"resources/views/**/*",
				"public/js/**/*",
				"public/css/**/*",
			],
			notify: false,
		}),
	],
});
