<?php

use Illuminate\Support\Str;

return [
    'baseUrl'             => 'http://localhost:3000',
    'production'          => false,
    'siteName'            => 'Full Stack Developer',
    'siteDescription'     => 'Ucha Chilachava',
    'google_analytics_id' => 'UA-59229127-1',

    // Algolia DocSearch credentials
    'docsearchApiKey'     => env('DOCSEARCH_KEY'),
    'docsearchIndexName'  => env('DOCSEARCH_INDEX'),

    // navigation menu
    'navigation'          => require_once('navigation.php'),

    // helpers
    'isActive'            => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent'      => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },

    'url' => function ($page, $path) {
        return Str::startsWith($path, 'http') ? $path : '/'.trimPath($path);
    },

    'nav' => function ($page) {
        return $page->navigation->map(function ($item, $label) use ($page) {
            return $item->map(function ($i) use ($page) {
                $b = $page->baseUrl;
                if (!empty($b)) {
                    $i = rtrim($b, '/').$i;
                }
                return $i;
            });
        });
    }


];
