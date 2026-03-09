<header class="bg-white/70 backdrop-blur-md border-b border-slate-100 sticky top-0 z-20 px-4 sm:px-8 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        
        <!-- الجانب الأيمن: زر الجوال والبحث -->
        <div class="flex items-center gap-4 flex-1">
            <!-- Hamburger (Mobile Only) -->
            <button @click="open = !open" class="lg:hidden size-11 bg-primary rounded-xl flex items-center justify-center text-white shadow-lg shadow-primary/20 transition-transform active:scale-90">
                <span class="material-symbols-outlined" x-show="!open">menu</span>
                <span class="material-symbols-outlined" x-show="open">close</span>
            </button>

            <!-- Search Bar (Desktop) -->
            <div class="flex-1 max-w-md hidden md:block">
                <div class="relative group">
                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">search</span>
                    <input class="w-full pr-12 pl-4 py-3 bg-slate-100 border-none rounded-2xl focus:ring-2 focus:ring-primary/20 text-sm transition-all" 
                           placeholder="ابحث عن مغامرة جديدة..." type="text"/>
                </div>
            </div>
        </div>

        <!-- الجانب الأيسر: النجوم والملف الشخصي -->
        <div class="flex items-center gap-3 sm:gap-6">
            
            <!-- Stars Count (ميزة خاصة بإيكو ستارز) -->
            <div class="bg-yellow-50 px-3 sm:px-5 py-2 rounded-full flex items-center gap-2 border border-yellow-100 shadow-sm hover:scale-105 transition-transform cursor-help" title="رصيد نجومك">
                <span class="material-symbols-outlined text-yellow-500 fill-current animate-pulse text-xl sm:text-2xl">stars</span>
                <span class="font-black text-yellow-700 text-sm sm:text-base">1,250</span>
            </div>
            
            <div class="h-8 w-[1px] bg-slate-200 hidden sm:block"></div>
            
            <!-- Settings Dropdown (Breeze Integration) -->
            <div class="relative" x-data="{ dropdownOpen: false }">
                <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false" class="flex items-center gap-3 group focus:outline-none">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-black text-slate-800 leading-none group-hover:text-primary transition-colors">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">البطل المكتشف</p>
                    </div>
                    <div class="size-11 sm:size-12 rounded-2xl bg-slate-100 border-2 border-white shadow-sm overflow-hidden flex items-center justify-center group-hover:border-primary transition-all">
                        <img alt="Avatar" class="w-full h-full object-cover" 
                             src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=22c55e&background=f0fdf4&bold=true"/>
                    </div>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="dropdownOpen" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="transform opacity-0 scale-95 translate-y-2"
                     x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute left-0 mt-3 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 origin-top-left"
                     style="display: none;">
                    
                    <div class="px-4 py-3 border-b border-slate-50 mb-1 sm:hidden">
                        <p class="text-sm font-black text-slate-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-400">{{ Auth::user()->email }}</p>
                    </div>

                    <a href="{{ route('profile') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-green-50 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined text-lg">account_circle</span>
                        الملف الشخصي
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-600 hover:bg-green-50 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined text-lg">settings</span>
                        إعدادات الحساب
                    </a>

                    <hr class="border-slate-50 my-1">

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm font-bold text-red-500 hover:bg-red-50 transition-colors">
                            <span class="material-symbols-outlined text-lg">logout</span>
                            تسجيل الخروج
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile Only) -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden mt-4 pb-4 space-y-2"
         style="display: none;">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('dashboard') ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-600 bg-slate-50' }}">
                الرئيسية
            </a>
            <!-- أضف المزيد من الروابط هنا لتظهر في الجوال -->
        </div>
    </div>
</header>