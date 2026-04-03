<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Sửa Contact</h2>
    <a href="{{ route('contact.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
        ← Quay lại
    </a>

    <form action="{{ route('contact.update', $contact->id) }}" method="POST"
        class="bg-white p-6 border rounded space-y-4">

        @csrf
        @method('PUT')

        {{-- NAME --}}
        <div>
            <label class="block font-semibold mb-1">Họ tên</label>
            <input type="text" name="name" value="{{ $contact->name }}" class="border w-full p-2 rounded">
        </div>

        {{-- EMAIL --}}
        <div>
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" value="{{ $contact->email }}" class="border w-full p-2 rounded">
        </div>

        {{-- PHONE --}}
        <div>
            <label class="block font-semibold mb-1">Số điện thoại</label>
            <input type="text" name="phone" value="{{ $contact->phone }}" class="border w-full p-2 rounded">
        </div>

        {{-- TITLE --}}
        <div>
            <label class="block font-semibold mb-1">Tiêu đề</label>
            <input type="text" name="title" value="{{ $contact->title }}" class="border w-full p-2 rounded">
        </div>

        {{-- CONTENT --}}
        <div>
            <label class="block font-semibold mb-1">Nội dung</label>
            <textarea name="content" rows="5" class="border w-full p-2 rounded">{{ $contact->content }}</textarea>
        </div>

        {{-- STATUS --}}
        <div>
            <label class="block font-semibold mb-1">Trạng thái</label>
            <select name="status" class="border w-full p-2 rounded">
                <option value="2" {{ $contact->status == 2 ? 'selected' : '' }}>
                    Chờ xử lý
                </option>
                <option value="1" {{ $contact->status == 1 ? 'selected' : '' }}>
                    Đã xử lý
                </option>
            </select>
        </div>

        {{-- BUTTON --}}
        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Cập nhật Contact
        </button>

    </form>

</x-layout-admin>
