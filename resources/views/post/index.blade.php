<x-app-layout>
    <div class="container mt-6">
        <a href="{{ route('post.add-post') }}" type="button" class="btn btn-success">Add new</a>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
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
                        <form action="{{ route('post.toggleInvite', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-{{ $post->isInvited() ? 'danger' : 'success' }} card-link" name="action" value="{{ $post->isInvited() ? 'cancel' : 'invite' }}">
                                {{ $post->isInvited() ? 'Cancel Invite' : 'Invite' }}
                            </button>
                        </form>
                        <a href="#" class="btn btn-primary card-link">View More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</x-app-layout>
