<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class GetAllCategoriesController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(Category::all());
    }
}