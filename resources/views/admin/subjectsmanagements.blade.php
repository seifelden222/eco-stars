@extends('layouts.admin')

@section('title', 'إدارة الدورات التعليمية')

@section('content')
<header class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
    <div>
        <h2 class="text-3xl font-black text-slate-800">إدارة الدورات التعليمية</h2>
        <p class="text-slate-500 font-bold mt-1">تتبع، مراجعة، وتنظيم المحتوى التعليمي للمنصة</p>
    </div>
    <div class="flex items-center gap-4">
        <div class="relative">
            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
            <input class="pr-12 pl-4 py-3 bg-white border border-slate-200 rounded-xl w-72 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all"
                   placeholder="البحث عن دورة أو معلم..." type="text"/>
        </div>
        <button class="size-12 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-slate-600 hover:border-primary transition-all relative">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-3 left-3 size-2 bg-red-500 rounded-full"></span>
        </button>
    </div>
</header>

<!-- Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <span class="text-slate-500 font-bold text-sm">إجمالي الدورات</span>
            <span class="p-2 bg-blue-50 text-blue-600 rounded-lg material-symbols-outlined">menu_book</span>
        </div>
        <p class="text-2xl font-black text-slate-800">١٢٨</p>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <span class="text-slate-500 font-bold text-sm">في انتظار الموافقة</span>
            <span class="p-2 bg-amber-50 text-amber-600 rounded-lg material-symbols-outlined">pending_actions</span>
        </div>
        <p class="text-2xl font-black text-slate-800">١٤</p>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <span class="text-slate-500 font-bold text-sm">إجمالي الطلاب</span>
            <span class="p-2 bg-green-50 text-green-600 rounded-lg material-symbols-outlined">group</span>
        </div>
        <p class="text-2xl font-black text-slate-800">٣,٤٢٠</p>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <span class="text-slate-500 font-bold text-sm">المشاهدات اليومية</span>
            <span class="p-2 bg-purple-50 text-purple-600 rounded-lg material-symbols-outlined">visibility</span>
        </div>
        <p class="text-2xl font-black text-slate-800">١٥,٢ ألف</p>
    </div>
</div>

