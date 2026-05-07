<x-layout-site title="Giới thiệu - Sơ lược">

    <div class="max-w-5xl mx-auto mt-10 bg-white p-10 rounded-2xl shadow">

        @if($about)

        <!-- TITLE -->
        <h1 class="text-3xl font-bold text-blue-600 mb-10 text-center">
            {{ $about->title }}
        </h1>

        <!-- CONTENT -->
        <div class="grid md:grid-cols-2 gap-10 items-center">

            <!-- IMAGE -->
            @if($about->image)
            <div class="overflow-hidden rounded-2xl">
                <img src="{{ asset('img/' . $about->image) }}"
                    class="w-full h-72 object-cover rounded-2xl shadow-md
                transform hover:scale-110 hover:brightness-110
                transition duration-500 ease-in-out cursor-pointer">
            </div>
            @endif

            <!-- TEXT + BUTTON -->
            <div class="space-y-6">

                <p class="text-gray-700 leading-7 text-justify">
                    {{ $summary }}
                </p>

                <a href="{{ route('site.about.detail') }}"
                    class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-700 transition">
                    Xem chi tiết
                </a>

            </div>

        </div>

        @else
        <p class="text-center text-gray-500">Không có dữ liệu</p>
        @endif

    </div>

</x-layout-site>
