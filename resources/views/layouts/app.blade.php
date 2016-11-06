<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    @include('includes.head')
    <body id="app-layout">

        <!-- Menu -->
        @include('layouts.menu')

        <!-- Container -->
        <div class="container">
            <div class="container-fluid">
                
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @yield('pageTitle')
                    </h1>
                </div>
                <div>
                    @include('flash::message')
                </div>
                @yield('content')
            </div>
        </div>
        <!-- Footer -->
        @include('includes.footer')

        <!-- JavaScripts -->
        @include('includes.javascripts')
        @yield('scripts')

    </body>
</html>
