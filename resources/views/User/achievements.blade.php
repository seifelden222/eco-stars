@extends('layouts.app')

@section('title', 'إنجازاتي - إيكو ستارز')

@push('styles')
<style type="text/tailwindcss">
    .badge-grid {
        @apply grid grid-cols-2 md:grid-cols-3 gap-6;
    }
    .card-glow {
        @apply hover:shadow-xl hover:-translate-y-1;
    }
</style>
@endpush

@section('content')
<div class="p-8 relative z-10 flex-1">
    <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-8 border border-slate-100 dark:border-slate-800 mb-8 shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
            <div class="flex items-center gap-4">
                <div class="size-16 bg-gradient-to-tr from-primary to-emerald-300 rounded-2xl flex items-center justify-center text-white shadow-lg">
                    <span class="text-2xl font-black">٥</span>
                </div>
                <div>
                    <h3 class="text-xl font-black">تقدم المستوى</h3>
                    <p class="text-slate-500 dark:text-slate-400 font-bold">بقي لك ٤٥٠ نقطة للوصول للمستوى ٦</p>
                </div>
            </div>
            <div class="text-left md:text-right">
                <span class="text-3xl font-black text-primary">٧٥٪</span>
            </div>
        </div>
        <div class="h-6 bg-slate-100 dark:bg-slate-800 rounded-full p-1 relative">
            <div class="h-full bg-primary rounded-full shadow-inner flex items-center justify-end px-2" style="width: 75%">
                <div class="size-3 bg-white rounded-full shadow-sm"></div>
            </div>
        </div>
    </div>
    <div class="mb-12">
        <div class="flex items-center justify-between mb-8">
            <h3 class="text-2xl font-black flex items-center gap-3">
                <span class="material-symbols-outlined text-primary text-3xl">workspace_premium</span>
                خزانة الأوسمة
            </h3>
            <div class="flex gap-2">
                <div class="px-4 py-2 bg-white dark:bg-slate-800 rounded-xl text-sm font-bold border border-slate-100 dark:border-slate-700">
                    الأوسمة المحققة: ١٢ / ٢٤
                </div>
            </div>
        </div>
        <div class="badge-grid">
            <button class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 border-b-4 border-primary border-t border-x border-slate-100 dark:border-slate-800 card-glow transition-all group flex flex-col items-center text-center">
                <div class="size-32 bg-yellow-50 dark:bg-yellow-900/20 rounded-full mb-4 flex items-center justify-center relative shadow-inner">
                    <span class="material-symbols-outlined text-6xl text-yellow-500 fill-current group-hover:scale-110 transition-transform">bolt</span>
                    <div class="absolute -bottom-1 -right-1 size-8 bg-primary rounded-full border-4 border-white dark:border-slate-900 flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-sm font-black">check</span>
                    </div>
                </div>
                <h4 class="font-black text-lg mb-1">المتعلم السريع</h4>
                <p class="text-xs text-slate-500 font-bold">أنهيت ٣ دروس في يوم واحد</p>
            </button>
            <button class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 border-b-4 border-primary border-t border-x border-slate-100 dark:border-slate-800 card-glow transition-all group flex flex-col items-center text-center">
                <div class="size-32 bg-blue-50 dark:bg-blue-900/20 rounded-full mb-4 flex items-center justify-center relative shadow-inner">
                    <span class="material-symbols-outlined text-6xl text-blue-500 fill-current group-hover:scale-110 transition-transform">star_half</span>
                    <div class="absolute -bottom-1 -right-1 size-8 bg-primary rounded-full border-4 border-white dark:border-slate-900 flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-sm font-black">check</span>
                    </div>
                </div>
                <h4 class="font-black text-lg mb-1">جامع النجوم</h4>
                <p class="text-xs text-slate-500 font-bold">جمعت أول ١,٠٠٠ نجمة</p>
            </button>
            <button class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 border-b-4 border-primary border-t border-x border-slate-100 dark:border-slate-800 card-glow transition-all group flex flex-col items-center text-center">
                <div class="size-32 bg-purple-50 dark:bg-purple-900/20 rounded-full mb-4 flex items-center justify-center relative shadow-inner">
                    <span class="material-symbols-outlined text-6xl text-purple-500 fill-current group-hover:scale-110 transition-transform">menu_book</span>
                    <div class="absolute -bottom-1 -right-1 size-8 bg-primary rounded-full border-4 border-white dark:border-slate-900 flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-sm font-black">check</span>
                    </div>
                </div>
                <h4 class="font-black text-lg mb-1">عاشق القراءة</h4>
                <p class="text-xs text-slate-500 font-bold">قرأت ٥ قصص تفاعلية</p>
            </button>
            <button class="bg-slate-50/50 dark:bg-slate-800/30 rounded-[2.5rem] p-6 border border-dashed border-slate-200 dark:border-slate-700 flex flex-col items-center text-center grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all group">
                <div class="size-32 bg-slate-200 dark:bg-slate-700 rounded-full mb-4 flex items-center justify-center relative">
                    <span class="material-symbols-outlined text-6xl text-slate-400">rocket</span>
                    <div class="absolute inset-0 flex items-center justify-center bg-slate-900/10 rounded-full backdrop-blur-[1px]">
                        <span class="material-symbols-outlined text-slate-600 dark:text-slate-400 text-3xl">lock</span>
                    </div>
                </div>
                <h4 class="font-black text-lg mb-1 text-slate-400">مستكشف الكواكب</h4>
                <p class="text-xs text-slate-400 font-bold">أنهِ الوحدة التعليمية الثالثة</p>
            </button>
            <button class="bg-slate-50/50 dark:bg-slate-800/30 rounded-[2.5rem] p-6 border border-dashed border-slate-200 dark:border-slate-700 flex flex-col items-center text-center grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all group">
                <div class="size-32 bg-slate-200 dark:bg-slate-700 rounded-full mb-4 flex items-center justify-center relative">
                    <span class="material-symbols-outlined text-6xl text-slate-400">group</span>
                    <div class="absolute inset-0 flex items-center justify-center bg-slate-900/10 rounded-full backdrop-blur-[1px]">
                        <span class="material-symbols-outlined text-slate-600 dark:text-slate-400 text-3xl">lock</span>
                    </div>
                </div>
                <h4 class="font-black text-lg mb-1 text-slate-400">الصديق الوفي</h4>
                <p class="text-xs text-slate-400 font-bold">أرسل هدية لـ ٥ من أصدقائك</p>
            </button>
            <button class="bg-slate-50/50 dark:bg-slate-800/30 rounded-[2.5rem] p-6 border border-dashed border-slate-200 dark:border-slate-700 flex flex-col items-center text-center grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all group">
                <div class="size-32 bg-slate-200 dark:bg-slate-700 rounded-full mb-4 flex items-center justify-center relative">
                    <span class="material-symbols-outlined text-6xl text-slate-400">military_tech</span>
                    <div class="absolute inset-0 flex items-center justify-center bg-slate-900/10 rounded-full backdrop-blur-[1px]">
                        <span class="material-symbols-outlined text-slate-600 dark:text-slate-400 text-3xl">lock</span>
                    </div>
                </div>
                <h4 class="font-black text-lg mb-1 text-slate-400">قائد الأبطال</h4>
                <p class="text-xs text-slate-400 font-bold">صل إلى المستوى ١٠</p>
            </button>
        </div>
    </div>
