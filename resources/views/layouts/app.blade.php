<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZYBANK</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .navbar {
            background-color: #333;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar {
            background-color: #444;
            color: white;
            width: 250px;
            height: 100%;
            padding: 1rem;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 0.5rem 0;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            flex: 1;
            padding: 1rem;
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <div style="display: flex; flex: 1;">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Contenu principal -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>