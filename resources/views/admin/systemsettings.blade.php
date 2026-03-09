@extends('layouts.admin')

@section('title', 'إعدادات النظام')

@push('styles')
<style type="text/tailwindcss">
    .card-shadow { box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05); }
</style>
@endpush

@section('content')
<header class="mb-10 flex justify-between items-end">
    <div>
        <h2 class="text-3xl font-black text-slate-800">إعدادات النظام</h2>
        <p class="text-slate-500 mt-2 font-medium">قم بتخصيص المنصة والتحكم في القواعد العامة</p>
    </div>
    <div class="flex gap-3">
        <button class="px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-xl transition-all">إلغاء التعديلات</button>
        <button class="px-6 py-2.5 bg-primary hover:bg-green-600 text-white font-bold rounded-xl shadow-lg shadow-primary/20 transition-all">حفظ التغييرات</button>
    </div>
</header>

<div class="grid grid-cols-12 gap-8">
    <!-- Sidebar Navigation -->
    <div class="col-span-3 space-y-2">
        <button class="w-full flex items-center gap-3 px-5 py-4 bg-white border border-slate-200 rounded-2xl shadow-sm text-primary font-bold">
            <span class="material-symbols-outlined">info</span>
            <span>الإعدادات العامة</span>
        </button>
        <button class="w-full flex items-center gap-3 px-5 py-4 hover:bg-white/50 text-slate-500 font-bold rounded-2xl transition-all">
            <span class="material-symbols-outlined">lock</span>
            <span>الأمان والخصوصية</span>
        </button>
        <button class="w-full flex items-center gap-3 px-5 py-4 hover:bg-white/50 text-slate-500 font-bold rounded-2xl transition-all">
            <span class="material-symbols-outlined">notifications</span>
            <span>التنبيهات</span>
        </button>
        <button class="w-full flex items-center gap-3 px-5 py-4 hover:bg-white/50 text-slate-500 font-bold rounded-2xl transition-all">
            <span class="material-symbols-outlined">emoji_events</span>
            <span>قواعد التحفيز (Gamification)</span>
        </button>
    </div>

    <!-- Settings Content -->
    <div class="col-span-9 space-y-8">
        <!-- General Settings -->
        <section class="bg-white rounded-xl border border-slate-100 p-8 card-shadow">
            <div class="flex items-center gap-3 mb-8 border-b border-slate-50 pb-4">
                <span class="material-symbols-outlined text-primary">info</span>
                <h3 class="text-xl font-bold text-slate-800">الإعدادات العامة</h3>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 block mr-1">اسم الموقع</label>
                    <input class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all"
                           type="text" value="إيكو ستارز التعليمية"/>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 block mr-1">البريد الإلكتروني للدعم</label>
                    <input class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all"
                           type="email" value="support@echostars.com"/>
                </div>
                <div class="col-span-2 space-y-2">
                    <label class="text-sm font-bold text-slate-700 block mr-1">وصف المنصة</label>
                    <textarea class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" rows="3">منصة تفاعلية تعليمية تهدف لتبسيط العلوم للأطفال بأسلوب ممتع ومشوق.</textarea>
                </div>
            </div>
        </section>

        <!-- Security Settings -->
        <section class="bg-white rounded-xl border border-slate-100 p-8 card-shadow">
            <div class="flex items-center gap-3 mb-8 border-b border-slate-50 pb-4">
                <span class="material-symbols-outlined text-primary">security</span>
                <h3 class="text-xl font-bold text-slate-800">الأمان والخصوصية</h3>
            </div>
            <div class="space-y-6">
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-3xl text-slate-400">vibration</span>
                        <div>
                            <p class="font-bold text-slate-800">المصادقة الثنائية (2FA)</p>
                            <p class="text-xs text-slate-500">تفعيل طبقة حماية إضافية عند تسجيل الدخول</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input checked class="sr-only peer" type="checkbox"/>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:-translate-x-full rtl:peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 block mr-1">تغيير كلمة المرور للمسؤول</label>
                        <input class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all"
                               placeholder="••••••••" type="password"/>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 block mr-1">تأكيد كلمة المرور الجديدة</label>
                        <input class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all"
                               placeholder="••••••••" type="password"/>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gamification Rules -->
        <section class="bg-white rounded-xl border border-slate-100 p-8 card-shadow">
            <div class="flex items-center gap-3 mb-8 border-b border-slate-50 pb-4">
                <span class="material-symbols-outlined text-primary">emoji_events</span>
                <h3 class="text-xl font-bold text-slate-800">قواعد التحفيز والجوائز</h3>
            </div>
            <div class="grid grid-cols-3 gap-6">
                <div class="p-4 bg-green-50/50 rounded-2xl border border-green-100 flex flex-col items-center text-center">
                    <span class="material-symbols-outlined text-primary text-3xl mb-2">stars</span>
                    <label class="text-xs font-bold text-slate-600 mb-2">نقاط إكمال الدرس</label>
                    <input class="w-20 text-center py-2 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none font-bold"
                           type="number" value="50"/>
                </div>
                <div class="p-4 bg-blue-50/50 rounded-2xl border border-blue-100 flex flex-col items-center text-center">
                    <span class="material-symbols-outlined text-blue-500 text-3xl mb-2">quiz</span>
                    <label class="text-xs font-bold text-slate-600 mb-2">نقاط الاختبار المثالي</label>
                    <input class="w-20 text-center py-2 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none font-bold"
                           type="number" value="100"/>
                </div>
                <div class="p-4 bg-orange-50/50 rounded-2xl border border-orange-100 flex flex-col items-center text-center">
                    <span class="material-symbols-outlined text-orange-500 text-3xl mb-2">military_tech</span>
                    <label class="text-xs font-bold text-slate-600 mb-2">حد الحصول على وسام</label>
                    <input class="w-20 text-center py-2 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none font-bold"
                           type="number" value="1000"/>
                </div>
            </div>
        </section>

        <!-- Notification Settings -->
        <section class="bg-white rounded-xl border border-slate-100 p-8 card-shadow">
            <div class="flex items-center gap-3 mb-8 border-b border-slate-50 pb-4">
                <span class="material-symbols-outlined text-primary">notifications</span>
                <h3 class="text-xl font-bold text-slate-800">تنبيهات النظام</h3>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div class="space-y-4">
                    <h4 class="font-bold text-slate-700 text-sm mb-2">تنبيهات البريد</h4>
                    <div class="flex items-center gap-3">
                        <input checked class="size-5 rounded border-slate-300 text-primary focus:ring-primary" type="checkbox"/>
                        <label class="text-sm font-medium text-slate-600">تقارير يومية للمدير</label>
                    </div>
                    <div class="flex items-center gap-3">
                        <input checked class="size-5 rounded border-slate-300 text-primary focus:ring-primary" type="checkbox"/>
                        <label class="text-sm font-medium text-slate-600">تنبيهات تسجيل مستخدم جديد</label>
                    </div>
                </div>
                <div class="space-y-4">
                    <h4 class="font-bold text-slate-700 text-sm mb-2">تنبيهات التطبيق</h4>
                    <div class="flex items-center gap-3">
                        <input checked class="size-5 rounded border-slate-300 text-primary focus:ring-primary" type="checkbox"/>
                        <label class="text-sm font-medium text-slate-600">إشعارات التشجيع التلقائية</label>
                    </div>
                    <div class="flex items-center gap-3">
                        <input class="size-5 rounded border-slate-300 text-primary focus:ring-primary" type="checkbox"/>
                        <label class="text-sm font-medium text-slate-600">تنبيهات الصيانة المجدولة</label>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
