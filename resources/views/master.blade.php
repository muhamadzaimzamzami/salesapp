<!DOCTYPE html>
<html>
    <head>
        @include('partial.head');
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            @include('partial.topbar')
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            
            <!-- Left Sidebar End -->
            @include('partial.sidebar')
            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                    @yield('content')
                <!-- content -->

                @include('partial.footer')

            </div>
            
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


    @include('partial.script')

    </body>
</html>