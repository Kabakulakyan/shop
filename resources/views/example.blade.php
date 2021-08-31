<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <script src="{{asset('assets/css/js/main.js')}}"></script>  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<body style="background-color:#2a566c ;color:white" >

<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar" style="background-color:#1b7868">
  
{{-- @dd(!auth()->guard()->check())  --}}
  <div class="navbar-nav">
    <ul class="navbar-nav bd-navbar-nav flex-row "  onclick="myFunction(event)">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}" >Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  {{  Request::is('products') ? 'active' : '' }} " href="{{ route('products') }}" >Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  {{ Request::is('page_from_categories') ? 'active' : 'page_from_categories' }}" href="{{ route('page_from_categories') }}" >categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  {{ Request::is('users') ? 'active' : 'users' }}" href="{{ url('users') }}"  >Users</a>
      </li>
      @if(auth()->guard()->check())
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('Home') }}" >Login</a>
        </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}" >register</a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" >Log out</a>
      </li>
      {{-- @else --}}
      
      @endif
      
      
    </ul>
  </div>


  
</header>
<div class="container-fluid	">
  
  @yield('main_content')
</div>



</body>
<script></script>
</html>
{{-- @if(auth()->user()->role == "user") --}}
