<?php

declare(strict_types=1);

/**
 * Dump & die
 */
function dd($variable)
{
    var_dump($variable);
    die;
}

/**
 * Returns theme image url
 */
function imgUrl($imageName = "", bool $echo = false)
{
    $url = get_template_directory_uri() . '/images/' . $imageName;
    if (!$echo)
        return $url;

    echo $url;
}

/**
 * Retourne le html d'une icone svg à partir de la spritesheet SVG
 */
function svgIcon(string $name, string $cssclass = ""): string
{
    if ($name) {
        $style = $cssclass ?: "icon";
        echo "<svg class=\"$style\">
            <use xlink:href=\"#icon-$name\"></use>
        </svg>";
    }

    return '';
}