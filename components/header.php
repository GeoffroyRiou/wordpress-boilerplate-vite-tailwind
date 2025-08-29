<?php
$pageEspaceEntreprises = get_field('espace_entreprises', 'option');
$pageContact = get_field('contact', 'option');
$logo = get_field('logo_site', 'option');
?>
<header class="g-header" x-data="{ open: false }">
    <div class="inner g-container">
        <a href="<?= home_url() ?>" class="logo">
            <img src="<?= $logo ?? imgUrl('logo-bp.svg') ?>" alt="BP">
        </a>


        <button class="g-header__burger" aria-label="Ouvrir le menu" @click="open = !open">
            <?= svgIcon('burger') ?>
        </button>

        <nav class="g-header__nav" :class="open ? '-open' : ''">

            <div class="content">

                <?= wp_nav_menu([
                    'container' => false,
                    'menu' => 'menu-principal',
                    'menu_class' => 'g-header__menu',
                ]) ?>

                <?php if (!empty($pageEspaceEntreprises)): ?>
                    <a href="<?= $pageEspaceEntreprises['url'] ?? '' ?>" class="g-header__entreprises">
                        <?= $pageEspaceEntreprises['title'] ?? '' ?>
                    </a>
                <?php endif; ?>

                <div class="g-header__icons">
                    <?= get_template_part('components/g-button-icon', null, [
                        'url' => get_field('facebook', 'option') ?? '',
                        'icon' => 'facebook',
                        'title' => 'Facebook'
                    ]) ?>
                    <?= get_template_part('components/g-button-icon', null, [
                        'url' => get_field('instagram', 'option') ?? '',
                        'icon' => 'instagram',
                        'title' => 'Instagram'
                    ]) ?>
                    <?= get_template_part('components/g-button-icon', null, [
                        'url' => get_field('linkedin', 'option') ?? '',
                        'icon' => 'linkedin',
                        'title' => 'LinkedIn'
                    ]) ?>
                    <?= get_template_part('components/g-button-icon', null, [
                        'url' => get_field('tik_tok', 'option') ?? '',
                        'icon' => 'tiktok',
                        'title' => 'Tik Tok'
                    ]) ?>
                </div>

                <?php if (!empty($pageContact)): ?>
                    <?= get_template_part('components/g-button', null, [
                        'url' => $pageContact['url'] ?? '',
                        'title' => $pageContact['title'] ?? ''
                    ]) ?>
                <?php endif; ?>

                <div class="g-header__icons">
                    
                    <?= get_template_part('components/g-button-icon', null, [
                        'url' => 'tel:' . get_field('telephone', 'option') ?? '',
                        'icon' => 'telephone',
                        'title' => 'Téléphone'
                    ]) ?>
                </div>

            </div>
        </nav>
    </div>
</header>