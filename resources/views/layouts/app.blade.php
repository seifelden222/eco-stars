<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'إيكو ستارز'))</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#22c55e",
                        "background-light": "#f8fafc",
                        "accent-yellow": "#fbbf24",
                    },
                    fontFamily: {
                        "display": ["Cairo", "sans-serif"],
                        "sans": ["Cairo", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "1rem",
                        "lg": "1.5rem",
                        "xl": "2.5rem",
                    },
                },
            },
        }
    </script>

    <style type="text/tailwindcss">
        body {
            font-family: 'Cairo', sans-serif;
        }
        .star-pattern {
            background-image: radial-gradient(circle at 2px 2px, #22c55e 2px, transparent 0);
            background-size: 48px 48px;
            background-repeat: repeat;
            opacity: 0.05;
        }
        /* تحسينات عامة للهيكل */
        .main-wrapper {
            @apply flex min-h-screen relative z-10;
        }
        .content-area {
            @apply flex-1 flex flex-col min-w-0 bg-background-light;
        }
    </style>
    @stack('styles')
</head>

<body class="font-sans antialiased text-slate-800" x-data="{ open: false }">
    <!-- خلفية النجوم الثابتة -->
    <div class="fixed inset-0 star-pattern pointer-events-none"></div>

    <div class="main-wrapper">
        <!-- تضمين القائمة الجانبية -->
        <x-user-slider>
            <div class="content-area">
                @include('layouts.navigation')

                <!-- عنوان الصفحة (اختياري - كما في Breeze) -->
                @if (isset($header))
                <header class="bg-white/50 backdrop-blur-sm border-b border-slate-100">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
                @endif

                <!-- محتوى الصفحة الرئيسي -->
                <main class="flex-1 relative">
                    <div class="py-6 sm:py-8">
                        @yield('content')
                    </div>
                </main>

                <!-- الفوتر -->
                <footer class="py-8 px-4 border-t border-slate-100 text-center text-slate-400 text-sm font-bold bg-white/30 backdrop-blur-sm">
                    <p>© {{ date('Y') }} إيكو ستارز. جميع الحقوق محفوظة للأبطال.</p>
                </footer>
            </div>
        </x-user-slider>
    </div>

    @stack('scripts')
</body>

</html>