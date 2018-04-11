<?php

namespace App\Repositories\Categories;

interface CategoriesInterfaces
{
	public function createCategory(array $categoryData);
	public function showCategory();
}