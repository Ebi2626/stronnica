require("babel-polyfill");
require("whatwg-fetch");

const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");

module.exports = {
  entry: {
    authors: "./src/authors/authors.js",
    cathegories: "./src/cathegories/cathegories.js",
    books: "./src/books/books.js",
    shoppingCart: "./src/shoppingCart/shoppingCart.js",
    login: "./src/login/login.js",
    register: "./src/register/register.js",
    main: "./src/main/main.js",
    user: "./src/user/user.js",
    index: "./src/index/index.js",
    welcome: "./src/welcome/welcome.js",
    profile: "./src/profile/profile.js",
    story: "./src/story/story.js",
    track: "./src/track/track.js"
  },
  output: {
    path: path.resolve(__dirname, "./dist"),
    filename: "[name].bundle.js"
  },
  target: "node",
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      },
      {
        test: /\.scss$/,
        use: [
          "style-loader",
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: {
              url: false
            }
          },
          "postcss-loader",
          "sass-loader"
        ]
      }
    ]
  },
  plugins: [
    new CleanWebpackPlugin("dist", {}),
    new MiniCssExtractPlugin({
      filename: "[name].bundle.css"
    })
  ]
};
