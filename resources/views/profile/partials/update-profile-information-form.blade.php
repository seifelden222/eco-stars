<section>
    <header class="mb-6">
        <h2 class="text-2xl font-black text-slate-800">
            {{ __('بيانات الحساب') }}
        </h2>
        <p class="mt-2 text-sm text-slate-500">
            {{ __('حدّث بياناتك الأساسية وصورتك الشخصية من هنا.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-input-label for="name" :value="__('الاسم')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('البريد الإلكتروني')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div>
                <x-input-label for="phone" :value="__('رقم الهاتف')" />
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" autocomplete="tel" />
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

            <div>
                <x-input-label for="parent_phone" :value="__('هاتف ولي الأمر')" />
                <x-text-input id="parent_phone" name="parent_phone" type="text" class="mt-1 block w-full" :value="old('parent_phone', $user->parent_phone)" />
                <x-input-error class="mt-2" :messages="$errors->get('parent_phone')" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
            <div>
                <x-input-label for="avatar" :value="__('الصورة الشخصية')" />
                <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full file:mr-4 file:rounded-xl file:border-0 file:bg-green-50 file:px-4 file:py-2 file:font-bold file:text-primary hover:file:bg-green-100" accept="image/*" />
                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
            </div>

            <div class="bg-white rounded-2xl p-4 border border-slate-100">
                <p class="text-sm font-bold text-slate-500">معلومة</p>
                <p class="mt-2 text-sm text-slate-600 leading-7">
                    يمكنك تغيير الصورة والبيانات الشخصية هنا، وأي تعديل على البريد الإلكتروني سيطلب إعادة التحقق إذا كان الحساب يدعم ذلك.
                </p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('حفظ التغييرات') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-primary font-bold"
                >{{ __('تم الحفظ.') }}</p>
            @endif
        </div>
    </form>
</section>
