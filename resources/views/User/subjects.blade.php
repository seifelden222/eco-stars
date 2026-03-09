@extends('layouts.app')

@section('title', 'دوراتي - إيكو ستارز')

@section('content')
<div class="p-4 sm:p-8 max-w-7xl mx-auto w-full space-y-8">
    
    <!-- الفلاتر -->
    <div class="flex flex-wrap items-center gap-3 mb-10">
        <button class="px-8 py-3 bg-primary text-white rounded-2xl font-black shadow-lg shadow-primary/20 transition-all">الكل</button>
        <button class="px-8 py-3 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 border border-slate-200 dark:border-slate-800 rounded-2xl font-bold transition-all">قيد التعلم</button>
        <button class="px-8 py-3 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 border border-slate-200 dark:border-slate-800 rounded-2xl font-bold transition-all">تم الانتهاء</button>
    </div>

    <!-- شبكة الدورات -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        @php
            $courses = [
                ['title' => 'مغامرة البرمجة مع سكراتش', 'progress' => 75, 'lessons' => 12, 'tag' => 'برمجة', 'color' => 'bg-blue-500'],
                ['title' => 'أسرار الرسم الرقمي الصغير', 'progress' => 30, 'lessons' => 8, 'tag' => 'فنون', 'color' => 'bg-purple-500'],
                ['title' => 'رحلة في أعماق البحار', 'progress' => 100, 'lessons' => 10, 'tag' => 'علوم', 'color' => 'bg-yellow-500'],
            ];
        @endphp

        @foreach($courses as $course)
        <div class="course-card bg-white dark:bg-slate-900 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 transition-all group hover:-translate-y-1">
            <div class="h-48 relative overflow-hidden bg-slate-100">
                <div class="absolute inset-0 flex items-center justify-center opacity-20">
                    <span class="material-symbols-outlined !text-8xl">school</span>
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-white text-xs font-black border border-white/20">
                    {{ $course['lessons'] }} درس
                </div>
            </div>
            <div class="p-8">
                <div class="flex items-center gap-2 mb-4">
                    <span class="px-3 py-1 bg-primary/10 text-primary text-[10px] font-black rounded-lg uppercase tracking-wider">{{ $course['tag'] }}</span>
                </div>
                <h3 class="text-2xl font-black mb-6 text-slate-800 dark:text-white leading-tight h-14 overflow-hidden line-clamp-2">
                    {{ $course['title'] }}
                </h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-end">
                        <span class="text-sm font-black {{ $course['progress'] == 100 ? 'text-primary' : 'text-slate-500' }}">
                            {{ $course['progress'] == 100 ? 'مكتمل!' : 'التقدم: '.$course['progress'].'%' }}
                        </span>
                    </div>
                    <div class="h-3 w-full bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full transition-all duration-700" style="width: {{ $course['progress'] }}%"></div>
                    </div>
                </div>
                <a href="{{ route('lessons') }}" class="w-full mt-8 py-4 {{ $course['progress'] == 100 ? 'border-2 border-primary text-primary hover:bg-primary hover:text-white' : 'bg-primary text-white shadow-lg shadow-primary/20' }} rounded-2xl font-black transition-all flex items-center justify-center gap-2 group-hover:scale-[1.02]">
                    <span>{{ $course['progress'] == 100 ? 'مشاهدة مرة أخرى' : 'متابعة التعلم' }}</span>
                    <span class="material-symbols-outlined">{{ $course['progress'] == 100 ? 'refresh' : 'play_circle' }}</span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection