@extends('example')

@section('main_content')
    <button type="submit" class="btn btn-primary" ><a href="{{'categories'}}" style="color: white ">add categories</a></button>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Row</th>
                <th>categories Name</th>
                
            </tr>
        </thead>
        <tbody>
           
                    @foreach ($categories as $category)
                    <tr>   
                    <td> {{$category->id}} </td>
                    <td> {{$category->name}} 
                       </td>
                   
                    </tr>
                    @endforeach
               
            
                  
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $categories->links("pagination::bootstrap-4") }}
        </div>
@endsection