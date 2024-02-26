<x-app-layout>
    <div class="container mt-6">
        <a href="{{ route('post.add-post') }}" type="button" class="btn btn-success">Add new</a>
        <div class="row">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach($posts as $post)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $post->description }}</p>
                    <p class="text-gray-600 mb-4">Start Date: <b>{{ $post->start_date }}</b></p>
                    <p class="text-gray-600 mb-4">End Date: <b>{{ $post->end_date }}</b></p>
                    <p class="text-gray-600 mb-4">Visited persons: <b>{{ $post->visit_count}}</b></p>
                    <div class="flex justify-end">
                        <form action="{{ route('post.toggleInvite', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-{{ $post->isInvited() ? 'danger' : 'success' }} card-link" name="action" value="{{ $post->isInvited() ? 'cancel' : 'invite' }}">
                                {{ $post->isInvited() ? 'Cancel Invite' : 'Invite' }}
                            </button>
                        </form>
                        <a href="{{route('post.show-post',$post->id) }}" class="btn btn-primary card-link">View More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
