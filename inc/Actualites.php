<?php

class Actualites
{

    public function __construct()
    {
        add_action('wp_ajax_search_actualites', [$this, 'handleAjaxActualitesSearch']);
        add_action('wp_ajax_nopriv_search_actualites', [$this, 'handleAjaxActualitesSearch']);
    }

    /**
     * Prise en charge de la requête de recherche de actualites en ajax
     */
    public function handleAjaxActualitesSearch()
    {
        $result = $this->getActualitesPaginated($_POST['page'] ?? 1, $_POST['per_page'] ?? 9);

        wp_send_json_success($result);
        exit;
    }

    /**
     * Génère le html de la liste des actualites
     */
    public function getActualitesPaginated(int $page = 1, int $nbPerPage = 9, string $template = 'components/news-card'): array
    {
        $options = [
            'post_status' => 'publish',
            'post_type' => 'post',
            'posts_per_page' => $nbPerPage,
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $page,
        ];

        $category = $_POST['category'] ?? $_GET['category'] ?? null;

        if (!empty($category)) {
            $options['tax_query'] = [
                [
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $category,
                ]
            ];
        }

        $query = new WP_Query($options);
        $latestActualites = $query->posts;

        ob_start();
        foreach ($latestActualites as $actualite) {
            echo get_template_part($template, null, [
                'news' => $actualite,
                'class' => 'has-shadow'
            ]);
        }
        $response = ob_get_contents();
        ob_end_clean();

        return [
            'total' => $query->found_posts,
            'max' => $query->max_num_pages,
            'html' => $response,
        ];
    }

    /**
     * Récupération des catégories de actualites
     */ 
    public function getTerms(): array
    {
        return get_terms([
            'taxonomy' => 'category',
            'exclude' => [1]
        ]);
    }
}


global $actualitesWrapper;
$actualitesWrapper = new Actualites();