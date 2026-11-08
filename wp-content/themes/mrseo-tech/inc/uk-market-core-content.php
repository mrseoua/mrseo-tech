<?php
if(!defined('ABSPATH'))exit;
function mrseo_uk_core_data(){
 static $data=null;
 if($data===null){
  $raw=<<<'MRSEO_UK_CORE'
{
  "seo": {
    "title": "SEO Services for UK Businesses | MrSeo.tech",
    "desc": "Technical SEO and organic search for UK firms: indexing, service pages, search intent and priorities for attracting relevant enquiries.",
    "kicker": "SEO SERVICES · UK",
    "hero": [
      "Customers are searching.",
      "Can they find your business?"
    ],
    "lead": "We investigate search demand, technical barriers and service pages before recommending SEO work. Every change should have a purpose and a way to check it.",
    "focus": "Organic search needs useful pages, not just SEO reports.",
    "problems": [
      [
        "Important pages are not indexed",
        "A key service page may be blocked, redirected or pointing to the wrong canonical URL.",
        "Check the affected URLs against Search Console, page settings and internal links before agreeing fixes."
      ],
      [
        "The website attracts the wrong searches",
        "Visitors arrive from searches that do not match the service or area you cover.",
        "Compare real search queries with the pages they reach and identify which service pages need improving."
      ],
      [
        "SEO activity has no clear priorities",
        "Tasks pile up without any link to the pages and enquiries that matter.",
        "Rank work by customer demand and impact, and agree what will be checked after each change."
      ]
    ],
    "process": [
      [
        "Review demand and site data",
        "Review real search queries, priority services and available enquiry data."
      ],
      [
        "Check technical accessibility",
        "Inspect the affected page templates, indexing rules and internal links."
      ],
      [
        "Map useful landing pages",
        "Match valuable searches to useful pages and agree the changes required."
      ],
      [
        "Test and review improvements",
        "Check completed changes against relevant visibility and enquiry signals."
      ]
    ],
    "outcomes": [
      [
        "Prioritised SEO plan",
        "A page-by-page priority list explaining what needs attention and why."
      ],
      [
        "Developer-ready technical tasks",
        "Specific URL, template and internal-linking tasks for implementation."
      ],
      [
        "Clear visibility and enquiry reporting",
        "Defined measures for checking search visibility and useful enquiries."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "A service firm has visits but few relevant enquiries. We review the search terms, its landing pages and actual enquiry paths.",
      "We inspect the relevant pages, systems and source data.",
      "We check specific changes and their effect against the agreed goal."
    ],
    "faq": [
      [
        "Can you guarantee first-page rankings?",
        "No. Search results depend on competition and Google's systems."
      ],
      [
        "Can you work with WordPress?",
        "Yes, after reviewing the implementation and access."
      ],
      [
        "Does this include ongoing content?",
        "We scope technical and content work separately."
      ]
    ],
    "risk": "We do not guarantee rankings, leads or traffic.",
    "related": [
      [
        "seo-audit",
        "Technical SEO audit",
        "Check indexing and technical issues"
      ],
      [
        "website-design",
        "Website design",
        "Improve your service pages"
      ]
    ],
    "visual": [
      "DEMAND",
      "USEFUL PAGES",
      "ENQUIRIES"
    ],
    "cta": "Discuss SEO",
    "intro": "Organic search needs useful pages, not just SEO reports.",
    "introText": "We investigate search demand, technical barriers and service pages before recommending SEO work. Every change should have a purpose and a way to check it."
  },
  "seo-audit": {
    "title": "Technical SEO Audit for UK Websites | MrSeo.tech",
    "desc": "Technical SEO audit for UK websites: crawlability, indexation, canonical URLs, redirects and prioritised fixes with concrete examples.",
    "kicker": "TECHNICAL SEO AUDIT",
    "hero": [
      "Is Google overlooking key pages?",
      "Find the underlying cause."
    ],
    "lead": "We check crawling, indexing, redirects and page templates, separating confirmed barriers from low-impact scanner warnings.",
    "focus": "An audit should produce a plan, not a pile of alerts.",
    "problems": [
      [
        "Valuable pages are not indexed",
        "Identify what the available evidence shows.",
        "We document causes before suggesting changes."
      ],
      [
        "Filters generate unnecessary URLs",
        "Check how this affects the customer journey.",
        "We align the response with the real search or buying intent."
      ],
      [
        "A migration has broken search visibility",
        "Agree a testable correction or next step.",
        "We set measurable priorities, not unsupported guarantees."
      ]
    ],
    "process": [
      [
        "Agree templates to inspect",
        "Establish the commercial goal and current constraints."
      ],
      [
        "Crawl and compare evidence",
        "Review the relevant accounts, pages and settings."
      ],
      [
        "Identify technical root causes",
        "Agree changes that can be safely implemented."
      ],
      [
        "Prioritise and verify fixes",
        "Validate the outcome and document next steps."
      ]
    ],
    "outcomes": [
      [
        "Evidence-led findings",
        "A clearly defined deliverable for the agreed scope."
      ],
      [
        "Clear developer tasks",
        "Recommendations grounded in the review."
      ],
      [
        "A rechecking plan",
        "A way to check the work and identify limitations."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "A retailer's indexed filter pages outnumber useful categories. We examine canonical rules and links, then retest selected URLs.",
      "We inspect the relevant pages, systems and source data.",
      "We check specific changes and their effect against the agreed goal."
    ],
    "faq": [
      [
        "Does an audit include implementation?",
        "Only if agreed in the scope."
      ],
      [
        "Can you audit large catalogues?",
        "Yes, after defining technical constraints."
      ],
      [
        "Will findings guarantee recovery?",
        "No. Search outcomes are not guaranteed."
      ]
    ],
    "risk": "Not every audit warning explains poor rankings. We distinguish proof from hypotheses.",
    "related": [
      [
        "seo",
        "SEO services",
        "Ongoing SEO support"
      ],
      [
        "ecommerce-seo",
        "Ecommerce SEO",
        "Shop catalogue architecture"
      ]
    ],
    "visual": [
      "CRAWL",
      "DIAGNOSE",
      "FIX PLAN"
    ],
    "cta": "Request an SEO audit",
    "intro": "An audit should produce a plan, not a pile of alerts.",
    "introText": "We check crawling, indexing, redirects and page templates, separating confirmed barriers from low-impact scanner warnings."
  },
  "ecommerce-seo": {
    "title": "Ecommerce SEO for UK Online Shops | MrSeo.tech",
    "desc": "Ecommerce SEO for UK retailers: category structure, faceted navigation, indexation, product pages and valuable commercial searches.",
    "kicker": "ECOMMERCE SEO",
    "hero": [
      "Thousands of products.",
      "But can shoppers find them?"
    ],
    "lead": "We plan indexable categories and product pages around genuine buying searches, avoiding duplicate filter combinations that offer little value.",
    "focus": "Useful category pages matter more than URL volume.",
    "problems": [
      [
        "Product categories have poor visibility",
        "Identify what the available evidence shows.",
        "We document causes before suggesting changes."
      ],
      [
        "Filters create duplicate URLs",
        "Check how this affects the customer journey.",
        "We align the response with the real search or buying intent."
      ],
      [
        "Variants and products disappear from search",
        "Agree a testable correction or next step.",
        "We set measurable priorities, not unsupported guarantees."
      ]
    ],
    "process": [
      [
        "Research product search demand",
        "Establish the commercial goal and current constraints."
      ],
      [
        "Map category and filter architecture",
        "Review the relevant accounts, pages and settings."
      ],
      [
        "Improve indexation and linking",
        "Agree changes that can be safely implemented."
      ],
      [
        "Review commercial search performance",
        "Validate the outcome and document next steps."
      ]
    ],
    "outcomes": [
      [
        "A search-led catalogue map",
        "A clearly defined deliverable for the agreed scope."
      ],
      [
        "Technical indexing priorities",
        "Recommendations grounded in the review."
      ],
      [
        "Transparent measurement",
        "A way to check the work and identify limitations."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "A shop has thousands of faceted URLs but weak category visibility. We identify valuable page types and unnecessary duplicates.",
      "We inspect the relevant pages, systems and source data.",
      "We check specific changes and their effect against the agreed goal."
    ],
    "faq": [
      [
        "Can you work with Shopify and WooCommerce?",
        "We assess each platform's available settings first."
      ],
      [
        "Should every filter be indexable?",
        "No, only where it meets a real user need."
      ],
      [
        "How quickly will traffic grow?",
        "There is no reliable fixed timetable."
      ]
    ],
    "risk": "Search visibility and sales depend on demand, price and competition as well as technical SEO.",
    "related": [
      [
        "online-shop-development",
        "Ecommerce development",
        "Improve the shop itself"
      ],
      [
        "google-shopping",
        "Google Shopping",
        "Paid product discovery"
      ]
    ],
    "visual": [
      "CATEGORIES",
      "INDEXATION",
      "PRODUCTS"
    ],
    "cta": "Review ecommerce SEO",
    "intro": "Useful category pages matter more than URL volume.",
    "introText": "We plan indexable categories and product pages around genuine buying searches, avoiding duplicate filter combinations that offer little value."
  },
  "google-ads": {
    "title": "Google Ads Management & PPC Services UK | MrSeo.tech",
    "desc": "Google Ads and PPC support for UK services and online shops: Search, Shopping, Performance Max, conversion quality and accountable advertising budgets.",
    "kicker": "GOOGLE ADS · PPC",
    "hero": [
      "Paying for clicks.",
      "Are they becoming useful enquiries?"
    ],
    "lead": "We plan campaigns around qualified enquiries or real orders, review tracking quality and manage changes against agreed business goals.",
    "focus": "Good PPC decisions need more than clicks and impressions.",
    "problems": [
      [
        "Clicks arrive but no enquiries follow",
        "People click an advert but the offer or contact form does not answer their needs.",
        "Compare search terms, advert messages and landing pages; remove irrelevant traffic where justified."
      ],
      [
        "Conversions don't match real orders",
        "A single form or purchase may be counted twice, or the reported amount may be wrong.",
        "Run test enquiries or orders and compare them with the conversions recorded in Google Ads."
      ],
      [
        "Budgets lack commercial priorities",
        "Spend can drift towards broad searches or low-value products.",
        "Review costs against genuine enquiries and orders, then agree budget priorities."
      ]
    ],
    "process": [
      [
        "Agree lead or sales objectives",
        "Agree the valuable enquiry or confirmed sale and the available budget."
      ],
      [
        "Check conversion measurement",
        "Test conversion events and correct verified tracking faults in scope."
      ],
      [
        "Structure and launch campaigns",
        "Set up relevant campaigns, adverts, targeting and landing-page links."
      ],
      [
        "Review queries, spend and results",
        "Review actual searches, spend and outcomes, documenting changes."
      ]
    ],
    "outcomes": [
      [
        "Clear campaign structure",
        "A campaign structure and targeting plan linked to the agreed business goal."
      ],
      [
        "More credible conversion data",
        "Tested key conversions with any remaining tracking gaps documented."
      ],
      [
        "Transparent optimisation decisions",
        "A practical review of spend, enquiries or orders and next actions."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "A local trades business receives clicks but few qualified calls. We check search terms, landing pages and tracked call events.",
      "We inspect the relevant pages, systems and source data.",
      "We check specific changes and their effect against the agreed goal."
    ],
    "faq": [
      [
        "Do you run campaigns for service firms?",
        "Yes, we focus on useful enquiries."
      ],
      [
        "Do you support Shopping and PMax?",
        "Yes, when appropriate for the products and available data."
      ],
      [
        "Does management include ad spend?",
        "Budgets and fees are agreed separately."
      ]
    ],
    "risk": "We do not guarantee a particular cost per lead, ROAS or sales volume.",
    "related": [
      [
        "google-ads-audit",
        "Google Ads audit",
        "Review existing campaigns"
      ],
      [
        "analytics",
        "Conversion tracking",
        "Verify the data behind bidding"
      ]
    ],
    "visual": [
      "SEARCH",
      "PPC",
      "ENQUIRIES"
    ],
    "cta": "Discuss PPC",
    "intro": "Good PPC decisions need more than clicks and impressions.",
    "introText": "We plan campaigns around qualified enquiries or real orders, review tracking quality and manage changes against agreed business goals."
  },
  "performance-max": {
    "title": "Performance Max Campaign Support UK | MrSeo.tech",
    "desc": "Performance Max reviews for UK retailers: Merchant Center feed quality, purchase measurement, product grouping and controlled campaign tests.",
    "kicker": "PERFORMANCE MAX",
    "hero": [
      "Performance Max is automated.",
      "Are its signals accurate?"
    ],
    "lead": "We inspect product eligibility, purchase values and campaign structure before changing an automated bidding strategy.",
    "focus": "Automation cannot compensate for misleading data.",
    "problems": [
      [
        "Revenue in Ads differs from orders",
        "Identify what the available evidence shows.",
        "We document causes before suggesting changes."
      ],
      [
        "Product groups have different margins",
        "Check how this affects the customer journey.",
        "We align the response with the real search or buying intent."
      ],
      [
        "Frequent changes hide what's working",
        "Agree a testable correction or next step.",
        "We set measurable priorities, not unsupported guarantees."
      ]
    ],
    "process": [
      [
        "Verify purchase events",
        "Establish the commercial goal and current constraints."
      ],
      [
        "Review product feeds",
        "Review the relevant accounts, pages and settings."
      ],
      [
        "Assess grouping and goals",
        "Agree changes that can be safely implemented."
      ],
      [
        "Run measurable tests",
        "Validate the outcome and document next steps."
      ]
    ],
    "outcomes": [
      [
        "Measurement corrections",
        "A clearly defined deliverable for the agreed scope."
      ],
      [
        "Product feed priorities",
        "Recommendations grounded in the review."
      ],
      [
        "A controlled test plan",
        "A way to check the work and identify limitations."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "Campaign revenue rises without a matching change in orders. We inspect transaction tracking and conversion imports before testing bids.",
      "We inspect the relevant pages, systems and source data.",
      "We check specific changes and their effect against the agreed goal."
    ],
    "faq": [
      [
        "Must every product be in one campaign?",
        "No, this depends on data and economics."
      ],
      [
        "Do you guarantee target ROAS?",
        "No, this depends on factors outside the campaign."
      ],
      [
        "Does PMax replace Merchant Center maintenance?",
        "No, product eligibility still matters."
      ]
    ],
    "risk": "Automatic bidding does not guarantee profitable growth or control of every auction.",
    "related": [
      [
        "google-shopping",
        "Google Shopping",
        "Product campaign strategy"
      ],
      [
        "google-ads-audit",
        "Google Ads audit",
        "Check campaign and conversion quality"
      ]
    ],
    "visual": [
      "FEED",
      "SIGNALS",
      "TEST"
    ],
    "cta": "Review PMax",
    "intro": "Automation cannot compensate for misleading data.",
    "introText": "We inspect product eligibility, purchase values and campaign structure before changing an automated bidding strategy."
  },
  "analytics": {
    "title": "GA4 & Conversion Tracking for UK Businesses | MrSeo.tech",
    "desc": "GA4 and Google Tag Manager support: audit enquiry tracking, purchases, duplicated conversions and business reporting for UK companies.",
    "kicker": "GA4 & MARKETING ANALYTICS",
    "hero": [
      "Your reports have plenty of figures.",
      "Can you trust them?"
    ],
    "lead": "We check how actions are captured and whether Google Ads, GA4 and business systems are describing the same outcomes.",
    "focus": "Reliable tracking comes before meaningful dashboards.",
    "problems": [
      [
        "Leads are counted more than once",
        "Identify what the available evidence shows.",
        "We document causes before suggesting changes."
      ],
      [
        "Order values don't match sales records",
        "Check how this affects the customer journey.",
        "We align the response with the real search or buying intent."
      ],
      [
        "Reports cannot explain commercial results",
        "Agree a testable correction or next step.",
        "We set measurable priorities, not unsupported guarantees."
      ]
    ],
    "process": [
      [
        "Define meaningful outcomes",
        "Establish the commercial goal and current constraints."
      ],
      [
        "Test site and advertising tags",
        "Review the relevant accounts, pages and settings."
      ],
      [
        "Fix verified tracking faults",
        "Agree changes that can be safely implemented."
      ],
      [
        "Reconcile and report limitations",
        "Validate the outcome and document next steps."
      ]
    ],
    "outcomes": [
      [
        "Clear event definitions",
        "A clearly defined deliverable for the agreed scope."
      ],
      [
        "Verified tracking improvements",
        "Recommendations grounded in the review."
      ],
      [
        "Usable business reporting",
        "A way to check the work and identify limitations."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "Ads shows more purchases than the shop. We investigate duplicate events, transaction identifiers and attribution differences.",
      "We inspect the relevant pages, systems and source data.",
      "We check specific changes and their effect against the agreed goal."
    ],
    "faq": [
      [
        "Do you use Google Tag Manager?",
        "Yes, we review and test existing tags."
      ],
      [
        "Can tracking be fully complete?",
        "Consent and browser restrictions create limits."
      ],
      [
        "Can you build dashboards?",
        "Yes, after agreeing useful metrics."
      ]
    ],
    "risk": "We respect user consent and do not promise 100% measurement coverage.",
    "related": [
      [
        "google-ads-audit",
        "PPC audit",
        "Assess campaigns using validated data"
      ],
      [
        "seo",
        "SEO services",
        "Understand organic customer journeys"
      ]
    ],
    "visual": [
      "EVENTS",
      "CHECKS",
      "DECISIONS"
    ],
    "cta": "Check my analytics",
    "intro": "Reliable tracking comes before meaningful dashboards.",
    "introText": "We check how actions are captured and whether Google Ads, GA4 and business systems are describing the same outcomes."
  },
  "service-websites": {
    "title": "Lead Generation Websites for UK Service Firms | MrSeo.tech",
    "desc": "Improve service websites for UK businesses: clearer offers, helpful service pages, mobile enquiry forms and conversion-focused structure.",
    "kicker": "SERVICE BUSINESS WEBSITES",
    "hero": [
      "Visitors reach your service pages.",
      "What stops them getting in touch?"
    ],
    "lead": "We improve the enquiry journey for professional services and trades, from clear offers to easier mobile forms and relevant landing pages.",
    "focus": "A service website should make the next step obvious.",
    "problems": [
      [
        "Different services are hidden on one page",
        "Identify what the available evidence shows.",
        "We document causes before suggesting changes."
      ],
      [
        "Contact is difficult on mobile",
        "Check how this affects the customer journey.",
        "We align the response with the real search or buying intent."
      ],
      [
        "Advertising sends visitors to irrelevant pages",
        "Agree a testable correction or next step.",
        "We set measurable priorities, not unsupported guarantees."
      ]
    ],
    "process": [
      [
        "Review actual enquiries",
        "Establish the commercial goal and current constraints."
      ],
      [
        "Map service offers",
        "Review the relevant accounts, pages and settings."
      ],
      [
        "Improve pages and forms",
        "Agree changes that can be safely implemented."
      ],
      [
        "Test enquiries and measure",
        "Validate the outcome and document next steps."
      ]
    ],
    "outcomes": [
      [
        "Clearer service propositions",
        "A clearly defined deliverable for the agreed scope."
      ],
      [
        "Simpler contact journey",
        "Recommendations grounded in the review."
      ],
      [
        "A plan for further SEO and PPC",
        "A way to check the work and identify limitations."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "A trades website lists every service on one generic page. We organise the key offers and test whether enquiries reach the right team.",
      "We inspect the relevant pages, systems and source data.",
      "We check specific changes and their effect against the agreed goal."
    ],
    "faq": [
      [
        "Do you build entirely new sites?",
        "Yes, see our website design service."
      ],
      [
        "Is ongoing SEO included?",
        "We agree SEO separately."
      ],
      [
        "Can you guarantee more calls?",
        "No. Demand and competition matter."
      ]
    ],
    "risk": "Improved usability cannot guarantee more enquiries without suitable demand.",
    "related": [
      [
        "website-design",
        "Website design",
        "Create or redesign a site"
      ],
      [
        "seo",
        "SEO services",
        "Help customers discover your services"
      ]
    ],
    "visual": [
      "SERVICES",
      "TRUST",
      "ENQUIRY"
    ],
    "cta": "Improve my website",
    "intro": "A service website should make the next step obvious.",
    "introText": "We improve the enquiry journey for professional services and trades, from clear offers to easier mobile forms and relevant landing pages."
  }
}
MRSEO_UK_CORE;
  $data=json_decode($raw,true,512,JSON_THROW_ON_ERROR);
 }
 return $data;
}
