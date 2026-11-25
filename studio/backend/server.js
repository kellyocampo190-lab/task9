import { Pool } from 'pg';
import { connectionString } from './infrastructure/database.js';
import { postgresOrders } from './infrastructure/studio-repository.js';
import { getStudio } from './application/get-studio.js';
import { createApp } from './http/app.js';

const pool = new Pool({ connectionString, connectionTimeoutMillis: 4000 });
const app = createApp(getStudio(postgresOrders(pool)));
const server = app.listen(process.env.PORT || 18736, process.env.HOST || '127.0.0.1');
process.on('SIGTERM', () => server.close(() => pool.end()));
