<?php
if(!defined('ABSPATH'))exit;
/** Germany-market website, development and e-commerce content. */
function mrseo_de_service_part2(){return json_decode(<<<'MRSEO_DE_P2'
{
  "catalog-automation": {
    "title": "Automatisierung von Produktkatalogen | MrSeo.tech",
    "description": "Wir planen sichere Datenflüsse zwischen Lieferanten, Tabellen und Onlineshop. Eindeutige Artikelnummern, Prüfregeln und ein Rückweg bei Fehlern sind wichtiger a",
    "kicker": "AUTOMATISIERUNG VON PRODUKTKATALOGEN",
    "hero": [
      "Preise und Bestände werden manuell gepflegt.",
      "Wie vermeiden Sie fehlerhafte Shopdaten?"
    ],
    "lead": "Wir planen sichere Datenflüsse zwischen Lieferanten, Tabellen und Onlineshop. Eindeutige Artikelnummern, Prüfregeln und ein Rückweg bei Fehlern sind wichtiger als ein vollmundiges Automatisierungsversprechen.",
    "intro": "Verfügbarkeit ist widersprüchlich – Preise müssen mehrfach geändert werden",
    "introText": "Lieferant und Shop melden verschiedene Bestände. Wir definieren die maßgebliche Datenquelle und Aktualisierungsregeln.",
    "problems": [
      [
        "Verfügbarkeit ist widersprüchlich",
        "Lieferant und Shop melden verschiedene Bestände.",
        "Wir definieren die maßgebliche Datenquelle und Aktualisierungsregeln."
      ],
      [
        "Preise müssen mehrfach geändert werden",
        "Manuelle Eingaben erzeugen abweichende Produktpreise.",
        "Wir prüfen Preisfelder, Formate und Grenzfälle."
      ],
      [
        "Import überschreibt Varianten",
        "Fehlerhafte Zuordnung kann Artikeldaten beschädigen.",
        "Wir testen Produkt-IDs und Varianten zuerst an einer Teilmenge."
      ]
    ],
    "process": [
      [
        "Datenquellen und SKU prüfen",
        "Wir definieren die maßgebliche Datenquelle und Aktualisierungsregeln."
      ],
      [
        "Abgleichs- und Fehlerregeln festlegen",
        "Wir prüfen Preisfelder, Formate und Grenzfälle."
      ],
      [
        "Probeimport mit wenigen Produkten ausführen",
        "Wir testen Produkt-IDs und Varianten zuerst an einer Teilmenge."
      ],
      [
        "Änderungsprotokoll und Rücknahme testen",
        "Wir prüfen ausgewählte SKU vor und nach dem Import und dokumentieren Abweichungen."
      ]
    ],
    "outcomes": [
      [
        "Datenfluss mit eindeutiger Feldzuordnung",
        "Wir definieren die maßgebliche Datenquelle und Aktualisierungsregeln."
      ],
      [
        "Geprüfte Synchronisationsregeln",
        "Wir prüfen Preisfelder, Formate und Grenzfälle."
      ],
      [
        "Kontrollierter Testimport",
        "Wir testen Produkt-IDs und Varianten zuerst an einer Teilmenge."
      ]
    ],
    "example": [
      "BEISPIELHAFTE SITUATION",
      "Lieferant und Shop melden verschiedene Bestände.",
      "Wir definieren die maßgebliche Datenquelle und Aktualisierungsregeln.",
      "Ein Preisupdate wird korrekt übernommen, ohne eine andere Variante zu überschreiben."
    ],
    "faq": [
      [
        "Funktioniert jede Shopplattform mit einem automatischen Import?",
        "Nein. API, Export und Zugriffsrechte begrenzen die Möglichkeiten."
      ],
      [
        "Werden Bestände in Echtzeit aktualisiert?",
        "Nur wenn Datenquelle, Schnittstelle und vereinbartes Intervall das erlauben."
      ],
      [
        "Kann ein fehlerhafter Import rückgängig gemacht werden?",
        "Das hängt von Sicherungen, Protokollen und der Shopplattform ab."
      ]
    ],
    "risk": "Das hängt von Sicherungen, Protokollen und der Shopplattform ab. Umfang und Abnahmebedingungen werden vor Beginn schriftlich festgelegt.",
    "related": [
      [
        "api-integrations",
        "API-Integrationen",
        "CRM und Shopdaten sicher verbinden"
      ],
      [
        "online-shop-development",
        "Onlineshop-Erstellung",
        "Katalog und Checkout sauber planen"
      ]
    ],
    "visual": [
      "DATENQUELLE",
      "SYNC",
      "KATALOG"
    ],
    "cta": "Katalogautomatisierung prüfen"
  },
  "store-migration": {
    "title": "Onlineshop-Migration und Relaunch | MrSeo.tech",
    "description": "Wir bereiten Produktdaten, Varianten, Integrationen und URL-Weiterleitungen vor. Eine Migration beginnt mit einer Bestandsaufnahme und endet erst nach kontrolli",
    "kicker": "ONLINESHOP-MIGRATION UND RELAUNCH",
    "hero": [
      "Der Shop muss die Plattform wechseln.",
      "Wie bleiben Produkte und Suchzugriffe erhalten?"
    ],
    "lead": "Wir bereiten Produktdaten, Varianten, Integrationen und URL-Weiterleitungen vor. Eine Migration beginnt mit einer Bestandsaufnahme und endet erst nach kontrollierten Testkäufen.",
    "intro": "Alte Produktlinks enden auf 404 – Varianten fehlen nach dem Import",
    "introText": "Google und Kunden finden bisherige Artikel nicht mehr. Wir erstellen eine Mapping-Liste und 301-Weiterleitungen.",
    "problems": [
      [
        "Alte Produktlinks enden auf 404",
        "Google und Kunden finden bisherige Artikel nicht mehr.",
        "Wir erstellen eine Mapping-Liste und 301-Weiterleitungen."
      ],
      [
        "Varianten fehlen nach dem Import",
        "Feldzuordnungen oder Artikel-IDs sind unvollständig.",
        "Wir vergleichen Testimporte mit dem Originalkatalog."
      ],
      [
        "Bestellungen gehen nicht weiter",
        "Schnittstellen zu Versand und Warenwirtschaft wurden übersehen.",
        "Wir prüfen einen vollständigen Bestellablauf."
      ]
    ],
    "process": [
      [
        "Bestehende URLs und Artikel erfassen",
        "Wir erstellen eine Mapping-Liste und 301-Weiterleitungen."
      ],
      [
        "Daten- und Weiterleitungsplan erstellen",
        "Wir vergleichen Testimporte mit dem Originalkatalog."
      ],
      [
        "Probeimport durchführen und Abweichungen beheben",
        "Wir prüfen einen vollständigen Bestellablauf."
      ],
      [
        "Umschaltung und Bestellfluss kontrollieren",
        "Wir testen die priorisierten 301-Weiterleitungen sowie Kauf und Bestellübertragung."
      ]
    ],
    "outcomes": [
      [
        "Zuordnung alter und neuer Shop-URLs",
        "Wir erstellen eine Mapping-Liste und 301-Weiterleitungen."
      ],
      [
        "Protokoll geprüfter Produkte und Varianten",
        "Wir vergleichen Testimporte mit dem Originalkatalog."
      ],
      [
        "Plan für Go-live und Rückfall",
        "Wir prüfen einen vollständigen Bestellablauf."
      ]
    ],
    "example": [
      "BEISPIELHAFTE SITUATION",
      "Google und Kunden finden bisherige Artikel nicht mehr.",
      "Wir erstellen eine Mapping-Liste und 301-Weiterleitungen.",
      "Ein alter Produktlink führt zur richtigen neuen Seite statt zu einem 404-Fehler."
    ],
    "faq": [
      [
        "Lassen sich alle alten URLs erhalten?",
        "Nicht zwingend; wir sichern die wichtigsten Wege mit konkreten 301-Weiterleitungen."
      ],
      [
        "Ist für die Migration eine Downtime nötig?",
        "Das hängt vom System und dem Umschaltverfahren ab."
      ],
      [
        "Übernehmen Sie alte Bestellungen?",
        "Der mögliche Umfang hängt von Exportformaten und rechtlichen Anforderungen ab."
      ]
    ],
    "risk": "Der mögliche Umfang hängt von Exportformaten und rechtlichen Anforderungen ab. Umfang und Abnahmebedingungen werden vor Beginn schriftlich festgelegt.",
    "related": [
      [
        "online-shop-development",
        "Onlineshop-Erstellung",
        "Katalog und Checkout sauber planen"
      ],
      [
        "website-redesign",
        "Website-Relaunch",
        "Bestehende Seiten kontrolliert modernisieren"
      ]
    ],
    "visual": [
      "ALTER SHOP",
      "MIGRATION",
      "NEUER SHOP"
    ],
    "cta": "Shopumzug planen"
  },
  "website-design": {
    "title": "Webdesign und Website-Erstellung | MrSeo.tech",
    "description": "Wir entwickeln eine Website ausgehend von Angebot, Zielgruppe und Kontaktweg. Layout, Texte und Technik müssen verständlich zusammenarbeiten und auf Smartphones",
    "kicker": "WEBDESIGN UND WEBSITE-ERSTELLUNG",
    "hero": [
      "Eine schöne Website allein reicht nicht.",
      "Was soll sie für Ihr Unternehmen leisten?"
    ],
    "lead": "Wir entwickeln eine Website ausgehend von Angebot, Zielgruppe und Kontaktweg. Layout, Texte und Technik müssen verständlich zusammenarbeiten und auf Smartphones funktionieren.",
    "intro": "Angebot wird nicht verstanden – Mobile Darstellung ist unübersichtlich",
    "introText": "Die wichtigsten Leistungen stehen hinter vagen Werbesätzen. Wir entwickeln eine klare Informationsstruktur.",
    "problems": [
      [
        "Angebot wird nicht verstanden",
        "Die wichtigsten Leistungen stehen hinter vagen Werbesätzen.",
        "Wir entwickeln eine klare Informationsstruktur."
      ],
      [
        "Mobile Darstellung ist unübersichtlich",
        "Kleine Schrift und überlappende Bereiche erschweren die Nutzung.",
        "Wir prüfen responsive Ansichten und Lesbarkeit."
      ],
      [
        "Anfragen kommen nicht an",
        "Formulare und Kontaktbuttons sind falsch eingerichtet.",
        "Wir testen die gesamte Anfrage inklusive Zustellung."
      ]
    ],
    "process": [
      [
        "Ziele und Zielgruppen dokumentieren",
        "Wir entwickeln eine klare Informationsstruktur."
      ],
      [
        "Seitenstruktur und Entwürfe abstimmen",
        "Wir prüfen responsive Ansichten und Lesbarkeit."
      ],
      [
        "Responsive Website und Inhalte umsetzen",
        "Wir testen die gesamte Anfrage inklusive Zustellung."
      ],
      [
        "Formulare, Links und Technik abnehmen",
        "Wir prüfen alle vereinbarten Seitentypen und senden eine echte Formular-Testnachricht."
      ]
    ],
    "outcomes": [
      [
        "Struktur und Design der Website",
        "Wir entwickeln eine klare Informationsstruktur."
      ],
      [
        "Mobil nutzbare Leistungsseiten",
        "Wir prüfen responsive Ansichten und Lesbarkeit."
      ],
      [
        "Überprüfter Kontaktweg",
        "Wir testen die gesamte Anfrage inklusive Zustellung."
      ]
    ],
    "example": [
      "BEISPIELHAFTE SITUATION",
      "Die wichtigsten Leistungen stehen hinter vagen Werbesätzen.",
      "Wir entwickeln eine klare Informationsstruktur.",
      "Ein mobiler Besucher versteht das Angebot und kann erfolgreich Kontakt aufnehmen."
    ],
    "faq": [
      [
        "Ist Suchmaschinenoptimierung inklusive?",
        "Technische Grundlagen werden berücksichtigt; fortlaufendes SEO ist separat."
      ],
      [
        "Können Sie Texte erstellen?",
        "Ja, auf Grundlage überprüfter Angaben zu Leistungen und Unternehmen."
      ],
      [
        "Wie lange dauert die Entwicklung?",
        "Der Aufwand richtet sich nach Umfang, Inhalten und Integrationen."
      ]
    ],
    "risk": "Der Aufwand richtet sich nach Umfang, Inhalten und Integrationen. Umfang und Abnahmebedingungen werden vor Beginn schriftlich festgelegt.",
    "related": [
      [
        "service-websites",
        "Websites für Dienstleister",
        "Leistungsseiten für Kundenanfragen"
      ],
      [
        "landing-pages",
        "Landingpages für Anzeigen",
        "Passende Zielseiten für Werbung"
      ]
    ],
    "visual": [
      "STRUKTUR",
      "DESIGN",
      "KONTAKT"
    ],
    "cta": "Website-Konzept besprechen"
  },
  "service-websites": {
    "title": "Websites für Dienstleister | MrSeo.tech",
    "description": "Wir gestalten Seiten für unterschiedliche Dienstleistungen mit klaren Leistungen, nachvollziehbaren Abläufen und einfachen Anfragewegen. Die Erstellung einer ne",
    "kicker": "WEBSITES FÜR DIENSTLEISTER",
    "hero": [
      "Ihre Leistung braucht Vertrauen.",
      "Erklärt Ihre Website den Nutzen verständlich?"
    ],
    "lead": "Wir gestalten Seiten für unterschiedliche Dienstleistungen mit klaren Leistungen, nachvollziehbaren Abläufen und einfachen Anfragewegen. Die Erstellung einer neuen Website ist nicht dasselbe wie die SEO-Betreuung bestehender Seiten.",
    "intro": "Alle Dienstleistungen sind zusammengefasst – Wichtige Antworten fehlen",
    "introText": "Interessenten erkennen Unterschiede und Umfang nicht. Wir strukturieren einzelne Leistungsseiten.",
    "problems": [
      [
        "Alle Dienstleistungen sind zusammengefasst",
        "Interessenten erkennen Unterschiede und Umfang nicht.",
        "Wir strukturieren einzelne Leistungsseiten."
      ],
      [
        "Wichtige Antworten fehlen",
        "Vorgehen, Voraussetzungen und Kontakt sind unklar.",
        "Wir planen verständliche Inhalte und Fragen."
      ],
      [
        "Kontakt ist auf Mobilgeräten versteckt",
        "Nutzer finden weder Telefonnummer noch Formular.",
        "Wir verbessern die mobile Kontaktstrecke."
      ]
    ],
    "process": [
      [
        "Leistungsangebot und Kundenfragen aufnehmen",
        "Wir strukturieren einzelne Leistungsseiten."
      ],
      [
        "Seitenstruktur und Navigation entwickeln",
        "Wir planen verständliche Inhalte und Fragen."
      ],
      [
        "Mobile Seiten mit konkreten Leistungen gestalten",
        "Wir verbessern die mobile Kontaktstrecke."
      ],
      [
        "Kontakt und technische Grundlagen testen",
        "Wir suchen jede Leistung in Navigation und interner Verlinkung und testen die Anfrage."
      ]
    ],
    "outcomes": [
      [
        "Eigene Seiten für relevante Dienstleistungen",
        "Wir strukturieren einzelne Leistungsseiten."
      ],
      [
        "Verständliche Darstellung von Leistungen",
        "Wir planen verständliche Inhalte und Fragen."
      ],
      [
        "Geprüfte mobile Anfragefunktion",
        "Wir verbessern die mobile Kontaktstrecke."
      ]
    ],
    "example": [
      "BEISPIELHAFTE SITUATION",
      "Interessenten erkennen Unterschiede und Umfang nicht.",
      "Wir strukturieren einzelne Leistungsseiten.",
      "Ein Nutzer erreicht die spezifische Dienstleistung und versendet die passende Anfrage."
    ],
    "faq": [
      [
        "Ist jede Leistung eine eigene Seite wert?",
        "Nur wenn Kunden tatsächlich eigenständige Informationen benötigen."
      ],
      [
        "Können wir die Seite später erweitern?",
        "Ja, die Informationsstruktur wird mit sinnvollen Erweiterungen geplant."
      ],
      [
        "Ist Google Ads bereits Teil des Auftrags?",
        "Kampagnenmanagement wird bei Bedarf separat vereinbart."
      ]
    ],
    "risk": "Kampagnenmanagement wird bei Bedarf separat vereinbart. Umfang und Abnahmebedingungen werden vor Beginn schriftlich festgelegt.",
    "related": [
      [
        "service-business-seo",
        "SEO für Dienstleister",
        "Dienstleistungen verständlich auffindbar machen"
      ],
      [
        "website-design",
        "Website-Erstellung",
        "Website mit klarer Nutzerführung bauen"
      ]
    ],
    "visual": [
      "LEISTUNG",
      "SEITE",
      "KONTAKT"
    ],
    "cta": "Dienstleister-Website planen"
  },
  "landing-pages": {
    "title": "Landingpages für Google Ads | MrSeo.tech",
    "description": "Wir bauen Landingpages passend zur konkreten Suchabsicht und zur Werbebotschaft. Ein klarer nächster Schritt, mobile Bedienbarkeit und überprüfbare Anfragen hab",
    "kicker": "LANDINGPAGES FÜR GOOGLE ADS",
    "hero": [
      "Ihre Anzeige erhält Klicks.",
      "Aber niemand sendet das Formular ab?"
    ],
    "lead": "Wir bauen Landingpages passend zur konkreten Suchabsicht und zur Werbebotschaft. Ein klarer nächster Schritt, mobile Bedienbarkeit und überprüfbare Anfragen haben Vorrang.",
    "intro": "Anzeige und Zielseite passen nicht – Formular fordert zu viel",
    "introText": "Die beworbene Leistung ist nach dem Klick schwer zu erkennen. Wir stimmen Überschrift und Angebot auf die Kampagne ab.",
    "problems": [
      [
        "Anzeige und Zielseite passen nicht",
        "Die beworbene Leistung ist nach dem Klick schwer zu erkennen.",
        "Wir stimmen Überschrift und Angebot auf die Kampagne ab."
      ],
      [
        "Formular fordert zu viel",
        "Zu viele Felder oder technische Fehler verhindern Anfragen.",
        "Wir vereinfachen Eingaben und testen Pflichtfelder."
      ],
      [
        "Leads werden nicht erfasst",
        "Tracking zählt Klicks, aber keine bestätigten Anfragen.",
        "Wir prüfen die Ereignisse und eine Testzustellung."
      ]
    ],
    "process": [
      [
        "Werbeversprechen und Zielgruppe bestimmen",
        "Wir stimmen Überschrift und Angebot auf die Kampagne ab."
      ],
      [
        "Klaren Seitenaufbau und Kontaktweg entwerfen",
        "Wir vereinfachen Eingaben und testen Pflichtfelder."
      ],
      [
        "Landingpage mobil umsetzen",
        "Wir prüfen die Ereignisse und eine Testzustellung."
      ],
      [
        "Formular und Conversion-Tracking testen",
        "Wir senden eine Testanfrage und prüfen den Eingang sowie das definierte Conversion-Ereignis."
      ]
    ],
    "outcomes": [
      [
        "Passende Werbebotschaft auf der Zielseite",
        "Wir stimmen Überschrift und Angebot auf die Kampagne ab."
      ],
      [
        "Einfaches geprüftes Anfrageformular",
        "Wir vereinfachen Eingaben und testen Pflichtfelder."
      ],
      [
        "Validierte Lead-Erfassung",
        "Wir prüfen die Ereignisse und eine Testzustellung."
      ]
    ],
    "example": [
      "BEISPIELHAFTE SITUATION",
      "Die beworbene Leistung ist nach dem Klick schwer zu erkennen.",
      "Wir stimmen Überschrift und Angebot auf die Kampagne ab.",
      "Eine Anzeige führt auf die passende Zielseite und ein Lead erreicht die richtige Stelle."
    ],
    "faq": [
      [
        "Brauchen wir eine eigene Domain?",
        "Nicht zwingend. Eine passende Unterseite kann ausreichen."
      ],
      [
        "Erstellen Sie auch Anzeigen?",
        "Google Ads kann als gesonderte Leistung vereinbart werden."
      ],
      [
        "Garantieren Sie eine Conversion-Rate?",
        "Nein. Das Ergebnis hängt von Angebot, Traffic und Markt ab."
      ]
    ],
    "risk": "Nein. Das Ergebnis hängt von Angebot, Traffic und Markt ab. Umfang und Abnahmebedingungen werden vor Beginn schriftlich festgelegt.",
    "related": [
      [
        "google-ads",
        "Google Ads",
        "Kampagnen und Kosten gezielt prüfen"
      ],
      [
        "local-google-ads",
        "Lokale Google Ads",
        "Anfragen aus dem Einsatzgebiet erreichen"
      ]
    ],
    "visual": [
      "ANZEIGE",
      "ANGEBOT",
      "LEAD"
    ],
    "cta": "Landingpage verbessern"
  },
  "corporate-websites": {
    "title": "Unternehmenswebsites und Corporate Design | MrSeo.tech",
    "description": "Wir strukturieren Unternehmensbereiche, Leistungen und Ansprechpartner für unterschiedliche Zielgruppen. Teams sollen Inhalte pflegen können, ohne jedes Mal Ent",
    "kicker": "UNTERNEHMENSWEBSITES UND CORPORATE DESIGN",
    "hero": [
      "Ihr Unternehmen wächst.",
      "Spiegelt die Website das noch wider?"
    ],
    "lead": "Wir strukturieren Unternehmensbereiche, Leistungen und Ansprechpartner für unterschiedliche Zielgruppen. Teams sollen Inhalte pflegen können, ohne jedes Mal Entwicklung beauftragen zu müssen.",
    "intro": "Kunden und Partner finden nichts – Inhalte lassen sich nicht aktualisieren",
    "introText": "Unterschiedliche Zielgruppen sehen dieselbe ungeordnete Navigation. Wir entwickeln getrennte Informationswege.",
    "problems": [
      [
        "Kunden und Partner finden nichts",
        "Unterschiedliche Zielgruppen sehen dieselbe ungeordnete Navigation.",
        "Wir entwickeln getrennte Informationswege."
      ],
      [
        "Inhalte lassen sich nicht aktualisieren",
        "Das CMS ist unübersichtlich oder die Rechte fehlen.",
        "Wir planen nachvollziehbare Bearbeitungsbereiche."
      ],
      [
        "Sprachversionen widersprechen sich",
        "Leistungen und Kontaktdaten passen nicht zu den Zielmärkten.",
        "Wir prüfen echte Inhalte und Sprachentsprechungen."
      ]
    ],
    "process": [
      [
        "Geschäftsbereiche und Zielgruppen klären",
        "Wir entwickeln getrennte Informationswege."
      ],
      [
        "Menü und Inhaltsarchitektur gestalten",
        "Wir planen nachvollziehbare Bearbeitungsbereiche."
      ],
      [
        "CMS-Vorlagen und Rollen umsetzen",
        "Wir prüfen echte Inhalte und Sprachentsprechungen."
      ],
      [
        "Kontakt, Sprache und Mobilansicht prüfen",
        "Wir prüfen Rollen, Navigationswege und die Erreichbarkeit aller relevanten Kontaktbereiche."
      ]
    ],
    "outcomes": [
      [
        "Übersichtliche Unternehmensstruktur",
        "Wir entwickeln getrennte Informationswege."
      ],
      [
        "Redaktionell pflegbare Seiten",
        "Wir planen nachvollziehbare Bearbeitungsbereiche."
      ],
      [
        "Geprüfte Sprach- und Kontaktwege",
        "Wir prüfen echte Inhalte und Sprachentsprechungen."
      ]
    ],
    "example": [
      "BEISPIELHAFTE SITUATION",
      "Unterschiedliche Zielgruppen sehen dieselbe ungeordnete Navigation.",
      "Wir entwickeln getrennte Informationswege.",
      "Ein Partner findet seine Informationen und die verantwortliche Kontaktadresse."
    ],
    "faq": [
      [
        "Eignet sich WordPress für eine Firmenwebsite?",
        "Oft ja; die Anforderungen an Rollen, Pflege und Integrationen entscheiden."
      ],
      [
        "Können bestehende Inhalte übernommen werden?",
        "Nach Inhaltsprüfung und URL-Mapping ist eine Migration möglich."
      ],
      [
        "Sind mehrere Sprachen möglich?",
        "Ja, mit vollständig gepflegten und technisch korrekt zugeordneten Versionen."
      ]
    ],
    "risk": "Ja, mit vollständig gepflegten und technisch korrekt zugeordneten Versionen. Umfang und Abnahmebedingungen werden vor Beginn schriftlich festgelegt.",
    "related": [
      [
        "website-design",
        "Website-Erstellung",
        "Website mit klarer Nutzerführung bauen"
      ],
      [
        "international-seo",
        "Internationales SEO",
        "Sprachversionen und Länder sauber zuordnen"
      ]
    ],
    "visual": [
      "UNTERNEHMEN",
      "INHALTE",
      "KONTAKT"
    ],
    "cta": "Unternehmenswebsite planen"
  },
  "website-redesign": {
    "title": "Website-Relaunch und Redesign | MrSeo.tech",
    "description": "Wir modernisieren Design und Nutzung ohne funktionierende Seiten, SEO-URLs oder Kontaktwege leichtfertig aufzugeben. Vor dem Umbau dokumentieren wir die Ausgang",
    "kicker": "WEBSITE-RELAUNCH UND REDESIGN",
    "hero": [
      "Die Website wirkt veraltet.",
      "Aber was muss wirklich verbessert werden?"
    ],
    "lead": "Wir modernisieren Design und Nutzung ohne funktionierende Seiten, SEO-URLs oder Kontaktwege leichtfertig aufzugeben. Vor dem Umbau dokumentieren wir die Ausgangslage.",
    "intro": "Texte sind auf dem Handy kaum lesbar – Bestehende SEO-Seiten verschwinden",
    "introText": "Abstände, Schriftgrößen oder Elemente überlagern sich. Wir testen mobile Ansichten und wichtige Interaktionen.",
    "problems": [
      [
        "Texte sind auf dem Handy kaum lesbar",
        "Abstände, Schriftgrößen oder Elemente überlagern sich.",
        "Wir testen mobile Ansichten und wichtige Interaktionen."
      ],
      [
        "Bestehende SEO-Seiten verschwinden",
        "Neue Navigation und URLs ersetzen alte Inhalte unbedacht.",
        "Wir kartieren wichtige Seiten und Weiterleitungen."
      ],
      [
        "Nach dem Relaunch fehlen Leads",
        "Formulare oder Tracking werden beim Umbau verändert.",
        "Wir prüfen Testanfragen und Ereignisse vor der Freigabe."
      ]
    ],
    "process": [
      [
        "Aktuellen Zustand dokumentieren",
        "Wir testen mobile Ansichten und wichtige Interaktionen."
      ],
      [
        "Prioritäten und responsive Entwürfe abstimmen",
        "Wir kartieren wichtige Seiten und Weiterleitungen."
      ],
      [
        "Design und Seitenstruktur umbauen",
        "Wir prüfen Testanfragen und Ereignisse vor der Freigabe."
      ],
      [
        "URLs, Formulare und Tracking gegenprüfen",
        "Wir vergleichen wichtige URLs, Mobilansichten und Formularzustellung vor und nach dem Umbau."
      ]
    ],
    "outcomes": [
      [
        "Lesbarer neuer Seitenaufbau",
        "Wir testen mobile Ansichten und wichtige Interaktionen."
      ],
      [
        "Plan für Erhalt und Weiterleitung von URLs",
        "Wir kartieren wichtige Seiten und Weiterleitungen."
      ],
      [
        "Prüfprotokoll wichtiger Funktionen",
        "Wir prüfen Testanfragen und Ereignisse vor der Freigabe."
      ]
    ],
    "example": [
      "BEISPIELHAFTE SITUATION",
      "Abstände, Schriftgrößen oder Elemente überlagern sich.",
      "Wir testen mobile Ansichten und wichtige Interaktionen.",
      "Eine zuvor wichtige Leistungsseite bleibt über ihre URL oder eine korrekte Weiterleitung erreichbar."
    ],
    "faq": [
      [
        "Lohnt sich ein reines Designupdate?",
        "Nur, wenn Inhalt, Struktur und Technik die Geschäftsziele bereits unterstützen."
      ],
      [
        "Verlieren wir durch den Relaunch Rankings?",
        "Risiken lassen sich reduzieren, aber nicht pauschal ausschließen."
      ],
      [
        "Bleibt die Website während der Arbeiten erreichbar?",
        "Ein separater Testbereich ermöglicht meist eine kontrollierte Freigabe."
      ]
    ],
    "risk": "Ein separater Testbereich ermöglicht meist eine kontrollierte Freigabe. Umfang und Abnahmebedingungen werden vor Beginn schriftlich festgelegt.",
    "related": [
      [
        "website-speed-security",
        "Performance & Sicherheit",
        "Ladezeiten und Zugriffsrisiken prüfen"
      ],
      [
        "website-design",
        "Website-Erstellung",
        "Website mit klarer Nutzerführung bauen"
      ]
    ],
    "visual": [
      "ALT",
      "REDESIGN",
      "TEST"
    ],
    "cta": "Relaunch sicher planen"
  },
  "wordpress-care": {
    "title": "WordPress Wartung und Betreuung | MrSeo.tech",
    "description": "Wir prüfen Updates, Sicherungen, Benutzerrechte und die wichtigsten Website-Funktionen. Wartung ist nicht nur ein Klick auf Aktualisieren, sondern kontrollierte",
    "kicker": "WORDPRESS WARTUNG UND BETREUUNG",
    "hero": [
      "WordPress muss aktuell bleiben.",
      "Wer behält Sicherheit und Funktion im Blick?"
    ],
    "lead": "Wir prüfen Updates, Sicherungen, Benutzerrechte und die wichtigsten Website-Funktionen. Wartung ist nicht nur ein Klick auf Aktualisieren, sondern kontrolliertes Ändern und Testen.",
    "intro": "Updates verursachen Konflikte – Sicherungen sind unklar",
    "introText": "Theme und Plugins können sich gegenseitig beeinflussen. Wir testen Änderungen soweit möglich auf einer Testumgebung.",
    "problems": [
      [
        "Updates verursachen Konflikte",
        "Theme und Plugins können sich gegenseitig beeinflussen.",
        "Wir testen Änderungen soweit möglich auf einer Testumgebung."
      ],
      [
        "Sicherungen sind unklar",
        "Ein Backup hilft nur, wenn eine Wiederherstellung möglich ist.",
        "Wir prüfen Sicherungsumfang und Wiederherstellungsweg."
      ],
      [
        "Formulare fallen unbemerkt aus",
        "Besucher können schreiben, aber niemand erhält die Nachricht.",
        "Wir kontrollieren zentrale Kontaktfunktionen."
      ]
    ],
    "process": [
      [
        "WordPress und Erweiterungen inventarisieren",
        "Wir testen Änderungen soweit möglich auf einer Testumgebung."
      ],
      [
        "Risiken, Zugriffe und Backup prüfen",
        "Wir prüfen Sicherungsumfang und Wiederherstellungsweg."
      ],
      [
        "Vereinbarte Updates kontrolliert einspielen",
        "Wir kontrollieren zentrale Kontaktfunktionen."
      ],
      [
        "Website und Formulare anschließend testen",
        "Wir protokollieren geprüfte Updates und kontrollieren die wichtigsten Funktionen nach der Änderung."
      ]
    ],
    "outcomes": [
      [
        "Aktualisierungs- und Risikoübersicht",
        "Wir testen Änderungen soweit möglich auf einer Testumgebung."
      ],
      [
        "Dokumentierter Sicherungsweg",
        "Wir prüfen Sicherungsumfang und Wiederherstellungsweg."
      ],
      [
        "Kontrolle zentraler Funktionen",
        "Wir kontrollieren zentrale Kontaktfunktionen."
      ]
    ],
    "example": [
      "BEISPIELHAFTE SITUATION",
      "Theme und Plugins können sich gegenseitig beeinflussen.",
      "Wir testen Änderungen soweit möglich auf einer Testumgebung.",
      "Nach einem Plugin-Update funktionieren Kontaktformular und zentrale Seiten weiterhin."
    ],
    "faq": [
      [
        "Übernehmen Sie die komplette Serveradministration?",
        "Nur wenn Hosting und vereinbarter Leistungsumfang dies zulassen."
      ],
      [
        "Sind Updates immer risikofrei?",
        "Nein. Deshalb sind Sicherung und Tests wichtig."
      ],
      [
        "Kann ein gehacktes System bereinigt werden?",
        "Der Umfang ist erst nach Analyse und Prüfung möglicher Sicherungen festlegbar."
      ]
    ],
    "risk": "Der Umfang ist erst nach Analyse und Prüfung möglicher Sicherungen festlegbar. Umfang und Abnahmebedingungen werden vor Beginn schriftlich festgelegt.",
    "related": [
      [
        "website-speed-security",
        "Performance & Sicherheit",
        "Ladezeiten und Zugriffsrisiken prüfen"
      ],
      [
        "website-redesign",
        "Website-Relaunch",
        "Bestehende Seiten kontrolliert modernisieren"
      ]
    ],
    "visual": [
      "BACKUP",
      "UPDATE",
      "TEST"
    ],
    "cta": "WordPress prüfen lassen"
  },
  "api-integrations": {
    "title": "API- und CRM-Integrationen | MrSeo.tech",
    "description": "Wir verbinden Formulare, Shops, CRM und interne Werkzeuge über geeignete Schnittstellen. Dabei prüfen wir Berechtigungen, eindeutige IDs, Fehlerbehandlung und n",
    "kicker": "API- UND CRM-INTEGRATIONEN",
    "hero": [
      "Daten werden ständig kopiert.",
      "Warum sprechen Ihre Systeme nicht miteinander?"
    ],
    "lead": "Wir verbinden Formulare, Shops, CRM und interne Werkzeuge über geeignete Schnittstellen. Dabei prüfen wir Berechtigungen, eindeutige IDs, Fehlerbehandlung und nachvollziehbare Protokolle.",
    "intro": "Anfragen gehen zwischen Systemen verloren – Bestellungen werden doppelt angelegt",
    "introText": "Ein Formular zeigt Erfolg, aber der Lead fehlt im CRM. Wir prüfen API-Antworten und Fehlerprotokolle.",
    "problems": [
      [
        "Anfragen gehen zwischen Systemen verloren",
        "Ein Formular zeigt Erfolg, aber der Lead fehlt im CRM.",
        "Wir prüfen API-Antworten und Fehlerprotokolle."
      ],
      [
        "Bestellungen werden doppelt angelegt",
        "Wiederholte Übertragungen haben keine eindeutige Zuordnung.",
        "Wir planen Idempotenz und Identifikationsregeln."
      ],
      [
        "Verbindungen fallen unbemerkt aus",
        "Fehlende Warnungen und Wiederholungslogik verhindern Kontrolle.",
        "Wir definieren Monitoring und sichere Wiederholungen."
      ]
    ],
    "process": [
      [
        "Datenquellen und API-Zugänge prüfen",
        "Wir prüfen API-Antworten und Fehlerprotokolle."
      ],
      [
        "Felder und Ereignisse zuordnen",
        "Wir planen Idempotenz und Identifikationsregeln."
      ],
      [
        "Integration mit Fehlerfällen implementieren",
        "Wir definieren Monitoring und sichere Wiederholungen."
      ],
      [
        "Testlead und Duplikatkontrolle durchführen",
        "Wir prüfen einen Testdatensatz inklusive Fehlerantwort und Schutz vor doppelter Übertragung."
      ]
    ],
    "outcomes": [
      [
        "Spezifikation des Datenflusses",
        "Wir prüfen API-Antworten und Fehlerprotokolle."
      ],
      [
        "Nachvollziehbare Fehlerbehandlung",
        "Wir planen Idempotenz und Identifikationsregeln."
      ],
      [
        "Geprüfte CRM-Übergabe",
        "Wir definieren Monitoring und sichere Wiederholungen."
      ]
    ],
    "example": [
      "BEISPIELHAFTE SITUATION",
      "Ein Formular zeigt Erfolg, aber der Lead fehlt im CRM.",
      "Wir prüfen API-Antworten und Fehlerprotokolle.",
      "Ein Formular-Lead erscheint genau einmal im CRM und ist anhand seiner ID auffindbar."
    ],
    "faq": [
      [
        "Geht das ohne offizielle API?",
        "Wir prüfen erlaubte Alternativen, versprechen aber keinen unerlaubten Zugriff."
      ],
      [
        "Brauchen wir einen eigenen Server?",
        "Das hängt von Ereignisvolumen und Integrationsarchitektur ab."
      ],
      [
        "Wie schützen Sie Kundendaten?",
        "Mit minimalen Berechtigungen und einer datenschutzgerechten Ausgestaltung des konkreten Vorhabens."
      ]
    ],
    "risk": "Mit minimalen Berechtigungen und einer datenschutzgerechten Ausgestaltung des konkreten Vorhabens. Umfang und Abnahmebedingungen werden vor Beginn schriftlich festgelegt.",
    "related": [
      [
        "catalog-automation",
        "Katalogautomatisierung",
        "Produktdaten kontrolliert synchronisieren"
      ],
      [
        "web-applications",
        "Webanwendungen",
        "Geschäftsprozesse in Anwendungen abbilden"
      ]
    ],
    "visual": [
      "FORMULAR",
      "API / CRM",
      "BESTÄTIGUNG"
    ],
    "cta": "Integration besprechen"
  },
  "website-speed-security": {
    "title": "Website-Performance und Sicherheit | MrSeo.tech",
    "description": "Wir prüfen Seitenressourcen, Ladeverhalten, Berechtigungen und Sicherungsprozesse. Änderungen erfolgen in überprüfbaren Schritten statt mit pauschalen PageSpeed",
    "kicker": "WEBSITE-PERFORMANCE UND SICHERHEIT",
    "hero": [
      "Ihre Seite lädt langsam.",
      "Und Updates fühlen sich riskant an?"
    ],
    "lead": "Wir prüfen Seitenressourcen, Ladeverhalten, Berechtigungen und Sicherungsprozesse. Änderungen erfolgen in überprüfbaren Schritten statt mit pauschalen PageSpeed-Versprechen.",
    "intro": "Bilder und Skripte bremsen – Layout springt beim Laden",
    "introText": "Wichtige Inhalte erscheinen erst spät. Wir messen Ressourcen und kritische Renderpfade.",
    "problems": [
      [
        "Bilder und Skripte bremsen",
        "Wichtige Inhalte erscheinen erst spät.",
        "Wir messen Ressourcen und kritische Renderpfade."
      ],
      [
        "Layout springt beim Laden",
        "Bilder, Schriften oder Widgets haben keinen reservierten Platz.",
        "Wir prüfen sichtbare Verschiebungen auf Mobilgeräten."
      ],
      [
        "Zugriffe und Plugins sind unübersichtlich",
        "Fehlende Kontrolle erhöht das Betriebsrisiko.",
        "Wir dokumentieren Rollen, Aktualisierung und Backup."
      ]
    ],
    "process": [
      [
        "Seitentypen und Engpässe messen",
        "Wir messen Ressourcen und kritische Renderpfade."
      ],
      [
        "Technische Risiken priorisieren",
        "Wir prüfen sichtbare Verschiebungen auf Mobilgeräten."
      ],
      [
        "Kontrollierte Performance- und Sicherheitskorrekturen vornehmen",
        "Wir dokumentieren Rollen, Aktualisierung und Backup."
      ],
      [
        "Funktionen und Messwerte erneut prüfen",
        "Wir vergleichen reale Ladeabläufe und prüfen Zugang, Sicherung sowie Formularfunktion."
      ]
    ],
    "outcomes": [
      [
        "Liste konkreter Ladehindernisse",
        "Wir messen Ressourcen und kritische Renderpfade."
      ],
      [
        "Geordneter Wartungs- und Backupplan",
        "Wir prüfen sichtbare Verschiebungen auf Mobilgeräten."
      ],
      [
        "Messvergleich mit Funktionstests",
        "Wir dokumentieren Rollen, Aktualisierung und Backup."
      ]
    ],
    "example": [
      "BEISPIELHAFTE SITUATION",
      "Wichtige Inhalte erscheinen erst spät.",
      "Wir messen Ressourcen und kritische Renderpfade.",
      "Ein zuvor langsamer Seitentyp wird kontrolliert getestet, ohne den Bestellprozess zu beschädigen."
    ],
    "faq": [
      [
        "Garantieren Sie 100 Punkte in PageSpeed?",
        "Nein. Nutzererlebnis und technische Randbedingungen sind wichtiger."
      ],
      [
        "Muss jede Erweiterung entfernt werden?",
        "Nein. Wir prüfen Nutzen, Wartbarkeit und tatsächliche Risiken."
      ],
      [
        "Kann eine Optimierung etwas beschädigen?",
        "Deshalb sichern und testen wir relevante Änderungen vor dem Livegang."
      ]
    ],
    "risk": "Deshalb sichern und testen wir relevante Änderungen vor dem Livegang. Umfang und Abnahmebedingungen werden vor Beginn schriftlich festgelegt.",
    "related": [
      [
        "wordpress-care",
        "WordPress-Betreuung",
        "Updates und Backups kontrollieren"
      ],
      [
        "website-redesign",
        "Website-Relaunch",
        "Bestehende Seiten kontrolliert modernisieren"
      ]
    ],
    "visual": [
      "MESSUNG",
      "SCHUTZ",
      "KONTROLLE"
    ],
    "cta": "Tempo und Sicherheit prüfen"
  },
  "web-applications": {
    "title": "Webanwendungen und MVP entwickeln | MrSeo.tech",
    "description": "Wir entwickeln Webanwendungen, Kundenportale und MVPs für konkrete Geschäftsprozesse. Der erste Schritt ist ein klarer Kernprozess mit sinnvollen Rollen und Dat",
    "kicker": "WEBANWENDUNGEN UND MVP ENTWICKELN",
    "hero": [
      "Excel reicht nicht mehr aus.",
      "Braucht Ihr Team eine eigene Anwendung?"
    ],
    "lead": "Wir entwickeln Webanwendungen, Kundenportale und MVPs für konkrete Geschäftsprozesse. Der erste Schritt ist ein klarer Kernprozess mit sinnvollen Rollen und Datenzugriffen.",
    "intro": "Mehrere Tabellen zeigen verschiedene Status – Kunden fragen laufend nach Updates",
    "introText": "Teams arbeiten ohne gemeinsame aktuelle Daten. Wir entwerfen einen nachvollziehbaren gemeinsamen Workflow.",
    "problems": [
      [
        "Mehrere Tabellen zeigen verschiedene Status",
        "Teams arbeiten ohne gemeinsame aktuelle Daten.",
        "Wir entwerfen einen nachvollziehbaren gemeinsamen Workflow."
      ],
      [
        "Kunden fragen laufend nach Updates",
        "Es gibt kein Portal für Status und Dokumente.",
        "Wir planen einen passenden Kundenbereich mit Rollen."
      ],
      [
        "Immer neue Funktionen verzögern den Start",
        "Der Funktionsumfang wächst ohne Prioritäten.",
        "Wir trennen notwendiges MVP von späteren Erweiterungen."
      ]
    ],
    "process": [
      [
        "Anwender und Prozess aufnehmen",
        "Wir entwerfen einen nachvollziehbaren gemeinsamen Workflow."
      ],
      [
        "MVP mit Rechten und Datenmodell skizzieren",
        "Wir planen einen passenden Kundenbereich mit Rollen."
      ],
      [
        "Kernablauf und nötige Integrationen entwickeln",
        "Wir trennen notwendiges MVP von späteren Erweiterungen."
      ],
      [
        "Zugriffe, Fehler und echte Nutzung testen",
        "Wir testen den vollständigen Nutzerprozess mit passenden Rollen und Fehlerfällen."
      ]
    ],
    "outcomes": [
      [
        "Abgegrenzter MVP-Funktionsumfang",
        "Wir entwerfen einen nachvollziehbaren gemeinsamen Workflow."
      ],
      [
        "Funktionsfähiger Benutzerablauf",
        "Wir planen einen passenden Kundenbereich mit Rollen."
      ],
      [
        "Plan für weitere Entwicklungsphasen",
        "Wir trennen notwendiges MVP von späteren Erweiterungen."
      ]
    ],
    "example": [
      "BEISPIELHAFTE SITUATION",
      "Teams arbeiten ohne gemeinsame aktuelle Daten.",
      "Wir entwerfen einen nachvollziehbaren gemeinsamen Workflow.",
      "Ein Teammitglied bearbeitet einen Vorgang, während fremde Rollen keinen Zugriff erhalten."
    ],
    "faq": [
      [
        "Kann die Anwendung klein starten?",
        "Ja. Ein begrenztes MVP reduziert das Risiko unbelegter Funktionen."
      ],
      [
        "Lassen sich später CRM-Systeme anbinden?",
        "Wenn dokumentierte Schnittstellen und Berechtigungen verfügbar sind."
      ],
      [
        "Garantieren Sie unbegrenzte Skalierbarkeit?",
        "Nein. Die Architektur richtet sich nach belegten Anforderungen und Wachstumsszenarien."
      ]
    ],
    "risk": "Nein. Die Architektur richtet sich nach belegten Anforderungen und Wachstumsszenarien. Umfang und Abnahmebedingungen werden vor Beginn schriftlich festgelegt.",
    "related": [
      [
        "api-integrations",
        "API-Integrationen",
        "CRM und Shopdaten sicher verbinden"
      ],
      [
        "web-development",
        "Individuelle Webentwicklung",
        "Individuelle Prozesse technisch umsetzen"
      ]
    ],
    "visual": [
      "PROZESS",
      "WEBAPP",
      "ERGEBNIS"
    ],
    "cta": "Webanwendung besprechen"
  }
}
MRSEO_DE_P2
,true,512,JSON_THROW_ON_ERROR);}
