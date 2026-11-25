import { readdir, readFile } from 'node:fs/promises';
import { Client } from 'pg';
import { connectionString } from './infrastructure/database.js';

const client = new Client({ connectionString });
const directory = new URL('../db/', import.meta.url);
await client.connect();
try {
    await client.query('BEGIN');
    const files = (await readdir(directory)).filter(file => file.endsWith('.sql')).sort();
    for (const file of files) {
        await client.query(await readFile(new URL(file, directory), 'utf8'));
    }
    await client.query('COMMIT');
    console.log('Database ready.');
} catch (error) {
    await client.query('ROLLBACK');
    throw error;
} finally {
    await client.end();
}
