const path = require("path");
module.exports = {
    chainWebpack: config =>
    {
        config.optimization.splitChunks(false)
    },
    runtimeCompiler: true,
    outputDir: path.resolve(__dirname, "../events/"),
    publicPath: process.env.NODE_ENV === 'events'
        ? '/production-sub-path/'
        : '/',
    assetsDir: ".",  //relative to outputDir
    configureWebpack: {
        devServer: {
            public: 'mitsfoss.in:8080',
            disableHostCheck: true,
            clientLogLevel: 'info',
            // proxy: 'http://ktunotes.in:80'
        }
    }
}