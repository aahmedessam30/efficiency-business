<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @routes
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/scss/app.scss'])
    @inertiaHead
</head>
<body>
@inertia
</body>
</html>