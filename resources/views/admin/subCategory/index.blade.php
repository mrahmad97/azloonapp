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
                        <h5 class="card-title" style="margin-left:10px; margin-right:10px; padding: 15px 0px 15px 0px;">All
                            Sub Categories
                            <a href="{{ url('create-sub-category') }}" class="btn btn-primary" style="float: right">Create
                                SubCategory</a>
                        </h5>
                    </div>
                    <div class="card-body">

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        SR #
                                    </th>
                                    <th>Cover</th>
                                    <th>Sub Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($subCategories))
                                    @foreach ($subCategories as $key => $subCategory)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ Storage::url($subCategory->imageURL) }}" width="35"
                                                    height="35"></td>
                                            <td>{{ $subCategory->name }}</td>
                                            <td>
                                                @if ($subCategory->status == 'active')
                                                    <span class="bg-success p-1 rounded text-white">Active</span>
                                                @else
                                                    <span class="bg-danger p-1 rounded text-white">InActive</span>
                                                @endif
                                            </td>

                                            <td>
                                                {{-- @if ($category->status == 1)
                                                    <a href="{{ url('category-updatestatus/0/' . $category->id) }}"
                                                        class="btn btn-danger btn-sm" title="In-Active"><i
                                                            class="bi bi-hand-thumbs-down"></i></a>
                                                @else
                                                    <a href="{{ url('category-updatestatus/1/' . $category->id) }}"
                                                        class="btn btn-success btn-sm" title="Active"><i
                                                            class="bi bi-hand-thumbs-up"></i></a>
                                                @endif --}}
                                                <a href="{{ url('edit-sub-category/' . $subCategory->id) }}"
                                                    class="btn btn-info btn-sm" title="Edit"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <a href="{{ url('destroy-sub-category/' . $subCategory->id) }}"
                                                    class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
