<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // جلب كل الأقسام
        $categories = Category::all();

        // إرجاع النتيجة كـ JSON
        return response()->json([
            'status' => true,
            'message' => 'Categories retrieved successfully',
            'data' => $categories
        ], 200);
    }
}