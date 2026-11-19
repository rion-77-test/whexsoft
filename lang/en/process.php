<?php

/*
|--------------------------------------------------------------------------
| process language strings
|--------------------------------------------------------------------------
|
| Process page steps, headings and supporting text.
|
*/

return [
    'meta' => [
        'title' => 'Our Process | WhexSoft',
        'description' => 'From the first conversation to planning, design, development and launch—see how a project moves forward with WhexSoft.',
    ],

    'nav' => [
        'progress' => 'Workflow progress',
        'timeline_note' => 'Timeline depends on project scope',
        'step_numbers' => ['1', '2', '3', '4', '5'],
        'steps' => ['Discussion', 'Design', 'Development', 'Testing & Launch', 'Support & Growth'],
    ],

    'hero' => [
        'badge' => 'The work stages at a glance',
        'title_highlight' => 'In five steps',
        'title_rest' => 'from planning to website launch',
        'description' => 'From the first conversation to launch, we tell you in advance what will happen at every stage and coordinate the work with you.',
        'highlights' => [
            ['icon' => 'timer', 'title' => 'Clear timeline', 'text' => 'Based on project scope'],
            ['icon' => 'check_circle', 'title' => 'Step-by-step review', 'text' => 'With your feedback'],
            ['icon' => 'terminal', 'title' => 'Written scope of work', 'text' => 'Before we begin'],
            ['icon' => 'headset_mic', 'title' => 'Post-launch support', 'text' => 'As stated in the proposal'],
        ],
    ],

    'steps' => [
        [
            'id' => 'step-1',
            'badge' => 'Step 01',
            'meta_icon' => 'schedule',
            'meta' => 'Stage: Initial discussion',
            'title' => 'Discussion & planning',
            'title_en' => '(Discussion & Requirement Gathering)',
            'description' => 'First we talk about your business, your customers and what you want from the website. This conversation sets the goals and priorities for the work.',
            'points' => [
                ['icon' => 'analytics', 'text' => 'Understanding your business, customers and the information you need.'],
                ['icon' => 'account_tree', 'text' => 'Mapping the page structure and listing the features you need.'],
                ['icon' => 'price_check', 'text' => 'Setting the scope, budget and a realistic timeline.'],
            ],
            'deliverable_label' => 'Outcome & deliverables',
            'deliverable' => 'Project blueprint and technical requirements document',
            'deliverable_icon' => 'task_alt',
            'image' => 'process-1.jpg',
            'image_alt' => 'High tech digital agency planning phase with blueprint wireframes on luminous tablet and laptop screens showing sales funnel data with neon lime accents in a dark obsidian studio environment',
        ],
        [
            'id' => 'step-2',
            'badge' => 'Step 02',
            'meta_icon' => 'schedule',
            'meta' => 'Stage: Design review',
            'title' => 'Branded UI/UX design',
            'title_en' => '(Custom Design & Approval)',
            'description' => 'We create page layouts that match your brand, content and customer needs. The design is reviewed with you before the work moves forward.',
            'points' => [
                ['icon' => 'draw', 'text' => 'Designs that fit your logo, colours and content.'],
                ['icon' => 'devices', 'text' => 'Layout review for mobile, tablet and desktop.'],
                ['icon' => 'thumb_up', 'text' => 'Necessary design revisions and approval based on your feedback.'],
            ],
            'deliverable_label' => 'Outcome & deliverables',
            'deliverable' => 'Interactive high-fidelity mockups and design system',
            'deliverable_icon' => 'palette',
            'image' => 'process-2.jpg',
            'image_alt' => 'Dark aesthetic web design mockup with neon lime visual identity displayed on high end MacBook laptop and mobile responsive preview screen with clean typography and modern components',
        ],
        [
            'id' => 'step-3',
            'badge' => 'Step 03',
            'meta_icon' => 'schedule',
            'meta' => 'Stage: After approval',
            'title' => 'High-performance development',
            'title_en' => '(Clean Coding & Integrations)',
            'description' => 'We build the site according to the approved design and features. The required technology and integrations are chosen based on the type of work.',
            'points' => [
                ['icon' => 'speed', 'text' => 'Clean code and attention to page speed.'],
                ['icon' => 'payments', 'text' => 'Payment methods and checkout flow added where needed.'],
                ['icon' => 'local_shipping', 'text' => 'Courier or analytics integrations added within the agreed scope.'],
            ],
            'deliverable_label' => 'Outcome & deliverables',
            'deliverable' => 'A fully working engine with payment and courier APIs',
            'deliverable_icon' => 'code',
            'image' => 'process-3.jpg',
            'image_alt' => 'Futuristic software development code screen displaying lightning speed benchmarks, automated payment gateway webhook integration, and clean server side logic with lime glowing metrics',
        ],
        [
            'id' => 'step-4',
            'badge' => 'Step 04',
            'meta_icon' => 'schedule',
            'meta' => 'Stage: Before launch',
            'title' => 'Thorough testing and live launch',
            'title_en' => '(Testing & Deployment)',
            'description' => 'Before going live we test the main pages, forms and agreed features. The site is then prepared for launch on your domain.',
            'points' => [
                ['icon' => 'fact_check', 'text' => 'Testing layout and key user journeys across different screens.'],
                ['icon' => 'lock', 'text' => 'SSL and essential security setup where included in the proposal.'],
                ['icon' => 'public', 'text' => 'Launching the site on the agreed domain and hosting.'],
            ],
            'deliverable_label' => 'Outcome & deliverables',
            'deliverable' => 'A tested site and domain setup',
            'deliverable_icon' => 'rocket_launch',
            'image' => 'process-4.jpg',
            'image_alt' => 'Quality assurance testing station showing multiscreen device lab testing live website responsive display on phones tablets and laptops with green checkmarks and server deployment status',
        ],
        [
            'id' => 'step-5',
            'badge' => 'Step 05',
            'meta_icon' => 'all_inclusive',
            'meta' => 'Duration: Depends on the package',
            'title' => 'Handover and ongoing support',
            'title_en' => '(Support & Growth)',
            'description' => 'After launch we show you how to use the site. If you need extra training or maintenance, we agree the scope in advance.',
            'points' => [
                ['icon' => 'smart_display', 'text' => 'Guidance on using the site or admin panel as needed.'],
                ['icon' => 'cloud_sync', 'text' => 'Backup, update and maintenance schedules explained where included.'],
                ['icon' => 'support_agent', 'text' => 'Post-launch support within the time and channels stated in the proposal.'],
            ],
            'deliverable_label' => 'Outcome & benefits',
            'deliverable' => 'Usage guidance and agreed support',
            'deliverable_icon' => 'handshake',
            'image' => 'process-5.jpg',
            'image_alt' => 'Client handover and video tutorial training dashboard showing simple administrative controls for ecommerce shop, automated database backups, and friendly customer support center',
        ],
    ],

    'why' => [
        'badge' => 'Why are we different?',
        'title' => 'What we focus on in how we work',
        'description' => 'We talk about scope, time and cost from the start. We also keep you involved in important decisions as the work moves forward.',
        'cards' => [
            [
                'icon' => 'verified_user',
                'title' => 'A clear timeline',
                'text' => 'We set a realistic timeline after understanding the project scope and materials. If something changes during the work, we explain the impact on the timeline.',
                'footer' => 'Clear discussion about time',
                'footer_icon' => 'alarm_on',
            ],
            [
                'icon' => 'lock_open',
                'title' => 'Handover terms agreed upfront',
                'text' => 'Which files, accounts or access will be handed over is agreed in writing before work begins.',
                'footer' => 'Independent control',
                'footer_icon' => 'vpn_key',
            ],
            [
                'icon' => 'trending_up',
                'title' => 'A clear experience for customers',
                'text' => 'We make sure the page layout, copy and next steps are easy to understand. Business results also depend on the product, price, promotion and many other factors.',
                'footer' => 'Pages that are easy to understand',
                'footer_icon' => 'ads_click',
            ],
        ],
    ],

    'cta' => [
        'badge' => 'You can start today',
        'title' => 'Ready to start work on your project?',
        'description' => 'Tell us your idea. Through a detailed discussion we will propose the best solution for your brand, with no advance fee.',
        'primary' => 'Start your project today',
        'primary_icon' => 'shopping_bag',
        'secondary' => 'Get a free consultation',
        'secondary_icon' => 'forum',
    ],
];
