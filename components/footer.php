<?php
$logo = get_field('logo_site', 'option');
?>

<footer class="g-footer">
    <img src="<?= $logo ?? imgUrl('logo-bp.svg') ?>" alt="BP">

    <div class="bottom g-container">
        <?= wp_nav_menu([
            'container' => false,
            'menu' => 'menu-pied-de-page',
            'menu_class' => 'g-footer__menu',
        ]) ?>
    </div>
</footer>