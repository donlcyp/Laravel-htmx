<li id="post-{{ $post->id }}" class="list-group-item d-flex justify-content-between align-items-center shadow-sm p-4 mb-3 rounded-lg">
    <div class="post-item">
        <span class="badge bg-transparent text-dark mb-2 fs-6">
            {{ auth()->user() ? auth()->user()->name : 'Guest' }}
        </span>
        <p class="mb-2 font-weight-bold post-text">{{ $post->text }}</p>
        
        <!-- HTMX Delete Button -->
        <button class="btn btn-sm btn-outline-danger"
            hx-delete="{{ route('tweets.destroy', $post->id) }}"
            hx-target="#post-{{ $post->id }}"
            hx-swap="outerHTML"
            hx-confirm="Are you sure you want to delete this tweet?">
            Delete
        </button>

        <a href="{{ route('tweets.edit', $post->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
        <small class="text-muted">Posted on: {{ $post->created_at->diffForHumans() }}</small>

    </div>
</li>
