<div class="flex min-h-screen w-full">
    <aside class="w-80 bg-white border-l border-slate-100 hidden lg:flex flex-col p-8 sticky top-0 h-screen">
        <div class="flex items-center gap-3 mb-12 ">
            <img src="assets/img/log.png" alt="" style="width: 900px;margin-bottom: -70px;margin-right: 10px;margin-top: -50px;">
        </div>
        <nav class="space-y-3 flex-1">
            <a class="sidebar-item {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                <span class="material-symbols-outlined">grid_view</span>
                <span>الرئيسية</span>
            </a>
            <a class="sidebar-item {{ request()->routeIs('subjects') ? 'active' : '' }}" href="{{ route('subjects') }}">
                <span class="material-symbols-outlined">menu_book</span>
                <span>دوراتي</span>
            </a>
            <a class="sidebar-item {{ request()->routeIs('store') ? 'active' : '' }}" href="{{ route('store') }}">
                <span class="material-symbols-outlined">shopping_bag</span>
                <span>متجري</span>
            </a>
            <a class="sidebar-item {{ request()->routeIs('games') ? 'active' : '' }}" href="{{ route('games') }}">
                <span class="material-symbols-outlined">shopping_bag</span>
                <span>الالعاب</span>
            </a>
            <a class="sidebar-item {{ request()->routeIs('achievements') ? 'active' : '' }}" href="{{ route('achievements') }}">
                <span class="material-symbols-outlined">workspace_premium</span>
                <span>إنجازاتي</span>
            </a>
            <a class="sidebar-item {{ request()->routeIs('awards') ? 'active' : '' }}" href="{{ route('awards') }}">
                <span class="material-symbols-outlined">workspace_premium</span>
                <span>لوحة الشرف</span>
            </a>
            <a class="sidebar-item {{ request()->routeIs('profile') || request()->routeIs('profile.edit') ? 'active' : '' }}" href="{{ url('profile') }}">
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

    <div class="flex-1 flex flex-col min-w-0 bg-background-light">
        {{ $slot }}
    </div>
</div>
