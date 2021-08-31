@extends('example')

@section('main_content') 


<button class="btn btn-success"> <a href="{{url('/add-product')}}">in to Add</a> </button> 
 

<table class="table" style="color: white">
  <thead class="thead-dark">
      <tr>
          <th>Row</th>
          <th>categories Name</th>
          <th>action</th>
      </tr>
  </thead>
  <tbody>
     
              @foreach ($products as $product)
              
              <tr>   
              <td> {{$product->id}} </td>
              <td> {{$product->name}} 
                 </td>
              <td>
                  <button class="btn btn-success"> edit</button>
                  {{-- <button><a href="{{url('/deleate_cat/' . $category->id )}}">deleate </a></button> --}}
              </td>
              </tr>
              @endforeach
         
              
            
  </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $products->links("pagination::bootstrap-4") }}
    </div>
<div class="col-sm-3"></div>
@endsection