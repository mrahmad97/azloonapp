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
                            Brands
                            <a href="{{ url('create-brand') }}" class="btn btn-primary" style="float: right">Create
                                Brand</a>
                        </h5>
                    </div>
                    <div class="card-body">

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        SR #
                                    </th>
                                    <th>Brand Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($brands))
                                    @foreach ($brands as $key => $brand)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $brand->title }}</td>

                                            <td>
                                                <a href="{{ url('destroy-brand/' . $brand->id) }}"
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
