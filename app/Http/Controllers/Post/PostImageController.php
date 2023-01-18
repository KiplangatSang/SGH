<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Firebase\StorageRepository;
use App\Posts\Posts;
use App\Posts\PostsImages;
use App\User;
use Exception;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //

        $uploadfile = $request->file('file');

        $storageRepo = new StorageRepository();
        $image = $storageRepo->store($uploadfile);

        // dd($image);

       // $post = Posts::where('id', $id)->first();

        // $post->postImages()->create([
        //     'image' => $image,
        // ]);

        if(!session()->has('image')){
            $imageArr = array();
            session('images',$imageArr);
        }

            $request->session()->push('images',$image);



       // $images = $post->postImages()->orderBy('created_at', 'DESC')->get();
       // $postdata = array();
       // $postdata['images'] = $images;


      //  return back();
    }


    public function storeTitleImage(Request $request,$id)
    {
        $uploadfile = $request->file('file');

        $storageRepo = new StorageRepository();
        $image = $storageRepo->store($uploadfile);


        if(!session()->has('image_title')){
            $imageArr = array();
            session('image_title',$imageArr);
        }

            $request->session()->push('image_title',$image);
    }

    public function uploadImageToFirebase(Request $request)
    {


        $storageRepo = new StorageRepository();
        $image = $storageRepo->store($request->file);
        return $image;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        PostsImages::destroy($id);
    }

    public function fileTestUpload(Request $request)
    {
        # code...
        $storageRepo = new StorageRepository();
        $image = $storageRepo->store(request()->file('file'));

        // dd($image);

        $user = User::whereIn('id', auth()->user())->first();

        $user->postImages()->create([
            'image' => $image,
        ]);

        $images = $user->postImages()->orderBy('created_at', 'DESC')->get();
        $postdata = array();
        $postdata['images'] = $images;


        return response()->json([
            'name'          => $images,
            'original_name' => $request->file('file')->getClientOriginalName(),
        ]);
    }
}
