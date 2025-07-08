const mix = require('laravel-mix');


// var LiveReloadPlugin = require('webpack-livereload-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */



 // Remove existing generated assets from public folder
// del.sync(['public/css/*', 'public/js/*', 'public/media/*', 'public/plugins/*',]);


                // //Landing
                // 'resources/css/appLandingPage.css',
			    // 'resources/js/appLandingPage.js',

                // //Global CSS
                // 'resources/css/app.css',
                // 'resources/css/style.bundle.css',
                // 'resources/css/bootstrap-icons.css',
                // 'resources/css/bootstrap.min.css',
                // 'resources/fontawesome/css/all.min.css',

                // //Theme CSS
                // 'resources/plugins/custom/datatables/datatables.bundle.css',
                // 'resources/plugins/custom/vis-timeline/vis-timeline.bundle.css',
                // 'resources/plugins/global/plugins.bundle.css',

                // //Global JS
                // 'resources/js/app.js',
                // 'resources/js/custom.js',
                // 'resources/js/scripts.bundle.js',
                // 'resources/js/custom/widgets.js',
                // 'resources/js/widgets.bundle.js',
                // 'resources/js/custom/pages/general/pos.js',
                // 'resources/js/custom/apps/chat/chat.js',

                // //Bootstrap JS
                // 'resources/js/bootstrap.min.js',
                // 'resources/js/bootstrap.bundle.min.js',
                // 'resources/js/bootstrap.js',

                // //Jquery
                // 'resources/js/jquery.min.js',
                // 'resources/js/jquery-3.4.1.min.js',
                // 'resources/js/jquery.backstretch.min.js',

                // //Sign up
                // 'resources/js/custom/authentication/sign-up/general.js',
                
                // // Sign in
                // 'resources/js/custom/authentication/sign-in/general.js',



                // //Account Activity
                // 'resources/js/custom/pages/user-profile/general.js',
                // 'resources/js/custom/apps/chat/chat.js',

                // //Modals Offer
                // 'resources/js/custom/utilities/modals/offer-a-deal/type.js',
                // 'resources/js/custom/utilities/modals/offer-a-deal/details.js',
                // 'resources/js/custom/utilities/modals/offer-a-deal/finance.js',
                // 'resources/js/custom/utilities/modals/offer-a-deal/complete.js',
                // 'resources/js/custom/utilities/modals/offer-a-deal/main.js',

                // //Plugins
                // 'resources/plugins/custom/fslightbox/fslightbox.bundle.js',
                // 'resources/plugins/custom/typedjs/typedjs.bundle.js',

                // //Landing Page 
                // 'resources/js/custom/landing.js',
                // 'resources/js/custom/pages/pricing/general.js',
            
                // //Premium Page
                // 'resources/plugins/custom/vis-timeline/vis-timeline.bundle.js',

                // //Search
                // 'resources/js/custom/utilities/modals/users-search.js',

                // //Upgrade
                // 'resources/js/custom/utilities/modals/upgrade-plan.js',

                // //Modals Create
                // 'resources/js/custom/utilities/modals/create-app.js',
                // 'resources/js/custom/utilities/modals/create-campaign.js',

                // //Modals Create Project
                // 'resources/js/custom/utilities/modals/create-project/type.js',
                // 'resources/js/custom/utilities/modals/create-project/budget.js',
                // 'resources/js/custom/utilities/modals/create-project/settings.js',
                // 'resources/js/custom/utilities/modals/create-project/team.js',
                // 'resources/js/custom/utilities/modals/create-project/targets.js',
                // 'resources/js/custom/utilities/modals/create-project/files.js',
                // 'resources/js/custom/utilities/modals/create-project/complete.js',
                // 'resources/js/custom/utilities/modals/create-project/main.js',


    
mix.vue()

    .js('resources/js/app.js', 'public/js')
    .js('resources/js/loginDesign.js', 'public/js')
    .js('resources/js/bootstrap.js', 'public/js')
    .js('resources/js/scripts.bundle.js', 'public/js')
    .js('resources/js/widgets.js', 'public/js')

    .js('resources/plugins/fullcalendar.bundle.js', 'public/js')
    .js('resources/plugins/vis-timeline.bundle.js', 'public/js')
    .js('resources/plugins/fslightbox.bundle.js', 'public/js')
    .copyDirectory('resources/plugins/leaflet.bundle.js', 'public/js')
    .copyDirectory('resources/plugins/plugins.bundle.js', 'public/js')
    .copyDirectory('resources/plugins/datatables.bundle.js', 'public/js')


    .copyDirectory('resources/css/all.min.css', 'public/css')
    .css('resources/css/app.css', 'public/css')
    .css('resources/css/loginDesign.css', 'public/css')
    .css('resources/css/style.bundle.css', 'public/css')
    .css('resources/css/datatables.bundle.css', 'public/css')
    .css('resources/css/vis-timeline.bundle.css', 'public/css')
    .css('resources/css/fullcalendar.bundle.css', 'public/css')
    .copyDirectory('resources/css/leaflet.bundle.css', 'public/css')
    .copyDirectory('resources/css/plugins.bundle.css', 'public/css')

    .copyDirectory('resources/fonts/fontawesome/webfonts', 'public/fonts')
    .copyDirectory('resources/fonts/@fortawesome/', 'public/fonts')
    .copyDirectory('resources/fonts/line-awesome/', 'public/fonts')
    .copyDirectory('resources/fonts/bootstrap-icons/', 'public/fonts')
    .copyDirectory('resources/img/', 'public/img');

    // .sass('resources/sass/app.scss', 'public/css');
