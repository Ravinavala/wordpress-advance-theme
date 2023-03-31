const path = require('path');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
//extract css in seperate files
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
//Removed unused webpack assets after every build
const cssnano = require('cssnano'); // https://cssnano.co/
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

// JS Directory path.
const JS_DIR = path.resolve(__dirname, 'src/js');
const IMG_DIR = path.resolve(__dirname, 'src/img');
const BUILD_DIR = path.resolve(__dirname, 'build');

const entry = {
    main: JS_DIR + '/main.js',
    single: JS_DIR + '/single.js',
};

const output = {
    path: BUILD_DIR,
    filename: 'js/[name].js'
};

const rules = [
    {
        test: /\.js$/,
        include: [JS_DIR],
        exclude: /node_modules/,
        use: 'babel-loader',
    },
    {
        test: /\.scss/,
        include: [JS_DIR],
        exclude: /node_modules/,
        use: 'css-loader',
    },
    {
        test: /\.scss/,
        include: [JS_DIR],
        exclude: /node_modules/,
        use: [MiniCssExtractPlugin.loader,
            'css-loader']
    },
    {
        test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
        use: {
            loader: 'file-loader',
            options: {
                name: '[path][name].[ext]',
                publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
            }
        }
    },
]

const plugins = (argv) => [
    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: ('production' === argv.mode) // Automatically remove all unused webpack assets on rebuild, when set to true in production. ( https://www.npmjs.com/package/clean-webpack-plugin#options-and-defaults-optional )
    }),
    
    new MiniCssExtractPlugin({
        filename: 'css/[name].css'
    }),
]

module.exports = (env, argv) => ({
    entry: entry,
    output: output,
    devtool: 'source-mapS',
    module: {
        rules: rules,
    },
    optimization: {
        minimizer: [
            new OptimizeCssAssetsPlugin({
                cssProcessor: cssnano
            }),

            new UglifyJsPlugin({
                cache: false,
                parallel: true,
                sourceMap: false
            })
        ]
    },
    plugins: plugins(argv),
    externals: {
        jquery: 'jQuery'
    }
})