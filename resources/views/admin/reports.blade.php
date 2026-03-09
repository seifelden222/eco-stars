@extends('layouts.admin')

@section('title', 'التقارير والتحليلات')

@push('styles')
<style type="text/tailwindcss">
    .chart-container {
        @apply bg-white p-6 rounded-lg border border-slate-100 shadow-sm hover:shadow-md transition-shadow;
    }
    .heat-map-cell {
        @apply size-6 rounded-sm;
    }
</style>
@endpush

@section('content')
<header class="h-20 -mt-8 -mx-8 mb-8 bg-white border-b border-slate-200 flex items-center justify-between px-8">
    <div class="flex flex-col">
        <h1 class="text-2xl font-black text-slate-800">التقارير والتحليلات</h1>
        <p class="text-sm text-slate-500">نظرة شاملة على أداء المنصة وتفاعل الأطفال</p>
    </div>
    <div class="flex items-center gap-4">
        <div class="flex items-center bg-slate-100 rounded-xl px-4 py-2 gap-2 text-slate-600">
            <span class="material-symbols-outlined">calendar_today</span>
            <span class="text-sm font-bold">الأسبوع الأخير</span>
            <span class="material-symbols-outlined text-sm">expand_more</span>
        </div>
        <button class="bg-primary text-white px-6 py-2 rounded-xl font-bold flex items-center gap-2 hover:bg-green-600 transition-colors shadow-lg shadow-primary/20">
            <span class="material-symbols-outlined">download</span>
            <span>تصدير البيانات</span>
        </button>
    </div>
</header>

