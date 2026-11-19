<?php

/*
|--------------------------------------------------------------------------
| faq language strings
|--------------------------------------------------------------------------
|
| Frequently asked questions, answers and empty states.
|
*/

return [
    'meta' => [
        'title' => 'Frequently Asked Questions | WhexSoft',
        'description' => 'Answers to common questions about website design, development, pricing, payment and support.',
    ],

    'hero' => [
        'badge' => 'Common questions about your project',
        'title' => 'Answers to common questions',
        'description' => 'Learn about the work stages, likely cost, timeline and post-launch support.',
        'search_placeholder' => 'Search your question (e.g. payment, domain, timeline, support)...',
        'chips' => [
            ['icon' => 'bolt', 'title' => 'Project-based', 'label' => 'Timeline'],
            ['icon' => 'format_image_left', 'title' => 'Written terms', 'label' => 'Before work starts'],
            ['icon' => 'currency_exchange', 'title' => 'Clear quote', 'label' => 'Including scope'],
            ['icon' => 'headset_mic', 'title' => 'Contact', 'label' => 'By phone or WhatsApp'],
        ],
        'filters' => [
            'all' => 'All questions',
            'timeline' => 'Project & timeline',
            'pricing' => 'Packages & payment',
            'infrastructure' => 'Domain & hosting',
            'support' => 'Support & admin',
        ],
    ],

    'groups' => [
        'timeline' => [
            'letter' => 'A',
            'title' => 'Project and delivery timeline',
            'description' => 'Questions about pace of work, stages and preparation',
            'q1' => [
                'keywords' => 'time how many days delivery launch landing page ecommerce timeline delivery',
                'icon' => 'timer',
                'question' => 'Exactly how long does it take to build a website?',
                'lead' => 'The time depends on the pages, features, readiness of content and required integrations. Before starting we share the likely timeline:',
                'options' => [
                    ['title' => 'Landing page', 'text' => 'The timeline is set by the scope of pages and features.'],
                    ['title' => 'E-commerce or corporate site', 'text' => 'The timeline is shared after reviewing the content and required features.'],
                ],
                'note' => 'If there are special features or integrations, their time is calculated separately.',
            ],
            'q2' => [
                'keywords' => 'materials information logo images needed start requirements asset logo text',
                'icon' => 'inventory_2',
                'question' => 'What information or materials do I need to provide to start?',
                'lead' => 'To begin, we just need some information about your business and the features you need. Having a logo, product or service details and contact information helps the work move faster.',
                'items' => [
                    ['label' => 'Business logo:', 'text' => 'A transparent PNG or vector file of the logo (our design team can help if you do not have one).'],
                    ['label' => 'Product or service photos and details:', 'text' => 'Clear photos of your products, prices and descriptions.'],
                    ['label' => 'Contact information:', 'text' => 'Official mobile/WhatsApp number, address and social media links.'],
                    ['label' => 'Preferred references (optional):', 'text' => 'If you have examples of websites you like, you can share them.'],
                ],
                'note' => 'If content writing, photography or banner design is needed, discuss in advance whether it is included in the scope of work.',
            ],
        ],

        'pricing' => [
            'letter' => 'B',
            'title' => 'Packages, pricing and payment rules',
            'description' => 'Transparent accounting, advance payment and payment gateway policy',
            'q1' => [
                'keywords' => 'hidden charge extra cost package price hidden cost extra charge pricing',
                'icon' => 'verified',
                'question' => 'How will I be told about costs if something is added outside the scope?',
                'lead_bold' => 'Before work starts, the scope and price are stated in the proposal.',
                'lead' => 'If new features or work are added outside the proposal, the cost and time are shared separately. Work begins once you agree.',
                'note' => 'Domain, hosting and renewal costs can vary by project; they will be stated in the proposal.',
            ],
            'q2' => [
                'keywords' => 'payment installment bKash Nagad bank advance money payment bKash installment advance',
                'icon' => 'payments',
                'question' => 'How and through which channels should payment be made?',
                'lead' => 'The payment stages will be stated in the proposal according to the project scope. You can review them before work starts.',
                'blocks' => [
                    ['title' => 'Payment schedule', 'text' => 'The stages and amounts are stated in the proposal before work begins.'],
                    ['title' => 'Additional work', 'text' => 'If new work is added, the cost and time are confirmed first.'],
                ],
                'methods_label' => 'Accepted methods:',
                'methods' => ['bKash (Merchant/Personal)', 'Nagad', 'Bank transfer'],
            ],
        ],

        'infrastructure' => [
            'letter' => 'C',
            'title' => 'Domain, hosting and source code',
            'description' => 'Information about cloud servers, data security and ownership',
            'q1' => [
                'keywords' => 'domain hosting server speed package domain hosting server speed cloud',
                'icon' => 'dns',
                'question' => 'Do you provide the domain and hosting, or do I need to buy them?',
                'lead' => 'Domain and hosting arrangements depend on the package and project scope. If you already have them, they can be used too.',
                'note' => 'If a new domain or hosting is needed, discuss the options and renewal costs before buying.',
            ],
            'q2' => [
                'keywords' => 'ownership source code control cpanel ownership source code database github',
                'icon' => 'code',
                'question' => 'Will I own the full source code and ownership of the website?',
                'check' => 'Ownership and handover terms will be in the project proposal.',
                'lead' => 'Before work starts, agree in writing which files, accounts or access will be handed over. The usual items are:',
                'boxes' => [
                    ['title' => 'Server access', 'text' => 'cPanel / Cloudflare credentials'],
                    ['title' => 'Source code', 'text' => 'Full files and database backup'],
                    ['title' => 'Admin account', 'text' => 'Super admin email handover'],
                ],
            ],
        ],

        'support' => [
            'letter' => 'D',
            'title' => 'Admin panel and after-sales support',
            'description' => 'Content updates, security and long-term technical care',
            'q1' => [
                'keywords' => 'admin change myself update images price product admin control product update video tutorial',
                'icon' => 'tune',
                'question' => 'After launch, can I change photos, prices or products myself?',
                'lead' => 'If the project includes an admin panel, which information you can change yourself will be agreed during the work. If needed, we will show you how to use it during handover.',
                'items' => [
                    ['text' => 'Change new products, offer banners and prices at any time from a smartphone or laptop.'],
                    ['text' => 'Review customer names, phone numbers and delivery addresses as orders arrive.'],
                    ['before' => 'We will provide ', 'strong' => 'custom video guides and training', 'after' => ' for you.'],
                ],
            ],
            'q2' => [
                'keywords' => 'technical problem support broken helpdesk bug support technical maintenance warranty',
                'icon' => 'contact_support',
                'question' => 'What kind of support will I get if there is a technical problem after launch?',
                'p1' => 'Our relationship does not end when the website launches; it begins.',
                'p2' => 'Support hours, included work and contact channels will be stated in the package or project proposal. Confirm these before work starts.',
                'note' => 'If regular backups, security updates or hosting maintenance are needed, they can be discussed as a separate service.',
            ],
        ],
    ],

    'empty' => [
        'title' => 'No results matched your search',
        'description' => 'Try changing the keyword, or call or message us directly.',
        'reset' => 'Reset all questions',
    ],

    'contact' => [
        'badge' => 'Have another specific question?',
        'title' => 'Skip the guesswork and talk directly to our engineering team',
        'description' => 'Every business has unique needs. We will help you plan the best solution and a cost-effective budget for your specific business model.',
        'whatsapp_title' => 'Chat on WhatsApp',
        'whatsapp_text' => 'Message us for an instant reply. Our consultant is always active.',
        'whatsapp_number' => '01335-198859',
        'whatsapp_prefill' => 'Hello WhexSoft, I had a few questions about my website',
        'call_title' => 'Free consultation call',
        'call_text' => 'In a 10-minute consultation, find out which package suits your business.',
        'call_action' => 'Call us directly',
    ],

    'cta' => [
        'title' => 'Got all your answers? Start your project today',
        'description' => 'Do not wait—choose WhexSoft as a reliable partner to grow your online branding and sales.',
        'primary' => 'Talk about your project',
        'secondary' => 'Contact us',
    ],
];
