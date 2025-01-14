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
                            Flashdeals
                            <a href="{{ url('create-flash-deal') }}" class="btn btn-primary" style="float: right">Create
                                Flashdeal</a>
                        </h5>
                    </div>
                    <div class="card-body">

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        SR #
                                    </th>
                                    <th>Product Name</th>
                                    <th>Cover</th>
                                    <th>Original Price</th>
                                    <th>Discounted Price</th>
                                    <th>Discount Percentage</th>
                                    <th>Deal End Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($flashdeals))
                                    @foreach ($flashdeals as $key => $flashdeal)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $flashdeal->product_name }}</td>
                                            <td><img src="{{ Storage::url($flashdeal->product_image) }}" alt="no Image" width="35"
                                                    height="35"></td>
                                            <td>Rs: {{ $flashdeal->original_price }}</td>
                                            <td>Rs: {{ $flashdeal->discounted_price }}</td>
                                            <td>{{ $flashdeal->discount_percentage }}%</td>
                                            <td>{{ $flashdeal->deal_end_time }}hours</td>
                                            <td>
                                                @if ($flashdeal->is_active == '1')
                                                    <span class="bg-success p-1 rounded text-white">Active</span>
                                                @else
                                                    <span class="bg-danger p-1 rounded text-white">InActive</span>
                                                @endif
                                            </td>

                                            <td>
                                                {{-- @if ($flashdeal->status == 1)
                                                    <a href="{{ url('flashdeal-updatestatus/0/' . $flashdeal->id) }}"
                                                        class="btn btn-danger btn-sm" title="In-Active"><i
                                                            class="bi bi-hand-thumbs-down"></i></a>
                                                @else
                                                    <a href="{{ url('flashdeal-updatestatus/1/' . $flashdeal->id) }}"
                                                        class="btn btn-success btn-sm" title="Active"><i
                                                            class="bi bi-hand-thumbs-up"></i></a>
                                                @endif --}}
                                                {{-- <a href="{{ url('edit-flash-deal/' . $flashdeal->id) }}"
                                                    class="btn btn-info btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a> --}}
                                                <a href="{{ url('destroy-flash-deal/' . $flashdeal->id) }}"
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
