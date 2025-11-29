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
                                        <h4 class="card-title">Transaction Details</h4>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <form action="{{url('transactionData') }}" method="POST">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label for="first-name" class="form-label">Name</label>
                                                        <input type="text" id="username" name="username" class="form-control" placeholder="">
                                                    </div>

                                            </div>
                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label for="last-name" class="form-label">Email</label>
                                                    <input type="text" id="useremail" name="useremail" class="form-control" placeholder="">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label for="your-email" class="form-label">Transaction Amount</label>
                                                    <input type="text" id="transaction_amount" name="transaction_amount" class="form-control" placeholder="">
                                                </div>

                                            </div>
                                            
                                            <div class="col-lg-12">

                                                <div class="mb-3">
                                                    <label for="your-email" class="form-label">Description</label>
                                                    <input type="text" id="description" name="description" class="form-control" placeholder="">
                                                    <input type="hidden" id="user_id" name="user_id" value="{{ session('user_id') }}">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label for="your-number" class="form-label">Transacion Type</label>
                                                    <select class="form-select" id="transaction_type" name="transaction_type">
                                                        <option value="0">Select</option>
                                                        <option value="1">Cr</option>
                                                        <option value="2">Dr</option>

                                                    </select>
                                                </div>
                                                <input type="submit" class="btn btn-success">
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card text-center bg-primary overflow-hidden z-1">
                            <div class="card-body p-4">
                                <h4 class="card-title text-white">Have a Promo Code ?</h4>
                                <div class="position-relative mt-3">
                                    <h1 style="color:white">₹ 1000.00</h1>
                                </div>
                            </div>

                        </div>





                    </div>
                </div>

                <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="card border-0 mb-0">
                                    <div class="card-body">
                                        <form class="">
                                            <div class="row align-items-center">
                                                <div class="col-lg-12">
                                                    <div class="check-icon text-center">
                                                        <img src="assets/images/party.png" alt="" class="img-fluid">
                                                        <h4 class="fw-semibold mt-3">Thank You !</h4>
                                                        <p class="mb-1">Your Transaction Was
                                                            Successful</p>
                                                        <p><span class="text-dark fw-medium">Order Id</span> : #0758267/90</p>
                                                    </div>
                                                    <hr>
                                                    <div class="row justify-content-between">
                                                        <div class="col-lg-4 col-6">
                                                            <span class="fw-semibold text-muted fs-14">Date</span>
                                                            <p class="text-dark fw-medium mt-1">
                                                                23 April, 2024</p>
                                                        </div>
                                                        <div class="col-lg-4 col-6 text-end">
                                                            <span class="fw-semibold text-muted fs-14">Time</span>
                                                            <p class="text-dark fw-medium">
                                                                11:28 AM</p>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-between mt-3 align-items-center">
                                                        <div class="col-lg-6 col-6">
                                                            <span class="fw-semibold text-muted fs-14">To</span>
                                                            <p class="text-dark fw-medium mb-0 mt-1">Gaston Lapierre</p>
                                                            <p class="mb-0">hello@dundermuffilin.com</p>
                                                        </div>
                                                        <div class="col-lg-4 col-6 text-end">
                                                            <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-between mt-3 align-items-center">
                                                        <div class="col-lg-6 col-6">
                                                            <span class="fw-semibold text-muted fs-14">Amount</span>
                                                            <h5 class="fw-medium mt-1">$737.00</h5>
                                                        </div>
                                                        <div class="col-lg-4 col-6 text-end">
                                                            <span class="text-success fw-semibold">Completed <i class="bx bx-check-circle align-middle"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <div data-bs-theme="dark">
                                        <div class="card-footer d-flex align-items-center border-0 bg-body gap-3 rounded">
                                            <div class="rounded-3 avatar bg-light d-flex align-items-center justify-content-center">
                                                <img src="assets/images/card/mastercard.svg" alt="" class="avatar-sm">
                                            </div>
                                            <div class="d-block">
                                                <p class="text-white fw-semibold mb-0">
                                                    Credit/Debit Card</p>
                                                <p class="mb-0 text-white-50">
                                                    <span>Master Card ending
                                                        **** 7812</span>
                                                </p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="#!" class="text-primary fs-30" data-bs-toggle="tooltip" data-bs-title="Download Invoice" data-bs-placement="bottom"><iconify-icon icon="solar:download-square-bold" class="align-middle"><template shadowrootmode="open">
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
                                                                <path fill="currentColor" fill-rule="evenodd" d="M2 12c0-4.714 0-7.071 1.464-8.536C4.93 2 7.286 2 12 2s7.071 0 8.535 1.464C22 4.93 22 7.286 22 12s0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12m10-5.75a.75.75 0 0 1 .75.75v5.19l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72V7a.75.75 0 0 1 .75-.75m-4 10a.75.75 0 0 0 0 1.5h8a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"></path>
                                                            </svg>
                                                        </template></iconify-icon></a>
                                            </div>
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
                                            <th>Date</th>
                                            <th>

                                                Username</th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Transaction Amout
                                            </th>
                                            <th>
                                                Transaction Type
                                            </th>

                                            <th>Cr</th>

                                            <th class="text-end">Dr</th>

                                            <th>

                                            </th>
                                        </tr>


                                    </thead>
                                    @php
                                    $total_amount_dr = 0;
                                    $total_amount_cr = 0;

                                    $final_total_amount=0;
                                    @endphp

                                    @foreach($MasterData as $index => $transData)

                                   @if(\Carbon\Carbon::parse($transData->created_at)->isToday())
 

                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $transData->created_at }}</td>
                                        <td>{{ $transData->user_name }}</td>
                                        <td>{{ $transData->user_email }}</td>
                                        <td>{{ $transData->transaction_amount }}</td>
                                        <td>{{ $transData->transaction_type == 1 ? 'Cr' : 'Dr' }}</td>

                                        <td>
                                            <b style="color:green">
                                                {{ $transData->transaction_type == 1 ? $transData->transaction_amount . '.00' : '-' }}
                                            </b>
                                        </td>

                                        <td class="text-end">
                                            <b style="color:red" >
                                                {{ $transData->transaction_type == 2 ? $transData->transaction_amount . '.00' : '-' }}
                                            </b>

                                            @if($transData->transaction_type == 2)
                                            @php
                                            $total_amount_dr += $transData->transaction_amount;
                                            @endphp
                                            @else
                                            @php
                                            $total_amount_cr += $transData->transaction_amount;
                                            @endphp
                                            @endif



                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach

                                    <tr>
                                        <td colspan="7" class="text-end"><strong>
                                            <b style="color:green">Total Cr: ₹ {{ $total_amount_cr }}.00</b></strong></td>
                                        
                                        <td colspan="6"><strong> <b style="color:red"> Total Dr: ₹ {{ $total_amount_dr }}.00</b></strong></td>
                                        
                                    </tr>

                                    <tr>
                                        <td colspan="8" class="text-end">
                                        <b style="color:blue"><strong>Balance Amount : ₹  {{$total_amount_cr-$total_amount_dr}}</strong></b> 
                                        </td>
                                    </tr>




                                    <!-- end thead-->

                                    <!-- end tbody -->
                                </table>
                                <!-- end table -->
                            </div>
                            <!-- table responsive -->


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