<x-guest-layout>
    @section('title', 'تسجيل الدخول - إيكو ستارز')

    <main class="relative z-10 w-full max-w-md p-6">
        <div class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-sm rounded-lg shadow-xl border border-slate-100 dark:border-slate-800 p-8 md:p-10 text-center">
            
            <!-- الشعار والترحيب -->
            <div class="mb-8 flex flex-col items-center">
                <img src="{{ asset('assets/img/log.png') }}" alt="إيكو ستارز" style="width: 350px;">
                <p class="text-slate-500 dark:text-slate-400 mt-2 font-bold">مرحباً بك يا بطل! جاهز للمغامرة؟</p>
            </div>

            <!-- حالة الجلسة (Status) -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form class="space-y-6 text-right" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- البريد الإلكتروني أو رقم الهاتف -->
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mr-1" for="login">البريد الإلكتروني أو رقم الهاتف</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">person</span>
                        <input class="w-full pr-12 pl-4 py-4 bg-slate-50/70 dark:bg-slate-800/70 border-none rounded-2xl focus:ring-2 focus:ring-primary text-lg font-medium transition-all @error('login') ring-2 ring-red-500 @enderror" 
                               id="login" 
                               name="login" 
                               type="text" 
                               value="{{ old('login') }}" 
                               placeholder="اكتب بريدك أو رقم هاتفك هنا" 
                               required 
                               autofocus 
                               autocomplete="username" />
                    </div>
                    @error('login')
                        <p class="text-red-500 text-xs font-bold mt-1 mr-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- كلمة المرور -->
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mr-1" for="password">كلمة المرور</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">lock</span>
                        <input class="w-full pr-12 pl-4 py-4 bg-slate-50/70 dark:bg-slate-800/70 border-none rounded-2xl focus:ring-2 focus:ring-primary text-lg transition-all @error('password') ring-2 ring-red-500 @enderror" 
                               id="password" 
                               name="password" 
                               type="password" 
                               placeholder="••••••••" 
                               required 
                               autocomplete="current-password" />
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs font-bold mt-1 mr-1">{{ $message }}</p>
                    @enderror
                    
                    <div class="flex justify-between items-center mt-2 px-1">
                        <!-- تذكرني -->
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-primary shadow-sm focus:ring-primary" name="remember">
                            <span class="ms-2 text-xs font-bold text-slate-500">تذكرني</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-bold text-primary hover:underline" href="{{ route('password.request') }}">
                                نسيت كلمة المرور؟
                            </a>
                        @endif
                    </div>
                </div>

                <button class="w-full py-4 bg-primary text-white rounded-2xl text-xl font-black shadow-lg shadow-primary/30 hover:bg-primary/90 transform transition-active active:scale-[0.98] mt-4 flex items-center justify-center gap-2" type="submit">
                    <span>تسجيل الدخول</span>
                    <span class="material-symbols-outlined">auto_awesome</span>
                </button>
            </form>

            <div class="mt-5 rounded-2xl border border-slate-100 dark:border-slate-800 bg-slate-50/80 dark:bg-slate-800/60 px-4 py-3 text-right">
                <p class="text-sm font-black text-slate-700 dark:text-slate-200">لوحة الإدارة لها صفحة دخول مستقلة.</p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    إذا كنت تريد دخول الأدمن استخدم
                    <a class="text-primary font-bold hover:underline" href="{{ url('/admin/login') }}">/admin/login</a>.
                </p>
            </div>

            <div class="mt-10 pt-8 border-t border-slate-100 dark:border-slate-800">
                <p class="text-slate-600 dark:text-slate-400 font-bold">
                    ليس لديك حساب؟ 
                    <a class="text-primary hover:underline mr-1" href="{{ route('register') }}">إنشاء حساب جديد</a>
                </p>
            </div>
        </div>
    </main>
</x-guest-layout>
