<?php

namespace App\Http\Repositories\Firebase;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Illuminate\Support\Str;

class StorageRepository
{

       protected $factory = null;
     public function __construct()
     {
        $this->factory = (new Factory)
        ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
        ->withDatabaseUri('https://storm3blog-default-rtdb.firebaseio.com');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * allow write: if "auth.token.email === 'kiplangatsang425@gmail.com'";
     *
     */

    public function store( $file )
    {
        //
       try{ $storage = app('firebase.storage'); // This is an instance of Google\Cloud\Storage\StorageClient from kreait/firebase-php library
        $defaultBucket = $storage->getBucket();
       $image = $file;
       $name = (string) Str::uuid().".".$image->getClientOriginalExtension(); // use Illuminate\Support\Str;
        $pathName = $image->getPathName();


        $file = fopen($pathName, 'r');
        $object = $defaultBucket->upload($file, [
             'name' => auth()->user()->id."/". $name,
             'predefinedAcl' => 'publicRead'
        ]);
        $image_url = 'https://storage.googleapis.com/'.env('FIREBASE_PROJECT_ID').'.appspot.com/'.auth()->user()->id."/".$name;
        //dd($file);
        return $image_url;}catch(Exception $e){
            Log::debug("error",$e->getMessage());
        }

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
    }
}
