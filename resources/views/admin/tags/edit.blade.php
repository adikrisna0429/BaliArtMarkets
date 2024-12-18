@extends('layouts.admin')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Edit tag List
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-primary float-right">
                        Go Back
                    </a>  
                </h3>  
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tags.update', $tag->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{old('name', $tag->name)}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="'btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
@endsection
