import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.tsx',
            ssr: 'resources/js/ssr.tsx',
            refresh: true,
        }),
        react(),
    ],
    server: {
        proxy: {
            '/api': 'http://localhost:8000',
            '/storage': {
                target: 'http://localhost:8000',
                changeOrigin: true,
            },
            '/filament': {
                target: 'http://localhost:8000',
                changeOrigin: true,
            },
            '/_spatie': {
                target: 'http://localhost:8000',
                changeOrigin: true,
            }
        }
    }
});
