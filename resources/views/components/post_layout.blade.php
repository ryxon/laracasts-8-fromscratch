<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
{{--    <script src="js/app.js"></script>--}}
</head>
<body>
<div class="mx-auto w-3/4">

    {{ $header }}

    <div id="content">
    {{ $slot }}
    </div>

</body>
</html>
