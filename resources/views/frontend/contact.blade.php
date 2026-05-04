<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Liên hệ - NY Tech</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 text-gray-800">

    <x-layout-site title="Liên hệ">

        <div class="max-w-6xl mx-auto py-10 px-4">

            <!-- TITLE -->
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-blue-600">📞 Liên hệ với NY Tech</h1>
                <p class="text-gray-500 mt-2">Chúng tôi luôn sẵn sàng hỗ trợ bạn 24/7</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- INFO -->
                <div class="bg-white rounded-2xl shadow p-6 space-y-4">

                    <h2 class="text-xl font-semibold text-gray-700">Thông tin cửa hàng</h2>

                    <div class="space-y-3 text-gray-600">

                        <p>🏬 <b>NY Tech Shop</b></p>

                        <p>📍 44 Tăng Nhơn Phú, TP. Hồ Chí Minh</p>

                        <p>📞 0909 123 456</p>

                        <p>📧 NYtechshop@gmail.com</p>

                        <p>🕒 8:00 - 22:00 (Tất cả các ngày)</p>

                    </div>

                    <!-- SOCIAL -->
                    <div class="pt-4 border-t">
                        <p class="font-semibold mb-2">Kết nối với chúng tôi</p>

                        <div class="flex gap-4 text-2xl">

                            <!-- Facebook -->
                            <a href="https://facebook.com" target="_blank"
                                class="text-gray-600 hover:text-blue-600 transition">
                                <i class="fab fa-facebook"></i>
                            </a>

                            <!-- Zalo -->
                            <a href="https://zalo.me/0909123456" target="_blank"
                                class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-500 hover:bg-blue-600 transition">

                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Icon_of_Zalo.svg"
                                    alt="Zalo" class="w-5 h-5">
                            </a>

                            <!-- Instagram -->
                            <a href="https://instagram.com" target="_blank"
                                class="text-gray-600 hover:text-pink-500 transition">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <!-- TikTok -->
                            <a href="https://tiktok.com" target="_blank"
                                class="text-gray-600 hover:text-black transition">
                                <i class="fab fa-tiktok"></i>
                            </a>

                        </div>
                    </div>

                    <!-- GOOGLE MAP -->
                    <div class="mt-6">
                        <h2 class="text-xl font-semibold text-gray-700 mb-3">Vị trí cửa hàng</h2>

                        <div class="w-full h-64 rounded-2xl overflow-hidden shadow">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.756024644182!2d106.77301137769682!3d10.829973661789701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527023f0f718f%3A0x3dd0c816e44a76df!2zNDQgVMSDbmcgTmjGoW4gUGjDuiwgUGjGsOG7m2MgTG9uZyBCLCBQaMaw4bubYyBMb25nLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1777454773994!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>

                <!-- FORM -->

                <div class="bg-white rounded-2xl shadow p-6">

                    <h2 class="text-xl font-semibold mb-4 text-gray-700">Gửi liên hệ</h2>

                    <!-- THÔNG BÁO -->
                    @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('site.contact.store') }}" class="space-y-4">

                        @csrf

                        <input name="name" type="text"
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 outline-none"
                            placeholder="Họ và tên">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <input name="email" type="email"
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 outline-none"
                            placeholder="Email">
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <input name="phone" type="text"
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 outline-none"
                            placeholder="Số điện thoại">
                        @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <input name="title" type="text"
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 outline-none"
                            placeholder="Tiêu đề">
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <textarea name="content" rows="5"
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 outline-none"
                            placeholder="Nội dung cần hỗ trợ"></textarea>
                        @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
                            🚀 Gửi liên hệ
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </x-layout-site>

</body>

</html>
