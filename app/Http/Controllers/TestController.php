<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Validator;
use App\Models\Category;
use App\Http\Requests\AppHttpRequestsMyOwnRequest;

class TestController extends Controller
{
    protected function example(){
        // Db::table(';asd')->all()
        if(empty(Auth::user())){
            return view('login'); 
        }
        return view('example');
    }
    
    public function login(){
        return view('login');

    }

    public function register(){
        return view('register');
    }

    public function postRequest(AppHttpRequestsMyOwnRequest $request){
        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        // $col = 'email';
        // $validated = Validator::make($data,[
        //     'email' => "required|email|unique:users",
        //     'name' => "required",
        //     'password' => 'required',
        //     'surname' => 'required|min:2|max:30'
        // ]);
        // dd($validated);
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        // dd($data);  
        // $user->save();
        User::create($data);

        return back();
    }

    public function login_check(Request $request){

        // dd($request->all());
        
        $password = $request->input('password');
        $email = $request->input('email');
        
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];        

        if(auth()->attempt($credentials)) {
            return redirect()->to('example');
        }else{
            return view('login'); 
        }
        
        
    }
    public function showCategories(){
     
        return view('categories');
       
    }
    public function addCategories(Request $request){
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
    }
    public function showCategorie(){
        if(empty(Auth::user())){
            return view('login'); 
        }
        return view('page_from_categories');
        
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
    
        public function edit($id)
    {
        $cat = Category::find($id);

        return view('edit', compact('cat'));
    }
    public function editCat(Request $request){
        // $cats=$request->all();
        // $flight = App\Models\Category::get();

        // $flight->name = $cats->name;

        // $flight->save();
        Category::where('id', $request->id)->update([
            'name' => $request->name
        ]);
        
        return redirect()->to('/page_from_categories/');
    }
    public function showUser(){
        return view('user');
    }
}
