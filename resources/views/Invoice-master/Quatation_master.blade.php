<!DOCTYPE html>
<html lang="en">


@include('admin-master.head')

<body>

    <!-- START Wrapper -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->


        @include('admin-master.top-navbar')


        @include('admin-master.aside-part')



        <!-- ========== App Menu End ========== -->

        <!-- ==================================================== -->
        <!-- Start right Content here -->
        <!-- ==================================================== -->
        <div class="page-content">

            <div class="container-xxl">

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Quatation Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title quatationdata"> </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <form id="quatationdata">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="variant-name" class="form-label text-dark">Service Provider</label>
                                                                <select class="form-select" id="service_provider" name="service_provider" onchange="service_provider()">
                                                                    <option value="0">Select</option>
                                                                    <option value="1">Portfolio (Single Page)</option>
                                                                    <option value="2">Static Website (Mulitiple Page)</option>
                                                                    <option value="3">Web Application</option>
                                                                    <option value="4">SEO</option>
                                                                    <option value="5">Digital Marketing</option>
                                                                </select>
                                                            </div>

                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="mb-3">
                                                            <label for="value-name" class="form-label text-dark">Duration(End)</label>
                                                            <input type="date" id="duration_end_date" name="duration_end_date" class="form-control" placeholder="Enter Value" value="">
                                                        </div>

                                                        <div class="mb-3" id="Domain" style="display:none;">
                                                            <label for="value-name" class="form-label text-dark">Domain</label>
                                                            <input type="text" id="domain_rate" name="domain_rate" class="form-control" placeholder="Enter Value" value=""readonly>
                                                        </div>

                                                        <div class="mb-3" id="Hosting" style="display:none;">
                                                            <label for="value-name" class="form-label text-dark">Hosting</label>
                                                            <input type="text" id="hosting_rate" name="hosting_rate" class="form-control" placeholder="Enter Value" value="" readonly>
                                                        </div>

                                                        <div class="mb-3" id="SEO" style="display:none;">
                                                            <label for="value-name" class="form-label text-dark">SEO</label>
                                                            <input type="text" id="seo_rate" name="seo_rate" class="form-control" placeholder="Enter Value" value="" readonly>
                                                        </div>

                                                        <div class="mb-3" id="digital_marketing" style="display:none;">
                                                            <label for="value-name" class="form-label text-dark">Digitial Marketing</label>
                                                            <input type="text" id="duration_end_date" name="digital_marketing_rate" class="form-control" placeholder="Enter Value" value="" readonly>
                                                        </div>

                                                        <div class="mb-3" id="duration_month" style="display:none">
                                                            <label for="value-name" class="form-label text-dark">Duration Month</label>
                                                            <select class="form-select" id="service_periods" name="service_periods" onchange="service_provider()">
                                                                <option value="0">Select</option>
                                                                <option value="1">3 Month</option>
                                                                <option value="2">6 Month</option>
                                                                <option value="3">10 Month</option>
                                                                <option value="4">1 year (12 Month)</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3" id="total_amount_f" style="display:none">
                                                            <label for="value-name" class="form-label text-dark">Total Amount</label>
                                                            <input type="text" id="total_amout_f" name="total_amout" class="form-control" placeholder="Enter Value" value="" readonly>
                                                        </div>

                                                        <div class="mb-3" id="total_amount_s" style="display:none">
                                                            <label for="value-name" class="form-label text-dark">Total Amount</label>
                                                            <input type="text" id="total_amout_s" name="total_amout" class="form-control" placeholder="Enter Value" value="" readonly>
                                                        </div>



                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="mb-3">
                                                            <label for="value-name" class="form-label text-dark">Organization </label>
                                                            <input type="text" id="organization" name="organization" class="form-control" placeholder="Enter Value" value="">
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="">
                                                            <label for="attribute-id" class="form-label text-dark">Quatation ID</label>
                                                            <input type="text" id="quatation_id" name="quatation_id" class="form-control" placeholder="Enter ID" value="">
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-footer border-top">
                                                <input type="submit" class="btn btn-primary">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>




                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




                                <script>

                                    var service_provider_f=parseInt(document.getElementById("service_provider").value);
                                    $(document).ready(function() {
                                        $(document).ready(function() {
                                            var today = new Date();

                                            // Format day and month with leading zeros
                                            var dd = String(today.getDate()).padStart(2, '0');
                                            var mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based
                                            var yyyy = today.getFullYear();

                                            // Combine into YYYYMMDD
                                            var dateFinal = "QUTO-" + "D"+ dd + "M"+mm;

                                            // Generate 4-digit random number
                                            var ran_id = Math.floor(1000 + Math.random() * 9000);

                                            // Combine date + random number
                                            var quatationId = dateFinal + ran_id;

                                            // Set value to input
                                            $("#quatation_id").val(quatationId);

                                            console.log("Generated Quotation ID:", quatationId);
                                        });



                                        // Show / hide duration month field
                                        $("#service_provider").change(function() {
                                            var val = $(this).val();
                                            if (val == 1 || val == 2 || val == 3 || val == 4 || val == 5) { // If Static Website, SEO, Digital Marketing
                                                $("#duration_month").css("display", "block");
                                            } else {
                                                $("#duration_month").css("display", "none");
                                            }

                                            if (val == 1 || val == 2 || val == 3) {

                                                var Hosting_rate = 2000;
                                                var Domain_rate = 6000;
                                                $("#Domain").css("display", "block");
                                                $("#Hosting").css("display", "block");

                                                $("#total_amount_f").css("display", "block");

                                                $("#domain_rate").val(Domain_rate);
                                                $("#hosting_rate").val(Hosting_rate)
                                            } else {
                                                $("#Domain").css("display", "none");
                                                $("#Hosting").css("display", "none");
                                                $("#total_amount_f").css("display", "none");
                                            }

                                             if (val == 4) {

                                                var seo_r=1500;

                                                $("#SEO").css("display", "block");
                                                $("#total_amount_s").css("display", "block");

                                                $("#seo_rate").val(seo_r);

                                             }else{
                                                $("#SEO").css("display", "none");
                                                $("#total_amount_s").css("display", "none");
                                             }

                                            




                                        });

                                        $("#service_periods").change(function() {

                                            let service_periods = $(this).val();
                                            var Hosting_rate = 2000.00;
                                            var Domain_rate = 6000.00;
                                            var seo_r=1500.00;

                                            if (service_periods == 1) {
                                                let fixed = Hosting_rate + Domain_rate;
                                                let fixed_2=seo_r*3
                                                $("#total_amout_f").val(fixed);
                                                $("#total_amout_s").val(fixed_2);
                                            } else if (service_periods == 2) {
                                                let fixed_2=seo_r*6

                                                let fixed = service_periods * (Hosting_rate + Domain_rate);
                                                $("#total_amout_f").val(fixed);
                                                $("#total_amout_s").val(fixed_2);

                                            } else if (service_periods == 3) {
                                                let fixed_2=seo_r*10

                                                let fixed = service_periods * (Hosting_rate + Domain_rate);
                                                 $("#total_amout_f").val(fixed);
                                                $("#total_amout_s").val(fixed_2);

                                            } else if (service_periods == 4) {
                                                let fixed_2=seo_r*12

                                                let fixed = service_periods * (Hosting_rate + Domain_rate);
                                                $("#total_amout_f").val(fixed);
                                                $("#total_amout_s").val(fixed_2);

                                            }

                                           



                                        });

                                        // Submit form
                                        $("#quatationdata").on('submit', function(e) {
                                            e.preventDefault();

                                            var formData = new FormData(this);

                                            $.ajax({
                                                url: "{{url('/quatationInsert')}}",
                                                method: "POST",
                                                data: formData,
                                                processData: false, // REQUIRED
                                                contentType: false, // REQUIRED
                                                dataType: "json",

                                                success: function(response) {
                                                    Swal.fire({
                                                        title: "Successfully created",
                                                        text: "Your quotation is saved",
                                                        icon: "success"
                                                    });
                                                },

                                                error: function(xhr) {
                                                    console.log(xhr.responseText);

                                                    if (xhr.status === 422) {
                                                        let errors = xhr.responseJSON.errors;
                                                        let msg = "";

                                                        $.each(errors, function(key, value) {
                                                            msg += value + "<br>";
                                                        });

                                                        Swal.fire({
                                                            title: "Validation Error",
                                                            html: msg,
                                                            icon: "error"
                                                        });

                                                    } else {
                                                        Swal.fire("Error", "Server Error", "error");
                                                    }
                                                }

                                            });

                                        });

                                    });
                                </script>






                            </div>
                        </div>

                    </div>

                </div>

            </div>


        </div>

        <!-- Start Container Fluid -->
        <div class="container-fluid">




        </div>
        <!-- End Container Fluid -->

        <!-- ========== Footer Start ========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; Larkon. Crafted by <iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon> <a
                            href="https://1.envato.market/techzaa" class="fw-bold footer-text" target="_blank">Techzaa</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ========== Footer End ========== -->

    </div>
    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->

    </div>
    <!-- END Wrapper -->

    <!-- Vendor Javascript (Require in all Page) -->
    <script src="assets/js/vendor.js"></script>

    <!-- App Javascript (Require in all Page) -->
    <script src="assets/js/app.js"></script>

    <!-- Vector Map Js -->
    <script src="assets/vendor/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="assets/vendor/jsvectormap/maps/world-merc.js"></script>
    <script src="assets/vendor/jsvectormap/maps/world.js"></script>

    <!-- Dashboard Js -->
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/js/pages/app-email.js"></script>

</body>

</html>