<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory ()
    {
        return view('admin.category.add');
    }

    public function newCategory (Request $request)
    {
        Category::saveCategory($request);
        return redirect()->back()->with('message', 'Category created successfully.');
    }
}
