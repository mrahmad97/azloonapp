@extends('admin.app')

@section('content')

<section class="section profile">

    @if (Session::has('message'))
        <div class="row mb-2">
            <span class="alert alert-info">
                {{ Session::get('message') }}
            </span>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#project-overview">Overview</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#product-sale-detail">Sale
                                Detail</button>
                        </li>

                        {{-- <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#product-shipping-detail">Shipping Detail</button>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#product-promotion-detail">Promotion Detail</button>
                        </li> --}}

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#images">Images</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#description">Description</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#product_action">Action</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="project-overview">

                            <h5 class="card-title">Product Detail</h5>

                            <div class="row mb-1">
                                <div class="col-lg-3 col-md-4 label ">Title</div>
                                <div class="col-lg-9 col-md-8">{{ $product->title }}</div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-lg-3 col-md-4 label">Category</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">
                                    {{ $product->category->name ?? '' }}</div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-lg-3 col-md-4 label">Sub_Category</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">
                                    {{ $product->subcategory->name ?? '' }}</div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-lg-3 col-md-4 label">Brand</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">
                                    {{ $product->brand === '0' ? 'no brand' : $product->brand }}
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-lg-3 col-md-4 label">Created at</div>
                                <div class="col-lg-9 col-md-8">{{ $product->created_at }}</div>
                            </div>
                        </div>

                        <div class="tab-pane fade show profile-overview" id="product-sale-detail">
                            <h5 class="card-title">Product Sale Detail </h5>
                            <div class="row mb-1">
                                <div class="col-lg-3 col-md-4 label">Price</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">Rs. {{ $product->price }}
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-lg-3 col-md-4 label">Discount Price</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">Rs. {{ $product->discount_price }}</div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-lg-3 col-md-4 label">Discount Percentage</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">{{ $product->discount_percentage }} %</div>
                            </div>
                        </div>

                        {{-- <div class="tab-pane fade show profile-overview" id="product-shipping-detail">
                            <h5 class="card-title">Shipping Detail</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Shipping Id</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">{{ $product->shipping->id ?? '' }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Shipping Title</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">
                                    {{ $product->shipping->shipping_title ?? '' }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Shipping Cost</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">
                                    {{ $product->shipping->shipping_cost ?? '' }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Created At</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">
                                    {{ $product->shipping->created_at ?? '' }}</div>
                            </div>

                        </div> --}}

                        {{-- <div class="tab-pane fade show profile-overview" id="product-promotion-detail">
                            <h5 class="card-title">Promotion Detail</h5>


                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Promotion</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">
                                    {{ $product->promotion ? 'Yes' : 'No' }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Promotion Id</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">{{ $product->promotion_id ?? '' }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Promotion Title</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">
                                    {{ $product->ProductPromotion->promotion_title ?? '' }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Promotion Price</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">
                                    {{ $product->ProductPromotion->promotion_price ?? '' }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Discription</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">
                                    {{ $product->ProductPromotion->description ?? '' }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Created At</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">
                                    {{ $product->ProductPromotion->created_at ?? '' }}</div>
                            </div>

                        </div> --}}

                        <div class="tab-pane fade show profile-overview" id="images">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Images</div>
                                <div class="col-lg-9 col-md-8">
                                    @php
                                        $images = json_decode($product->image, true); // Decode the JSON-encoded images
                                    @endphp

                                    @if(!empty($images))
                                        @foreach ($images as $image)
                                            <img src="{{ asset('storage/' . $image) }}" alt="Product Image" style="max-width: 100px; margin: 5px; border: 1px solid #ddd; border-radius: 5px;">
                                        @endforeach
                                    @else
                                        <p>No images available for this product.</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade show profile-overview" id="description">

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Description</div>
                                <div class="col-lg-9 col-md-8 text-uppercase">{{ $product->description }}</div>
                            </div>
                        </div>

                        <div class="tab-pane fade show profile-overview" id="product_action">
                            <h5 class="card-title">Delete Product</h5>
                            <div>
                                <a href="{{ url('destroy-product', ['id' => $product->id]) }}"
                                    class="btn btn-danger btn-sm">Delete</a>

                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>

</section>

@endsection
