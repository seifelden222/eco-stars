{{-- resources/views/components/hero-slider.blade.php --}}
<div x-data="{ 
        activeSlide: 1, 
        slides: [
            { id: 1, title: 'مرحباً بك في عالم الاستكشاف!', desc: 'ابدأ رحلتك اليوم واجمع النجوم لتصبح بطل المجرة.', icon: 'rocket_launch', color: 'bg-primary' },
            { id: 2, title: 'تحديات برمجية جديدة', desc: 'تعلم لغة المستقبل من خلال ألعاب برمجية ممتعة وسهلة.', icon: 'code', color: 'bg-indigo-500' },
            { id: 3, title: 'متجر الجوائز مفتوح', desc: 'استبدل نجومك بأروع البدلات الفضائية والأفاتارز المميزة.', icon: 'shopping_basket', color: 'bg-accent-yellow' }
        ],
        next() { this.activeSlide = this.activeSlide === this.slides.length ? 1 : this.activeSlide + 1 },
        prev() { this.activeSlide = this.activeSlide === 1 ? this.slides.length : this.activeSlide - 1 }
    }"
    class="relative w-full overflow-hidden rounded-[2.5rem] shadow-2xl shadow-primary/10">

    <!-- Slides Wrapper -->
    <div class="relative h-[300px] md:h-[400px]">
        <template x-for="slide in slides" :key="slide.id">
            <div x-show="activeSlide === slide.id"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-x-full"
                x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 -translate-x-full"
                class="absolute inset-0 flex items-center p-8 md:p-16 text-white"
                :class="slide.color">

                <div class="absolute inset-0 star-pattern opacity-20"></div>

                <div class="relative z-10 flex flex-col md:flex-row items-center gap-8 w-full">
                    <div class="flex-1 text-center md:text-right">
                        <h2 class="text-3xl md:text-5xl font-black mb-4" x-text="slide.title"></h2>
                        <p class="text-lg md:text-xl text-white/90 mb-8 max-w-xl" x-text="slide.desc"></p>
                        <button class="bg-white text-slate-800 px-8 py-3 rounded-2xl font-black hover:scale-105 transition-transform flex items-center gap-2 mx-auto md:mx-0">
                            <span>استكشف الآن</span>
                            <span class="material-symbols-outlined text-primary">arrow_back</span>
                        </button>
                    </div>

                    <div class="hidden md:flex size-48 lg:size-64 items-center justify-center bg-white/10 rounded-full backdrop-blur-md border border-white/20 animate-bounce" style="animation-duration: 3s;">
                        <span class="material-symbols-outlined !text-[100px] lg:!text-[140px]" x-text="slide.icon"></span>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- Navigation Arrows -->
    <button @click="prev()" class="absolute right-4 top-1/2 -translate-y-1/2 size-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center hover:bg-white/40 transition-all text-white z-20">
        <span class="material-symbols-outlined">chevron_right</span>
    </button>
    <button @click="next()" class="absolute left-4 top-1/2 -translate-y-1/2 size-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center hover:bg-white/40 transition-all text-white z-20">
        <span class="material-symbols-outlined">chevron_left</span>
    </button>

    <!-- Indicators (Dots) -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-2 z-20">
        <template x-for="slide in slides" :key="slide.id">
            <button @click="activeSlide = slide.id"
                class="h-2 rounded-full transition-all duration-300"
                :class="activeSlide === slide.id ? 'w-8 bg-white' : 'w-2 bg-white/40'"></button>
        </template>
    </div>
</div>