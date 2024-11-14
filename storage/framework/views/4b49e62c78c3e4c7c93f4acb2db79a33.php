<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Post</title>
</head>
<body>
    <form action="<?php echo e(route('post')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html><?php /**PATH /home/kinoki/batyk/batyukov_studio/app/Containers/AppSection/Post/UI/WEB/Views/post.blade.php ENDPATH**/ ?>