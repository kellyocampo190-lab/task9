import express from 'express';

export function createApp(readStudio) {
    const app = express();
    app.get('/api/studio', async (_request, response) => response.json(await readStudio()));
    app.use((error, _request, response, _next) => {
        console.error('Unable to read studio orders:', error.message);
        response.status(503).json({ error: 'Studio orders are temporarily unavailable.' });
    });
    return app;
}
