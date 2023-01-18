<?php

namespace App\Http\Views\Composers;

use App\Posts\Posts;
use App\User;
use Carbon\Carbon;
use Faker\Core\Color;
use Illuminate\View\View;
use Faker\Generator as Faker;

class NewsComposer
{
    public function compose(View $view)
    {
        $posts = Posts::where('post_category','News')->orderBy('created_at','DESC')->simplePaginate(20);
        $recomended = Posts::where('post_category','Business')->inRandomOrder()->simplePaginate(7);;

        foreach($posts as $post){

            $post['artist'] =$post->postable()->first()->get('id',
            'name',
            'email');

            $post->post_top_image = json_decode( $post->post_top_image);
        }
        foreach($recomended as $post){

            $post['artist'] =$post->postable()->first()->get('id',
            'name',
            'email');
             if($post->post_top_image){
                  $post->post_top_image = json_decode( $post->post_top_image);
             }

        }

        $data = array();
        $data['posts'] = $posts;
        $data['recomended'] = $recomended;



        $view->with('newsdata', $data);
    }
}
