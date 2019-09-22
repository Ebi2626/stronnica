require('babel-polyfill');
require('whatwg-fetch');

const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');

module.exports = {
  entry: {
    autorzy: './src/autorzy/autorzy.js',
    kategorie: './src/kategorie/kategorie.js',
    ksiazki: './src/ksiazki/ksiazki.js',
    koszyk: './src/koszyk/koszyk.js',
    zaloguj: './src/zaloguj/zaloguj.js',
    zarejestruj: './src/zarejestruj/zarejestruj.js',
    main: './src/main/main.js',
    user: './src/user/user.js',
    index: './src/index/index.js'
  },
  output: {
    path: path.resolve(__dirname, './dist'),
    filename: '[name].bundle.js'
  },
  target: 'node',
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader'
        }
      },
      {
        test: /\.scss$/,
        use: [ 'style-loader', 
        MiniCssExtractPlugin.loader, 
        {
          loader: 'css-loader',
          options: {
            url: false,
          },
        },
        'postcss-loader',
        'sass-loader']
      }
    ]
  },
  plugins: [
    new CleanWebpackPlugin('dist', {} ),
    new MiniCssExtractPlugin({
      filename: '[name].bundle.css',
    })
  ]
};