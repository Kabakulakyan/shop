<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Hash;
use Validator;

class CategoryController extends Controller
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
    public function store(Request $request)
    {
        //
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
    public function showCategories(){
        $categories = Category::paginate(5);
        return view('categories',compact("categories"));
    }
    public function addCategories(Request $request){
        if($request->input('name')){
        $data = $request->all();
        $data['name'] =$request->input('name');
        
        // $col = 'email';
        $validated = Validator::make($data,[
            
            'name' => "required",
            
        ]);
        // dd($validated);
        $categories = new Category;
        $categories->name = $data['name'];
        $categories->save();
        // User::create($validated);

        return back();
    }else{
        return back();
    }
    }
    public function showCategorie(){
        
        
        $categories = Category::paginate(8);
        return view('page_from_categories')->with('categories', $categories);
        //compact
    }
    public function deleate($cut){
        
        Category::where('id',$cut)->delete();
        return redirect()->back();
        
        // return view('page_from_categories')->with('categories', $categories);
        //compact
    }
    public function showUser(){
        $users = User::all();
        return view('users',compact("users"));
    }
    
}
