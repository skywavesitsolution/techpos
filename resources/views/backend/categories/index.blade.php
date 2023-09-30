@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-12">
                <a href="{{route('categories.create')}}" class="btn btn-dark btn-sm">Add New</a>
                <div class="my-2"></div>
            </div>
            <div class="col-12">
                <table class="table table-bordered table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Parent</th>
                        <th>Product Count</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $i => $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>
                                {{$category->sub_category?->name}} ({{$category->parent_id}})
                            </td>
                            <td>(0)</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-dark btn-sm">Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-dark btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                {{-- $categories->links() --}}
            </div>
        </div>
    </div>
@endsection
