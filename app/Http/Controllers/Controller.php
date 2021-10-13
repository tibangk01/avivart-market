<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $currencyTransformer;

    public function __construct()
    {
        
    }

    public function updateStaffStatusBarInfo(float $amount = 0, string $sign = '+')
    {
        if (!is_null(session('staffStatusBarInfo'))) {
            switch ($sign) {
                case '+':
                    session('staffStatusBarInfo')->update([
                        'amount' => floatval(session('staffStatusBarInfo')->amount) + $amount,
                    ]);
                    break;

                case '-':
                    session('staffStatusBarInfo')->update([
                        'amount' => floatval(session('staffStatusBarInfo')->amount) - $amount,
                    ]);
                    break;
                
                default:
                    // code...
                    break;
            }
        }
    }
}
