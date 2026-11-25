import { summarize } from '../domain/studio.js';

export function getStudio(repository) {
    return async () => {
        const orders = await repository.inPickupOrder();
        return { orders, summary: summarize(orders) };
    };
}