</div>

<!-- نافذة منبثقة لتفاصيل الوسام -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm hidden">
    <div class="bg-white dark:bg-slate-900 rounded-[3rem] p-10 max-w-md w-full shadow-2xl relative border border-slate-100 dark:border-slate-800">
        <button class="absolute top-6 left-6 text-slate-400 hover:text-slate-600">
            <span class="material-symbols-outlined">close</span>
        </button>
        <div class="text-center">
            <div class="size-40 bg-yellow-100 dark:bg-yellow-900/30 rounded-full mx-auto mb-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-8xl text-yellow-500 fill-current">bolt</span>
            </div>
            <h3 class="text-2xl font-black mb-2">المتعلم السريع</h3>
            <p class="text-slate-500 dark:text-slate-400 font-bold mb-8">لقد حصلت على هذا الوسام لتميزك في سرعة الإنجاز والتعلم!</p>
            <div class="bg-slate-50 dark:bg-slate-800 p-6 rounded-3xl mb-8">
                <h4 class="font-black text-sm uppercase tracking-wider text-slate-400 mb-4">متطلبات الإنجاز</h4>
                <ul class="text-right space-y-3">
                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300 font-bold">
                        <span class="material-symbols-outlined text-primary">check_circle</span>
                        إكمال درسين في أقل من ٣٠ دقيقة
                    </li>
                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300 font-bold">
                        <span class="material-symbols-outlined text-primary">check_circle</span>
                        الحصول على درجة كاملة في اختبار الوحدة
                    </li>
                </ul>
            </div>
            <button class="w-full py-4 bg-primary text-white font-black rounded-2xl shadow-lg shadow-primary/20 hover:scale-[1.02] transition-transform">رائع، فهمت!</button>
        </div>
    </div>
</div>
@endsection
