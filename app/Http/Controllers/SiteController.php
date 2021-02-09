<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use App\Post;
class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
    	return view('sites.home',compact('posts'));
    }

    public function about()
    {
    	return view('sites.about');
    }

     public function register()
    {
    	return view('sites.register');
    }
    public function postregister(Request $request)
    {
       // dd($request->all());
        //register user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        //insert siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());

        return redirect('/')->with('sukses','Register Sucessfully!');
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        //dd($post);
        return view('sites.singlepost', compact('post'));

    }

}
