<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

$userId = Session::get('user')['id'];
$payments = DB::table('payments')
    ->where('payments.user_id', $userId)
    ->select('payments.*', 'payments.id as payment_id')
    ->get();
$lastPaymentId = $payments->last()->payment_id;
$currentDate = now()->format('F d, Y');
$payment = $payments->last();
$name = $payment->name;
$amount = $payment->amount;
$address = $payment->address;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        .invoice {
            border: 1px solid #ddd;
            padding: 20px;
            width: 600px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }
        .invoice h2 {
            margin-top: 0;
        }
        .invoice p {
            margin-bottom: 10px;
        }
        .invoice table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice table th,
        .invoice table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="invoice">
        <h2>Invoice</h2>
        <p><strong>Invoice Number:</strong><?php echo e($lastPaymentId); ?></p>
        <p><strong>Date:</strong><?php echo e($currentDate); ?></p>
        <p><strong>Customer Name:</strong> <?php echo e($name); ?></p>
        <p><strong>Address:</strong> <?php echo e($address); ?></p>
    

        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Total:</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <p><strong>Payment Method:</strong></p>
        <p><strong>Payment Status:</strong></p>
    </div>
    <div>
        <center><a href="/" class="btn btn-primary" >Home</a></center>
    </div>

</body>
</html>
<?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Template\resources\views/Home/invoice.blade.php ENDPATH**/ ?>