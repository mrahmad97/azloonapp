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
                            Banners
                            <a href="{{ url('create-banner') }}" class="btn btn-primary" style="float: right">Create
                                Banner</a>
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
                                    <th>Link</th>
                                    <th>Alt Text</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($banners))
                                    @foreach ($banners as $key => $banner)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ Storage::url($banner->image_url) }}" alt="no Image" width="35"
                                                    height="35"></td>
                                            <td>{{ $banner->link }}</td>
                                            <td>{{ $banner->alt_text }}</td>
                                            <td>{{ $banner->position }}</td>
                                            <td>
                                                @if ($banner->is_active == '1')
                                                    <span class="bg-success p-1 rounded text-white">Active</span>
                                                @else
                                                    <span class="bg-danger p-1 rounded text-white">InActive</span>
                                                @endif
                                            </td>

                                            <td>
                                                {{-- <a href="{{ url('edit-banner/' . $banner->id) }}"
                                                    class="btn btn-info btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a> --}}
                                                <a href="{{ url('destroy-banner/' . $banner->id) }}"
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
