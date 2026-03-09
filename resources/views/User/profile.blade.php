@extends('layouts.app')

@section('title', 'الملف الشخصي - إيكو ستارز')

@push('styles')
<style type="text/tailwindcss">
    .settings-card {
        @apply bg-white dark:bg-slate-900 rounded-[2.5rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm;
    }
</style>
@endpush

@section('content')
<div class="p-8 relative z-10 w-full space-y-8">
    <section class="settings-card flex flex-col md:flex-row items-center gap-8">
        <div class="relative group">
            <div class="size-40 bg-slate-100 dark:bg-slate-800 rounded-[2.5rem] flex items-center justify-center overflow-hidden border-4 border-white dark:border-slate-700 shadow-xl">
                <span class="material-symbols-outlined text-8xl text-slate-400">face</span>
            </div>
            <button class="absolute -bottom-2 -right-2 size-12 bg-primary text-white rounded-2xl shadow-lg flex items-center justify-center hover:scale-110 transition-transform">
                <span class="material-symbols-outlined">edit</span>
            </button>
        </div>
        <div class="text-center md:text-right flex-1">
            <h3 class="text-2xl font-black mb-2">صورتك الرمزية</h3>
            <p class="text-slate-500 dark:text-slate-400 font-bold mb-4">اختر شخصيتك المفضلة التي تمثلك في عالم إيكو ستارز</p>
            <div class="flex flex-wrap justify-center md:justify-start gap-3">
                <button class="px-6 py-2.5 bg-primary text-white font-bold rounded-xl transition-colors hover:bg-primary/90">تغيير الأفاتار</button>
                <button class="px-6 py-2.5 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-bold rounded-xl transition-colors hover:bg-slate-200 dark:hover:bg-slate-700">إزالة</button>
            </div>
        </div>
    </section>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <section class="settings-card">
            <div class="flex items-center gap-3 mb-8">
                <span class="material-symbols-outlined text-primary">person</span>
                <h3 class="text-xl font-black">المعلومات الشخصية</h3>
            </div>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-500 mb-2">الاسم بالكامل</label>
                    <input class="w-full bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-2xl px-4 py-3.5 font-bold" type="text" value="أحمد محمد علي"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-500 mb-2">المستوى الدراسي</label>
                    <select class="w-full bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-2xl px-4 py-3.5 font-bold">
                        <option>الصف الثالث الابتدائي</option>
                        <option selected="">الصف الرابع الابتدائي</option>
                        <option>الصف الخامس الابتدائي</option>
                    </select>
                </div>
                <button class="w-full py-4 bg-primary text-white font-black rounded-2xl shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all">حفظ التغييرات</button>
            </div>
        </section>
        <section class="settings-card">
            <div class="flex items-center gap-3 mb-8">
                <span class="material-symbols-outlined text-primary">lock</span>
                <h3 class="text-xl font-black">الأمان وكلمة المرور</h3>
            </div>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-500 mb-2">كلمة المرور الحالية</label>
                    <input class="w-full bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-2xl px-4 py-3.5 font-bold" placeholder="••••••••" type="password"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-500 mb-2">كلمة المرور الجديدة</label>
                    <input class="w-full bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-2xl px-4 py-3.5 font-bold" placeholder="••••••••" type="password"/>
                </div>
                <button class="w-full py-4 bg-primary text-white font-black rounded-2xl shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all">تحديث كلمة المرور</button>
            </div>
        </section>
    </div>
    <section class="settings-card">
        <div class="flex items-center gap-3 mb-8">
            <span class="material-symbols-outlined text-primary">notifications_active</span>
            <h3 class="text-xl font-black">إعدادات التنبيهات</h3>
        </div>
        <div class="space-y-4">
            <label class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800 rounded-2xl cursor-pointer group">
                <div class="flex items-center gap-4">
                    <div class="size-10 bg-white dark:bg-slate-700 rounded-xl flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined">star</span>
                    </div>
                    <div>
                        <p class="font-bold">تنبيهات الإنجازات والنجوم</p>
                        <p class="text-xs text-slate-400 font-bold">احصل على إشعار عند فوزك بنجوم جديدة</p>
                    </div>
                </div>
                <div class="relative inline-flex items-center cursor-pointer">
                    <input checked="" class="sr-only peer" type="checkbox"/>
                    <div class="w-12 h-6 bg-slate-200 dark:bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-[-1.5rem] rtl:peer-checked:after:translate-x-[-1.5rem] after:content-[''] after:absolute after:top-[4px] after:right-[4px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                </div>
            </label>
            <label class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800 rounded-2xl cursor-pointer group">
                <div class="flex items-center gap-4">
                    <div class="size-10 bg-white dark:bg-slate-700 rounded-xl flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined">menu_book</span>
                    </div>
                    <div>
                        <p class="font-bold">تذكير بالدروس اليومية</p>
                        <p class="text-xs text-slate-400 font-bold">رسائل تشجيعية للبدء في دروسك</p>
                    </div>
                </div>
                <div class="relative inline-flex items-center cursor-pointer">
                    <input class="sr-only peer" type="checkbox"/>
                    <div class="w-12 h-6 bg-slate-200 dark:bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-[-1.5rem] rtl:peer-checked:after:translate-x-[-1.5rem] after:content-[''] after:absolute after:top-[4px] after:right-[4px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                </div>
            </label>
            <label class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800 rounded-2xl cursor-pointer group">
                <div class="flex items-center gap-4">
                    <div class="size-10 bg-white dark:bg-slate-700 rounded-xl flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined">campaign</span>
                    </div>
                    <div>
                        <p class="font-bold">الأخبار والتحديثات</p>
                        <p class="text-xs text-slate-400 font-bold">تعرف على التحديثات الجديدة في إيكو ستارز</p>
                    </div>
                </div>
                <div class="relative inline-flex items-center cursor-pointer">
                    <input checked="" class="sr-only peer" type="checkbox"/>
                    <div class="w-12 h-6 bg-slate-200 dark:bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-[-1.5rem] rtl:peer-checked:after:translate-x-[-1.5rem] after:content-[''] after:absolute after:top-[4px] after:right-[4px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
                </div>
            </label>
        </div>
    </section>
</div>
@endsection
