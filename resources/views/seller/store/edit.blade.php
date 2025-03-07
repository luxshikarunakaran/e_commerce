@extends('admin.layouts.layout')
@section('admin_page_title')
Edit Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit store</h5>
                </div>
                <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        <form action="{{route('update.store',$store_info->id)}}" method="POST">
                            @csrf
                            @method('PUT') 
                            <label for="store_name" class="fw-bold mb-2">Give Name of Your store</label>
                            <input type="text" class="form-control" name="store_name" value="{{$store_info->store_name}}"><br>
    
                            <label for="slug" class="fw-bold mb-2">Give Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{$store_info->slug}}"><br>
    
                            <label for="details" class="fw-bold mb-2">Give the details</label>
                            <input type="text" class="form-control" name="details" value="{{$store_info->details}}"><br>
    
                            <button type="submit" class="btn btn-primary w-100">Update Store Details</button>
                </div>
            </div>
        </div>
    </div>

@endsection