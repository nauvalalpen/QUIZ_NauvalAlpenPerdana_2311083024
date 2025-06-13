<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latest News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($beritas->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($beritas as $berita)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <img src="{{ asset('storage/' . $berita->photo) }}" alt="{{ $berita->title }}"
                                        class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold mb-2">{{ Str::limit($berita->title, 50) }}</h3>
                                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($berita->content, 100) }}
                                        </p>
                                        <div class="flex justify-between items-center text-sm text-gray-500">
                                            <span>By {{ $berita->author }}</span>
                                            <span>{{ $berita->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('news.show', $berita) }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {{ $beritas->links() }}
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500">No news available at the moment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
