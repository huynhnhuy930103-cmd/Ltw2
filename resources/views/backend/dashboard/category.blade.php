<x-layout-admin title="Quản lý danh mục">

    <div class="main">

        <!-- HEADER -->
        <div class="header">
            <h3>📂 Quản lý danh mục</h3>
            <div>Admin | <a href="/">Trang chủ</a></div>
        </div>

        <div class="content">

            <!-- TOP BAR -->
            <div class="top-bar">
                <form method="GET">
                    <input
                        type="text"
                        name="keyword"
                        value="{{ request('keyword') }}"
                        placeholder="🔍 Tìm danh mục...">
                </form>

                <div>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-add">
                        ➕ Thêm danh mục
                    </a>

                    <a href="#" class="btn btn-add">Thùng rác</a>
                </div>
            </div>

            <!-- TABLE -->
            <table>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Slug</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>

                @foreach($categories as $item)
                <tr>
                    <td>{{ $item->id }}</td>

                    <td>{{ $item->name }}</td>

                    <td>{{ $item->slug }}</td>

                    <td>
                        @if($item->status == 1)
                            <span class="badge active">Hiện</span>
                        @else
                            <span class="badge hide">Ẩn</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.categories.edit', $item->id) }}" class="edit">
                            Sửa
                        </a>

                        <form action="{{ route('admin.categories.destroy', $item->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button class="delete"
                                onclick="return confirm('Xóa danh mục này?')">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>

            <!-- PAGINATION -->
            <div style="margin-top: 15px;">
                {{ $categories->links() }}
            </div>

        </div>
    </div>

</x-layout-admin>
