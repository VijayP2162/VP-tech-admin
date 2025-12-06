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
                                        Quatation Master
                                    </h4>
                                    
                                    <a href="#!" class="btn btn-sm btn-soft-primary">
                                        <i class="bx bx-plus me-1"></i>Email Master
                                    </a>
                                </div>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" value="Enter the Keywords" aria-label="readonly input example"  style="width:200px;margin-left:15px;">
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

                                                Quatation ID</th>
                                            <th>
                                                Service Provider
                                            </th>
                                            <th>
                                                Total Amount
                                            </th>
                                            <th>
                                                Action
                                            </th>


                                        </tr>

                                        <tr>
                                            @foreach($quatation_data as $index=>$master_data)

                                            <td><strong>{{$index+1}}</strong></td>
                                            <td><strong>{{$master_data->created_at}}</strong></td>
                                            <td><strong>{{$master_data->quatation_id}}</strong></td>
                                            <td><strong>
                                                    @if ($master_data->service_provide == 1)
                                                    Portfolio (Single Page)

                                                    @elseif ($master_data->service_provide == 2)
                                                    Static Website (Multiple Page)

                                                    @elseif ($master_data->service_provide == 3)
                                                    Web Application

                                                    @elseif ($master_data->service_provide == 4)
                                                    SEO

                                                    @elseif ($master_data->service_provide == 5)
                                                    Digital Marketing
                                                    @endif

                                                </strong>
                                            </td>
                                            <td> <strong>₹ {{$master_data->quatation_amount}}.00<strong></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ url('/download_invoices/' . $master_data->id) }}" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"><template shadowrootmode="open">
                                                                <style data-style="data-style">
                                                                    :host {
                                                                        display: inline-block;
                                                                        vertical-align: 0
                                                                    }

                                                                    span,
                                                                    svg {
                                                                        display: block
                                                                    }
                                                                </style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                                                    <g fill="none" stroke="currentColor" stroke-width="1.5">
                                                                        <path stroke-linecap="round" d="M9 4.46A9.8 9.8 0 0 1 12 4c4.182 0 7.028 2.5 8.725 4.704C21.575 9.81 22 10.361 22 12c0 1.64-.425 2.191-1.275 3.296C19.028 17.5 16.182 20 12 20s-7.028-2.5-8.725-4.704C2.425 14.192 2 13.639 2 12c0-1.64.425-2.191 1.275-3.296A14.5 14.5 0 0 1 5 6.821"></path>
                                                                        <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0Z"></path>
                                                                    </g>
                                                                </svg>
                                                            </template></iconify-icon></a>
                                                    <a href="{{ url('/download_invoices/' . $master_data->id) }}" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"><template shadowrootmode="open">
                                                                <style data-style="data-style">
                                                                    :host {
                                                                        display: inline-block;
                                                                        vertical-align: 0
                                                                    }

                                                                    span,
                                                                    svg {
                                                                        display: block
                                                                    }
                                                                </style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M4 22h4m12 0h-8m1.888-18.337l.742-.742a3.146 3.146 0 1 1 4.449 4.45l-.742.74m-4.449-4.448s.093 1.576 1.483 2.966s2.966 1.483 2.966 1.483m-4.449-4.45L7.071 10.48c-.462.462-.693.692-.891.947a5.2 5.2 0 0 0-.599.969c-.139.291-.242.601-.449 1.22l-.875 2.626m14.08-8.13L14.93 11.52m-3.41 3.41c-.462.462-.692.692-.947.891q-.451.352-.969.599c-.291.139-.601.242-1.22.448l-2.626.876m0 0l-.641.213a.848.848 0 0 1-1.073-1.073l.213-.641m1.501 1.5l-1.5-1.5"></path>
                                                                </svg>
                                                            </template></iconify-icon></a>
                                                    <a href="{{ url('/download_invoices/' . $master_data->id) }}" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"><template shadowrootmode="open">
                                                                <style data-style="data-style">
                                                                    :host {
                                                                        display: inline-block;
                                                                        vertical-align: 0
                                                                    }

                                                                    span,
                                                                    svg {
                                                                        display: block
                                                                    }
                                                                </style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20.5 6h-17m5.67-2a3.001 3.001 0 0 1 5.66 0m3.544 11.4c-.177 2.654-.266 3.981-1.131 4.79s-2.195.81-4.856.81h-.774c-2.66 0-3.99 0-4.856-.81c-.865-.809-.953-2.136-1.13-4.79l-.46-6.9m13.666 0l-.2 3"></path>
                                                                </svg>
                                                            </template></iconify-icon></a>
                                                </div>
                                            </td>


                                        </tr>
                                        @endforeach;



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