import { build } from 'esbuild';

await build({
    entryPoints: ['frontend/main.jsx'],
    bundle: true,
    minify: true,
    define: { 'process.env.NODE_ENV': '"production"' },
    legalComments: 'eof',
    outfile: '../public/build/app.js'
});
