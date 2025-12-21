import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            // Esto obliga a Vite a revisar cambios manualmente
            usePolling: true,
        },
        // Esto ayuda a que el navegador se conecte bien con Docker
        hmr: {
            host: 'localhost',
        },
    },
});
