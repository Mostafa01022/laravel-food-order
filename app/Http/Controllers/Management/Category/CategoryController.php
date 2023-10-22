<?php

namespace App\Http\Controllers\Management\Category;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Service\Category\DeleteCategory;
use App\Service\Category\EditCategory;
use App\Service\Category\StoreCategory;
use App\Service\Category\UpdateCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function index()
    {   
        $records = Category::get();
        return view('management.category.index' ,compact('records') );
    }
    public function store(StoreCategory $storeCategory ,StoreCategoryRequest $storeCategoryRequest)
    {   
        return $storeCategory->apply($storeCategoryRequest);
    }
    public function delete(DeleteCategory $deleteCategory , Request $request )
    {   
        return $deleteCategory->apply($request);
    }
    public function edit(EditCategory $editCategory , Request $request )
    {   
        return $editCategory->apply($request);
    }
    public function update( int $id ,UpdateCategory $updateCategory , UpdateCategoryRequest $updateCategoryRequest )
    {   
        return $updateCategory->apply($id, $updateCategoryRequest);
    }
}
