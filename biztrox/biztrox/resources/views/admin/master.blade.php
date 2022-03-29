<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Biztrox @yield('title')</title>
    @include('admin.includes.assets.css')
</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    @if(Auth::check())
        @include('admin.includes.header')
        @include('admin.includes.menu')
    @endif

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="{{ Auth::check() ? 'main-content' : '' }}">

        <div class="{{ Auth::check() ? 'page-content' : '' }}">
            @yield('body')
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <!-- end modal -->
        @if(Auth::check())
            @include('admin.includes.footer')
        @endif
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('admin.includes.assets.script')

</body>
</html>
