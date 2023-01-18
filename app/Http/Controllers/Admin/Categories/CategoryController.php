<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Articles\Categories;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        // $user = User::whereIn('id',auth()->user())->first();

        $categories = Categories::all();


        $categorydata = array();
        $categorydata['categories'] = $categories;
        //dd($data);

        return view('admin.categories.index', compact('categorydata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $category = array(
            "Technical" => "Technical",
            "Business" => "Business",
            "Art" => "Art",
            "News" => "News",
        );
        $categorydata['category'] = $category;
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //dd($request->all());
        $user = User::whereIn('id', auth()->user())->first();
        //dd($user);

        $category = $user->category()->create([
            'category' => $request->category,
            'category_description' => $request->category_description,
            'category_class' => $request->category_class,
        ]);



        return redirect('/admin/articles/category/index')->with('success', 'Category added successfully');
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
        $category = Categories::where('id', $id)->first();
        $categorydata = array();
        $categorydata['category'] = $category;
        //dd($data);

        return view('admin.categories.index', compact('categorydata'));
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
        $category = Categories::where('id', $id)->first();


        $categorydata = array();
        $categorydata['category'] = $category;
        //dd($data);

        return view('admin.categories.edit', compact('categorydata'));
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
        $category = Categories::where('id', $id)->first();

        $category->update([
            'category' => $request->category,
            'category_description' => $request->category_description,
            'category_class' => $request->category_class,
        ]);



        return redirect('/admin/articles/category/index')->with('success', 'Category Updated successfully');
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
