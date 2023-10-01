@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="my-0">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <br>
                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="col mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="category"></label>
                            <select id="category" class="form-control" name="parent_id">
                                <option value="">Select Category</option>
                                @foreach($categories as $i => $category)
                                    <option value="{{$category->id}}" data-category-metadata="{{$category->metadata}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-md btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
