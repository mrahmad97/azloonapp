@extends('admin.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @if (Session::has('message'))
                    <div class="row mb-3">
                        <span class="alert alert-{{ Session::get('messageType', 'info') }}">
                            {{ Session::get('message') }}
                        </span>
                    </div>
                @endif

                <div class="card">

                    <div class="card-header card_header p-0">
                        <h5 class="card-title" style="margin-left:10px; margin-right:10px; padding: 15px 0px 15px 0px;">Update
                            Sub Category
                        </h5>
                    </div>
                    <div class="card-body mt-3">

                        <form class="row g-3" action="{{ URL::to('update-sub-category'.'/'.$editSubCategory->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="category_name" class="form-label">Select Category</label>
                                <select name="category_id" id="category_id" class="form-control" value="{{ $editSubCategory->category_id }}" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('category_id')
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="sub_category_name" class="form-label">SubCategory Name</label>
                                <input type="text" placeholder="Sub Category Name" class="form-control" name="sub_category_name"
                                    id="sub_category_name" value="{{$editSubCategory->name}}" required>
                                @error('sub_category_name')
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="cover" class="form-label">Cover</label>
                                <input type="file" class="form-control" name="image" id="image" required>
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="active" {{ $editSubCategory->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $editSubCategory->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
