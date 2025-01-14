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
                            Product
                        </h5>
                    </div>
                    <div class="card-body mt-3">

                        <form class="row g-3" action="{{ URL::to('save-product') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label for="product_name" class="form-label">Product Title</label>
                                <input type="text" placeholder="Title of your product" class="form-control" name="product_name"
                                    id="product_name" required>
                                @error('product_name')
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="category" class="form-label">Select Category</label>
                                <select name="category_id" class="form-select" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="subcategory" class="form-label">Select Subcategory</label>
                                <select name="subcategory_id" class="form-select" required>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="brand" class="form-label">Select Brand</label>
                                <select name="brand" class="form-select" required>
                                    <option value="0">No Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->title }}">{{ $brand->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" placeholder="Rs:000" class="form-control" name="price"
                                    id="price" required>
                                @error('price')
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="discount_price" class="form-label">Discount Price</label>
                                <input type="number" placeholder="Rs:000" class="form-control" name="discount_price"
                                    id="discount_price" required>
                                @error('discount_price')
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="discount_percentage" class="form-label">Discount Percentage</label>
                                <input type="number" placeholder="00%" class="form-control" name="discount_percentage"
                                    id="discount_percentage" required>
                                @error('discount_percentage')
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="stock" class="form-label">Total Stock</label>
                                <input type="number" placeholder="Add here the quantity" class="form-control" name="stock"
                                    id="stock" required>
                                @error('stock')
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="is_featured" class="form-label">Add to "featured item"</label>
                                <select name="is_featured" class="form-select" required>
                                    <option value="1">yes</option>
                                    <option value="0">no</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="is_trending" class="form-label">Add to "Trending item"</label>
                                <select name="is_trending" class="form-select" required>
                                    <option value="1">yes</option>
                                    <option value="0">no</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="is_trending" class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="1">active</option>
                                    <option value="0">inactive</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="formFileMultiple01" class="form-label">Choose Multiple Images</label>
                                <input class="form-control" type="file" id="formFileMultiple01" name="image[]" multiple>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea name="short_description" id="" class="form-control" cols="30" rows="8" required></textarea>
                                </div>
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
