@extends('example')
    
@section('main_content')
    <form action="{{url('edit/' . $cat->id) }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="{{$cat->name}}" value="{{$cat->name}}">
        <button>Change</button>
    </form>
@endsection