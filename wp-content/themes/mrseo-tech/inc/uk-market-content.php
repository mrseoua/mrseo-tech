<?php
if(!defined('ABSPATH'))exit;
function mrseo_uk_market_data(){
 static $data=null;
 if($data===null){
  $raw=<<<'MRSEO_UK_MARKET'
{
  "website-design": {
    "title": "Website Design & Development for UK Businesses | MrSeo.tech",
    "desc": "Bespoke websites for UK businesses. Clear service pages, mobile-first design, reliable enquiry forms, WordPress when suitable, and SEO-ready foundations.",
    "kicker": "WEBSITE DESIGN · UNITED KINGDOM",
    "hero": [
      "Need a new business website?",
      "Make it easy for people to choose you."
    ],
    "lead": "We design and build business websites around the decisions your customers need to make: what you offer, why it matters and how to get in touch. A clean design is only the beginning.",
    "intro": "A website should answer questions, not create more of them.",
    "introText": "Whether you're launching a business or replacing an ageing website, we agree the goals, pages and editing workflow before choosing a technology.",
    "problems": [
      [
        "Launching a new business",
        "You need a credible place to explain your services and win enquiries.",
        "Plan the content, service hierarchy and a straightforward route to contact."
      ],
      [
        "A website that looks good but underperforms",
        "Visitors struggle to find the right service or use a form on mobile.",
        "Review navigation, page copy and the enquiry journey."
      ],
      [
        "Every change needs a developer",
        "Simple edits are slow and expensive.",
        "Choose a manageable content system and define what your team can update."
      ]
    ],
    "process": [
      [
        "Discovery",
        "Clarify the audience, offer, budget and what success would look like."
      ],
      [
        "Structure and design",
        "Map service pages, calls to action and mobile layouts."
      ],
      [
        "Build and integrations",
        "Implement agreed features, forms and measurement foundations."
      ],
      [
        "Testing and handover",
        "Check responsive layouts, enquiry delivery, key URLs and editing access."
      ]
    ],
    "outcomes": [
      [
        "A website tailored to your business",
        "Not a generic template filled with unrelated promises."
      ],
      [
        "A clear enquiry journey",
        "Visitors can understand services and reach your team on mobile."
      ],
      [
        "A foundation for marketing",
        "Structured pages and space for SEO and conversion tracking."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "A local consultancy has a dated website and unclear service descriptions.",
      "We map each service to a useful page with a simple enquiry route.",
      "We test the mobile journey and confirm form delivery."
    ],
    "faq": [
      [
        "Can you build with WordPress?",
        "Yes, where WordPress fits the requirements. We evaluate maintainability, content editing and security before recommending it."
      ],
      [
        "What will the website cost?",
        "We provide a scoped proposal once we know the pages, content, integrations and technical requirements. We do not invent a starting price."
      ],
      [
        "Will a new website guarantee leads?",
        "No. The offer, demand and marketing all affect enquiries. We build foundations that can be measured and improved."
      ]
    ],
    "risk": "A new website cannot guarantee a particular number of enquiries. We agree measurable deliverables rather than unrealistic sales promises.",
    "related": [
      [
        "seo",
        "SEO services",
        "Help potential customers find your new site"
      ],
      [
        "google-ads",
        "Google Ads management",
        "Reach people actively looking for your services"
      ]
    ],
    "visual": [
      "YOUR OFFER",
      "WEBSITE",
      "ENQUIRY"
    ],
    "cta": "Discuss a new website"
  },
  "online-shop-development": {
    "title": "Ecommerce Website Development for UK Shops | MrSeo.tech",
    "desc": "Ecommerce website design and development for UK retailers. Product catalogues, checkout, payments, delivery workflows, SEO and practical integrations.",
    "kicker": "ECOMMERCE WEBSITE DEVELOPMENT",
    "hero": [
      "Planning an online shop?",
      "Build around the buying journey."
    ],
    "lead": "A good online shop helps customers find products, compare options and complete an order without unnecessary friction. We select the platform and integrations around your catalogue, stock and fulfilment requirements.",
    "intro": "A shop is more than a product grid.",
    "introText": "From product variants to checkout and delivery, we design the entire buying journey and check it with test orders before launch.",
    "problems": [
      [
        "Selling online for the first time",
        "You have products but need a dependable way to take and fulfil orders.",
        "Define catalogue structure, payment options and stock workflows."
      ],
      [
        "Customers abandon the checkout",
        "The mobile journey, product detail or payment process is difficult.",
        "Review the route from product discovery to order confirmation."
      ],
      [
        "Stock updates remain manual",
        "Catalogue and availability details do not match across systems.",
        "Assess catalogue data sources and suitable integrations."
      ]
    ],
    "process": [
      [
        "Commercial discovery",
        "Understand catalogue, stock sources, delivery, tax and payment requirements."
      ],
      [
        "Platform and architecture",
        "Assess WordPress/WooCommerce, Shopify or other options against your needs."
      ],
      [
        "Build and integration",
        "Implement the agreed catalogue, basket, checkout and data flows."
      ],
      [
        "Test orders and launch",
        "Check payment paths, order alerts, stock handling and key redirects."
      ]
    ],
    "outcomes": [
      [
        "A tested buying journey",
        "A practical route from browsing to confirmed orders."
      ],
      [
        "A manageable catalogue",
        "Product structure designed for users and future SEO."
      ],
      [
        "Suitable platform choices",
        "Features and ongoing costs matched to business requirements."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "A homeware retailer wants to launch its own online shop.",
      "We plan product variants, delivery options and catalogue updates.",
      "We place a test order and check the resulting stock and notifications."
    ],
    "faq": [
      [
        "WooCommerce or Shopify?",
        "We recommend a platform after reviewing catalogue size, integrations, editing needs and maintenance costs."
      ],
      [
        "Can you migrate an existing shop?",
        "Migration scope depends on export access, product data, customer records and URL mapping."
      ],
      [
        "Do you also help with ecommerce SEO?",
        "Yes. We can plan category architecture and organic search improvements as a separate stage."
      ]
    ],
    "risk": "We do not promise sales purely from launching a shop. Product-market fit, prices and customer acquisition remain essential.",
    "related": [
      [
        "ecommerce-seo",
        "Ecommerce SEO",
        "Improve the visibility of valuable product categories"
      ],
      [
        "google-shopping",
        "Google Shopping",
        "Advertise eligible products using accurate feeds"
      ]
    ],
    "visual": [
      "CATALOGUE",
      "CHECKOUT",
      "ORDER"
    ],
    "cta": "Plan an online shop"
  },
  "google-ads-audit": {
    "title": "Google Ads Audit for UK Businesses | MrSeo.tech",
    "desc": "Independent Google Ads audit for UK service firms and online shops. Review search terms, conversion tracking, campaign structure, wasted spend and practical next steps.",
    "kicker": "PPC · GOOGLE ADS AUDIT",
    "hero": [
      "Getting clicks but not enough customers?",
      "Find out where your ad spend goes."
    ],
    "lead": "We audit Google Ads accounts for service businesses and online shops, focusing on useful enquiries, measured orders and genuine campaign constraints. Not vanity metrics.",
    "intro": "Are the numbers in Google Ads telling the whole story?",
    "introText": "Start with trustworthy conversion data, then assess traffic quality, landing pages and budget decisions.",
    "problems": [
      [
        "Cost per lead keeps rising",
        "Search terms or landing pages may be bringing the wrong visitors.",
        "Compare queries, intent and enquiry quality."
      ],
      [
        "Conversions do not match your CRM",
        "Duplicate tags or weak conversion definitions distort performance.",
        "Verify lead and purchase events against real outcomes."
      ],
      [
        "No clear campaign priorities",
        "Too many changes are made without a test plan.",
        "Rank issues by evidence, impact and risk."
      ]
    ],
    "process": [
      [
        "Agree the business goal",
        "Define a valuable enquiry or purchase."
      ],
      [
        "Validate measurement",
        "Review conversions, values, imports and duplicates."
      ],
      [
        "Review campaigns",
        "Assess queries, structure, bidding and landing pages."
      ],
      [
        "Prioritised action plan",
        "Document practical tests and how to judge them."
      ]
    ],
    "outcomes": [
      [
        "A list of verified issues",
        "Distinguish confirmed faults from assumptions."
      ],
      [
        "Measurement recommendations",
        "Identify questionable conversions and reporting gaps."
      ],
      [
        "A sensible testing plan",
        "Propose changes that can be evaluated."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "An account reports more leads than the sales team receives.",
      "We trace form submissions and compare Google Ads, GA4 and the CRM.",
      "We check whether a test enquiry triggers the expected event just once."
    ],
    "faq": [
      [
        "Do I need to change agencies?",
        "No. An audit can stand alone and provide feedback to your current account manager."
      ],
      [
        "Do you audit lead generation and retail campaigns?",
        "Yes, with different definitions of success for qualified enquiries and completed purchases."
      ],
      [
        "Can you guarantee a lower CPA?",
        "No. We identify testable opportunities, but outcomes depend on the market, offer and data."
      ]
    ],
    "risk": "A review is only as reliable as the evidence available. We will not claim an accurate return on spend if purchase or lead tracking cannot be trusted.",
    "related": [
      [
        "google-ads",
        "Google Ads management",
        "Ongoing campaign management after an audit"
      ],
      [
        "analytics",
        "GA4 & conversion tracking",
        "Check the quality of the data behind decisions"
      ]
    ],
    "visual": [
      "TRAFFIC",
      "TRACKING",
      "ACTIONS"
    ],
    "cta": "Request an Ads audit"
  },
  "merchant-center-help": {
    "title": "Google Merchant Center Suspension & Product Disapprovals | MrSeo.tech",
    "desc": "Help diagnosing Merchant Center suspensions, inaccurate feeds and disapproved products. We review UK retailer policies, product data and checkout issues.",
    "kicker": "GOOGLE MERCHANT CENTER SUPPORT",
    "hero": [
      "Merchant Center suspended?",
      "Identify the real cause before appealing."
    ],
    "lead": "A suspension or large number of disapproved products can disrupt Shopping campaigns. We assess Google's notices, the shopping experience and product feeds to identify fixable issues without evading the rules.",
    "intro": "A product mismatch and an account suspension are different problems.",
    "introText": "We work from specific policy notices and real purchase journeys, not generic promises to 'unlock' an account.",
    "problems": [
      [
        "Your account is restricted",
        "Store information, checkout or policies may be inconsistent.",
        "Examine the notice and verify contact, delivery, returns and ordering."
      ],
      [
        "Products keep being disapproved",
        "Prices, availability or identifiers may not match the product pages.",
        "Compare feed values with actual website content."
      ],
      [
        "Problems return after an update",
        "Imports may overwrite corrected values.",
        "Review source data and the update schedule."
      ]
    ],
    "process": [
      [
        "Review the notice",
        "Establish the exact restriction and affected products."
      ],
      [
        "Check the store and feed",
        "Test product data, checkout and customer-facing information."
      ],
      [
        "Plan and apply corrections",
        "Prioritise documented issues and required changes."
      ],
      [
        "Verify and request a review",
        "Retest the shopping journey and use the available Google process."
      ]
    ],
    "outcomes": [
      [
        "A clear list of discrepancies",
        "Concrete product or policy problems supported by evidence."
      ],
      [
        "A remediation plan",
        "Fixes to the website, feed and account setup."
      ],
      [
        "Verification before resubmission",
        "A testable account and shopping experience."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "The feed says an item is in stock but the checkout cannot complete the order.",
      "We identify the source of the stock mismatch.",
      "We test the buying journey after correcting the synchronisation."
    ],
    "faq": [
      [
        "Can you guarantee reinstatement?",
        "No. Google makes the final decision. We can help verify and address identifiable policy issues."
      ],
      [
        "Can we open another account instead?",
        "Circumventing restrictions may breach Google policies. We focus on the cause."
      ],
      [
        "Do you support WooCommerce feeds?",
        "We review available platform data and integrations based on the account and site access provided."
      ]
    ],
    "risk": "Google controls account reviews. We cannot guarantee approval, a review deadline or uninterrupted campaign eligibility.",
    "related": [
      [
        "google-shopping",
        "Google Shopping",
        "Product campaigns once eligibility is resolved"
      ],
      [
        "online-shop-development",
        "Online shop development",
        "Fix checkout and catalogue foundations"
      ]
    ],
    "visual": [
      "POLICY NOTICE",
      "SITE + FEED",
      "REVIEW"
    ],
    "cta": "Discuss a suspension"
  },
  "google-shopping": {
    "title": "Google Shopping Management for UK Online Retailers | MrSeo.tech",
    "desc": "Google Shopping support for UK online shops: Merchant Center, product feeds, conversion tracking, Shopping campaigns and Performance Max strategy.",
    "kicker": "GOOGLE SHOPPING · UK RETAIL",
    "hero": [
      "Your products are showing.",
      "Are they generating worthwhile orders?"
    ],
    "lead": "Product campaigns depend on accurate stock, prices, landing pages and purchase data. We examine the catalogue and advertising together, with your business economics in mind.",
    "intro": "Product data and real orders must tell the same story.",
    "introText": "Fixing tracking, feed quality and campaign structure are three separate jobs. We deal with them in a sensible order.",
    "problems": [
      [
        "Products are missing from ads",
        "Feed errors or disapprovals reduce eligibility.",
        "Review specific Merchant Center diagnostics and product IDs."
      ],
      [
        "Clicks do not become orders",
        "The wrong demand may be reaching poorly matched product pages.",
        "Compare products, queries, prices and checkout steps."
      ],
      [
        "Revenue is high but margin is low",
        "ROAS alone does not always capture the economics of the catalogue.",
        "Review cost and margin data where available."
      ]
    ],
    "process": [
      [
        "Feed and Merchant check",
        "Review product eligibility, prices and stock."
      ],
      [
        "Purchase measurement",
        "Verify transactions, values and duplicates."
      ],
      [
        "Campaign structure",
        "Group products around the available data and objectives."
      ],
      [
        "Review and improve",
        "Assess order quality and spend against the agreed criteria."
      ]
    ],
    "outcomes": [
      [
        "Product data priorities",
        "Which issues affect advertising eligibility."
      ],
      [
        "Clearer catalogue decisions",
        "A segmentation approach tied to business goals."
      ],
      [
        "More trustworthy reporting",
        "Purchase events that can be independently checked."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "Low-value accessories absorb spend while core categories receive little coverage.",
      "We review product attributes and the current campaign setup.",
      "We assess results after a controlled adjustment window."
    ],
    "faq": [
      [
        "Shopping or Performance Max?",
        "It depends on your account, objectives and measurement. We review both approaches rather than prescribing one universally."
      ],
      [
        "Do you guarantee a particular ROAS?",
        "No. Competition, margin, pricing and data quality matter."
      ],
      [
        "Can you fix Merchant Center disapprovals?",
        "We diagnose and address confirmed issues, but approval is Google's decision."
      ]
    ],
    "risk": "No specific ROAS, sales volume or Merchant Center approval is guaranteed.",
    "related": [
      [
        "merchant-center-help",
        "Merchant Center help",
        "Resolve feed issues and account restrictions"
      ],
      [
        "ecommerce-seo",
        "Ecommerce SEO",
        "Improve organic category and product visibility"
      ]
    ],
    "visual": [
      "PRODUCT DATA",
      "CAMPAIGNS",
      "ORDERS"
    ],
    "cta": "Review Shopping ads"
  },
  "wordpress-care": {
    "title": "WordPress Maintenance & Support for UK Businesses | MrSeo.tech",
    "desc": "WordPress website maintenance: planned updates, backups, performance checks, technical troubleshooting and changes with agreed support scope.",
    "kicker": "WORDPRESS MAINTENANCE",
    "hero": [
      "Your WordPress website needs looking after?",
      "Keep updates controlled and problems visible."
    ],
    "lead": "We help businesses manage changes, technical faults and maintenance risks on WordPress. The starting point is a review of the existing site, hosting and backups, not a promise of zero downtime.",
    "intro": "Keep the site usable while it evolves.",
    "introText": "Agree a support scope that separates routine updates from major redevelopment or incident recovery.",
    "problems": [
      [
        "An update breaks the site",
        "A plugin or theme conflict affects forms or page layouts.",
        "Check logs, compatibility and the recovery options."
      ],
      [
        "The site is slow on mobile",
        "Images, plugins or hosting may be creating bottlenecks.",
        "Measure performance and identify specific causes."
      ],
      [
        "Backups and access are unclear",
        "Restoring a site becomes difficult when nobody owns the process.",
        "Review available backups, permissions and the update workflow."
      ]
    ],
    "process": [
      [
        "Initial assessment",
        "Review WordPress, theme, plugins, PHP and hosting."
      ],
      [
        "Agree the care plan",
        "Define checks, change process and how issues are reported."
      ],
      [
        "Controlled maintenance",
        "Back up, update and test critical functionality."
      ],
      [
        "Document outcomes",
        "Record issues, changes and recommendations."
      ]
    ],
    "outcomes": [
      [
        "A defined scope of care",
        "Know what routine support includes and excludes."
      ],
      [
        "A safer change process",
        "Backups and checks reduce avoidable update surprises."
      ],
      [
        "A clear technical backlog",
        "Separate small fixes from wider redevelopment."
      ]
    ],
    "example": [
      "ILLUSTRATIVE SCENARIO",
      "A contact form stops working after a plugin update.",
      "We investigate the change and email delivery configuration.",
      "We submit a test enquiry and check delivery to the intended mailbox."
    ],
    "faq": [
      [
        "Can you maintain an existing WordPress site?",
        "We first review access, installation quality and hosting limitations."
      ],
      [
        "Do you offer guaranteed 24/7 emergency cover?",
        "Not without a separately agreed service level and suitable resources."
      ],
      [
        "Can you recover a hacked site?",
        "We can assess the damage and recovery options, but cannot promise recovery of data missing from backups."
      ]
    ],
    "risk": "No maintenance plan can eliminate every outage or security threat. Response times and responsibilities must be agreed in writing.",
    "related": [
      [
        "website-design",
        "Website design",
        "When the existing site needs a redesign"
      ],
      [
        "seo-audit",
        "Technical SEO audit",
        "When faults affect crawling and indexation"
      ]
    ],
    "visual": [
      "ASSESS",
      "UPDATE",
      "VERIFY"
    ],
    "cta": "Discuss WordPress care"
  }
}
MRSEO_UK_MARKET;
  $data=json_decode($raw,true,512,JSON_THROW_ON_ERROR);
 }
 return $data;
}
// The routing layer owns mrseo_uk_market_page() and mrseo_uk_market_slugs().
// Keep data definitions here only to avoid PHP redeclaration fatal errors.
