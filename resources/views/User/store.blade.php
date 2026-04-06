@extends('layouts.app')

@section('title', 'متجري - إيكو ستارز')

@push('styles')
<style type="text/tailwindcss">
    .card-glow {
        @apply hover:shadow-xl hover:-translate-y-1;
    }
</style>
@endpush

@section('content')
<div x-data="{ openSection: 'avatars' }" class="p-8 relative z-10 flex-1">
    <div class="flex gap-4 overflow-x-auto pb-6 mb-8 scrollbar-hide">
        <button class="whitespace-nowrap px-8 py-3 bg-primary text-white font-bold rounded-2xl shadow-lg shadow-primary/20">الكل</button>
        <button class="whitespace-nowrap px-8 py-3 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400 font-bold rounded-2xl border border-slate-100 dark:border-slate-700 hover:border-primary transition-all">أفاتار جديد</button>
        <button class="whitespace-nowrap px-8 py-3 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400 font-bold rounded-2xl border border-slate-100 dark:border-slate-700 hover:border-primary transition-all">بدلات الفضاء</button>
        <button class="whitespace-nowrap px-8 py-3 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400 font-bold rounded-2xl border border-slate-100 dark:border-slate-700 hover:border-primary transition-all">خلفيات كوكبية</button>
        <button class="whitespace-nowrap px-8 py-3 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400 font-bold rounded-2xl border border-slate-100 dark:border-slate-700 hover:border-primary transition-all">أدوات مميزة</button>
    </div>
    <div class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-black flex items-center gap-3">
                <span class="material-symbols-outlined text-primary">face_6</span>
                أفاتار جديد
            </h3>
            <button @click="openSection === 'avatars' ? openSection = '' : openSection = 'avatars'" class="text-primary font-bold text-sm hover:underline" type="button">عرض المزيد</button>
        </div>
        <div x-show="openSection === 'avatars'" x-transition class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 border border-slate-100 dark:border-slate-800 card-glow transition-all group">
                <div class="aspect-square bg-slate-50 dark:bg-slate-800 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden">
                    <span class="material-symbols-outlined text-8xl text-slate-300 group-hover:scale-110 transition-transform">person_4</span>
                    <div class="absolute top-4 right-4 px-3 py-1 bg-yellow-400 text-white rounded-full text-xs font-black shadow-md">جديد</div>
                </div>
                <h4 class="font-bold text-lg mb-2">المستكشف الصغير</h4>
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-1.5 text-yellow-600 font-black">
                        <span class="material-symbols-outlined text-lg fill-current">stars</span>
                        ٥٠٠
                    </div>
                    <button class="flex-1 py-2.5 bg-primary hover:bg-primary/90 text-white font-black rounded-xl text-sm transition-colors">استبدال</button>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 border border-slate-100 dark:border-slate-800 card-glow transition-all group">
                <div class="aspect-square bg-blue-50 dark:bg-blue-900/20 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden">
                    <span class="material-symbols-outlined text-8xl text-blue-300 group-hover:scale-110 transition-transform">person_pin</span>
                </div>
                <h4 class="font-bold text-lg mb-2">القائد الذكي</h4>
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-1.5 text-yellow-600 font-black">
                        <span class="material-symbols-outlined text-lg fill-current">stars</span>
                        ٧٥٠
                    </div>
                    <button class="flex-1 py-2.5 bg-primary hover:bg-primary/90 text-white font-black rounded-xl text-sm transition-colors">استبدال</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-black flex items-center gap-3">
                <span class="material-symbols-outlined text-primary">apparel</span>
                بدلات الفضاء
            </h3>
            <button @click="openSection === 'suits' ? openSection = '' : openSection = 'suits'" class="text-primary font-bold text-sm hover:underline" type="button">عرض المزيد</button>
        </div>
        <div x-show="openSection === 'suits'" x-transition class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 border border-slate-100 dark:border-slate-800 card-glow transition-all group">
                <div class="aspect-square bg-orange-50 dark:bg-orange-900/20 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden">
                    <span class="material-symbols-outlined text-8xl text-orange-300 group-hover:scale-110 transition-transform">rocket_launch</span>
                </div>
                <h4 class="font-bold text-lg mb-2">بدلة المريخ</h4>
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-1.5 text-yellow-600 font-black">
                        <span class="material-symbols-outlined text-lg fill-current">stars</span>
                        ١,٢٠٠
                    </div>
                    <button class="flex-1 py-2.5 bg-primary hover:bg-primary/90 text-white font-black rounded-xl text-sm transition-colors">استبدال</button>
                </div>
            </div>
            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 border border-slate-100 dark:border-slate-800 card-glow transition-all group opacity-75">
                <div class="aspect-square bg-purple-50 dark:bg-purple-900/20 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden">
                    <span class="material-symbols-outlined text-8xl text-purple-300 group-hover:scale-110 transition-transform">star_rate</span>
                    <div class="absolute inset-0 bg-slate-900/20 backdrop-blur-[2px] flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-4xl">lock</span>
                    </div>
                </div>
                <h4 class="font-bold text-lg mb-2">بدلة الثقب الأسود</h4>
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-1.5 text-slate-400 font-black">
                        <span class="material-symbols-outlined text-lg fill-current">stars</span>
                        ٣,٠٠٠
                    </div>
                    <button class="flex-1 py-2.5 bg-slate-200 dark:bg-slate-800 text-slate-400 font-black rounded-xl text-sm cursor-not-allowed" disabled="">مغلق</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-black flex items-center gap-3">
                <span class="material-symbols-outlined text-primary">wallpaper</span>
                خلفيات كوكبية
            </h3>
            <button @click="openSection === 'walls' ? openSection = '' : openSection = 'walls'" class="text-primary font-bold text-sm hover:underline" type="button">عرض المزيد</button>
        </div>
        <div x-show="openSection === 'walls'" x-transition class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 border border-slate-100 dark:border-slate-800 card-glow transition-all group">
                <div class="aspect-video bg-emerald-50 dark:bg-emerald-900/20 rounded-[1.5rem] mb-6 flex items-center justify-center relative overflow-hidden">
                    <span class="material-symbols-outlined text-6xl text-emerald-300 group-hover:scale-110 transition-transform">public</span>
                </div>
                <h4 class="font-bold text-lg mb-2">كوكب الأرض</h4>
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-1.5 text-yellow-600 font-black">
                        <span class="material-symbols-outlined text-lg fill-current">stars</span>
                        ٢٥٠
                    </div>
                    <button class="flex-1 py-2.5 bg-primary hover:bg-primary/90 text-white font-black rounded-xl text-sm transition-colors">استبدال</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
