const webpack = require("webpack");
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

// Fallback: najpierw spróbuj sass-embedded, jeśli nie ma to zwykły sass
const sassImpl = (() => {
  try { return require("sass-embedded"); } catch { return require("sass"); }
})();

module.exports = (env, argv) => {
  const isProd = argv.mode === "production";

  return {
    entry: {
      main: "./src/index.js",
      style: "./src/style.js",
    },

    output: {
      filename: "[name].bundle.js",
      path: path.resolve(__dirname, "dist"),
      clean: true,
      // ważne dla Node 17+/18 (OpenSSL 3)
      hashFunction: "xxhash64",
    },

    devtool: isProd ? "source-map" : "eval-cheap-module-source-map",

    module: {
      rules: [
        {
          test: /\.scss$/,
          exclude: /(node_modules)/,
          use: [
            MiniCssExtractPlugin.loader,
            {
              loader: "css-loader",
              options: {
                sourceMap: true,
                url: false,
                importLoaders: 2, // przepuszcza przez postcss i sass
              },
            },
            {
              loader: "postcss-loader",
              options: {
                sourceMap: true,
                postcssOptions: {
                  plugins: [require("autoprefixer")()],
                },
              },
            },
            {
              loader: "sass-loader",
              options: {
                sourceMap: true,
                implementation: sassImpl,
                sassOptions: {
                  outputStyle: isProd ? "compressed" : "expanded",
                },
              },
            },
          ],
        },
        {
          test: /\.js$/,
          exclude: /(node_modules)/,
          use: {
            loader: "babel-loader",
            options: {
              presets: ["@babel/preset-env"],
            },
          },
        },
      ],
    },

    plugins: [
      new webpack.ProvidePlugin({
        $: "jquery",
        jQuery: "jquery",
        "window.jQuery": "jquery",
      }),
      new MiniCssExtractPlugin({
        filename: "[name].css",
        chunkFilename: "[id].css",
      }),
    ],
  };
};
