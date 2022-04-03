@extends('master.admin.master')

@section('body')

    <!-- start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center font-weight-bolder mb-4">Edit Category Form</h4>
                    <p class="text-center text-success">{{ Session::get('message') }}</p>

                    <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Category Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="horizontal-email-input" cols="" rows="6">{{ $category->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" accept="image/*" name="image" id="horizontal-password-input"><img src="{{ asset($category->image) }}" alt="" height="100" width="100" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <label for=""><input type="radio" {{ $category->status == 1 ? 'checked' : '' }} name="status" value="1" />Active</label>
                                <label for=""><input type="radio" {{ $category->status == 0 ? 'checked' : '' }} name="status" value="0" />Inactive</label>

                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
