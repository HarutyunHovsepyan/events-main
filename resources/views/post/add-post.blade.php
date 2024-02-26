<x-app-layout>
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl font-bold mb-5">Add Post</h2>

        <form method="POST" action="{{ route('post.store-post') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-bold mb-2">Title:</label>
                <input type="text" id="title" name="title" class="w-full border rounded py-2 px-3 focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-bold mb-2">Description:</label>
                <textarea id="description" name="description" class="w-full border rounded py-2 px-3 focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-sm font-bold mb-2">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="w-full border rounded py-2 px-3 focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-sm font-bold mb-2">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="w-full border rounded py-2 px-3 focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-bold mb-2">Image:</label>
                <input type="file" id="image" name="image" class="w-full">
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
</x-app-layout>
