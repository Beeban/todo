var path = require('path');

export default {
    mode: 'universal',
    /*
     ** Headers of the page
     */
    head: {
        title: process.env.npm_package_name || '',
        meta: [
            { charset: 'utf-8' },
            {
                name: 'viewport',
                content: 'width=device-width, initial-scale=1',
            },
            {
                hid: 'description',
                name: 'description',
                content: process.env.npm_package_description || '',
            },
        ],
        link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
    },
    /*
     ** Customize the progress-bar color
     */
    loading: { color: 'blue' },
    /*
     ** Global CSS
     */
    css: ['@assets/scss/app.scss'],
    /*
     ** Plugins to load before mounting the App
     */
    plugins: ['@assets/js/components-loader.js', '@assets/js/api/connection.js', '@assets/js/api/apis.js'],
    /*
     ** Nuxt.js dev-modules
     */
    buildModules: [],
    /*
     ** Nuxt.js modules
     */
    modules: ['@nuxtjs/toast', 'bootstrap-vue/nuxt', '@nuxtjs/axios', '@nuxtjs/pwa', '@nuxtjs/dotenv'],

    bootstrapVue: {
        icons: true,
        bootstrapVueCSS: false,
        bootstrapCSS: false,
    },
    /*
     ** Axios module configuration
     ** See https://axios.nuxtjs.org/options
     */
    axios: {},
    /*
     ** Build configuration
     */
    build: {
        /*
         ** You can extend webpack config here
         */
        extend(config, ctx) {
            config.resolve.alias['@api'] = path.resolve(__dirname, './assets/js/api');
            config.resolve.alias['@utils'] = path.resolve(__dirname, './assets/js/utils');
            config.resolve.alias['@components'] = path.resolve(__dirname, './components');
        },
    },

    toast: {
        position: 'top-center',
        duration: 3000,
        register: [
            // Register custom toasts
            {
                name: 'my-error',
                message: 'Oops...Something went wrong',
                options: {
                    type: 'error',
                },
            },
        ],
    },
};
