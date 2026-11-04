<?php
/** Staging-only draft of six fully separate European language sets. */
if(!defined('ABSPATH')) exit;
function mrseo_eu_markets(){return array('fr'=>'fr-FR','it'=>'it-IT','es'=>'es-ES','nl'=>'nl-NL','ro'=>'ro-RO','cs'=>'cs-CZ');}
function mrseo_eu_slugs(){return array('','seo','google-ads','web-development','contact','privacy');}
function mrseo_eu_all(){
 static $data=null;
 if($data!==null)return $data;
 $json=<<<'MRSEO_EU_JSON'
{
  "fr": {
    "code": "fr-FR",
    "name": "Français",
    "country": "France",
    "nav": [
      "Services",
      "Référencement SEO",
      "Google Ads",
      "Développement web",
      "Contact",
      "Parlons de votre projet",
      "Confidentialité"
    ],
    "ui": [
      "Un site ne suffit pas. Il faut des demandes utiles.",
      "Nous cherchons la cause avant de proposer une prestation.",
      "Ce que nous vérifions",
      "Ce que nous faisons",
      "Ce que vous obtenez",
      "Questions fréquentes",
      "Écrivez-nous",
      "Votre nom",
      "Adresse e-mail",
      "Site web (facultatif)",
      "Décrivez votre problème",
      "Envoyer la demande",
      "Message transmis pour envoi. Nous répondrons par e-mail.",
      "Vérifiez les champs requis.",
      "L’envoi a échoué. Réessayez plus tard.",
      "Ne communiquez aucun mot de passe ni accès confidentiel.",
      "Collaboration à distance depuis l’Ukraine. La langue de travail est convenue avant le démarrage."
    ],
    "pages": {
      "": {
        "title": "SEO e-commerce, Google Ads et développement web en France",
        "description": "Votre site a des visiteurs sans demandes ? Nous analysons SEO, Google Ads, suivi des conversions et développement pour résoudre le vrai blocage.",
        "eyebrow": "UN SITE. DES RÉSULTATS MESURABLES.",
        "headline": "Votre site existe. <em>Mais où sont les clients ?</em>",
        "lead": "Des clics sans contacts, un catalogue invisible ou des données contradictoires ? Nous distinguons le problème de visibilité, celui de conversion et celui de mesure avant de proposer des actions.",
        "problems": [
          [
            "Du trafic sans demandes",
            "La page ne répond pas assez clairement à l’intention de recherche.",
            "Analyser les parcours et les pages qui devraient convertir."
          ],
          [
            "Une publicité coûteuse",
            "Des conversions imprécises rendent les décisions trompeuses.",
            "Auditer les campagnes et les événements de mesure."
          ],
          [
            "Un site qui freine la croissance",
            "La structure ou les intégrations compliquent le parcours client.",
            "Définir un plan de correction et de développement."
          ]
        ],
        "outcomes": [
          "Audit ciblé des principaux freins",
          "Priorités d’implémentation compréhensibles",
          "Mesures de résultat à vérifier"
        ],
        "faq": [
          [
            "Avez-vous un bureau en France ?",
            "Non. Nous travaillons à distance et convenons des échanges et du périmètre avant de commencer."
          ]
        ],
        "offer": {
          "title": "Où chercher la cause ?",
          "intro": "Nous relions les symptômes commerciaux à une vérification précise : visibilité, mesure ou intégration.",
          "items": [
            {
              "title": "Pages et catégories",
              "detail": "Repérer les URL invisibles et les recherches commerciales auxquelles elles devraient répondre."
            },
            {
              "title": "Campagnes et ventes",
              "detail": "Comparer les achats réels, le suivi GA4 et les résultats déclarés par Google Ads."
            },
            {
              "title": "Systèmes déconnectés",
              "detail": "Rechercher les saisies manuelles entre boutique, stock et CRM."
            }
          ],
          "cta": "Décrire mon problème"
        }
      },
      "seo": {
        "title": "Audit SEO e-commerce : catégories, facettes et indexation",
        "description": "Diagnostic d’indexation, architecture, catégories et pages de service : du constat aux corrections SEO prioritaires.",
        "eyebrow": "SEO / VISIBILITÉ",
        "headline": "Vos pages importantes <em>restent invisibles ?</em>",
        "lead": "Nous examinons les problèmes d’exploration, de structure et d’intention commerciale avant d’ajouter du contenu. Le résultat : une liste priorisée de corrections, pas une promesse de classement.",
        "problems": [
          [
            "Pages absentes de Google",
            "Canonical, maillage ou restrictions d’indexation empêchent leur visibilité.",
            "Contrôler les URL, le crawl, les sitemaps et les canoniques."
          ],
          [
            "Catégories mal positionnées",
            "La structure ne correspond pas à la manière dont les clients recherchent.",
            "Revoir les catégories, les filtres et les intentions d’achat."
          ],
          [
            "Trafic sans valeur commerciale",
            "Les pages attirent des visites mais répondent mal au besoin.",
            "Distinguer les pages informatives des pages qui génèrent des demandes."
          ]
        ],
        "outcomes": [
          "Audit SEO avec exemples d’URL",
          "Plan de correction classé par impact",
          "Suivi d’indexation et de demandes"
        ],
        "faq": [
          [
            "Garantissez-vous la première position ?",
            "Non. Nous définissons les changements et les indicateurs contrôlables, sans promettre une position."
          ],
          [
            "Travaillez-vous seulement sur PrestaShop ?",
            "Non. L’audit dépend du site réel : PrestaShop, Shopify, WooCommerce ou autre système. Nous ne revendiquons pas de partenariat officiel."
          ]
        ],
        "offer": {
          "title": "Audit SEO e-commerce : ce que nous vérifions",
          "intro": "Le livrable cible les URL, catégories et facettes qui méritent réellement une correction.",
          "items": [
            {
              "title": "Exploration et facettes",
              "detail": "Examiner les catégories, les URL à facettes, la pagination et les canoniques."
            },
            {
              "title": "Intention d’achat",
              "detail": "Relier les pages prioritaires aux recherches pertinentes pour le marché français."
            },
            {
              "title": "Corrections vérifiables",
              "detail": "Documenter les URL en cause, la priorité et la méthode de validation."
            }
          ],
          "cta": "Décrire mon problème"
        }
      },
      "google-ads": {
        "title": "Audit Google Ads, Shopping et conversions e-commerce",
        "description": "Audit Google Ads, campagnes Search et Shopping, qualité du tracking et dépenses sans retour mesurable.",
        "eyebrow": "PUBLICITÉ / GOOGLE ADS",
        "headline": "Le budget part. <em>Mais qu’apporte-t-il ?</em>",
        "lead": "Nous commençons par les conversions : si elles sont mal mesurées, même une campagne bien structurée peut paraître rentable à tort. Nous vérifions ensuite le ciblage, les requêtes et les produits.",
        "problems": [
          [
            "Conversions incohérentes",
            "Les événements et les commandes ne se recoupent pas.",
            "Comparer Google Ads, GA4 et résultats commerciaux."
          ],
          [
            "Dépenses peu qualifiées",
            "Requêtes ou produits absorbent le budget sans résultat clair.",
            "Examiner les segments, exclusions et annonces."
          ],
          [
            "Shopping sous-exploité",
            "Le flux Merchant Center présente des données ou des catégories faibles.",
            "Contrôler titres, disponibilité et qualité du flux."
          ]
        ],
        "outcomes": [
          "Diagnostic de suivi et d’attribution",
          "Liste de dépenses à examiner",
          "Hypothèses de tests mesurables"
        ],
        "faq": [
          [
            "Pouvez-vous garantir un ROAS ?",
            "Non. Les performances dépendent des marges, du marché et de la qualité des données."
          ],
          [
            "La conformité aux cookies est-elle comprise ?",
            "Nous examinons les aspects techniques du suivi ; votre conseil juridique doit valider la conformité de la collecte du consentement."
          ]
        ],
        "offer": {
          "title": "Évaluer l’efficacité des campagnes",
          "intro": "Nous vérifions ce que le compte mesure avant de recommander de nouvelles dépenses.",
          "items": [
            {
              "title": "Qualité des conversions",
              "detail": "Contrôler GA4, les valeurs de commande et le déclenchement des balises selon le consentement."
            },
            {
              "title": "Shopping et Merchant Center",
              "detail": "Comparer les prix, stocks et attributs du flux aux pages produits."
            },
            {
              "title": "Budget et marges",
              "detail": "Examiner les produits et requêtes coûteux au regard des ventes réellement mesurées."
            }
          ],
          "cta": "Décrire mon problème"
        }
      },
      "web-development": {
        "title": "Développement web, CRM et intégrations API en France",
        "description": "Développement WordPress, boutiques, CRM, automatisations, API et interfaces internes adaptés aux processus réels.",
        "eyebrow": "DÉVELOPPEMENT / WEB",
        "headline": "Votre équipe contourne <em>les limites de ses outils ?</em>",
        "lead": "Nous concevons des sites utiles et des intégrations qui réduisent le travail manuel. Nous vérifions d’abord le besoin, les systèmes existants, les données et les risques de maintenance.",
        "problems": [
          [
            "Commandes recopiées à la main",
            "Le site et les outils internes ne communiquent pas.",
            "Étudier les API et une synchronisation fiable."
          ],
          [
            "Site lent ou difficile à maintenir",
            "Les composants accumulés bloquent les évolutions.",
            "Auditer l’architecture et prioriser la modernisation."
          ],
          [
            "Processus dispersé",
            "Les opérations dépendent de fichiers et de manipulations manuelles.",
            "Définir un tableau de bord ou un flux automatisé."
          ]
        ],
        "outcomes": [
          "Cadrage fonctionnel et technique",
          "Plan d’intégrations et de livraison",
          "Critères de validation et maintenance"
        ],
        "faq": [
          [
            "Créez-vous des applications SaaS ?",
            "Nous pouvons étudier la faisabilité d’un produit SaaS, CRM ou tableau de bord et définir son périmètre."
          ],
          [
            "Une intégration suffit-elle sans refaire le site ?",
            "Souvent, la question mérite d’être étudiée. Nous examinons les API et les risques avant de proposer un développement."
          ]
        ],
        "offer": {
          "title": "Développement utile, sans refonte systématique",
          "intro": "Nous cherchons la modification la plus utile sans fragiliser les systèmes existants.",
          "items": [
            {
              "title": "Processus métier",
              "detail": "Décrire comment commandes, ERP, CRM et catalogue échangent les données."
            },
            {
              "title": "Faisabilité API",
              "detail": "Vérifier l’accès technique, les contraintes de sécurité et les risques pour l’existant."
            },
            {
              "title": "Livraison par étapes",
              "detail": "Définir un premier module testable, son acceptation et sa maintenance."
            }
          ],
          "cta": "Décrire mon problème"
        }
      },
      "contact": {
        "title": "Contacter MrSeo.tech : SEO, Google Ads et développement",
        "description": "Parlez-nous de votre site et du problème à résoudre. Un premier diagnostic commence par des faits, pas un forfait.",
        "eyebrow": "CONTACT / PROJET",
        "headline": "Quel obstacle <em>ralentit votre activité ?</em>",
        "lead": "Envoyez l’adresse de votre site, le marché visé et ce qui ne fonctionne pas. Nous répondons par e-mail après avoir étudié la demande. Précisez la plateforme, les catégories concernées et le résultat souhaité. N’envoyez aucun mot de passe.",
        "problems": [],
        "outcomes": [],
        "faq": []
      },
      "privacy": {
        "title": "Confidentialité et demandes de contact",
        "description": "Comment sont utilisées les informations transmises via le formulaire MrSeo.tech.",
        "eyebrow": "Confidentialité",
        "headline": "Confidentialité et demandes de contact",
        "lead": "Comment sont utilisées les informations transmises via le formulaire MrSeo.tech.",
        "problems": [],
        "outcomes": [],
        "faq": []
      }
    },
    "privacy": [
      "Confidentialité et demandes de contact",
      "Comment sont utilisées les informations transmises via le formulaire MrSeo.tech.",
      "Données transmises",
      "Nom, e-mail, site facultatif et message. Des données techniques temporaires aident à limiter le spam.",
      "Utilisation",
      "Nous utilisons ces informations pour répondre et, si vous le souhaitez, discuter d’une collaboration.",
      "Acheminement",
      "Votre demande est envoyée à hello@mrseo.tech puis transférée à une boîte professionnelle UKR.NET. Les prestataires d’hébergement et de messagerie interviennent techniquement.",
      "Conservation",
      "La correspondance est conservée pendant la durée nécessaire au traitement de la demande et aux obligations légales éventuelles; la période précise reste à définir avant ouverture publique.",
      "Droits et contact",
      "Vous pouvez demander l’accès, la correction ou la suppression des données selon le droit applicable. Écrivez à hello@mrseo.tech. L’identité juridique du responsable sera publiée après vérification.",
      "En envoyant ce formulaire, vous transmettez des données pour recevoir une réponse. Détails :"
    ],
    "market": {
      "heading": "Un audit adapté aux boutiques françaises",
      "description": "PrestaShop, Shopify et WooCommerce demandent des vérifications propres à la structure de chaque catalogue. Nous étudions la plateforme réellement utilisée avant de proposer une intervention.",
      "cta": "Décrire mon problème",
      "brief": "Précisez la plateforme, les catégories concernées et le résultat souhaité. N’envoyez aucun mot de passe.",
      "portfolioLabel": "Voir des projets (en anglais)"
    }
  },
  "it": {
    "code": "it-IT",
    "name": "Italiano",
    "country": "Italia",
    "nav": [
      "Servizi",
      "SEO",
      "Google Ads",
      "Sviluppo web",
      "Contatti",
      "Parliamo del progetto",
      "Privacy"
    ],
    "ui": [
      "Non bastano le visite. Servono richieste concrete.",
      "Partiamo dalla causa, non da un pacchetto preconfezionato.",
      "Cosa analizziamo",
      "Come interveniamo",
      "Cosa ricevi",
      "Domande frequenti",
      "Scrivici",
      "Nome",
      "Email",
      "Sito web (facoltativo)",
      "Descrivi il problema",
      "Invia richiesta",
      "Messaggio affidato all’invio. Risponderemo via email.",
      "Controlla i campi obbligatori.",
      "Invio non riuscito. Riprova più tardi.",
      "Non inviare password o accessi riservati.",
      "Collaboriamo da remoto dall’Ucraina. Definiamo lingua e modalità di comunicazione prima di iniziare."
    ],
    "pages": {
      "": {
        "title": "Consulenza SEO, Google Ads e sviluppo web in Italia",
        "description": "MrSeo.tech aiuta ad affrontare scarsa visibilità, campagne costose, tracciamenti incoerenti e limiti tecnici del sito.",
        "eyebrow": "SITO WEB / CLIENTI / RISULTATI",
        "headline": "Il sito c’è. <em>Ma i clienti arrivano?</em>",
        "lead": "Se le visite non diventano richieste o vendite, il problema non è sempre il traffico. Analizziamo contenuti, campagne, dati e percorso di conversione prima di suggerire un investimento.",
        "problems": [
          [
            "Traffico che non converte",
            "Le pagine intercettano visite ma non risolvono il bisogno del cliente.",
            "Individuare l’attrito nel percorso e nelle pagine commerciali."
          ],
          [
            "Costi pubblicitari senza chiarezza",
            "Il tracciamento non distingue il valore delle richieste.",
            "Verificare conversioni, campagne e segmenti."
          ],
          [
            "Sistemi scollegati",
            "Catalogo, CRM e ordini richiedono attività ripetitive.",
            "Valutare integrazioni e automazioni."
          ]
        ],
        "outcomes": [
          "Diagnosi collegata al problema reale",
          "Interventi con priorità esplicite",
          "Controlli per misurare gli effetti"
        ],
        "faq": [
          [
            "Avete una sede in Italia?",
            "No. Lavoriamo a distanza, concordando tempi, lingua e obiettivi prima di avviare il progetto."
          ]
        ],
        "offer": {
          "title": "Da dove inizia il miglioramento ?",
          "intro": "Colleghiamo vendite e problemi tecnici prima di definire un servizio.",
          "items": [
            {
              "title": "Catalogo organico",
              "detail": "Individuare le categorie importanti che non intercettano domande commerciali."
            },
            {
              "title": "Acquisti misurati",
              "detail": "Confrontare ordini, valori e conversioni riportate dai sistemi pubblicitari."
            },
            {
              "title": "Lavoro ripetitivo",
              "detail": "Valutare passaggi manuali tra negozio, magazzino e amministrazione."
            }
          ],
          "cta": "Descrivi il problema"
        }
      },
      "seo": {
        "title": "Audit SEO per e-commerce: categorie, filtri e indicizzazione",
        "description": "SEO per categorie, filtri, pagine prodotto e servizi: controlli tecnici e un piano di implementazione verificabile.",
        "eyebrow": "SEO / ORGANICO",
        "headline": "Le pagine giuste <em>non compaiono su Google?</em>",
        "lead": "Un catalogo esteso può creare URL duplicati, filtri inutili e pagine senza collegamenti. Partiamo da Search Console e scansione del sito per individuare errori misurabili.",
        "problems": [
          [
            "Categorie escluse dalla ricerca",
            "Struttura, canonical o link interni impediscono una corretta scansione.",
            "Controllare URL, sitemap, paginazione e collegamenti."
          ],
          [
            "Filtri che creano duplicati",
            "Varianti e parametri competono per gli stessi intenti.",
            "Distinguere i filtri utili da quelli da escludere."
          ],
          [
            "Visite senza ordini",
            "Le pagine non rispondono alle ricerche commerciali.",
            "Rivedere struttura delle landing e intenzioni di acquisto."
          ]
        ],
        "outcomes": [
          "Audit con esempi di URL reali",
          "Backlog tecnico prioritizzato",
          "Indicatori per valutare indicizzazione e contatti"
        ],
        "faq": [
          [
            "Promettete un primo posto su Google?",
            "No: i posizionamenti non sono garantibili. Verifichiamo interventi e segnali osservabili."
          ],
          [
            "L’audit include anche le correzioni ?",
            "Il documento di audit e le attività di implementazione sono servizi distinti; ambito e costi vanno concordati prima."
          ]
        ],
        "offer": {
          "title": "Controlli SEO utili al tuo e-commerce",
          "intro": "Partiamo dai problemi reali di scansione e dalla domanda delle categorie.",
          "items": [
            {
              "title": "Struttura e URL",
              "detail": "Analizzare categorie, filtri, canonical e paginazione senza creare pagine duplicate."
            },
            {
              "title": "Domanda commerciale",
              "detail": "Dare priorità alle pagine legate alle ricerche con intenzione di acquisto."
            },
            {
              "title": "Piano operativo",
              "detail": "Fornire esempi, cause e una sequenza di correzioni verificabili."
            }
          ],
          "cta": "Descrivi il problema"
        }
      },
      "google-ads": {
        "title": "Audit Google Ads e Shopping: misurazione e feed prodotti",
        "description": "Analisi Google Ads, conversioni GA4, campagne Shopping e qualità dei dati Merchant Center.",
        "eyebrow": "GOOGLE ADS / EFFICIENZA",
        "headline": "Investi in annunci. <em>Qual è il ritorno reale?</em>",
        "lead": "Prima di aumentare il budget verifichiamo che acquisti e richieste siano misurati correttamente. Controlliamo poi campagne, query di ricerca e prodotti che assorbono spesa.",
        "problems": [
          [
            "GA4 e ordini non coincidono",
            "Eventi duplicati o valori errati falsano i segnali.",
            "Confrontare acquisti, importazioni e conversioni primarie."
          ],
          [
            "Prodotti con spesa improduttiva",
            "Shopping e PMax distribuiscono il budget in modo poco chiaro.",
            "Analizzare segmenti, categorie e margini."
          ],
          [
            "Feed Merchant Center debole",
            "Titoli o disponibilità non descrivono l’offerta.",
            "Individuare attributi da correggere."
          ]
        ],
        "outcomes": [
          "Mappa dei problemi di misurazione",
          "Priorità di ottimizzazione delle campagne",
          "Verifiche senza promesse di ROAS"
        ],
        "faq": [
          [
            "Garantite un risultato economico?",
            "Non garantiamo vendite o ROAS: dipendono anche dal sito, dai prezzi e dal mercato."
          ],
          [
            "Il budget media è incluso ?",
            "No. La spesa pubblicitaria è distinta dal costo dell’analisi o della gestione."
          ]
        ],
        "offer": {
          "title": "Il controllo della spesa parte dai dati",
          "intro": "Una conversione valida vale più di molti clic non attribuibili a un ordine.",
          "items": [
            {
              "title": "Ordini e conversioni",
              "detail": "Verificare purchase, transaction_id, GA4 e conversioni principali di Ads."
            },
            {
              "title": "Qualità del feed",
              "detail": "Controllare disponibilità, prezzo e informazioni di Merchant Center."
            },
            {
              "title": "Categorie e marginalità",
              "detail": "Distinguere prodotti con vendite misurate da quelli che assorbono budget."
            }
          ],
          "cta": "Descrivi il problema"
        }
      },
      "web-development": {
        "title": "Sviluppo web su misura, CRM e integrazioni API",
        "description": "Realizziamo siti, negozi online, dashboard, integrazioni API e strumenti operativi quando risolvono un problema concreto.",
        "eyebrow": "SVILUPPO / AUTOMAZIONE",
        "headline": "Il software dovrebbe <em>semplificare il lavoro.</em>",
        "lead": "Se ordini, fogli e CRM non comunicano, aumentano errori e costi operativi. Definiamo processi, dati e vincoli prima di scrivere codice.",
        "problems": [
          [
            "Ordini gestiti a mano",
            "Mancano collegamenti tra e-commerce e gestionale.",
            "Studiare integrazione API e sincronizzazioni controllate."
          ],
          [
            "WordPress difficile da aggiornare",
            "Plugin e personalizzazioni creano dipendenze fragili.",
            "Proporre un piano di manutenzione e modernizzazione."
          ],
          [
            "Report costruiti manualmente",
            "Dati sparsi impediscono decisioni tempestive.",
            "Progettare dashboard e automazioni mirate."
          ]
        ],
        "outcomes": [
          "Analisi dei requisiti",
          "Architettura e piano di realizzazione",
          "Test di accettazione e manutenzione"
        ],
        "faq": [
          [
            "Costruite anche prodotti SaaS?",
            "Possiamo progettare applicazioni SaaS e CRM dopo aver chiarito ambito, costi e responsabilità."
          ],
          [
            "Possiamo collegare il gestionale al negozio ?",
            "Dipende dalle API e dalla qualità dei dati. Prima esaminiamo la fattibilità tecnica."
          ]
        ],
        "offer": {
          "title": "Automazioni che riducono gli errori",
          "intro": "Ogni integrazione parte dai dati e da un criterio di verifica concreto.",
          "items": [
            {
              "title": "Analisi dei flussi",
              "detail": "Mappare ordini, CRM, magazzino e strumenti gestionali."
            },
            {
              "title": "Integrazioni esistenti",
              "detail": "Valutare API, plugin e vincoli della piattaforma in uso."
            },
            {
              "title": "Verifica delle consegne",
              "detail": "Prevedere controlli sulle sincronizzazioni e una gestione dei fallimenti."
            }
          ],
          "cta": "Descrivi il problema"
        }
      },
      "contact": {
        "title": "Contatta MrSeo.tech per SEO, Ads o sviluppo web",
        "description": "Descrivi il sito e l’ostacolo che vuoi risolvere. Rispondiamo dopo aver esaminato la richiesta.",
        "eyebrow": "CONTATTO / PROGETTO",
        "headline": "Cosa sta frenando <em>la tua attività?</em>",
        "lead": "Inserisci l’URL, il Paese di riferimento e un breve esempio di ciò che non funziona. Non inviare credenziali o dati riservati. Indica piattaforma, numero approssimativo di prodotti e difficoltà principale. Non condividere credenziali.",
        "problems": [],
        "outcomes": [],
        "faq": []
      },
      "privacy": {
        "title": "Privacy e richieste di contatto",
        "description": "Come utilizziamo i dati inviati tramite il modulo di MrSeo.tech.",
        "eyebrow": "Privacy",
        "headline": "Privacy e richieste di contatto",
        "lead": "Come utilizziamo i dati inviati tramite il modulo di MrSeo.tech.",
        "problems": [],
        "outcomes": [],
        "faq": []
      }
    },
    "privacy": [
      "Privacy e richieste di contatto",
      "Come utilizziamo i dati inviati tramite il modulo di MrSeo.tech.",
      "Dati raccolti",
      "Nome, email, sito facoltativo e messaggio. Informazioni tecniche temporanee contribuiscono a limitare lo spam.",
      "Finalità",
      "Usiamo i dati per rispondere e valutare una possibile collaborazione su richiesta.",
      "Trasmissione",
      "La richiesta arriva a hello@mrseo.tech ed è inoltrata a una casella di lavoro UKR.NET. Hosting e fornitori email gestiscono tecnicamente la consegna.",
      "Conservazione",
      "Conserviamo la corrispondenza per il tempo necessario alla richiesta e agli eventuali obblighi legali; il periodo preciso sarà definito prima del lancio pubblico.",
      "Diritti e contatto",
      "In base alla legge applicabile puoi chiedere accesso, rettifica o cancellazione scrivendo a hello@mrseo.tech. L’identità giuridica del titolare sarà pubblicata dopo la verifica.",
      "Inviando il modulo, fornisci i dati per ricevere risposta. Dettagli:"
    ],
    "market": {
      "heading": "Prima il problema del negozio, poi il servizio",
      "description": "WooCommerce, PrestaShop e Shopify possono presentare criticità diverse nei filtri, nel catalogo e nel tracciamento. Verifichiamo il sistema effettivo prima di proporre modifiche.",
      "cta": "Descrivi il problema",
      "brief": "Indica piattaforma, numero approssimativo di prodotti e difficoltà principale. Non condividere credenziali.",
      "portfolioLabel": "Guarda i progetti (in inglese)"
    }
  },
  "es": {
    "code": "es-ES",
    "name": "Español",
    "country": "España",
    "nav": [
      "Servicios",
      "SEO",
      "Google Ads",
      "Desarrollo web",
      "Contacto",
      "Hablemos de tu proyecto",
      "Privacidad"
    ],
    "ui": [
      "Más visitas no siempre significan más clientes.",
      "Analizamos la causa antes de recomendar un servicio.",
      "Qué revisamos",
      "Cómo lo solucionamos",
      "Qué recibes",
      "Preguntas frecuentes",
      "Escríbenos",
      "Nombre",
      "Correo electrónico",
      "Web (opcional)",
      "Describe el problema",
      "Enviar consulta",
      "Mensaje enviado para su entrega. Responderemos por correo.",
      "Revisa los campos obligatorios.",
      "No se pudo enviar. Inténtalo de nuevo.",
      "No envíes contraseñas ni accesos confidenciales.",
      "Trabajamos en remoto desde Ucrania. Acordamos el idioma y el alcance antes de empezar."
    ],
    "pages": {
      "": {
        "title": "SEO ecommerce, Google Ads y desarrollo web en España",
        "description": "SEO técnico, anuncios, medición y desarrollo para resolver obstáculos reales de captación de clientes.",
        "eyebrow": "SEO / ADS / TECNOLOGÍA",
        "headline": "Tienes web. <em>¿Pero llegan clientes?</em>",
        "lead": "No proponemos campañas o rediseños sin entender el problema. Detectamos si el bloqueo está en la visibilidad, las conversiones, los datos o las herramientas del negocio.",
        "problems": [
          [
            "Hay visitas, pero pocas solicitudes",
            "El mensaje y la página no conectan con la búsqueda del cliente.",
            "Revisar intención, contenido y proceso de contacto."
          ],
          [
            "Publicidad con resultados confusos",
            "Las conversiones no reflejan ventas o leads válidos.",
            "Auditar GA4, Google Ads y atribución."
          ],
          [
            "La web limita las operaciones",
            "Los datos se duplican entre sistemas y tareas manuales.",
            "Plantear integraciones y prioridades de desarrollo."
          ]
        ],
        "outcomes": [
          "Diagnóstico de causas verificables",
          "Plan de tareas ordenado por impacto",
          "Criterios claros para comprobar mejoras"
        ],
        "faq": [
          [
            "¿Tenéis oficina en España?",
            "No. Prestamos servicios a distancia y acordamos la comunicación antes del proyecto."
          ]
        ],
        "offer": {
          "title": "Detectamos dónde se pierde la oportunidad",
          "intro": "Un buen diagnóstico separa los problemas de tráfico, conversión y operación.",
          "items": [
            {
              "title": "Categorías sin búsquedas",
              "detail": "Comprobar páginas que deberían responder a una intención de compra."
            },
            {
              "title": "Presupuesto mal medido",
              "detail": "Contrastar los datos de GA4 y Ads con pedidos y solicitudes reales."
            },
            {
              "title": "Procesos desconectados",
              "detail": "Localizar tareas manuales entre tienda, inventario y CRM."
            }
          ],
          "cta": "Contar qué falla en mi tienda"
        }
      },
      "seo": {
        "title": "Auditoría SEO ecommerce: categorías, filtros e indexación",
        "description": "Auditoría SEO de indexación, categorías, arquitectura, contenidos y enlaces internos orientados a búsquedas comerciales.",
        "eyebrow": "SEO / BÚSQUEDAS",
        "headline": "¿Google ignora <em>tus páginas importantes?</em>",
        "lead": "Analizamos rastreo, indexación y arquitectura para saber por qué las páginas que deberían captar demanda no aparecen. Priorizamos soluciones implementables.",
        "problems": [
          [
            "Páginas que no se indexan",
            "Los enlaces, las etiquetas canónicas o el rastreo presentan barreras.",
            "Revisar Search Console, sitemap y estructura de URL."
          ],
          [
            "Categorías sin visibilidad",
            "La arquitectura no coincide con búsquedas relevantes.",
            "Reorganizar páginas, filtros y enlaces internos."
          ],
          [
            "Tráfico que no convierte",
            "Las landing pages no responden a intención comercial.",
            "Evaluar contenido, propuesta y llamadas a la acción."
          ]
        ],
        "outcomes": [
          "Informe técnico con ejemplos reales",
          "Cambios SEO priorizados",
          "Seguimiento de cobertura y solicitudes"
        ],
        "faq": [
          [
            "¿Garantizáis aparecer primero?",
            "No. Podemos definir y verificar mejoras, pero las posiciones dependen de los buscadores."
          ],
          [
            "¿Trabajáis con tiendas PrestaShop y WooCommerce?",
            "Se pueden evaluar sus problemas de indexación y estructura. Antes de intervenir revisamos la configuración real."
          ]
        ],
        "offer": {
          "title": "Qué se revisa en una auditoría ecommerce",
          "intro": "No hace falta crear más contenido si Google no rastrea bien las categorías clave.",
          "items": [
            {
              "title": "Rastreo",
              "detail": "Evaluar URL, paginación, canonical, filtros y enlaces internos."
            },
            {
              "title": "Búsquedas comerciales",
              "detail": "Relacionar las páginas relevantes con las consultas de compra en España."
            },
            {
              "title": "Plan de mejoras",
              "detail": "Entregar incidencias concretas por URL con prioridad y método de comprobación."
            }
          ],
          "cta": "Contar qué falla en mi tienda"
        }
      },
      "google-ads": {
        "title": "Auditoría Google Ads, Shopping y conversiones de venta",
        "description": "Campañas de búsqueda, Shopping y Performance Max con medición real de solicitudes y ventas.",
        "eyebrow": "GOOGLE ADS / CONVERSIONES",
        "headline": "¿Pagas por clics <em>sin saber qué venden?</em>",
        "lead": "Antes de optimizar pujas hay que revisar las señales. Contrastamos conversiones publicitarias con solicitudes y pedidos reales y después analizamos dónde se consume el presupuesto.",
        "problems": [
          [
            "Leads duplicados o irrelevantes",
            "Las acciones principales no representan resultados comerciales.",
            "Verificar eventos y objetivos de conversión."
          ],
          [
            "Inversión que no se justifica",
            "Búsquedas, productos o ubicaciones absorben gasto sin evidencia.",
            "Segmentar resultados y localizar desperdicio."
          ],
          [
            "Shopping mal alimentado",
            "El catálogo envía datos incompletos o inexactos.",
            "Revisar Merchant Center, títulos y disponibilidad."
          ]
        ],
        "outcomes": [
          "Revisión de eventos y atribución",
          "Lista de ajustes prioritarios",
          "Pruebas y seguimiento de resultados"
        ],
        "faq": [
          [
            "¿Garantizáis un ROAS específico?",
            "No. Para analizar rentabilidad hacen falta márgenes, ventas y datos fiables."
          ],
          [
            "¿Incluye Performance Max y Merchant Center?",
            "Si forman parte del negocio, pueden entrar en el diagnóstico. Acordaremos los límites y accesos antes del trabajo."
          ]
        ],
        "offer": {
          "title": "Optimizar sin perder de vista los pedidos",
          "intro": "Antes de subir presupuesto hay que saber qué cuenta como compra real.",
          "items": [
            {
              "title": "Eventos y duplicidades",
              "detail": "Revisar purchase, valor, objetivos principales y eventos repetidos."
            },
            {
              "title": "Feed y catálogo",
              "detail": "Contrastar Merchant Center con precios, stock y fichas reales."
            },
            {
              "title": "Gasto y margen",
              "detail": "Analizar consultas y productos según costes y resultados comerciales disponibles."
            }
          ],
          "cta": "Contar qué falla en mi tienda"
        }
      },
      "web-development": {
        "title": "Desarrollo web a medida, CRM y automatización",
        "description": "Webs y tiendas online, automatización, API, paneles y soluciones SaaS para procesos de negocio.",
        "eyebrow": "DESARROLLO / SISTEMAS",
        "headline": "¿La tecnología de tu empresa <em>te hace perder tiempo?</em>",
        "lead": "Diseñamos herramientas alrededor del trabajo real, no de una lista de funciones. Primero evaluamos procesos, integraciones, seguridad y mantenimiento.",
        "problems": [
          [
            "Pedidos que se copian a mano",
            "La tienda y el sistema de gestión no comparten información.",
            "Plantear sincronización y validación de datos."
          ],
          [
            "Web difícil de mantener",
            "Las dependencias hacen que cada cambio sea arriesgado.",
            "Auditar el código y definir una modernización gradual."
          ],
          [
            "Informes manuales",
            "Los equipos combinan datos dispersos en hojas de cálculo.",
            "Diseñar un panel o integración útil."
          ]
        ],
        "outcomes": [
          "Alcance técnico claro",
          "Plan de implementación por etapas",
          "Pruebas de aceptación y soporte"
        ],
        "faq": [
          [
            "¿Podéis desarrollar SaaS?",
            "Podemos estudiar su viabilidad y construir un alcance técnico antes de presupuestar."
          ],
          [
            "¿Es necesario rehacer la tienda?",
            "No siempre. Primero evaluamos si una mejora puntual o integración resuelve el problema."
          ]
        ],
        "offer": {
          "title": "Una integración antes que una reforma innecesaria",
          "intro": "Una integración útil debe reducir pasos sin romper el sistema actual.",
          "items": [
            {
              "title": "Operaciones",
              "detail": "Entender el recorrido de pedidos, ERP y CRM."
            },
            {
              "title": "Viabilidad",
              "detail": "Evaluar API, plugins y riesgos de la infraestructura actual."
            },
            {
              "title": "Entrega controlada",
              "detail": "Definir un piloto con pruebas, seguridad y mantenimiento."
            }
          ],
          "cta": "Contar qué falla en mi tienda"
        }
      },
      "contact": {
        "title": "Contacto para SEO, Google Ads y desarrollo | MrSeo.tech",
        "description": "Cuéntanos cuál es el principal obstáculo de tu web o negocio y en qué mercado trabajas.",
        "eyebrow": "CONTACTO / SOLUCIÓN",
        "headline": "¿Qué está impidiendo <em>que crezca tu negocio?</em>",
        "lead": "Comparte la dirección de la web, el país de destino y el síntoma que te preocupa. Evaluaremos el punto de partida. Indica plataforma, mercado de venta, URL y un ejemplo concreto. No compartas contraseñas.",
        "problems": [],
        "outcomes": [],
        "faq": []
      },
      "privacy": {
        "title": "Privacidad y consultas de contacto",
        "description": "Uso de los datos enviados a través del formulario de MrSeo.tech.",
        "eyebrow": "Privacidad",
        "headline": "Privacidad y consultas de contacto",
        "lead": "Uso de los datos enviados a través del formulario de MrSeo.tech.",
        "problems": [],
        "outcomes": [],
        "faq": []
      }
    },
    "privacy": [
      "Privacidad y consultas de contacto",
      "Uso de los datos enviados a través del formulario de MrSeo.tech.",
      "Datos enviados",
      "Nombre, correo, web opcional y mensaje. Se tratan temporalmente datos técnicos para reducir el spam.",
      "Finalidad",
      "Usamos la información para responder y, si lo solicitas, valorar una colaboración.",
      "Entrega",
      "La consulta llega a hello@mrseo.tech y se reenvía a un buzón profesional de UKR.NET. Los proveedores de alojamiento y correo intervienen técnicamente.",
      "Conservación",
      "Guardamos la correspondencia el tiempo necesario para atender la consulta y obligaciones legales aplicables; el plazo exacto se concretará antes del lanzamiento público.",
      "Derechos y contacto",
      "Puedes solicitar acceso, rectificación o supresión, según la ley aplicable, en hello@mrseo.tech. Publicaremos la identidad legal del responsable tras su verificación.",
      "Al enviar el formulario, facilitas datos para recibir respuesta. Detalles:"
    ],
    "market": {
      "heading": "Ecommerce: primero medir, después invertir",
      "description": "Revisamos tiendas como PrestaShop y WooCommerce, sus categorías, el seguimiento de compras y el flujo entre publicidad y pedido. Sin prometer resultados ni soporte oficial de plataforma.",
      "cta": "Contar qué falla en mi tienda",
      "brief": "Indica plataforma, mercado de venta, URL y un ejemplo concreto. No compartas contraseñas.",
      "portfolioLabel": "Ver proyectos (en inglés)"
    }
  },
  "nl": {
    "code": "nl-NL",
    "name": "Nederlands",
    "country": "Nederland",
    "nav": [
      "Diensten",
      "SEO",
      "Google Ads",
      "Webontwikkeling",
      "Contact",
      "Bespreek je project",
      "Privacy"
    ],
    "ui": [
      "Meer verkeer is niet automatisch meer omzet.",
      "We onderzoeken het knelpunt vóór we oplossingen voorstellen.",
      "Wat we onderzoeken",
      "Wat we aanpakken",
      "Wat je ontvangt",
      "Veelgestelde vragen",
      "Neem contact op",
      "Naam",
      "E-mailadres",
      "Website (optioneel)",
      "Beschrijf je probleem",
      "Verstuur aanvraag",
      "Bericht aangeboden voor verzending. We antwoorden per e-mail.",
      "Controleer de verplichte velden.",
      "Verzenden mislukt. Probeer het opnieuw.",
      "Stuur geen wachtwoorden of vertrouwelijke toegang.",
      "We werken op afstand vanuit Oekraïne. Werktaal en samenwerking bespreken we vooraf."
    ],
    "pages": {
      "": {
        "title": "Webshop SEO, Google Ads (SEA) en webontwikkeling Nederland",
        "description": "Technische SEO, Shopping, conversiemeting en webontwikkeling gericht op echte knelpunten van bedrijven.",
        "eyebrow": "VERKEER / LEADS / TECHNIEK",
        "headline": "Een website is er. <em>Maar waar blijven de aanvragen?</em>",
        "lead": "Als bezoekers niet bestellen, kan de oorzaak zitten in vindbaarheid, winkelstructuur, advertenties of meting. We zoeken bewijs vóór een nieuwe investering.",
        "problems": [
          [
            "Veel bezoek, weinig aanvragen",
            "De propositie of het conversiepad overtuigt onvoldoende.",
            "Analyseer zoekintentie, landingspagina en formulier."
          ],
          [
            "Campagnes zonder helder rendement",
            "GA4 en advertentieconversies tellen niet hetzelfde.",
            "Controleer aankopen, leads en campagne-indeling."
          ],
          [
            "Systemen werken langs elkaar heen",
            "Webshop en CRM vragen veel handmatige invoer.",
            "Onderzoek koppelingen en procesautomatisering."
          ]
        ],
        "outcomes": [
          "Analyse met concrete knelpunten",
          "Prioriteiten zonder loze beloften",
          "Meetpunten voor verbeteringen"
        ],
        "faq": [
          [
            "Hebben jullie een kantoor in Nederland?",
            "Nee. We werken op afstand en spreken bereikbaarheid en werktaal vooraf af."
          ]
        ],
        "offer": {
          "title": "Eerst vaststellen waar geld en tijd verloren gaan",
          "intro": "Eerst onderzoeken we waar je conversiepad of werkwijze hapert.",
          "items": [
            {
              "title": "SEO-structuur",
              "detail": "Bekijken of collecties, categorieën en producten zichtbaar zijn voor koopgerichte zoekopdrachten."
            },
            {
              "title": "SEA en meting",
              "detail": "Vergelijken of Google Ads en GA4 overeenkomen met echte orders."
            },
            {
              "title": "Operationele koppelingen",
              "detail": "Achterhalen waar orders, klanten of voorraad nog handmatig worden verwerkt."
            }
          ],
          "cta": "Toon mijn webshopprobleem"
        }
      },
      "seo": {
        "title": "Technische webshop SEO-audit: categorieën en indexering",
        "description": "SEO-audit van indexering, collecties, filters, productpagina's en commerciële zoekintentie.",
        "eyebrow": "SEO / WEBWINKELS",
        "headline": "Zijn de juiste pagina's <em>onvindbaar?</em>",
        "lead": "Bij grotere webshops staan filters, varianten en categorieën soms verkeerd in de index. We brengen URL-patronen en interne links in kaart voordat we content uitbreiden.",
        "problems": [
          [
            "Belangrijke collecties ontbreken",
            "Crawlbaarheid en canonical-keuzes werken tegen de structuur.",
            "Controleer sitemap, indexering en interne links."
          ],
          [
            "Filters veroorzaken duplicaten",
            "Meerdere URL's beantwoorden dezelfde zoekvraag.",
            "Scheid waardevolle filterpagina's van technische varianten."
          ],
          [
            "Verkeer zonder bestellingen",
            "Informatiepagina's verdringen koopgerichte landingspagina's.",
            "Werk zoekintenties en conversiepad uit."
          ]
        ],
        "outcomes": [
          "Technische audit per URL-patroon",
          "Geprioriteerde verbeterlijst",
          "Controle op indexering en waardevolle leads"
        ],
        "faq": [
          [
            "Garanderen jullie topposities?",
            "Nee. We garanderen geen rankings, maar leggen uit welke aanpassingen meetbaar zijn."
          ],
          [
            "Is de audit geschikt voor WooCommerce en Shopify?",
            "Dat hangt af van de inrichting. We beoordelen eerst de URL- en catalogusstructuur voordat we wijzigingen adviseren."
          ]
        ],
        "offer": {
          "title": "Een technische audit voor je webshop",
          "intro": "De audit wijst naar concrete URL’s, niet naar een lijst algemene SEO-tips.",
          "items": [
            {
              "title": "Indexeerbare pagina’s",
              "detail": "Onderzoeken van filters, canonical-tags, paginering en interne links."
            },
            {
              "title": "Zoekintentie",
              "detail": "Controleren of belangrijke categorieën aansluiten op Nederlandse zoekopdrachten."
            },
            {
              "title": "Prioriteitenlijst",
              "detail": "Vastleggen welke URL’s aandacht vragen en hoe verbeteringen gecontroleerd worden."
            }
          ],
          "cta": "Toon mijn webshopprobleem"
        }
      },
      "google-ads": {
        "title": "SEA / Google Ads-audit: Shopping en conversiemeting",
        "description": "Audit van advertentiekosten, productfeeds, PMax en betrouwbare aankoop- of leadmeting.",
        "eyebrow": "ADS / METING",
        "headline": "Je betaalt voor klikken. <em>Wat leveren ze op?</em>",
        "lead": "Zonder juiste conversies sturen geautomatiseerde campagnes mogelijk op verkeerde signalen. We toetsen tracking aan bestellingen en onderzoeken vervolgens budgetverdeling.",
        "problems": [
          [
            "Conversies zijn onbetrouwbaar",
            "Dubbele events of afwijkende bestelwaarden beïnvloeden optimalisatie.",
            "Vergelijk GA4, Google Ads en ordergegevens."
          ],
          [
            "Shopping besteedt verkeerd",
            "Productgroepen en marges verschillen sterk.",
            "Analyseer SKU's, categorieën en verspilling."
          ],
          [
            "Merchant Center geeft waarschuwingen",
            "Feed, prijs en beschikbaarheid sluiten niet altijd aan.",
            "Controleer brongegevens en landingspagina's."
          ]
        ],
        "outcomes": [
          "Audit van tracking en conversies",
          "Overzicht van kosten zonder resultaat",
          "Plan voor afgebakende experimenten"
        ],
        "faq": [
          [
            "Kunnen jullie ROAS garanderen?",
            "Nee. Zonder marge- en ordergegevens is een rendementsgarantie misleidend."
          ],
          [
            "Is een SEA-audit hetzelfde als maandelijks beheer?",
            "Nee. De audit is afgebakend; doorlopend beheer vraagt een aparte afspraak en beoordeling van het budget."
          ]
        ],
        "offer": {
          "title": "SEA beoordelen op betekenisvolle orders",
          "intro": "Betrouwbare omzetmetingen gaan vóór extra advertentiebudget.",
          "items": [
            {
              "title": "Conversies",
              "detail": "Controleren van purchase, order-ID, primaire conversies en taggedrag bij toestemming."
            },
            {
              "title": "Productfeed",
              "detail": "Vergelijken van Merchant Center met webshopprijzen, voorraad en attributen."
            },
            {
              "title": "Kosten per productgroep",
              "detail": "Controleren waar budget wordt uitgegeven zonder bevestigde commerciële waarde."
            }
          ],
          "cta": "Toon mijn webshopprobleem"
        }
      },
      "web-development": {
        "title": "Webapplicaties, API-koppelingen en WordPress op maat",
        "description": "Websites, webshops, dashboards, CRM-koppelingen en automatisering voor efficiëntere processen.",
        "eyebrow": "WEBONTWIKKELING / AUTOMATISERING",
        "headline": "Moet je team <em>steeds dezelfde handelingen doen?</em>",
        "lead": "We beoordelen welke systemen gegevens delen, waar fouten ontstaan en wat veilig te automatiseren valt. Zo voorkomt maatwerk extra complexiteit.",
        "problems": [
          [
            "Orders worden overgetypt",
            "Webshop en backoffice zijn niet goed gekoppeld.",
            "Ontwerp een API-koppeling met controles."
          ],
          [
            "Aanpassingen kosten te veel",
            "Een fragiele WordPress-structuur belemmert onderhoud.",
            "Beoordeel architectuur en werk aan modernisering."
          ],
          [
            "Rapportages kosten uren",
            "Data komen uit losse systemen en exports.",
            "Bouw een gericht dashboard of datastroom."
          ]
        ],
        "outcomes": [
          "Functionele en technische scope",
          "Gefaseerde implementatie",
          "Acceptatie- en onderhoudsplan"
        ],
        "faq": [
          [
            "Maken jullie SaaS of CRM-systemen?",
            "We kunnen scope, integraties en haalbaarheid van een webapplicatie onderzoeken."
          ],
          [
            "Moet alles opnieuw gebouwd worden?",
            "Niet per se. We beoordelen eerst of een bestaande koppeling aangepast kan worden."
          ]
        ],
        "offer": {
          "title": "Automatisering die onderhoudbaar blijft",
          "intro": "Een goede koppeling voorkomt nieuw handwerk en laat fouten zien.",
          "items": [
            {
              "title": "Proceskaart",
              "detail": "Vastleggen van verbindingen tussen webshop, CRM en voorraad."
            },
            {
              "title": "API en veiligheid",
              "detail": "Beoordelen van toegangsrechten, beperkingen en foutafhandeling."
            },
            {
              "title": "Gefaseerde uitvoering",
              "detail": "Opleveren volgens testgevallen en afspraken over onderhoud."
            }
          ],
          "cta": "Toon mijn webshopprobleem"
        }
      },
      "contact": {
        "title": "Contact MrSeo.tech voor SEO, advertenties of ontwikkeling",
        "description": "Beschrijf je website, doelmarkt en belangrijkste knelpunt voor een gerichte eerste beoordeling.",
        "eyebrow": "CONTACT / VRAAG",
        "headline": "Wat houdt <em>je bedrijf tegen?</em>",
        "lead": "Vertel wat niet werkt. Een URL en een concreet voorbeeld helpen meer dan een lange briefing. Vermeld je platform, belangrijkste markt en het verschil tussen GA4, Ads en bestellingen. Deel nooit wachtwoorden.",
        "problems": [],
        "outcomes": [],
        "faq": []
      },
      "privacy": {
        "title": "Privacy en contactaanvragen",
        "description": "Hoe MrSeo.tech gegevens uit het contactformulier gebruikt.",
        "eyebrow": "Privacy",
        "headline": "Privacy en contactaanvragen",
        "lead": "Hoe MrSeo.tech gegevens uit het contactformulier gebruikt.",
        "problems": [],
        "outcomes": [],
        "faq": []
      }
    },
    "privacy": [
      "Privacy en contactaanvragen",
      "Hoe MrSeo.tech gegevens uit het contactformulier gebruikt.",
      "Ingevoerde gegevens",
      "Naam, e-mailadres, optionele website en bericht. Tijdelijke technische gegevens helpen spam te beperken.",
      "Doel",
      "We gebruiken deze gegevens om je vraag te beantwoorden en eventueel samenwerking te bespreken.",
      "Verwerking",
      "Berichten gaan naar hello@mrseo.tech en worden doorgestuurd naar een zakelijk UKR.NET-postvak. Hosting- en e-mailaanbieders verwerken gegevens technisch.",
      "Bewaartermijn",
      "We bewaren correspondentie zolang dat nodig is voor de aanvraag en eventuele wettelijke verplichtingen; een concrete termijn wordt vóór publieke lancering vastgelegd.",
      "Rechten en contact",
      "Je kunt waar toepasselijk inzage, correctie of verwijdering vragen via hello@mrseo.tech. De geverifieerde identiteit van de verantwoordelijke wordt vóór de publieke lancering vermeld.",
      "Met dit formulier verstrek je gegevens zodat we kunnen antwoorden. Details:"
    ],
    "market": {
      "heading": "Betrouwbare data voor Nederlandse webshops",
      "description": "We onderzoeken je bestaande webshop en beoordelen welke onderdelen van WooCommerce, Shopify of een ander platform echt de oorzaak zijn. Geen pakket of platformcertificering zonder bewijs.",
      "cta": "Toon mijn webshopprobleem",
      "brief": "Vermeld je platform, belangrijkste markt en het verschil tussen GA4, Ads en bestellingen. Deel nooit wachtwoorden.",
      "portfolioLabel": "Bekijk projecten (Engels)"
    }
  },
  "ro": {
    "code": "ro-RO",
    "name": "Română",
    "country": "România",
    "nav": [
      "Servicii",
      "SEO",
      "Google Ads",
      "Dezvoltare web",
      "Contact",
      "Discută proiectul",
      "Confidențialitate"
    ],
    "ui": [
      "Traficul nu înseamnă automat clienți.",
      "Căutăm cauza înainte să propunem un serviciu.",
      "Ce verificăm",
      "Cum intervenim",
      "Ce primești",
      "Întrebări frecvente",
      "Scrie-ne",
      "Nume",
      "Adresă de e-mail",
      "Site web (opțional)",
      "Descrie problema",
      "Trimite solicitarea",
      "Mesajul a fost transmis spre expediere. Răspundem prin e-mail.",
      "Verifică toate câmpurile obligatorii.",
      "Trimiterea a eșuat. Încearcă din nou.",
      "Nu trimite parole sau date de acces confidențiale.",
      "Lucrăm la distanță din Ucraina. Stabilim limba de lucru și etapele înainte de începere."
    ],
    "pages": {
      "": {
        "title": "Audit SEO, Google Ads și dezvoltare web pentru România",
        "description": "Optimizare SEO, audit Google Ads, măsurarea conversiilor și dezvoltare web pornind de la probleme reale.",
        "eyebrow": "CLIENȚI / CĂUTARE / TEHNOLOGIE",
        "headline": "Ai un site. <em>Dar unde sunt clienții?</em>",
        "lead": "Dacă vizitele nu se transformă în cereri sau comenzi, trebuie verificată întreaga legătură dintre căutare, reclamă, pagină și conversie. Propunem pași concreți după diagnostic.",
        "problems": [
          [
            "Vizitatori fără cereri",
            "Mesajul paginii nu corespunde intenției clienților.",
            "Analizăm paginile comerciale și pașii până la contact."
          ],
          [
            "Buget publicitar fără explicație",
            "Conversiile nu reflectă comenzile sau cererile reale.",
            "Verificăm GA4, Google Ads și calitatea datelor."
          ],
          [
            "Procese manuale repetate",
            "Magazinul și sistemele interne nu comunică eficient.",
            "Evaluăm integrările și automatizarea."
          ]
        ],
        "outcomes": [
          "Diagnostic cu exemple concrete",
          "Priorități pentru implementare",
          "Indicatori care pot fi verificați"
        ],
        "faq": [
          [
            "Aveți birou în România?",
            "Nu. Colaborăm de la distanță și stabilim comunicarea înainte de proiect."
          ]
        ],
        "offer": {
          "title": "Unde verificăm pierderile comerciale",
          "intro": "Separăm problemele de trafic, măsurare și operațiuni înainte de a recomanda soluții.",
          "items": [
            {
              "title": "Vizibilitatea catalogului",
              "detail": "Verificăm dacă paginile de categorie pot fi descoperite pentru căutări de cumpărare."
            },
            {
              "title": "Reclame și comenzi",
              "detail": "Confruntăm GA4 și Google Ads cu comenzile efective."
            },
            {
              "title": "Operațiuni manuale",
              "detail": "Analizăm transferul de date între magazin, gestiune și canalele de vânzare."
            }
          ],
          "cta": "Descrie problema magazinului"
        }
      },
      "seo": {
        "title": "Audit SEO magazin online: categorii, filtre și indexare",
        "description": "Audit de indexare, categorii, filtre, linkuri interne și pagini comerciale cu recomandări prioritizate.",
        "eyebrow": "SEO / MAGAZINE ONLINE",
        "headline": "Paginile importante <em>nu apar în Google?</em>",
        "lead": "Începem cu URL-urile care ar trebui să aducă cereri, dar nu sunt vizibile. Verificăm accesibilitatea pentru roboți și structura înainte de a recomanda conținut nou.",
        "problems": [
          [
            "Categorii neindexate",
            "Canonicele, linkurile sau restricțiile limitează accesul Google.",
            "Verificăm sitemap, crawl și grupuri de URL-uri."
          ],
          [
            "Filtre și pagini duplicate",
            "Parametrii creează pagini fără cerere reală.",
            "Separăm filtrele utile de variațiile tehnice."
          ],
          [
            "Trafic fără cumpărători",
            "Paginile nu răspund căutărilor comerciale.",
            "Revizuim intenția, structura și oferta."
          ]
        ],
        "outcomes": [
          "Audit cu URL-uri și erori",
          "Plan SEO în ordinea impactului",
          "Monitorizarea indexării și a cererilor"
        ],
        "faq": [
          [
            "Promiteți poziția întâi?",
            "Nu. Pozițiile nu pot fi garantate; lucrăm cu schimbări și rezultate verificabile."
          ],
          [
            "Lucrați cu MerchantPro sau Gomag?",
            "Putem analiza structura tehnică a magazinului folosit. Nu susținem că suntem parteneri oficiali ai acestor platforme."
          ]
        ],
        "offer": {
          "title": "Audit SEO adaptat structurii magazinului",
          "intro": "Ne concentrăm pe URL-uri și categorii care pot aduce cereri comerciale.",
          "items": [
            {
              "title": "URL-uri și indexare",
              "detail": "Controlăm sitemap, canonical, filtre și legăturile interne."
            },
            {
              "title": "Cerere comercială",
              "detail": "Separăm paginile cu valoare de combinațiile duplicate de produse."
            },
            {
              "title": "Plan de remediere",
              "detail": "Identificăm erorile pe URL-uri și pașii de validare după implementare."
            }
          ],
          "cta": "Descrie problema magazinului"
        }
      },
      "google-ads": {
        "title": "Audit Google Ads și Merchant Center pentru e-commerce",
        "description": "Google Ads Search, Shopping, Performance Max, Merchant Center și urmărirea conversiilor reale.",
        "eyebrow": "RECLAME / EFICIENȚĂ",
        "headline": "Reclamele consumă buget. <em>Ce vânzări aduc?</em>",
        "lead": "Înainte de schimbarea licitațiilor verificăm ce înregistrează platformele. Fără date valide, optimizarea poate încuraja conversii fără valoare pentru afacere.",
        "problems": [
          [
            "Conversii raportate greșit",
            "Evenimentele se repetă sau nu corespund comenzilor.",
            "Comparăm datele din Ads, GA4 și vânzări."
          ],
          [
            "Cheltuieli fără rezultate clare",
            "Produse sau interogări consumă buget fără valoare.",
            "Segmentăm campaniile și căutările."
          ],
          [
            "Feed de produse cu probleme",
            "Datele Merchant Center sunt incomplete sau diferite de site.",
            "Verificăm titluri, stocuri și pagini de produs."
          ]
        ],
        "outcomes": [
          "Control al urmăririi conversiilor",
          "Identificarea cheltuielilor ineficiente",
          "Plan de optimizare măsurabilă"
        ],
        "faq": [
          [
            "Garantați ROAS?",
            "Nu. Rentabilitatea depinde de marjă, prețuri, ofertă și măsurare."
          ],
          [
            "Puteți verifica Shopping și Performance Max?",
            "Da, dacă există acces autorizat la date și campanii. Definim mai întâi scopul auditului."
          ]
        ],
        "offer": {
          "title": "Verificăm semnalele înainte să creștem bugetul",
          "intro": "Măsurarea corectă a comenzilor este condiția unei optimizări responsabile.",
          "items": [
            {
              "title": "Valoarea conversiilor",
              "detail": "Comparăm purchase, transaction_id și veniturile din GA4 cu comenzile reale."
            },
            {
              "title": "Feed și disponibilitate",
              "detail": "Verificăm datele Merchant Center față de prețuri, stoc și paginile produselor."
            },
            {
              "title": "Buget pe categorii",
              "detail": "Analizăm cheltuieli fără valoare măsurată și marjele când sunt disponibile."
            }
          ],
          "cta": "Descrie problema magazinului"
        }
      },
      "web-development": {
        "title": "Dezvoltare web, CRM și automatizări prin API",
        "description": "WordPress, magazine online, aplicații web, CRM și dashboard-uri adaptate fluxurilor de lucru.",
        "eyebrow": "DEZVOLTARE / AUTOMATIZARE",
        "headline": "Software-ul ar trebui <em>să reducă munca manuală.</em>",
        "lead": "Nu începem cu o listă de funcții, ci cu procesul. Analizăm ce date se mută între sisteme și cum putem reduce erorile prin integrare.",
        "problems": [
          [
            "Comenzi introduse de două ori",
            "Magazinul online nu comunică bine cu gestiunea.",
            "Proiectăm sincronizare prin API."
          ],
          [
            "Site greu de întreținut",
            "Codul și pluginurile complică fiecare actualizare.",
            "Evaluăm modernizarea și securitatea."
          ],
          [
            "Rapoarte construite manual",
            "Datele sunt fragmentate între platforme.",
            "Creăm un flux sau dashboard util echipei."
          ]
        ],
        "outcomes": [
          "Cerințe și limite clare",
          "Etape tehnice și integrări",
          "Criterii de acceptanță și suport"
        ],
        "faq": [
          [
            "Puteți dezvolta un SaaS?",
            "Putem analiza fezabilitatea, arhitectura și funcționalitățile înainte de estimarea implementării."
          ],
          [
            "Se poate conecta magazinul la sistemul de gestiune?",
            "Evaluăm posibilitatea doar după ce vedem API-ul, datele și restricțiile platformei."
          ]
        ],
        "offer": {
          "title": "Reducem operațiunile repetitive",
          "intro": "Integrarea trebuie să simplifice procese fără să creeze riscuri inutile.",
          "items": [
            {
              "title": "Traseul comenzilor",
              "detail": "Documentăm schimbul de date dintre magazin, ERP și alte canale folosite efectiv."
            },
            {
              "title": "Posibilități API",
              "detail": "Verificăm limite tehnice, autorizare și tratarea erorilor."
            },
            {
              "title": "Pilot verificabil",
              "detail": "Definim teste de sincronizare și reguli de mentenanță."
            }
          ],
          "cta": "Descrie problema magazinului"
        }
      },
      "contact": {
        "title": "Contact MrSeo.tech: SEO, Google Ads și dezvoltare",
        "description": "Trimite adresa site-ului, piața vizată și problema de rezolvat; răspundem prin e-mail.",
        "eyebrow": "CONTACT / PROIECT",
        "headline": "Ce împiedică <em>creșterea afacerii?</em>",
        "lead": "Nu ai nevoie de un brief perfect. Spune-ne ce rezultat lipsește și care este site-ul tău. Indică platforma, numărul aproximativ de produse și ce nu corespunde între comenzi și rapoarte. Nu trimite parole.",
        "problems": [],
        "outcomes": [],
        "faq": []
      },
      "privacy": {
        "title": "Confidențialitate și solicitări de contact",
        "description": "Cum folosim informațiile trimise prin formularul MrSeo.tech.",
        "eyebrow": "Confidențialitate",
        "headline": "Confidențialitate și solicitări de contact",
        "lead": "Cum folosim informațiile trimise prin formularul MrSeo.tech.",
        "problems": [],
        "outcomes": [],
        "faq": []
      }
    },
    "privacy": [
      "Confidențialitate și solicitări de contact",
      "Cum folosim informațiile trimise prin formularul MrSeo.tech.",
      "Date trimise",
      "Nume, e-mail, site opțional și mesaj. Date tehnice temporare ajută la limitarea mesajelor automate.",
      "Scop",
      "Folosim datele pentru a răspunde și pentru a discuta colaborarea, dacă soliciți.",
      "Transmitere",
      "Mesajele ajung la hello@mrseo.tech și sunt redirecționate către o căsuță profesională UKR.NET. Furnizorii de găzduire și e-mail le procesează tehnic.",
      "Păstrare",
      "Păstrăm corespondența cât este necesar soluționării cererii și obligațiilor legale; un termen exact va fi stabilit înainte de lansarea publică.",
      "Drepturi și contact",
      "Poți solicita acces, corectare sau ștergere, în limitele legii, la hello@mrseo.tech. Identitatea juridică verificată a operatorului va fi publicată înainte de lansare.",
      "Prin trimiterea formularului, oferi date pentru a primi un răspuns. Detalii:"
    ],
    "market": {
      "heading": "Pentru magazine online care vor comenzi măsurabile",
      "description": "În România analizăm și contextul tehnic al magazinului, de exemplu MerchantPro, Gomag sau WooCommerce, fără a pretinde parteneriate oficiale. Recomandările depind de platforma folosită și datele disponibile.",
      "cta": "Descrie problema magazinului",
      "brief": "Indică platforma, numărul aproximativ de produse și ce nu corespunde între comenzi și rapoarte. Nu trimite parole.",
      "portfolioLabel": "Vezi proiecte (în engleză)"
    }
  },
  "cs": {
    "code": "cs-CZ",
    "name": "Čeština",
    "country": "Česko",
    "nav": [
      "Služby",
      "SEO",
      "Google Ads",
      "Vývoj webu",
      "Kontakt",
      "Probrat projekt",
      "Soukromí"
    ],
    "ui": [
      "Návštěvnost sama o sobě nestačí.",
      "Nejdříve hledáme příčinu, potom navrhujeme řešení.",
      "Co prověřujeme",
      "Jak problém řešíme",
      "Co získáte",
      "Časté otázky",
      "Napište nám",
      "Jméno",
      "E-mail",
      "Web (nepovinné)",
      "Popište problém",
      "Odeslat poptávku",
      "Zpráva byla předána k odeslání. Odpovíme e-mailem.",
      "Zkontrolujte povinná pole.",
      "Odeslání se nezdařilo. Zkuste to znovu.",
      "Neposílejte hesla ani citlivé přístupy.",
      "Spolupracujeme na dálku z Ukrajiny. Jazyk komunikace a rozsah domluvíme předem."
    ],
    "pages": {
      "": {
        "title": "SEO audit e-shopu, PPC a vývoj webu pro Česko",
        "description": "Technické SEO, měření konverzí, správa kampaní a vývoj webových nástrojů pro konkrétní obchodní problémy.",
        "eyebrow": "VIDITELNOST / POPTÁVKY / DATA",
        "headline": "Web máte. <em>A kde jsou poptávky?</em>",
        "lead": "Pokud reklama utrácí a web nepřináší zákazníky, problém nemusí být jen v návštěvnosti. Prověřujeme vyhledávání, obsah, měření i technické překážky.",
        "problems": [
          [
            "Návštěvy bez poptávek",
            "Stránka nepřesvědčuje nebo míří na nesprávný dotaz.",
            "Zkontrolujeme záměr hledání a cestu k formuláři."
          ],
          [
            "Kampaně bez jasného přínosu",
            "Přehledy měří jiné události než skutečné zakázky.",
            "Porovnáme data GA4, Ads a obchodní výsledky."
          ],
          [
            "Ručně opakovaná práce",
            "E-shop a interní systémy nejsou propojené.",
            "Navrhneme integraci a automatizaci."
          ]
        ],
        "outcomes": [
          "Seznam ověřitelných příčin",
          "Plán priorit bez prázdných slibů",
          "Metriky pro kontrolu výsledků"
        ],
        "faq": [
          [
            "Máte pobočku v Česku?",
            "Ne. Pracujeme vzdáleně a předem dohodneme komunikaci i rozsah."
          ]
        ],
        "offer": {
          "title": "Co může brzdit vaše objednávky",
          "intro": "Oddělujeme problém viditelnosti, měření a provozu, nikoli pouze obecný marketing.",
          "items": [
            {
              "title": "Kategorie a indexace",
              "detail": "Zkontrolovat, zda důležité stránky odpovídají českým nákupním dotazům."
            },
            {
              "title": "Reklamní výkon",
              "detail": "Porovnat objednávky se záznamy v Google Ads a případně Skliku nebo Heurece."
            },
            {
              "title": "Přenos dat",
              "detail": "Zjistit, kde se informace mezi e-shopem a účetnictvím zbytečně přepisují."
            }
          ],
          "cta": "Popsat problém e-shopu"
        }
      },
      "seo": {
        "title": "SEO audit e-shopu: Shoptet, indexace a kategorie",
        "description": "Audit indexace, kategorií, filtrů, interního prolinkování a obchodních vstupních stránek.",
        "eyebrow": "SEO / VYHLEDÁVÁNÍ",
        "headline": "Důležité stránky <em>Google nenachází?</em>",
        "lead": "Nejprve zjišťujeme, proč se stránky s obchodním potenciálem nedostávají do vyhledávání. Projdeme URL, indexaci a interní odkazy.",
        "problems": [
          [
            "Kategorie se neindexují",
            "Kanonické adresy nebo omezení procházení blokují vstupní stránky.",
            "Prověříme sitemapu, indexaci a odkazy."
          ],
          [
            "Filtry vytvářejí duplicity",
            "URL parametry generují stránky bez vlastní hodnoty.",
            "Rozdělíme smysluplné filtry a technické varianty."
          ],
          [
            "Návštěvnost bez objednávek",
            "Obsah neodpovídá nákupnímu záměru.",
            "Přehodnotíme strukturu a důležité landing pages."
          ]
        ],
        "outcomes": [
          "Technický audit s příklady URL",
          "Prioritizovaný seznam oprav",
          "Kontrola indexace a poptávek"
        ],
        "faq": [
          [
            "Garantujete první místo?",
            "Ne. Pozice ve vyhledávání nelze spolehlivě slíbit."
          ],
          [
            "Hodí se audit i pro Shoptet?",
            "Ano, můžeme prověřit indexaci, URL a kategorizační strukturu. Konkrétní změny závisí na dostupných nastaveních."
          ]
        ],
        "offer": {
          "title": "SEO audit s konkrétními URL",
          "intro": "Audit má ukázat konkrétní URL a priority, ne jen dlouhý seznam hlášení.",
          "items": [
            {
              "title": "Technické nastavení",
              "detail": "Prověřit sitemapu, filtry, canonical a interní odkazy."
            },
            {
              "title": "Kategorie a dotazy",
              "detail": "Zaměřit se na relevantní hledání produktů v Česku."
            },
            {
              "title": "Pořadí oprav",
              "detail": "Připravit seznam priorit s postupem následné kontroly."
            }
          ],
          "cta": "Popsat problém e-shopu"
        }
      },
      "google-ads": {
        "title": "PPC audit e-shopu: Google Ads, Sklik a měření",
        "description": "Kampaně ve vyhledávání, Shopping, Performance Max, Merchant Center a přesné měření konverzí.",
        "eyebrow": "GOOGLE ADS / MĚŘENÍ",
        "headline": "Rozpočet se utrácí. <em>Co přináší firmě?</em>",
        "lead": "Automatické nabídky fungují jen s rozumnými signály. Nejprve ověřujeme nákupy a poptávky, pak hodnotíme dotazy, produkty a rozpočet.",
        "problems": [
          [
            "Nesprávné konverze",
            "Duplicitní události ovlivňují rozhodování algoritmu.",
            "Srovnáme Google Ads, GA4 a reálné objednávky."
          ],
          [
            "Neefektivní výdaje",
            "Některé produkty nebo dotazy spotřebují rozpočet bez přínosu.",
            "Rozdělíme data podle kampaní a sortimentu."
          ],
          [
            "Chyby v Merchant Center",
            "Ceny či dostupnost se liší od stránek.",
            "Prověříme feed a produktové atributy."
          ]
        ],
        "outcomes": [
          "Kontrola konverzního měření",
          "Přehled zbytečných výdajů",
          "Návrh testů s jasnými kritérii"
        ],
        "faq": [
          [
            "Slibujete konkrétní PNO či ROAS?",
            "Ne. Výsledek závisí na marži, trhu i kvalitě dat."
          ],
          [
            "Pracujete také se Sklikem a Heurekou?",
            "Při celkové diagnostice je můžeme zohlednit, pokud jsou relevantní a máme data. Samostatná správa vyžaduje další dohodu."
          ]
        ],
        "offer": {
          "title": "PPC posuzujeme podle objednávek",
          "intro": "Google Ads a české PPC kanály hodnotíme samostatně podle skutečných objednávek.",
          "items": [
            {
              "title": "Konverze a GA4",
              "detail": "Prověřit události nákupu, jejich hodnoty a duplicity."
            },
            {
              "title": "Produktové kampaně",
              "detail": "Přezkoumat Merchant Center a podle potřeby feedy pro Heureku či Zboží.cz."
            },
            {
              "title": "Oddělení kanálů",
              "detail": "Nesčítat stejnou zakázku jako nezávislý výsledek Google Ads a Skliku."
            }
          ],
          "cta": "Popsat problém e-shopu"
        }
      },
      "web-development": {
        "title": "Tvorba webových aplikací, CRM a API integrace",
        "description": "Weby, e-shopy, interní nástroje, SaaS, automatizace a propojení systémů pro efektivnější provoz.",
        "eyebrow": "VÝVOJ / PROCESY",
        "headline": "Technologie má práci <em>zjednodušovat.</em>",
        "lead": "Začínáme mapováním skutečných činností. Pokud tým přepisuje objednávky nebo skládá reporty ručně, hledáme bezpečné a udržitelné propojení.",
        "problems": [
          [
            "Přepisování objednávek",
            "Web a firemní systém nemají spolehlivou výměnu dat.",
            "Navrhneme API integraci a kontrolu synchronizace."
          ],
          [
            "Náročná údržba webu",
            "Závislosti a pluginy brzdí změny.",
            "Zhodnotíme architekturu a modernizaci."
          ],
          [
            "Ruční reporting",
            "Data se stahují z více nástrojů.",
            "Připravíme přehledový panel nebo datový tok."
          ]
        ],
        "outcomes": [
          "Technické zadání a rozsah",
          "Plán implementace a integrací",
          "Ověřovací testy a podpora"
        ],
        "faq": [
          [
            "Vyvíjíte i SaaS aplikace?",
            "Můžeme posoudit proveditelnost SaaS nebo CRM a navrhnout realistický rozsah."
          ],
          [
            "Je možné propojit e-shop s účetnictvím?",
            "Nejdříve zjistíme možnosti API, datový model a řešení výpadků."
          ]
        ],
        "offer": {
          "title": "Konečně méně ručních úkonů",
          "intro": "Nové propojení má ušetřit práci a zároveň umožnit kontrolu chyb.",
          "items": [
            {
              "title": "Průběh objednávky",
              "detail": "Zmapovat přenos dat z e-shopu do skladového či účetního systému."
            },
            {
              "title": "Možnosti rozhraní",
              "detail": "Prověřit API, oprávnění a limity stávajícího řešení."
            },
            {
              "title": "Postupné nasazení",
              "detail": "Vymezit pilot a ověřit chybové scénáře."
            }
          ],
          "cta": "Popsat problém e-shopu"
        }
      },
      "contact": {
        "title": "Kontakt MrSeo.tech: SEO, Google Ads a vývoj webu",
        "description": "Popište web, cílový trh a problém, který potřebujete vyřešit.",
        "eyebrow": "KONTAKT / POPTÁVKA",
        "headline": "Co brání <em>růstu vaší firmy?</em>",
        "lead": "Pošlete adresu webu a konkrétní příklad nefungujícího procesu. Začneme tím, co lze ověřit. Uveďte e-shopové řešení, reklamní kanály a konkrétní problém. Neposílejte přihlašovací údaje.",
        "problems": [],
        "outcomes": [],
        "faq": []
      },
      "privacy": {
        "title": "Soukromí a kontaktní poptávky",
        "description": "Jak MrSeo.tech nakládá s údaji zaslanými kontaktním formulářem.",
        "eyebrow": "Soukromí",
        "headline": "Soukromí a kontaktní poptávky",
        "lead": "Jak MrSeo.tech nakládá s údaji zaslanými kontaktním formulářem.",
        "problems": [],
        "outcomes": [],
        "faq": []
      }
    },
    "privacy": [
      "Soukromí a kontaktní poptávky",
      "Jak MrSeo.tech nakládá s údaji zaslanými kontaktním formulářem.",
      "Předané údaje",
      "Jméno, e-mail, nepovinný web a zpráva. Dočasné technické údaje slouží k omezení spamu.",
      "Účel",
      "Údaje používáme k odpovědi na poptávku a případnému jednání o spolupráci.",
      "Předání",
      "Zprávy chodí na hello@mrseo.tech a jsou přeposílány do pracovního e-mailu UKR.NET. Hosting a e-mailoví poskytovatelé údaje technicky zpracovávají.",
      "Uchování",
      "Korespondenci uchováváme po dobu nezbytnou k vyřízení žádosti a případným právním povinnostem; přesnou dobu stanovíme před veřejným spuštěním.",
      "Práva a kontakt",
      "Podle příslušných zákonů můžete požádat o přístup, opravu nebo výmaz na hello@mrseo.tech. Ověřená právní identita správce bude uvedena před spuštěním.",
      "Odesláním formuláře předáváte údaje za účelem odpovědi. Podrobnosti:"
    ],
    "market": {
      "heading": "PPC a SEO audit pro české e-shopy",
      "description": "U českých obchodů má smysl prověřit Shoptet, Heureku, Zboží.cz a Sklik, pokud je obchod skutečně používá. Nezaměňujeme je s Google Ads a netvrdíme, že jsme oficiálním partnerem těchto služeb.",
      "cta": "Popsat problém e-shopu",
      "brief": "Uveďte e-shopové řešení, reklamní kanály a konkrétní problém. Neposílejte přihlašovací údaje.",
      "portfolioLabel": "Ukázky projektů (anglicky)"
    }
  }
}
MRSEO_EU_JSON;
 return $data=json_decode($json,true,512,JSON_THROW_ON_ERROR);
}
function mrseo_eu_market($lang=null){
 $lang=$lang?:mrseo_locale();
 return mrseo_eu_all()[$lang]??null;
}
function mrseo_eu_page($lang=null,$slug=null){
 $locale=mrseo_eu_market($lang);
 $slug=$slug===null?mrseo_slug():$slug;
 return $locale['pages'][$slug]??null;
}
function mrseo_eu_privacy_copy($lang=null){
 $locale=mrseo_eu_market($lang);
 if(!$locale)return null;
 $p=$locale['privacy'];
 return array('title'=>$p[0],'desc'=>$p[1],'lead'=>$p[1],
 'sections'=>array(array($p[2],$p[3]),array($p[4],$p[5]),
 array($p[6],$p[7]),array($p[8],$p[9]),array($p[10],$p[11])),
 'label'=>$locale['nav'][6],'form'=>$p[12],'cta'=>$locale['nav'][4]);
}
