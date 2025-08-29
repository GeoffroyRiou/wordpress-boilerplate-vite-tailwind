<?php

declare(strict_types=1);


/**
 * Activate SVG upload
 */
function wpc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');
