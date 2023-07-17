<?php
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
$userId = Session::get('user')['id'];
$products = DB::table('carts')
    ->join('products', 'carts.product_id', '=', 'products.id')
    ->where('carts.user_id', $userId)
    ->select('products.*', 'carts.id as cart_id')
    ->get();
$totalAmount = 0;
foreach ($products as $item) {
    $totalAmount += $item->product_discountprice;
}
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Laravel 8 - Razorpay Payment Gateway Integration</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">
                        <?php if($message = Session::get('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>
                        <?php if($message = Session::get('success')): ?>
                            <div class="alert alert-success alert-dismissible fade <?php echo e(Session::has('success') ? 'show' : 'in'); ?>"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Success!</strong> <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>
                        <div class="card card-default">
                            <div class="card-header">
                                Laravel 8- Razorpay Payment Gateway Integration
                            </div>
                            <div class="card-body text-center">
                                <form action="/payment" method="POST">
                                    <input type="text" name="orderid" value=<?php echo e($orderId); ?> hidden>
                                    <?php echo csrf_field(); ?>
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"                 data-key="rzp_test_zRyA7WHAPmrtQg"
                                        data-amount=<?php echo e($totalAmount * 100); ?> data-currency="INR" data-buttontext="Pay <?php echo e($totalAmount); ?>/- INR"
                                        data-name="E-Commerce" data-description="Razerpay"
                                        data-image="https://cybercollege.info/wp-content/uploads/2021/06/cropped-logo.png" data-prefill.name="name"
                                        data-prefill.email="email" data-theme.color="#F37254"></script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
<?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Template\resources\views/Home/index.blade.php ENDPATH**/ ?>