@extends('layouts.app')

@section('title', 'الألعاب التعليمية - إيكو ستارز')

@section('content')
<div class="p-4 sm:p-8 max-w-7xl mx-auto w-full space-y-10">
    
    <div class="text-right">
        <h2 class="text-3xl font-black text-slate-800 dark:text-white mb-2 italic">اختر مغامرتك القادمة! 🚀</h2>
        <p class="text-lg text-slate-500 dark:text-slate-400 font-bold">العب وتعلم واجمع المزيد من النجوم لتطوير مستواك</p>
    </div>

    <!-- شبكة الألعاب -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- لعبة 1 -->
        <div class="bg-white dark:bg-slate-900 rounded-[3rem] overflow-hidden border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-2xl transition-all group flex flex-col">
            <div class="h-60 bg-gradient-to-br from-indigo-500 to-purple-700 relative overflow-hidden flex items-center justify-center">
                <div class="absolute inset-0 opacity-20 star-pattern"></div>
                <span class="material-symbols-outlined !text-[120px] text-white/90 transform group-hover:scale-110 transition-transform">rocket</span>
                <div class="absolute top-4 left-4 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30 text-white text-[10px] font-black uppercase tracking-widest">
                    مغامرة الفضاء
                </div>
            </div>
            <div class="p-8 flex flex-col flex-1">
                <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-3">جامع النجوم</h3>
                <p class="text-slate-500 dark:text-slate-400 font-bold text-sm leading-relaxed mb-8">ساعد رائد الفضاء في جمع النجوم وتجنب الكويكبات الخطيرة في رحلة عبر المجرة!</p>
                
                <div class="mt-auto pt-6 border-t border-slate-50 dark:border-slate-800 flex items-center justify-between">
                    <div class="flex items-center gap-1.5 text-yellow-500">
                        <span class="material-symbols-outlined fill-current">stars</span>
                        <span class="font-black text-lg">١٠٠+</span>
                    </div>
                    <a href="#" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-2xl font-black flex items-center gap-2 shadow-lg shadow-primary/20 transition-all active:scale-95">
                        <span>العب الآن</span>
                        <span class="material-symbols-outlined">play_arrow</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- لعبة 2 -->
        <div class="bg-white dark:bg-slate-900 rounded-[3rem] overflow-hidden border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-2xl transition-all group flex flex-col">
            <div class="h-60 bg-gradient-to-br from-orange-400 to-red-600 relative overflow-hidden flex items-center justify-center">
                <div class="absolute inset-0 opacity-20 star-pattern"></div>
                <span class="material-symbols-outlined !text-[120px] text-white/90 transform group-hover:scale-110 transition-transform">pets</span>
                <div class="absolute top-4 left-4 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30 text-white text-[10px] font-black uppercase tracking-widest">
                    عالم الحيوان
                </div>
            </div>
            <div class="p-8 flex flex-col flex-1">
                <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-3">بطاقات الذاكرة</h3>
                <p class="text-slate-500 dark:text-slate-400 font-bold text-sm leading-relaxed mb-8">اختبر قوة ذاكرتك ووفق بين صور الحيوانات اللطيفة لتكسب نقاطاً إضافية!</p>
                
                <div class="mt-auto pt-6 border-t border-slate-50 dark:border-slate-800 flex items-center justify-between">
                    <div class="flex items-center gap-1.5 text-yellow-500">
                        <span class="material-symbols-outlined fill-current">stars</span>
                        <span class="font-black text-lg">٨٠+</span>
                    </div>
                    <a href="#" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-2xl font-black flex items-center gap-2 shadow-lg shadow-primary/20 transition-all active:scale-95">
                        <span>العب الآن</span>
                        <span class="material-symbols-outlined">play_arrow</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- لعبة 3 (صديقة للبيئة) -->
        <div class="bg-white dark:bg-slate-900 rounded-[3rem] overflow-hidden border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-2xl transition-all group flex flex-col">
            <div class="h-60 bg-gradient-to-br from-emerald-400 to-teal-700 relative overflow-hidden flex items-center justify-center">
                <div class="absolute inset-0 opacity-20 star-pattern"></div>
                <span class="material-symbols-outlined !text-[120px] text-white/90 transform group-hover:scale-110 transition-transform">recycling</span>
            </div>
            <div class="p-8 flex flex-col flex-1">
                <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-3">سباق الاستدامة</h3>
                <p class="text-slate-500 dark:text-slate-400 font-bold text-sm leading-relaxed mb-8">قد سيارة إيكو ستار وتفادى المخلفات لتنظيف كوكبنا الجميل!</p>
                
                <div class="mt-auto pt-6 border-t border-slate-50 dark:border-slate-800 flex items-center justify-between">
                    <div class="flex items-center gap-1.5 text-yellow-500">
                        <span class="material-symbols-outlined fill-current">stars</span>
                        <span class="font-black text-lg">١٢٠+</span>
                    </div>
                    <a href="#" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-2xl font-black flex items-center gap-2 shadow-lg shadow-primary/20 transition-all active:scale-95">
                        <span>العب الآن</span>
                        <span class="material-symbols-outlined">play_arrow</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- بنر تحفيزي -->
    <div class="mt-12 bg-slate-900 dark:bg-white/5 p-10 rounded-[3.5rem] flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-right border-2 border-dashed border-slate-700">
        <div class="flex items-center gap-6">
            <div class="size-20 bg-yellow-400/20 rounded-3xl flex items-center justify-center text-yellow-400">
                <span class="material-symbols-outlined !text-5xl">emoji_events</span>
            </div>
            <div>
                <h4 class="text-xl font-black text-white italic">هل تريد فتح المزيد من الألعاب؟</h4>
                <p class="text-slate-400 font-bold">أكمل الدروس اليومية لفتح ألعاب حصرية ومستويات سرية!</p>
            </div>
        </div>
        <a href="{{ route('subjects') }}" class="bg-white text-slate-900 px-10 py-4 rounded-2xl font-black text-lg hover:bg-slate-100 transition-all whitespace-nowrap shadow-xl shadow-white/5">
            اذهب إلى الدروس
        </a>
    </div>
</div>
@endsection