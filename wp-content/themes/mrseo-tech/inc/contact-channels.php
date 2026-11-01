<?php
/**
 * Public MrSeo.tech business contact channels.
 * WhatsApp and Viber are links by the requested phone number. Account presence
 * must be checked manually by the owner; never invent a Telegram username.
 */
if (!defined('ABSPATH')) exit;

function mrseo_render_contact_channels($placement = 'footer') {
    $lang = mrseo_locale();
    $labels = array(
        'uk' => array('title' => 'Зателефонуйте або напишіть', 'phone' => 'Робочий телефон', 'write' => 'Написати'),
        'ru' => array('title' => 'Позвоните или напишите', 'phone' => 'Рабочий телефон', 'write' => 'Написать'),
        'en' => array('title' => 'Call or message us', 'phone' => 'Business phone', 'write' => 'Message us'),
        'pl' => array('title' => 'Zadzwoń lub napisz', 'phone' => 'Telefon kontaktowy', 'write' => 'Napisz do nas'),
        'de' => array('title' => 'Anrufen oder schreiben', 'phone' => 'Telefon', 'write' => 'Nachricht senden'),
    );
    $copy = $labels[$lang] ?? $labels['uk'];
    $phone_display = '+380 97 639 48 48';
    $phone_digits = '380976394848';
    $place = $placement === 'international' ? ' mrseo-contact-channels--international' : '';

    echo '<section class="mrseo-contact-channels' . esc_attr($place) . '" aria-label="' . esc_attr($copy['title']) . '">';
    echo '<h3 class="mrseo-contact-heading">' . esc_html($copy['title']) . '</h3>';
    echo '<span class="mrseo-contact-label">' . esc_html($copy['phone']) . '</span>';
    echo '<a class="mrseo-contact-phone" href="' . esc_url('tel:+' . $phone_digits, array('tel')) . '">' . esc_html($phone_display) . '</a>';
    echo '<span class="mrseo-contact-label mrseo-contact-message-label">' . esc_html($copy['write']) . '</span>';
    echo '<div class="mrseo-contact-messengers">';
    echo '<a class="mrseo-contact-messenger" href="' . esc_url('https://wa.me/' . $phone_digits) . '" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><span aria-hidden="true">↗</span>WhatsApp</a>';
    // Use a personal Viber chat deep link: viber.me is for Viber Business accounts.
    echo '<a class="mrseo-contact-messenger" href="' . esc_url('viber://chat?number=%2B' . $phone_digits, array('viber')) . '" aria-label="Viber"><span aria-hidden="true">↗</span>Viber</a>';
    echo '</div></section>';
}
