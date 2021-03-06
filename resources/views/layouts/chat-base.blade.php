<!DOCTYPE html>
<html>
<head>
    <title>Larachat-Broadcast</title>
    <link rel="icon" type="image/png" href="https://aldorg.com/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{ mix('css/chat.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container-fluid h-100" id="app">
    @yield('content')
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
