<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blog;
    private $blogs;
    private $categories;
    private $message;

    public function index()
    {
        $this->categories = Category::all();
        return view('admin.blog.add', ['categories' => $this->categories]);
    }

    public function create(Request $request)
    {
        Blog::newBlog($request);
        return redirect()->back()->with('message', 'Blog Added Successfully');
    }

    public function manage()
    {
        $this->blogs = Blog::orderBy('id', 'desc')->get();
        return view('admin.blog.manage', ['blogs' => $this->blogs]);
    }
    public function detail($id)
    {
        $this->blog = Blog::find($id);
        return view('admin.blog.detail' , ['blog' => $this->blog]);
    }

    public function edit($id)
    {
        $this->blog = Blog::find($id);
        $this->categories = Category::all();
        return view('admin.blog.edit', ['blog' => $this->blog , 'categories' => $this->categories]);
    }

    public function update(Request $request,$id)
    {
        Blog::updateBlog($request,$id);
        return redirect('/manage-blog')->with('message', 'Blog Updated Successfully');
    }
    public function updateStatus($id)
    {
        $this->blog = Blog::find($id);
        if ($this->blog->status ==1)
        {
            $this->blog->status = 0;
            $this->message = 'Blog Status Info UnPublished Successfully';
        }
        else
        {
            $this->blog->status = 1;
            $this->message = 'Blog Status Info Published Successfully';
        }
        $this->blog->save();
        return redirect('/manage-blog')->with('message', $this->message);
    }


    public function delete($id)
    {
        $this->blog = Blog::find($id);
        if (file_exists($this->blog->image))
        {
            unlink($this->blog->image);
        }
        $this->blog->delete();
        return redirect('/manage-blog')->with('message','Blog Deleted Successfully');
    }
}
