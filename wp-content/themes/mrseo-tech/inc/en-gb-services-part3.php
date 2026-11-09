<?php
/** Five UK-specific platform, automation and bespoke web services. */
if(!defined('ABSPATH'))exit;
function mrseo_en_gb_part3(){static $data=null;if($data!==null)return $data;
 $raw=<<<'MRSEO_GB_PART3'
{
  "website-speed-security": {
    "title": "Website Speed, Security and Accessibility",
    "kicker": "WEBSITE PERFORMANCE AND SECURITY",
    "scene": "speed-security",
    "headline": [
      "Pages are slow or difficult to use.",
      "Which technical problems matter most?"
    ],
    "lead": "A slow page, exposed software or inaccessible contact form can prevent customers using your site. We measure the symptoms, identify causes we can verify and agree safe fixes before touching production.",
    "pains": [
      [
        "Key pages take too long to load",
        "Heavy assets, scripts or hosting bottlenecks make it harder to reach important information."
      ],
      [
        "Updates and access may create risk",
        "Outdated components, poor user permissions or unclear backups complicate safe maintenance."
      ],
      [
        "Not everyone can complete a task",
        "Low contrast, confusing focus order or small controls can block a contact or purchase journey."
      ]
    ],
    "sectionTitle": "Improve the foundations. <em>Keep the experience reliable.</em>",
    "benefits": [
      [
        "Measure real page and workflow issues",
        "Review relevant performance metrics, page templates and key interaction steps."
      ],
      [
        "Agree safe changes and rollback",
        "Prioritise updates, access protections and backup checks within an approved scope."
      ],
      [
        "Verify speed and accessibility again",
        "Compare measurements and check contact, navigation and purchase actions."
      ]
    ],
    "result": "A measured improvement plan and evidence of agreed speed, security and accessibility corrections.",
    "faq": [
      [
        "Can you promise a perfect performance score?",
        "No. Performance varies by hosting, third-party services, content and visitors' devices."
      ],
      [
        "Will you perform live attacks or penetration testing?",
        "No unauthorised tests. Any security assessment must have clear scope, access permission and safe methods."
      ],
      [
        "Does the whole website need rebuilding?",
        "Not necessarily. We identify specific issues before recommending major changes."
      ]
    ],
    "ctaTitle": "Is your website slower or less reliable than it should be? <em>Show us the problem.</em>",
    "ctaLead": "Share the URL and the issues you've noticed; we'll discuss a safe diagnostic scope.",
    "related": [
      [
        "wordpress-care",
        "WordPress maintenance"
      ],
      [
        "seo-audit",
        "Technical SEO audit"
      ]
    ],
    "foot": "Load time · Protection · Access",
    "description": "Website speed, security and accessibility reviews for UK businesses: measured problems, safe fixes and tested key user journeys.",
    "button": "Review website issues",
    "scenelabel": "Illustrative website speed, security and accessibility workflow, not client performance data"
  },
  "woocommerce-shopify-stores": {
    "title": "WooCommerce and Shopify Store Development",
    "kicker": "WOOCOMMERCE & SHOPIFY DEVELOPMENT",
    "scene": "shop-platforms",
    "headline": [
      "Choosing WooCommerce or Shopify?",
      "Build for your catalogue, not a trend."
    ],
    "lead": "Both platforms can support online retail, but their editing, integration and operating models differ. We review product structure, fulfilment, payment requirements and ongoing maintenance before proposing a build.",
    "pains": [
      [
        "The platform decision is based on popularity",
        "Real catalogue, staff and integration needs have not been compared."
      ],
      [
        "Products and variants are hard to manage",
        "Options, stock or pricing rules become confusing as the shop grows."
      ],
      [
        "Checkout or fulfilment creates manual work",
        "Orders, delivery updates and stock changes need a clearer workflow."
      ]
    ],
    "sectionTitle": "Choose the right platform. <em>Make daily operations manageable.</em>",
    "benefits": [
      [
        "Review platform fit before committing",
        "Compare catalogue complexity, editing, payment, tax and delivery requirements."
      ],
      [
        "Build agreed shop templates and flows",
        "Implement useful product, basket and checkout journeys within the chosen platform."
      ],
      [
        "Test orders and administration",
        "Verify representative products, checkout, notifications and the staff editing experience."
      ]
    ],
    "result": "A scoped WooCommerce or Shopify store build with tested buying and administration workflows.",
    "faq": [
      [
        "Will you always recommend Shopify?",
        "No. We compare the requirements and explain relevant platform constraints before choosing."
      ],
      [
        "Can you migrate an existing shop?",
        "Yes, after separately planning data fields, URLs, integrations and cutover."
      ],
      [
        "Are platform subscriptions included?",
        "External platform, app, payment and hosting charges are scoped transparently and separately."
      ]
    ],
    "ctaTitle": "Need a WooCommerce or Shopify build? <em>Start with your products and processes.</em>",
    "ctaLead": "Share catalogue size, current system, fulfilment model and the features you require.",
    "related": [
      [
        "online-shop-development",
        "E-commerce website development"
      ],
      [
        "store-migration",
        "Store migration"
      ]
    ],
    "foot": "Products · Platform · Checkout",
    "description": "WooCommerce and Shopify development for UK retailers: catalogue design, integrations, mobile checkout and verified store workflows.",
    "button": "Discuss an online shop",
    "scenelabel": "Illustrative woocommerce and shopify store development workflow, not client performance data"
  },
  "catalog-automation": {
    "title": "E-commerce Catalogue Automation",
    "kicker": "PRODUCT FEEDS & STOCK AUTOMATION",
    "scene": "catalog-automation",
    "headline": [
      "Your products change every day.",
      "Why is the team still updating them by hand?"
    ],
    "lead": "Large catalogues often need reliable stock, price and product-data updates across suppliers, the website and marketing feeds. We map the source of truth, agree update rules and test them with real sample products.",
    "pains": [
      [
        "Availability differs between systems",
        "A product may show as in stock when the underlying source has changed."
      ],
      [
        "Prices or variants get copied incorrectly",
        "Manual spreadsheets and mismatched identifiers create avoidable errors."
      ],
      [
        "Merchant Center keeps rejecting items",
        "Required attributes, landing-page data or feeds may be inconsistent."
      ]
    ],
    "sectionTitle": "Make product data consistent. <em>Reduce repetitive updates.</em>",
    "benefits": [
      [
        "Map the catalogue data flow",
        "Identify source fields, product IDs, variants and the systems that use them."
      ],
      [
        "Build controlled update rules",
        "Agree feed transforms, stock and price mapping, validation and exception handling."
      ],
      [
        "Test with representative products",
        "Compare incoming and published data, log discrepancies and verify agreed corrections."
      ]
    ],
    "result": "A documented catalogue update process with tested product mapping and repeatable exception checks.",
    "faq": [
      [
        "Can this work with multiple suppliers?",
        "Potentially. We assess their export formats, identifiers and update schedules first."
      ],
      [
        "Will automation solve every Merchant Center warning?",
        "No. Some warnings relate to site behaviour, policy or account issues outside feed formatting."
      ],
      [
        "Can we keep manual approval for exceptions?",
        "Yes, if the platform and data flow support a reviewed exception process."
      ]
    ],
    "ctaTitle": "Spending too long on stock or price updates? <em>Show us how the data moves.</em>",
    "ctaLead": "Tell us which platforms and suppliers are involved, and share example fields without credentials.",
    "related": [
      [
        "merchant-center-help",
        "Merchant Center support"
      ],
      [
        "online-shop-development",
        "E-commerce development"
      ]
    ],
    "foot": "Suppliers · Catalogue · Feed",
    "description": "E-commerce catalogue automation: supplier feeds, stock and price mapping, Merchant Center attributes and tested product updates.",
    "button": "Review catalogue updates",
    "scenelabel": "Illustrative e-commerce catalogue automation workflow, not client performance data"
  },
  "api-integrations": {
    "title": "API Integrations and Business Automation",
    "kicker": "BUSINESS SYSTEM INTEGRATIONS",
    "scene": "api-integrations",
    "headline": [
      "The same data is entered twice.",
      "Could your systems exchange it safely?"
    ],
    "lead": "Orders, enquiries and status updates often move manually between a website, CRM and fulfilment tools. We define what needs to travel, when it should happen and what to do if a system fails.",
    "pains": [
      [
        "Staff copy information between tools",
        "Manual transfer creates delays and inconsistent customer or order details."
      ],
      [
        "The CRM misses website enquiries",
        "A form may succeed for the visitor without creating a usable record for the team."
      ],
      [
        "Failed updates go unnoticed",
        "Integrations lack useful errors, retries or an audit trail."
      ]
    ],
    "sectionTitle": "Connect the workflow. <em>Keep failures visible and recoverable.</em>",
    "benefits": [
      [
        "Map inputs, destinations and permissions",
        "Document fields, API access and business rules before writing an integration."
      ],
      [
        "Implement agreed transfers safely",
        "Validate data, use suitable authentication and define retry/error behaviour."
      ],
      [
        "Test real scenarios and exceptions",
        "Check a sample enquiry or order, duplicates and a controlled failure path."
      ]
    ],
    "result": "An agreed API integration with verified data exchange, error handling and a clear handover.",
    "faq": [
      [
        "Can you connect any software?",
        "Only where suitable APIs, permissions and technical access are available; we assess this first."
      ],
      [
        "Will the integration store customer information?",
        "We minimise data handling and define access and retention within the approved design."
      ],
      [
        "What happens if an API is offline?",
        "We agree safe retry, alert and manual recovery behaviour for the integration."
      ]
    ],
    "ctaTitle": "Too much copying between systems? <em>Describe the hand-off that fails.</em>",
    "ctaLead": "List the systems and an example record that currently needs manual transfer.",
    "related": [
      [
        "web-development",
        "Bespoke web development"
      ],
      [
        "catalog-automation",
        "Catalogue automation"
      ]
    ],
    "foot": "API · CRM · Workflow",
    "description": "API integrations for UK businesses: connect websites, CRMs and order systems with verified data flows, controlled errors and handover.",
    "button": "Discuss an API integration",
    "scenelabel": "Illustrative api integrations and business automation workflow, not client performance data"
  },
  "web-applications": {
    "title": "Bespoke Web Applications and MVP Development",
    "kicker": "WEB APPLICATIONS & MVP",
    "scene": "web-applications",
    "headline": [
      "Spreadsheets are running the business.",
      "Would a purpose-built tool work better?"
    ],
    "lead": "When teams manage complex workflows through email and spreadsheets, a focused web application may be more useful than another brochure site. We define users, permissions and one working process before proposing a larger platform.",
    "pains": [
      [
        "Business tasks are spread across tools",
        "The same information is copied through spreadsheets, inboxes and forms."
      ],
      [
        "Teams cannot see a shared status",
        "Customers or colleagues need updates that are difficult to provide consistently."
      ],
      [
        "A large platform is being planned without proof",
        "It is unclear which workflow should be tested first or what an MVP must actually do."
      ]
    ],
    "sectionTitle": "Start with one useful workflow. <em>Build complexity only when needed.</em>",
    "benefits": [
      [
        "Define roles and a first usable task",
        "Agree users, permissions, actions and what counts as a completed task."
      ],
      [
        "Build a scoped MVP or application module",
        "Implement agreed screens, validations and essential data flows."
      ],
      [
        "Test the task with representative users",
        "Verify permissions, important actions, errors and a usable handover."
      ]
    ],
    "result": "A scoped web application or MVP delivering one verified workflow, with documented roles and next-stage priorities.",
    "faq": [
      [
        "Is an MVP a complete enterprise system?",
        "No. An MVP is deliberately limited to the first useful and testable workflow."
      ],
      [
        "Can the app connect to our CRM?",
        "Potentially, subject to the CRM's API, access and the agreed data model."
      ],
      [
        "Can you guarantee a commercial outcome?",
        "No. We verify the specified product behaviour, not market demand or business revenue."
      ]
    ],
    "ctaTitle": "Have an internal process that needs its own tool? <em>Show us one real task.</em>",
    "ctaLead": "Describe who uses the system, what they do and which information is needed.",
    "related": [
      [
        "web-development",
        "Full-stack web development"
      ],
      [
        "api-integrations",
        "API integrations"
      ]
    ],
    "foot": "Users · Workflow · MVP",
    "description": "Bespoke web applications and MVPs for UK businesses: roles, portals, workflows, integrations and tested practical functionality.",
    "button": "Plan a web application",
    "scenelabel": "Illustrative bespoke web applications and mvp development workflow, not client performance data"
  },
  "ga4-conversions": {
    "title": "GA4 Conversion Tracking and Event Setup",
    "kicker": "GOOGLE ANALYTICS 4 · CONVERSIONS",
    "scene": "ga4-conversions",
    "headline": [
      "A form is submitted or an order is placed.",
      "Does GA4 record it correctly?"
    ],
    "lead": "Reliable marketing reports need trustworthy events. We test the actual enquiry or checkout journey, inspect GA4 and Google Tag Manager, identify duplicates and fix confirmed measurement faults within an agreed scope.",
    "pains": [
      [
        "One enquiry is counted more than once",
        "A tag may fire on both a button click and a confirmed submission.",
        "Test the event and define the real success state before changing it."
      ],
      [
        "Order totals differ from the shop",
        "Missing IDs, incorrect values, currency settings or duplicates can distort purchase events.",
        "Compare real test orders with GA4 and Google Ads records."
      ],
      [
        "Data disappears at the important step",
        "Consent or checkout behaviour can prevent events being recorded in some circumstances.",
        "Document the actual gap and choose an appropriate compliant measurement approach."
      ]
    ],
    "sectionTitle": "Test the real action. <em>Record it accurately where possible.</em>",
    "benefits": [
      [
        "Define valuable conversions",
        "Agree which forms, purchases and business actions should generate each event."
      ],
      [
        "Inspect and correct event implementation",
        "Review tags, identifiers, amounts and firing conditions in the agreed setup."
      ],
      [
        "Verify on the actual site",
        "Perform controlled test actions, check duplicates and document any known limits."
      ]
    ],
    "result": "Tested GA4 conversion events for agreed forms or purchases, with documented values, duplicate checks and remaining limitations.",
    "faq": [
      [
        "Is this the same as a marketing dashboard?",
        "No. This service fixes the underlying event measurement. Business reporting and channel analysis are separate."
      ],
      [
        "Can tracking cover every visitor?",
        "No. Consent choices, browsers and technical constraints can limit measurement."
      ],
      [
        "Can Google Ads use these events?",
        "Where appropriate, we review import settings and the agreed conversion actions."
      ]
    ],
    "ctaTitle": "Not confident in GA4 conversions? <em>Check a real action.</em>",
    "ctaLead": "Tell us which form or checkout event is uncertain and what reports currently disagree.",
    "related": [
      [
        "analytics",
        "Marketing analytics"
      ],
      [
        "google-ads",
        "Google Ads management"
      ]
    ],
    "foot": "Event · Value · Verification",
    "description": "GA4 conversion tracking for UK businesses: test lead and purchase events, identify duplicates, verify transaction values and document limits.",
    "button": "Review GA4 tracking",
    "scenelabel": "Illustrative GA4 event verification journey, not real client data"
  }
}
MRSEO_GB_PART3;
 return $data=json_decode($raw,true,512,JSON_THROW_ON_ERROR);
}
