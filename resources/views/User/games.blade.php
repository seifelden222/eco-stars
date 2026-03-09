<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
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
                        "display": ["Cairo", "sans-serif"]
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
        .sidebar-item {
            @apply flex items-center gap-4 px-6 py-4 rounded-2xl transition-all duration-200 text-slate-600 hover:bg-green-50 hover:text-primary font-bold;
        }
        .sidebar-item.active {
            @apply bg-primary text-white shadow-lg shadow-primary/20;
        }
        .circular-progress {
            background: conic-gradient(#22c55e var(--progress), #e2e8f0 0deg);
        }
    </style>
</head>

<body class="bg-background-light text-slate-800 min-h-screen">
    <div class="fixed inset-0 star-pattern pointer-events-none"></div>
    <div class="flex min-h-screen relative z-10">
        <aside class="w-80 bg-white border-l border-slate-100 hidden lg:flex flex-col p-8 sticky top-0 h-screen">
            <div class="flex items-center gap-3 mb-12 px-2">
                <img src="assets/img/log.png" alt="" style="width: 200px;margin-bottom: -50px;margin-right: 20px;">
            </div>
            <nav class="space-y-3 flex-1">
                <a class="sidebar-item" href="home.html">
                    <span class="material-symbols-outlined">grid_view</span>
                    <span>الرئيسية</span>
                </a>
                <a class="sidebar-item" href="subjects.html">
                    <span class="material-symbols-outlined">menu_book</span>
                    <span>دوراتي</span>
                </a>
                <a class="sidebar-item" href="store.html">
                    <span class="material-symbols-outlined">shopping_bag</span>
                    <span>متجري</span>
                </a>
                <a class="sidebar-item active" href="games.html">
                    <span class="material-symbols-outlined">shopping_bag</span>
                    <span>الالعاب</span>
                </a>
                <a class="sidebar-item" href="achievements.html">
                    <span class="material-symbols-outlined">workspace_premium</span>
                    <span>إنجازاتي</span>
                </a>
                <a class="sidebar-item" href="awards.html">
                    <span class="material-symbols-outlined">workspace_premium</span>
                    <span>لوحة الشرف</span>
                </a>
                <a class="sidebar-item" href="profile.html">
                    <span class="material-symbols-outlined">account_circle</span>
                    <span>الملف الشخصي</span>
                </a>
            </nav>
            <div class="mt-auto pt-8 border-t border-slate-100">
                <div class="bg-slate-50 rounded-2xl p-6 relative overflow-hidden">
                    <div class="relative z-10">
                        <p class="text-sm font-bold text-slate-500 mb-2">هل تحتاج مساعدة؟</p>
                        <button class="text-primary font-black text-sm flex items-center gap-2">
                            تواصل معنا
                            <span class="material-symbols-outlined text-sm">arrow_back</span>
                        </button>
                    </div>
                    <span class="material-symbols-outlined absolute -bottom-4 -left-4 text-7xl text-slate-200/50">help</span>
                </div>
            </div>
        </aside>
        <main class="flex-1 flex flex-col min-w-0">
            <header class="bg-white/70 backdrop-blur-md border-b border-slate-100 sticky top-0 z-20 px-8 py-4">
                <div class="max-w-7xl mx-auto flex items-center justify-between">
                    <div class="flex lg:hidden items-center gap-3">
                        <div class="size-10 bg-primary rounded-lg flex items-center justify-center text-white">
                            <span class="material-symbols-outlined">rocket_launch</span>
                        </div>
                    </div>
                    <div class="flex-1 max-w-xl mx-8 hidden md:block">
                        <div class="relative">
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                            <input class="w-full pr-12 pl-4 py-3 bg-slate-100 border-none rounded-xl focus:ring-2 focus:ring-primary/20 text-sm" placeholder="ابحث عن دورة جديدة..." type="text" />
                        </div>
                    </div>
                    <div class="flex items-center gap-6">
                        <div class="bg-yellow-50 px-4 py-2 rounded-full flex items-center gap-2 border border-yellow-100">
                            <span class="material-symbols-outlined text-yellow-500 fill-current">stars</span>
                            <span class="font-black text-yellow-700">1,250</span>
                        </div>
                        <div class="h-10 w-[1px] bg-slate-200"></div>
                        <div class="flex items-center gap-3 group cursor-pointer">
                            <div class="text-left hidden sm:block">
                                <p class="text-sm font-black text-slate-800 leading-none">أحمد البطل</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">المستوى ٥</p>
                            </div>
                            <div class="size-12 rounded-2xl bg-slate-100 border-2 border-white shadow-sm overflow-hidden flex items-center justify-center">
                                <img alt="Avatar" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBFM_xPqGg7BQmVakKf_FVcdfwgHNMWqOElf4JqYMi1Tl3fA6LEX_W0PbaKEwX7LvAm9UvcNdbWU15u15B_FoUUiJGyBGF7TE5nYsLdKPQEmc7hOjkb4tSHqLBq8b7_Wtxc_Lhl0CpkL8q1SbT4nc847G8a1ComfPI69iIIl_11lqgG7ZqQV6zYcEyvJDLtikp31sZhgaPVG6bw3_LQghZVD4olqUjUat1U7LxroH0d6kRLNoL6YihwcA8aZWwI7oBcQnL91FPmFJ8" />
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="max-w-6xl mx-auto p-10 relative z-10">
                <div class="mb-12">
                    <h2 class="text-3xl font-black text-slate-800 dark:text-white mb-3">اختر مغامرتك القادمة! 🚀</h2>
                    <p class="text-lg text-slate-500 font-bold">العب وتعلم واجمع المزيد من النجوم لتطوير مستواك</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700 flex flex-col group hover:-translate-y-2 transition-transform duration-300">
                        <div class="h-56 bg-gradient-to-br from-indigo-500 to-purple-600 relative overflow-hidden flex items-center justify-center">
                            <div class="absolute inset-0 opacity-20 star-pattern"></div>
                            <span class="material-symbols-outlined !text-[100px] text-white opacity-90">rocket</span>
                            <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30">
                                <span class="text-white text-sm font-bold">مغامرة الفضاء</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-1">
                            <div class="mb-6">
                                <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2">جامع النجوم</h3>
                                <p class="text-slate-500 dark:text-slate-400 font-bold">ساعد رائد الفضاء في جمع النجوم وتجنب الكويكبات!</p>
                            </div>
                            <div class="mt-auto pt-4 flex items-center justify-between border-t border-slate-50 dark:border-slate-700">
                                <div class="flex items-center gap-1 text-accent-yellow">
                                    <span class="material-symbols-outlined !text-xl fill-current">star</span>
                                    <span class="font-black">١٠٠+</span>
                                </div>
                                <button class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                                    <a href="game3.html"><span>العب الآن</span></a>
                                    <span class="material-symbols-outlined !text-xl">play_arrow</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700 flex flex-col group hover:-translate-y-2 transition-transform duration-300">
                        <div class="h-56 bg-gradient-to-br from-orange-400 to-red-500 relative overflow-hidden flex items-center justify-center">
                            <div class="absolute inset-0 opacity-20 star-pattern"></div>
                            <span class="material-symbols-outlined !text-[100px] text-white opacity-90">pets</span>
                            <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30">
                                <span class="text-white text-sm font-bold">عالم الحيوان</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-1">
                            <div class="mb-6">
                                <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2">بطاقات الذاكرة</h3>
                                <p class="text-slate-500 dark:text-slate-400 font-bold">اختبر قوة ذاكرتك ووفق بين صور الحيوانات اللطيفة!</p>
                            </div>
                            <div class="mt-auto pt-4 flex items-center justify-between border-t border-slate-50 dark:border-slate-700">
                                <div class="flex items-center gap-1 text-accent-yellow">
                                    <span class="material-symbols-outlined !text-xl fill-current">star</span>
                                    <span class="font-black">٨٠+</span>
                                </div>
                                <button class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                                    <a href="game1.html"><span>العب الآن</span></a>
                                    <span class="material-symbols-outlined !text-xl">play_arrow</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700 flex flex-col group hover:-translate-y-2 transition-transform duration-300">
                        <div class="h-56 bg-gradient-to-br from-blue-400 to-indigo-600 relative overflow-hidden flex items-center justify-center">
                            <div class="absolute inset-0 opacity-20 star-pattern"></div>
                            <span class="material-symbols-outlined !text-[100px] text-white opacity-90">calculate</span>
                            <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30">
                                <span class="text-white text-sm font-bold">رياضيات وعلوم</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-1">
                            <div class="mb-6">
                                <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2">الاختبار السريع</h3>
                                <p class="text-slate-500 dark:text-slate-400 font-bold">تحدى ذكاءك في حل مسائل الرياضيات الممتعة!</p>
                            </div>
                            <div class="mt-auto pt-4 flex items-center justify-between border-t border-slate-50 dark:border-slate-700">
                                <div class="flex items-center gap-1 text-accent-yellow">
                                    <span class="material-symbols-outlined !text-xl fill-current">star</span>
                                    <span class="font-black">١٥٠+</span>
                                </div>
                                <button class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                                    <a href="game2.html"><span>العب الآن</span></a>
                                    <span class="material-symbols-outlined !text-xl">play_arrow</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                    <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700 flex flex-col group hover:-translate-y-2 transition-transform duration-300">
                        <div class="h-56 bg-gradient-to-br from-indigo-500 to-purple-600 relative overflow-hidden flex items-center justify-center">
                            <div class="absolute inset-0 opacity-20 star-pattern"></div>
                            <span class="material-symbols-outlined !text-[100px] text-white opacity-90">rocket</span>
                            <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30">
                                <span class="text-white text-sm font-bold">العاب صديقة للبيئة</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-1">
                            <div class="mb-6">
                                <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2"> سباق الاستدامة</h3>
                                <p class="text-slate-500 dark:text-slate-400 font-bold">سُق عربية الأطفال وتفادى المخلفات</p>
                            </div>
                            <div class="mt-auto pt-4 flex items-center justify-between border-t border-slate-50 dark:border-slate-700">
                                <div class="flex items-center gap-1 text-accent-yellow">
                                    <span class="material-symbols-outlined !text-xl fill-current">star</span>
                                    <span class="font-black">١٠٠+</span>
                                </div>
                                <button class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                                    <a href="game5.html"><span>العب الآن</span></a>
                                    <span class="material-symbols-outlined !text-xl">play_arrow</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700 flex flex-col group hover:-translate-y-2 transition-transform duration-300">
                        <div class="h-56 bg-gradient-to-br from-orange-400 to-red-500 relative overflow-hidden flex items-center justify-center">
                            <div class="absolute inset-0 opacity-20 star-pattern"></div>
                            <span class="material-symbols-outlined !text-[100px] text-white opacity-90">pets</span>
                            <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30">
                                <span class="text-white text-sm font-bold">العاب صديقة البيئة</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-1">
                            <div class="mb-6">
                                <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2"> لعبة الاستدامة</h3>
                                <p class="text-slate-500 dark:text-slate-400 font-bold">اختار كل الحاجات الصح عشان تعدي الليفل</p>
                            </div>
                            <div class="mt-auto pt-4 flex items-center justify-between border-t border-slate-50 dark:border-slate-700">
                                <div class="flex items-center gap-1 text-accent-yellow">
                                    <span class="material-symbols-outlined !text-xl fill-current">star</span>
                                    <span class="font-black">٨٠+</span>
                                </div>
                                <button class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                                    <a href="game4.html"><span>العب الآن</span></a>
                                    <span class="material-symbols-outlined !text-xl">play_arrow</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700 flex flex-col group hover:-translate-y-2 transition-transform duration-300">
                        <div class="h-56 bg-gradient-to-br from-blue-400 to-indigo-600 relative overflow-hidden flex items-center justify-center">
                            <div class="absolute inset-0 opacity-20 star-pattern"></div>
                            <span class="material-symbols-outlined !text-[100px] text-white opacity-90">pets</span>
                            <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30">
                                <span class="text-white text-sm font-bold"> العاب صديقة للبيئة</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-1">
                            <div class="mb-6">
                                <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2"> لعبة البازل</h3>
                                <p class="text-slate-500 dark:text-slate-400 font-bold">ركّب صورة البيئة</p>
                            </div>
                            <div class="mt-auto pt-4 flex items-center justify-between border-t border-slate-50 dark:border-slate-700">
                                <div class="flex items-center gap-1 text-accent-yellow">
                                    <span class="material-symbols-outlined !text-xl fill-current">star</span>
                                    <span class="font-black">١٥٠+</span>
                                </div>
                                <button class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                                    <a href="game6.html"><span>العب الآن</span></a>
                                    <span class="material-symbols-outlined !text-xl">play_arrow</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-16 bg-white/50 dark:bg-slate-800/50 p-10 rounded-[3rem] border-2 border-dashed border-slate-200 dark:border-slate-700 flex flex-col md:flex-row items-center justify-between gap-8">
                    <div class="flex items-center gap-6">
                        <div class="size-20 bg-accent-yellow/20 rounded-3xl flex items-center justify-center text-accent-yellow">
                            <span class="material-symbols-outlined !text-5xl">emoji_events</span>
                        </div>
                        <div>
                            <h4 class="text-xl font-black text-slate-800 dark:text-white">هل تريد فتح المزيد؟</h4>
                            <p class="text-slate-500 font-bold">أكمل الدروس اليومية لفتح ألعاب حصرية جديدة!</p>
                        </div>
                    </div>
                    <button class="bg-slate-800 dark:bg-white text-white dark:text-slate-800 px-10 py-4 rounded-2xl font-black text-lg hover:opacity-90 transition-all whitespace-nowrap">
                        اذهب إلى الدروس
                    </button>
                </div>
            </div>
        </main>

</body>

</html>