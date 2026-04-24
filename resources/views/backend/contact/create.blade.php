<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ➕ Thêm Contact
            </h2>

            <a href="{{ route('contact.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <!-- FORM -->
        <form action="{{ route('contact.store') }}" method="POST"
              class="grid grid-cols-2 gap-6">

            @csrf

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Họ tên</label>
                <input type="text" name="name"
                    placeholder="Nhập họ tên"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email" name="email"
                    placeholder="Nhập email"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- PHONE -->
            <div>
                <label class="text-sm text-gray-600">Số điện thoại</label>
                <input type="text" name="phone"
                    placeholder="Nhập số điện thoại"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- TITLE -->
            <div>
                <label class="text-sm text-gray-600">Tiêu đề</label>
                <input type="text" name="title"
                    placeholder="Nhập tiêu đề"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- CONTENT -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Nội dung</label>
                <textarea name="content" rows="5"
                    placeholder="Nhập nội dung"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400"></textarea>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('contact.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    Hủy
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-green-500 to-emerald-500 hover:scale-105 transition shadow-lg">
                    💾 Lưu Contact
                </button>

            </div>

        </form>

    </div>

</div>

</x-layout-admin>
