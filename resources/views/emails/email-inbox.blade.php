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


            </div>

            <!-- Start Container Fluid -->
            <div class="container-fluid">



                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="card-title">
                                        Email Master
                                    </h4>

                                    <a href="#!" class="btn btn-sm btn-soft-primary">
                                        <i class="bx bx-plus me-1"></i>Email Master
                                    </a>
                                </div>
                            </div>
                            <!-- end card body -->
                            <div class="table-responsive table-centered">
                                <table class="table mb-0">
                                    <thead class="bg-light bg-opacity-10">
                                        <tr>
                                            <th class="ps-3">
                                                S.No
                                            </th>
                                            <th>Date</th>
                                            <th>

                                                Send</th>
                                            <th>
                                                Message
                                            </th>
                                            <th>
                                                Priority
                                            </th>
                                            <th>
                                                Reply
                                            </th>


                                        </tr>


                                        @foreach($inbox_message as $index => $master_data)
                                        <tr>
                                            

                                            @php
                                            $emails = (array) session('email');
                                            @endphp

                                            @if(in_array($master_data->to_email, $emails))
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $master_data->delivery_date }}</td>

                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10"
                                                        opacity=".5"></path>
                                                    <path fill="currentColor"
                                                        d="M16.807 19.011A8.46 8.46 0 0 1 12 20.5a8.46 8.46 0 0 1-4.807-1.489c-.604-.415-.862-1.205-.51-1.848C7.41 15.83 8.91 15 12 15s4.59.83 5.318 2.163c.35.643.093 1.433-.511 1.848M12 12a3 3 0 1 0 0-6a3 3 0 0 0 0 6"></path>
                                                </svg>
                                                {{ $master_data->send_email }}
                                            </td>

                                            <td>
                                                <a href="#"
                                                    onclick="show_message('{{ $master_data->message }}', '{{ $master_data->id }}')">
                                                    {{ $master_data->message }}
                                                </a>
                                            </td>


                                            <td>
                                                @switch($master_data->priority_val)
                                                @case(1)
                                                <span class="badge border border-success text-success px-2 py-1 fs-13">Normal</span>
                                                @break
                                                @case(2)
                                                <span class="badge border border-warning text-warning px-2 py-1 fs-13">Medium</span>
                                                @break
                                                @case(3)
                                                <span class="badge border border-danger text-danger px-2 py-1 fs-13">Urgent</span>
                                                @break
                                                @default
                                                <span class="badge border border-secondary text-secondary px-2 py-1 fs-13">Unknown</span>
                                                @endswitch
                                            </td>

                                            <td>
                                                <a href="{{ route('Email_index') }}" class="btn btn-soft-primary btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            </td>
                                            @else
                                            <!-- If condition fails, fill row with empty cells to keep table aligned -->
                                            <td colspan="4" class="text-center text-muted">Not authorized</td>
                                            @endif
                                        </tr>

                                        @endforeach

                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p id="display_message">Woo-hoo, you're reading this text in a modal!</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <!-- end thead-->

                                        <!-- end tbody -->
                                </table>
                                <!-- end table -->
                            </div>
                            <!-- table responsive -->
                            <script>
                                function show_message(get_message, get_id) {

                                    // Set message dynamically
                                    document.getElementById('display_message').innerText = get_message + get_id;

                                    // Show Bootstrap Modal
                                    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                                    myModal.show();
                                }
                            </script>

                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>

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