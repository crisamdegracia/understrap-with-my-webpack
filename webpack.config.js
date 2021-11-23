const path = require('path');
const TerserPlugin = require("terser-webpack-plugin"); // Minify JS
const { CleanWebpackPlugin } = require('clean-webpack-plugin'); //During rebuilds, all webpack assets that are not used anymore will be removed automatically.
const MiniCssExtractPlugin = require("mini-css-extract-plugin"); // separates css from js - and ( kapalit ng style-loader na to inject css sa page? please confirm) 
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin"); // Minify Css
const LiveReloadPlugin = require('webpack-livereload-plugin'); // live reload. need pa lagyan ng script sa footer

module.exports = {
	entry: './src/index.js',
	output: {
		path: path.resolve(__dirname, 'dist'),
		filename: 'js/[name].bundle.js',
		clean: true,
		// publicPath: './',

	},
	devtool: 'inline-source-map',
	target: 'web',
	module: {
		rules: [
			{
				test: /\.s?css$/i,
				use: [
					MiniCssExtractPlugin.loader, // separate file to css
					'css-loader', // translates CSS into CommonJS modules
					// {
					// 	loader: 'postcss-loader', // Run post css actions
					// 	// options: {
					// 	// 	plugins: function () { // post css plugins, can be exported to postcss.config.js
					// 	// 		return [
					// 	// 			require('precss'),
					// 	// 			require('autoprefixer')
					// 	// 		];
					// 	// 	}
					// 	// }

					// },
					'postcss-loader',
					'sass-loader' // compiles Sass to CSS

				]
			},
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: 'babel-loader'
			},
			{
				test: /\.(png|svg|jpg|jpeg|gif)$/i,
				type: 'asset/resource',
			},
			{
				test: /\.(woff|woff2|eot|ttf|otf)$/i,
				type: 'asset/resource',
			}, // kahit wala to gumana e?
		],

	},
	optimization: {
		minimize: true,
		minimizer: [
			new TerserPlugin(), // Minify js
			new CssMinimizerPlugin()],  // minify css

	},
	plugins: [
		new MiniCssExtractPlugin({ filename: 'style/[name].bundle.css' }),  // separate css and js
		new CleanWebpackPlugin(), // remove unecesary css


		new LiveReloadPlugin({
			protocol: "http",
			hostname: "understraptest.local",
			appendScriptTag: true,
		}), // Live reload. need pa lagyan ng script sa footer
		require('autoprefixer')
	],



	// mode: 'development'
}

