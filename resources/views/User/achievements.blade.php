{{-- تم استخدام extends لربط الصفحة بالتخطيط الرئيسي app.blade.php --}}
@extends('layouts.app')

@section('title', 'إنجازاتي - إيكو ستارز')

@section('content')
<div class="p-4 sm:p-8 max-w-7xl mx-auto w-full space-y-8" x-data="{ showBadgeModal: false, selectedBadge: {} }">
    
    <!-- بطاقة تقدم المستوى (Level Progress Card) -->
    <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-6 sm:p-8 border border-slate-100 dark:border-slate-800 shadow-sm relative overflow-hidden group">
        <div class="absolute top-0 right-0 size-32 bg-primary/5 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-110"></div>
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-6 relative z-10">
            <div class="flex items-center gap-5">
                <div class="size-20 bg-gradient-to-tr from-primary to-emerald-400 rounded-3xl flex items-center justify-center text-white shadow-xl shadow-primary/20 transform -rotate-3 transition-transform group-hover:rotate-0">
                    <span class="text-3xl font-black">٥</span>
                </div>
                <div>
                    <h3 class="text-2xl font-black text-slate-800 dark:text-white">أنت بطل رائع! 🚀</h3>
                    <p class="text-slate-500 dark:text-slate-400 font-bold mt-1">بقي لك ٤٥٠ نقطة للوصول للمستوى ٦ وفتح هدايا جديدة.</p>
                </div>
            </div>
            <div class="text-right flex flex-col items-end">
                <span class="text-4xl font-black text-primary leading-none">٧٥٪</span>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-2">اكتمال المستوى الحالي</span>
            </div>
        </div>

        <!-- شريط التقدم (Progress Bar) -->
        <div class="h-8 bg-slate-100 dark:bg-slate-800 rounded-2xl p-1.5 shadow-inner">
            <div class="h-full bg-gradient-to-r from-primary to-emerald-400 rounded-xl shadow-lg flex items-center justify-end px-3 transition-all duration-1000 ease-out relative" style="width: 75%">
                <div class="size-4 bg-white/40 rounded-full animate-ping absolute left-2"></div>
                <div class="size-3 bg-white rounded-full shadow-sm"></div>
            </div>
        </div>
    </div>

    <!-- قسم خزانة الأوسمة (Badges Section) -->
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="size-12 bg-yellow-50 dark:bg-yellow-900/20 rounded-2xl flex items-center justify-center text-yellow-500">
                    <span class="material-symbols-outlined text-3xl fill-current">workspace_premium</span>
                </div>
                <h3 class="text-2xl font-black text-slate-800 dark:text-white">خزانة الأوسمة</h3>
            </div>
            <div class="inline-flex items-center gap-2 px-5 py-2.5 bg-white dark:bg-slate-800 rounded-2xl text-sm font-black border border-slate-100 dark:border-slate-700 shadow-sm">
                <span class="text-slate-400 font-bold">الأوسمة المحققة:</span>
                <span class="text-primary text-lg">١٢</span>
                <span class="text-slate-300">/</span>
                <span class="text-slate-400 text-lg">٢٤</span>
            </div>
        </div>

        <!-- شبكة الأوسمة (Badges Grid) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            
            <!-- وسام محقق (Unlocked Badge Example) -->
            <button @click="showBadgeModal = true; selectedBadge = { name: 'المتعلم السريع', desc: 'لقد حصلت على هذا الوسام لتميزك في سرعة الإنجاز والتعلم!', icon: 'bolt', color: 'text-yellow-500', bg: 'bg-yellow-50' }" 
                    class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-8 border-b-4 border-primary border-t border-x border-slate-100 dark:border-slate-800 hover:shadow-xl hover:-translate-y-1 transition-all group flex flex-col items-center text-center">
                <div class="size-32 bg-yellow-50 dark:bg-yellow-900/20 rounded-full mb-6 flex items-center justify-center relative shadow-inner group-hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-7xl text-yellow-500 fill-current">bolt</span>
                    <div class="absolute -bottom-1 -right-1 size-10 bg-primary rounded-full border-4 border-white dark:border-slate-900 flex items-center justify-center shadow-lg">
                        <span class="material-symbols-outlined text-white text-xl font-black">check</span>
                    </div>
                </div>
                <h4 class="font-black text-xl mb-2 text-slate-800 dark:text-white">المتعلم السريع</h4>
                <p class="text-sm text-slate-500 dark:text-slate-400 font-bold">أنهيت ٣ دروس في يوم واحد</p>
            </button>

            <!-- وسام محقق 2 -->
            <button @click="showBadgeModal = true; selectedBadge = { name: 'جامع النجوم', desc: 'أنت الآن تمتلك ثروة من النجوم المضيئة!', icon: 'star_half', color: 'text-blue-500', bg: 'bg-blue-50' }"
                    class="bg-white dark:bg-slate-900 rounded-[2.5rem] p-8 border-b-4 border-primary border-t border-x border-slate-100 dark:border-slate-800 hover:shadow-xl hover:-translate-y-1 transition-all group flex flex-col items-center text-center">
                <div class="size-32 bg-blue-50 dark:bg-blue-900/20 rounded-full mb-6 flex items-center justify-center relative shadow-inner group-hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-7xl text-blue-500 fill-current">star_half</span>
                    <div class="absolute -bottom-1 -right-1 size-10 bg-primary rounded-full border-4 border-white dark:border-slate-900 flex items-center justify-center shadow-lg">
                        <span class="material-symbols-outlined text-white text-xl font-black">check</span>
                    </div>
                </div>
                <h4 class="font-black text-xl mb-2 text-slate-800 dark:text-white">جامع النجوم</h4>
                <p class="text-sm text-slate-500 dark:text-slate-400 font-bold">جمعت أول ١,٠٠٠ نجمة</p>
            </button>

            <!-- وسام مغلق (Locked Badge) -->
            <div class="bg-slate-50/50 dark:bg-slate-800/30 rounded-[2.5rem] p-8 border border-dashed border-slate-200 dark:border-slate-700 flex flex-col items-center text-center grayscale opacity-60 transition-all group">
                <div class="size-32 bg-slate-200 dark:bg-slate-700 rounded-full mb-6 flex items-center justify-center relative">
                    <span class="material-symbols-outlined text-7xl text-slate-400">rocket</span>
                    <div class="absolute inset-0 flex items-center justify-center bg-slate-900/10 rounded-full backdrop-blur-[1px]">
                        <span class="material-symbols-outlined text-slate-600 dark:text-slate-400 text-4xl">lock</span>
                    </div>
                </div>
                <h4 class="font-black text-xl mb-2 text-slate-400">مستكشف الكواكب</h4>
                <p class="text-sm text-slate-400 font-bold">أنهِ الوحدة التعليمية الثالثة</p>
            </div>

            <!-- وسام مغلق 2 -->
            <div class="bg-slate-50/50 dark:bg-slate-800/30 rounded-[2.5rem] p-8 border border-dashed border-slate-200 dark:border-slate-700 flex flex-col items-center text-center grayscale opacity-60 transition-all group">
                <div class="size-32 bg-slate-200 dark:bg-slate-700 rounded-full mb-6 flex items-center justify-center relative">
                    <span class="material-symbols-outlined text-7xl text-slate-400">military_tech</span>
                    <div class="absolute inset-0 flex items-center justify-center bg-slate-900/10 rounded-full backdrop-blur-[1px]">
                        <span class="material-symbols-outlined text-slate-600 dark:text-slate-400 text-4xl">lock</span>
                    </div>
                </div>
                <h4 class="font-black text-xl mb-2 text-slate-400">قائد الأبطال</h4>
                <p class="text-sm text-slate-400 font-bold">صل إلى المستوى ١٠</p>
            </div>
        </div>
    </div>

    <!-- النافذة المنبثقة لتفاصيل الوسام (Badge Detail Modal) -->
    <template x-teleport="body">
        <div x-show="showBadgeModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-md"
             style="display: none;">
            
            <div @click.away="showBadgeModal = false" 
                 class="bg-white dark:bg-slate-900 rounded-[3rem] p-8 sm:p-12 max-w-md w-full shadow-2xl relative border border-slate-100 dark:border-slate-800">
                
                <button @click="showBadgeModal = false" class="absolute top-8 left-8 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors">
                    <span class="material-symbols-outlined text-3xl">close</span>
                </button>

                <div class="text-center">
                    <div :class="selectedBadge.bg" class="size-48 rounded-full mx-auto mb-8 flex items-center justify-center shadow-inner">
                        <span :class="selectedBadge.color" class="material-symbols-outlined !text-9xl fill-current animate-bounce" x-text="selectedBadge.icon"></span>
                    </div>
                    
                    <h3 class="text-3xl font-black mb-4 text-slate-800 dark:text-white" x-text="selectedBadge.name"></h3>
                    <p class="text-slate-500 dark:text-slate-400 text-lg font-bold mb-10 leading-relaxed" x-text="selectedBadge.desc"></p>
                    
                    <div class="bg-slate-50 dark:bg-slate-800 p-6 rounded-[2rem] mb-10 border border-slate-100 dark:border-slate-700">
                        <h4 class="font-black text-xs uppercase tracking-widest text-slate-400 mb-4 text-center">متطلبات الإنجاز</h4>
                        <ul class="text-right space-y-4">
                            <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300 font-black">
                                <span class="material-symbols-outlined text-primary font-bold">check_circle</span>
                                إكمال درسين في أقل من ٣٠ دقيقة
                            </li>
                            <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300 font-black">
                                <span class="material-symbols-outlined text-primary font-bold">check_circle</span>
                                الحصول على درجة كاملة في الاختبار
                            </li>
                        </ul>
                    </div>

                    <button @click="showBadgeModal = false" 
                            class="w-full py-5 bg-primary text-white font-black text-xl rounded-2xl shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all">
                        رائع، فهمت!
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
@endsection

@push('styles')
<style>
    /* تخصيص شبكة الأوسمة لضمان تجاوب مثالي */
    .badge-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }
</style>
@endpush