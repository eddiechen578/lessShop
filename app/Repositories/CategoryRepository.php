<?php
/**
 * Created by PhpStorm.
 * User: eddie chen
 * Date: 2018/12/25
 * Time: 下午 10:41
 */

namespace App\Repositories;

use App\Entities\Category;

class CategoryRepository
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll(){

        return $this->category->all();

    }

}