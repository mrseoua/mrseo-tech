<?php
/** The contact-data notice is deliberately limited to verified form behaviour.
 * Legal identity, providers and retention policy require owner confirmation.
 * Do not claim completed GDPR compliance from this template alone.
 */
if (!defined('ABSPATH')) exit;
function mrseo_privacy_copy($locale=null) {
    static $data=null;
    if($data===null){
        $json=<<<'MRSEO_PRIVACY_TRANSLATIONS'
{
  "uk": {
    "title": "Приватність і обробка звернень",
    "desc": "Як MrSeo.tech обробляє дані, які ви добровільно надсилаєте через контактну форму.",
    "lead": "Пояснюємо, які дані отримуємо через форму та як використовуємо їх для відповіді на запит.",
    "sections": [
      [
        "Які дані надходять",
        "Ім’я, електронна пошта, адреса сайту (за бажанням) та текст повідомлення. Сервер також тимчасово використовує технічну інформацію про запит для обмеження автоматичного спаму."
      ],
      [
        "Для чого це потрібно",
        "Щоб відповісти на звернення, уточнити потреби та, за запитом, обговорити можливу співпрацю. Для переддоговірного спілкування застосовується відповідна правова підстава; інші ділові звернення опрацьовуються в межах законного інтересу відповісти на них."
      ],
      [
        "Як обробляються повідомлення",
        "Повідомлення з форми надходять на hello@mrseo.tech і пересилаються до робочої скриньки UKR.NET для відповіді. Постачальники хостингу та електронної пошти технічно обробляють дані під час надання послуг."
      ],
      [
        "Як довго зберігаються дані",
        "Листування зберігається лише стільки, скільки потрібно для розгляду звернення та пов’язаної комунікації, або відповідно до вимог законодавства, якщо вони застосовуються."
      ],
      [
        "Ваші права",
        "Залежно від застосовного законодавства ви можете звернутися щодо доступу, виправлення, видалення, обмеження обробки або заперечення. Для запиту використайте сторінку контактів."
      ],
      [
        "Як зв’язатися",
        "З питань персональних даних пишіть на hello@mrseo.tech. Дані відповідального оператора будуть опубліковані до відкритого запуску сайту."
      ]
    ],
    "cta": "Зв’язатися з нами",
    "label": "Приватність",
    "form": "Надсилаючи форму, ви передаєте контактні дані для відповіді. Деталі —"
  },
  "ru": {
    "title": "Конфиденциальность и обработка обращений",
    "desc": "Как MrSeo.tech обрабатывает сведения, добровольно отправленные через контактную форму.",
    "lead": "Объясняем, какие данные поступают через форму и как используются для ответа.",
    "sections": [
      [
        "Какие данные мы получаем",
        "Имя, адрес электронной почты, адрес сайта (необязательно) и текст сообщения. Сервер также временно использует техническую информацию о запросе для ограничения автоматического спама."
      ],
      [
        "Для чего они нужны",
        "Чтобы ответить на обращение, уточнить задачу и по запросу обсудить сотрудничество. Для переговоров перед заключением договора применяется соответствующее правовое основание; остальные деловые обращения рассматриваются на основании законного интереса ответить."
      ],
      [
        "Как обрабатываются сообщения",
        "Сообщения из формы поступают на hello@mrseo.tech и пересылаются в рабочий ящик UKR.NET для ответа. Поставщики хостинга и почтовых услуг технически обрабатывают данные при предоставлении сервиса."
      ],
      [
        "Срок хранения",
        "Переписка сохраняется, пока это необходимо для обработки запроса и связанного общения либо выполнения применимых юридических обязанностей."
      ],
      [
        "Ваши права",
        "В зависимости от действующего законодательства можно запросить доступ, исправление, удаление или ограничение обработки, а также возразить против обработки. Для этого воспользуйтесь страницей контактов."
      ],
      [
        "Как связаться",
        "По вопросам персональных данных пишите на hello@mrseo.tech. Сведения об ответственном операторе будут опубликованы до публичного запуска."
      ]
    ],
    "cta": "Связаться с нами",
    "label": "Конфиденциальность",
    "form": "Отправляя форму, вы передаёте контактные данные для ответа. Подробнее —"
  },
  "en": {
    "title": "Privacy information",
    "desc": "How MrSeo.tech handles the information you choose to send in a business enquiry.",
    "lead": "This notice explains how contact-form details are used to respond to business enquiries.",
    "sections": [
      [
        "Information submitted",
        "Your name, email address, optional website URL and message. The server also temporarily processes technical request information to help limit automated spam."
      ],
      [
        "Why we use it",
        "To reply to your enquiry, clarify the requirements and, where requested, discuss working together. Pre-contractual discussions may be processed as steps towards a contract; other business enquiries may rely on our legitimate interest in replying."
      ],
      [
        "How messages are handled",
        "Form messages are sent to hello@mrseo.tech and forwarded to a UKR.NET work mailbox for a response. Hosting and email service providers technically process data when delivering these services."
      ],
      [
        "How long information is kept",
        "Correspondence is kept while reasonably necessary to respond and handle related communications, or to meet applicable legal obligations."
      ],
      [
        "Your rights",
        "Depending on applicable law, you may request access, correction, deletion or restriction of processing, or object to processing. Use our contact page to make a request."
      ],
      [
        "Contact for privacy questions",
        "For privacy requests, email hello@mrseo.tech. The responsible operator's verified legal identity and contact details will be published before public launch."
      ]
    ],
    "cta": "Get in touch",
    "label": "Privacy information",
    "form": "We use the details you submit to reply to your enquiry. See"
  },
  "pl": {
    "title": "Informacje o prywatności",
    "desc": "Jak MrSeo.tech przetwarza dane przesyłane dobrowolnie za pośrednictwem formularza kontaktowego.",
    "lead": "Wyjaśniamy, jak korzystamy z informacji przesłanych w zapytaniu biznesowym.",
    "sections": [
      [
        "Jakie dane otrzymujemy",
        "Imię, adres e-mail, opcjonalny adres strony internetowej oraz treść wiadomości. Serwer tymczasowo przetwarza także informacje techniczne potrzebne do ograniczania automatycznego spamu."
      ],
      [
        "W jakim celu",
        "Aby odpowiedzieć na zapytanie, ustalić potrzeby i ewentualnie omówić współpracę. Kontakt przed zawarciem umowy może opierać się na działaniach przedumownych, a inne zapytania biznesowe na prawnie uzasadnionym interesie udzielenia odpowiedzi."
      ],
      [
        "Jak przetwarzamy wiadomości",
        "Wiadomości z formularza trafiają na hello@mrseo.tech i są przekazywane do służbowej skrzynki UKR.NET w celu udzielenia odpowiedzi. Dostawcy hostingu i poczty przetwarzają dane technicznie podczas świadczenia usług."
      ],
      [
        "Jak długo przechowujemy dane",
        "Korespondencję przechowujemy tak długo, jak jest to niezbędne do obsługi zapytania i powiązanej komunikacji lub wypełnienia obowiązków prawnych."
      ],
      [
        "Twoje prawa",
        "W zależności od obowiązujących przepisów możesz żądać dostępu, sprostowania, usunięcia lub ograniczenia przetwarzania oraz wnieść sprzeciw. Skorzystaj ze strony kontaktowej."
      ],
      [
        "Kontakt w sprawie danych",
        "W sprawach prywatności napisz na hello@mrseo.tech. Zweryfikowane dane podmiotu odpowiedzialnego zostaną opublikowane przed publicznym uruchomieniem witryny."
      ]
    ],
    "cta": "Skontaktuj się",
    "label": "Prywatność",
    "form": "Dane z formularza wykorzystujemy do odpowiedzi. Szczegóły:"
  },
  "de": {
    "title": "Datenschutzhinweise",
    "desc": "Wie MrSeo.tech die Angaben verarbeitet, die Sie über das Kontaktformular senden.",
    "lead": "Hier erfahren Sie, wie wir die Angaben aus geschäftlichen Anfragen zur Beantwortung verwenden.",
    "sections": [
      [
        "Welche Daten eingehen",
        "Name, E-Mail-Adresse, optionaler Website-Link und Nachricht. Zur Begrenzung automatisierter Spam-Anfragen werden technische Anfragedaten kurzzeitig verarbeitet."
      ],
      [
        "Zwecke der Verarbeitung",
        "Wir beantworten Ihre Anfrage, klären Anforderungen und besprechen auf Wunsch eine Zusammenarbeit. Für vorvertragliche Maßnahmen kann die entsprechende Rechtsgrundlage gelten; die Beantwortung sonstiger geschäftlicher Anfragen kann auf einem berechtigten Interesse beruhen."
      ],
      [
        "Verarbeitung der Nachrichten",
        "Formularnachrichten werden an hello@mrseo.tech gesendet und zur Beantwortung an ein geschäftliches UKR.NET-Postfach weitergeleitet. Hosting- und E-Mail-Dienstleister verarbeiten die Daten technisch im Rahmen ihrer Leistungen."
      ],
      [
        "Speicherdauer",
        "Die Korrespondenz wird aufbewahrt, solange dies zur Bearbeitung der Anfrage und der damit verbundenen Kommunikation oder aufgrund anwendbarer gesetzlicher Pflichten erforderlich ist."
      ],
      [
        "Ihre Rechte",
        "Nach anwendbarem Recht können Sie Auskunft, Berichtigung, Löschung oder Einschränkung der Verarbeitung verlangen oder Widerspruch einlegen. Nutzen Sie dafür unsere Kontaktseite."
      ],
      [
        "Kontakt zum Datenschutz",
        "Bei Datenschutzanfragen schreiben Sie an hello@mrseo.tech. Die geprüften Angaben des Verantwortlichen werden vor dem öffentlichen Start veröffentlicht."
      ]
    ],
    "cta": "Kontakt aufnehmen",
    "label": "Datenschutz",
    "form": "Wir verwenden Ihre Angaben zur Beantwortung Ihrer Anfrage. Details:"
  }
}
MRSEO_PRIVACY_TRANSLATIONS;
        $data=json_decode($json,true,512,JSON_THROW_ON_ERROR);
    }
    return $data[$locale??mrseo_locale()]??$data['en'];
}
function mrseo_privacy_page_route(){
    $path=trim(parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)??'/','/');
    $lang=mrseo_locale();
    return $path===($lang==='uk'?'privacy':$lang.'/privacy');
}
function mrseo_privacy_form_notice(){
    $copy=mrseo_privacy_copy();
    echo '<p class="mrseo-privacy-notice">'.esc_html($copy['form']).' ';
    echo '<a href="'.esc_url(mrseo_url('privacy')).'">'.esc_html($copy['label']).'</a>.</p>';
}
function mrseo_privacy_footer_link(){
    $copy=mrseo_privacy_copy();
    echo '<a href="'.esc_url(mrseo_url('privacy')).'">'.esc_html($copy['label']).'</a>';
}
add_action('init',function(){
    add_rewrite_rule('^privacy/?$','index.php?mrseo_service=privacy','top');
    add_rewrite_rule('^(ru|en|pl|de)/privacy/?$','index.php?mrseo_lang=$matches[1]&mrseo_service=privacy','top');
},13);
add_filter('pre_handle_404',function($pre){
    return mrseo_privacy_page_route()?true:$pre;
},94);
add_filter('redirect_canonical',function($url){
    return mrseo_privacy_page_route()?false:$url;
},94);
add_filter('template_include',function($template){
    return mrseo_privacy_page_route()?get_template_directory().'/privacy-localized.php':$template;
},125);
add_filter('pre_get_document_title',function($title){
    return mrseo_privacy_page_route()?mrseo_privacy_copy()['title'].' | MrSeo.tech':$title;
},125);
add_action('wp_head',function(){
    if(!mrseo_privacy_page_route())return;
    echo '<meta name="description" content="'.esc_attr(mrseo_privacy_copy()['desc']).'">'."\n";
},3);
add_action('init',function(){
    if(get_option('mrseo_privacy_routes_v1')!=='ready'){
        flush_rewrite_rules(false);
        update_option('mrseo_privacy_routes_v1','ready',false);
    }
},39);
