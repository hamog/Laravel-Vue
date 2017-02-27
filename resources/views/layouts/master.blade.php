<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel-Vue</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

    <div class="container" id="app">

        @component('components.jumbotron')
            @slot('title')
                Laravel 5.4 and Vue.js 2
            @endslot
            @slot('description')
                The Single page Application is test and implemented by Laravel 5.4 and Vue.js 2.
            @endslot
        @endcomponent

        <ul class="nav nav-tabs">
            <router-link to="/" tag="li" exact>
                <a href="">Home</a>
            </router-link>
            <router-link to="/about" tag="li">
                <a href="">About</a>
            </router-link>
            <router-link to="/contact" tag="li">
                <a href="">Contact</a>
            </router-link>
            <router-link to="/notes" tag="li">
                <a href="#">Notes</a>
            </router-link>
        </ul>

        <router-view></router-view>

    </div>

    <footer>
        <hr>
        <div class="text-center">
            <p>&copy; {{ \Carbon\Carbon::now()->year }} All Rights Reserved. Created By: Hashem Mo</p>
        </div>
    </footer>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
