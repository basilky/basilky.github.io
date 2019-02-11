const path = require("path");
module.exports = {
    chainWebpack: config =>
    {
        config.optimization.splitChunks(false)
    },
    runtimeCompiler: true,
    configureWebpack: {
        devServer: {
            public: 'mitsfoss.in:8080',
            disableHostCheck: true,
            clientLogLevel: 'info',
            // proxy: 'http://ktunotes.in:80'
        }
    }
}