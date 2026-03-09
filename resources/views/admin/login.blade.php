<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>تسجيل دخول الإدارة - إيكو ستارز</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#22c55e",
                        "background-light": "#f8fafc",
                        "admin-dark": "#0f172a",
                    },
                    fontFamily: { "display": ["Cairo", "sans-serif"] },
                    borderRadius: {
                        "DEFAULT": "0.75rem",
                        "lg": "1.5rem",
                        "xl": "2.5rem",
                    },
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        body { font-family: 'Cairo', sans-serif; }
        .admin-pattern {
            background-image: radial-gradient(circle at 2px 2px, #22c55e 1px, transparent 0);
            background-size: 48px 48px;
            background-repeat: repeat;
            opacity: 0.04;
        }
        .icon-float {
            position: absolute;
            color: #22c55e;
            opacity: 0.08;
            pointer-events: none;
            user-select: none;
        }
    </style>
</head>
<body class="bg-background-light text-slate-900 min-h-screen flex items-center justify-center overflow-hidden">

    <div class="absolute inset-0 admin-pattern"></div>
    <span class="material-symbols-outlined icon-float !text-8xl top-10 right-10">monitoring</span>
    <span class="material-symbols-outlined icon-float !text-7xl bottom-20 left-10">query_stats</span>
    <span class="material-symbols-outlined icon-float !text-9xl top-1/4 left-1/4">group</span>
    <span class="material-symbols-outlined icon-float !text-6xl bottom-1/4 right-1/4">database</span>
    <span class="material-symbols-outlined icon-float !text-5xl top-1/3 right-10">admin_panel_settings</span>

    <div class="relative w-full max-w-md px-6">
        <div class="text-center mb-10">
            <center><img src="{{ asset('assets/img/log.png') }}" alt="إيكو ستارز" style="width: 300px;"></center>
            <p class="text-slate-500 font-bold mt-2">لوحة تحكم الإدارة</p>
        </div>

        <div class="bg-white rounded-lg shadow-2xl shadow-slate-200/50 border border-slate-100 p-8">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-slate-800">تسجيل الدخول</h2>
                <p class="text-sm text-slate-500 mt-1">يرجى إدخال بيانات الاعتماد الخاصة بك للوصول</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-xl text-red-600 text-sm font-bold">
                    {{ $errors->first() }}
                </div>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 block mr-1" for="email">البريد الإلكتروني</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">badge</span>
                        <input class="w-full pr-12 pl-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all"
                               id="email" name="email" type="email"
                               placeholder="admin@example.com"
                               value="{{ old('email') }}" required autofocus/>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-sm font-bold text-slate-700" for="password">كلمة المرور</label>
                    </div>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">lock</span>
                        <input class="w-full pr-12 pl-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all"
                               id="password" name="password" type="password"
                               placeholder="••••••••" required/>
                        <button class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors"
                                type="button"
                                onclick="this.previousElementSibling.previousElementSibling.type = this.previousElementSibling.previousElementSibling.type === 'password' ? 'text' : 'password'">
                            <span class="material-symbols-outlined text-xl">visibility</span>
                        </button>
                    </div>
                </div>

                <div class="flex items-center gap-2 px-1">
                    <input class="size-4 text-primary border-slate-300 rounded focus:ring-primary" id="remember" name="remember" type="checkbox"/>
                    <label class="text-xs font-bold text-slate-600" for="remember">تذكر هذا الجهاز</label>
                </div>

                <button class="w-full py-4 bg-primary hover:bg-green-600 text-white rounded-xl font-bold shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2" type="submit">
                    <span>دخول النظام</span>
                    <span class="material-symbols-outlined text-xl">login</span>
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-50 text-center">
                <p class="text-xs text-slate-400">
                    © {{ date('Y') }} إيكو ستارز. جميع الحقوق محفوظة.
                    <br/>الوصول مخصص للموظفين المصرح لهم فقط.
                </p>
            </div>
        </div>
    </div>

</body>
</html>
