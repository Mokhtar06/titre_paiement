

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application Laravel</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>
<body>
    <header>
        <!-- <h1>Mon Application Laravel</h1> -->
    </header>

    <div>
        
        @yield('content')
    </div>

    <footer>
        <!-- <p>&copy; 2024 Mon Application Laravel</p> -->
    </footer>

    
</body>
</html>
