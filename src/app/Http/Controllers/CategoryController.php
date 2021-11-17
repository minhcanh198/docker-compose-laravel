<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private Category $categoryModel;

    public function __construct(Category $category)
    {
        $this->categoryModel = $category;
    }

    public function getAllParents()
    {
        $categories = $this->categoryModel
            ->whereNull('parent_id')
            ->get()
            ->toArray();
        return response($categories);
    }

    public function getSubCatByID(int $id)
    {
        $categories = $this->categoryModel
            ->where('parent_id', $id)
            ->get()
            ->toArray();
        return response($categories);
    }
}
