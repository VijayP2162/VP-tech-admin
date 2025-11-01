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

            <!-- Start Container Fluid -->
            <div class="container-fluid">



                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="card-title">
                                        Recent Orders
                                    </h4>

                                    <a href="#!" class="btn btn-sm btn-soft-primary">
                                        <i class="bx bx-plus me-1"></i>Create Order
                                    </a>
                                </div>
                            </div>
                            <!-- end card body -->
                            <div class="table-responsive table-centered">
                                <table class="table mb-0">
                                    <thead class="bg-light bg-opacity-50">
                                        <tr>
                                            <th class="ps-3">
                                                S.No
                                            </th>
                                            <th>
                                                Username</th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Mobile
                                            </th>
                                            <th>
                                                Role
                                            </th>

                                            <th>
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <!-- end thead-->
                                    <tbody>

                                        @foreach($Registeration_List as $Data)
                                        <tr>
                                            <td class="ps-3">
                                                <a href="">{{ $loop->iteration }}</a>
                                            </td>

                                            <td class="ps-3">
                                                <a href="">{{ $Data->username }}</a>
                                            </td>

                                            <td class="ps-3">
                                                <a href="">{{ $Data->email }}</a>
                                            </td>

                                            <td class="ps-3">
                                                <a href="">{{ $Data->mobile }}</a>
                                            </td>

                                            <td class="ps-3">
                                                <a href="">

                                                @if($Data->role==1)

                                                Employee

                                                @else if($Data->role==3)

                                                Admin

                                                @endif
                                


                                                </a>
                                            </td>

                                            <td>
                                                <i class="bx bxs-circle text-success me-1"></i>Completed
                                            </td>



                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <!-- end tbody -->
                                </table>
                                <!-- end table -->
                            </div>
                            <!-- table responsive -->

                            <div class="card-footer border-top">
                                <div class="row g-3">
                                    <div class="col-sm">
                                        <div class="text-muted">
                                            Showing
                                            <span class="fw-semibold">1</span>
                                            of
                                            <span class="fw-semibold">{{$Registeration_List_count}}</span>
                                            orders
                                        </div>
                                    </div>

                                   @include('admin-master.custom-pagination')

                                </div>
                            </div>
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