@extends('example')

@section('main_content') 
<div class="row">
    <div class="col-sm-4"></div>
  
    <div class="col-sm-4">
      
      <form method="post" action="{{route('addProducts')}}" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">User</label>
          <select required name="userId" class="form-control" id="exampleFormControlSelect2">
            @foreach($users as $user)
              <option name="userId" value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Category</label>
          <select required name="category" class="form-control" id="exampleFormControlSelect2">
          @foreach($categories as $category)
            
              <option  value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          
        </div>
    
        {{-- <div class="form-group">
          <label for="exampleInputEmail1">Category_id</label>
          <select name="category" id="cat">
            @foreach($categories as $category)
              <option  value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div> --}}
    
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input required type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" value="{{ old('name') }}">
        </div>
    
        <div class="form-group">
          <label for="exampleInputEmail1">Type</label>
          <input required type="text" name="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type" value="{{ old('Type') }}" >
        </div>
    
        <div class="form-group">
          <label for="exampleInputEmail1">Price</label>
          <input required type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price" value="{{ old('Price') }}" >
        </div>
        {{-- <div class="form-group">
          <label for="exampleInputEmail1">Imag</label>
          <input type="file" name="photo[]" class="form-control" multiple>
        </div> --}}
        <div class="form-group">
          <label for="exampleInputEmail1">Photo</label>
          <input type="file" name="photo[]" class="form-control" id="image" multiple class="nkr" >
        </div>

        <div class="col-sm-4">
          <div id="images" style="width:150px; height:150px">
              
          </div>
      </div>
        {{-- <div class="form-group">
          <label for="exampleInputEmail1">Photo1</label>
          <input type="file" name="photo1" class="form-control"  >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Photo2</label>
          <input type="file" name="photo2" class="form-control"  >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Photo3</label>
          <input type="file" name="photo3" class="form-control"  >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Photo4</label>
          <input type="file" name="photo4" class="form-control"  >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Photo5</label>
          <input type="file" name="photo5" class="form-control"  > --}}
        {{-- </div> --}}
        
        <button type="submit" class="btn btn-primary" style='width: 25%;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          border: 1px black solid;
          border-radius: 0 37px 0 37px;'>Submit</button>
    
          
          
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
      
      $(document).ready(function (e) {
        
        
        $('#image').change(function(){
          
          for (let i = 0; i < this.files.length; i++) {
            console.log(this.files[i])
            let reader = new FileReader();
            reader.onload = (e) => { 
              $('#images').append(`<div> <div id="btn" style="background: white;
    cursor: pointer;
    width: 7%;
    border: 1px #2a6394 solid;
    border-radius: 30px;
    font-weight: 100;
    color: darkgreen;
    height: 23px;">
                x  
              </div><img class="img" src="${e.target.result}"></div>`)
            }
            reader.readAsDataURL(this.files[i]);
            }

          });
          $(document).on('click', '#btn',function(){
              $(this).parent().remove()
            
          })
          
          });
      </script>
    </div>
  </div>
@endsection