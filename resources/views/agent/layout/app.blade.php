<!DOCTYPE html>
<html lang="en">

<head>
    @include('agent.layout.meta')
    @yield('title')
@include('agent.layout.css')
@yield('css')
<style>
.error{
    color:red !important;
    margin-top: 10px;
}
</style>
</head>
<body>
    <!-- Page wrapper start here -->
    <div class="wrapper">
                <!-- Header -->
        @include('agent.layout.header')
                <!-- Header End -->
                <!-- Side bar -->
        @include('agent.layout.sidebar')
                <!--Side bar End -->
       @yield('content')
    </div>
    <!-- Page wrapper end here --> 
@include('agent.layout.modal')
@include('agent.layout.js')
    @yield('js')
</body>
</html>
