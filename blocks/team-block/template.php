<?php
$sections = get_field('sections');
$modeSimple = get_field('mode_simple') ?? false;
?>
<section <?php echo get_block_wrapper_attributes([
                'class' => 'block-team ' . ($modeSimple ? 'is-simple' : '')
            ]) ?>>
    <div class="content g-container <?= $modeSimple ? 'is-small' : '' ?>">

        <?php foreach ($sections as $section): ?>
            <?php
            $texte = $section['texte'] ?? null;
            $membres = $section['membres'] ?? [];
            ?>

            <?php if (!empty($texte)): ?>
                <div class="cms-content">
                    <?= $texte ?>
                </div>
            <?php endif; ?>

            <div class="block-team__members <?= $modeSimple ? 'is-simple' : '' ?>">
                <?php foreach ($membres as $membre): ?>
                    <?= get_template_part('components/member-card', null,  [
                        'member' => $membre
                    ]) ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

    </div>
</section>