@extends('admin.layouts.layout')
@section('admin_page_title')
Edit Category - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Category</h5>
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
                    <form action="{{route('update.cat',$category_info->id)}}" method="POST">
                        @csrf
                        @method('PUT') 
                        <label for="category_name" class="fw-bold mb-2">Give Name of Your Category</label>
                        <input type="text" class="form-control" name="category_name" value="{{$category_info->category_name}}"><br>

                        <button type="submit" class="btn btn-primary w-100">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection