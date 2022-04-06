<?php

namespace App\Http\Controllers;

use App\Models\FrontUser;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    private $frontUser;
    public function index($id = null)
    {
        if ($id)
        {
            Session::put('blog_id',$id);
        }
        return view('auth.user-login');
    }
    public function register()
    {
        return view('auth.user-register');
    }
    public function newRegister(Request $request)
    {
        if ($request->password == $request->confirm_password)
        {
            $this->frontUser = new FrontUser();
            $this->frontUser->name      = $request->name;
            $this->frontUser->email     = $request->email;
            $this->frontUser->password  = bcrypt($request->password);
            $this->frontUser->save();

            Session::put('user_id',$this->frontUser->id);
            Session::put('user_name',$this->frontUser->name);

            return redirect('/blog-detail/'.Session::get('blog_id'));
        }
        else
        {
            return redirect()->back()->with('message', 'Sorry... password & confirm password did not matched');
        }

    }
}
