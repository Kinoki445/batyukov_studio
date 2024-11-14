<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('storage/style/style.css')); ?>">

    <title>Apiato</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <nav class="nav">
            <?php if(auth()->guard('web')->guest()): ?>
                <a href="<?php echo e(route('login-page')); ?>" class="top-right button">Login</a>
                <a href="<?php echo e(route('register-page')); ?>" class="top-right button">Register</a>
            <?php endif; ?>

            <?php if(auth()->guard('web')->check()): ?>
                <form id="form" action="<?php echo e(route('logout')); ?>" method="POST"><?php echo csrf_field(); ?></form>
                <a class="top-right button" href="javascript:void(0)" onclick="document.getElementById('form').submit()">Logout</a>
                <a href="<?php echo e(route('create_post')); ?>" class="top-right button">Create_post</a>
                <h1><?php echo e(auth('web')->user()->name); ?></h1>
            <?php endif; ?>
        </nav>
        
        <div class="posts">
            <h1>Posts</h1>
            <ul>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <h2><?php echo e($post->title); ?></h2>
                        <p><?php echo e($post->content); ?></p>
                        <?php if($post->getFirstMediaUrl('image')): ?>
                            <img src="<?php echo e($post->getFirstMediaUrl('image')); ?>" alt="Image for <?php echo e($post->title); ?>">
                        <?php else: ?>
                            <p>No image available</p>
                        <?php endif; ?>
                        <p>Автор: <?php echo e($post->user->name); ?></p>

                        <?php if($post->user->getFirstMediaUrl('user')): ?>
                            <img src="<?php echo e(($post->user->getFirstMediaUrl('user'))); ?>" alt="Avatar of <?php echo e($post->user->name); ?>" style="width: 50px; height: 50px;">
                        <?php endif; ?>
                        <?php if(auth('web')->id() == $post->user_id): ?>
                            <a href="<?php echo e(route('post-edit', ['id' => $post->id])); ?>" class="button">Edit</a>
                            <a href="<?php echo e(route('post-delete', ['id' => $post->id])); ?>" class="button">Delete</a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/kinoki/batyk/batyukov_studio/app/Containers/AppSection/Authentication/UI/WEB/Views//home.blade.php ENDPATH**/ ?>