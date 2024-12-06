<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __( $timeline->name ) }}
        </h2>
    </x-slot>

    @vite(['resources/js/timelinelistener.js', 'resources/css/timelinestyle.css'])

    @if (session('success'))
        <div class="alert alert-success">
                {{ session('success') }}
        </div>
    @elseif($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @auth
                    @if ($isOwner) <a href="timeline/{{ $timeline->id }}/edit" class="btn btn-primary">Edit</a> @endif
                    @endauth

                    <!-- Timeline show section -->
                    <div class="timeline w-[100%] h-[50%] overflow-x-auto border border-gray-300 rounded-lg p-2 bg-blue-100">
                        <!-- Inner content that is wider than the container -->


                            @foreach ($nodes as $node)
                                @include("timeline.partials.node", ["node"=>$node])
                            @endforeach
                    </div>


                    <!-- Comments to this timeline section -->
                    <div>
                        <h2>Comments</h2>

                        <!-- Add comment to this timeline section -->
                        <button class="btn btn-primary bi bi-plus-lg" onclick="document.getElementById('addComment').classList.toggle('hidden')"> Add comment</button>

                        <form id="addComment" class ="hidden" action="{{ route("comment.store") }}" method="POST">
                            @csrf
                            <input type="hidden" name="timeline_id" value="{{ $timeline->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <div class="form-group">
                                <label for="inputComment">New comment</label>
                                <textarea name="comment" rows="5" class="form-control" id="inputComment">{{ old('comment') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
 
                        <!-- Show comments to this timeline section -->
                        @foreach ($comments as $comment)
                            @include("timeline.partials.comment", ["comment"=>$comment])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
