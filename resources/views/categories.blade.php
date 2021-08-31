@extends('example')
    
@section('main_content')
<div class="container-fluid d-flex justify-content-center mt-4">

    <form method="post" action="{{route('categories')}}" style= "background: #2a527b;
    position: relative;
    width: 27%;
    left: 36.5%;height: 150px;">
        @csrf
       <div  style="display: flex;
       flex-direction: column;
       justify-content: center;
       align-items: center;padding-left: 60px;">
        <div class="form-group">
            <label for="exampleInputEmail1">Add Categories</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Categories name" value="{{ old('name') }}" style='    width: 76%;
    
            margin-top: 10px;'>
            
            @error('name')
            <div class="invalid-feedback" style="display: inline-block">
                {{ $message }}
            </div>
            @enderror
          </div>
       </div>
        
          <button type="submit" class="btn btn-primary" style='width: 25%;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          border: 1px black solid;
          border-radius: 0 37px 0 37px;margin-left: 115px;
    margin-top: 20px;'>Submit</button>
    </form>
        <table class="table" style="    color: white;
        position: relative;
        top: 13pc;">
            <thead class="thead-dark">
                <tr>
                    <th>Row</th>
                    <th>categories Name</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
               
                        @foreach ($categories as $category)
                        <tr>   
                        <td> {{$category->id}} </td>
                        <td> {{$category->name}} 
                           </td>
                        <td>
                            <button class="btn btn-success"> <a href="{{url('/edit/' . $category->id )}}" style="color: #2a527b;
                                text-decoration: none;">edit</a> </button>
                            <button class="btn btn-success"><a href="{{url('/deleate_cat/' . $category->id )}}" style="color: #2a527b;
                                text-decoration: none;">deleate </a></button>
                        </td>
                        </tr>
                        @endforeach
                   
                
                      
            </tbody>
            <div class="d-flex justify-content-center" style="    position: absolute;
            top: 40pc;">
                {{ $categories->links("pagination::bootstrap-4") }}
                </div>
        </table>
</div>
@endsection