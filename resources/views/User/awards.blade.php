@extends('layouts.app')

@section('title', 'لوحة الشرف - إيكو ستارز')

@push('styles')
<style>
    .badge-hexagon {
        clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
    }
</style>
@endpush

@section('content')
<div class="p-8 relative z-10 w-full">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-8 mb-10 shadow-xl border border-white dark:border-slate-700 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1.5 bg-slate-100 dark:bg-slate-700">
            <div class="h-full bg-primary w-2/3 shadow-[0_0_15px_rgba(34,197,94,0.5)]"></div>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-6">
                <div class="size-24 bg-primary/10 rounded-3xl flex items-center justify-center text-primary relative">
                    <span class="material-symbols-outlined !text-6xl">travel_explore</span>
                    <div class="absolute -bottom-2 -right-2 bg-accent-yellow text-white text-xs font-bold px-2 py-1 rounded-lg">رتبة حالية</div>
                </div>
                <div class="text-right">
                    <h3 class="text-3xl font-black text-slate-800 dark:text-white mb-2">مستكشف النجوم</h3>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">أنت على بعد <span class="text-primary font-black">٣٥٠ نجمة</span> من الرتبة التالية: <span class="text-indigo-500 font-black">قائد المجرة</span></p>
                </div>
            </div>
            <div class="flex flex-col items-center md:items-end gap-2">
                <div class="text-4xl font-black text-primary">٦٥٪</div>
                <div class="text-sm font-bold text-slate-400">التقدم نحو الرتبة التالية</div>
            </div>
        </div>
    </div>
    <div class="mb-8 flex items-center justify-between">
        <h2 class="text-2xl font-black flex items-center gap-3">
            <span class="material-symbols-outlined text-primary">military_tech</span>
            حائط الإنجازات
        </h2>
        <div class="flex gap-2">
            <span class="bg-primary/10 text-primary text-sm font-black px-4 py-1.5 rounded-full">١٢ وساماً مكتسباً</span>
            <span class="bg-slate-100 dark:bg-slate-800 text-slate-500 text-sm font-black px-4 py-1.5 rounded-full">٨ أوسمة مغلقة</span>
        </div>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8">
        <div class="flex flex-col items-center gap-4 group">
            <div class="w-32 h-36 bg-primary/20 flex items-center justify-center badge-hexagon relative transition-transform group-hover:scale-110">
                <div class="w-[110px] h-[125px] bg-gradient-to-br from-green-400 to-primary badge-hexagon flex items-center justify-center shadow-lg border-2 border-white/30">
                    <span class="material-symbols-outlined !text-5xl text-white">menu_book</span>
                </div>
                <div class="absolute -top-1 -left-1 size-8 bg-accent-yellow rounded-full border-4 border-white dark:border-slate-800 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[16px] text-white fill-current">check</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-800 dark:text-white">القارئ النهم</p>
                <p class="text-xs text-slate-500">أنهى ١٠ دروس</p>
            </div>
        </div>
        <div class="flex flex-col items-center gap-4 group">
            <div class="w-32 h-36 bg-orange-100 dark:bg-orange-900/20 flex items-center justify-center badge-hexagon relative transition-transform group-hover:scale-110">
                <div class="w-[110px] h-[125px] bg-gradient-to-br from-orange-400 to-orange-600 badge-hexagon flex items-center justify-center shadow-lg border-2 border-white/30">
                    <span class="material-symbols-outlined !text-5xl text-white">bolt</span>
                </div>
                <div class="absolute -top-1 -left-1 size-8 bg-accent-yellow rounded-full border-4 border-white dark:border-slate-800 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[16px] text-white fill-current">check</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-800 dark:text-white">البرق السريع</p>
                <p class="text-xs text-slate-500">حل تمرين في أقل من دقيقة</p>
            </div>
        </div>
        <div class="flex flex-col items-center gap-4 group">
            <div class="w-32 h-36 bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center badge-hexagon relative transition-transform group-hover:scale-110">
                <div class="w-[110px] h-[125px] bg-gradient-to-br from-blue-400 to-blue-600 badge-hexagon flex items-center justify-center shadow-lg border-2 border-white/30">
                    <span class="material-symbols-outlined !text-5xl text-white">calculate</span>
                </div>
                <div class="absolute -top-1 -left-1 size-8 bg-accent-yellow rounded-full border-4 border-white dark:border-slate-800 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[16px] text-white fill-current">check</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-800 dark:text-white">عبقري الحساب</p>
                <p class="text-xs text-slate-500">أكمل مستوى الرياضيات</p>
            </div>
        </div>
        <div class="flex flex-col items-center gap-4 group">
            <div class="w-32 h-36 bg-slate-200 dark:bg-slate-800 flex items-center justify-center badge-hexagon relative opacity-40 grayscale group-hover:grayscale-0 transition-all">
                <div class="w-[110px] h-[125px] bg-slate-300 dark:bg-slate-700 badge-hexagon flex items-center justify-center">
                    <span class="material-symbols-outlined !text-5xl text-slate-500">science</span>
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="material-symbols-outlined text-4xl text-slate-900/50">lock</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-400">العالم الصغير</p>
                <p class="text-xs text-slate-500">مغلق</p>
            </div>
        </div>
        <div class="flex flex-col items-center gap-4 group">
            <div class="w-32 h-36 bg-slate-200 dark:bg-slate-800 flex items-center justify-center badge-hexagon relative opacity-40 grayscale group-hover:grayscale-0 transition-all">
                <div class="w-[110px] h-[125px] bg-slate-300 dark:bg-slate-700 badge-hexagon flex items-center justify-center">
                    <span class="material-symbols-outlined !text-5xl text-slate-500">rocket</span>
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="material-symbols-outlined text-4xl text-slate-900/50">lock</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-400">طيار المحاكاة</p>
                <p class="text-xs text-slate-500">مغلق</p>
            </div>
        </div>
        <div class="flex flex-col items-center gap-4 group">
            <div class="w-32 h-36 bg-purple-100 dark:bg-purple-900/20 flex items-center justify-center badge-hexagon relative transition-transform group-hover:scale-110">
                <div class="w-[110px] h-[125px] bg-gradient-to-br from-purple-400 to-purple-600 badge-hexagon flex items-center justify-center shadow-lg border-2 border-white/30">
                    <span class="material-symbols-outlined !text-5xl text-white">palette</span>
                </div>
                <div class="absolute -top-1 -left-1 size-8 bg-accent-yellow rounded-full border-4 border-white dark:border-slate-800 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[16px] text-white fill-current">check</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-800 dark:text-white">الفنان المبدع</p>
                <p class="text-xs text-slate-500">أنهى تحدي الألوان</p>
            </div>
        </div>
        <div class="flex flex-col items-center gap-4 group">
            <div class="w-32 h-36 bg-slate-200 dark:bg-slate-800 flex items-center justify-center badge-hexagon relative opacity-40 grayscale group-hover:grayscale-0 transition-all">
                <div class="w-[110px] h-[125px] bg-slate-300 dark:bg-slate-700 badge-hexagon flex items-center justify-center">
                    <span class="material-symbols-outlined !text-5xl text-slate-500">language</span>
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="material-symbols-outlined text-4xl text-slate-900/50">lock</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-400">مواطن عالمي</p>
                <p class="text-xs text-slate-500">مغلق</p>
            </div>
        </div>
        <div class="flex flex-col items-center gap-4 group">
            <div class="w-32 h-36 bg-red-100 dark:bg-red-900/20 flex items-center justify-center badge-hexagon relative transition-transform group-hover:scale-110">
                <div class="w-[110px] h-[125px] bg-gradient-to-br from-red-400 to-red-600 badge-hexagon flex items-center justify-center shadow-lg border-2 border-white/30">
                    <span class="material-symbols-outlined !text-5xl text-white">favorite</span>
                </div>
                <div class="absolute -top-1 -left-1 size-8 bg-accent-yellow rounded-full border-4 border-white dark:border-slate-800 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[16px] text-white fill-current">check</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-800 dark:text-white">صديق الجميع</p>
                <p class="text-xs text-slate-500">ساعد ٥ أصدقاء</p>
            </div>
        </div>
        <div class="flex flex-col items-center gap-4 group">
            <div class="w-32 h-36 bg-slate-200 dark:bg-slate-800 flex items-center justify-center badge-hexagon relative opacity-40 grayscale group-hover:grayscale-0 transition-all">
                <div class="w-[110px] h-[125px] bg-slate-300 dark:bg-slate-700 badge-hexagon flex items-center justify-center">
                    <span class="material-symbols-outlined !text-5xl text-slate-500">public</span>
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="material-symbols-outlined text-4xl text-slate-900/50">lock</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-400">حارس الطبيعة</p>
                <p class="text-xs text-slate-500">مغلق</p>
            </div>
        </div>
        <div class="flex flex-col items-center gap-4 group">
            <div class="w-32 h-36 bg-slate-200 dark:bg-slate-800 flex items-center justify-center badge-hexagon relative opacity-40 grayscale group-hover:grayscale-0 transition-all">
                <div class="w-[110px] h-[125px] bg-slate-300 dark:bg-slate-700 badge-hexagon flex items-center justify-center">
                    <span class="material-symbols-outlined !text-5xl text-slate-500">psychology</span>
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="material-symbols-outlined text-4xl text-slate-900/50">lock</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-400">المفكر الاستراتيجي</p>
                <p class="text-xs text-slate-500">مغلق</p>
            </div>
        </div>
    </div>
    <div class="mt-16 bg-gradient-to-r from-primary to-emerald-600 rounded-[2.5rem] p-10 text-white relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="absolute top-0 right-0 opacity-10">
            <span class="material-symbols-outlined !text-[200px]">auto_awesome</span>
        </div>
        <div class="relative z-10 text-right">
            <h3 class="text-3xl font-black mb-4">واصل التقدم يا بطل! 🚀</h3>
            <p class="text-white/80 text-lg max-w-md">أكمل تحديات الأسبوع لفتح أوسمة نادرة وحصرية. النجوم في انتظارك!</p>
        </div>
        <button class="relative z-10 bg-white text-primary px-8 py-4 rounded-2xl font-black text-xl hover:bg-opacity-90 transition-all shadow-xl">
            ابدأ تحدي اليوم
        </button>
    </div>
</div>
@endsection
