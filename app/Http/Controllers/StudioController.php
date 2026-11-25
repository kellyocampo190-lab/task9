<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class StudioController extends Controller
{
    public function overview()
    {
        return view('studio.overview');
    }

    public function orders()
    {
        return view('studio.orders');
    }

    public function pickups()
    {
        return view('studio.pickups');
    }

    // Same-origin adapter for the Blade pages. Express owns the data and business rules.
    public function data()
    {
        try {
            $upstream = Http::timeout(5)->get(config('services.studio.endpoint'));
            if ($upstream->successful()) {
                return response()->json($upstream->json());
            }
        } catch (ConnectionException $error) {
            report($error);
        }

        return response()->json(['error' => 'Studio orders are temporarily unavailable.'], 503);
    }
}
