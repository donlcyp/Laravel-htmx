<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center mb-4">
            <?php echo e(__('Tweet Life')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border rounded-lg p-5 bg-light">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="tweetText" class="font-weight-bold d-block text-center">What's on your mind?</label>
                            
                            <!-- HTMX Form Submission -->
                            <form 
                                hx-post="<?php echo e(route('tweets.store')); ?>" 
                                hx-target="#post-list"
                                hx-swap="beforebegin"
                                hx-on::after-request="this.reset()"
                                method="POST"
                                class="mb-4">
                                <?php echo csrf_field(); ?>
                                <textarea id="tweetText" name="text" class="form-control" rows="3" placeholder="Write something..." style="border-radius: 10px; width: 100%; height: 150px; resize: none;"></textarea>
                                <button type="submit" class="btn btn-primary btn-block mt-3 shadow">Post Tweet</button>
                            </form>
                        </div>

                        <hr class="my-4">
                        
                        <h3 class="text-center text-primary mb-3">Your Posts:</h3>
                        <ul id="post-list" class="list-group mt-4">
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('partials.tweet', ['post' => $post], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger mt-4">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

<script src="https://unpkg.com/htmx.org@1.9.6"></script>
<?php /**PATH D:\xampp\htdocs\Laravel-crud - Copy\resources\views/dashboard.blade.php ENDPATH**/ ?>