<x-app-layout>
    <div class="cotainer mt-6">
        <div class="row">
            <div class="col-md-12">
            <a href="{{ route('post.add-post') }}" type="button" class="btn btn-success">Add new</a>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary card-link">Card link</a>
                        <a href="#" class="btn btn-success card-link">Another link</a>
                        <a href="#" class="btn btn-success card-link">Edit</a>
                        <a href="#" class="btn btn-danger card-link">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
