<?php

namespace App\Http\Controllers;

use App\Articles\Categories;
use App\Posts\Comments;
use App\Posts\Posts;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(auth()->user()->isAdmin == true ){
            $userscount = count(User::all());
            $articlescount = count(Posts::all());
            $publishedcount = count(Posts::all());
            $categoriescount = count(Categories::all());


            $homedata = array();

            $homedata['userscount'] = $userscount;
            $homedata['articlescount'] =  $articlescount;
            $homedata['publishedcount'] = $publishedcount;
            $homedata['categoriescount'] = $categoriescount;





            return view('admin.home',compact('homedata'));
        }else{
            //dd(Posts::where('postable_id',auth()->user()->id)->get());
            if(auth()->user()->role == 1 ){
                $user = User::where('id',auth()->user()->id)->first();

                $posts = $user->posts()->orderBy('created_at','DESC')->get();
                $comments = Comments::all();


                $data = array();


                $data['posts'] = $posts;
                $data['comments'] =$comments;


                return view('home',compact('data'));
            }elseif(auth()->user()->role == 2){
                return;
            }

        }

    }
}
