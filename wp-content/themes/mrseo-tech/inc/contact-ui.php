<?php
if (!defined('ABSPATH')) exit;

/** Shared, translated contact UI for both header and footer variants. */
function mrseo_contact_ui_copy() {
    $data = array(
        'uk' => array('call'=>'Зателефонувати','message'=>'Написати','write'=>'Написати нам','channels'=>'Зв’язатися з нами','choice'=>'Оберіть зручний спосіб зв’язку','direct'=>'Зв’яжіться з нами напряму','instead'=>'Можна зателефонувати або написати в месенджер.'),
        'ru' => array('call'=>'Позвонить','message'=>'Написать','write'=>'Написать нам','channels'=>'Связаться с нами','choice'=>'Выберите удобный способ связи','direct'=>'Свяжитесь с нами напрямую','instead'=>'Можно позвонить или написать в мессенджер.'),
        'en' => array('call'=>'Call us','message'=>'Message','write'=>'Message us','channels'=>'Contact us','choice'=>'Choose how to get in touch','direct'=>'Contact us directly','instead'=>'Prefer a call or a quick message? Reach us here.'),
        'pl' => array('call'=>'Zadzwoń','message'=>'Napisz','write'=>'Napisz do nas','channels'=>'Kontakt z nami','choice'=>'Wybierz sposób kontaktu','direct'=>'Skontaktuj się bezpośrednio','instead'=>'Możesz zadzwonić lub napisać przez komunikator.'),
        'de' => array('call'=>'Anrufen','message'=>'Schreiben','write'=>'Nachricht senden','channels'=>'Kontakt aufnehmen','choice'=>'Kontaktweg auswählen','direct'=>'Direkt Kontakt aufnehmen','instead'=>'Rufen Sie uns an oder schreiben Sie uns.'),
    );
    return $data[mrseo_locale()] ?? $data['uk'];
}
function mrseo_contact_ui_icon($name) {
    $paths = array(
        'phone'=>'<path d="M22 16.9v3a2 2 0 0 1-2.2 2A19 19 0 0 1 2.1 4.2 2 2 0 0 1 4 2h3a2 2 0 0 1 2 1.7l.4 2.7a2 2 0 0 1-.6 1.7L7 9.9a16 16 0 0 0 7.1 7.1l1.8-1.8a2 2 0 0 1 1.7-.6l2.7.4a2 2 0 0 1 1.7 1.9z"/>',
        'message'=>'<path d="M20 11.5a8.5 8.5 0 0 1-8.5 8.5 9 9 0 0 1-4-.9L3 21l1.9-4.5a8.5 8.5 0 1 1 15.1-5z"/>'
    );
    return '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'.($paths[$name]??$paths['message']).'</svg>';
}
function mrseo_contact_ui_messengers($class = 'mrseo-contact-ui-links') {
    $channels = mrseo_contact_details();
    $items = in_array(mrseo_locale(),array('uk','ru'),true)
        ? array('telegram'=>'Telegram','viber'=>'Viber','whatsapp'=>'WhatsApp')
        : array('whatsapp'=>'WhatsApp','telegram'=>'Telegram','viber'=>'Viber');
    echo '<div class="'.esc_attr($class).'">';
    foreach($items as $key=>$title) {
        $url = $key==='viber'?esc_url($channels[$key],array('viber')):esc_url($channels[$key]);
        $external = $key==='viber'?'':' target="_blank" rel="noopener noreferrer"';
        echo '<a href="'.$url.'"'.$external.'><span>'.esc_html($title).'</span><span aria-hidden="true">↗</span></a>';
    }
    echo '</div>';
}
function mrseo_render_header_contact() {
    $copy=mrseo_contact_ui_copy();$channels=mrseo_contact_details();
    echo '<div class="mrseo-header-contact">';
    echo '<a class="mrseo-header-phone" href="'.esc_url($channels['tel'],array('tel')).'" aria-label="'.esc_attr($copy['call'].': '.$channels['phone_display']).'">';
    echo mrseo_contact_ui_icon('phone').'<span class="mrseo-header-phone-number">'.esc_html($channels['phone_display']).'</span></a>';
    echo '<details class="mrseo-contact-popover mrseo-header-message"><summary aria-label="'.esc_attr($copy['channels']).'">'.mrseo_contact_ui_icon('message').'<span class="screen-reader-text">'.esc_html($copy['write']).'</span></summary>';
    echo '<div class="mrseo-contact-ui-panel"><strong>'.esc_html($copy['choice']).'</strong>';
    mrseo_contact_ui_messengers();
    echo '</div></details></div>';
}
function mrseo_render_floating_contact() {
    $copy=mrseo_contact_ui_copy();$channels=mrseo_contact_details();
    echo '<aside class="mrseo-floating-contact" aria-label="'.esc_attr($copy['channels']).'">';
    echo '<details class="mrseo-contact-popover"><summary>'.mrseo_contact_ui_icon('message').'<span>'.esc_html($copy['write']).'</span><span class="mrseo-contact-ui-caret" aria-hidden="true">⌃</span></summary>';
    echo '<div class="mrseo-contact-ui-panel"><strong>'.esc_html($copy['choice']).'</strong>';
    mrseo_contact_ui_messengers();
    echo '</div></details></aside>';
    echo '<div class="mrseo-mobile-contact-bar" aria-label="'.esc_attr($copy['channels']).'">';
    echo '<details class="mrseo-contact-popover mrseo-mobile-write"><summary>'.mrseo_contact_ui_icon('message').'<span>'.esc_html($copy['message']).'</span></summary>';
    echo '<div class="mrseo-contact-ui-panel"><strong>'.esc_html($copy['choice']).'</strong>';
    mrseo_contact_ui_messengers();
    echo '</div></details>';
    echo '<a class="mrseo-mobile-call" href="'.esc_url($channels['tel'],array('tel')).'">'.mrseo_contact_ui_icon('phone').'<span>'.esc_html($copy['call']).'</span></a></div>';
}
function mrseo_render_contact_page_links() {
    $copy=mrseo_contact_ui_copy();$channels=mrseo_contact_details();
    echo '<aside class="mrseo-contact-page-links" aria-label="'.esc_attr($copy['channels']).'">';
    echo '<strong>'.esc_html($copy['direct']).'</strong><p>'.esc_html($copy['instead']).'</p>';
    echo '<a class="mrseo-contact-page-phone" href="'.esc_url($channels['tel'],array('tel')).'">'.mrseo_contact_ui_icon('phone').'<span>'.esc_html($channels['phone_display']).'</span></a>';
    mrseo_contact_ui_messengers();
    echo '</aside>';
}
