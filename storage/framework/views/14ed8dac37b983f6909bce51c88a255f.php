<img<?php echo $attributeString; ?> <?php if($loadingAttributeValue): ?> loading="<?php echo e($loadingAttributeValue); ?>"<?php endif; ?> srcset="<?php echo e($media->getSrcset($conversion)); ?>" onload="window.requestAnimationFrame(function(){if(!(size=getBoundingClientRect().width))return;onload=null;sizes=Math.ceil(size/window.innerWidth*100)+'vw';});" sizes="1px" src="<?php echo e($media->getUrl($conversion)); ?>" width="<?php echo e($width); ?>" height="<?php echo e($height); ?>">
<?php /**PATH /home/kinoki/batyk/batyukov_studio/vendor/spatie/laravel-medialibrary/resources/views/responsiveImageWithPlaceholder.blade.php ENDPATH**/ ?>