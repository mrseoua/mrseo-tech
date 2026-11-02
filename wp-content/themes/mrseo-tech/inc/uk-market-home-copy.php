<?php
if(!defined('ABSPATH'))exit;
/** UK English editorial for shared 3D homepage. Earth geometry/assets remain unchanged. */
function mrseo_uk_home_copy($source){
 static $map=null;
 if($map===null){
  $json=<<<'MRSEO_UK_HOME'
{
  "STRATEGY · TECHNOLOGY · GROWTH": "WEBSITES · MARKETING · TECHNOLOGY",
  "You have a website.<br><em>Where are the customers?</em>": "Need a website?<br><em>Or better enquiries?</em>",
  "SEO, paid media and analytics work best as one connected system. We align technology and marketing around business problems.": "We build websites, online shops and bespoke web applications. We also help UK businesses improve SEO, Google Ads and analytics — whether you're launching something new or fixing what holds your business back.",
  "Discuss a project": "Discuss your project",
  "Back to homepage": "Explore our services",
  "Website Creation": "Website Design",
  "Business websites and online stores": "Business websites and online shops",
  "Technical foundations": "Technical foundations for search",
  "Catalog architecture & growth": "Product catalogue and ecommerce growth",
  "Your website should drive business, not just exist.": "A new website or an existing business problem? Start with the goal.",
  "When a website struggles to generate enquiries, the bottleneck may be site architecture, organic visibility, paid acquisition or measurement. We diagnose constraints and prioritize improvements that support business goals.": "Launching a business? We can build your website or online shop. Already trading? We can investigate poor search visibility, weak enquiries, expensive PPC or unreliable conversion tracking — and recommend practical next steps.",
  "We review search demand, landing-page structure, indexing and technical obstacles so relevant pages can be discovered.": "We review search demand, service pages, indexing and technical barriers to help the right customers discover your business.",
  "We connect campaign structure, product data and conversion tracking to make advertising decisions more informed.": "We bring together PPC campaigns, product data and trustworthy conversion tracking so you can assess spend against genuine enquiries or orders.",
  "We set up GA4, events and conversion tracking to make customer journeys measurable and decisions clearer.": "We check GA4 events, lead tracking and purchase data so decisions are based on understandable figures.",
  "We improve organic discovery for online stores across platforms: categories, filters, product pages, indexation and purchase intent.": "We help online shops improve their category structure, product pages and indexation around relevant UK buying searches.",
  "We create service websites, company sites and online stores with thoughtful structure, usability and foundations for SEO and ads.": "We create websites and online shops with clear offers, mobile usability, reliable forms and a sensible foundation for SEO and PPC.",
  "NOT A LIST OF SERVICES. A SOLUTION TO YOUR CHALLENGE.": "FROM A NEW PROJECT TO A PRACTICAL SOLUTION",
  "Have a challenge?<br><em>Let’s solve it.</em>": "Need something built?<br><em>Or something fixed?</em>",
  "Too few leads, underperforming ads, low search visibility or a new website to build? We start with the cause, not a sales pitch.": "Need a business website, an online shop or a bespoke application? Or are enquiries, search visibility and advertising underperforming? Tell us what matters and we'll discuss a sensible approach.",
  "Tell us your challenge": "Tell us about your project",
  "Start with your challenge: let’s discuss your website, goals and priorities before proposing a service.": "Share your idea, existing website or current challenge. We'll discuss aims, constraints and scope before proposing work.",
  "Have a website. Where are the customers? We connect marketing and technology to solve business challenges.": "Websites, online shops, SEO, PPC and web development for businesses. Start with a project brief or a practical business problem.",
  "Discuss your challenge": "Discuss your project",
  "Explore Website Creation": "Website design services",
  "Explore Web Development": "Bespoke development",
  "Explore Technical SEO": "Technical SEO audit",
  "Explore E-commerce SEO": "Ecommerce SEO",
  "Explore Analytics": "GA4 & tracking",
  "Explore SEO": "SEO services",
  "Explore Google Ads": "Google Ads management",
  "Customer journey": "Customer journey",
  "Contact form ↗": "Send an enquiry ↗",
  "Working with businesses in Ukraine and internationally": "Remote delivery for clients in the UK and internationally",
  "About": "About us",
  "Contact": "Contact"
}
MRSEO_UK_HOME;
  $map=json_decode($json,true,512,JSON_THROW_ON_ERROR);
 }
 return $map[$source]??$source;
}
