<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Transaction;
use App\Models\ExerciseProduct;
use App\Models\Exercise;
use App\Models\Product;
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
            //
        }
    }

    protected function saveInventory(Exercise $exercise, Product $product, string $model = 'QuickSale')
    {
        try {
            switch ($model) {
                case 'Purchase':
                    ExerciseProduct::create([
                        'exercise_id' => $exercise->id,
                        'product_id' => $product->id,
                        'initial_stock' => 0,
                        'final_stock' => $product->stock_quantity,
                        'global_purchase_price' => $product->pivot->global_purchase_price,
                        'purchase_price' => $product->pivot->purchase_price,
                        'global_selling_price' => 0,
                        'selling_price' => 0,
                        'global_rental_price' => 0,
                        'rental_price' => 0,
                        'loss' => 0,
                    ]);
                    break;

                case 'Order':
                    ExerciseProduct::create([
                        'exercise_id' => $exercise->id,
                        'product_id' => $product->id,
                        'initial_stock' => 0,
                        'final_stock' => $product->stock_quantity,
                        'global_purchase_price' => 0,
                        'purchase_price' => 0,
                        'global_selling_price' => $product->pivot->global_selling_price,
                        'selling_price' => $product->pivot->selling_price,
                        'global_rental_price' => $product->pivot->global_rental_price,
                        'rental_price' => $product->pivot->rental_price,
                        'loss' => 0,
                    ]);
                    break;
                
                default:
                    ExerciseProduct::create([
                        'exercise_id' => $exercise->id,
                        'product_id' => $product->id,
                        'initial_stock' => 0,
                        'final_stock' => $product->stock_quantity,
                        'global_purchase_price' => $product->global_purchase_price,
                        'purchase_price' => $product->purchase_price,
                        'global_selling_price' => $product->global_selling_price,
                        'selling_price' => $product->selling_price,
                        'global_rental_price' => $product->global_rental_price,
                        'rental_price' => $product->rental_price,
                        'loss' => 0,
                    ]);
                    break;
            }
        } catch (\Exception $e) {
            //
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
