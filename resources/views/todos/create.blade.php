@extends('layouts.app')

@section('content')
  <h1 class="text-center my-5">Create Todos</h1>
  <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Create new todo</div>
            <div class="card-body">

               @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/store-todos" method="POST">
                    
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="description" placeholder="Description" cols="5" rows="5"></textarea>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Create Todo</button>
                    </div>         
                </form>
            </div> 
        </div>
    </div>   
  </div>  









@endsection