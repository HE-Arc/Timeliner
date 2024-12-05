<div class="card mb-3">
    <h5 class="card-header">{{ $comment->user->name }}</h5>
    <div class="card-body">
        <h5 class="card-title">{{ $comment->created_at }} (UTC)</h5>
        <p class="card-text">{{ $comment->comment }}</p>
    </div>
</div>