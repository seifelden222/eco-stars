@extends('layouts.app')

@section('title', 'الألعاب - إيكو ستارز')

@section('content')
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
                    <a href="{{ route('game3') }}" class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                        <span>العب الآن</span>
                        <span class="material-symbols-outlined !text-xl">play_arrow</span>
                    </a>
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
                    <a href="{{ route('game1') }}" class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                        <span>العب الآن</span>
                        <span class="material-symbols-outlined !text-xl">play_arrow</span>
                    </a>
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
                    <a href="{{ route('game2') }}" class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                        <span>العب الآن</span>
                        <span class="material-symbols-outlined !text-xl">play_arrow</span>
                    </a>
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
                    <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2">سباق الاستدامة</h3>
                    <p class="text-slate-500 dark:text-slate-400 font-bold">سُق عربية الأطفال وتفادى المخلفات</p>
                </div>
                <div class="mt-auto pt-4 flex items-center justify-between border-t border-slate-50 dark:border-slate-700">
                    <div class="flex items-center gap-1 text-accent-yellow">
                        <span class="material-symbols-outlined !text-xl fill-current">star</span>
                        <span class="font-black">١٠٠+</span>
                    </div>
                    <a href="{{ route('game5') }}" class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                        <span>العب الآن</span>
                        <span class="material-symbols-outlined !text-xl">play_arrow</span>
                    </a>
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
                    <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2">لعبة الاستدامة</h3>
                    <p class="text-slate-500 dark:text-slate-400 font-bold">اختار كل الحاجات الصح عشان تعدي الليفل</p>
                </div>
                <div class="mt-auto pt-4 flex items-center justify-between border-t border-slate-50 dark:border-slate-700">
                    <div class="flex items-center gap-1 text-accent-yellow">
                        <span class="material-symbols-outlined !text-xl fill-current">star</span>
                        <span class="font-black">٨٠+</span>
                    </div>
                    <a href="{{ route('game4') }}" class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                        <span>العب الآن</span>
                        <span class="material-symbols-outlined !text-xl">play_arrow</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700 flex flex-col group hover:-translate-y-2 transition-transform duration-300">
            <div class="h-56 bg-gradient-to-br from-blue-400 to-indigo-600 relative overflow-hidden flex items-center justify-center">
                <div class="absolute inset-0 opacity-20 star-pattern"></div>
                <span class="material-symbols-outlined !text-[100px] text-white opacity-90">pets</span>
                <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full border border-white/30">
                    <span class="text-white text-sm font-bold">العاب صديقة للبيئة</span>
                </div>
            </div>
            <div class="p-8 flex flex-col flex-1">
                <div class="mb-6">
                    <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-2">لعبة البازل</h3>
                    <p class="text-slate-500 dark:text-slate-400 font-bold">ركّب صورة البيئة</p>
                </div>
                <div class="mt-auto pt-4 flex items-center justify-between border-t border-slate-50 dark:border-slate-700">
                    <div class="flex items-center gap-1 text-accent-yellow">
                        <span class="material-symbols-outlined !text-xl fill-current">star</span>
                        <span class="font-black">١٥٠+</span>
                    </div>
                    <a href="{{ route('game6') }}" class="bg-primary text-white px-8 py-3 rounded-2xl font-black text-lg hover:bg-green-600 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                        <span>العب الآن</span>
                        <span class="material-symbols-outlined !text-xl">play_arrow</span>
                    </a>
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
        <a href="{{ route('lessons') }}" class="bg-slate-800 dark:bg-white text-white dark:text-slate-800 px-10 py-4 rounded-2xl font-black text-lg hover:opacity-90 transition-all whitespace-nowrap">
            اذهب إلى الدروس
        </a>
    </div>
</div>
@endsection
