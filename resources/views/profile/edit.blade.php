<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('الملف الشخصي') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-3xl p-6 sm:p-8">
                <div class="flex flex-col lg:flex-row gap-8 items-start">
                    <div class="w-full lg:w-80 shrink-0 bg-slate-50 rounded-3xl p-6 border border-slate-100">
                        <div class="flex items-center gap-4">
                            <div class="size-20 rounded-3xl overflow-hidden bg-white border border-slate-100 flex items-center justify-center shadow-sm">
                                @if ($user->avatar_path)
                                    <img src="{{ asset('storage/' . $user->avatar_path) }}" alt="Avatar" class="w-full h-full object-cover">
                                @else
                                    <span class="material-symbols-outlined text-5xl text-slate-300">face</span>
                                @endif
                            </div>
                            <div>
                                <p class="text-lg font-black text-slate-800">{{ $user->name }}</p>
                                <p class="text-sm text-slate-500">{{ $user->email }}</p>
                            </div>
                        </div>

                        <div class="mt-6 space-y-3 text-sm">
                            <div class="flex items-center justify-between">
                                <span class="text-slate-500">الهاتف</span>
                                <span class="font-bold text-slate-700">{{ $user->phone ?: 'غير مسجل' }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-500">تاريخ الميلاد</span>
                                <span class="font-bold text-slate-700">{{ $user->birth_date?->format('Y-m-d') ?: 'غير مسجل' }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-500">الصف</span>
                                <span class="font-bold text-slate-700">{{ $user->grade ?: 'غير مسجل' }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-500">ولي الأمر</span>
                                <span class="font-bold text-slate-700">{{ $user->parent_name ?: 'غير مسجل' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 w-full space-y-6">
                        <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-100">
                            @include('profile.partials.update-profile-information-form')
                        </div>

                        <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-100">
                            @include('profile.partials.update-password-form')
                        </div>

                        <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-100">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
