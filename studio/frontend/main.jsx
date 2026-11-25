import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';

function Overview({ summary, pickupUrl }) {
    const { orderCount, arrangementCount, readyCount, firstPickup } = summary;
    const counts = [['Orders', orderCount], ['Arrangements', arrangementCount], ['Ready for pickup', readyCount]];
    return <>
        <div className="row metrics">
            {counts.map(([label, value]) => <div className="col-md-4" key={label}>
                <div className="small-box studio-metric">
                    <div className="inner"><p>{label}</p><h2>{value}</h2></div>
                </div>
            </div>)}
        </div>
        {firstPickup && <div className="card first-pickup">
            <div className="card-body">
                <div>
                    <h2>First pickup</h2>
                    <p>{firstPickup.pickup} · {firstPickup.design}</p>
                </div>
                <a href={pickupUrl}>View schedule →</a>
            </div>
        </div>}
    </>;
}

function Orders({ orders }) {
    return orders.map(order => <tr key={order.number}>
        <th scope="row">{order.number}</th>
        <td>{order.design}</td><td>{order.quantity}</td>
        <td><span className="order-status">{order.status}</span></td>
    </tr>);
}

function Pickups({ orders }) {
    return orders.map(order => <li className="list-group-item" key={order.number}>
        <strong className="pickup-time">{order.pickup}</strong>
        <span>{order.design}</span><span className="order-number">{order.number}</span>
    </li>);
}

function Message({ page, children }) {
    if (page === 'orders') return <tr><td colSpan="4" role="status">{children}</td></tr>;
    if (page === 'pickups') return <li role="status">{children}</li>;
    return <p role="status">{children}</p>;
}

function Studio({ page, api, pickupUrl }) {
    const [data, setData] = useState(null);
    const [error, setError] = useState(false);
    useEffect(() => {
        const controller = new AbortController();
        async function load() {
            const response = await fetch(api, { signal: controller.signal });
            if (!response.ok) throw new Error('Studio data unavailable');
            setData(await response.json());
        }
        load().catch(cause => { if (cause.name !== 'AbortError') setError(true); });
        return () => controller.abort();
    }, [api]);
    if (error) return <Message page={page}>Studio orders are temporarily unavailable.</Message>;
    if (!data) return <Message page={page}>Loading studio orders…</Message>;
    if (page === 'overview') return <Overview summary={data.summary} pickupUrl={pickupUrl} />;
    if (!data.orders.length) return <Message page={page}>No orders scheduled.</Message>;
    return page === 'orders' ? <Orders orders={data.orders} /> : <Pickups orders={data.orders} />;
}

const host = document.querySelector('[data-studio-page]');
if (host) {
    createRoot(host).render(<Studio page={host.dataset.studioPage} api={host.dataset.api} pickupUrl={host.dataset.pickups} />);
}
