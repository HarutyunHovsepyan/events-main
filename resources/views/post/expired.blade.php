<x-app-layout>
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-4">Expired Posts</h1>
    @if ($expiredPosts->isEmpty())
        <p class="text-gray-600">No expired posts found.</p>
    @else
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($expiredPosts as $post)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $post->description }}</p>
                    <p class="text-gray-600 mb-4">Start Date: <b>{{ $post->start_date }}</b></p>
                    <p class="text-gray-600 mb-4">End Date: <b>{{ $post->end_date }}</b></p>
                    <p class="text-gray-600 mb-4">Visited persons: <b>{{ $post->visit_count}}</b></p>
                    <div class="flex justify-end">
                        <a type="button" aria-disabled="true" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-md focus:outline-none focus:shadow-outline">
                            Events is expired
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>


</x-app-layout>
