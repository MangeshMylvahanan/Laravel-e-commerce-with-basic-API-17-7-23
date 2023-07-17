
<?php $__env->startSection('admin-content'); ?>
<div id="addmsgid" style="position: absolute;top:20%;right:10%;background-color:blue;display:none;font-size:10px;">
    Seller added
</div>
<div id="removemsgid" style="position: absolute;top:20%;right:10%;background-color:blue;display:none;font-size:10px;">
    Seller removed
</div>

    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Sellers</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="color: aliceblue;font-size:15px;"> Name</th>
                                    <th style="color: aliceblue;font-size:15px;"> Email </th>
                                    <th style="color: aliceblue;font-size:15px;"> Mobile </th>
                                    <th style="color: aliceblue;font-size:15px;"> Address </th>
                                    <th style="color: aliceblue;font-size:15px;"> Accept </th>
                                    <th style="color: aliceblue;font-size:15px;"> Decline </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($user->seller_name); ?></td>
                                        <td> <?php echo e($user->email); ?> </td>
                                        <td> <?php echo e($user->mobile); ?> </td>
                                        <td> <?php echo e($user->seller_address); ?> </td>
                                        <td><button onclick="addfunc(<?php echo e($user->id); ?>)" class="badge badge-outline-success">Accept</button></td>
                                        <td><button onclick="removefunc(<?php echo e($user->id); ?>)" class="badge badge-outline-danger">Decline</button></td>
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
<script>
    function addfunc(id) {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
        $.ajax({
            url: "/addseller", 
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken, 
            },
            data: {
                user_id: id,
                Token:csrfToken,
            },
            success: function(status) {
                console.log(status.message);
                $("#cart_id").val(status.status);
                $("#addmsgid").show();
                
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
    function removefunc(id) {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
        $.ajax({
            url: "/removeseller", 
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken, 
            },
            data: {
                user_id: id,
                Token:csrfToken,
            },
            success: function(status) {
                console.log(status.message);
                $("#cart_id").val(status.status);
                $("#removemsgid").show();
                
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

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Template\resources\views/Admin/newsellerregisters.blade.php ENDPATH**/ ?>