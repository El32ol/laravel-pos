<!--
=========================================================
* Material Dashboard 2 - v=3.0.2
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
{{-- head --}}
@include('inclouds.head')


<body class="g-sidenav-show  bg-gray-200">


    {{-- aside --}}
    @include('inclouds.aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
         @yield('content')
        <!-- Navbar -->
        {{-- @include('inclouds.navbar') --}}
      
    </main>
     
    {{-- script --}}
    @include('inclouds.scripts')
</body>

</html>
