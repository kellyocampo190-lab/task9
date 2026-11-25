export const connectionString = process.env.DATABASE_URL;
if (!connectionString) {
    throw new Error('Set DATABASE_URL in .env before starting the database-backed application.');
}