<!-- Courses Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <!-- Course Card 1 - Pending -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
        <div class="relative h-44 bg-slate-100">
            <img alt="Course thumbnail" class="w-full h-full object-cover"
                 src="https://images.unsplash.com/photo-1516116216624-53e697fedbea?w=400&q=80"/>
            <div class="absolute top-4 right-4 px-3 py-1 bg-amber-500 text-white text-[10px] font-bold rounded-full">بانتظار الموافقة</div>
        </div>
        <div class="p-5">
            <h3 class="font-bold text-slate-800 mb-1 leading-snug">أساسيات البرمجة للصغار - بايثون</h3>
            <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                <span class="material-symbols-outlined text-sm">person</span>
                <span>أ. مريم العتيبي</span>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-1 text-slate-400">
                    <span class="material-symbols-outlined text-sm">group</span>
                    <span class="text-xs font-bold">٠ مسجل</span>
                </div>
                <div class="flex items-center gap-1 text-primary">
                    <span class="material-symbols-outlined text-sm">star</span>
                    <span class="text-xs font-bold">جديد</span>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <button class="bg-primary hover:bg-green-600 text-white py-2 rounded-xl text-xs font-bold transition-colors">موافقة</button>
                <button class="bg-slate-100 hover:bg-slate-200 text-slate-700 py-2 rounded-xl text-xs font-bold transition-colors">التفاصيل</button>
            </div>
        </div>
    </div>

    <!-- Course Card 2 - Published -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
        <div class="relative h-44 bg-slate-100">
            <img alt="Course thumbnail" class="w-full h-full object-cover"
                 src="https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?w=400&q=80"/>
            <div class="absolute top-4 right-4 px-3 py-1 bg-green-500 text-white text-[10px] font-bold rounded-full">منشور</div>
        </div>
        <div class="p-5">
            <h3 class="font-bold text-slate-800 mb-1 leading-snug">رحلة عبر الفضاء: النظام الشمسي</h3>
            <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                <span class="material-symbols-outlined text-sm">person</span>
                <span>د. خالد بن فهد</span>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-1 text-slate-600">
                    <span class="material-symbols-outlined text-sm">group</span>
                    <span class="text-xs font-bold">١,٢٥٠ مسجل</span>
                </div>
                <div class="flex items-center gap-1 text-amber-500">
                    <span class="material-symbols-outlined text-sm">star</span>
                    <span class="text-xs font-bold">٤.٩</span>
                </div>
            </div>
            <button class="w-full bg-slate-100 hover:bg-primary/10 hover:text-primary text-slate-700 py-3 rounded-xl text-sm font-bold transition-all flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-lg">edit</span> إدارة المحتوى
            </button>
        </div>
    </div>

    <!-- Course Card 3 - Published -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
        <div class="relative h-44 bg-slate-100">
            <img alt="Course thumbnail" class="w-full h-full object-cover"
                 src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400&q=80"/>
            <div class="absolute top-4 right-4 px-3 py-1 bg-green-500 text-white text-[10px] font-bold rounded-full">منشور</div>
        </div>
        <div class="p-5">
            <h3 class="font-bold text-slate-800 mb-1 leading-snug">تعلم اللغة الإنجليزية بالموسيقى</h3>
            <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                <span class="material-symbols-outlined text-sm">person</span>
                <span>أ. سارة المنصور</span>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-1 text-slate-600">
                    <span class="material-symbols-outlined text-sm">group</span>
                    <span class="text-xs font-bold">٨٤٠ مسجل</span>
                </div>
                <div class="flex items-center gap-1 text-amber-500">
                    <span class="material-symbols-outlined text-sm">star</span>
                    <span class="text-xs font-bold">٤.٧</span>
                </div>
            </div>
            <button class="w-full bg-slate-100 hover:bg-primary/10 hover:text-primary text-slate-700 py-3 rounded-xl text-sm font-bold transition-all flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-lg">edit</span> إدارة المحتوى
            </button>
        </div>
    </div>

    <!-- Course Card 4 - Published -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
        <div class="relative h-44 bg-slate-100">
            <img alt="Course thumbnail" class="w-full h-full object-cover"
                 src="https://images.unsplash.com/photo-1509228468518-180dd4864904?w=400&q=80"/>
            <div class="absolute top-4 right-4 px-3 py-1 bg-green-500 text-white text-[10px] font-bold rounded-full">منشور</div>
        </div>
        <div class="p-5">
            <h3 class="font-bold text-slate-800 mb-1 leading-snug">الرياضيات الممتعة: حل الألغاز</h3>
            <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                <span class="material-symbols-outlined text-sm">person</span>
                <span>أ. فيصل السعيد</span>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-1 text-slate-600">
                    <span class="material-symbols-outlined text-sm">group</span>
                    <span class="text-xs font-bold">٢,١٠٠ مسجل</span>
                </div>
                <div class="flex items-center gap-1 text-amber-500">
                    <span class="material-symbols-outlined text-sm">star</span>
                    <span class="text-xs font-bold">٤.٩</span>
                </div>
            </div>
            <button class="w-full bg-slate-100 hover:bg-primary/10 hover:text-primary text-slate-700 py-3 rounded-xl text-sm font-bold transition-all flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-lg">edit</span> إدارة المحتوى
            </button>
        </div>
    </div>

    <!-- Course Card 5 - Draft -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
        <div class="relative h-44 bg-slate-200 flex items-center justify-center">
            <span class="material-symbols-outlined text-5xl text-slate-400">image_not_supported</span>
            <div class="absolute top-4 right-4 px-3 py-1 bg-slate-500 text-white text-[10px] font-bold rounded-full">مسودة</div>
        </div>
        <div class="p-5">
            <h3 class="font-bold text-slate-800 mb-1 leading-snug">فنون الرسم الرقمي بالألوان</h3>
            <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                <span class="material-symbols-outlined text-sm">person</span>
                <span>أ. نورة الشهري</span>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-1 text-slate-400">
                    <span class="material-symbols-outlined text-sm">group</span>
                    <span class="text-xs font-bold">٠ مسجل</span>
                </div>
                <div class="flex items-center gap-1 text-slate-400">
                    <span class="material-symbols-outlined text-sm">schedule</span>
                    <span class="text-xs font-bold">قيد التنفيذ</span>
                </div>
            </div>
            <button class="w-full bg-slate-100 hover:bg-slate-200 text-slate-700 py-3 rounded-xl text-sm font-bold transition-all flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-lg">settings_suggest</span> تعديل المسودة
            </button>
        </div>
    </div>
</div>

<!-- Floating Add Button -->
<button class="fixed bottom-10 left-10 size-16 bg-primary text-white rounded-full shadow-2xl shadow-primary/40 hover:bg-green-600 hover:scale-110 active:scale-95 transition-all flex items-center justify-center z-[60]">
    <span class="material-symbols-outlined text-4xl">add</span>
</button>
@endsection
