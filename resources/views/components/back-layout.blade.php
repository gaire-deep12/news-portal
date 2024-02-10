<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div>
    <x-base.back.navbar />
    <div class="container mt-4">
        <div class="row">
            <div class="col-3">
                <x-base.back.sidebar />
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <x-base.back.alert-message />
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>