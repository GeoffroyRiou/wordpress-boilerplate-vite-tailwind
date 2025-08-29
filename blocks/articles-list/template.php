<?php

$modeSimple = get_field('mode_simple') ?? false;
$cacherFiltres = get_field('cacher_filtres') ?? false;
$cacherPagination = get_field('cacher_pagination') ?? false;
$perPage = get_field('per_page') ?? 9;

$category = $_POST['category'] ?? $_GET['category'] ?? null;
global $actualitesWrapper;
$terms = $actualitesWrapper->getTerms();
$actualites = $actualitesWrapper->getActualitesPaginated(nbPerPage: $perPage);
?>
<section <?php echo get_block_wrapper_attributes([
                'class' => 'block-articles-list ' . ($modeSimple ? 'is-simple' : '')
            ]) ?>>
    <div class="content g-container <?= $modeSimple ? 'is-small' : '' ?>">

        <form id="list-filters" class="list-search-form <?= $cacherFiltres ? '-hidden' : '' ?>" action="<?= admin_url('admin-ajax.php'); ?>">

            <input type="hidden" name="action" value="search_actualites">
            <input type="hidden" name="per_page" value="<?= $perPage ?>">

            <div class="filters">
                <div class="list-head-filters" id="head-filters">
                    <?= svgIcon('filter') ?>
                    <span class="text">Filtrer&nbsp;:</span>
                </div>
                <div class="list-content-filters" id="content-filters">
                    <?php foreach ($terms as $term) : ?>
                        <div class="list-filter">
                            <input type="checkbox" name="category[]" value="<?= $term->term_id ?>" id="category_<?= $term->term_id ?>" class="choice" <?= !empty($category) && $category == $term->term_id ? 'checked' : '' ?> />
                            <label for="category_<?= $term->term_id ?>" class="label"><?= $term->name ?></label>
                        </div>
                    <?php endforeach ?>
                    <button type="button" id="list-filters-reset" class="reset">Réinitialiser</button>
                </div>
            </div>
        </form>

        <div class="list-form-results <?= $modeSimple ? 'is-simple' : '' ?>" id="list-form-results">
            <?= $actualites['html'] ?>
        </div>

        <button type="button" class="list-load-more <?= $cacherPagination ? '-hidden' : '' ?> <?= $actualites['max'] > 1 ? '' : '-hidden' ?> g-button is-line-dark" id="list-load-more">
            <span class="text">Charger plus</span>
        </button>
    </div>
</section>