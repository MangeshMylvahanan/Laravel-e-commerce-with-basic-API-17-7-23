
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
                                    <th style="color: aliceblue;font-size:15px;"> Image Product name</th>
                                    <th style="color: aliceblue;font-size:15px;"> Price </th>
                                    <th style="color: aliceblue;font-size:15px;"> Discount </th>
                                    <th style="color: aliceblue;font-size:15px;"> Discount Price </th>
                                    <th style="color: aliceblue;font-size:15px;"> Seller Name </th>
                                    <th style="color: aliceblue;font-size:15px;"> Is New </th>
                                    <th style="color: aliceblue;font-size:15px;"> Is Trend </th>
                                    <th style="color: aliceblue;font-size:15px;"> Is Offer </th>
                                    <th style="color: aliceblue;font-size:15px;"> Edit </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo e(asset('uploads/' . $item['product_image'])); ?>" alt="image" />
                                            <span class="pl-2"> <?php echo e($item->product_name); ?></span>
                                        </td>
                                        <td> <?php echo e($item->product_price); ?> </td>
                                        <td> <?php echo e($item->product_discount); ?> </td>
                                        <td> <?php echo e($item->product_discountprice); ?> </td>
                                        <td> <?php echo e($item->seller_name); ?> </td>
                                        <td> <div class="add-items d-flex">
                                            <input type="text" class="form-control todo-list-input" placeholder=<?php echo e($item->is_newest); ?>>
                                            <button class="add btn btn-primary todo-list-add-btn">Yes</button>
                                          </div></td>
                                        <td> <?php echo e($item->is_trending); ?> </td>
                                        <td> <?php echo e($item->is_offer); ?> </td>
                                        <td>
                                        <a href="/admin"><div class="badge badge-outline-success">Edit</div></a>
                                    </td>
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

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Template\resources\views/Admin/viewproducts.blade.php ENDPATH**/ ?>