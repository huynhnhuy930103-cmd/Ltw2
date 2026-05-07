<x-layout-site title="Giới thiệu">

<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow">

    <div class="text-right mb-6">
        <a href="{{ route('site.about.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">Quay lại</a>
    </div>

    @if($about)

        <!-- TITLE -->
        <h1 class="text-3xl font-bold text-blue-600 mb-6 text-center">
            {{ $about->title }}
        </h1>

        <!-- CONTENT -->
        <div class="prose max-w-none text-gray-700 leading-7">
            {!! $about->detail !!}
        </div>

        <!-- 🔥 PHẦN THÊM -->
        <div class="grid md:grid-cols-3 gap-6 text-center">

            <div class="bg-gray-100 p-5 rounded-xl">
                <div class="text-3xl mb-2">📱</div>
                <h3 class="font-semibold text-lg mb-1">Sản phẩm</h3>
                <p class="text-gray-600 text-sm">
                    Điện thoại chính hãng, đa dạng mẫu mã.
                </p>
            </div>

            <div class="bg-gray-100 p-5 rounded-xl">
                <div class="text-3xl mb-2">⚡</div>
                <h3 class="font-semibold text-lg mb-1">Dịch vụ</h3>
                <p class="text-gray-600 text-sm">
                    Tư vấn tận tâm, hỗ trợ nhanh chóng.
                </p>
            </div>

            <div class="bg-gray-100 p-5 rounded-xl">
                <div class="text-3xl mb-2">🛡️</div>
                <h3 class="font-semibold text-lg mb-1">Bảo hành</h3>
                <p class="text-gray-600 text-sm">
                    Chính hãng, minh bạch và uy tín.
                </p>
            </div>

        </div>

    @else
        <p class="text-center text-gray-500">Không có dữ liệu</p>
    @endif

</div>

</x-layout-site>
