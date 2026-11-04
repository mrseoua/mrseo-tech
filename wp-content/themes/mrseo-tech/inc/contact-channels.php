<?php
/**
 * Public MrSeo.tech business contact channels.
 * WhatsApp and Viber are linked by the provided business phone number.
 * Telegram uses the explicitly provided business handle @mrseo_ua.
 */
if (!defined('ABSPATH')) exit;

function mrseo_contact_details() {
    $digits = '380976394848';
    return array(
        'phone_display' => '+380 97 639 48 48',
        'tel' => 'tel:+' . $digits,
        'whatsapp' => 'https://wa.me/' . $digits,
        'viber' => 'viber://chat?number=%2B' . $digits,
        'telegram' => 'https://t.me/mrseo_ua',
    );
}

function mrseo_render_contact_channels($placement = 'footer') {
    $lang = mrseo_locale();
    $labels = array(
        'uk' => array('title' => 'Зателефонуйте або напишіть', 'phone' => 'Робочий телефон', 'write' => 'Написати'),
        'ru' => array('title' => 'Позвоните или напишите', 'phone' => 'Рабочий телефон', 'write' => 'Написать'),
        'en' => array('title' => 'Call or message us', 'phone' => 'Business phone', 'write' => 'Message us'),
        'pl' => array('title' => 'Zadzwoń lub napisz', 'phone' => 'Telefon kontaktowy', 'write' => 'Napisz do nas'),
        'de' => array('title' => 'Anrufen oder schreiben', 'phone' => 'Telefon', 'write' => 'Nachricht senden'),
    );
    if(function_exists('mrseo_eu_markets')&&isset(mrseo_eu_markets()[$lang])){
      $labels=array_merge($labels,array(
        'fr' => array('title' => 'Appelez-nous ou écrivez-nous', 'phone' => 'Téléphone professionnel', 'write' => 'Écrivez-nous'),
        'it' => array('title' => 'Chiamaci o scrivici', 'phone' => 'Telefono di lavoro', 'write' => 'Scrivici'),
        'es' => array('title' => 'Llámanos o escríbenos', 'phone' => 'Teléfono de contacto', 'write' => 'Escríbenos'),
        'nl' => array('title' => 'Bel of stuur een bericht', 'phone' => 'Zakelijk telefoonnummer', 'write' => 'Stuur een bericht'),
        'ro' => array('title' => 'Sunați-ne sau scrieți-ne', 'phone' => 'Telefon de contact', 'write' => 'Scrieți-ne'),
        'cs' => array('title' => 'Zavolejte nebo napište', 'phone' => 'Pracovní telefon', 'write' => 'Napište nám'),
        'pt' => array('title' => 'Ligue-nos ou escreva-nos', 'phone' => 'Telefone de contacto', 'write' => 'Envie-nos uma mensagem'),
        'sv' => array('title' => 'Ring eller skriv till oss', 'phone' => 'Företagstelefon', 'write' => 'Skriv till oss'),
        'da' => array('title' => 'Ring eller skriv til os', 'phone' => 'Telefonnummer', 'write' => 'Skriv til os'),
        'fi' => array('title' => 'Soita tai lähetä viesti', 'phone' => 'Työpuhelin', 'write' => 'Lähetä viesti'),
        'hu' => array('title' => 'Hívjon vagy írjon nekünk', 'phone' => 'Üzleti telefonszám', 'write' => 'Írjon nekünk'),
        'sk' => array('title' => 'Zavolajte alebo napíšte', 'phone' => 'Pracovný telefón', 'write' => 'Napíšte nám'),
        'el' => array('title' => 'Καλέστε ή στείλτε μήνυμα', 'phone' => 'Τηλέφωνο επικοινωνίας', 'write' => 'Στείλτε μήνυμα'),
        'bg' => array('title' => 'Обадете се или ни пишете', 'phone' => 'Телефон за връзка', 'write' => 'Пишете ни'),
        'hr' => array('title' => 'Nazovite ili pošaljite poruku', 'phone' => 'Poslovni telefon', 'write' => 'Pošaljite poruku')
      ));
    }
    $copy = $labels[$lang] ?? $labels['en'];
    $channels = mrseo_contact_details();
    $phone_display = $channels['phone_display'];
    $place = $placement === 'international' ? ' mrseo-contact-channels--international' : '';

    echo '<section class="mrseo-contact-channels' . esc_attr($place) . '" aria-label="' . esc_attr($copy['title']) . '">';
    echo '<h3 class="mrseo-contact-heading">' . esc_html($copy['title']) . '</h3>';
    echo '<span class="mrseo-contact-label">' . esc_html($copy['phone']) . '</span>';
    echo '<a class="mrseo-contact-phone" href="' . esc_url($channels['tel'], array('tel')) . '">' . esc_html($phone_display) . '</a>';
    echo '<span class="mrseo-contact-label mrseo-contact-message-label">' . esc_html($copy['write']) . '</span>';
    echo '<div class="mrseo-contact-messengers">';
    echo '<a class="mrseo-contact-messenger" href="' . esc_url($channels['whatsapp']) . '" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><span aria-hidden="true">↗</span>WhatsApp</a>';
    // Use a personal Viber chat deep link: viber.me is for Viber Business accounts.
    echo '<a class="mrseo-contact-messenger" href="' . esc_url($channels['viber'], array('viber')) . '" aria-label="Viber"><span aria-hidden="true">↗</span>Viber</a>';
    echo '<a class="mrseo-contact-messenger" href="' . esc_url($channels['telegram']) . '" target="_blank" rel="noopener noreferrer" aria-label="Telegram"><span aria-hidden="true">↗</span>Telegram</a>';
    echo '</div></section>';
}
