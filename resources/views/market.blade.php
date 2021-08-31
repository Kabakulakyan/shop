@extends('example')

@section('main_content') 
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-1" style="background:rgb(87, 128, 121)">
            @foreach($categories as $index => $category)
                <ul class="list-group" style="list-style-type: none;"><button class="btn btn-success" >{{$category->name}}</button>
                {{-- <li>@foreach($categories as $category)
                    {{$category->name}}  @endforeach
                </li> --}}
                {{-- <li>{{}}</li> --}}
                    @foreach($category->productsCategory as $pro)
                    {{-- @dd($pro->image[0]); --}}
                        <a href="#" style="background-color: red ;text-decoration: none; color:wheat ;  border:black 1px solid ; margin-top:5px"  ><img style="width:100%;height:100px" src="{{asset('uploads/'.$pro->image[0]['img'])}}" alt="">{{ $pro->name }} <br> price  {{ $pro->price }} </a href="#">
                            <button style="background-color: aquamarine" class="btn btn-success">buy</button>
                    
                    @endforeach
                </ul>
            @endforeach
            
        </div>
        <div class="col-sm-10">
            
            {{-- @dd($prod->all()); --}}
            <form action="{{route('search')}}" method="get">
                @csrf
                <div class="input-group "  >
                    <div class="form-outline" style="display: flex">
                      <input required="" type="search" id="form1" class="form-control" name="search"  placeholder="search"/>
                      
                    </div>
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            @if(isset($prod))
            @foreach($prod as $pro)
                    {{-- @dd($pro->image[0]); --}}
                        <a href="#" style="background-color: red ;text-decoration: none; color:wheat ;  border:black 1px solid ; margin-top:5pxl; display:flex"  ><img style="width:10%;height:100px" src="{{asset('uploads/'.$pro->image[0]['img'])}}" alt="">{{ $pro->name }} <br> price  {{ $pro->price }} </a href="#">
                            <button style="background-color: aquamarine" class="btn btn-success">buy</button>
                          
                    @endforeach
                    <div class="d-flex justify-content-center" style="    position: absolute;

                    top: 40pc;">
         
                        {{ $prod->links("pagination::bootstrap-4") }}
         
                        </div>
                     <br>
                     <br><br><br>
            @endif
           
           <div style="display: flex;
           flex-direction: column; width:20% ">
                @foreach($products as $pro)
                        {{-- @dd($pro->image[0]);<div style=" margin-top:4px" >  --}}
                    <a  href="#" style="background-color: red ;text-decoration: none; color:wheat ;  border:black 1px solid ; margin-top:1px"  ><img style="width:100%;height:100px" src="{{asset('uploads/'.$pro->image[0]['img'])}}" alt="">{{ $pro->name }} <br> price  {{ $pro->price }} <br> </a href="#">
                        <button style="background-color: aquamarine" class="btn btn-success">buy</button>
                          
                @endforeach
           </div>
           

           {{-- @if(count($prod)) --}}
           
           {{-- @endif --}}

        </div>
        <div class="col-sm-1">
            <button style="position: absolute;
            top: 10px;
            right: 10px;
            width: 200px;
            height: 43px;
            font-size: 15px;
            background-color:yellow;
            color: black;">add to basket<i class="fas fa-shopping-basket" style="position: absolute;
                top: 2px;
                right: 145px;
                width: 50px;
                height: 30px;
                font-size: 35px;
                color: greenyellow;"></i> 
                </button>
               
        </div>
        </div>
    </div>
</div>
@endsection