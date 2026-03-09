<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'إيكو ستارز'))</title>

    <!-- Fonts & Icons -->
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
                        "primary": "#21c488",
                        "background-light": "#f6f8f7",
                        "background-dark": "#12201b",
                    },
                    fontFamily: {
                        "display": ["Cairo", "Lexend", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>

    <style type="text/tailwindcss">
        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(to bottom, #e8f5e9 0%, #ffffff 70%);
        }
        .star-pattern {
            background-image: radial-gradient(circle at 2px 2px, #21c488 1px, transparent 0);
            background-size: 40px 40px;
            background-repeat: repeat;
            opacity: 0.08;
        }
        .floating-star {
            @apply absolute text-primary opacity-30 pointer-events-none;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(-5deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        .floating-rocket { animation: float 4s ease-in-out infinite; }
    </style>
</head>

<body class="font-display text-slate-900 min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="absolute inset-0 star-pattern pointer-events-none"></div>

    <!-- Floating Decorative Stars -->
    <span class="material-symbols-outlined floating-star top-[10%] left-[15%] !text-4xl">stars</span>
    <span class="material-symbols-outlined floating-star top-[20%] right-[10%] !text-2xl">stars</span>
    <span class="material-symbols-outlined floating-star bottom-[15%] left-[10%] !text-3xl">stars</span>
    <span class="material-symbols-outlined floating-star bottom-[25%] right-[20%] !text-5xl">stars</span>

    {{ $slot }}

    @stack('scripts')
</body>

</html>