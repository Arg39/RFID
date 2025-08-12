<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMA 6</title>
    <!-- Preconnect and Google Fonts first -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    @yield('style')
    <!-- Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        /* Sidebar styles */
        .sidebar {
            width: 256px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background: #f3f4f6;
            z-index: 40;
            border-right: 1px solid #e5e7eb;
            transition: transform 0.3s;
        }

        .main-content {
            transition: margin-left 0.3s;
        }

        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0) !important;
                position: fixed;
                height: 100vh;
                z-index: 40;
                box-shadow: none;
            }

            .main-content {
                margin-left: 256px;
            }
        }

        @media (max-width: 767px) {
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body class="relative @if (isset($withSidebar) && $withSidebar) with-sidebar @endif">
    @if (isset($withSidebar) && $withSidebar)
        <!-- Sidebar wrapper with shared Alpine.js state -->
        <div x-data="{ open: false }" class="relative min-h-screen">
            <!-- Mobile Hamburger -->
            <div class="md:hidden flex items-center justify-between px-4 py-3 bg-white border-b border-gray-200">
                <button @click="open = true" class="text-gray-700 focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <span class="font-bold text-blue-700 text-lg">SMA 6</span>
            </div>
            <!-- Sidebar with Alpine.js open/close -->
            @include('templates.sidebar', ['activeMenu' => $activeMenu ?? null])
            <!-- Overlay hanya satu di sini -->
            <div x-show="open" @click="open = false" class="fixed inset-0 bg-black bg-opacity-40 z-30 md:hidden"
                style="display: none;"></div>
            <div class="main-content">
                @yield('container')
            </div>
        </div>
    @elseif (!isset($withNavbar) || $withNavbar)
        <div>
            @yield('container')
        </div>
    @endif

    <script>
        @yield('script')
    </script>
    <!-- Add Alpine.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        // Toastify global handler
        document.addEventListener("DOMContentLoaded", function() {
            // Helper to show toast and set dismissed flag
            function showToast(message, bgColor, key) {
                if (localStorage.getItem(key) === "1") return;
                Toastify({
                    text: message,
                    duration: 4000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: bgColor,
                    close: true,
                    onClick: function() {
                        localStorage.setItem(key, "1");
                    },
                    callback: function() {
                        localStorage.setItem(key, "1");
                    }
                }).showToast();
            }

            // Success message
            @if (session('success'))
                showToast(@json(session('success')), "#22c55e",
                    "toastify_success_{{ md5(session('success')) }}");
            @endif

            // Error messages (from validation or session)
            @if (session('error'))
                showToast(@json(session('error')), "#ef4444", "toastify_error_{{ md5(session('error')) }}");
            @endif

            @if ($errors && $errors->any())
                @foreach ($errors->all() as $error)
                    showToast(@json($error), "#ef4444", "toastify_error_{{ md5($error) }}");
                @endforeach
            @endif
        });
    </script>
</body>

</html>
