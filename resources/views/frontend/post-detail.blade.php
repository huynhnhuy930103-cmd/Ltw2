<x-layout-site>
    <div class="max-w-4xl mx-auto px-4 py-12">
        <a href="{{ route('site.post.index') }}"
           class="inline-flex items-center gap-2 text-gray-500 hover:text-blue-600 transition-colors mb-6 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="font-medium">Quay lại danh sách</span>
        </a>

        <header class="mb-8">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                {{ $post->title }}
            </h1>
            <div class="flex items-center text-gray-500 text-sm gap-4">
                <span class="flex items-center gap-1">
                    📅 {{ $post->created_at ? $post->created_at->format('d/m/Y') : 'Đang cập nhật' }}
                </span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span>Tác giả: Admin</span>
            </div>
        </header>

      <div class="relative mb-10 group overflow-hidden rounded-2xl">
    <img src="{{ asset('img/' . $post->image) }}"
         alt="{{ $post->title }}"
         class="w-full h-auto max-h-[500px] object-cover rounded-2xl shadow-2xl
         group-hover:scale-105 transition-all duration-500"
         onerror="this.src='https://placehold.co/1200x600?text=No+Image'">
</div>

        <article class="prose prose-blue lg:prose-lg max-w-none text-gray-700 leading-relaxed space-y-4">
            {!! nl2br($post->detail) !!}
        </article>

        <hr class="my-16 border-gray-100">

        <section>
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                    <span class="text-red-500">📌</span> Có thể bạn quan tâm
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($related as $r)
                <a href="{{ route('site.post.detail', $r->slug) }}"
                   class="group block bg-white rounded-xl overflow-hidden hover:-translate-y-1 transition-all duration-300">

                    <div class="aspect-[4/3] overflow-hidden rounded-lg mb-3">
                        <img src="{{ asset('img/' . $r->image) }}"
                             alt="{{ $r->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                             onerror="this.src='https://placehold.co/300x200?text=News'">
                    </div>

                    <h3 class="text-sm font-bold text-gray-800 group-hover:text-blue-600 line-clamp-2 transition-colors leading-snug">
                        {{ $r->title }}
                    </h3>
                </a>
                @endforeach
            </div>
        </section>
    </div>
</x-layout-site>
