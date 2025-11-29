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
                                        <form>
                                            <div class="mb-3">
                                                <label for="product-name" class="form-label">From</label>
                                                <input type="text" id="product-name" class="form-control" placeholder="" value="{{session('email')}}" readonly>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-6">
                                        <form>
                                            <label for="product-categories" class="form-label">To</label>

                                            <select class="form-control" id="choices-multiple-default" data-choices name="choices-multiple-default" multiple>
                                                @foreach($email_list as $master_data)
                                                <option value="{{ $master_data->id }}">{{ $master_data->email }}</option>
                                                @endforeach

                                            </select>


                                    </div>

                                    <div class="col-lg-6">
                                        <form>
                                            <label for="product-categories" class="form-label">Cc</label>

                                            <select class="form-control" id="choices-multiple-default" data-choices name="choices-multiple-default" multiple>
                                                @foreach($email_list as $master_data)
                                                <option value="{{ $master_data->id }}">{{ $master_data->email }}</option>
                                                @endforeach

                                            </select>


                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Message</label>

                                        <div id="snow-editor2" style="height: 200px;" class="ql-container ql-snow">
                                            <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true">
                                                <p><br></p>
                                            </div>
                                            <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                                            <div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="number" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit"  class="btn btn-sm btn-primary">
                                   
                                


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