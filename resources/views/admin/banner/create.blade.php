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
                            Banner
                        </h5>
                    </div>
                    <div class="card-body mt-3">

                        <form class="row g-3" action="{{ URL::to('save-banner') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-6">
                                <label for="cover" class="form-label">Banner Image</label>
                                <input type="file" class="form-control" name="image" id="image" required>
                            </div>

                            <div class="col-md-6">
                                <label for="banner_link" class="form-label">Banner link</label>
                                <input type="text" placeholder="Put Your 'Product Link' here" class="form-control" name="banner_link"
                                    id="banner_link" required>
                                @error('banner_link')
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="alt_text" class="form-label">Alt Text</label>
                                <input type="text" placeholder="Put the alt text here" class="form-control" name="alt_text"
                                    id="alt_text" required>
                                @error('alt_text')
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="position" class="form-label">Position</label>
                                <select name="position" class="form-select" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
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
