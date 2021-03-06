@extends('master.admin.master')

@section('body')

{{--    <div class="row">--}}
{{--        <div class="col-lg-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h4 class="card-title text-center font-weight-bolder">Manage Category</h4>--}}
{{--                    <p class="text-center text-success">{{ Session::get('message') }}</p>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-hover mb-0">--}}

{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>#</th>--}}
{{--                                <th>Category Name</th>--}}
{{--                                <th>Description</th>--}}
{{--                                <th>Image</th>--}}
{{--                                <th>Status</th>--}}
{{--                                <th>Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($categories as $category)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->iteration }}</th>--}}
{{--                                <td>{{ $category->name }}</td>--}}
{{--                                <td>{{ $category->description }}</td>--}}
{{--                                <td><img src="{{ asset($category->image) }}" alt="" width="50" height="50"></td>--}}
{{--                                <td>{{ $category->status == 1 ? 'Active' : 'Inactive' }}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{ route('category.edit', ['id'=> $category->id]) }}" class="btn btn-success btn-sm">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('category.delete', ['id'=> $category->id]) }}" class="btn btn-danger btn-sm">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
    <!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center font-weight-bolder">Manage Category</h4>
                <p class="text-center text-success">{{ Session::get('message') }}</p>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td><img src="{{asset($category->image)}}" alt="" height="100" width="100" /></td>
                        <td>{{ $category->status == 1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            <a href="{{ route('category.edit', ['id'=> $category->id]) }}" class="btn btn-success btn-sm">
                              <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('category.delete', ['id'=> $category->id]) }}" class="btn btn-danger btn-sm">
                               <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection
