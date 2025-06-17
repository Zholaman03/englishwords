<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden; /* бүкіл бетке scroll болмайды */
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 16.66666667%; /* col-2 */
            overflow-y: auto;
        }

        .main-content {
            margin-left: 16.66666667%; /* sidebar енімен тең */
            height: 100vh;
            overflow-y: auto;
            padding: 20px;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Sidebar -->
            <nav class="col-2 bg-dark sidebar text-white h-100">
                <div class="position-sticky pt-3">
                    <h3 class="text-center py-3">Admin Panel</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user.profile') }}">
                                Профиль
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user.words') }}">
                                Менің Сөздіктерім
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user.listUsers') }}">
                                Пайдаланушылар тізімі
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.trashedWords') }}">
                                Жойылған сөздер
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-10 px-4 main-content">
                @yield('content')
                
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>