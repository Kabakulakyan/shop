@extends('example')

@section('main_content')
<table class="table" style="color: white">
    <thead class="thead-dark">
        <tr>
            <th>Row</th>
            <th>Users Name</th>
             
        </tr>
    </thead>
    <tbody>
       
                @foreach ($users as $user)
                {{-- @dd($user) --}}
                <tr>   
                <td> {{$user->id}} </td>
                <td> {{$user->name}} </td>
              
                </tr>
                @endforeach
           
        
              
    </tbody>
@endsection