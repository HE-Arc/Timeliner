<div class="card mb-3">
    <h5 class="card-header">{{ $comment->user->name }}</h5>
    <div class="card-body">
        <h5 class="card-title">{{ $comment->created_at }} (UTC)</h5>
        <p class="card-text">{{ $comment->comment }}</p>

        @auth
        @if ($comment->user_id == Auth::id())
        <button class="btn btn-primary bi bi-pencil toggle-button" data-target="editComment{{ $comment->id }}"> Edit Comment</button>
        <form id="editComment{{ $comment->id }}" class="hidden" action="{{ route('comment.update', $comment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="timeline_id" value="{{ $comment->timeline_id }}">
            <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
            <div class="form-group">
                <label for="inputComment">Modify comment</label>
                <textarea name="comment" rows="5" class="form-control" id="inputComment">{{ $comment->comment }}</textarea>
            </div>
            <button type="submit" class="btn btn-success bi bi-check2"> Confirm Edit</button>
        </form>

        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger bi bi-trash delete-button"> Delete</button>
        </form>
        @endif
        @endauth
    </div>
</div>