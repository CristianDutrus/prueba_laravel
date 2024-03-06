<?php

namespace App\HTTP\Controllers;
use App\Models\Category;

class CategoriesController
{
    public function getCategories()
    {
        $response = Category::all();
        return response($response, 200);
    }
}
