<?php


namespace App\Http\Services;


use App\Http\Repositories\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryService implements CategoryServiceInterface
{

    public function getCategories()
    {
        return $categories = Category::all();
    }

}