<div class="space-y-8">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="size-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">stars</span>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-bold">إجمالي النقاط</p>
                <h3 class="text-2xl font-black text-slate-800">128,450</h3>
                <p class="text-xs text-green-600 font-bold flex items-center gap-1 mt-1">
                    <span class="material-symbols-outlined text-xs">trending_up</span>
                    +12% من الشهر الماضي
                </p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="size-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">menu_book</span>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-bold">دروس مكتملة</p>
                <h3 class="text-2xl font-black text-slate-800">1,240</h3>
                <p class="text-xs text-green-600 font-bold flex items-center gap-1 mt-1">
                    <span class="material-symbols-outlined text-xs">trending_up</span>
                    +5% من الشهر الماضي
                </p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="size-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">avg_time</span>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-bold">متوسط التعلم</p>
                <h3 class="text-2xl font-black text-slate-800">42 دقيقة</h3>
                <p class="text-xs text-slate-400 font-bold mt-1">لكل طالب يومياً</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="size-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined">group_add</span>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-bold">مشتركين جدد</p>
                <h3 class="text-2xl font-black text-slate-800">324</h3>
                <p class="text-xs text-green-600 font-bold flex items-center gap-1 mt-1">
                    <span class="material-symbols-outlined text-xs">trending_up</span>
                    +24% الأسبوع الحالي
                </p>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Bar Chart -->
        <div class="chart-container">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-lg font-bold text-slate-800">إكمال الدروس حسب الفئة</h3>
                <span class="material-symbols-outlined text-slate-400">bar_chart</span>
            </div>
            <div class="space-y-6 h-64 flex flex-col justify-end">
                <div class="flex items-end gap-6 h-full w-full">
                    <div class="flex flex-col items-center flex-1 gap-2">
                        <div class="w-full bg-primary/20 rounded-t-lg relative group h-[40%]">
                            <div class="absolute bottom-0 w-full bg-primary rounded-t-lg h-full"></div>
                            <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs px-2 py-1 rounded hidden group-hover:block">420</div>
                        </div>
                        <span class="text-xs font-bold text-slate-500">علوم</span>
                    </div>
                    <div class="flex flex-col items-center flex-1 gap-2">
                        <div class="w-full bg-primary/20 rounded-t-lg relative group h-[85%]">
                            <div class="absolute bottom-0 w-full bg-primary rounded-t-lg h-full"></div>
                            <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs px-2 py-1 rounded hidden group-hover:block">850</div>
                        </div>
                        <span class="text-xs font-bold text-slate-500">لغات</span>
                    </div>
                    <div class="flex flex-col items-center flex-1 gap-2">
                        <div class="w-full bg-primary/20 rounded-t-lg relative group h-[60%]">
                            <div class="absolute bottom-0 w-full bg-primary rounded-t-lg h-full"></div>
                            <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs px-2 py-1 rounded hidden group-hover:block">610</div>
                        </div>
                        <span class="text-xs font-bold text-slate-500">رياضيات</span>
                    </div>
                    <div class="flex flex-col items-center flex-1 gap-2">
                        <div class="w-full bg-primary/20 rounded-t-lg relative group h-[70%]">
                            <div class="absolute bottom-0 w-full bg-primary rounded-t-lg h-full"></div>
                            <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs px-2 py-1 rounded hidden group-hover:block">720</div>
                        </div>
                        <span class="text-xs font-bold text-slate-500">فن</span>
                    </div>
                    <div class="flex flex-col items-center flex-1 gap-2">
                        <div class="w-full bg-primary/20 rounded-t-lg relative group h-[35%]">
                            <div class="absolute bottom-0 w-full bg-primary rounded-t-lg h-full"></div>
                            <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs px-2 py-1 rounded hidden group-hover:block">380</div>
                        </div>
                        <span class="text-xs font-bold text-slate-500">تاريخ</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="chart-container">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-lg font-bold text-slate-800">توزيع النقاط المكتسبة</h3>
                <span class="material-symbols-outlined text-slate-400">pie_chart</span>
            </div>
            <div class="flex items-center justify-around h-64">
                <div class="relative size-48 rounded-full border-[16px] border-slate-100 flex items-center justify-center"
                     style="background: conic-gradient(#22c55e 0% 45%, #4ade80 45% 75%, #bbf7d0 75% 100%);">
                    <div class="absolute size-32 bg-white rounded-full flex flex-col items-center justify-center">
                        <span class="text-3xl font-black text-slate-800">100%</span>
                        <span class="text-[10px] text-slate-400 font-bold uppercase">الإجمالي</span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <div class="size-3 bg-primary rounded-full"></div>
                        <span class="text-xs font-bold text-slate-600">إنهاء المهام (45%)</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="size-3 bg-green-400 rounded-full"></div>
                        <span class="text-xs font-bold text-slate-600">التحديات اليومية (30%)</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="size-3 bg-green-200 rounded-full"></div>
                        <span class="text-xs font-bold text-slate-600">المكافآت الخاصة (25%)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Heatmap -->
    <div class="chart-container">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h3 class="text-lg font-bold text-slate-800">نشاط المستخدمين اليومي</h3>
                <p class="text-sm text-slate-400">توزيع النشاط خلال الـ 30 يوماً الماضية</p>
            </div>
            <div class="flex items-center gap-2 text-xs text-slate-400">
                <span>أقل</span>
                <div class="heat-map-cell bg-green-50"></div>
                <div class="heat-map-cell bg-green-200"></div>
                <div class="heat-map-cell bg-green-400"></div>
                <div class="heat-map-cell bg-green-600"></div>
                <span>أكثر</span>
            </div>
        </div>
        <div class="overflow-x-auto pb-4">
            <div class="grid grid-rows-7 grid-flow-col gap-2 min-w-max">
                <div class="grid grid-rows-7 gap-2 ml-4">
                    <span class="text-[10px] text-slate-400 font-bold h-6 flex items-center">أحد</span>
                    <span class="text-[10px] text-slate-400 font-bold h-6 flex items-center">إثنين</span>
                    <span class="text-[10px] text-slate-400 font-bold h-6 flex items-center">ثلاثاء</span>
                    <span class="text-[10px] text-slate-400 font-bold h-6 flex items-center">أربعاء</span>
                    <span class="text-[10px] text-slate-400 font-bold h-6 flex items-center">خميس</span>
                    <span class="text-[10px] text-slate-400 font-bold h-6 flex items-center">جمعة</span>
                    <span class="text-[10px] text-slate-400 font-bold h-6 flex items-center">سبت</span>
                </div>
                <div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-50"></div><div class="heat-map-cell bg-green-100"></div><div class="heat-map-cell bg-green-400"></div>
                <div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-50"></div><div class="heat-map-cell bg-green-100"></div><div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-600"></div>
                <div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-200"></div>
                <div class="heat-map-cell bg-green-100"></div><div class="heat-map-cell bg-green-50"></div><div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-400"></div>
                <div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-50"></div><div class="heat-map-cell bg-green-100"></div><div class="heat-map-cell bg-green-400"></div>
                <div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-50"></div><div class="heat-map-cell bg-green-100"></div><div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-600"></div>
                <div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-200"></div>
                <div class="heat-map-cell bg-green-100"></div><div class="heat-map-cell bg-green-50"></div><div class="heat-map-cell bg-green-400"></div><div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-200"></div><div class="heat-map-cell bg-green-600"></div><div class="heat-map-cell bg-green-400"></div>
            </div>
        </div>
    </div>
</div>
@endsection
