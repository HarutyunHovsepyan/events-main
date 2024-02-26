<x-app-layout>
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('post.add-post') }}" type="button" class="btn btn-success">Add new</a>

                @if ($posts->isEmpty())
                <p>You don't have any posts.</p>
                @else
                @foreach ($posts as $post)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Start Date: <b>{{ $post->start_date }}</b></h5>
                        <p class="card-text">End Date: <b>{{ $post->end_date }}</b></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Number of participants: <b>{{ $post->visit_count }}</b></h5>
                    </div>
                    <div class="card-body">
                        @if ($post->user_id === auth()->id())
                        <a href="{{ route('post.edit-post', ['id' => $post->id]) }}" class="btn btn-success card-link">Edit</a>
                        <form action="{{ route('post.delete-post', ['id' => $post->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger card-link">Delete</button>
                        </form>
                        @endif
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
