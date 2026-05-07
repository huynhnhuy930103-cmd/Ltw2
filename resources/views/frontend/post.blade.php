<x-layout-site>
    <div class="w-[90%] max-w-7xl mx-auto py-12">
        <div class="flex flex-col items-center justify-center mb-12">
            <h1 class="text-3xl md:text-4xl font-black text-gray-800 flex items-center gap-3 relative pb-3">
                <span class="text-blue-600 animate-pulse">📰</span> Bài viết mới
            </h1>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full mt-1"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border border-gray-100/80 flex flex-col overflow-hidden">

                <a href="{{ route('site.post.detail', $post->slug) }}" class="relative block overflow-hidden aspect-video">
                    <img src="{{ asset('img/' . $post->image) }}"
                         alt="{{ $post->title }}"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out"
                         onerror="this.src='https://placehold.co/600x400?text=No+Image'">
                    <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>

                <div class="p-6 flex flex-col flex-grow">
                    <h2 class="font-bold text-xl text-gray-900 line-clamp-2 mb-3 group-hover:text-blue-600 transition-colors duration-300 leading-snug">
                        <a href="{{ route('site.post.detail', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <p class="text-gray-500 text-sm mb-6 line-clamp-3 flex-grow leading-relaxed">
                        {{ $post->description }}
                    </p>

                    <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                        <a href="{{ route('site.post.detail', $post->slug) }}"
                           class="text-blue-600 font-bold text-sm inline-flex items-center gap-1 group/btn hover:text-blue-800 transition-colors">
                            Xem chi tiết
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-16 flex justify-center">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout-site>
