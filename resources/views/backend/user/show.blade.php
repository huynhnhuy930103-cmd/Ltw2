<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-5xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                👤 Chi tiết user #{{ $user->id }}
            </h2>

            <a href="{{ route('user.index') }}"
               class="px-4 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 transition">
                ← Quay về
            </a>
        </div>

        <!-- CARD -->
        <div class="bg-white/80 backdrop-blur-md p-6 rounded-2xl shadow-xl border border-gray-200">

            <div class="grid grid-cols-3 gap-6">

                <!-- AVATAR -->
                <div class="col-span-1 flex flex-col items-center">
                    <img src="{{ $user->image ?? 'https://via.placeholder.com/150' }}"
                         class="w-40 h-40 rounded-full object-cover border shadow">

                    <div class="mt-4 text-center">
                        <p class="text-lg font-bold text-gray-800">{{ $user->name }}</p>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>

                <!-- INFO -->
                <div class="col-span-2 space-y-4">

                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <p class="text-gray-500 text-sm">Username</p>
                            <p class="font-semibold text-gray-700">
                                {{ $user->username ?? '---' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Số điện thoại</p>
                            <p class="font-semibold text-gray-700">
                                {{ $user->phone ?? '---' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Địa chỉ</p>
                            <p class="font-semibold text-gray-700">
                                {{ $user->address ?? '---' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">ID</p>
                            <p class="font-semibold text-gray-700">
                                #{{ $user->id }}
                            </p>
                        </div>

                    </div>

                    <!-- ROLE + STATUS -->
                    <div class="flex gap-3 mt-4">

                        <span class="px-3 py-1 rounded-full text-white
                            {{ $user->roles == 'admin' ? 'bg-red-500' : 'bg-blue-500' }}">
                            {{ $user->roles }}
                        </span>

                        <span class="px-3 py-1 rounded-full text-white
                            {{ $user->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                            {{ $user->status == 1 ? 'Active' : 'Hidden' }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- ACTION -->
        <div class="mt-6 flex gap-3">

            <a href="{{ route('user.edit', $user->id) }}"
               class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                ✏ Sửa
            </a>

            <form action="{{ route('user.destroy', $user->id) }}"
                  method="POST"
                  onsubmit="return confirm('Xóa user này?')">

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
