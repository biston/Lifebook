<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')

</head>

<body>
    @include('layouts.partials.content')
    @include('layouts.partials.scripts')
</body>

</html>
