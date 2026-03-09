@extends('layouts.admin')

@section('title', 'الرئيسية - لوحة التحكم')

@section('content')
<header class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">مرحباً بك، {{ Auth::guard('admin')->user()->name }}!</h1>
        <p class="text-slate-500 mt-1">إليك نظرة سريعة على أداء المنصة اليوم</p>
    </div>
    <div class="flex items-center gap-4">
        <button class="relative p-2 text-slate-500 hover:bg-white hover:shadow-sm rounded-xl transition-all">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-2 left-2 size-2 bg-red-500 rounded-full border-2 border-background-light"></span>
        </button>
        <div class="h-8 w-px bg-slate-200"></div>
        <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-xl shadow-sm border border-slate-100">
            <span class="material-symbols-outlined text-primary">calendar_today</span>
            <span class="text-sm font-bold text-slate-600">{{ now()->locale('ar')->translatedFormat('j F Y') }}</span>
        </div>
    </div>
</header>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl stat-card-shadow border border-slate-50 flex items-center gap-4">
        <div class="size-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
            <span class="material-symbols-outlined text-3xl">school</span>
        </div>
        <div>
            <p class="text-sm font-bold text-slate-500">إجمالي الطلاب</p>
            <p class="text-2xl font-black text-slate-800">١,٢٨٤</p>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl stat-card-shadow border border-slate-50 flex items-center gap-4">
        <div class="size-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center">
            <span class="material-symbols-outlined text-3xl">record_voice_over</span>
        </div>
        <div>
            <p class="text-sm font-bold text-slate-500">إجمالي المعلمين</p>
            <p class="text-2xl font-black text-slate-800">٥٦</p>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl stat-card-shadow border border-slate-50 flex items-center gap-4">
        <div class="size-14 bg-green-50 text-primary rounded-2xl flex items-center justify-center">
            <span class="material-symbols-outlined text-3xl">auto_stories</span>
        </div>
        <div>
            <p class="text-sm font-bold text-slate-500">الدورات النشطة</p>
            <p class="text-2xl font-black text-slate-800">٣٢</p>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl stat-card-shadow border border-slate-50 flex items-center gap-4">
        <div class="size-14 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center">
            <span class="material-symbols-outlined text-3xl">stars</span>
        </div>
        <div>
            <p class="text-sm font-bold text-slate-500">النقاط الممنوحة</p>
            <p class="text-2xl font-black text-slate-800">٤٥,٢٠٠</p>
        </div>
    </div>
</div>

<!-- Charts & Activity -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- User Growth Chart -->
    <div class="lg:col-span-2 bg-white p-8 rounded-2xl stat-card-shadow border border-slate-50">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-lg font-bold text-slate-800">نمو المستخدمين</h3>
            <select class="bg-slate-50 border-none text-xs font-bold text-slate-500 rounded-lg focus:ring-0">
                <option>آخر ٦ أشهر</option>
                <option>آخر سنة</option>
            </select>
        </div>
        <div class="h-64 flex items-end justify-between gap-4 px-2">
            <div class="w-full bg-slate-50 rounded-t-lg relative group">
                <div class="absolute bottom-0 w-full bg-primary/20 rounded-t-lg transition-all h-[40%] group-hover:bg-primary/40"></div>
                <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] text-slate-400 font-bold">يناير</span>
            </div>
            <div class="w-full bg-slate-50 rounded-t-lg relative group">
                <div class="absolute bottom-0 w-full bg-primary/20 rounded-t-lg transition-all h-[55%] group-hover:bg-primary/40"></div>
                <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] text-slate-400 font-bold">فبراير</span>
            </div>
            <div class="w-full bg-slate-50 rounded-t-lg relative group">
                <div class="absolute bottom-0 w-full bg-primary/20 rounded-t-lg transition-all h-[45%] group-hover:bg-primary/40"></div>
                <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] text-slate-400 font-bold">مارس</span>
            </div>
            <div class="w-full bg-slate-50 rounded-t-lg relative group">
                <div class="absolute bottom-0 w-full bg-primary/20 rounded-t-lg transition-all h-[75%] group-hover:bg-primary/40"></div>
                <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] text-slate-400 font-bold">أبريل</span>
            </div>
            <div class="w-full bg-slate-50 rounded-t-lg relative group">
                <div class="absolute bottom-0 w-full bg-primary rounded-t-lg transition-all h-[90%]"></div>
                <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] text-slate-800 font-bold">مايو</span>
            </div>
            <div class="w-full bg-slate-50 rounded-t-lg relative group">
                <div class="absolute bottom-0 w-full bg-slate-200 rounded-t-lg transition-all h-[10%] group-hover:bg-slate-300"></div>
                <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] text-slate-400 font-bold">يونيو</span>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="bg-white p-8 rounded-2xl stat-card-shadow border border-slate-50">
        <h3 class="text-lg font-bold text-slate-800 mb-6">آخر النشاطات</h3>
        <div class="space-y-6">
            <div class="flex gap-4">
                <div class="size-10 bg-green-100 text-primary rounded-full flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-xl">person_add</span>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-800">انضمام طالب جديد</p>
                    <p class="text-xs text-slate-500 mt-0.5">سارة أحمد انضمت إلى كوكب العلوم</p>
                    <p class="text-[10px] text-slate-400 mt-1">منذ ٥ دقائق</p>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="size-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-xl">workspace_premium</span>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-800">إنجاز جديد</p>
                    <p class="text-xs text-slate-500 mt-0.5">حصل يوسف على وسام "المكتشف الصغير"</p>
                    <p class="text-[10px] text-slate-400 mt-1">منذ ١٢ دقيقة</p>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="size-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-xl">edit_document</span>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-800">تحديث دورة</p>
                    <p class="text-xs text-slate-500 mt-0.5">تم إضافة درس جديد في دورة الفضاء</p>
                    <p class="text-[10px] text-slate-400 mt-1">منذ ٣٠ دقيقة</p>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="size-10 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-xl">quiz</span>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-800">اختبار جديد</p>
                    <p class="text-xs text-slate-500 mt-0.5">قام المعلم خالد بنشر اختبار الذكاء</p>
                    <p class="text-[10px] text-slate-400 mt-1">منذ ساعة</p>
                </div>
            </div>
        </div>
        <button class="w-full mt-8 py-3 bg-slate-50 hover:bg-slate-100 text-slate-600 rounded-xl text-sm font-bold transition-all">
            عرض جميع النشاطات
        </button>
    </div>
