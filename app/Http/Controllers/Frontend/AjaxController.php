<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    public function getModelsByBrand($brand_id)
    {
        try {
            $models = CarModel::where('car_brand_id', $brand_id)
                ->where('is_active', 'active')
                ->get();

            return response()->json([
                'success' => true,
                'models' => $models
            ]);
        } catch (\Throwable $th) {
            Log::error('Get Models by Brand Failed', ['error' => $th->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong! Please try again later'
            ]);
            throw $th;
        }
    }
}
