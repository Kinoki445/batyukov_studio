<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
$<?php echo e($post); ?>

    <form action="<?php echo e(route('post-update', $post->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div>
            <input type="hidden" name="id" value="<?php echo e($post->id); ?>">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo e($post->title); ?>" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required><?php echo e($post->content); ?></textarea>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            <?php if($post->getFirstMediaUrl('image')): ?>
                <img src="<?php echo e($post->getFirstMediaUrl('image')); ?>" alt="Current Image" width="100">
            <?php endif; ?>
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>
<?php /**PATH /home/kinoki/batyk/batyukov_studio/app/Containers/AppSection/Post/UI/WEB/Views/post-edit.blade.php ENDPATH**/ ?>