</div>

<!-- Recently Registered -->
<div class="mt-8 bg-white rounded-2xl stat-card-shadow border border-slate-50 overflow-hidden">
    <div class="p-8 flex justify-between items-center border-b border-slate-50">
        <h3 class="text-lg font-bold text-slate-800">المسجلون مؤخراً</h3>
        <a href="{{ route('admin.users') }}" class="text-sm font-bold text-primary hover:underline">مشاهدة الكل</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-right">
            <thead class="bg-slate-50 text-slate-500 text-sm font-bold">
                <tr>
                    <th class="px-8 py-4">اسم الطالب</th>
                    <th class="px-8 py-4">المستوى</th>
                    <th class="px-8 py-4">تاريخ التسجيل</th>
                    <th class="px-8 py-4">الحالة</th>
                    <th class="px-8 py-4">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-8 py-4">
                        <div class="flex items-center gap-3">
                            <div class="size-8 rounded-full bg-slate-100"></div>
                            <span class="font-bold text-slate-700 text-sm">ياسين علي</span>
                        </div>
                    </td>
                    <td class="px-8 py-4 text-sm text-slate-600">المبتدئ</td>
                    <td class="px-8 py-4 text-sm text-slate-600">٢٤ مايو ٢٠٢٤</td>
                    <td class="px-8 py-4"><span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-[10px] font-bold">نشط</span></td>
                    <td class="px-8 py-4">
                        <button class="text-slate-400 hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-xl">more_horiz</span>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-8 py-4">
                        <div class="flex items-center gap-3">
                            <div class="size-8 rounded-full bg-slate-100"></div>
                            <span class="font-bold text-slate-700 text-sm">ليلى محمود</span>
                        </div>
                    </td>
                    <td class="px-8 py-4 text-sm text-slate-600">المتوسط</td>
                    <td class="px-8 py-4 text-sm text-slate-600">٢٣ مايو ٢٠٢٤</td>
                    <td class="px-8 py-4"><span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-[10px] font-bold">نشط</span></td>
                    <td class="px-8 py-4">
                        <button class="text-slate-400 hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-xl">more_horiz</span>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-8 py-4">
                        <div class="flex items-center gap-3">
                            <div class="size-8 rounded-full bg-slate-100"></div>
                            <span class="font-bold text-slate-700 text-sm">عمر إبراهيم</span>
                        </div>
                    </td>
                    <td class="px-8 py-4 text-sm text-slate-600">المتقدم</td>
                    <td class="px-8 py-4 text-sm text-slate-600">٢٢ مايو ٢٠٢٤</td>
                    <td class="px-8 py-4"><span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-[10px] font-bold">معلق</span></td>
                    <td class="px-8 py-4">
                        <button class="text-slate-400 hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-xl">more_horiz</span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
