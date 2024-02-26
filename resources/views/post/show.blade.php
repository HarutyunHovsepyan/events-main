<x-app-layout>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">{{ $post->title }}</h3>
    </div>
    <div class="card-body">
        <p>{{ $post->description }}</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Start Date:</strong> {{ $post->start_date }}</li>
            <li class="list-group-item"><strong>End Date:</strong> {{ $post->end_date }}</li>
            <li class="list-group-item"><strong>Visited persons:</strong> {{ $post->visit_count }}</li>
        </ul>
    </div>
    <div class="card-footer">
        <button wire:click="submitForm" class="btn btn-primary btn-block">Submit</button>
    </div>
</div>
</x-app-layout>
