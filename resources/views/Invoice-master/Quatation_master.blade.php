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
                                                <h4 class="card-title"> </h4>
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
                                                                    <option value="4">Digital Marketing</option>
                                                                </select>
                                                            </div>

                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="mb-3">
                                                            <label for="value-name" class="form-label text-dark">Duration(End)</label>
                                                            <input type="date" id="duration_end_date" name="duration_end_date" class="form-control" placeholder="Enter Value" value="Dyson , H&amp;M, Nike , GoPro , Huawei , Rolex , Zara , Thenorthface">
                                                        </div>

                                                        <div class="mb-3" id="duration_month" style="display:none">
                                                            <label for="value-name" class="form-label text-dark">Duration Month</label>
                                                            <select class="form-select" id="service_provider" name="service_provider" onchange="service_provider()">
                                                                <option value="0">Select</option>
                                                                <option value="1">3 Month</option>
                                                                <option value="2">6 Month</option>
                                                                <option value="3">10 Month</option>
                                                                <option value="4">1 year (12 Month)</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="mb-3">
                                                            <label for="value-name" class="form-label text-dark">Organization </label>
                                                            <input type="text" id="organization" name="organization" class="form-control" placeholder="Enter Value" value="Dyson , H&amp;M, Nike , GoPro , Huawei , Rolex , Zara , Thenorthface">
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



                                </form>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        new Choices('#to_mail', {
                                            removeItemButton: true,
                                            shouldSort: false
                                        });

                                        new Choices('#chcc_mail', {
                                            removeItemButton: true,
                                            shouldSort: false
                                        });
                                    });
                                </script>


                                <script>
                                    $(document).ready(function() {

                                        $("#service_provider").change(function() {
                                            let val = $(this).val();
                                            if (val == 2) {
                                                $("#duration_month").css("display", "block");
                                            } else {
                                                $("#duration_month").css("display", "none");
                                            }
                                        });

                                        $("#quatationdata").on('submit', function(e) {

                                            e.preventDefault();

                                            var quatationdata = new FormData(this);

                                            var service_provider = $("#service_provider").val();

                                            if (service_provider == '') {

                                                swal.fire({
                                                    title:"Fill the service",
                                                    text:"check",
                                                    icon:"error",
                                                    confirmButtonColor:"red",
                                                    cinfirmButtonText:"Okay"
                                                })

                                                return false
                                            }

                                            $.ajax({
                                                url:"{{route('quatationInsert'}}",
                                                method:"POST",
                                                dataType:"JSON",
                                                data:quatationdata,

                                                success:function(response)
                                                {
                                                    swal.fire({
                                                    title:"Successfully created",
                                                    text:"success",
                                                    icon:"success",
                                                    confirmButtonColor:"aqua",
                                                    cinfirmButtonText:"Okay"
                                                })

                                                }

                                            })



                                        })

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