// 
    // .webpackConfig({
    //     plugins: [new LiveReloadPlugin()]
    // });
    
    // .browserSync({
    //     proxy: "http://localhost:8000"
    // });
    // .browserSync('localhost:8000')


    // .browserSync({
    //     proxy: "http://localhost/myapp/", //Your host
    //     files: [ //Files for watching
    //         "./app/**/*",
    //         "./routes/**/*",
    //         "./public/assets/css/*.css",
    //         "./public/js/*.js",
    //         "./resources/views/**/*.blade.php",
    //         "./resources/lang/**/*",
    //     ],
    // });
// .copyDirectory('resources/assets/fonts/keenicons/', 'public/fonts')
    // .copyDirectory('resources/assets/fonts/line-awesome/', 'public/fonts')

    // .copyDirectory('resources/assets/media', 'public/images');







    // .js('resources/plugins/flotcharts.bundle.js', 'public/js')
    // 
    // .js('resources/plugins/plugins.bundle.js', 'public/js')
    // .js('resources/plugins/datatables.bundle.js', 'public/js')


    // .js('resources/assets/js/custom.js', 'public/js')
    // .js('resources/assets/js/custom/widgets.js', 'public/js')

    // .js('resources/assets/js/bootstrap.min.js', 'public/js')
    // .js('resources/assets/js/bootstrap.bundle.min.js', 'public/js')


    // .js('resources/assets/js/jquery.min.js', 'public/js')
    // .js('resources/assets/js/jquery-3.4.1.min.js', 'public/js')
    // .js('resources/assets/js/jquery.backstretch.min.js', 'public/js')

    // .js('resources/assets/js/custom/apps/chat/chat.js', 'public/js')
    // .js('resources/assets/js/custom/pages/general/pos.js', 'public/js')
    // .js('resources/assets/js/custom/utilities/modals/upgrade-plan.js', 'public/js')
    // .js('resources/assets/js/custom/utilities/modals/users-search.js', 'public/js')


    // .css('resources/assets/css/bootstrap-icons.css', 'public/css')
    // .css('resources/assets/css/bootstrap.min.css', 'public/css')
    // .css('resources/assets/fontawesome/css/all.min.css', 'public/css')
    // .css('resources/assets/plugins/custom/vis-timeline/vis-timeline.bundle.css', 'public/css')

    // .copyDirectory('resources/assets/fonts/font-awesome/', 'public/fonts')












    // .css('resources/assets/plugins/global/plugins.bundle.css', 'public/css')
    
    
    // .copyDirectory('resources/assets/fonts', 'public/fonts')

    // .copyDirectory('resources/assets/css', 'public/css')

    // .copyDirectory('resources/assets/js', 'public/js')


// .js('resources/assets/js/bootstrap.js', 'public/js')
// .js('resources/assets/js/bootstrap.min.js', 'public/js')
// .js('resources/assets/js/bootstrap.bundle.min.js', 'public/js')

// .js('resources/assets/js/scripts.bundle.js', 'public/js')
// .js('resources/assets/js/widgets.bundle.js', 'public/js')

// .js('resources/assets/js/jquery.min.js', 'public/js')
// .js('resources/assets/js/jquery-3.4.1.min.js', 'public/js')
// .js('resources/assets/js/jquery.backstretch.min.js', 'public/js')

// .js('resources/assets/js/custom.js', 'public/js')
// .js('resources/assets/js/custom/widgets.js', 'public/js')
// .js('resources/assets/js/custom/apps/chat/chat.js', 'public/js')
// .js('resources/assets/js/custom/pages/general/pos.js', 'public/js')
// .js('resources/assets/js/custom/utilities/modals/upgrade-plan.js', 'public/js')
// .js('resources/assets/js/custom/utilities/modals/users-search.js', 'public/js')


// .css('resources/assets/css/style.bundle.css', 'public/css')
// .css('resources/assets/css/bootstrap-icons.css', 'public/css')
// .css('resources/assets/css/bootstrap.min.css', 'public/css')

// .css('resources/assets/fontawesome/css/all.min.css', 'public/css')
// .css('resources/assets/plugins/custom/datatables/datatables.bundle.css', 'public/css')
// .css('resources/assets/plugins/custom/vis-timeline/vis-timeline.bundle.css', 'public/css')
// .css('resources/assets/plugins/global/plugins.bundle.css', 'public/css')



// .copyDirectory('assets/fonts/font-awesome/', 'public/fonts')
// .copyDirectory('assets/fonts/bootstrap/', 'public/fonts')
// .copyDirectory('assets/fonts/keenicons/', 'public/fonts')
// .copyDirectory('assets/fonts/line-awesome/', 'public/fonts')