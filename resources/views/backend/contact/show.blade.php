<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Chi tiết Contact</h2>
    <a href="{{ route('contact.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
        ← Quay lại
    </a>

    <div class="bg-white p-4 border rounded space-y-2">

        <p><b>Tên:</b> {{ $contact->name }}</p>
        <p><b>Email:</b> {{ $contact->email }}</p>
        <p><b>Phone:</b> {{ $contact->phone }}</p>
        <p><b>Tiêu đề:</b> {{ $contact->title }}</p>
        <p><b>Nội dung:</b> {{ $contact->content }}</p>

        <p>
            <b>Trạng thái:</b>
            {{ $contact->status == 1 ? 'Đã xử lý' : 'Chờ xử lý' }}
        </p>

    </div>

    <a href="{{ route('contact.index') }}" class="text-blue-500">
        ← Quay lại
    </a>

</x-layout-admin>
