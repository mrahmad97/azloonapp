@include('include.header')
  <!-- Bottom Navbar -->
  <div class="container-fluid bottom-nav">
    <div class="row w-100">
        <!-- All Categories Dropdown -->
        <div class="col-md-3 d-flex justify-content-end">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button">
                  <i class="bi bi-list"></i> All Categories
              </a>
              <ul class="dropdown-menu">
                @foreach($categories as $category)
                  <li><a class="dropdown-item" href="#">{{$category->name }} </a></li>
                  @endforeach
              </ul>
          </li>
      </div>


        <!-- Other Navigation Links -->
        <div class="col-md-6 d-flex justify-content-center">
            <li class="nav-item me-4"><a class="nav-link" href="#">Featured</a></li>
            <li class="nav-item me-4"><a class="nav-link" href="#">Flash Deals</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
        </div>
    </div>
</div>






    <!-- navbar ends -->

    <div id="ecommerceCarousel" class="carousel slide mt-3" data-bs-ride="carousel" data-bs-interval="3000">
        <!-- Indicators/Dots -->
        <div class="carousel-indicators">
            @if (!empty($banners) && count($banners) > 0)
                    @foreach ($banners as $key => $banner)
                        <button type="button" data-bs-target="#bannerCarousel"
                                data-bs-slide-to="{{ $key }}"
                                class="{{ $key == 0 ? 'active' : '' }}"
                                aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                @endif
        </div>


     <div class="carousel-inner">
            @if (!empty($banners) && count($banners) > 0)
            @foreach ($banners as $key => $banner)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <a href="{{ $banner->link }}" target="_blank">
                        <img src="{{ asset('storage/' . $banner->image_url) }}" class="d-block w-100"
                            alt="{{ $banner->alt_text }}">
                    </a>
                </div>
            @endforeach
            @endif
    </div>
</div>


<div class="container-fluid">
    <h5 class="mt-2 mb-2">Categories</h5>
    <div class="category-slider position-relative">
        <!-- Previous Button -->
        <button class="slider-nav prev btn position-absolute start-0" onclick="moveSlider(-1)">&#8249;</button>

        <!-- Dynamic Categories Container -->
        <div class="category-container d-flex">
            <!-- Example static data (dynamic rendering in the future) -->
                @foreach($categories as $category)
            <div class="category-item text-center me-3">
                <img src="{{ asset('storage/' . $category->imageURL) }}" alt="{{ $category->name }}">
                <p>{{ $category->name }}</p>
            </div>
            @endforeach
        </div>

        <!-- Next Button -->
        <button class="slider-nav next btn position-absolute end-0" onclick="moveSlider(1)">&#8250;</button>
    </div>
</div>

<div class="container-fluid mt-4">
    <h5 class="mb-2">Flash Deals</h5>
    <div class="row">
        @foreach($randomItems as $randomItem)
        <div class="col-6 col-md-2 mb-3">
            <div class="product-card">
                <!-- Product Image Section -->
                <div class="product-img-container position-relative">
                    @php
                    $images = json_decode($randomItem->image, true);
                @endphp
                @if(!empty($images) && isset($images[0]))
                    <a href="{{ url('item-detail/' . $randomItem->id) }}">
                        <img class="product-img" src="{{ Storage::url($images[0]) }}" alt="Product Image">
                    </a>
                @else
                    <a href="{{ url('item-detail/' . $randomItem->id) }}">
                        <img class="product-img" src="{{ asset('default-image.jpg') }}" alt="Default Image">
                    </a>
                @endif
                    <span class="discount-badge">{{ $randomItem->discount_percentage }}% off</span>
                    <i class="bi bi-cart-plus cart-icon ms-3" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip" title="Add to Cart"></i>
                </div>
                <!-- Product Details Section -->
                <div class="product-details">
                    <h5 class="product-title">{{ $randomItem->title }}</h5>
                    <div class="product-rating">
                        @php
                            $totalReviews = $randomItem->total_reviews ?? 0; // Default to 0 if null
                            $formattedtotalReviews = (int) $totalReviews == $totalReviews ? (int) $totalReviews : $totalReviews; // Remove .00 for whole numbers

                            $rating = $totalReviews === 0 ? 5 : ($randomItem->rating ?? 0); // Full stars if no reviews

                            $formattedRating = (int) $rating == $rating ? (int) $rating : $rating; // Remove .00 for whole numbers

                            $fullStars = floor($rating); // Full stars
                            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // Half star
                            $emptyStars = 5 - $fullStars - $halfStar; // Remaining stars
                        @endphp

                        <span class="stars">
                            @for ($i = 1; $i <= $fullStars; $i++)
                                <span class="star full-star">★</span>
                            @endfor
                            @if ($halfStar)
                                <span class="star half-star">★</span>
                            @endif
                            @for ($i = 1; $i <= $emptyStars; $i++)
                                <span class="star empty-star">★</span>
                            @endfor
                        </span>
                        <span class="rating-count">({{ $formattedtotalReviews }})</span>
                    </div>



                    <div class="product-pricing">
                        <span class="price">RS.{{ $randomItem->discount_price }}</span>
                        <span class="price-discount">RS.{{ $randomItem->price }}</span>
                    </div>
                </div>
                <!-- Product Overlay on Hover -->
                <div class="product-overlay">
                    <button class="btn btn-sm preview-btn">Preview</button>
                    <form action="{{ url('add-to-cart', $randomItem->id) }}" method="POST" style="display:inline;">
                        @csrf
                    <i class="bi bi-heart wishlist-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip" title="Add to Wishlist"></i>
                    </form>
                </div>
            </div>
        </div>
        @endforeach



    </div>
</div>

    {{-- <div class="container-fluid mt-4">
      <h5 class="mb-2">Random Items</h5>
      <div class="row">

      </div>
  </div> --}}


@include('include.footer')
