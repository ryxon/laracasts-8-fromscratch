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
@if(session('success'))
    <div class="regsuccess fixed top-0 left-1/2 transform -translate-x-1/2 w-1/2 text-center py-2 px-6 bg-blue-300 border-black border-solid border-2">
        {{ session('success') }}
    </div>

    <script type="text/javascript">
        jQuery(function($){
            setTimeout(function(){
                $('.regsuccess').fadeOut();
            }, 6000);
        });
    </script>
@endif

<div class="mx-auto w-3/4">

    {{ $header }}

    <div id="content">
    {{ $slot }}
    </div>

</body>
</html>
