<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.meta')
    @yield('title')
@include('admin.layout.css')
@yield('css')
<style>
.error{
    color:red !important;
    margin-top: 10px;
}
.help-block{
    color:red !important;
    margin-top: 10px;
}
</style>
</head>
<body>
    <!-- Page wrapper start here -->
    <div class="wrapper">
                <!-- Header -->
        @include('admin.layout.header')
                <!-- Header End -->
                <!-- Side bar -->
        @include('admin.layout.sidebar')
                <!--Side bar End -->
       @yield('content')
    </div>
    <!-- Page wrapper end here --> 
@include('admin.layout.modal')
@include('admin.layout.js')
    @yield('js')
</body>
</html>
