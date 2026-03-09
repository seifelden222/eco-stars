@extends('layouts.app')

@section('title', 'مشاهدة الدرس - إيكو ستارز')

@push('styles')
<style>
    /* تحسينات لمشغل الفيديو */
    .video-container {
        @apply aspect-video rounded-[2.5rem] overflow-hidden relative bg-slate-900 shadow-2xl shadow-primary/20 group;
    }
    .lesson-card {
        @apply p-4 rounded-2xl border border-slate-100 dark:border-slate-800 flex items-center gap-4 transition-all duration-200 cursor-pointer;
    }
    .lesson-card.active {
        @apply border-2 border-primary bg-green-50/50 dark:bg-primary/10 shadow-lg shadow-primary/5;
    }
    .lesson-card:not(.active):hover {
        @apply border-primary/30 bg-slate-50 dark:bg-slate-800/50;
    }
    /* إخفاء شريط التمرير الافتراضي وتحسينه */
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        @apply bg-slate-50 dark:bg-slate-900 rounded-full;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        @apply bg-slate-200 dark:bg-slate-700 rounded-full hover:bg-primary/50;
    }
</style>
@endpush

@section('content')
<div class="p-4 md:p-8 max-w-7xl mx-auto w-full">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- الجانب الأيمن: مشغل الفيديو وتفاصيل الدرس (Main Content) -->
        <div class="lg:col-span-8 space-y-6">
            
            <!-- حاوية الفيديو -->
            <div class="video-container">
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-10">
                    <span class="material-symbols-outlined !text-8xl text-white/30 group-hover:scale-110 transition-transform duration-500">play_circle</span>
                </div>
                
                {{-- صورة مصغرة للفيديو (Thumbnail) --}}
                <img alt="Space Video" class="w-full h-full object-cover opacity-70 group-hover:scale-105 transition-transform duration-700" 
                     src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80&w=1200">
                
                <!-- أزرار التحكم في الفيديو (شفافة) -->
                <div class="absolute bottom-6 left-6 right-6 flex items-center gap-4 bg-black/30 backdrop-blur-xl p-4 rounded-3xl border border-white/20 z-20">
                    <button class="size-12 rounded-2xl bg-white text-primary flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined fill-current text-2xl">play_arrow</span>
                    </button>
                    <div class="flex-1 h-2 bg-white/20 rounded-full relative overflow-hidden">
                        <div class="absolute top-0 right-0 h-full w-1/3 bg-primary rounded-full shadow-[0_0_10px_#22c55e]"></div>
                    </div>
                    <span class="text-white font-black text-xs tabular-nums">١٠:٤٥</span>
                    <button class="text-white/80 hover:text-white transition-colors">
                        <span class="material-symbols-outlined">fullscreen</span>
                    </button>
                </div>
            </div>

            <!-- معلومات الدرس -->
            <div class="bg-white dark:bg-slate-900 p-8 rounded-[2.5rem] shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-primary font-black text-xs uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm">stars</span>
                        المغامرة الثالثة
                    </div>
                    <h1 class="text-3xl font-black text-slate-800 dark:text-white leading-tight">الدرس الثالث: الكواكب والنجوم</h1>
                    <p class="text-slate-500 dark:text-slate-400 font-bold">في هذا الدرس سنتعرف على عجائب المجموعة الشمسية وأسرار الكواكب البعيدة.</p>
                </div>
                
                <button class="bg-primary hover:bg-primary-dark text-white px-8 py-4 rounded-2xl font-black text-lg flex items-center justify-center gap-3 shadow-xl shadow-primary/20 transition-all transform active:scale-95 shrink-0">
                    <span class="material-symbols-outlined">check_circle</span>
                    تم الإكمال
                </button>
            </div>
        </div>

        <!-- الجانب الأيسر: قائمة الدروس (Sidebar Inside Page) -->
        <div class="lg:col-span-4 h-full">
            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] border border-slate-100 dark:border-slate-800 flex flex-col h-[calc(100vh-14rem)] min-h-[500px] shadow-sm overflow-hidden sticky top-32">
                
                <!-- هيدر القائمة -->
                <div class="p-6 border-b border-slate-50 dark:border-slate-800">
                    <h3 class="text-xl font-black flex items-center gap-3 text-slate-800 dark:text-white">
                        <span class="material-symbols-outlined text-primary p-2 bg-primary/10 rounded-xl">format_list_bulleted</span>
                        قائمة الدروس
                    </h3>
                    <p class="text-xs text-slate-400 font-bold mt-2 uppercase tracking-tighter">الوحدة الأولى: استكشاف الفضاء</p>
                </div>

                <!-- قائمة الدروس (Scrollable) -->
                <div class="flex-1 overflow-y-auto p-4 space-y-3 custom-scrollbar">
                    
                    <!-- درس مكتمل -->
                    <div class="lesson-card bg-slate-50/50 dark:bg-slate-800/30 opacity-80">
                        <div class="size-10 rounded-xl bg-primary text-white flex items-center justify-center shrink-0 shadow-lg shadow-primary/10">
                            <span class="material-symbols-outlined text-xl font-black">check</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-black text-slate-700 dark:text-slate-300 text-sm">مقدمة في علم الفلك</h4>
                            <span class="text-[10px] text-slate-400 font-bold">٥ دقائق • مكتمل</span>
                        </div>
                    </div>

                    <!-- درس جاري مشاهدته (Active) -->
                    <div class="lesson-card active">
                        <div class="size-10 rounded-xl bg-primary text-white flex items-center justify-center shrink-0 animate-pulse shadow-lg">
                            <span class="material-symbols-outlined text-xl">play_arrow</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-black text-primary text-sm">الكواكب والنجوم</h4>
                            <span class="text-[10px] text-primary/70 font-bold">١٢ دقيقة • جاري المشاهدة</span>
                        </div>
                    </div>

                    <!-- درس مغلق (Locked) -->
                    @foreach(['الحياة في محطة الفضاء', 'البدلات الفضائية', 'رحلة العودة للأرض'] as $index => $lockedLesson)
                    <div class="lesson-card group grayscale opacity-60">
                        <div class="size-10 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-400 flex items-center justify-center shrink-0 group-hover:bg-primary/10 group-hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-xl">lock</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-black text-slate-500 dark:text-slate-500 text-sm">{{ $lockedLesson }}</h4>
                            <span class="text-[10px] text-slate-300 font-bold italic">مغلق حتى تنهي الدرس السابق</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- فوتر القائمة (التقدم) -->
                <div class="p-6 bg-slate-50 dark:bg-slate-800/50 rounded-b-[2.5rem] border-t border-slate-100 dark:border-slate-800">
                    <div class="flex items-center justify-between text-xs font-black mb-3">
                        <span class="text-slate-600 dark:text-slate-400 uppercase tracking-widest">تقدم الوحدة</span>
                        <span class="text-primary text-lg">٥٠٪</span>
                    </div>
                    <div class="w-full bg-slate-200 dark:bg-slate-700 h-2.5 rounded-full overflow-hidden shadow-inner">
                        <div class="bg-primary h-full w-1/2 rounded-full shadow-[0_0_10px_#22c55e]"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection