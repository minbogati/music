

            @include('backend.layouts.header')

            <body class="hold-transition sidebar-mini">
                <div class="wrapper">
            @include('backend.layouts.nav')
            @include('alert')
            @include('backend.layouts.menu')
           
            @yield('content')
        </div>
            @include('backend.layouts.footer')
    


