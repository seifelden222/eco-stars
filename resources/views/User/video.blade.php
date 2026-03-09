@extends('layouts.app')

@section('title', 'مشاهدة الدرس - إيكو ستارز')

@push('styles')
<style>
    .video-container {
        width: 100%;
        aspect-ratio: 16/9;
        border-radius: 2.5rem;
        overflow: hidden;
        position: relative;
    }
    .lesson-card.active {
        border-color: #22c55e;
    }
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 2px;
    }
</style>
@endpush

@section('content')
<div class="p-4 md:p-8">
    <div class="w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-8 space-y-6">
                <div class="video-container shadow-2xl shadow-primary/20 bg-slate-900 flex items-center justify-center relative group">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="material-symbols-outlined !text-8xl text-white/20">play_circle</span>
                    </div>
                    <img alt="Space Video" class="w-full h-full object-cover opacity-60" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCf7mjIfH97e0q0rDRv8lmTN9JrWyuRndmaDD9juDvcsqfHcgND3UipQdzWGAq43jvFNC58wlqCDqR--viofvJkKnU1txEBgEQE2xU_ybJqKJcMH6MyAwsL0aMqcrFpmA58MelPzj-CXaazzVQPW-SgOX5la7BGNELv4uLqrKa13QFkcV0KbP8aK6zfEqzrBb0_pPKr5EVj0Db3LqEUIwFRKy_ka8WO0k587cr0yRQ4-F8fE-SvVQubYORrLRKJoWVz2_0h0MCKMJM"/>
                    <div class="absolute bottom-6 left-6 right-6 flex items-center gap-4 bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/20">
                        <button class="size-12 rounded-xl bg-white text-primary flex items-center justify-center shadow-lg">
                            <span class="material-symbols-outlined fill-current">play_arrow</span>
                        </button>
                        <div class="flex-1 h-2 bg-white/30 rounded-full relative">
                            <div class="absolute top-0 right-0 h-full w-1/3 bg-primary rounded-full"></div>
                        </div>
                        <span class="text-white font-bold text-sm">١٠:٤٥</span>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 bg-white dark:bg-slate-900 p-8 rounded-[2rem] shadow-sm border border-slate-100 dark:border-slate-800">
                    <div>
                        <h1 class="text-3xl font-black text-slate-800 dark:text-white mb-2">الدرس الثالث: الكواكب والنجوم</h1>
                        <p class="text-slate-500 dark:text-slate-400 font-medium">في هذا الدرس سنتعرف على عجائب المجموعة الشمسية</p>
                    </div>
                    <button class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-2xl font-black text-lg flex items-center justify-center gap-3 shadow-xl transition-all transform hover:scale-105">
                        <span class="material-symbols-outlined">check_circle</span>
                        تم الإكمال
                    </button>
                </div>
            </div>
            <div class="lg:col-span-4 h-full">
                <div class="bg-white dark:bg-slate-900 rounded-[2rem] border border-slate-100 dark:border-slate-800 flex flex-col h-[calc(100vh-12rem)] shadow-sm">
                    <div class="p-6 border-b border-slate-100 dark:border-slate-800">
                        <h3 class="text-xl font-black flex items-center gap-3 text-slate-800 dark:text-white">
                            <span class="material-symbols-outlined text-primary">format_list_bulleted</span>
                            قائمة الدروس
                        </h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">الوحدة الأولى: استكشاف الفضاء</p>
                    </div>
                    <div class="flex-1 overflow-y-auto p-4 space-y-3 custom-scrollbar">
                        <div class="lesson-card p-4 rounded-2xl border border-slate-100 dark:border-slate-800 flex items-center gap-4 bg-slate-50/50 dark:bg-slate-800/30">
                            <div class="size-10 rounded-xl bg-green-500 text-white flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-xl">check</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-800 dark:text-white text-sm">مقدمة في علم الفلك</h4>
                                <span class="text-xs text-slate-400">٥ دقائق</span>
                            </div>
                        </div>
                        <div class="lesson-card p-4 rounded-2xl border border-slate-100 dark:border-slate-800 flex items-center gap-4 bg-slate-50/50 dark:bg-slate-800/30">
                            <div class="size-10 rounded-xl bg-green-500 text-white flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-xl">check</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-800 dark:text-white text-sm">تلسكوباتنا الأولى</h4>
                                <span class="text-xs text-slate-400">٨ دقائق</span>
                            </div>
                        </div>
                        <div class="lesson-card active p-4 rounded-2xl border-2 flex items-center gap-4">
                            <div class="size-10 rounded-xl bg-primary text-white flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-xl">play_arrow</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-primary text-sm">الكواكب والنجوم</h4>
                                <span class="text-xs text-primary/70">١٢ دقيقة • جاري المشاهدة</span>
                            </div>
                        </div>
                        <div class="lesson-card p-4 rounded-2xl border border-slate-100 dark:border-slate-800 flex items-center gap-4 hover:border-primary/30 transition-colors cursor-pointer group">
                            <div class="size-10 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-400 group-hover:bg-primary/10 group-hover:text-primary flex items-center justify-center shrink-0 transition-colors">
                                <span class="material-symbols-outlined text-xl">lock</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-500 dark:text-slate-400 text-sm">الحياة في محطة الفضاء</h4>
                                <span class="text-xs text-slate-400">١٥ دقيقة</span>
                            </div>
                        </div>
                        <div class="lesson-card p-4 rounded-2xl border border-slate-100 dark:border-slate-800 flex items-center gap-4 hover:border-primary/30 transition-colors cursor-pointer group">
                            <div class="size-10 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-400 group-hover:bg-primary/10 group-hover:text-primary flex items-center justify-center shrink-0 transition-colors">
                                <span class="material-symbols-outlined text-xl">lock</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-500 dark:text-slate-400 text-sm">البدلات الفضائية</h4>
                                <span class="text-xs text-slate-400">٧ دقائق</span>
                            </div>
                        </div>
                        <div class="lesson-card p-4 rounded-2xl border border-slate-100 dark:border-slate-800 flex items-center gap-4 hover:border-primary/30 transition-colors cursor-pointer group">
                            <div class="size-10 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-400 group-hover:bg-primary/10 group-hover:text-primary flex items-center justify-center shrink-0 transition-colors">
                                <span class="material-symbols-outlined text-xl">lock</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-500 dark:text-slate-400 text-sm">رحلة العودة للأرض</h4>
                                <span class="text-xs text-slate-400">١٠ دقائق</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 bg-slate-50 dark:bg-slate-800/50 rounded-b-[2rem]">
                        <div class="flex items-center justify-between text-sm font-bold mb-2">
                            <span class="text-slate-600 dark:text-slate-400">تقدم الوحدة</span>
                            <span class="text-primary">٥٠٪</span>
                        </div>
                        <div class="w-full bg-slate-200 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-primary h-full w-1/2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
