<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body style="background: radial-gradient(#387534, yellow)">
  <form method="post" action="{{route('postRequest')}}" style= "background: #547b2a;
position: relative;
width: 27%;
left: 36.5%;
 top:220px 
 margin-top:100px">
@csrf
<div style="    display: flex;
flex-direction: column;
justify-content: center;
align-items: center;color: yellow;"> 
  <div class="form-group" style='    width: 76%; 
  margin-top: 10px;'>
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
    
    @error('email')
    <div class="invalid-feedback" style="display: inline-block" style='    width: 76%;
    
    margin-top: 10px;'>
        {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group" style='    width: 76%;
    
  margin-top: 10px;'>
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" value="{{ old('name') }}">
    
    @error('name')
    <div class="invalid-feedback" style="display: inline-block" >
        {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group" style='    width: 76%;
    
  margin-top: 10px;'>
    <label for="exampleInputEmail1">Surname</label>
    <input type="text" name="surname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Surname" value="{{ old('surname') }}">
    
    @error('surname')
    <div class="invalid-feedback" style="display: inline-block">
        {{ $message }}
    </div>
    @enderror
  </div>
  <br>
    <div class="form-group" style='    width: 76%;
    
    margin-top: -10px;'>
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" >
      
      @error('password')
      <div class="invalid-feedback" style="display: inline-block">
          {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group form-check" style='    width: 76%;
    
    margin-top: 10px;'>
      
    </div>
    <a class="nav-link" href="{{ route('Home') }}" >Login</a>
    <button type="submit" class="btn btn-primary" style='width: 25%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border: 1px black solid;
    border-radius: 0 37px 0 37px'>Submit</button>
</div>
</form>
</body>
</html>


