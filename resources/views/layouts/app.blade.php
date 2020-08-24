<!DOCTYPE html>
<html>
@include('partials.header')

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    @include('partials.navbar')



    <!-- Main Sidebar Container -->
    @include('partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.contentheader')

        <!-- Main content -->
        <section class="content">
            @yield('content')
            <!-- Default box -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('partials.footer')


    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('partials.scripts')
<!-- jQuery -->

</body>
</html>
