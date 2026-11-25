export function postgresOrders(pool) {
    return {
        async inPickupOrder() {
            const { rows } = await pool.query(`
                SELECT number, design, quantity, to_char(pickup, 'HH12:MI AM') AS pickup, status
                FROM studio_orders
                ORDER BY studio_orders.pickup, number
            `);
            return rows;
        }
    };
}
