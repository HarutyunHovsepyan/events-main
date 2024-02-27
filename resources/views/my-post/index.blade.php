<x-app-layout>
    <div class="container mt-6">
        <h2 class="mb-4 font-bold text-xl">My Events</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($posts as $post)
            <div class="border rounded-lg overflow-hidden">
                <div class="p-4">
                    <h5 class="font-bold text-lg mb-2">Title: {{ $post->title }}</h5>
                    <p class="text-gray-600"> Event Description: {{ $post->description }}</p>
                </div>
                <div class="p-4">
                    <p class="text-sm text-gray-600">Start Date: <span class="font-semibold">{{ $post->start_date }}</span></p>
                    <p class="text-sm text-gray-600">End Date: <span class="font-semibold">{{ $post->end_date }}</span></p>
                </div>
                <div class="p-4">
                    <p class="text-sm text-gray-600">Number of participants: <span class="font-semibold">{{ $post->visit_count }}</span></p>
                </div>
                <div class="p-4 border-t">
                    @if ($post->user_id === auth()->id())
                    <a href="{{ route('post.edit-post', ['id' => $post->id]) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('post.delete-post', ['id' => $post->id]) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
