@extends('layouts.admin')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>product List</h3>   
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right">
                        Create
                    </a>  
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        @if($product->gallery)
                                            <a href="{{ $product->gallery->first()->getUrl() }}" target="_blank">
                                                <img src="{{ $product->gallery->first()->getUrl() }}" width="45px" height="45px">
                                            </a>
                                        @else 
                                            <span class="badge badge-warning">No Image</span>
                                        @endif
                                    </td>
                                    
                                    
                                    
                                  
                                        <!-- @if($product->photo)
                                            <a href="{{ $product->photo->getUrl() }}" target="_blank">
                                                <img src="{{ $product->photo->getUrl() }}" width="50px" height="50px">
                                            </a>
                                        @else
                                            <span class="badge badge-warning">No Image</span>
                                        @endif
                                    </td> -->
                                    <!-- <td>{{ $product->parent->name ?? 'Null' }}</td> -->
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form onclick="return confirm('are you sure ?');" action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                                                @csrf 
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection