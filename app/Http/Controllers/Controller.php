<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Transaction;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $currencyTransformer;

    public function __construct()
    {
        
    }

    protected function updateStaffStatusBarInfo(float $amount = 0, string $sign = '+')
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

    protected function saveTransaction(int $transaction_type_id, int $user_id, string $activity): void
    {
        try {
            Transaction::create([
                'transaction_type_id' => $transaction_type_id,
                'user_id' => $user_id,
                'activity' => $activity,
            ]);
        } catch (\Exception $ex) {
            //throw $th;
        }
    }

    protected function getLibraryType(string $mimeType): int
    {
        $type = 1;

        if (Str::of($mimeType)->startsWith('image')) {
            $type = 1;
        } elseif (Str::of($mimeType)->startsWith('video')) {
            $type = 2;
        } elseif (Str::of($mimeType)->startsWith('audio')) {
            $type = 3;
        } elseif (Str::of($mimeType)->startsWith('application')) {
            $type = 4;
        } elseif (Str::of($mimeType)->startsWith('text')) {
            $type = 5;
        } elseif (Str::of($mimeType)->startsWith('font')) {
            $type = 6;
        }

        return $type;
    }
}
