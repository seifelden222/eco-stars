@extends('layouts.app')

@section('title', 'الملف الشخصي - إيكو ستارز')

@push('styles')
<style type="text/tailwindcss">
    .settings-card { @apply bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm; }
</style>
@endpush

@section('content')
<div class="p-8 relative z-10 w-full space-y-8">
    <section class="settings-card flex flex-col md:flex-row items-center gap-8">
        <div class="relative group">
            <div class="size-40 bg-slate-100 rounded-[2.5rem] flex items-center justify-center overflow-hidden border-4 border-white shadow-xl">
                @if ($user->avatar_path)
                    <img src="{{ asset('storage/' . $user->avatar_path) }}" alt="Profile" class="w-full h-full object-cover">
                @else
                    <span class="material-symbols-outlined text-8xl text-slate-400">face</span>
                @endif
            </div>
            <a href="{{ route('profile') }}" class="absolute -bottom-2 -right-2 size-12 bg-primary text-white rounded-2xl shadow-lg flex items-center justify-center hover:scale-110 transition-transform">
                <span class="material-symbols-outlined">edit</span>
            </a>
        </div>
        <div class="text-center md:text-right flex-1">
            <h3 class="text-2xl font-black mb-2">{{ $user->name }}</h3>
            <p class="text-slate-500 font-bold mb-4">{{ $user->email }}</p>
            <div class="flex flex-wrap justify-center md:justify-start gap-3">
                <span class="px-4 py-2 bg-slate-50 rounded-xl text-sm font-bold text-slate-600">الهاتف: {{ $user->phone ?: 'غير مسجل' }}</span>
                <span class="px-4 py-2 bg-slate-50 rounded-xl text-sm font-bold text-slate-600">الصف: {{ $user->grade ?: 'غير مسجل' }}</span>
            </div>
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <section class="settings-card">
            <div class="flex items-center gap-3 mb-8">
                <span class="material-symbols-outlined text-primary">person</span>
                <h3 class="text-xl font-black">المعلومات الشخصية</h3>
            </div>
            <form class="space-y-6" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="flex items-center gap-4">
                    <div class="size-20 rounded-3xl overflow-hidden bg-slate-50 border border-slate-100 flex items-center justify-center shrink-0">
                        @if ($user->avatar_path)
                            <img src="{{ asset('storage/' . $user->avatar_path) }}" alt="Avatar" class="w-full h-full object-cover">
                        @else
                            <span class="material-symbols-outlined text-5xl text-slate-300">face</span>
                        @endif
                    </div>
                    <div class="flex-1">
                        <x-input-label for="avatar" :value="__('الصورة الشخصية')" />
                        <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" accept="image/*" />
                        <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                    </div>
                </div>

                <div>
                    <x-input-label for="name" :value="__('الاسم بالكامل')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('البريد الإلكتروني')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="phone" :value="__('رقم الهاتف')" />
                        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>
                    <div>
                        <x-input-label for="birth_date" :value="__('تاريخ الميلاد')" />
                        <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block w-full" :value="old('birth_date', optional($user->birth_date)->format('Y-m-d'))" />
                        <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
                    </div>
                    <div>
                        <x-input-label for="grade" :value="__('الصف الدراسي')" />
                        <x-text-input id="grade" name="grade" type="text" class="mt-1 block w-full" :value="old('grade', $user->grade)" />
                        <x-input-error class="mt-2" :messages="$errors->get('grade')" />
                    </div>
                    <div>
                        <x-input-label for="parent_name" :value="__('اسم ولي الأمر')" />
                        <x-text-input id="parent_name" name="parent_name" type="text" class="mt-1 block w-full" :value="old('parent_name', $user->parent_name)" />
                        <x-input-error class="mt-2" :messages="$errors->get('parent_name')" />
                    </div>
                </div>

                <div>
                    <x-input-label for="parent_phone" :value="__('هاتف ولي الأمر')" />
                    <x-text-input id="parent_phone" name="parent_phone" type="text" class="mt-1 block w-full" :value="old('parent_phone', $user->parent_phone)" />
                    <x-input-error class="mt-2" :messages="$errors->get('parent_phone')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('حفظ التغييرات') }}</x-primary-button>
                    @if (session('status') === 'profile-updated')
                        <p class="text-sm text-primary font-bold">تم الحفظ.</p>
                    @endif
                </div>
            </form>
        </section>

        <section class="settings-card">
            <div class="flex items-center gap-3 mb-8">
                <span class="material-symbols-outlined text-primary">lock</span>
                <h3 class="text-xl font-black">الأمان وكلمة المرور</h3>
            </div>
            <form class="space-y-6" method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                <div>
                    <x-input-label for="update_password_current_password" :value="__('كلمة المرور الحالية')" />
                    <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="update_password_password" :value="__('كلمة المرور الجديدة')" />
                    <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="update_password_password_confirmation" :value="__('تأكيد كلمة المرور')" />
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('تحديث كلمة المرور') }}</x-primary-button>
                    @if (session('status') === 'password-updated')
                        <p class="text-sm text-primary font-bold">تم الحفظ.</p>
                    @endif
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
