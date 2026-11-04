<?php
/**
 * Compact, native and keyboard-accessible language selector shared by both
 * header templates and the standard footer.
 *
 * Important: mrseo_url() owns route-aware locale fallbacks (Horoshop,
 * Performance Max, service websites). Reuse it rather than hardcode URLs.
 */
if (!defined('ABSPATH')) exit;

function mrseo_render_language_dropdown($slug = null, $current = null, $placement = 'header') {
    $slug = $slug === null ? mrseo_slug() : $slug;
    $current = $current === null ? mrseo_locale() : $current;

    $languages = array(
        'uk' => array('short' => 'UA', 'name' => 'Українська'),
        'ru' => array('short' => 'RU', 'name' => 'Русский'),
        'en' => array('short' => 'EN', 'name' => 'English (UK)'),
        'pl' => array('short' => 'PL', 'name' => 'Polski'),
        'de' => array('short' => 'DE', 'name' => 'Deutsch'),
        'fr' => array('short' => 'FR', 'name' => 'Français'),
        'it' => array('short' => 'IT', 'name' => 'Italiano'),
        'es' => array('short' => 'ES', 'name' => 'Español'),
        'nl' => array('short' => 'NL', 'name' => 'Nederlands'),
        'ro' => array('short' => 'RO', 'name' => 'Română'),
        'cs' => array('short' => 'CS', 'name' => 'Čeština'),
        'pt' => array('short' => 'PT', 'name' => 'Português'),
        'sv' => array('short' => 'SV', 'name' => 'Svenska'),
        'da' => array('short' => 'DA', 'name' => 'Dansk'),
        'fi' => array('short' => 'FI', 'name' => 'Suomi'),
        'hu' => array('short' => 'HU', 'name' => 'Magyar'),
        'sk' => array('short' => 'SK', 'name' => 'Slovenčina'),
        'el' => array('short' => 'EL', 'name' => 'Ελληνικά'),
        'bg' => array('short' => 'BG', 'name' => 'Български'),
        'hr' => array('short' => 'HR', 'name' => 'Hrvatski'),
    );
    if (!isset($languages[$current])) $current = 'uk';

    $switch_labels = array(
        'uk' => 'Змінити мову',
        'ru' => 'Сменить язык',
        'en' => 'Change language',
        'pl' => 'Zmień język',
        'de' => 'Sprache ändern',
        'fr' => 'Changer de langue',
        'it' => 'Cambia lingua',
        'es' => 'Cambiar idioma',
        'nl' => 'Taal wijzigen',
        'ro' => 'Schimbă limba',
        'cs' => 'Změnit jazyk',
        'pt' => 'Alterar idioma',
        'sv' => 'Byt språk',
        'da' => 'Skift sprog',
        'fi' => 'Vaihda kieli',
        'hu' => 'Nyelv váltása',
        'sk' => 'Zmeniť jazyk',
        'el' => 'Αλλαγή γλώσσας',
        'bg' => 'Смяна на езика',
        'hr' => 'Promijeni jezik',
    );
    $switch_label = $switch_labels[$current];
    $placement_class = $placement === 'footer' ? ' mrseo-language-dropdown--footer' : '';

    echo '<details class="mrseo-language-dropdown' . esc_attr($placement_class) . '">';
    echo '<summary class="mrseo-language-trigger" aria-label="' . esc_attr($switch_label . ': ' . $languages[$current]['name']) . '">';
    echo '<span class="mrseo-language-trigger-code" aria-hidden="true">' . esc_html($languages[$current]['short']) . '</span>';
    echo '<span class="mrseo-language-chevron" aria-hidden="true">⌄</span>';
    echo '</summary>';

    echo '<div class="mrseo-language-options" role="group" aria-label="' . esc_attr($switch_label) . '">';
    foreach ($languages as $lang => $label) {
        $is_current = $lang === $current;
        echo '<a href="' . esc_url(mrseo_url($slug, $lang)) . '"' . ($is_current ? ' aria-current="page"' : '') . ' lang="' . esc_attr($lang) . '">';
        echo '<span class="mrseo-language-option-code">' . esc_html($label['short']) . '</span>';
        echo '<span class="mrseo-language-option-name">' . esc_html($label['name']) . '</span>';
        if ($is_current) echo '<span class="mrseo-language-selected" aria-hidden="true">✓</span>';
        echo '</a>';
    }
    echo '</div></details>';
}
