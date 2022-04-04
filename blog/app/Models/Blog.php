<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Blog extends Model
{
    use HasFactory;
    private static $blog;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;
    private static $authorId;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = 'blog-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newBlog($request)
    {
        //we comment out this code because we wrote a code bellow saveBlogInfo
//        self::$blog = new Blog();
//        self::$blog->category_id = $request->category_id;
//        self::$blog->author_id = Auth::user()->id;
//        self::$blog->main_title = $request->main_title;
//        self::$blog->sub_title = $request->sub_title;
//        self::$blog->short_description = $request->short_description;
//        self::$blog->long_description = $request->long_description;
//        self::$blog->image = self::getImageUrl($request);
//        self::$blog->save();

        self::$blog = new Blog();
        self::$imageUrl = self::getImageUrl($request);
        self::$blog->author_id = Auth::user()->id;
        self::saveBlogBasicInfo(self::$blog, $request, self::$imageUrl,self::$blog->author_id);

    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public static function updateBlog($request, $id)
    {
        self::$blog = Blog::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$blog->image))
            {
                unlink(self::$blog->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$blog->image;
        }

//        those code comments because we can write those comments like saveBlogInfo function

//        self::$blog->category_id            = $request->category_id;
//        self::$blog->main_title             = $request->main_title;
//        self::$blog->sub_title              = $request->sub_title;
//        self::$blog->short_description      = $request->short_description;
//        self::$blog->long_description       = $request->long_description;
//        self::$blog->image                  = self::$imageUrl;
//        self::$blog->save();


        self::saveBlogBasicInfo(self::$blog, $request, self::$imageUrl); //**this code might not be needed if we write upper code

//        We can write this code like bellow code
    }
    public static function saveBlogBasicInfo($blog,$request,$imageUrl)
    {
        $blog->category_id            = $request->category_id;
        $blog->main_title             = $request->main_title;
        $blog->sub_title              = $request->sub_title;
        $blog->short_description      = $request->short_description;
        $blog->long_description       = $request->long_description;
        $blog->image                  = $imageUrl;
        $blog->save();
    }
}
