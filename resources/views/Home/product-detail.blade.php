@extends('Home.master')
@section('main-content')
    <div class="product-details-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                        <!-- Start Large Image -->
                        <div class="product-large-image product-large-image-horaizontal swiper-container">
                            <div class="swiper-wrapper">
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                    <img src="{{ asset('uploads/' . $products['product_image']) }}" alt="">
                                </div>
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                    <img src="{{ asset('thumb img/' . $products['product_images']) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- End Large Image -->
                        <!-- Start Thumbnail Image -->
                        <div class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                            <div class="swiper-wrapper">
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="{{ asset('uploads/' . $products['product_image']) }}"
                                        alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="{{ asset('thumb img/' . $products['product_images']) }}"
                                        alt="">
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="gallery-thumb-arrow swiper-button-next"></div>
                            <div class="gallery-thumb-arrow swiper-button-prev"></div>
                        </div>
                        <!-- End Thumbnail Image -->
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="product-details-content-area product-details--golden" data-aos="fade-up"
                        data-aos-delay="200">
                        <!-- Start  Product Details Text Area-->
                        <div class="product-details-text">
                            <h4 class="title">{{ $products['product_name'] }}</h4>
                            <div class="price">
                                <p>Price: {{ $products['product_price'] }}/-</p>
                            </div>
                            <div class="price">
                                <p><b>Discount price: {{ $products['product_discountprice'] }}/-</b></p>
                            </div>
                            <p>{{ $products['product_description'] }}</p>
                            <p>Delivery within {{ $products['delivery_days'] }} days</p>
                        </div> <!-- End  Product Details Text Area-->
                        <!-- Start Product Variable Area -->
                        <div class="product-details-variable">
                            <!-- Product Variable Single Item -->
                            <div class="d-flex align-items-center ">
                                <div class="variable-single-item ">
                                    <span>Quantity</span>
                                    <div class="product-variable-quantity">
                                        <input min="1" max="100" value="1" type="number">
                                    </div>
                                </div>

                                <div class="product-add-to-cart-btn">
                                    <form action="/add_to_cart" method="POST">
                                        @csrf
                                        <input type="text" name="product_id" hidden value={{ $products['id'] }}>
                                        <button type="submit" class="btn btn-block btn-lg btn-black-default-hover"
                                            data-bs-toggle="modal" data-bs-target="#modalAddcart">+ Add To Cart</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Start  Product Details Meta Area-->
                            <div class="product-details-meta mb-20">
                                <a href="#" class="icon-space-right"><i class="icon-heart"></i>Add to
                                    wishlist</a>
                            </div> <!-- End  Product Details Meta Area-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Product Details Section -->



    <!-- Start Product Content Tab Section -->
    <div class="product-details-content-tab-section section-top-gap-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-details-content-tab-wrapper" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Product Details Tab Button -->
                        <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                            <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                    Description
                                </a></li>
                            <li><a class="nav-link" data-bs-toggle="tab" href="#specification">
                                    Specification
                                </a></li>
                        </ul> <!-- End Product Details Tab Button -->

                        <!-- Start Product Details Tab Content -->
                        <div class="product-details-content-tab">
                            <div class="tab-content">
                                <!-- Start Product Details Tab Content Singel -->
                                <div class="tab-pane active show" id="description">
                                    <div class="single-tab-content-item">
                                        <p>{{ $products['product_description'] }} </p>
                                        <p>{{ $products['product_name'] }}</p>
                                    </div>
                                </div> <!-- End Product Details Tab Content Singel -->
                                <!-- Start Product Details Tab Content Singel -->
                                <div class="tab-pane" id="specification">
                                    <div class="single-tab-content-item">
                                        <table class="table table-bordered mb-20">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Catagory</th>
                                                    <td>{{ $products['catagory'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Sub catagory</th>
                                                    <td>{{ $products['subcatagory'] }}</td>
                                                <tr>
                                                    <th scope="row">Discount</th>
                                                    <td>{{ $products['product_discount'] }}%</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Seller</th>
                                                    <td>{{ $products['seller_name'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p>{{ $products['product_name'] }}</p>
                                    </div>
                                </div> <!-- End Product Details Tab Content Singel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->
@endsection
<script>
    function addcartfunc(id) {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        $.ajax({
            url: "add_to_cart",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            data: {
                product_id: id,
            },
            success: function(status) {
                // console.log(status.message);
                // $("#cart_id").val(status.status);
                $("#cartmsgid").show();

                setTimeout(function() {
                    $("#cartmsgid").hide();
                }, 3000);

                // $("#cartmsgid").val(status.message);
            },
            error: function(xhr, status, error) {
                console.log(id);
            }
        });
    }
</script>
