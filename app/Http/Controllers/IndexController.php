<?php

namespace App\Http\Controllers;

use App\Services\ExchangeRateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(Request $request, ExchangeRateService $service)
    {
        $exchangeRateEUR = $service->latest('EUR', 'USD');
        $exchangeRateUSD = $service->latest('USD', 'EUR');

        $option = DB::table('options')->latest()->first();

        if (!$option) {
            DB::table('options')->insert(['percent' => 0]);
        }

        return view('exchange.index', [
            'exchangeRateEUR' => $exchangeRateEUR,
            'exchangeRateUSD' => $exchangeRateUSD,
            'option' => $option
        ]);
    }

    public function option(Request $request)
    {
        DB::table('options')->latest()->update(['percent' => $request->percent]);

        return redirect()->back();
    }
}
