<?php

namespace App\Http\Views\Composers;

use App\Posts\Posts;
use App\User;
use Carbon\Carbon;
use Faker\Core\Color;
use Illuminate\View\View;
use Faker\Generator as Faker;

class BusinessComposer
{
    public function compose(View $view)
    {
        $posts = Posts::where('post_category', 'Business')->orderBy('created_at', 'DESC')->with('postable')->simplePaginate(20);
        $recomended = Posts::where('post_category', 'Business')->inRandomOrder()->with('postable')->simplePaginate(7);;

        foreach ($posts as $post) {

            $post['artist'] = $post->postable();
            $post->post_top_image = json_decode($post->post_top_image);
        }
        foreach ($recomended as $post) {

            $post['artist'] = $post->postable;

            $post->post_top_image = json_decode($post->post_top_image);
        }

        $data = array();
        $data['posts'] = $posts;
        $data['recomended'] = $recomended;



        $view->with('businessdata', $data);
    }
}
