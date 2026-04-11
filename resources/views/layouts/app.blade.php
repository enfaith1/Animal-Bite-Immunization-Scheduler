<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Animal Bite Immunization Scheduler</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        {{-- No Vite build or dev server: avoid ViteManifestNotFoundException; Bootstrap matches navbar/alert markup in this layout --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    @endif

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }
        
        /* Light Mode */
        [data-bs-theme="light"] {
            --bg-primary: #DAF1DE;
            --bg-secondary: #ffffff;
            --text-primary: #051F20;
            --text-secondary: #163832;
            --accent: #9EB698;
            --accent-dark: #235347;
            --accent-deep: #163832;
            --card-bg: #ffffff;
            --border-color: #e0e0e0;
            --shadow: 0 10px 40px rgba(5, 31, 32, 0.08);
            --shadow-hover: 0 20px 60px rgba(5, 31, 32, 0.12);
            --gradient-start: #9EB698;
            --gradient-end: #235347;
            --gradient-dark: #163832;
            --gradient-darkest: #051F20;
        }
        
        /* Dark Mode */
        [data-bs-theme="dark"] {
            --bg-primary: #051F20;
            --bg-secondary: #082826;
            --text-primary: #DAF1DE;
            --text-secondary: #9EB698;
            --accent: #235347;
            --accent-dark: #163832;
            --accent-deep: #082826;
            --card-bg: #082826;
            --border-color: #235347;
            --shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            --shadow-hover: 0 20px 60px rgba(0, 0, 0, 0.4);
            --gradient-start: #235347;
            --gradient-end: #163832;
            --gradient-dark: #082826;
            --gradient-darkest: #051F20;
        }
        
        body {
            background: var(--bg-primary);
            color: var(--text-primary);
        }
        
        /* Navbar */
        .navbar-modern {
            background: linear-gradient(135deg, #051F20 0%, #082826 50%, #163832 100%);
            backdrop-filter: blur(10px);
            box-shadow: var(--shadow);
            padding: 1rem 0;
            border-bottom: 1px solid rgba(158, 182, 152, 0.2);
        }
        
        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.4rem;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #DAF1DE 0%, #9EB698 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-link {
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            color: #9EB698 !important;
            transform: translateY(-2px);
        }
        
        /* Cards */
        .card-modern {
            background: var(--card-bg);
            border: none;
            border-radius: 24px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card-modern:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        
        .card-header-modern {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            color: white;
            padding: 1.5rem;
            border: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        
        /* Buttons */
        .btn-modern {
            border-radius: 12px;
            padding: 10px 24px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }
        
        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .btn-modern:hover::before {
            left: 100%;
        }
        
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, #9EB698 0%, #235347 100%);
            color: white;
        }
        
        .btn-success-custom {
            background: linear-gradient(135deg, #235347 0%, #163832 100%);
            color: white;
        }
        
        .btn-warning-custom {
            background: linear-gradient(135deg, #DAF1DE 0%, #9EB698 100%);
            color: #051F20;
        }
        
        .btn-danger-custom {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
        }
        
        .btn-outline-custom {
            background: transparent;
            border: 2px solid var(--accent);
            color: var(--accent);
        }
        
        .btn-outline-custom:hover {
            background: var(--accent);
            color: white;
        }
        
        /* Tables */
        .table-modern {
            border-radius: 16px;
            overflow: hidden;
        }
        
        .table-modern thead {
            background: linear-gradient(135deg, #235347 0%, #163832 100%);
            color: white;
        }
        
        .table-modern thead th {
            padding: 1rem;
            font-weight: 600;
            border: none;
        }
        
        .table-modern tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid var(--border-color);
        }
        
        .table-modern tbody tr:hover {
            background: rgba(158, 182, 152, 0.1);
            transform: scale(1.01);
        }
        
        .table-modern tbody td {
            padding: 1rem;
            vertical-align: middle;
        }
        
        /* Forms */
        .form-modern {
            borderRadius: 16px;
            border: 2px solid var(--border-color);
            padding: 12px 16px;
            background: var(--bg-secondary);
            color: var(--text-primary);
            transition: all 0.3s ease;
        }
        
        .form-modern:focus {
            border-color: #9EB698;
            box-shadow: 0 0 0 4px rgba(158, 182, 152, 0.2);
            outline: none;
        }
        
        .form-label-modern {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
        
        /* Alerts */
        .alert-modern {
            border-radius: 16px;
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 500;
        }
        
        /* Theme Toggle */
        .theme-toggle-btn {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 50px;
            padding: 8px 20px;
            color: white;
            transition: all 0.3s ease;
        }
        
        .theme-toggle-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }
        
        /* Badges */
        .badge-modern {
            padding: 6px 12px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.75rem;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Stat Cards */
        .stat-card {
            background: linear-gradient(135deg, var(--card-bg) 0%, var(--bg-secondary) 100%);
            border-radius: 20px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            border-color: #9EB698;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #9EB698 0%, #235347 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* User Avatar */
        .user-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #9EB698 0%, #235347 100%);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--bg-primary);
        }
        
        ::-webkit-scrollbar-thumb {
            background: #9EB698;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #235347;
        }
        
        /* Navbar adjustments */
        .navbar-nav {
            align-items: center;
        }
        
        @media (max-width: 992px) {
            .navbar-nav {
                margin-top: 1rem;
            }
            .theme-toggle-btn {
                margin: 5px 0;
                display: inline-block;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-modern sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-syringe me-2"></i>
                Animal Bite Immunization Scheduler
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('patients.index') }}">
                                <i class="fas fa-users me-1"></i> Patients
                            </a>
                        </li>
                    @endauth
                    
                    <!-- Dark/Light Mode Toggle - Visible to everyone -->
                    <li class="nav-item">
                        <button id="themeToggle" class="theme-toggle-btn">
                            <i class="fas fa-moon"></i> <span id="themeText">Dark Mode</span>
                        </button>
                    </li>
                    
                    @auth
                        <li class="nav-item ms-2">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="theme-toggle-btn">
                                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('show.login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('show.register') }}">
                                <i class="fas fa-user-plus me-1"></i> Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5 animate-fade-in">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-modern alert-success alert-dismissible fade show" role="alert" style="background: linear-gradient(135deg, #9EB69820 0%, #23534720 100%); border-left: 4px solid #9EB698;">
                    <i class="fas fa-check-circle me-2" style="color: #9EB698;"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-modern alert-danger alert-dismissible fade show" role="alert" style="background: linear-gradient(135deg, #e74c3c20 0%, #c0392b20 100%); border-left: 4px solid #e74c3c;">
                    <i class="fas fa-exclamation-circle me-2" style="color: #e74c3c;"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script>
        // Dark/Light Mode Toggle
        const themeToggle = document.getElementById('themeToggle');
        const htmlElement = document.documentElement;
        const themeText = document.getElementById('themeText');
        
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            htmlElement.setAttribute('data-bs-theme', savedTheme);
            if (themeText) {
                if (savedTheme === 'dark') {
                    themeToggle.innerHTML = '<i class="fas fa-sun"></i> <span id="themeText">Light Mode</span>';
                } else {
                    themeToggle.innerHTML = '<i class="fas fa-moon"></i> <span id="themeText">Dark Mode</span>';
                }
            }
        }
        
        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                const currentTheme = htmlElement.getAttribute('data-bs-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                htmlElement.setAttribute('data-bs-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                
                if (newTheme === 'dark') {
                    themeToggle.innerHTML = '<i class="fas fa-sun"></i> <span id="themeText">Light Mode</span>';
                } else {
                    themeToggle.innerHTML = '<i class="fas fa-moon"></i> <span id="themeText">Dark Mode</span>';
                }
            });
        }
    </script>
</body>
</html>