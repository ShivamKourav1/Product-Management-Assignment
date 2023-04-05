<html>
<head>
    <title>
@yield('title')
</title>
</head>

<body>
@include('layouts/header')
@include('layouts/sidebar')

@yield('content')  

@include('layouts/footer')
</body>

</html>