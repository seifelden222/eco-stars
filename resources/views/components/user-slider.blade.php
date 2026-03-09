<div class="flex min-h-screen">
    <aside class="w-80 bg-white border-l border-slate-100 hidden lg:flex flex-col p-6 sticky top-0 h-screen">
        <div class="flex items-center gap-3 mb-8 px-2">
            <img src="{{ asset('assets/img/log.png') }}" alt="" class="w-40" />
        </div>

        <nav class="space-y-3 flex-1">
            <a class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-green-50 hover:text-primary font-bold" href="{{ url('home') }}">
                <span class="material-symbols-outlined">grid_view</span>
                <span>الرئيسية</span>
            </a>
            <a class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-green-50 hover:text-primary font-bold" href="{{ url('subjects') }}">
                <span class="material-symbols-outlined">menu_book</span>
                <span>دوراتي</span>
            </a>
            <a class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-green-50 hover:text-primary font-bold" href="{{ url('store') }}">
                <span class="material-symbols-outlined">shopping_bag</span>
                <span>متجري</span>
            </a>
            <a class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-green-50 hover:text-primary font-bold" href="{{ url('games') }}">
                <span class="material-symbols-outlined">sports_esports</span>
                <span>الألعاب</span>
            </a>
            <a class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-green-50 hover:text-primary font-bold" href="{{ url('achievements') }}">
                <span class="material-symbols-outlined">workspace_premium</span>
                <span>إنجازاتي</span>
            </a>
            <a class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-green-50 hover:text-primary font-bold" href="{{ url('profile') }}">
                <span class="material-symbols-outlined">account_circle</span>
                <span>الملف الشخصي</span>
            </a>
        </nav>

        <div class="mt-auto pt-4 border-t border-slate-100">
            <div class="bg-slate-50 rounded-2xl p-4 relative overflow-hidden">
                <p class="text-sm font-bold text-slate-500 mb-2">هل تحتاج مساعدة؟</p>
                <a class="text-primary font-black text-sm flex items-center gap-2" href="#">تواصل معنا <span class="material-symbols-outlined text-sm">arrow_back</span></a>
                <span class="material-symbols-outlined absolute -bottom-3 -left-3 text-6xl text-slate-200/40">help</span>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 bg-background-light">
        {{ $slot }}
    </div>
</div>
