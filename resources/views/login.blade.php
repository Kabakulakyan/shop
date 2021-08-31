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
    <body style="background: radial-gradient(#silver, transparent);">
      <div style="    background: radial-gradient(#fbfbfb, transparent);
      width: 350px;
      height: 257px;
      position: relative;
      left: 39%;
      top: 150px;border: rgb(180, 176, 176) solid 1px">
        <form method="post" action="{{route('login_check')}}" style="" class="ml-10px">
          @csrf
          <div class="form-group" style="margin-left: 6px;
          width: 160%;;    ">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}" style="width:60%" >            
            @error('email')
            <div class="invalid-feedback" style="display: inline-block">
              {{ $message }}
            </div>
            @enderror
          </div>
            <div class="form-group" style="margin-left: 6px;width: 160%;">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" style="width:60%">
              @error('password')
              <div class="invalid-feedback" style="display: inline-block">
                  {{ $message }}
              </div>
              @enderror
            </div>        
            <div style="margin-left: 130px;margin-top:20px;">
              <a href="{{route('register')}}" >Registration</a>
            </div>
            <div style="    margin-top: 4px;
            margin-left: 137px;
            border: 0px solid;
            border-radius: 17px ;margin-top: 30px;">
              <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
          </form>
      </div>        
    </body>
    </html>