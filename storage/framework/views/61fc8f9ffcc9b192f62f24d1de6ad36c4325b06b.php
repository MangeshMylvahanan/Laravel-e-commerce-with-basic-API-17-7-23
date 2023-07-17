<?php
use Illuminate\Support\Facades\DB;
use App\Models\Product;

$mostCommonProducts = DB::table('payments')
    ->select('productId', DB::raw('COUNT(productId) as count'))
    ->groupBy('productId')
    ->orderByDesc('count')
    ->limit(4)
    ->get();
$productIds = $mostCommonProducts->pluck('productId')->toArray();

$trendings = Product::whereIn('id', $productIds)->get();
$products = Product::orderBy('id', 'desc')->take(4)->get();
?>

<?php $__env->startSection('main-content'); ?>
    <!-- Start Hero Slider Section-->
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Start Hero Single Slider Item -->

                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="hero-single-slider-item swiper-slide">
                        <!-- Hero Slider Image -->
                        <div class="hero-slider-bg">
                            <img src="<?php echo e(asset('uploads/' . $item['product_image'])); ?>" alt="">
                        </div>
                        <!-- Hero Slider Content -->
                        <div class="hero-slider-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="hero-slider-content">
                                            <h4 class="subtitle">New collection</h4>
                                            <h2 class="title"><?php echo e($item['product_name']); ?><br>with
                                                <?php echo e($item['product_discount']); ?>% </h2>
                                            <a href="productdetail/<?php echo e($item['id']); ?>"
                                                class="btn btn-lg btn-outline-golden">shop now </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Hero Single Slider Item -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-golden"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>
    <!-- End Hero Slider Section-->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">THE NEW ARRIVALS</h3>
                                <p>Preorder now to receive exclusive deals & gifts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">


                                    <!-- Start Product Default Single Item -->
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product-default-single-item product-color--golden swiper-slide">
                                            <div class="image-box">
                                                <a href="productdetail/<?php echo e($item['id']); ?>" class="image-link">
                                                    <img src="<?php echo e(asset('uploads/' . $item['product_image'])); ?>"
                                                        alt="">
                                                    
                                                </a>
                                                <div class="tag">
                                                    <span>sale</span>
                                                </div>
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalAddcart">Add to Cart</a>
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalQuickview"><i
                                                                class="icon-magnifier"></i></a>
                                                        <a href="#"><i class="icon-heart"></i></a>
                                                        <a href="#"><i class="icon-shuffle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 class="title"><a
                                                            href="product-details-default.html"><?php echo e($item['product_name']); ?></a>
                                                    </h6>
                                                    
                                                </div>
                                                <div class="content-right">
                                                    <span
                                                        class="price"><del>Rs.<?php echo e($item['product_price']); ?>/-</del>Rs.<?php echo e($item['product_discountprice']); ?>/-</span>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- End Product Default Single Item -->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid section-inner-bg">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">BEST SELLERS</h3>
                                <p>Add our best sellers to your weekly lineup.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->
                                    <?php $__currentLoopData = $trendings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product-default-single-item product-color--golden swiper-slide">
                                            <div class="image-box">
                                                <a href="productdetail/<?php echo e($item['id']); ?>" class="image-link">
                                                    <img src="<?php echo e(asset('uploads/' . $data['product_image'])); ?>"
                                                        alt="">
                                                    <img src="<?php echo e(asset('thumb img/' . $data['product_images'])); ?>"
                                                        alt="">
                                                </a>
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalAddcart">Add to Cart</a>
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalQuickview"><i
                                                                class="icon-magnifier"></i></a>
                                                        <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                        <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 class="title"><a
                                                            href="product-details-default.html"><?php echo e($data['product_name']); ?></a>
                                                    </h6>
                                                    
                                                </div>
                                                <div class="content-right">
                                                    <span
                                                        class="price"><del>Rs.<?php echo e($data['product_price']); ?>/-</del>Rs.<?php echo e($data['product_discountprice']); ?>/-</span>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- End Product Default Single Item -->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Template\resources\views/Home/homepage.blade.php ENDPATH**/ ?>