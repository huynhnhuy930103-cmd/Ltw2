<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-4xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                📩 Chi tiết Contact #{{ $contact->id }}
            </h2>

            <a href="{{ route('contact.index') }}"
               class="px-4 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 transition">
                ← Quay lại
            </a>
        </div>

        <!-- CARD -->
        <div class="bg-white/80 backdrop-blur-md p-6 rounded-2xl shadow-xl border border-gray-200 space-y-4">

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <p class="text-gray-500 text-sm">Tên</p>
                    <p class="text-lg font-semibold text-gray-800">
                        {{ $contact->name }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Email</p>
                    <p class="text-lg font-semibold text-gray-800">
                        {{ $contact->email }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Số điện thoại</p>
                    <p class="text-lg font-semibold text-gray-800">
                        {{ $contact->phone }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Tiêu đề</p>
                    <p class="text-lg font-semibold text-gray-800">
                        {{ $contact->title }}
                    </p>
                </div>

            </div>

            <!-- CONTENT -->
            <div>
                <p class="text-gray-500 text-sm mb-1">Nội dung</p>
                <div class="bg-gray-50 p-4 rounded-xl border text-gray-700 leading-relaxed">
                    {{ $contact->content }}
                </div>
            </div>

            <!-- STATUS -->
            <div class="flex items-center gap-3">
                <p class="text-gray-500 text-sm">Trạng thái:</p>

                <span class="px-3 py-1 rounded-full text-white text-sm
                    {{ $contact->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                    {{ $contact->status == 1 ? '✔ Đã xử lý' : '⏳ Chờ xử lý' }}
                </span>
            </div>

        </div>

        <!-- ACTION -->
        <div class="mt-6 flex gap-3">

            <a href="{{ route('contact.edit', $contact->id) }}"
               class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                ✏ Sửa
            </a>

            <form action="{{ route('contact.destroy', $contact->id) }}"
                  method="POST"
                  onsubmit="return confirm('Xóa contact này?')">

                @csrf
                @method('DELETE')

                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    🗑 Xóa
                </button>

            </form>

        </div>

    </div>

</div>

</x-layout-admin>
