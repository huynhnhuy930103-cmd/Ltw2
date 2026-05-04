<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="min-h-screen flex items-center justify-center bg-[#f0f2f5] p-4">
    <div class="max-w-md w-full">
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-2xl shadow-lg mb-4">
                <i class="fa-solid fa-mobile-screen-button text-white text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 uppercase tracking-wider">NY Tech</h2>
            <p class="text-gray-500 text-sm">Trải nghiệm công nghệ đỉnh cao</p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <div class="p-8">
                <form method="POST" action="{{ route('site.login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Tài khoản</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-user text-gray-400 group-focus-within:text-blue-600 transition-colors"></i>
                            </div>
                            <input type="text" name="username" required
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all"
                                placeholder="Email hoặc tên đăng nhập">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Mật khẩu</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-lock text-gray-400 group-focus-within:text-blue-600 transition-colors"></i>
                            </div>
                            <input type="password" name="password" required
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center justify-between px-1">
                        <label class="flex items-center cursor-pointer group">
                            <input type="checkbox" name="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600 group-hover:text-blue-600 transition-colors">Ghi nhớ tôi</span>
                        </label>
                        <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors">Quên mật khẩu?</a>
                    </div>

                    <button type="submit"
                        class="w-full py-3.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-200 transition-all active:scale-95 flex items-center justify-center space-x-2">
                        <span>ĐĂNG NHẬP NGAY</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>

                    @if(session('error'))
                        <div class="flex items-center p-3 text-sm text-red-800 border border-red-200 rounded-xl bg-red-50">
                            <i class="fa-solid fa-circle-info mr-2"></i>
                            <span>{{ session('error') }}</span>
                        </div>
                    @endif
                </form>
            </div>

            <div class="p-6 bg-gray-50 border-t border-gray-100 text-center">
                <span class="text-sm text-gray-600">Bạn là khách hàng mới?</span>
                <a href="#" class="ml-1 text-sm font-bold text-blue-600 hover:underline">Tạo tài khoản</a>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="/" class="text-gray-500 hover:text-gray-800 text-sm transition-colors">
                <i class="fa-solid fa-house mr-1"></i> Quay về trang chủ
            </a>
        </div>
    </div>
</div>
