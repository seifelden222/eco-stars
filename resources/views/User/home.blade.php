@extends('layouts.app')

@section('title', 'الرئيسية - إيكو ستارز')

@push('styles')
<style>
    /* تنسيق التقدم الدائري الموضع بدقة كما في الصورة */
    .circular-progress {
        background: conic-gradient(#22c55e var(--progress), #e2e8f0 0deg);
    }
    
    .course-icon-container {
        @apply relative aspect-video rounded-[2rem] flex items-center justify-center overflow-hidden mb-4;
    }

    .progress-overlay {
        @apply absolute -bottom-2 -right-2 bg-white dark:bg-slate-800 p-1.5 rounded-full shadow-lg border border-slate-50 dark:border-slate-700;
    }

    @keyframes float-animation {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    .animate-mascot {
        animation: float-animation 4s ease-in-out infinite;
    }
</style>
@endpush

@section('content')
<div class="p-6 sm:p-8 max-w-7xl mx-auto w-full space-y-10">
    
    <!-- قسم الترحيب (Hero Section) - Mascot on the Left -->
    <div class="relative bg-primary rounded-[2.5rem] p-6 md:p-10 overflow-hidden text-white shadow-xl shadow-primary/20">
        <div class="absolute inset-0 star-pattern opacity-10"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center gap-10">
            <!-- صورة التميمة داخل إطار غامق جهة اليسار -->
            <div class="w-full md:w-1/3 flex justify-center md:justify-start">
                <div class="bg-slate-900 rounded-[2rem] p-4 shadow-2xl relative group overflow-hidden">
                    <img alt="Mascot" class="w-48 h-48 md:w-56 md:h-56 object-contain animate-mascot" 
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-iqe6lG7OtRZJHDuqq76PZhEZ1TKkpsjTzPf8DdQWMCUtVCOawxueprnKFoupUYo3TfcL8wrGJaK6AswOEgH1z2TFB9WPlvfUgL-neIQNCulnWL55pFzCPsJ26zcFRfQy8pHM7oV1vUpMAqMAgwUX7CE_KKL14uHpMMdhjnzYPSc61LIPmvQH9S9seeEvDd4zYnQS1Chc-agYR6mXQ__UzrrQb1aVZJxUvXI8440ypwj8OtKDQHf4FcU0pD7QQ6uh8PsnieqA8uc"/>
                </div>
            </div>

            <!-- النصوص جهة اليمين -->
            <div class="flex-1 text-center md:text-right space-y-6">
                <div class="flex items-center justify-center md:justify-end gap-3 mb-2">
                    <h1 class="text-4xl md:text-5xl font-black leading-tight">أهلاً بعودتك يا بطل!</h1>
                    <span class="material-symbols-outlined text-yellow-300 text-4xl fill-current">star</span>
                </div>
                <p class="text-lg md:text-xl text-white/90 font-bold leading-relaxed max-w-2xl ml-auto">
                    لقد قطعت شوطاً رائعاً في رحلة التعلم. أكمل دروسك اليوم واجمع المزيد من النجوم لتفتح جوائز جديدة!
                </p>
                <div class="pt-2">
                    <button class="bg-white text-primary px-10 py-4 rounded-2xl font-black text-lg hover:shadow-xl transition-all active:scale-95 flex items-center gap-3 mx-auto md:mr-0 md:ml-auto shadow-md">
                        <span>تابع من حيث توقفت</span>
                        <span class="material-symbols-outlined">play_circle</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- قسم دورات في التقدم -->
    <div class="space-y-6">
        <div class="flex items-center justify-between px-2">
            <div class="flex items-center gap-3">
                <div class="size-10 bg-green-100 rounded-xl flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined font-black">menu_book</span>
                </div>
                <h2 class="text-2xl font-black text-slate-800 dark:text-white">دورات في التقدم</h2>
            </div>
            <a href="#" class="text-primary font-black flex items-center gap-1 hover:underline">
                عرض الكل
                <span class="material-symbols-outlined text-sm">arrow_back</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            
            <!-- دورة 1: اللغات -->
            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all group">
                <div class="course-icon-container bg-emerald-50 dark:bg-emerald-900/10">
                    <span class="material-symbols-outlined text-6xl text-emerald-300">language</span>
                    <div class="progress-overlay">
                        <div class="circular-progress size-14 rounded-full flex items-center justify-center p-1" style="--progress: 36deg">
                            <div class="bg-white dark:bg-slate-900 w-full h-full rounded-full flex items-center justify-center text-[10px] font-black text-slate-700 dark:text-white">10%</div>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-black text-slate-800 dark:text-white mb-2">رحلة حول العالم</h3>
                <p class="text-slate-400 text-sm font-bold mb-6">استكشف القارات واللغات والثقافات المختلفة من غرفتك.</p>
                <div class="flex items-center justify-between pt-4 border-t border-slate-50 dark:border-slate-800">
                    <div class="flex -space-x-2 space-x-reverse">
                        <div class="size-8 rounded-full border-2 border-white bg-slate-200"></div>
                        <div class="size-8 rounded-full border-2 border-white bg-primary text-[10px] text-white flex items-center justify-center font-black">28+</div>
                    </div>
                    <button class="bg-slate-50 dark:bg-slate-800 group-hover:bg-primary group-hover:text-white text-slate-500 dark:text-slate-400 px-6 py-2.5 rounded-xl font-black transition-all">متابعة</button>
                </div>
            </div>

            <!-- دورة 2: الرياضيات -->
            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all group">
                <div class="course-icon-container bg-orange-50 dark:bg-orange-900/10">
                    <span class="material-symbols-outlined text-6xl text-orange-200">calculate</span>
                    <div class="progress-overlay">
                        <div class="circular-progress size-14 rounded-full flex items-center justify-center p-1" style="--progress: 118deg">
                            <div class="bg-white dark:bg-slate-900 w-full h-full rounded-full flex items-center justify-center text-[10px] font-black text-slate-700 dark:text-white">33%</div>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-black text-slate-800 dark:text-white mb-2">ملك الأرقام الذكي</h3>
                <p class="text-slate-400 text-sm font-bold mb-6">أتقن فنون الحساب الذهني والرياضيات المتقدمة بسهولة.</p>
                <div class="flex items-center justify-between pt-4 border-t border-slate-50 dark:border-slate-800">
                    <div class="flex -space-x-2 space-x-reverse">
                        <div class="size-8 rounded-full border-2 border-white bg-slate-200"></div>
                        <div class="size-8 rounded-full border-2 border-white bg-primary text-[10px] text-white flex items-center justify-center font-black">5+</div>
                    </div>
                    <button class="bg-slate-50 dark:bg-slate-800 group-hover:bg-primary group-hover:text-white text-slate-500 dark:text-slate-400 px-6 py-2.5 rounded-xl font-black transition-all">متابعة</button>
                </div>
            </div>

            <!-- دورة 3: العلوم -->
            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all group">
                <div class="course-icon-container bg-indigo-50 dark:bg-indigo-900/10">
                    <span class="material-symbols-outlined text-6xl text-indigo-200">science</span>
                    <div class="progress-overlay">
                        <div class="circular-progress size-14 rounded-full flex items-center justify-center p-1" style="--progress: 270deg">
                            <div class="bg-white dark:bg-slate-900 w-full h-full rounded-full flex items-center justify-center text-[10px] font-black text-slate-700 dark:text-white">75%</div>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-black text-slate-800 dark:text-white mb-2">مغامرات العلوم المرحة</h3>
                <p class="text-slate-400 text-sm font-bold mb-6">تعلم أساسيات الفيزياء والكيمياء بطريقة تفاعلية ممتعة.</p>
                <div class="flex items-center justify-between pt-4 border-t border-slate-50 dark:border-slate-800">
                    <div class="flex -space-x-2 space-x-reverse">
                        <div class="size-8 rounded-full border-2 border-white bg-slate-200"></div>
                        <div class="size-8 rounded-full border-2 border-white bg-primary text-[10px] text-white flex items-center justify-center font-black">12+</div>
                    </div>
                    <button class="bg-slate-50 dark:bg-slate-800 group-hover:bg-primary group-hover:text-white text-slate-500 dark:text-slate-400 px-6 py-2.5 rounded-xl font-black transition-all">متابعة</button>
                </div>
            </div>

        </div>
    </div>

    <!-- قسم آخر الإنجازات -->
    <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-8 shadow-sm border border-slate-100 dark:border-slate-800">
        <h3 class="text-xl font-black text-slate-800 dark:text-white mb-8 flex items-center gap-3">
            <span class="material-symbols-outlined text-yellow-500 fill-current">military_tech</span>
            آخر الإنجازات المحققة
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="flex flex-col items-center text-center p-6 rounded-[2rem] bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700 transition-all hover:bg-white hover:shadow-lg group">
                <div class="size-20 bg-yellow-100 dark:bg-yellow-900/30 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-4xl text-yellow-600">bolt</span>
                </div>
                <p class="font-black text-slate-800 dark:text-white">بطل السرعة</p>
                <p class="text-[10px] text-slate-400 font-bold uppercase mt-1">قبل ٢ يوم</p>
            </div>
            <!-- ... بقية الأوسمة بنفس النمط ... -->
        </div>
    </div>
</div>
@endsection