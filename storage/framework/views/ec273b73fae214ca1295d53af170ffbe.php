<li id="post-<?php echo e($post->id); ?>" class="list-group-item d-flex justify-content-between align-items-center shadow-sm p-4 mb-3 rounded-lg">
    <div class="post-item">
        <span class="badge bg-transparent text-dark mb-2 fs-6">
            <?php echo e(auth()->user() ? auth()->user()->name : 'Guest'); ?>

        </span>
        <p class="mb-2 font-weight-bold post-text"><?php echo e($post->text); ?></p>
        
        <!-- HTMX Delete Button -->
        <button class="btn btn-sm btn-outline-danger"
            hx-delete="<?php echo e(route('tweets.destroy', $post->id)); ?>"
            hx-target="#post-<?php echo e($post->id); ?>"
            hx-swap="outerHTML"
            hx-confirm="Are you sure you want to delete this tweet?">
            Delete
        </button>

        <a href="<?php echo e(route('tweets.edit', $post->id)); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
        <small class="text-muted">Posted on: <?php echo e($post->created_at->diffForHumans()); ?></small>

    </div>
</li>
<?php /**PATH D:\xampp\htdocs\Laravel-crud - Copy\resources\views/partials/tweet.blade.php ENDPATH**/ ?>