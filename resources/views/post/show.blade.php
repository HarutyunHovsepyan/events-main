<x-app-layout>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="font-bold text-lg mb-2">Title: {{ $post->title }}</h3>
        </div>
        <div class="card-body">
            <p class="text-gray-600"> Event Description: {{ $post->description }}</p>
                <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Start Date:</strong> {{ $post->start_date }}</li>
                <li class="list-group-item"><strong>End Date:</strong> {{ $post->end_date }}</li>
                <li class="list-group-item"><strong>Visited persons:</strong> {{ $post->visit_count }}</li>
            </ul>
            <p class="m-0">Created by: {{ $post->user->name }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('post.index') }}" class="btn btn-secondary btn-block">Back to All Events</a>
        </div>
    </div>
</x-app-layout>
