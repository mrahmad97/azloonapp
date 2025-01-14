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
                            Categories
                            <a href="{{ url('create-product') }}" class="btn btn-primary" style="float: right">Create
                                Product</a>
                        </h5>
                    </div>
                    <div class="card-body">

                        <table class="table datatable">
                            <thead>
                                <tr>
                                        <th>SR#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>SubCategory</th>
                                        <th>Brand</th>
                                        <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($products))
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->category->name ?? 'no data' }}</td>
                                            <td>{{ $product->subcategory->name ?? 'no data' }}</td>
                                            <td> {{ $product->brand === '0' ? 'no brand' : $product->brand }}</td>

                                            <td>
                                                <a href="{{ url('view-product' . '/' . $product->id) }}"
                                                    class="btn btn-info btn-sm" title="View"><i
                                                        class="bi bi-eye-fill"></i></a>
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
