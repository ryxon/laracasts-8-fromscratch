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
    <header>
        {{ $header }}
    </header>
</div>
<div id="content">
{{ $slot }}
</div>

</body>
</html>
