<?php
$image = get_field('image');
?>
<section <?php echo get_block_wrapper_attributes([
                'class' => 'block-full-width-image'
            ]) ?>>
    <picture>
        <source srcset="<?= wp_get_attachment_image_url($image, 'full-width-image-mobile') ?>" media="(max-width: 760px)">
        <source srcset="<?= wp_get_attachment_image_url($image, 'full-width-image') ?>" media="(min-width: 761px)">
        <img loading="lazy" src="<?= wp_get_attachment_image_url($image, 'full-width-image-mobile') ?>" alt="" class="block-full-width-image__image">
    </picture>
</section>