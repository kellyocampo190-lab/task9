<?php

namespace App\Http\Controllers;

class StudioController extends Controller
{
    // Sample orders for one studio day, listed in pickup order.
    private const ORDERS = [
        ['number' => 'FA-101', 'design' => 'Garden rose bouquet', 'quantity' => 2, 'pickup' => '10:30 AM', 'status' => 'Ready'],
        ['number' => 'FA-102', 'design' => 'Dahlia centerpiece', 'quantity' => 1, 'pickup' => '12:00 PM', 'status' => 'In progress'],
        ['number' => 'FA-103', 'design' => 'Tulip hand-tie', 'quantity' => 3, 'pickup' => '02:15 PM', 'status' => 'Queued'],
    ];

    public function overview()
    {
        $orders = collect(self::ORDERS);

        return view('studio.overview', [
            'orderCount' => $orders->count(),
            'arrangementCount' => $orders->sum('quantity'),
            'readyCount' => $orders->where('status', 'Ready')->count(),
            'firstPickup' => $orders->first(),
        ]);
    }

    public function orders()
    {
        return view('studio.orders', ['orders' => self::ORDERS]);
    }

    public function pickups()
    {
        return view('studio.pickups', ['orders' => self::ORDERS]);
    }
}
