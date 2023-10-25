<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
    <link rel="stylesheet" href="/css/app.css">
{{--    <script src="js/app.js"></script>--}}
</head>
<body>
<div id="header">
    <h1>This is the LAYOUT:</h1>
</div>
<div id="content">
    @yield('header')
    <h3>This is the CONTENT:</h3>
    @yield('content')
</div>

</body>
</html>
