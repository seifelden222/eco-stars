@extends('layouts.app')

@section('title', 'الرئيسية - إيكو ستارز')

@push('styles')
<style>
    /* تنسيق التقدم الدائري لكروت الدورات ليطابق التصميم الأصلي */
    .circular-progress {
        background: conic-gradient(#22c55e var(--progress), #e2e8f0 0deg);
    }
    
    @keyframes float-animation {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    
    .animate-mascot {
        animation: float-animation 4s ease-in-out infinite;
    }

    /* تحسين الظلال والحدود لتطابق الصورة */
    .course-card {
        @apply bg-white rounded-[2rem] p-6 shadow-sm border border-slate-100 transition-all duration-300;
    }
    .course-card:hover {
        @apply shadow-xl -translate-y-1;
    }
</style>
@endpush

@section('content')
<div class="p-8 w-full space-y-8">
    
    <!-- قسم الترحيب (Hero Section) - تم ضبطه ليطابق أبعاد الصورة -->
    <div class="relative bg-primary rounded-[2.5rem] p-8 md:p-12 overflow-hidden text-white shadow-2xl shadow-primary/20">
        <div class="absolute inset-0 star-pattern opacity-20"></div>
        <div class="absolute -left-20 -top-20 size-80 bg-white/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center gap-8 text-center md:text-right">
            <div class="flex-1">
                <h1 class="text-4xl md:text-5xl font-black mb-4 leading-tight">أهلاً بعودتك يا بطل! 🌟</h1>
                <p class="text-lg md:text-xl text-white/90 mb-8 max-w-xl font-bold">
                    لقد قطعت شوطاً رائعاً في رحلة التعلم. أكمل دروسك اليوم واجمع المزيد من النجوم لتفتح جوائز جديدة!
                </p>
                <button class="bg-white text-primary px-8 py-4 rounded-2xl font-black text-lg hover:shadow-xl transition-all active:scale-95 flex items-center gap-3 mx-auto md:mx-0">
                    تابع من حيث توقفت
                    <span class="material-symbols-outlined">play_circle</span>
                </button>
            </div>
            <div class="w-48 md:w-64 hidden md:block">
                <img alt="Mascot" class="w-full drop-shadow-2xl animate-mascot" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-iqe6lG7OtRZJHDuqq76PZhEZ1TKkpsjTzPf8DdQWMCUtVCOawxueprnKFoupUYo3TfcL8wrGJaK6AswOEgH1z2TFB9WPlvfUgL-neIQNCulnWL55pFzCPsJ26zcFRfQy8pHM7oV1vUpMAqMAgwUX7CE_KKL14uHpMMdhjnzYPSc61LIPmvQH9S9seeEvDd4zYnQS1Chc-agYR6mXQ__UzrrQb1aVZJxUvXI8440ypwj8OtKDQHf4FcU0pD7QQ6uh8PsnieqA8uc"/>
            </div>
        </div>
    </div>

    <!-- قسم دورات في التقدم -->
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="size-10 bg-green-100 rounded-xl flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined font-bold">menu_book</span>
                </div>
                <h2 class="text-2xl font-black text-slate-800 dark:text-white">دورات في التقدم</h2>
            </div>
            <a href="{{ route('subjects') }}" class="text-primary font-bold hover:underline flex items-center gap-1">
                عرض الكل
                <span class="material-symbols-outlined text-sm">arrow_back</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            
            <!-- دورة 1: العلوم -->
            <div class="course-card group">
                <div class="relative mb-6">
                    <div class="aspect-video bg-indigo-50 rounded-2xl flex items-center justify-center overflow-hidden">
                        <span class="material-symbols-outlined text-6xl text-indigo-200">science</span>
                    </div>
                    <div class="absolute -bottom-4 right-4 bg-white p-2 rounded-full shadow-lg">
                        <div class="circular-progress size-16 rounded-full flex items-center justify-center p-1" style="--progress: 270deg">
                            <div class="bg-white w-full h-full rounded-full flex items-center justify-center text-xs font-black text-slate-700">75%</div>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-black text-slate-800 dark:text-white mb-2">مغامرات العلوم المرحة</h3>
                <p class="text-slate-500 text-sm mb-6 font-bold leading-relaxed">تعلم أساسيات الفيزياء والكيمياء بطريقة تفاعلية ممتعة.</p>
                <div class="flex items-center justify-between">
                    <div class="flex -space-x-2 space-x-reverse">
                        <div class="size-8 rounded-full border-2 border-white bg-slate-200 shadow-sm"></div>
                        <div class="size-8 rounded-full border-2 border-white bg-slate-300 shadow-sm"></div>
                        <div class="size-8 rounded-full border-2 border-white bg-primary text-[10px] text-white flex items-center justify-center font-bold shadow-sm">+12</div>
                    </div>
                    <button class="bg-slate-100 group-hover:bg-primary group-hover:text-white text-slate-600 px-6 py-3 rounded-xl font-bold transition-all transform active:scale-95">متابعة</button>
                </div>
            </div>

            <!-- دورة 2: الرياضيات -->
            <div class="course-card group">
                <div class="relative mb-6">
                    <div class="aspect-video bg-orange-50 rounded-2xl flex items-center justify-center overflow-hidden">
                        <span class="material-symbols-outlined text-6xl text-orange-200">calculate</span>
                    </div>
                    <div class="absolute -bottom-4 right-4 bg-white p-2 rounded-full shadow-lg">
                        <div class="circular-progress size-16 rounded-full flex items-center justify-center p-1" style="--progress: 120deg">
                            <div class="bg-white w-full h-full rounded-full flex items-center justify-center text-xs font-black text-slate-700">33%</div>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-black text-slate-800 dark:text-white mb-2">ملك الأرقام الذكي</h3>
                <p class="text-slate-500 text-sm mb-6 font-bold leading-relaxed">أتقن فنون الحساب الذهني والرياضيات المتقدمة بسهولة.</p>
                <div class="flex items-center justify-between">
                    <div class="flex -space-x-2 space-x-reverse">
                        <div class="size-8 rounded-full border-2 border-white bg-slate-200 shadow-sm"></div>
                        <div class="size-8 rounded-full border-2 border-white bg-primary text-[10px] text-white flex items-center justify-center font-bold shadow-sm">+5</div>
                    </div>
                    <button class="bg-slate-100 group-hover:bg-primary group-hover:text-white text-slate-600 px-6 py-3 rounded-xl font-bold transition-all transform active:scale-95">متابعة</button>
                </div>
            </div>

            <!-- دورة 3: اللغات -->
            <div class="course-card group">
                <div class="relative mb-6">
                    <div class="aspect-video bg-emerald-50 rounded-2xl flex items-center justify-center overflow-hidden">
                        <span class="material-symbols-outlined text-6xl text-emerald-200">language</span>
                    </div>
                    <div class="absolute -bottom-4 right-4 bg-white p-2 rounded-full shadow-lg">
                        <div class="circular-progress size-16 rounded-full flex items-center justify-center p-1" style="--progress: 40deg">
                            <div class="bg-white w-full h-full rounded-full flex items-center justify-center text-xs font-black text-slate-700">10%</div>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-black text-slate-800 dark:text-white mb-2">رحلة حول العالم</h3>
                <p class="text-slate-500 text-sm mb-6 font-bold leading-relaxed">استكشف القارات واللغات والثقافات المختلفة من غرفتك.</p>
                <div class="flex items-center justify-between">
                    <div class="flex -space-x-2 space-x-reverse">
                        <div class="size-8 rounded-full border-2 border-white bg-slate-200 shadow-sm"></div>
                        <div class="size-8 rounded-full border-2 border-white bg-primary text-[10px] text-white flex items-center justify-center font-bold shadow-sm">+28</div>
                    </div>
                    <button class="bg-slate-100 group-hover:bg-primary group-hover:text-white text-slate-600 px-6 py-3 rounded-xl font-bold transition-all transform active:scale-95">متابعة</button>
                </div>
            </div>

        </div>
    </div>

    <!-- قسم آخر الإنجازات -->
    <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-slate-100">
        <h3 class="text-xl font-black text-slate-800 dark:text-white mb-8 flex items-center gap-2">
            <span class="material-symbols-outlined text-yellow-500 fill-current">military_tech</span>
            آخر الإنجازات
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            
            <div class="flex flex-col items-center text-center p-4 rounded-2xl bg-slate-50 border border-slate-100 group transition-all hover:bg-white hover:shadow-lg">
                <div class="size-20 bg-yellow-100 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-4xl text-yellow-600">bolt</span>
                </div>
                <p class="font-bold text-slate-800 dark:text-white">بطل السرعة</p>
                <p class="text-[10px] text-slate-400 font-bold">قبل ٢ يوم</p>
            </div>

            <div class="flex flex-col items-center text-center p-4 rounded-2xl bg-slate-50 border border-slate-100 group transition-all hover:bg-white hover:shadow-lg">
                <div class="size-20 bg-blue-100 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-4xl text-blue-600">psychology</span>
                </div>
                <p class="font-bold text-slate-800 dark:text-white">العبقري الصغير</p>
                <p class="text-[10px] text-slate-400 font-bold">قبل ٥ أيام</p>
            </div>

            <div class="flex flex-col items-center text-center p-4 rounded-2xl bg-slate-50 border border-slate-100 group transition-all hover:bg-white hover:shadow-lg">
                <div class="size-20 bg-green-100 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-4xl text-green-600">verified</span>
                </div>
                <p class="font-bold text-slate-800 dark:text-white">الالتزام التام</p>
                <p class="text-[10px] text-slate-400 font-bold">أسبوع مضى</p>
            </div>

            <div class="flex flex-col items-center text-center p-4 rounded-2xl bg-slate-50 border border-slate-100 opacity-50 grayscale">
                <div class="size-20 bg-slate-200 rounded-full flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-4xl text-slate-400">lock</span>
                </div>
                <p class="font-bold text-slate-400">مقفل</p>
                <p class="text-[10px] text-slate-300 font-bold">أكمل دورة أخرى</p>
            </div>

        </div>
    </div>
</div>
@endsection
