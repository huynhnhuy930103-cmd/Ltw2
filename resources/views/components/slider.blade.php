<div class="relative w-full max-w-7xl mx-auto overflow-hidden rounded-3xl shadow-2xl group bg-gray-100">

    <!-- SLIDER -->
    <div id="slider" class="flex transition-transform duration-700 ease-in-out">

        @for ($i = 1; $i <= 5; $i++)
            <div class="min-w-full relative aspect-[16/7] md:aspect-[16/6] lg:aspect-[16/5]">

                <img src="{{ asset('img/banner' . $i . '.jpg') }}"
                     class="w-full h-full object-cover object-center"
                     alt="Banner {{ $i }}">

                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/20 to-transparent flex items-center px-8 md:px-16">
                    <div class="max-w-xl space-y-3 md:space-y-4">

                        <span class="inline-block bg-orange-500 text-white text-[10px] md:text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-lg">
                            Hot Deals
                        </span>

                        <h2 class="text-white text-3xl md:text-5xl font-black leading-tight">
                            Siêu Sale <br>
                            <span class="text-orange-400">Cực Sốc {{ $i }}</span>
                        </h2>

                        <p class="text-gray-200 text-xs md:text-base hidden md:block">
                            Giảm giá lên đến 50% tất cả sản phẩm điện tử trong tuần này.
                        </p>

                        <a href="#"
                           class="inline-block mt-2 bg-white text-black hover:bg-orange-500 hover:text-white font-bold py-2.5 px-6 md:py-3 md:px-10 rounded-full transition">
                            MUA NGAY
                        </a>

                    </div>
                </div>
            </div>
        @endfor

    </div>

    <!-- DOTS -->
    <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2">
        @for ($i = 0; $i < 5; $i++)
            <div class="w-8 h-1 bg-white/30 rounded-full overflow-hidden">
                <div class="h-full bg-white transition-all duration-500 dot" data-index="{{ $i }}"></div>
            </div>
        @endfor
    </div>

    <!-- PREV -->
    <button onclick="prevSlide()"
        class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-black/30 hover:bg-black/50 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
        ‹
    </button>

    <!-- NEXT -->
    <button onclick="nextSlide()"
        class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-black/30 hover:bg-black/50 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
        ›
    </button>

</div>

<!-- JS -->
<script>
    let currentIndex = 0;
    const slider = document.getElementById("slider");
    const totalSlides = 5;
    const dots = document.querySelectorAll(".dot");

    function updateSlider() {
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;

        dots.forEach((dot, i) => {
            dot.style.width = (i === currentIndex) ? "100%" : "0%";
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateSlider();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateSlider();
    }

    // click dot
    dots.forEach(dot => {
        dot.addEventListener("click", () => {
            currentIndex = parseInt(dot.dataset.index);
            updateSlider();
        });
    });

    // auto slide
    setInterval(nextSlide, 4000);

    // init
    updateSlider();
</script>
