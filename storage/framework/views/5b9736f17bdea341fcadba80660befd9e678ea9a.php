
<?php $__env->startSection('admin-content'); ?>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="color: aliceblue;font-size:13px;"> Order Id </th>
                                    <th style="color: aliceblue;font-size:13px;"> User Id </th>
                                    <th style="color: aliceblue;font-size:13px;">  Name </th>
                                    <th style="color: aliceblue;font-size:13px;"> Phone </th>
                                    <th style="color: aliceblue;font-size:13px;"> Product </th>
                                    <th style="color: aliceblue;font-size:13px;"> Price </th>
                                    <th style="color: aliceblue;font-size:13px;"> Payment Status </th>
                                    <th style="color: aliceblue;font-size:13px;"> Seller Id</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="font-size:10px;"> <?php echo e($item->payment_id); ?> </td>
                                        <td> <?php echo e($item->user_id); ?> </td>
                                        <td> <?php echo e($item->name); ?> </td>
                                        <td> <?php echo e($item->phone); ?> </td>
                                        <td style="font-size:10px;"> <?php echo e($item->productname); ?> </td>
                                        <td> <?php echo e($item->amount); ?> </td>
                                        <?php if($item->payment_status == 1): ?>
                                        <td><div class="badge badge-outline-success">Success</div></td>
                                        <?php else: ?>
                                        <td><div class="badge badge-outline-danger">Failure</div></td>
                                        <?php endif; ?> 
                                        <td>Adhi Ecom</td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Template\resources\views/Admin/payments.blade.php ENDPATH**/ ?>