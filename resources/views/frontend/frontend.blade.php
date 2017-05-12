


<!DOCTYPE html>

<html lang="en">
<head>
    @include('style')


        <meta name="csrf-token" content="{{ csrf_token() }}"/>

</head>
<body style ="background-color:lightgreen;">

@yield('content-list')

</body>
</html>
