<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
</head>

<body>
    <div id="app">
        <div>
           @include('layouts.partials.navbar')
        </div>

        <main class="py-4">
            @yield('content')
        </main>


    </div>
    @include('layouts.partials.scripts')
</body>

</html>
