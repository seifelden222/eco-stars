<x-guest-layout>
    @section('title', 'إنشاء حساب بطل جديد - إيكو ستارز')

    {{-- إضافة الأنماط الخاصة بالصفحة لضمان اتساق الشكل مع صفحة الدخول --}}
    @push('styles')
    <style>
        .star-pattern {
            background-image: radial-gradient(circle at 2px 2px, #21c488 1px, transparent 0);
            background-size: 40px 40px;
            background-repeat: repeat;
            opacity: 0.08;
        }
        .floating-star {
            position: absolute;
            color: #21c488;
            opacity: 0.3;
            pointer-events: none;
        }
        .floating-rocket { 
            animation: float 4s ease-in-out infinite; 
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(-5deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        .form-input-custom {
            @apply w-full px-5 py-4 bg-slate-50/70 dark:bg-slate-800/70 border-none rounded-2xl focus:ring-2 focus:ring-primary text-lg font-medium transition-all;
        }
    </style>
    @endpush

    {{-- الخلفية والنجوم التزيينية --}}
    <div class="fixed inset-0 star-pattern pointer-events-none"></div>
    <span class="material-symbols-outlined floating-star top-[10%] left-[5%] !text-4xl">stars</span>
    <span class="material-symbols-outlined floating-star bottom-[10%] right-[5%] !text-3xl">stars</span>

    <div class="relative z-10 w-full max-w-4xl bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl rounded-[3rem] shadow-2xl border border-white dark:border-slate-800 overflow-hidden m-4">
        <div class="grid grid-cols-1 lg:grid-cols-12">
            
            <!-- القسم التعريفي الجانبي (Hero Section) -->
            <div class="lg:col-span-5 bg-primary p-8 lg:p-12 flex flex-col items-center justify-center text-white text-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 star-pattern"></div>
                <img src="{{ asset('assets/img/log.png') }}" alt="Logo" style="width: 300px;" class="mb-6 relative z-10">
                <h1 class="text-4xl font-black mb-4 relative z-10">انضم إلينا!</h1>
                <p class="text-white/90 text-lg leading-relaxed mb-8 relative z-10">ابدأ رحلتك التعليمية الممتعة واجمع النجوم في عالم إيكو ستارز</p>
                <div class="floating-rocket relative z-10">
                    <span class="material-symbols-outlined !text-8xl opacity-30">rocket_launch</span>
                </div>
            </div>

            <!-- قسم استمارة التسجيل -->
            <div class="lg:col-span-7 p-8 lg:p-12">
                <h2 class="text-2xl font-black mb-8 text-right text-slate-800 dark:text-white flex items-center justify-end gap-3">
                    تسجيل بطل جديد
                    <span class="material-symbols-outlined text-primary">person_add</span>
                </h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-5 text-right">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- اسم البطل -->
                        <div class="space-y-1">
                            <label class="block text-sm font-bold text-slate-600 dark:text-slate-400 mr-2">اسم البطل</label>
                            <input name="name" type="text" value="{{ old('name') }}" required autofocus class="form-input-custom" placeholder="مثلاً: أحمد"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-1" />
                        </div>

                        <!-- تاريخ الميلاد -->
                        <div class="space-y-1">
                            <label class="block text-sm font-bold text-slate-600 dark:text-slate-400 mr-2">تاريخ الميلاد</label>
                            <input name="birth_date" type="date" value="{{ old('birth_date') }}" class="form-input-custom"/>
                            <x-input-error :messages="$errors->get('birth_date')" class="mt-1" />
                        </div>

                        <!-- الصف الدراسي -->
                        <div class="space-y-1">
                            <label class="block text-sm font-bold text-slate-600 dark:text-slate-400 mr-2">الصف الدراسي</label>
                            <select name="grade" class="form-input-custom appearance-none">
                                <option value="">اختر الصف</option>
                                <option value="1" {{ old('grade') == '1' ? 'selected' : '' }}>التمهيدي</option>
                                <option value="2" {{ old('grade') == '2' ? 'selected' : '' }}>الصف الأول</option>
                                <option value="3" {{ old('grade') == '3' ? 'selected' : '' }}>الصف الثاني</option>
                                <option value="4" {{ old('grade') == '4' ? 'selected' : '' }}>الصف الثالث</option>
                            </select>
                            <x-input-error :messages="$errors->get('grade')" class="mt-1" />
                        </div>

                        <!-- اسم ولي الأمر -->
                        <div class="space-y-1">
                            <label class="block text-sm font-bold text-slate-600 dark:text-slate-400 mr-2">اسم ولي الأمر</label>
                            <input name="parent_name" type="text" value="{{ old('parent_name') }}" class="form-input-custom" placeholder="مثلاً: محمد"/>
                            <x-input-error :messages="$errors->get('parent_name')" class="mt-1" />
                        </div>

                        <!-- رقم جوال ولي الأمر -->
                        <div class="space-y-1">
                            <label class="block text-sm font-bold text-slate-600 dark:text-slate-400 mr-2">رقم جوال ولي الأمر</label>
                            <input name="parent_phone" type="text" value="{{ old('parent_phone') }}" class="form-input-custom" placeholder="مثلاً: 01012345678"/>
                            <x-input-error :messages="$errors->get('parent_phone')" class="mt-1" />
                        </div>

                        <!-- البريد الإلكتروني (مستخدم لتسجيل الدخول) -->
                        <div class="space-y-1">
                            <label class="block text-sm font-bold text-slate-600 dark:text-slate-400 mr-2">البريد الإلكتروني</label>
                            <input name="email" type="email" value="{{ old('email') }}" required class="form-input-custom" placeholder="example@mail.com"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <!-- كلمة المرور -->
                        <div class="space-y-1">
                            <label class="block text-sm font-bold text-slate-600 dark:text-slate-400 mr-2">كلمة المرور</label>
                            <input name="password" type="password" required autocomplete="new-password" class="form-input-custom" placeholder="••••••••"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        <!-- تأكيد كلمة المرور -->
                        <div class="space-y-1">
                            <label class="block text-sm font-bold text-slate-600 dark:text-slate-400 mr-2">تأكيد كلمة المرور</label>
                            <input name="password_confirmation" type="password" required class="form-input-custom" placeholder="••••••••"/>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>
                    </div>

                    <div class="pt-4">
                        <button class="w-full py-5 bg-primary text-white rounded-2xl text-xl font-black shadow-lg shadow-primary/30 hover:bg-primary/90 hover:scale-[1.01] active:scale-[0.99] transition-all flex items-center justify-center gap-3" type="submit">
                            <span>إنشاء الحساب</span>
                            <span class="material-symbols-outlined">rocket_launch</span>
                        </button>
                    </div>

                    <div class="text-center pt-4">
                        <p class="text-slate-500 dark:text-slate-400 font-bold">
                            لديك حساب بالفعل؟ 
                            <a href="{{ route('login') }}" class="text-primary hover:underline mr-1">سجل دخولك هنا</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>