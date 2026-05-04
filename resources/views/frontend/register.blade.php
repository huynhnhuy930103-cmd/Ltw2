<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="min-h-screen flex items-center justify-center bg-[#f0f2f5] p-4">
    <div class="max-w-md w-full">

        <!-- Logo -->
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-green-600 rounded-2xl shadow-lg mb-4">
                <i class="fa-solid fa-user-plus text-white text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 uppercase tracking-wider">
                Đăng ký tài khoản
            </h2>
            <p class="text-gray-500 text-sm">
                Tạo tài khoản để mua sắm dễ dàng hơn
            </p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <div class="p-8">

                <!-- ✅ HIỂN THỊ LỖI VALIDATION (QUAN TRỌNG NHẤT) -->
                @if ($errors->any())
                <div class="mb-4 p-3 text-sm text-red-800 bg-red-50 border border-red-200 rounded-xl">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- SUCCESS -->
                @if(session('success'))
                <div class="mb-4 p-3 text-sm text-green-800 bg-green-50 border border-green-200 rounded-xl">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('site.doregister') }}" class="space-y-5">
                    @csrf

                    <!-- Username -->
                    <div>
                        <label class="text-sm text-gray-700 ml-1">Tên đăng nhập</label>
                        <div class="relative">
                            <i class="fa-solid fa-user absolute left-4 top-3.5 text-gray-400"></i>
                            <input type="text" name="username" required
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-green-500"
                                placeholder="Nhập username">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="text-sm text-gray-700 ml-1">Email</label>
                        <div class="relative">
                            <i class="fa-solid fa-envelope absolute left-4 top-3.5 text-gray-400"></i>
                            <input type="email" name="email" required
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-green-500"
                                placeholder="Nhập email">
                        </div>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="text-sm text-gray-700 ml-1">Số điện thoại</label>
                        <div class="relative">
                            <i class="fa-solid fa-phone absolute left-4 top-3.5 text-gray-400"></i>
                            <input type="text" name="phone" required
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-green-500"
                                placeholder="Nhập số điện thoại">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="text-sm text-gray-700 ml-1">Mật khẩu</label>
                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-4 top-3.5 text-gray-400"></i>
                            <input type="password" name="password" required
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-green-500"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Confirm -->
                    <div>
                        <label class="text-sm text-gray-700 ml-1">Nhập lại mật khẩu</label>
                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-4 top-3.5 text-gray-400"></i>
                            <input type="password" name="password_confirmation" required
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-green-500"
                                placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full py-3.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl shadow-lg transition active:scale-95">
                        ĐĂNG KÝ NGAY
                    </button>

                </form>
            </div>

            <!-- Footer -->
            <div class="p-6 bg-gray-50 border-t text-center">
                <span class="text-sm text-gray-600">Đã có tài khoản?</span>
                <a href="{{ route('site.login') }}"
                    class="ml-1 text-sm font-bold text-blue-600 hover:underline">
                    Đăng nhập
                </a>
            </div>
        </div>

        <!-- Home -->
        <div class="text-center mt-6">
            <a href="{{ route('site.home') }}" class="text-gray-500 text-sm hover:text-gray-800">
                <i class="fa-solid fa-house mr-1"></i> Quay về trang chủ
            </a>
        </div>

    </div>
</div>
