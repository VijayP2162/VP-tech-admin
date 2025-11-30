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
                                <h4 class="card-title">Email Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form id="self_mail_transaction_master" action="" method="POST">

                                            @csrf
                                            <div class="mb-3">
                                                <label for="product-name" class="form-label">From</label>
                                                <input type="text" id="send_mail" name="send_mail" class="form-control" placeholder="" value="{{session('email')}}" readonly>
                                            </div>

                                    </div>
                                    <div class="col-lg-6">

                                        <label for="product-categories" class="form-label">To</label>

                                        <select class="form-control" id="to_mail" name="to_mail[]" data-choices multiple>
                                            @foreach($email_list as $master_data)
                                            <option value="{{$master_data->email }}">{{ $master_data->email }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-6">
                                        <label for="product-categories" class="form-label">Cc</label>
                                        <select class="form-control" id="chcc_mail" name="chcc_mail[]" data-choices multiple>
                                            @foreach($email_list as $master_data)
                                            <option value="{{ $master_data->email }}">{{ $master_data->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="product-categories" class="form-label">Priority</label>
                                        <select class="form-control" id="" name="Priority">
                                           <option value="0">select</option>
                                           <option value="1">Normal</option>
                                           <option value="2">Medium</option>
                                           <option value="3">Urgent</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Message</label>
                                        <textarea id="message_data" class="form-control mb-3" cols="62" rows="6" name="message_data">
                                    </textarea>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-sm btn-primary">



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

                                        $("#self_mail_transaction_master").on('submit', function(e) {
                                            e.preventDefault();

                                            let formData = new FormData(this);

                                            // Manually append multiselect arrays
                                            let toMail = $("#to_mail").val();
                                            let ccMail = $("#chcc_mail").val();

                                            if (!toMail || toMail.length === 0) {
                                                Swal.fire({
                                                    title: "Insert the To Mail ID",
                                                    text: "Empty Field",
                                                    icon: "error",
                                                });
                                                return false;
                                            }

                                            // Add array values correctly
                                            toMail.forEach(email => formData.append('to_mail[]', email));
                                            ccMail.forEach(email => formData.append('chcc_mail[]', email));

                                            $.ajax({
                                                url: "{{ route('self_mail_communication') }}",
                                                method: "POST",
                                                data: formData,
                                                processData: false,
                                                contentType: false,
                                                dataType: "json",
                                                success: function(response) {
                                                    Swal.fire("Success", "Mail Sent Successfully", "success");
                                                    window.location.reload();
                                                },
                                                error: function() {
                                                    Swal.fire("Error", "Server Error", "error");
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