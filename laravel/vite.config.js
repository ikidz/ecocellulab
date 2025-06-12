import { defineConfig } from 'vite';
import path from 'path';
import fullReload from 'vite-plugin-full-reload';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173,
        watch: {
            usePolling: true,
        },
    },
    publicDir: false,
    plugins: [
        fullReload([
            'resources/views/**/*.blade.php',
            'resources/sass/**/*.scss',
        ]),
    ],
    // build: {
    //     minify: false,
    //     outDir: 'public/assets/css',
    //     emptyOutDir: false,
    //     rollupOptions: {
    //         input: path.resolve(__dirname, 'resources/sass/style.scss'),
    //         output: {
    //             assetFileNames: 'style.css',
    //         },
    //     },
    // },
    build: {
        minify: false,
        outDir: 'public/assets', // will generate css inside here too
        emptyOutDir: false,
        rollupOptions: {
            input: path.resolve(__dirname, 'resources/js/app.js'),
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: '',
            },
        },
    },
});
