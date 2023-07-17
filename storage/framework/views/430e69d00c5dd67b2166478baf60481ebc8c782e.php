
<?php $__env->startSection('admin-content'); ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <form enctype="multipart/form-data" action="/store" method="POST">
                    <div class="col-md-">
                        <label for="validationCustom01" class="form-label text-light">Product Name</label>
                        <input type="text" name="product_name" class="form-control" id="validationCustom01">
                        <span style="display: none" id="producterror"></span>


                    </div>
                    <div class="col-md-">
                        <label for="validationCustom02" class="form-label text-light">Actual Price</label>
                        <input type="text" name="product_price" class="form-control" id="actualpriceid" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter the price.
                        </div>
                    </div>
                    <div class="col-md-">
                        <label for="validationCustom03" class="form-label text-light">Discount</label>
                        <input type="text" name="product_discount" class="form-control" id="discountprsentid" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter the discount.
                        </div>
                    </div>
                    <div class="col-md-">
                        <label for="validationCustom04" class="form-label text-light">Discount Price</label>
                        <input type="text" name="product_discountprice" class="form-control" id="Finalpriceid" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            mandatory.
                        </div>
                    </div>
                    <div class="col-md-">
                        <label for="validationCustom05" class="form-label text-light">Description</label>
                        <textarea style="height: 100px" type="text" name="product_description" class="form-control" id="validationCustom05"
                            required></textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            mandatory.
                        </div>
                    </div>
                    <div class="col-md-">
                        <div>
                            <label for="validationCustom07" class="form-label text-light">Catagory</label>
                            <div>
                                <select style="width: 400px;height:40px;color:white;background-color:rgb(85, 78, 78)"
                                    name="catagory" class="form-select" id="validationCustom07"
                                    onchange="showSubCatagories(this.value)" required>
                                    <option selected disabled value="">choose..</option>
                                    <option value="mens">Mens</option>
                                    <option value="womens">Womens</option>
                                    <option value="babies">Babies</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="validationCustom08" class="form-label text-light">Sub-Catagory</label>
                            <div>
                                <select style="width: 400px;height:40px;color:white;background-color:rgb(85, 78, 78)"
                                    name="subcatagory" class="form-select" id="validationCustom08" required>
                                    <option selected disabled value="">choose..</option>
                                </select>
                            </div>
                            <div class="invalid-feedback">
                                Please select a valid subcatagory.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-">
                        <label for="validationCustom09" class="form-label text-light">Delivery days</label>
                        <input type="text" name="delivery_days" class="form-control" placeholder="from purchase"
                            id="validationCustom09" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            mandatory.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="validationCustom11" class="form-label text-light">Product Main photo</label>
                            <div>
                                <input type="file" name="product_image" class="form-control" id="validationCustom11"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="validationCustom10" class="form-label text-light">Product Photos</label>
                            <div>
                                <input type="file" multiple name="product_images[]" class="form-control"
                                    id="validationCustom10" required>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Please select a product images.
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Add Product</button>
                    </div>
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("discountprsentid").addEventListener("input", function() {
            var price = document.getElementById("actualpriceid").value;

            if (document.getElementById("discountprsentid").value > 100) {
                document.getElementById("discountprsentid").value = 100;

            }
            var discountpersentage = document.getElementById("discountprsentid").value;

            var fprice = (price * discountpersentage) / 100;
            var discountedprice = price - fprice;
            // alert(price);
            document.getElementById("Finalpriceid").value = discountedprice;
        });


        function showSubCatagories(catagory) {
            var subCatagorySelect = document.getElementById("validationCustom08");
            subCatagorySelect.innerHTML = ""; // Clear existing options

            if (catagory === "mens") {
                var options = ["shirts", "pants", "inners"];
            } else if (catagory === "womens") {
                var options = ["tops", "pants", "inners"];
            } else if (catagory === "babies") {
                var options = ["topwear", "bottomwear"];
            }

            options.forEach(function(option) {
                var optionElement = document.createElement("option");
                optionElement.textContent = option;
                subCatagorySelect.appendChild(optionElement);
            });
        }



        // validation
        // var productname = document.getElementById("validationCustom01").value;
        // if (productname.value.trim() === '') {
        //     document.getElementById("validationCustom01").style.border = "5px solid red";
        //     document.getElementById("producterror").value = "please enter product name";
        //     document.getElementById("producterror").style.display = "block";
        // }
        // else{
        //     document.getElementById("validationCustom01").style.border = "5px solid red";
        //     document.getElementById("producterror").value = "please enter product name";
        //     document.getElementById("producterror").style.display = "block";

        // }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Template\resources\views/Admin/productsadd.blade.php ENDPATH**/ ?>