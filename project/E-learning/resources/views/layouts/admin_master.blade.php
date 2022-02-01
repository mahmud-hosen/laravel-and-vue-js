@include('layouts.admin_header')

<!-- @yield('content') -->

@include('layouts.admin_sidebar')

<!-- <admin-master> </admin-master> -->

    <router-view></router-view>
     <!-- @yield('content') -->


@include('layouts.admin_footer')
