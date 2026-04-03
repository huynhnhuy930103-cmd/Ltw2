<x-layout-admin>

    <h2 class="text-2xl font-bold mb-6">Chi tiết user</h2>

    {{-- BUTTON QUAY VỀ --}}
    <div class="mb-4">
        <a href="{{ route('user.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded">
            ← Quay về
        </a>
    </div>

    <div class="bg-white p-6 rounded shadow space-y-4">

        <div>
            <img src="{{ $user->image ?? 'https://via.placeholder.com/150' }}"
                class="w-32 h-32 rounded border object-cover">
        </div>

        <div><b>ID:</b> {{ $user->id }}</div>
        <div><b>Tên:</b> {{ $user->name }}</div>
        <div><b>Email:</b> {{ $user->email }}</div>
        <div><b>SĐT:</b> {{ $user->phone ?? '---' }}</div>
        <div><b>Username:</b> {{ $user->username ?? '---' }}</div>
        <div><b>Địa chỉ:</b> {{ $user->address ?? '---' }}</div>

        <div>
            <b>Role:</b>
            <span
                class="px-2 py-1 rounded text-white
                {{ $user->roles == 'admin' ? 'bg-red-500' : 'bg-blue-500' }}">
                {{ $user->roles }}
            </span>
        </div>

        <div>
            <b>Trạng thái:</b>
            <span
                class="px-2 py-1 rounded text-white
                {{ $user->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                {{ $user->status == 1 ? 'Active' : 'Hidden' }}
            </span>
        </div>

    </div>

</x-layout-admin>
