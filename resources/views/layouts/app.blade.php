<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title', 'AvoRed E commerce')</title>

    <!-- Styles -->
   
    @if(file_exists(public_path('mix-manifest.json')))
        <link href="/admin/css/app.css" type="text/css" rel="stylesheet">
        {{-- <link href="{{ asset('vendor/avored/css/app.css') }}" rel="stylesheet"> --}}
    @else
        <link href="/admin/css/app.css" rel="stylesheet">
        {{-- <link href="{{ asset('vendor/avored/css/app.css') }}" rel="stylesheet"> --}}
    @endif
</head>

<body>
    <div id="app">
        
        <avored-alert></avored-alert>
        <avored-confirm></avored-confirm>
        <avored-layout inline-template>
            
            <div class="flex items-start">
                <div :class="sidebar ? 'w-16 z-0 transition sidebar-collapsed duration-500' : 'w-64'">
                    @include('avored::partials.sidebar')
                </div>
                <div class="w-full">
                    <div class="w-full">
                    @include('avored::partials.header')
                    @include('avored::partials.flash')
                    @include('avored::partials.breadcrumb')

                    <h1 class="mx-4 px-4 my-3">
                        @yield('page_title')
                    </h1>
                    <div class="rounded p-5 mx-3 my-3 bg-white">
                        <router-view></router-view>
                        @yield('content')
                    </div>

                    @include('avored::partials.footer')
                    </div>
                </div>

            </div>
        </avored-layout>
    </div>
    
    
    {{-- <script src="{{ asset('vendor/avored/js/manifest.js') }}"></script>
    <script src="{{ asset('vendor/avored/js/vendor.js') }}"></script> --}}
    @if(file_exists(public_path('mix-manifest.json')))
        {{-- <script src="{{ mix('vendor/avored/js/avored.js') }}"></script> --}}
        <script src="/admin/js/avored.js"></script>
    @else
        <script src="/admin/js/avored.js"></script>
    @endif
    
    {{-- <script src="{{ asset('vendor/avored/cash-on-delivery/js/cash-on-delivery.js') }}"></script> --}}
    @stack('scripts')
    
    @if(file_exists(public_path('mix-manifest.json')))
        {{-- <script src="{{ mix('vendor/avored/js/app.js') }}"></script> --}}
        <script src="/admin/js/app.js"></script>
    @else
        <script src="/admin/js/app.js"></script>
    @endif
    
</body>

</html>
