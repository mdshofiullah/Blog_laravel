<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BiztroxController extends Controller
{
    private $recentBlogs;
    private $blogDetail;

    public function index()
    {
        $this->recentBlogs = Blog::where('status', 1)->orderBy('id', 'desc')->take('3')->get();
        return view('website.home.home', ['recent_blogs' => $this->recentBlogs]);
    }
    public function category()
    {
        return view('website.category.category');
    }
    public function detail($id)
    {
        $this->blogDetail = Blog::find($id);

        return view('website.detail.detail',['blog_detail' => $this->blogDetail]);
    }
    public function contact()
    {
        return view('website.contact.contact');
    }
}
