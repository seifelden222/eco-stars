<aside class="w-64 bg-white border-l border-slate-200 flex flex-col fixed inset-y-0 right-0 z-50">
    <div class="p-6 flex items-center gap-3 border-b border-slate-50">
        <!-- تأكد من وضع الشعار في مجلد public/assets/img -->
        <img src="{{ asset('assets/img/log.png') }}" alt="Logo" style="width: 200px;">
    </div>
    
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto custom-scrollbar">
        {{-- الرابط النشط يتم تحديده بناءً على اسم المسار (Route Name) --}}
        
        <a href="{{ route('admin.home') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all {{ request()->routeIs('admin.home') ? 'sidebar-item-active' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span>الرئيسية</span>
        </a>

        <a href="{{ route('admin.users') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all {{ request()->routeIs('admin.users') ? 'sidebar-item-active' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <span class="material-symbols-outlined">group</span>
            <span>المستخدمين</span>
        </a>

        <a href="{{ route('admin.subjects') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all {{ request()->routeIs('admin.subjects') ? 'sidebar-item-active' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <span class="material-symbols-outlined">menu_book</span>
            <span>الدورات التدريبية</span>
        </a>

        <a href="{{ route('admin.reports') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all {{ request()->routeIs('admin.reports') ? 'sidebar-item-active' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <span class="material-symbols-outlined">monitoring</span>
            <span>التقارير</span>
        </a>

        <a href="{{ route('admin.settings') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all mt-auto {{ request()->routeIs('admin.settings') ? 'sidebar-item-active' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700' }}">
            <span class="material-symbols-outlined">settings</span>
            <span>الإعدادات</span>
        </a>
    </nav>

    <!-- User Profile Section -->
    <div class="p-4 border-t border-slate-100">
        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl">
            <div class="size-10 rounded-full bg-slate-200 overflow-hidden">
                <span class="material-symbols-outlined text-slate-500">person</span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-bold text-slate-800 truncate">{{ Auth::guard('admin')->user()->name ?? 'المسؤول' }}</p>
                <p class="text-[10px] text-slate-500">مدير النظام</p>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="text-slate-400 hover:text-red-500 transition-colors">
                    <span class="material-symbols-outlined text-xl">logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>