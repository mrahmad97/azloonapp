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
                        <h5 class="card-title" style="margin-left:10px; margin-right:10px; padding: 15px 0px 15px 0px;">Create
                            Flashdeal
                        </h5>
                    </div>
                    <div class="card-body mt-3">

                        <form class="row g-3" action="{{ URL::to('save-flash-deal') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" placeholder="Category Name" class="form-control" name="product_name"
                                    id="product_name" required>
                                @error('product_name')
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="product_image" class="form-label">Cover</label>
                                <input type="file" class="form-control" name="product_image" id="product_image" required>
                            </div>
                            <div class="col-md-6">
                                <label for="original_price" class="form-label">Original Price</label>
                                <input type="number" placeholder="Rs.1234" class="form-control" name="original_price"
                                    id="original_price" required>
                                @error('original_price')
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="discounted_price" class="form-label">Discounted Price</label>
                                <input type="number" placeholder="Rs.1234" class="form-control" name="discounted_price"
                                    id="discounted_price" required>
                                @error('discounted_price')
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="discount_percentage" class="form-label">Discounted Percentage %</label>
                                <input type="number" placeholder="00%" class="form-control" name="discount_percentage"
                                    id="discount_percentage" required>
                                @error('discount_percentage')
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="deal_end_time" class="form-label">Deal End time</label>
                                <input type="number" placeholder="e.g. 12 or 24 hours" class="form-control" name="deal_end_time"
                                    id="deal_end_time" required>
                                @error('deal_end_time')
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="cover" class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
