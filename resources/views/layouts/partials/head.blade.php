<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Social network') }}</title>

<!-- Scripts -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('lib/multiselect/js/jquery.multiselect.min.js') }}"></script>


 <script src="{{ asset('js/app.js') }}" defer></script>


<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('lib/simple-line-icons/css/simple-line-icons.css') }}"  rel="stylesheet">
<link href="{{ asset('lib/font-awesome-4.7.0/css/font-awesome.min.css') }}"  rel="stylesheet">
<link href="{{ asset('lib/multiselect/css/jquery.multiselect.css') }}" rel="stylesheet">




  {{-- <!-- <script src="//{{ Request::getHost() }}:3000/socket.io/socket.io.js"></script>--> --}}


<style>

    @yield('extra-css')

</style>
