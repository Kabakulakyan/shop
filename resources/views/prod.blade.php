@extends('example')

@section('main_content')
{{-- @dd($products) --}}
{{-- @dd($products->name) --}}
{{-- @foreach($products as $pro => $asd) --}}
{{-- @dd($pro->image[0]);<div style=" margin-top:4px" >  --}}

    {{-- @dump($asd); --}}
     <img style="width:10%;height:100px" src="{{asset('uploads/'.$products->image[0]->img)}}" alt=""> 
     {{ $products->name }} 
      <br>
       price 
       {{ $products->price }} 
    
    <br> 
<button style="background-color: aquamarine" class="btn btn-success">buy</button>     
{{-- @endforeach     --}}
@endsection