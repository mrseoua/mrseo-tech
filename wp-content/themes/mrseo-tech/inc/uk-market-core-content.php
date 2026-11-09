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
      "We map actual searches to useful service pages and identify unclear offers or missing local pages.",
      "After agreed changes, we review priority page visibility and relevant enquiry signals."
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
    "introText": "If a key service page cannot appear in Google, we check that URL, its offer and how customers reach it before recommending extra content."
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
        "An important URL may have a noindex directive, an incorrect canonical or a broken redirect.",
        "Document the affected page, the evidence and the likely indexing barrier."
      ],
      [
        "Filters generate unnecessary URLs",
        "Filter combinations can generate hundreds of similar pages while useful category pages remain hard to find.",
        "Sample filter URLs and identify which patterns need canonical or indexation rules."
      ],
      [
        "A migration has broken search visibility",
        "A redesign may send old pages to the wrong destination or leave important links broken.",
        "Compare representative old and new URLs and list redirect, canonical and linking faults."
      ]
    ],
    "process": [
      [
        "Agree templates to inspect",
        "Agree the site sections and representative URLs the audit must cover."
      ],
      [
        "Crawl and compare evidence",
        "Inspect crawl and indexing evidence alongside actual page templates."
      ],
      [
        "Identify technical root causes",
        "Separate confirmed technical blockers from low-impact tool warnings."
      ],
      [
        "Prioritise and verify fixes",
        "Deliver a prioritised report and recheck checklist; implementation is scoped separately."
      ]
    ],
    "outcomes": [
      [
        "Evidence-led findings",
        "Findings with example URLs, observed evidence and clear priorities."
      ],
      [
        "Clear developer tasks",
        "Developer-ready instructions describing the intended behaviour."
      ],
      [
        "A rechecking plan",
        "A checklist for verifying corrections after they are implemented."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "A retailer's indexed filter pages outnumber useful categories. We examine canonical rules and links, then retest selected URLs.",
      "We sample category and filtered URLs, inspect canonical rules and record patterns that waste crawling.",
      "The client receives affected URL examples, priority fixes and steps to recheck after implementation."
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
    "introText": "We show precise affected URLs and the reason for each finding. The audit produces evidence and a fix list, not unrequested implementation."
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
        "Useful buying searches have no appropriate category page, or relevant categories are hard to reach.",
        "Map buying terms to clear categories and meaningful internal links."
      ],
      [
        "Filters create duplicate URLs",
        "Many combinations generate near-identical pages with little additional value.",
        "Identify which filters merit landing pages and which need consolidation."
      ],
      [
        "Variants and products disappear from search",
        "Product URLs may have conflicting canonicals, stock data or internal links.",
        "Check representative variants and document page-level fixes."
      ]
    ],
    "process": [
      [
        "Research product search demand",
        "Compare actual buying queries with category and catalogue structure."
      ],
      [
        "Map category and filter architecture",
        "Inspect selected filter patterns, canonicals and internal links."
      ],
      [
        "Improve indexation and linking",
        "Prioritise specific page-template and URL-pattern corrections."
      ],
      [
        "Review commercial search performance",
        "Check relevant category visibility and available order signals."
      ]
    ],
    "outcomes": [
      [
        "A search-led catalogue map",
        "A category and filter landing-page plan tied to buying demand."
      ],
      [
        "Technical indexing priorities",
        "A developer-ready list of affected URLs, canonicals and linking changes."
      ],
      [
        "Transparent measurement",
        "Defined checks for useful search visibility and product enquiries or orders."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "A shop has thousands of faceted URLs but weak category visibility.",
      "We inspect representative filters, category links and canonical behaviour.",
      "We deliver prioritised page-pattern corrections and a verification checklist."
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
      "We review actual search terms and test call tracking to distinguish useful enquiries from irrelevant clicks.",
      "Approved targeting changes are documented and compared with subsequent genuine enquiries."
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
    "introText": "Before changing bids, we check the searches behind clicks and whether tracked calls or form events represent genuine enquiries."
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
        "Purchase values may be duplicated or differ because of attribution.",
        "Compare sample order IDs and values with the campaign records before changing targets."
      ],
      [
        "Product groups have different margins",
        "Reported revenue may conceal major differences in commercial value.",
        "Review product economics and available feed attributes before recommending grouping."
      ],
      [
        "Frequent changes hide what's working",
        "Campaign targets and budgets change before earlier effects can be assessed.",
        "Document recent changes and agree fewer measurable experiments."
      ]
    ],
    "process": [
      [
        "Verify purchase events",
        "Check sample transaction identifiers, values and duplicate behaviour."
      ],
      [
        "Review product feeds",
        "Inspect product eligibility, stock and the attributes used in campaigns."
      ],
      [
        "Assess grouping and goals",
        "Compare catalogue economics and conversion quality with the campaign setup."
      ],
      [
        "Run measurable tests",
        "Agree controlled changes and evaluate them after enough data is available."
      ]
    ],
    "outcomes": [
      [
        "Measurement priorities",
        "A documented list of purchase discrepancies and agreed checks."
      ],
      [
        "Product feed priorities",
        "Specific eligible-product and feed-quality improvements."
      ],
      [
        "A controlled testing plan",
        "Change dates, evaluation measures and known data limitations."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "Ads revenue increases without a matching rise in confirmed orders.",
      "We compare sample orders, product data and recent target changes.",
      "We identify tracking issues and agree a controlled campaign test."
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
    "title": "Marketing Analytics and Reporting for UK Businesses | MrSeo.tech",
    "desc": "Marketing analytics for UK businesses: connect advertising spend, useful enquiries and confirmed orders, with reporting limitations explained.",
    "kicker": "MARKETING ANALYTICS · UK",
    "hero": [
      "You know what the adverts cost.",
      "Which channels bring real business?"
    ],
    "lead": "Clicks alone don't tell you which channels produce useful enquiries or completed orders. We bring the available figures together, explain discrepancies and make reporting understandable. Fixing GA4 events is a separate technical service.",
    "focus": "Connect marketing spend to useful commercial outcomes, not just event counts.",
    "problems": [
      [
        "Ad spend is visible, but outcomes are not",
        "Channels report clicks and form submissions without a clear link to real enquiries or orders.",
        "Agree business outcomes and compare available campaign costs with verified leads and sales."
      ],
      [
        "Marketing reports disagree",
        "Google Ads, GA4 and shop records may count conversions differently.",
        "Reconcile sample records and explain what can reliably be compared."
      ],
      [
        "Dashboards create more questions",
        "Teams see figures without knowing which decisions the data supports.",
        "Design a small report that distinguishes useful results from uncertain measures."
      ]
    ],
    "process": [
      [
        "Agree business definitions",
        "Define useful enquiries, confirmed orders and which sources can support them."
      ],
      [
        "Compare available data",
        "Review channel costs, reporting rules and available business records."
      ],
      [
        "Build a readable view",
        "Show costs and relevant outcomes by channel, with explicit limitations."
      ],
      [
        "Record what is missing",
        "List tracking faults that require a separately agreed GA4 implementation."
      ]
    ],
    "outcomes": [
      [
        "Defined commercial measures",
        "A clear map of meaningful outcomes and their source records."
      ],
      [
        "Channel-level reporting",
        "A usable summary of spending, enquiries and confirmed orders."
      ],
      [
        "Known measurement limitations",
        "An explanation of discrepancies and next tracking priorities."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "Paid clicks rise but completed orders do not.",
      "We compare campaign costs, incoming enquiries and shop records where available.",
      "We define a report and explain gaps that make exact attribution impossible."
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
    "risk": "Reporting accuracy depends on source data, customer consent and attribution differences. We do not promise complete coverage.",
    "related": [
      [
        "ga4-conversions",
        "GA4 conversion tracking",
        "Verify and fix website events"
      ],
      [
        "google-ads",
        "Google Ads management",
        "Make campaign decisions from useful data"
      ]
    ],
    "visual": [
      "Ad spend",
      "Enquiries",
      "Orders"
    ],
    "cta": "Discuss marketing reporting",
    "intro": "What do your marketing figures actually tell you?",
    "introText": "Begin with the business question, then choose data that can answer it."
  },
  "service-websites": {
    "title": "Websites for UK Service Businesses | MrSeo.tech",
    "desc": "New websites for UK service businesses: clear pages, mobile-first design, reliable enquiry forms and SEO-ready foundations.",
    "kicker": "SERVICE BUSINESS WEBSITE DESIGN",
    "hero": [
      "Need a new website for your services?",
      "Help customers understand and enquire."
    ],
    "lead": "We design and build new websites for service providers. Visitors should quickly understand what you offer, where you operate and how to contact you. Improving the SEO of an existing website is a separate service.",
    "focus": "A useful new service website makes the offer and next step clear.",
    "problems": [
      [
        "There is no clear place to explain your services",
        "Customers piece together details from social profiles or separate listings.",
        "Agree a useful page structure and real contact details before building."
      ],
      [
        "Getting in touch is difficult on mobile",
        "Small links, confusing forms or buried telephone numbers discourage enquiries.",
        "Build readable service pages and test tap-to-call and form submission."
      ],
      [
        "Different services are buried together",
        "One generic page fails to answer customers' distinct questions.",
        "Create separate, helpful pages for the important services and locations."
      ]
    ],
    "process": [
      [
        "Define the website's job",
        "Agree priority services, audiences and genuine coverage areas."
      ],
      [
        "Plan clear pages",
        "Map service offers, practical information and enquiry points."
      ],
      [
        "Design and build",
        "Create mobile-friendly pages and a manageable content system."
      ],
      [
        "Verify the enquiry journey",
        "Check links, forms, responsive layouts and a real test submission."
      ]
    ],
    "outcomes": [
      [
        "A new website for your services",
        "Agreed pages and navigation that explain the business offer."
      ],
      [
        "Reliable ways to enquire",
        "Tested contact controls and mobile-friendly forms."
      ],
      [
        "A sound search foundation",
        "Useful URL structure ready for separately scoped SEO work."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "A service company needs to explain several offers and accept enquiries from mobile visitors.",
      "We create focused service pages and a straightforward contact form.",
      "We test the site navigation and delivery of a sample enquiry."
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
    "risk": "A better website can make enquiries easier; it cannot guarantee a particular number of leads or search rankings.",
    "related": [
      [
        "service-business-seo",
        "SEO for existing service websites",
        "Improve the search performance of a site you already have"
      ],
      [
        "website-design",
        "Business website design",
        "Plan a broader website build"
      ]
    ],
    "visual": [
      "Service pages",
      "Mobile contact",
      "Test enquiry"
    ],
    "cta": "Discuss a new service website",
    "intro": "Can a potential customer understand your offer quickly?",
    "introText": "Make the service and the next step obvious before adding extra features."
  }
}
MRSEO_UK_CORE;
  $data=json_decode($raw,true,512,JSON_THROW_ON_ERROR);
 }
 return $data;
}
