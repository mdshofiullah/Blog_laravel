<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;

    public function index()
    {
        return view('admin.category.add');
    }
    public function create(Request $request)
    {
        Category::newCategory($request);

        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    public function manage()
    {
        $this->category = Category::orderBy('id', 'desc')->get();
        return view('admin.category.manage', ['categories' => $this->category]);
    }
    public function edit($id)
    {
        $this->category = Category::find($id);

        return view('admin.category.edit', ['category' => $this->category]);
    }
    public function update(Request $request,$id)
    {
        Category::updateCategory($request,$id);
        return redirect('/category.manage')->with('message', 'Category Info Updated Successfully');
    }
    public function delete($id)
    {
        return $id;
    }
}