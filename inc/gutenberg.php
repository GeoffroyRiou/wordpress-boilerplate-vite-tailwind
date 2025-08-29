<?php

declare(strict_types=1);

function bp_register_acf_block_types()
{
	// List all folders in __DIR__/blocks and require it

	foreach (glob(__DIR__ . '/../blocks/*', GLOB_ONLYDIR) as $dir) {
		register_block_type($dir);
	}
}

add_action('acf/init', 'bp_register_acf_block_types');
