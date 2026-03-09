@extends('layouts.app')

@section('title', 'دروسي - إيكو ستارز')

@push('styles')
<style type="text/tailwindcss">
    .card-glow {
        @apply hover:shadow-xl hover:-translate-y-1;
    }
</style>
@endpush

@section('content')
<div class="p-8 relative z-10 flex-1">
    <div class="flex gap-4 overflow-x-auto pb-6 mb-8 scrollbar-hide">
        <button class="whitespace-nowrap px-8 py-3 bg-primary text-white font-bold rounded-2xl shadow-lg shadow-primary/20">الكل (٨)</button>
        <button class="whitespace-nowrap px-8 py-3 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400 font-bold rounded-2xl border border-slate-100 dark:border-slate-700 hover:border-primary transition-all">قيد التقدم (٥)</button>
        <button class="whitespace-nowrap px-8 py-3 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400 font-bold rounded-2xl border border-slate-100 dark:border-slate-700 hover:border-primary transition-all">المكتملة (٣)</button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-5 border border-slate-100 dark:border-slate-800 card-glow transition-all group cursor-pointer">
            <div class="aspect-[4/3] bg-blue-100 dark:bg-blue-900/30 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden">
                <a href="{{ route('video') }}"><span class="material-symbols-outlined text-7xl text-blue-500 group-hover:scale-110 transition-transform">rocket</span></a>
                <div class="absolute top-4 right-4 px-4 py-1.5 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md rounded-full text-[10px] font-black shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-xs text-yellow-500 fill-current">star</span>
                    مستوى المبتدئ
                </div>
            </div>
            <div class="px-2">
                <h4 class="font-black text-xl mb-2 text-slate-800 dark:text-white">رحلة إلى المريخ</h4>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">description</span>
                    ١٢ درساً تعليمياً
                </p>
                <div class="space-y-3">
                    <div class="flex justify-between items-end">
                        <span class="text-xs font-black text-primary">تم إنجاز ٧٥٪</span>
                        <span class="text-[10px] font-bold text-slate-400">٩ من ١٢ درس</span>
                    </div>
                    <div class="h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-3/4 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-5 border border-slate-100 dark:border-slate-800 card-glow transition-all group cursor-pointer">
            <div class="aspect-[4/3] bg-purple-100 dark:bg-purple-900/30 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden">
                <span class="material-symbols-outlined text-7xl text-purple-500 group-hover:scale-110 transition-transform">science</span>
                <div class="absolute top-4 right-4 px-4 py-1.5 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md rounded-full text-[10px] font-black shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-xs text-yellow-500 fill-current">star</span>
                    مستوى متوسط
                </div>
            </div>
            <div class="px-2">
                <h4 class="font-black text-xl mb-2 text-slate-800 dark:text-white">عجائب الكيمياء</h4>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">description</span>
                    ١٠ دروس تعليمية
                </p>
                <div class="space-y-3">
                    <div class="flex justify-between items-end">
                        <span class="text-xs font-black text-primary">تم إنجاز ٣٠٪</span>
                        <span class="text-[10px] font-bold text-slate-400">٣ من ١٠ دروس</span>
                    </div>
                    <div class="h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-[30%] rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-5 border border-slate-100 dark:border-slate-800 card-glow transition-all group cursor-pointer">
            <div class="aspect-[4/3] bg-emerald-100 dark:bg-emerald-900/30 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden">
                <span class="material-symbols-outlined text-7xl text-emerald-500 group-hover:scale-110 transition-transform">forest</span>
                <div class="absolute top-4 right-4 px-4 py-1.5 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md rounded-full text-[10px] font-black shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-xs text-yellow-500 fill-current">star</span>
                    مستوى المبتدئ
                </div>
            </div>
            <div class="px-2">
                <h4 class="font-black text-xl mb-2 text-slate-800 dark:text-white">حماية كوكبنا</h4>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">description</span>
                    ٨ دروس تعليمية
                </p>
                <div class="space-y-3">
                    <div class="flex justify-between items-end">
                        <span class="text-xs font-black text-primary">مكتمل!</span>
                        <span class="text-[10px] font-bold text-slate-400">٨ من ٨ دروس</span>
                    </div>
                    <div class="h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-full rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-5 border border-slate-100 dark:border-slate-800 card-glow transition-all group cursor-pointer">
            <div class="aspect-[4/3] bg-amber-100 dark:bg-amber-900/30 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden">
                <span class="material-symbols-outlined text-7xl text-amber-500 group-hover:scale-110 transition-transform">calculate</span>
                <div class="absolute top-4 right-4 px-4 py-1.5 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md rounded-full text-[10px] font-black shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-xs text-yellow-500 fill-current">star</span>
                    مستوى المبتدئ
                </div>
            </div>
            <div class="px-2">
                <h4 class="font-black text-xl mb-2 text-slate-800 dark:text-white">أسرار الأرقام</h4>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">description</span>
                    ١٥ درساً تعليمياً
                </p>
                <div class="space-y-3">
                    <div class="flex justify-between items-end">
                        <span class="text-xs font-black text-primary">تم إنجاز ١٥٪</span>
                        <span class="text-[10px] font-bold text-slate-400">٢ من ١٥ درس</span>
                    </div>
                    <div class="h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-[15%] rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-5 border border-slate-100 dark:border-slate-800 card-glow transition-all group cursor-pointer">
            <div class="aspect-[4/3] bg-red-100 dark:bg-red-900/30 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden">
                <span class="material-symbols-outlined text-7xl text-red-500 group-hover:scale-110 transition-transform">language</span>
                <div class="absolute top-4 right-4 px-4 py-1.5 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md rounded-full text-[10px] font-black shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-xs text-yellow-500 fill-current">star</span>
                    مستوى متوسط
                </div>
            </div>
            <div class="px-2">
                <h4 class="font-black text-xl mb-2 text-slate-800 dark:text-white">لغات العالم</h4>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">description</span>
                    ٢٠ درساً تعليمياً
                </p>
                <div class="space-y-3">
                    <div class="flex justify-between items-end">
                        <span class="text-xs font-black text-primary">تم إنجاز ٥٠٪</span>
                        <span class="text-[10px] font-bold text-slate-400">١٠ من ٢٠ درس</span>
                    </div>
                    <div class="h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-1/2 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-5 border border-slate-100 dark:border-slate-800 card-glow transition-all group cursor-pointer">
            <div class="aspect-[4/3] bg-cyan-100 dark:bg-cyan-900/30 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden">
                <span class="material-symbols-outlined text-7xl text-cyan-500 group-hover:scale-110 transition-transform">palette</span>
                <div class="absolute top-4 right-4 px-4 py-1.5 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md rounded-full text-[10px] font-black shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-xs text-yellow-500 fill-current">star</span>
                    مستوى المبتدئ
                </div>
            </div>
            <div class="px-2">
                <h4 class="font-black text-xl mb-2 text-slate-800 dark:text-white">فن الرسم الرقمي</h4>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">description</span>
                    ٦ دروس تعليمية
                </p>
                <div class="space-y-3">
                    <div class="flex justify-between items-end">
                        <span class="text-xs font-black text-primary">مكتمل!</span>
                        <span class="text-[10px] font-bold text-slate-400">٦ من ٦ دروس</span>
                    </div>
                    <div class="h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-full rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
