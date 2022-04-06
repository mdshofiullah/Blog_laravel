<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Session;

class BiztroxController extends Controller
{
    private $recentBlogs;
    private $blogDetail;
    private $blogs;
    private $comment;
    private $lastBlogComment;
    private $commentCount;

    public function index()
    {
        $this->recentBlogs = Blog::where('status', 1)->orderBy('id', 'desc')->take('3')->get();
        return view('website.home.home', ['recent_blogs' => $this->recentBlogs]);
    }
    public function category($id)
    {

        $this->blogs = Blog::where('category_id',$id)->where('status', 1)->orderBy('id', 'desc')->get();

        return view('website.category.category',['blogs' => $this->blogs]);
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
    public function newComment(Request $request,$id)
    {
        $this->comment = new Comment();
        $this->comment->blog_id = $id;
        $this->comment->front_user_id = Session::get('user_id');
        $this->comment->comment = $request->comment;



        $lastBlogComment = Comment::where('blog_id',$id)->orderBy('id','desc')->first();
        if ($lastBlogComment)
        {
            $commentCount = $lastBlogComment->comment_count + 1;
        }
        else
        {
            $commentCount = 1;
        }
        $this->comment->comment_count = $commentCount;
        $this->comment->save();
        return redirect('/blog-detail/'.$id)->with('message','Your Comment posted Successfully');
    }
}
