<?php
/**
 * Ukrainian homepage card navigation.
 * Only actual service-detail destinations already listed in the current UA menu.
 * The category landing pages are intentionally excluded from these card links.
 */
if (!defined('ABSPATH')) exit;

function mrseo_home_subservice_groups($key) {
    if (!in_array($key, array('seo','ads','horoshop','sites','dev'), true)) return array();

    // The two regular menus are read from the same data source as the real header.
    if (in_array($key, array('ads','sites'), true)) {
        foreach (mrseo_ua_menu_groups() as $group) {
            if (($group['key'] ?? '') !== $key) continue;
            $sections = array();
            foreach (($group['sections'] ?? array()) as $section) {
                $items = array();
                foreach (($section['items'] ?? array()) as $item) {
                    $items[] = array('label'=>$item[1], 'url'=>mrseo_url($item[0], 'uk'));
                }
                if ($items) $sections[] = array('title'=>$section['title'], 'items'=>$items);
            }
            return $sections;
        }
        return array();
    }

    if ($key === 'seo') {
        // Exact five links displayed under SEO in inc/ua-header-six.php.
        $items = array(
            'local-seo'=>'Локальне SEO',
            'ecommerce-seo'=>'SEO інтернет-магазинів',
            'service-business-seo'=>'SEO сайтів послуг',
            'international-seo'=>'Міжнародне SEO',
            'seo-audit'=>'SEO-аудит',
        );
        return array(array('title'=>'SEO-послуги','items'=>array_map(
            static function($slug) use($items) { return array('label'=>$items[$slug], 'url'=>mrseo_url($slug,'uk')); },
            array_keys($items)
        )));
    }

    if ($key === 'horoshop') {
        // Same two real anchor groups as the live Horoshop header submenu.
        $groups = array(
            'SEO та просування'=>array(
                'seo'=>'SEO-просування сайтів на Хорошоп',
                'audit'=>'SEO-аудит сайтів на Хорошоп',
                'ads'=>'Google Ads для Хорошоп',
                'search-ads'=>'Пошукова реклама для Хорошоп',
            ),
            'Товари та аналітика'=>array(
                'shopping'=>'Google Shopping для Хорошоп',
                'pmax'=>'Performance Max для Хорошоп',
                'feeds'=>'Товарні фіди',
                'ga4'=>'GA4 та конверсії',
            ),
        );
        $sections = array();
        foreach($groups as $title=>$links) {
            $items = array();
            foreach($links as $anchor=>$label) $items[]=array('label'=>$label,'url'=>mrseo_hs_url($anchor));
            $sections[]=array('title'=>$title,'items'=>$items);
        }
        return $sections;
    }

    // Same existing live/live_extra destinations used in the Ukrainian dev submenu.
    $groups = array(
        'Бізнес-системи'=>array(
            'business-automation'=>'Автоматизація бізнесу',
            'crm-development'=>'CRM для бізнесу',
            'web-applications'=>'Вебзастосунки',
            'business-dashboards'=>'Дашборди та звітність',
            'client-portals'=>'Особисті кабінети клієнтів',
        ),
        'Інтеграції й функціонал'=>array(
            'api-integrations'=>'Інтеграція сервісів через API',
            'custom-functionality'=>'Індивідуальний функціонал',
            'data-parsing'=>'Парсинг і синхронізація даних',
            'payment-integration'=>'Інтеграція платіжних систем',
        ),
        'Штучний інтелект'=>array(
            'ai-agents'=>'AI-агенти для бізнесу',
            'chatbot-development'=>'Розробка чат-ботів',
        ),
        'Мобільні застосунки'=>array(
            'mobile-app-development'=>'Мобільні застосунки для iOS та Android',
            'ecommerce-mobile-apps'=>'Застосунки для інтернет-магазинів',
            'corporate-mobile-apps'=>'Корпоративні мобільні застосунки',
            'pwa-development'=>'PWA-застосунки',
        ),
    );
    $sections = array();
    foreach($groups as $title=>$links) {
        $items = array();
        foreach($links as $slug=>$label) {
            // Seven new WebDev pages are genuine virtual routes at root-level.
            $extra = in_array($slug,array(
                'client-portals','data-parsing','payment-integration',
                'mobile-app-development','ecommerce-mobile-apps','corporate-mobile-apps','pwa-development'
            ),true);
            $items[]=array('label'=>$label,'url'=>$extra?home_url('/'.$slug.'/'):mrseo_url($slug,'uk'));
        }
        $sections[]=array('title'=>$title,'items'=>$items);
    }
    return $sections;
}
