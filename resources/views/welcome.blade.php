<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>إيكو ستارز - اجعل طفلك نجم المستقبل</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

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
                        "primary-dark": "#15803d",
                        "primary-darker": "#166534",
                        "background-light": "#f8faf9",
                    },
                    fontFamily: {
                        "sans": ["Cairo", "sans-serif"]
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
        }
        .star-pattern {
            background-image: radial-gradient(circle at 2px 2px, #22c55e 1px, transparent 0);
            background-size: 48px 48px;
            background-repeat: repeat;
            opacity: 0.06;
        }
        .hero-bg {
            background: linear-gradient(to bottom, #166534 0%, #1e5e3a 30%, #22c55e 55%, #86efac 80%, #ecfdf5 100%);
        }
        .features-bg {
            background: #f0fdf4;
        }
        .stats-bg {
            background: linear-gradient(to bottom, #d1fae5 0%, #ecfdf5 100%);
        }
        .card-gradient {
            background: white;
            border: 1px solid #e0f2e9;
        }
        .card-gradient:hover {
            border-color: #22c55e;
            box-shadow: 0 10px 15px -3px rgba(34,197,94,0.1);
        }
        .high-contrast-text {
            text-shadow: 0 1px 3px rgba(0,0,0,0.4);
        }
        .btn-primary {
            @apply bg-primary hover:bg-primary-dark transition-colors;
        }
    </style>
</head>

<body class="bg-background-light text-slate-900 font-sans">
    <div class="min-h-screen relative overflow-x-hidden">
        <!-- Decorative Backgrounds -->
        <div class="absolute inset-0 star-pattern pointer-events-none -z-10"></div>
        <div class="absolute top-0 left-0 w-full h-[140vh] hero-bg -z-10"></div>

        <!-- Header -->
        <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-lg border-b border-primary/10">
            <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/log.png') }}" alt="Eco Stars" style="width: 190px;">
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-bold text-primary hover:text-primary-dark px-4 py-2 transition-colors">لوحة التحكم</a>
                        @else
                            <a class="hidden sm:block font-bold text-primary hover:text-primary-dark px-4 py-2 transition-colors" href="{{ route('login') }}">تسجيل الدخول</a>
                            <a class="bg-primary text-white font-black px-6 py-2.5 rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-dark transition-all" href="{{ route('register') }}">ابدأ مجاناً</a>
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="relative pt-20 pb-40 overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8 relative z-10">
                    <div class="inline-flex items-center gap-2 bg-white/25 text-white px-5 py-2.5 rounded-full font-bold text-sm backdrop-blur-md high-contrast-text">
                        <span class="material-symbols-outlined text-sm">auto_awesome</span>
                        أفضل منصة تعليمية تفاعلية للأطفال
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-black leading-[1.15] text-white high-contrast-text">
                        اجعل طفلك <br/>
                        <span class="text-white font-extrabold">نجم المستقبل</span>
                    </h1>
                    <p class="text-xl text-slate-100 leading-relaxed max-w-lg font-medium">
                        رحلة تعليمية ممتعة تعتمد على اللعب، تساعد طفلك على اكتساب مهارات القرن الواحد والعشرين في بيئة آمنة ومحفزة.
                    </p>

                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 pt-6">
                        <a href="{{ route('register') }}" class="bg-white text-primary px-10 py-4 rounded-2xl font-black text-xl hover:shadow-2xl transition-all shadow-xl">ابدأ رحلة طفلك الآن</a>
                        <div class="flex items-center gap-4 px-4 py-2">
                            <div class="flex -space-x-3 space-x-reverse">
                                <img alt="User" class="size-10 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=User1&background=random"/>
                                <img alt="User" class="size-10 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=User2&background=random"/>
                                <img alt="User" class="size-10 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=User3&background=random"/>
                            </div>
                            <p class="text-sm font-bold text-white high-contrast-text">انضم إلى <span class="font-black">+١٠,٠٠٠</span> طفل</p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl transform rotate-2 group">
                        <img alt="Child learning" class="w-full h-full object-cover aspect-square transition-transform group-hover:scale-105" src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&q=80&w=800"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        <div class="absolute top-8 left-8 bg-white/95 backdrop-blur-lg p-4 rounded-2xl shadow-xl animate-bounce">
                            <span class="material-symbols-outlined text-4xl text-yellow-500 fill-current">star</span>
                        </div>
                    </div>

                    <div class="absolute -bottom-10 -right-10 bg-white p-6 rounded-3xl shadow-xl flex items-center gap-4 z-20 border border-slate-100 card-gradient">
                        <div class="size-14 bg-primary rounded-full flex items-center justify-center text-white shadow-md">
                            <span class="material-symbols-outlined text-3xl fill-current">military_tech</span>
                        </div>
                        <div>
                            <p class="text-sm text-slate-600 font-bold">إجمالي الجوائز</p>
                            <p class="text-xl font-black text-slate-900">١,٢٥٠+ وسام</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-24 features-bg relative">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-20">
                    <h2 class="text-4xl font-black text-slate-900 mb-6">لماذا يختار الآباء إيكو ستارز؟</h2>
                    <p class="text-lg text-slate-600 font-medium">لقد صممنا منصتنا لتكون بيئة آمنة، تعليمية، ومليئة بالمغامرات التي لا تنتهي.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-10 rounded-3xl card-gradient hover:shadow-lg transition-all group bg-white">
                        <div class="size-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-4xl">joystick</span>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-4">تعلم بالألعاب</h3>
                        <p class="text-slate-600 leading-relaxed font-medium">حولنا المناهج الدراسية إلى تحديات مشوقة تجعل الطفل لا يمل من التعلم.</p>
                    </div>
                    <div class="p-10 rounded-3xl card-gradient hover:shadow-lg transition-all group bg-white">
                        <div class="size-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-4xl">verified_user</span>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-4">بيئة آمنة ١٠٠٪</h3>
                        <p class="text-slate-600 leading-relaxed font-medium">محتوى مراقب ومناسب للأطفال مع حماية كاملة لخصوصيتهم وبياناتهم.</p>
                    </div>
                    <div class="p-10 rounded-3xl card-gradient hover:shadow-lg transition-all group bg-white">
                        <div class="size-16 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-4xl">monitoring</span>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-4">تقارير دورية</h3>
                        <p class="text-slate-600 leading-relaxed font-medium">لوحة تحكم خاصة للأهل لمتابعة تقدم الطفل في كل مهارة يكتسبها.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-20 stats-bg overflow-hidden relative">
            <div class="absolute inset-0 opacity-10 star-pattern"></div>
            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center text-slate-900">
                    <div class="space-y-2">
                        <p class="text-5xl font-black text-primary">+٥٠٠</p>
                        <p class="text-lg font-bold">درس تعليمي</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-5xl font-black text-primary">+١٠٠</p>
                        <p class="text-lg font-bold">لعبة ذكاء</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-5xl font-black text-primary">+٥٠</p>
                        <p class="text-lg font-bold">معلم خبير</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-5xl font-black text-primary">٤.٩/٥</p>
                        <p class="text-lg font-bold">تقييم الأهل</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-slate-900 text-white pt-20 pb-10 relative z-10">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12 mb-20">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-3 mb-6">
                        <img src="{{ asset('assets/img/log.png') }}" alt="Eco Stars" style="width: 220px; filter: brightness(0) invert(1);">
                    </div>
                    <p class="text-slate-300 font-medium leading-relaxed">
                        نحن نؤمن بأن كل طفل لديه موهبة فريدة، مهمتنا هي مساعدتهم على اكتشافها وتنميتها من خلال العلم والمرح.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">الروابط السريعة</h4>
                    <ul class="space-y-4 text-slate-300 font-medium">
                        <li><a class="hover:text-primary transition-colors" href="#">من نحن</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">سياسة الخصوصية</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">الأسئلة الشائعة</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">اتصل بنا</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">الدروس</h4>
                    <ul class="space-y-4 text-slate-300 font-medium">
                        <li><a class="hover:text-primary transition-colors" href="#">اللغة العربية</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">الرياضيات والمنطق</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">العلوم والاكتشاف</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">اللغة الإنجليزية</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">اشترك في نشرتنا</h4>
                    <p class="text-slate-300 font-medium mb-4">احصل على أنشطة تعليمية مجانية كل أسبوع في بريدك.</p>
                    <div class="flex gap-2">
                        <input class="bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-3 flex-1 text-sm focus:ring-2 focus:ring-primary text-white placeholder-slate-400" placeholder="بريدك الإلكتروني" type="email"/>
                        <button class="bg-primary hover:bg-primary-dark p-3 rounded-xl transition-colors">
                            <span class="material-symbols-outlined text-white">send</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-6 pt-10 border-t border-slate-700 text-center text-slate-400 text-sm font-bold">
                <p>جميع الحقوق محفوظة © {{ date('Y') }} إيكو ستارز التعليمية</p>
            </div>
        </footer>
    </div>
</body>
</html>
