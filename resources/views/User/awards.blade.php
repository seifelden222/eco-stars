@extends('layouts.app')

@section('title', 'لوحة الشرف - إيكو ستارز')

@push('styles')
<style>
    /* تنسيق الوسام السداسي (Badge Hexagon) */
    .badge-hexagon {
        clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
    }
    .star-pattern {
        background-image: radial-gradient(circle at 2px 2px, #22c55e 2px, transparent 0);
        background-size: 48px 48px;
        opacity: 0.05;
    }
</style>
@endpush

@section('content')
<div class="max-w-6xl mx-auto p-4 sm:p-8 relative z-10">
    
    <!-- بطاقة الرتبة الحالية (Current Rank Card) -->
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 mb-10 shadow-xl border border-white dark:border-slate-700 relative overflow-hidden group">
        <div class="absolute top-0 left-0 w-full h-1.5 bg-slate-100 dark:bg-slate-700">
            <div class="h-full bg-primary w-2/3 shadow-[0_0_15px_rgba(34,197,94,0.5)] transition-all duration-1000 ease-out"></div>
        </div>
        
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="flex flex-col sm:flex-row items-center gap-6">
                <div class="size-24 bg-primary/10 rounded-3xl flex items-center justify-center text-primary relative transition-transform group-hover:scale-110">
                    <span class="material-symbols-outlined !text-6xl">travel_explore</span>
                    <div class="absolute -bottom-2 -right-2 bg-accent-yellow text-white text-[10px] font-black px-2 py-1 rounded-lg shadow-sm uppercase tracking-wider">رتبة حالية</div>
                </div>
                <div class="text-center sm:text-right">
                    <h3 class="text-3xl font-black text-slate-800 dark:text-white mb-2">مستكشف النجوم</h3>
                    <p class="text-slate-500 dark:text-slate-400 font-bold">
                        أنت على بعد <span class="text-primary font-black">٣٥٠ نجمة</span> من الرتبة التالية: 
                        <span class="text-indigo-500 font-black">قائد المجرة</span>
                    </p>
                </div>
            </div>
            <div class="flex flex-col items-center md:items-end gap-1">
                <div class="text-5xl font-black text-primary italic">٦٥٪</div>
                <div class="text-xs font-bold text-slate-400 uppercase tracking-widest">التقدم نحو الرتبة التالية</div>
            </div>
        </div>
    </div>

    <!-- قسم حائط الإنجازات (Achievements Wall) -->
    <div class="mb-10 flex flex-col sm:flex-row items-center justify-between gap-4">
        <h2 class="text-2xl font-black flex items-center gap-3 text-slate-800 dark:text-white">
            <span class="material-symbols-outlined text-primary text-3xl">military_tech</span>
            حائط الإنجازات الملكي
        </h2>
        <div class="flex gap-2">
            <span class="bg-primary/10 text-primary text-xs font-black px-4 py-2 rounded-full border border-primary/10">١٢ وساماً مكتسباً</span>
            <span class="bg-slate-100 dark:bg-slate-800 text-slate-500 text-xs font-black px-4 py-2 rounded-full">٨ أوسمة مغلقة</span>
        </div>
    </div>

    <!-- شبكة الأوسمة السداسية (Hexagon Badge Grid) -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-y-12 gap-x-8 mb-16">
        
        <!-- وسام 1: القارئ النهم -->
        <div class="flex flex-col items-center gap-4 group cursor-pointer">
            <div class="w-32 h-36 bg-primary/20 flex items-center justify-center badge-hexagon relative transition-all group-hover:translate-y-[-8px]">
                <div class="w-[110px] h-[125px] bg-gradient-to-br from-green-400 to-primary badge-hexagon flex items-center justify-center shadow-lg border-2 border-white/30">
                    <span class="material-symbols-outlined !text-5xl text-white">menu_book</span>
                </div>
                <div class="absolute -top-1 -left-1 size-8 bg-accent-yellow rounded-full border-4 border-white dark:border-slate-800 flex items-center justify-center shadow-md">
                    <span class="material-symbols-outlined text-[16px] text-white fill-current">check</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-800 dark:text-white">القارئ النهم</p>
                <p class="text-[10px] text-slate-400 font-bold uppercase">أنهى ١٠ دروس</p>
            </div>
        </div>

        <!-- وسام 2: البرق السريع -->
        <div class="flex flex-col items-center gap-4 group cursor-pointer">
            <div class="w-32 h-36 bg-orange-100 dark:bg-orange-900/20 flex items-center justify-center badge-hexagon relative transition-all group-hover:translate-y-[-8px]">
                <div class="w-[110px] h-[125px] bg-gradient-to-br from-orange-400 to-orange-600 badge-hexagon flex items-center justify-center shadow-lg border-2 border-white/30">
                    <span class="material-symbols-outlined !text-5xl text-white">bolt</span>
                </div>
                <div class="absolute -top-1 -left-1 size-8 bg-accent-yellow rounded-full border-4 border-white dark:border-slate-800 flex items-center justify-center shadow-md">
                    <span class="material-symbols-outlined text-[16px] text-white fill-current">check</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-800 dark:text-white">البرق السريع</p>
                <p class="text-[10px] text-slate-400 font-bold uppercase">حل تمرين في دقيقة</p>
            </div>
        </div>

        <!-- وسام 3: عبقري الحساب -->
        <div class="flex flex-col items-center gap-4 group cursor-pointer">
            <div class="w-32 h-36 bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center badge-hexagon relative transition-all group-hover:translate-y-[-8px]">
                <div class="w-[110px] h-[125px] bg-gradient-to-br from-blue-400 to-blue-600 badge-hexagon flex items-center justify-center shadow-lg border-2 border-white/30">
                    <span class="material-symbols-outlined !text-5xl text-white">calculate</span>
                </div>
                <div class="absolute -top-1 -left-1 size-8 bg-accent-yellow rounded-full border-4 border-white dark:border-slate-800 flex items-center justify-center shadow-md">
                    <span class="material-symbols-outlined text-[16px] text-white fill-current">check</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-800 dark:text-white">عبقري الحساب</p>
                <p class="text-[10px] text-slate-400 font-bold uppercase">أكمل مستوى الرياضيات</p>
            </div>
        </div>

        <!-- وسام مغلق: العالم الصغير -->
        <div class="flex flex-col items-center gap-4 group opacity-50 grayscale hover:grayscale-0 hover:opacity-100 transition-all cursor-not-allowed">
            <div class="w-32 h-36 bg-slate-200 dark:bg-slate-800 flex items-center justify-center badge-hexagon relative">
                <div class="w-[110px] h-[125px] bg-slate-300 dark:bg-slate-700 badge-hexagon flex items-center justify-center">
                    <span class="material-symbols-outlined !text-5xl text-slate-500">science</span>
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="material-symbols-outlined text-4xl text-slate-900/40">lock</span>
                </div>
            </div>
            <div class="text-center">
                <p class="font-black text-slate-400">العالم الصغير</p>
                <p class="text-[10px] text-slate-400 font-bold uppercase">مغلق</p>
            </div>
        </div>

        <!-- أضف المزيد من الأوسمة هنا باتباع نفس النمط -->

    </div>

    <!-- بنر التحدي (Challenge Banner) -->
    <div class="bg-gradient-to-r from-primary to-emerald-600 rounded-[3rem] p-8 md:p-12 text-white relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8 shadow-2xl shadow-primary/20">
        <div class="absolute top-0 right-0 opacity-10 pointer-events-none">
            <span class="material-symbols-outlined !text-[240px]">auto_awesome</span>
        </div>
        <div class="relative z-10 text-center md:text-right">
            <h3 class="text-3xl md:text-4xl font-black mb-4">واصل التقدم يا بطل! 🚀</h3>
            <p class="text-white/80 text-lg max-w-md font-bold">أكمل تحديات الأسبوع لفتح أوسمة نادرة وحصرية. النجوم في انتظارك!</p>
        </div>
        <button class="relative z-10 bg-white text-primary px-10 py-5 rounded-2xl font-black text-xl hover:shadow-2xl transition-all transform active:scale-95 shadow-xl">
            ابدأ تحدي اليوم
        </button>
    </div>

</div>
@endsection