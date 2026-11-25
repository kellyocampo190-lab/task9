export function summarize(orders) {
    return {
        orderCount: orders.length,
        arrangementCount: orders.reduce((total, order) => total + order.quantity, 0),
        readyCount: orders.filter(order => order.status === 'Ready').length,
        firstPickup: orders[0] ?? null
    };
}
