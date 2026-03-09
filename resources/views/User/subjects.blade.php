@extends('layouts.app')

@section('title', 'دوراتي - إيكو ستارز')

@push('styles')
<style type="text/tailwindcss">
    .card-glow {
        @apply hover:shadow-xl hover:-translate-y-1;
    }
    .circular-progress {
        background: conic-gradient(#22c55e var(--progress), #e2e8f0 0deg);
    }
</style>
@endpush

@section('content')
<div class="p-8 relative z-10">
    <div class="flex flex-wrap items-center gap-3 mb-10">
        <button class="px-8 py-3 bg-primary text-white rounded-2xl font-bold shadow-lg shadow-primary/20 transition-all">الكل</button>
        <button class="px-8 py-3 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 border border-slate-200 dark:border-slate-800 rounded-2xl font-bold transition-all">قيد التعلم</button>
        <button class="px-8 py-3 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 border border-slate-200 dark:border-slate-800 rounded-2xl font-bold transition-all">تم الانتهاء</button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        <div class="course-card bg-white dark:bg-slate-900 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 transition-all group">
            <div class="h-48 relative overflow-hidden">
                <img alt="Course Thumbnail" class="w-full h-full object-cover transition-transform group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUAGeF9RZAz-eLOrqKoJKcN7JCok-4LbGYIsmC6b8g7HdZgPFZKjisQO0hQXGnuNV6FlWVb8ZPfi4v-U0-aIjeWUF-sfFhOW2ImUfqmfLgSvs2OlvaSfYtGjMELgZv4-rVsr4zyaOY3p1GVj5vDOAwi_wElkM0-_aRLzUOfdbkePLBTzC5NK6Jnb8cLgGG9SVcKDkz5X37D5p9ZeXVejvdxJd_R9m_DahJZnPrIQMhlAXJtc0jxmooq8GfK0HvvL4pFe0f0HS8tYQ"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-white text-sm font-bold">١٢ درس</div>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-3 py-1 bg-blue-100 text-blue-600 text-xs font-black rounded-lg">برمجة</span>
                </div>
                <h3 class="text-xl font-black mb-4 text-slate-800 dark:text-white leading-tight">مغامرة البرمجة مع سكراتش</h3>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm font-bold text-slate-500">
                        <span>التقدم في الدورة</span>
                        <span class="text-primary">٧٥٪</span>
                    </div>
                    <div class="h-3 w-full bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full transition-all" style="width: 75%"></div>
                    </div>
                </div>
                <button class="w-full mt-6 py-4 bg-primary text-white rounded-2xl font-black shadow-lg shadow-primary/20 hover:shadow-primary/40 transition-all flex items-center justify-center gap-2">
                    <a href="{{ route('lessons') }}">متابعة التعلم</a>
                    <span class="material-symbols-outlined">play_circle</span>
                </button>
            </div>
        </div>
        <div class="course-card bg-white dark:bg-slate-900 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 transition-all group">
            <div class="h-48 relative overflow-hidden">
                <img alt="Course Thumbnail" class="w-full h-full object-cover transition-transform group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDU_OV0haTeqQBq4UGmR-BEWJYUeECKINwt4LcHxFsIfFY46CWtSLgpbOJ2u47UwR1TLtf_Oor0KQ7sM3ZQkJp_tz-rvNJsNP7wfmw0QzjMv9jPQONoActozNZcRoIHxK9tdfBeX2JT-RPX4OxRXfmMGgbqoZnBpIy3HLJaTDGpfJKhlrms876ORjGIzLRTCiVwlhphgPPm-7QtktHTUaBqTchP4paOT2-71iopWAVM4vWaCY5aGCE1qReCRtr24dnAuyS23zwb2I"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-white text-sm font-bold">٨ دروس</div>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-3 py-1 bg-purple-100 text-purple-600 text-xs font-black rounded-lg">رسم وفنون</span>
                </div>
                <h3 class="text-xl font-black mb-4 text-slate-800 dark:text-white leading-tight">أسرار الرسم الرقمي الصغير</h3>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm font-bold text-slate-500">
                        <span>التقدم في الدورة</span>
                        <span class="text-primary">٣٠٪</span>
                    </div>
                    <div class="h-3 w-full bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full transition-all" style="width: 30%"></div>
                    </div>
                </div>
                <button class="w-full mt-6 py-4 bg-primary text-white rounded-2xl font-black shadow-lg shadow-primary/20 hover:shadow-primary/40 transition-all flex items-center justify-center gap-2">
                    متابعة التعلم
                    <span class="material-symbols-outlined">play_circle</span>
                </button>
            </div>
        </div>
        <div class="course-card bg-white dark:bg-slate-900 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 transition-all group">
            <div class="h-48 relative overflow-hidden">
                <img alt="Course Thumbnail" class="w-full h-full object-cover transition-transform group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9CzvZoEU3_Ng4RphDpsKUTdTkCjTyuLqhBmhwmcwMmSFXRtOeNGI2onqvIp6BKJKBa55InBDfznkRqGoC73ZCBmsf73Kt9-juqCQqp1OBqZcfHX3LVNLAdHq_xF7V9DNl5EtSShjPRWBR6WNdW9t6uI8eLu9RbBCb1it9_7g90wmc0tJeLYdEXUC0VMfKMFkrJxpr29oDSD-MbdAKkoxQR85VgRO8psuHTStaZ1QwvnP7Bvkt9-8iD5e2qJJr8VrEjakFTYdK0sg"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-white text-sm font-bold">١٠ دروس</div>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-3 py-1 bg-yellow-100 text-yellow-600 text-xs font-black rounded-lg">علوم</span>
                </div>
                <h3 class="text-xl font-black mb-4 text-slate-800 dark:text-white leading-tight">رحلة في أعماق البحار</h3>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm font-bold text-slate-500">
                        <span>التقدم في الدورة</span>
                        <span class="text-primary">١٠٠٪</span>
                    </div>
                    <div class="h-3 w-full bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full transition-all" style="width: 100%"></div>
                    </div>
                </div>
                <button class="w-full mt-6 py-4 border-2 border-primary text-primary hover:bg-primary hover:text-white rounded-2xl font-black transition-all flex items-center justify-center gap-2">
                    مشاهدة مرة أخرى
                    <span class="material-symbols-outlined">refresh</span>
                </button>
            </div>
        </div>
        <div class="course-card bg-white dark:bg-slate-900 rounded-[2.5rem] overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 transition-all group">
            <div class="h-48 relative overflow-hidden">
                <img alt="Course Thumbnail" class="w-full h-full object-cover transition-transform group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC0l3e9b5Sxb0mqbERK9toWaBNmZirDWF8OiUeT1ihDuCTbX1s95BKiGKE2jRtEStJUASUAtOQppyjXYdbSbTi7IIuonADCzt2Uu3v_j2gGs2COdY5lZ_BqwSPemmd6f2467S-BtZSzKLkWVeLm5zPn_89P48FvQEa5NqiuD4muyPggAhimA_WyTGud575Ct6dJ5SXMVRj7qyKpk9GC93yizUystoi4hdHan5E9QQlKfIezywQFcWThyfV2hH0yPEgrtKeMU3bP8go"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                <div class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-white text-sm font-bold">١٥ درس</div>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-black rounded-lg">لغات</span>
                </div>
                <h3 class="text-xl font-black mb-4 text-slate-800 dark:text-white leading-tight">تحدث الإنجليزية بطلاقة</h3>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm font-bold text-slate-500">
                        <span>التقدم في الدورة</span>
                        <span class="text-primary">٥٪</span>
                    </div>
                    <div class="h-3 w-full bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full transition-all" style="width: 5%"></div>
                    </div>
                </div>
                <button class="w-full mt-6 py-4 bg-primary text-white rounded-2xl font-black shadow-lg shadow-primary/20 hover:shadow-primary/40 transition-all flex items-center justify-center gap-2">
                    ابدأ الآن
                    <span class="material-symbols-outlined">play_circle</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
