<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Maintenance parc informatique</title>
    <link rel="stylesheet" href="../css/style.css">
    @vite(['resources/css/app.css'])
</head>

<body>
    @include('template.composants.header')
    @yield('content')
    @include('template.composants.footer')
</body>

</html>
