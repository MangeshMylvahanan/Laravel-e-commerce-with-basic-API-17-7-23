
<?php $__env->startSection('admin-content'); ?>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th style="color: aliceblue;font-size:15px;"> Name</th>
                                    
                                    <th style="color: aliceblue;font-size:15px;"> Email </th>
                                    <th style="color: aliceblue;font-size:15px;"> Mobile </th>
                                    <th style="color: aliceblue;font-size:15px;"> Address </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <td> <?php echo e($user->name); ?></td>
                                        <td> <?php echo e($user->email); ?> </td>
                                        <td> <?php echo e($user->mobile); ?> </td>
                                        <td> <?php echo e($user->name); ?> </td>
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

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Template\resources\views/Admin/userdetails.blade.php ENDPATH**/ ?>