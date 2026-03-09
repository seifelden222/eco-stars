@extends('layouts.admin')

@section('title', 'إدارة المستخدمين')

@push('styles')
<style type="text/tailwindcss">
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #22c55e44; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #22c55e88; }
</style>
@endpush

@section('content')
<header class="h-20 -mt-8 -mx-8 mb-8 bg-white border-b border-slate-200 px-8 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <h2 class="text-xl font-black text-slate-800">إدارة المستخدمين</h2>
        <div class="flex items-center gap-2 bg-slate-50 px-3 py-1 rounded-full">
            <span class="size-2 bg-primary rounded-full"></span>
            <span class="text-xs font-bold text-slate-600">١,٢٥٤ مستخدم نشط</span>
        </div>
    </div>
    <div class="flex items-center gap-4">
        <button class="size-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-600 hover:bg-slate-100 transition-colors relative">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-2 left-2 size-2 bg-red-500 rounded-full border-2 border-white"></span>
        </button>
        <button class="h-11 px-4 bg-primary text-white rounded-xl font-bold flex items-center gap-2 shadow-lg shadow-primary/20 hover:bg-green-600 transition-all">
            <span class="material-symbols-outlined">person_add</span>
            <span>إضافة مستخدم جديد</span>
        </button>
    </div>
</header>

<!-- Filters -->
<div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-100 mb-6 flex flex-wrap items-center gap-4">
    <div class="flex-1 min-w-[300px] relative">
        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
        <input class="w-full pr-12 pl-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/10 focus:border-primary outline-none transition-all text-sm font-medium"
               placeholder="البحث عن طريق الاسم، البريد الإلكتروني أو المعرف..." type="text"/>
    </div>
    <div class="flex items-center gap-3">
        <select class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-primary/10 outline-none min-w-[140px]">
            <option value="">جميع الأدوار</option>
            <option value="student">طالب</option>
            <option value="teacher">معلم</option>
            <option value="admin">مشرف</option>
        </select>
        <select class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-primary/10 outline-none min-w-[140px]">
            <option value="">جميع الصفوف</option>
            <option value="1">الصف الأول</option>
            <option value="2">الصف الثاني</option>
            <option value="3">الصف الثالث</option>
        </select>
        <button class="size-12 flex items-center justify-center rounded-xl border border-slate-200 text-slate-500 hover:bg-slate-50 transition-colors">
            <span class="material-symbols-outlined">filter_list</span>
        </button>
    </div>
</div>

<!-- Users Table -->
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <table class="w-full text-right border-collapse">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-100">
                <th class="px-6 py-5 text-sm font-black text-slate-500">المستخدم</th>
                <th class="px-6 py-5 text-sm font-black text-slate-500">الدور</th>
                <th class="px-6 py-5 text-sm font-black text-slate-500">تاريخ الانضمام</th>
                <th class="px-6 py-5 text-sm font-black text-slate-500">الحالة</th>
                <th class="px-6 py-5 text-sm font-black text-slate-500">الإجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-50">
            <tr class="hover:bg-slate-50/50 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">س</div>
                        <div>
                            <div class="text-sm font-bold text-slate-800">سارة أحمد</div>
                            <div class="text-[11px] text-slate-500">sara.a@example.com</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4"><span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-black">طالب</span></td>
                <td class="px-6 py-4"><span class="text-sm font-medium text-slate-600">١٢ مارس ٢٠٢٤</span></td>
                <td class="px-6 py-4">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input checked class="sr-only peer" type="checkbox"/>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-[-1.25rem] after:content-[''] after:absolute after:top-[2px] after:right-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <button class="h-9 px-3 text-xs font-bold text-primary hover:bg-primary/5 rounded-lg transition-colors flex items-center gap-1 border border-primary/20">
                            <span class="material-symbols-outlined text-sm">visibility</span> الملف
                        </button>
                        <button class="size-9 flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-lg">edit</span>
                        </button>
                    </div>
                </td>
            </tr>
            <tr class="hover:bg-slate-50/50 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold">م</div>
                        <div>
                            <div class="text-sm font-bold text-slate-800">محمد العتيبي</div>
                            <div class="text-[11px] text-slate-500">m.otaibi@example.com</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4"><span class="px-3 py-1 bg-orange-50 text-orange-600 rounded-full text-xs font-black">معلم</span></td>
                <td class="px-6 py-4"><span class="text-sm font-medium text-slate-600">٠٥ فبراير ٢٠٢٤</span></td>
                <td class="px-6 py-4">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input checked class="sr-only peer" type="checkbox"/>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-[-1.25rem] after:content-[''] after:absolute after:top-[2px] after:right-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <button class="h-9 px-3 text-xs font-bold text-primary hover:bg-primary/5 rounded-lg transition-colors flex items-center gap-1 border border-primary/20">
                            <span class="material-symbols-outlined text-sm">visibility</span> الملف
                        </button>
                        <button class="size-9 flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-lg">edit</span>
                        </button>
                    </div>
                </td>
            </tr>
            <tr class="hover:bg-slate-50/50 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center font-bold">ن</div>
                        <div>
                            <div class="text-sm font-bold text-slate-800">نورة القحطاني</div>
                            <div class="text-[11px] text-slate-500">noura.q@example.com</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4"><span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-black">طالب</span></td>
                <td class="px-6 py-4"><span class="text-sm font-medium text-slate-600">٢٨ يناير ٢٠٢٤</span></td>
                <td class="px-6 py-4">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input class="sr-only peer" type="checkbox"/>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-[-1.25rem] after:content-[''] after:absolute after:top-[2px] after:right-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <button class="h-9 px-3 text-xs font-bold text-primary hover:bg-primary/5 rounded-lg transition-colors flex items-center gap-1 border border-primary/20">
                            <span class="material-symbols-outlined text-sm">visibility</span> الملف
                        </button>
                        <button class="size-9 flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-lg">edit</span>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
        <span class="text-xs font-bold text-slate-500">عرض ١-١٠ من أصل ١,٢٥٤ مستخدم</span>
        <div class="flex items-center gap-1">
            <button class="size-8 flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-400 disabled:opacity-50">
                <span class="material-symbols-outlined text-lg">chevron_right</span>
            </button>
            <button class="size-8 flex items-center justify-center rounded-lg bg-primary text-white text-xs font-bold">١</button>
            <button class="size-8 flex items-center justify-center rounded-lg hover:bg-white border border-transparent hover:border-slate-200 text-slate-600 text-xs font-bold">٢</button>
            <button class="size-8 flex items-center justify-center rounded-lg hover:bg-white border border-transparent hover:border-slate-200 text-slate-600 text-xs font-bold">٣</button>
            <span class="px-1 text-slate-400">...</span>
            <button class="size-8 flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-400">
                <span class="material-symbols-outlined text-lg">chevron_left</span>
            </button>
        </div>
    </div>
</div>
@endsection
