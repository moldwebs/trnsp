var Encore = require('@symfony/webpack-encore');

Encore

    .setOutputPath('public/build/')
    .setPublicPath('/build')

    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())

    .addEntry('js/app', [
        './assets/theme_orig/assets/js/main.js',
    ])
    .addStyleEntry('css/app', [
        './assets/theme_orig/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css',
        './assets/theme_orig/assets/lib/material-design-icons/css/material-design-iconic-font.min.css',
        './assets/theme_orig/assets/lib/datatables/css/dataTables.bootstrap.min.css',
        './assets/theme_orig/assets/lib/jquery.gritter/css/jquery.gritter.css',
        './assets/theme_orig/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css',
        './assets/theme_orig/assets/lib/select2/css/select2.min.css',
        './assets/theme_orig/assets/css/style.css',
    ])

module.exports = Encore.getWebpackConfig();