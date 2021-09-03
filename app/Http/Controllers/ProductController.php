<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Image;
use Hash;
use Validator;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $prods)
    {
        $prods=Product::all();
        return view('market')->with("market",$prods);
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
    public function showProducts(){
        $products = Product::paginate(8);
        $users = User::all();
        // dd($users);
        if(empty(Auth::user())){
            return view('login'); 
        }
        $categories = Category::all();
        return view('products',compact("products" , 'users','categories'));
    }
    public function addProducts(Request $request){
        // dd($request->all());
        // $col = 'email';
        $validated = Validator::make($request->all(),[
            'name' => "required",
            'user_id' => "required",
            'category_id' => "required",
            'type' => "required",
            'price' => "required",
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // if($validated->fails())
        // {
        //     return redirect()->back()->withErrors($validated->errors());
        // }
        // else {
            $data = $request->all();
            $data['name'] =$request->input('name');
            $data['user_id'] =$request->input('userId');
            $data['category_id'] =$request->input('category');
            $data['type'] =$request->input('type');
            $data['price'] =$request->input('price');
            // $data['image'] = $request->input('photo');
            // $data['image1'] = $request->input('photo1');
            // $data['image2'] = $request->input('photo2');
            // $data['image3'] = $request->input('photo3');
            // $data['image4'] = $request->input('photo4');
            // $data['image5'] = $request->input('photo5');
            
            //  dd('end');
            $products = new Product;
            $products->name = $data['name'];
            $products->user_id = (int)$data['user_id'];
            $products->category_id = $data['category_id'];
            $products->type = $data['type']; 
            $products->price = $data['price'];
            $products->save();

// dd($request['photo']);
            if ($request->hasFile('photo')) {
                // $user->image = $image;
                $images = $request->file('photo');
                // dd($images);
                if(count($images) > 6){
                    redirect()->back();
                }else {
                    // for($i=0;$i<7;$i++){
                    foreach($images as $image){
                        $img = time() . '.' . $image->extension();

                        $image->move(public_path('uploads'),$img);

                        $imeg = new Image;
                        $imeg['img'] =$img; 
                        $imeg['product_id'] = $products->id;
                        $imeg -> save();
                        dd($imeg);
                    }
                // }
                    
                }    
             }
            // $image= new Image;
            // $image -> image_one =$data['image']; 
            // $image -> image_two =$data['image1']; 
            // $image -> image_three =$data['image2']; 
            // $image -> image_four =$data['image3']; 
            // $image -> image_five =$data['image4']; 
            // $image -> image_six =$data['image5']; 
            // $image -> save();

            // User::create($validated);
            return back();
            
        // }
    }
    public function addProd(){

        $products = Product::all();
        $users = User::all();
        $categories = Category::all();
        
        return view('add_product', compact('users', 'products', 'categories'));

    }
    public function showCategories_market(){
        $categories = Category::all();
        $products = Product::all();

        // dd(Product::all());
        // if (Product::id() == Image::product_id() ) {
        //     $images = Image::all();

        // }
        return view('market',compact("categories","products"));
    }
    
    // public function addImages(Request $request){
    //     $data = $request->all();
    //         $data['product_id'] =$request->input('product_id');
    //         $data['img_one'] =$request->input('img_one');
    //         $data['img_two'] =$request->input('img_two');
    //         $data['img_three'] =$request->input('img_three');
    //         $data['img_for'] =$request->input('img_for');
    //         $data['img_five'] =$request->input('img_five');
    //         $data['img_six'] =$request->input('img_six');

    
    //         $images = new Image; 
    //         $images->product_id = $data['product_id'];
    //         $images->img_one = $data['img_one'];
    //         $images->img_two = $data['img_two'];
    //         $images->img_three = $data['img_three']; 
    //         $images->img_for = $data['img_for'];
    //         $images->img_five = $data['img_five'];
    //         $images->img_six = $data['img_six'];
    //         $images->save();
         
    //         // User::create($validated);
    //         return back();
    // }
    
    // public function showProduct(){
    //     $products = Product::all();
    //     return view('product',compact("products"));
    // }
    // public function showCategorie(){
        
    //     $categories = Category::all();
    //     return view('page_from_categories'->with('categories', $categories));
    //     //compact
    // }
    public function search(Request $request){
        $categories = Category::all();
        $search = $request->search;
        $products = Product::all();

        // dd($search);
        $prod = Product::where('name','LIKE',"%{$search}%")->orderBy('name')->paginate(5);
        // dd($prod->all());
        return view('market', compact("prod","categories","products"));
    }
    public function prod(Request $request){
        $product = $request->inp;
        $products = json_decode($product);
        return view('prod',compact("products"));
    }
    public function add_mterq(Request $request){
        // $add = $request->all();
        $product = $request->inp;
        $products = json_decode($product);
        // dd($products);
        // dd($products);
        // $products = $request->input('inp');
        // $prod = explode(',',$products);
        // foreach $products as $key) {
            // dd($key);
        // };
        
        // dd($request->input('inp'));
        return view('prod',compact("products"));
    }
}
