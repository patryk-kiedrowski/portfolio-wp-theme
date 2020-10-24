const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require('path');

require("@babel/polyfill");
require("isomorphic-fetch");

module.exports = {
  // the path to main js / ts file
  entry: ['@babel/polyfill', 'isomorphic-fetch', './wp-content/themes/portfolio/src/ts/index.ts' ],

  // the file extension webpack is going to look for when importing modules
  resolve: {
    extensions: ['.ts', '.js', '.json']
  },

  // the output directory path and filename
  output: {
    path: path.resolve(__dirname, './wp-content/themes/portfolio/dist'),
    filename: 'bundle.js',
    publicPath: '/wp-content/themes/portfolio/dist'
  },

  // module definitions
  module: {
    rules: [{
        test: /\.scss$/,
        use: [
          "style-loader",
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",

            // disable processing files from url() functions in css
            options: {
              url: false
            }
          },
          "sass-loader"
        ]
      },
      {
        test: [/\.jsx?$/, /\.tsx?$/],
        exclude: /node_modules/,
        loader: 'babel-loader',
        query: {
          presets: ['@babel/preset-env']
        },
      }
    ]
  },

  // plugin definitions
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'style.css',
    }),

    // (optional) removes dist folder before every building process
    new CleanWebpackPlugin({
      cleanAfterEveryBuildPatterns: ['dist']
    }),
  ]
}