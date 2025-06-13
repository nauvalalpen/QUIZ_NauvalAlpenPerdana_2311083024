<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Welcome, {{ auth()->user()->name }}!</h3>
                        <p class="text-gray-600">You are logged in as: <span
                                class="font-semibold capitalize">{{ auth()->user()->role }}</span></p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-blue-50 p-6 rounded-lg">
                            <h4 class="text-lg font-semibold text-blue-800 mb-2">Latest News</h4>
                            <p class="text-blue-600 mb-4">Stay updated with the latest news and articles.</p>
                            <a href="{{ route('news.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                View News
                            </a>
                        </div>

                        @if (auth()->user()->isAdmin())
                            <div class="bg-green-50 p-6 rounded-lg">
                                <h4 class="text-lg font-semibold text-green-800 mb-2">Manage News</h4>
                                <p class="text-green-600 mb-4">Add, edit, or delete news articles.</p>
                                <a href="{{ route('beritas.index') }}"
                                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Manage News
                                </a>
                            </div>

                            <div class="bg-purple-50 p-6 rounded-lg">
                                <h4 class="text-lg font-semibold text-purple-800 mb-2">Quick Actions</h4>
                                <p class="text-purple-600 mb-4">Create new content quickly.</p>
                                <a href="{{ route('beritas.create') }}"
                                    class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Add News
                                </a>
                            </div>
                        @endif

                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Profile Settings</h4>
                            <p class="text-gray-600 mb-4">Update your profile information and settings.</p>
                            <a href="{{ route('profile.edit') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Edit Profile
                            </a>
                        </div>
                    </div>

                    @if (auth()->user()->isAdmin())
                        <div class="mt-8">
                            <h4 class="text-lg font-semibold mb-4">Recent Statistics</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="bg-white border border-gray-200 p-4 rounded-lg">
                                    <div class="text-2xl font-bold text-blue-600">{{ \App\Models\Berita::count() }}
                                    </div>
                                    <div class="text-sm text-gray-600">Total News Articles</div>
                                </div>
                                <div class="bg-white border border-gray-200 p-4 rounded-lg">
                                    <div class="text-2xl font-bold text-green-600">
                                        {{ \App\Models\User::where('role', 'user')->count() }}</div>
                                    <div class="text-sm text-gray-600">Regular Users</div>
                                </div>
                                <div class="bg-white border border-gray-200 p-4 rounded-lg">
                                    <div class="text-2xl font-bold text-purple-600">
                                        {{ \App\Models\Berita::whereDate('created_at', today())->count() }}</div>
                                    <div class="text-sm text-gray-600">News Added Today</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
