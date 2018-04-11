<?php

namespace App\Repositories\Categories;

use App\Category;

class CategoriesRepo implements CategoriesInterfaces
{
	protected $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	public function createCategory(array $categoryData)
	{
		return $this->category->create($categoryData);
	}
	public function showCategory()
	{
		return $this->category->all();
	}
}