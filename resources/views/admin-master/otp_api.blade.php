<!DOCTYPE html>
<html lang="en" class="h-100">

@include('admin-master.head')



<body class="h-100">
    <div class="d-flex flex-column h-100 p-3">
        <div class="d-flex flex-column flex-grow-1">
            <div class="row h-100">
                <div class="col-xxl-7">
                    <div class="row justify-content-center h-100">
                        <div class="col-lg-6 py-lg-5">
                            <div class="d-flex flex-column h-100 justify-content-center">
                                <div class="auth-logo mb-4">
                                    <a href="index.html" class="logo-dark">
                                        <img src="assets/images/logo-dark.png"  alt="logo dark">
                                    </a>

                                    <a href="index.html" class="logo-light">
                                        <img src="assets/images/logo-light.png" height="24" alt="logo light">
                                    </a>
                                </div>



                                <div>
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


                                    <form action="{{url('/postotp')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <h2>Your OTP is: {{ $rand_otp }}</h2>

                                            <label class="form-label" for="example-email">Enter the OTP</label>
                                            <input type="text" id="example-email" name="two_step_otp" class="form-control bg-" placeholder="Enter your OTP">
                                        </div>

                                        <div class="mb-1 text-center d-grid">
                                            <button class="btn btn-soft-primary" type="submit">submit</button>
                                        </div>
                                    </form>

                                    @if(session('failed'))
                                    <div class="alert alert-warning">
                                        {{ session('failed') }}
                                    </div>
                                    @endif

                                    <script>
                                        @if(session('success'))
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success',
                                            text: '{{ session('
                                            success ') }}',
                                            confirmButtonColor: '#3085d6'
                                        });
                                        @endif

                                        @if(session('error'))
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Invalid OTP pls check it',
                                            text: '{{ session('
                                            error ') }}',
                                            confirmButtonColor: '#d33'
                                        });
                                        @endif
                                    </script>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-5 d-none d-xxl-flex">
                    <div class="card h-100 mb-0 overflow-hidden">
                        <div class="d-flex flex-column h-100">
                            <img src="assets/images/small/img-10.jpg" alt="" class="w-100 h-100">
                        </div>
                    </div> <!-- end card -->
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor Javascript (Require in all Page) -->
    <script src="assets/js/vendor.js"></script>

    <!-- App Javascript (Require in all Page) -->
    <script src="assets/js/app.js"></script>

</body>


<!-- Mirrored from techzaa.in/larkon/admin/auth-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Sep 2025 08:38:31 GMT -->

</html>