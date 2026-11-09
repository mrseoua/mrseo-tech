<?php
/** Five UK service pages: original British commercial content, not literal translations. */
if(!defined('ABSPATH'))exit;
function mrseo_en_gb_part1(){
 static $data=null;if($data!==null)return $data;
 $raw=<<<'MRSEO_GB_PART1'
{
  "local-business-websites": {
    "title": "Websites for Local Businesses in the UK",
    "kicker": "LOCAL BUSINESS WEBSITE DESIGN",
    "scene": "local",
    "headline": [
      "People search for services nearby.",
      "Will they find and contact you?"
    ],
    "lead": "A local customer often needs an address, opening hours, a clear list of services and a quick way to call. We build mobile-friendly websites for real service areas, without inventing locations or business claims.",
    "pains": [
      [
        "Your information is scattered",
        "Visitors have to check several profiles to find your services, hours and contact details."
      ],
      [
        "The mobile enquiry journey is awkward",
        "Telephone links, directions or booking forms are difficult to use on a phone."
      ],
      [
        "New customers cannot judge the business",
        "There is little information about what is offered, where you operate or how an appointment works."
      ]
    ],
    "sectionTitle": "Make it easy to find you. <em>Make it easy to get in touch.</em>",
    "benefits": [
      [
        "Plan the information people need",
        "Agree service pages, genuine coverage areas, opening times and contact options."
      ],
      [
        "Design mobile-first contact journeys",
        "Use readable service details, tap-to-call controls, directions and a short enquiry form."
      ],
      [
        "Test enquiries before handover",
        "Check contact links, opening-hours details and the destination of a test enquiry."
      ]
    ],
    "result": "A working local business website with agreed service pages, mobile contact routes and tested enquiry controls.",
    "faq": [
      [
        "Do I need a physical shopfront?",
        "No. We describe your real service model and areas accurately, without invented business addresses."
      ],
      [
        "Will the site automatically rank first locally?",
        "No. A well-structured website supports visibility, but local SEO is a separate ongoing service."
      ],
      [
        "Can I edit my opening times?",
        "Where the chosen content system supports it, we configure an appropriate editing route."
      ]
    ],
    "ctaTitle": "Need a stronger local presence? <em>Start with how customers contact you.</em>",
    "ctaLead": "Share your services, real coverage area and current website, if you have one.",
    "related": [
      [
        "local-seo",
        "Local SEO"
      ],
      [
        "service-websites",
        "Service business websites"
      ]
    ],
    "foot": "Services · Location · Enquiries",
    "description": "Local business website design for UK service providers: clear services, real opening hours, mobile contact options and working enquiry forms.",
    "button": "Need a stronger local presence",
    "scenelabel": "Illustrative websites for local businesses in the uk workflow, not real client data"
  },
  "landing-pages": {
    "title": "PPC Landing Pages for UK Campaigns",
    "kicker": "PPC LANDING PAGE DESIGN",
    "scene": "landing",
    "headline": [
      "Your ads are attracting visitors.",
      "Does the page give them a reason to enquire?"
    ],
    "lead": "Someone clicking an advert should land on the promised offer, not a generic homepage. We build focused landing pages with readable details, a clear next step and a working enquiry form.",
    "pains": [
      [
        "The ad and page tell different stories",
        "Visitors expect one service but arrive at a page covering the whole business."
      ],
      [
        "Questions remain unanswered",
        "The offer, process or eligibility is unclear, so visitors cannot make an informed decision."
      ],
      [
        "The form makes contact difficult",
        "Calls to action are hard to spot, fields are excessive or submissions fail."
      ]
    ],
    "sectionTitle": "One relevant offer. <em>One straightforward next step.</em>",
    "benefits": [
      [
        "Match the page to the advertising intent",
        "Agree the audience, offer and information needed before writing the page."
      ],
      [
        "Make the decision simple",
        "Present service details, genuine proof where available, FAQs and a prominent contact route."
      ],
      [
        "Test mobile enquiries and events",
        "Check the form and any agreed conversion event before traffic is sent to the page."
      ]
    ],
    "result": "A focused landing page for the agreed campaign, with mobile-friendly layout and verified enquiry submission.",
    "faq": [
      [
        "Is a landing page the same as a full website?",
        "No. A landing page concentrates on one offer or campaign. A business website usually covers several services."
      ],
      [
        "Can you manage the PPC campaign too?",
        "Yes, but campaign management and landing page delivery have separate agreed scopes."
      ],
      [
        "Can this run on our current domain?",
        "Often it can. We first check the existing platform and technical constraints."
      ]
    ],
    "ctaTitle": "Getting clicks but few useful enquiries? <em>Show us the ad and page.</em>",
    "ctaLead": "Send the campaign offer and destination URL. We'll discuss what the landing page needs to do.",
    "related": [
      [
        "google-ads",
        "Google Ads management"
      ],
      [
        "service-websites",
        "Service business websites"
      ]
    ],
    "foot": "Offer · Trust · Enquiry",
    "description": "PPC landing pages for UK Google Ads campaigns: clear offers, mobile-first layouts, tested enquiry forms and optional conversion measurement.",
    "button": "Getting clicks but few useful enquiries",
    "scenelabel": "Illustrative ppc landing pages for uk campaigns workflow, not real client data"
  },
  "corporate-websites": {
    "title": "Corporate Website Design for UK Companies",
    "kicker": "CORPORATE WEBSITE DESIGN",
    "scene": "corporate",
    "headline": [
      "Your business has grown.",
      "Does the website reflect what you actually do?"
    ],
    "lead": "Prospective clients and partners need to understand your services, people and track record without searching through vague claims. We design corporate sites around verified company information and clear ways to make contact.",
    "pains": [
      [
        "The company's offer is hard to understand",
        "A busy homepage fails to explain which services are provided and for whom."
      ],
      [
        "Relevant evidence is difficult to find",
        "Visitors cannot easily locate genuine work examples, team information or contact details."
      ],
      [
        "Keeping content current is laborious",
        "Small page changes require developer intervention or repeated manual work."
      ]
    ],
    "sectionTitle": "Present your business clearly. <em>Make credible information easy to find.</em>",
    "benefits": [
      [
        "Create a useful structure",
        "Organise departments, services, audience types and approved portfolio material."
      ],
      [
        "Build a coherent responsive interface",
        "Use the company's real brand language with clear navigation and prominent contact paths."
      ],
      [
        "Plan practical content management",
        "Agree who can update pages and test important forms and layouts before launch."
      ]
    ],
    "result": "A corporate website with agreed service structure, accessible navigation, mobile layouts and a manageable publishing workflow.",
    "faq": [
      [
        "Can we use our existing brand guidelines?",
        "Yes. We work from supplied brand assets and agreed design requirements."
      ],
      [
        "Can the website support multiple languages?",
        "Yes, provided each version has accurate content and a planned URL and SEO structure."
      ],
      [
        "Will you publish client names and case studies?",
        "Only where there is appropriate permission and a factual basis for the claims."
      ]
    ],
    "ctaTitle": "Does your website undersell the company? <em>Let's define what it should explain.</em>",
    "ctaLead": "Tell us your business areas, audiences and which information users struggle to find.",
    "related": [
      [
        "web-development",
        "Bespoke web development"
      ],
      [
        "seo",
        "SEO services"
      ]
    ],
    "foot": "Business · Expertise · Contact",
    "description": "Corporate website design for UK companies: clear services, genuine company information, mobile navigation and easy content management.",
    "button": "Does your website undersell the company",
    "scenelabel": "Illustrative corporate website design for uk companies workflow, not real client data"
  },
  "website-redesign": {
    "title": "Website Redesign and Modernisation",
    "kicker": "WEBSITE REDESIGN",
    "scene": "redesign",
    "headline": [
      "The website feels dated.",
      "Is it making enquiries harder?"
    ],
    "lead": "Tiny controls, confusing navigation and slow pages can discourage customers. We identify which parts of the current website need improvement, then redesign them while protecting useful URLs and working functionality.",
    "pains": [
      [
        "The offer is buried in dated layouts",
        "People struggle to understand what you do or find an appropriate service."
      ],
      [
        "Mobile pages are frustrating",
        "Buttons, forms or navigation are awkward to operate on smaller screens."
      ],
      [
        "A redesign could create new problems",
        "Unplanned URL changes, lost content or broken forms may affect customers and organic search."
      ]
    ],
    "sectionTitle": "Improve the experience. <em>Protect what already works.</em>",
    "benefits": [
      [
        "Review the actual obstacles",
        "Look at priority pages, mobile interactions and the enquiry journey."
      ],
      [
        "Redesign with clear scope",
        "Agree prototypes and improve the sections that matter, not every page automatically."
      ],
      [
        "Verify critical continuity",
        "Check important URLs, redirects where needed and test forms and mobile layouts."
      ]
    ],
    "result": "Redesigned agreed pages with verified contact routes and a plan for protecting important search URLs.",
    "faq": [
      [
        "Do we need to migrate to another platform?",
        "Not necessarily. We first assess whether the current platform can support the required improvements."
      ],
      [
        "Will search rankings stay exactly the same?",
        "No one can guarantee that. We reduce avoidable risk by retaining key URLs and checking redirects and content."
      ],
      [
        "Can we start with mobile problems?",
        "Yes, if the evidence supports a limited mobile-first improvement project."
      ]
    ],
    "ctaTitle": "Ready to improve an ageing website? <em>Show us where it fails.</em>",
    "ctaLead": "Send the existing URL and examples of pages or forms customers find difficult.",
    "related": [
      [
        "seo-audit",
        "Technical SEO audit"
      ],
      [
        "wordpress-care",
        "WordPress maintenance"
      ]
    ],
    "foot": "Clarity · Mobile · Continuity",
    "description": "Website redesign for UK businesses: improve mobile layouts, navigation and enquiry forms while controlling URL and search migration risks.",
    "button": "Ready to improve an ageing website",
    "scenelabel": "Illustrative website redesign and modernisation workflow, not real client data"
  },
  "local-seo": {
    "title": "Local SEO for UK Service Businesses",
    "kicker": "LOCAL SEO · UNITED KINGDOM",
    "scene": "local-seo",
    "headline": [
      "People are searching nearby.",
      "Why do they find someone else first?"
    ],
    "lead": "Local search depends on accurate business information, relevant service pages and real service areas. We review how customers find you, your Google Business Profile where eligible, and what prevents a useful enquiry.",
    "pains": [
      [
        "Relevant local searches miss your pages",
        "Customers use town or service terms that your website does not address clearly."
      ],
      [
        "Business details are inconsistent",
        "Opening hours, categories or contact details vary across the site and public profile."
      ],
      [
        "Visitors do not follow through",
        "They reach the profile or website but cannot easily call, find directions or ask a question."
      ]
    ],
    "sectionTitle": "Make your service relevant <em>where you genuinely operate.</em>",
    "benefits": [
      [
        "Review local search demand",
        "Check relevant queries, locations and the existing pages they reach."
      ],
      [
        "Fix confirmed information issues",
        "Agree updates to verified contact details, profile categories and important service pages."
      ],
      [
        "Check practical enquiry routes",
        "Measure available directions, calls and enquiry signals without claiming guaranteed rankings."
      ]
    ],
    "result": "A prioritised local visibility and contact plan tied to real business locations or service areas.",
    "faq": [
      [
        "Do we need an address in every town?",
        "No. We only work with genuine business locations or eligible service areas, never invented premises."
      ],
      [
        "Can you improve our Google Business Profile?",
        "Where the business is eligible and access is granted, we can review and support its settings."
      ],
      [
        "Can you guarantee a top Maps position?",
        "No. Results depend on relevance, distance, competition and other factors."
      ]
    ],
    "ctaTitle": "Want more relevant local enquiries? <em>Tell us where you work.</em>",
    "ctaLead": "Share your website, main services and actual locations or coverage areas.",
    "related": [
      [
        "local-business-websites",
        "Local business websites"
      ],
      [
        "seo-audit",
        "Technical SEO audit"
      ]
    ],
    "foot": "Area · Search · Contact",
    "description": "Local SEO for UK businesses: relevant service searches, Google Business Profile checks, accurate locations and better routes to enquiries.",
    "button": "Want more relevant local enquiries",
    "scenelabel": "Illustrative local seo for uk service businesses workflow, not real client data"
  }
}
MRSEO_GB_PART1;
 return $data=json_decode($raw,true,512,JSON_THROW_ON_ERROR);
}
