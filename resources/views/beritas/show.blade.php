<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $berita->title }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('beritas.edit', $berita) }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Edit
                </a>
                <form action="{{ route('beritas.destroy', $berita) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        onclick="return confirm('Are you sure you want to delete this news?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $berita->photo) }}" alt="{{ $berita->title }}"
                            class="w-full h-64 object-cover rounded-lg">
                    </div>

                    <div class="mb-4">
                        <h1 class="text-3xl font-bold mb-4">{{ $berita->title }}</h1>
                        <div class="flex justify-between items-center text-sm text-gray-500 mb-6">
                            <span>By {{ $berita->author }}</span>
                            <span>{{ $berita->created_at->format('F d, Y \a\t H:i') }}</span>
                        </div>
                    </div>

                    <div class="prose max-w-none">
                        {!! nl2br(e($berita->content)) !!}
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('beritas.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            ← Back to Manage News
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
