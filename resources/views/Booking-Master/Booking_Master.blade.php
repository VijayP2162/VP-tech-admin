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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <h4 class="card-title">Booking Details</h4>
                                    </div>
                                    @include('Booking-Master.room-list')

                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Booking Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form id="bookingdata">

                                                        @csrf
                                                        <div class="modal-body">Name
                                                            <input class="form-control form-control-lg" type="text" placeholder="" aria-label=".form-control-lg example" id="customer_name" name="customer_name">
                                                            Seat No
                                                            <input class="form-control form-control-lg" type="text" placeholder="" id="seatNoInput" aria-label=".form-control-lg example" name="seatNoInput">

                                                            Mobile
                                                            <input class="form-control form-control-lg" type="text" placeholder="" aria-label=".form-control-lg example" id="customer_mobile" name="customer_mobile">
                                                            Booking Date
                                                            <input class="form-control form-control-lg" type="date" placeholder="" aria-label=".form-control-lg example" id="customer_booking_data" name="customer_booking_data">
                                                            Confirm Code
                                                            <input class="form-control form-control-lg" type="text" placeholder="" aria-label=".form-control-lg example" id="customer_confirm_code" name="customer_confirm_code">


                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="submit" name="submit" class="btn btn-primary">
                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                        </form>

                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {

                                                // When the modal is about to be shown
                                                var modal = document.getElementById('exampleModal');
                                                modal.addEventListener('show.bs.modal', function(event) {

                                                    // Button that triggered the modal
                                                    var trigger = event.relatedTarget;

                                                    // Get seat number from data-id
                                                    var seatNumber = trigger.getAttribute('data-id');

                                                    var rand = Math.round(Math.random() * 10000)

                                                    // Set it inside the modal input
                                                    document.getElementById('seatNoInput').value = seatNumber;
                                                    document.getElementById('customer_confirm_code').value = rand;
                                                });

                                            });
                                            $(document).ready(function() {
                                                $("#bookingdata").on('submit', function(e) {
                                                    e.preventDefault();

                                                    // Get values at submit time
                                                    var customer_name = $("#customer_name").val().trim();
                                                    var seatNoInput = $("#seatNoInput").val().trim();
                                                    var customer_mobile = $("#customer_mobile").val().trim();
                                                    var customer_booking_data = $("#customer_booking_data").val().trim();
                                                    var customer_confirm_code = $("#customer_confirm_code").val().trim();

                                                    // Validation
                                                    if (customer_name == '' || seatNoInput == '' || customer_mobile == '' || customer_booking_data == '' || customer_confirm_code == '') {
                                                        Swal.fire({
                                                            title: "Invalid Data",
                                                            text: 'Check Again',
                                                            icon: 'error',
                                                            confirmButtonColor: 'red',
                                                            confirmButtonText: "OK"
                                                        });
                                                        return false;
                                                    }

                                                    // Serialize form data
                                                    var masterdata = $(this).serialize();

                                                    // AJAX call
                                                    $.ajax({
                                                        url: "{{ route('BookingMasterload') }}",
                                                        method: "POST",
                                                        dataType: "json",
                                                        data: masterdata,
                                                        success: function(response) {
                                                            if (response.status == "success") {
                                                                Swal.fire({
                                                                    title: "Booking Successful!",
                                                                    text: "Enjoy your booking.",
                                                                    icon: "success",
                                                                    confirmButtonColor: "green",
                                                                    confirmButtonText: "OK"
                                                                }).then(() => {
                                                                    // Close modal
                                                                    $('#exampleModal').modal('hide');
                                                                    // Optional: reset form
                                                                    $('#bookingdata')[0].reset();
                                                                });
                                                            } else {
                                                                Swal.fire({
                                                                    title: "Error",
                                                                    text: response.message || "Something went wrong",
                                                                    icon: "error",
                                                                    confirmButtonColor: "red"
                                                                });
                                                            }
                                                        },
                                                        error: function(xhr) {
                                                            var errors = xhr.responseJSON.errors;
                                                            var message = "";
                                                            if (errors) {
                                                                message = Object.values(errors).join("\n");
                                                            } else {
                                                                message = "Server error occurred";
                                                            }
                                                            Swal.fire({
                                                                title: "Error",
                                                                text: message,
                                                                icon: "error",
                                                                confirmButtonColor: "red"
                                                            });
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

</body>

</html>