<?php


namespace App\Http\Services;


interface CategoryServiceInterface
{
    public function getCategories();
    public function getCategoriesName($categories);
}
