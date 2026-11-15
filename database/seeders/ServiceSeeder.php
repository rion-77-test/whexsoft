<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Seed the service list from the project schema.
     */
    public function run(): void
    {
        $categories = ServiceCategory::query()->pluck('id', 'slug');

        $services = [
            // Website design and development
            ['category' => 'website', 'title' => 'ই-কমার্স ওয়েবসাইট ডেভেলপমেন্ট', 'slug' => 'ecommerce-website', 'sort_order' => 1, 'is_active' => true],
            ['category' => 'website', 'title' => 'ল্যান্ডিং পেজ ডিজাইন', 'slug' => 'landing-page', 'sort_order' => 2, 'is_active' => true],
            ['category' => 'website', 'title' => 'কর্পোরেট ও পোর্টফোলিও ওয়েবসাইট', 'slug' => 'corporate-portfolio-website', 'sort_order' => 3, 'is_active' => true],
            ['category' => 'website', 'title' => 'ডাইনামিক ওয়েবসাইট ডেভেলপমেন্ট', 'slug' => 'dynamic-website', 'sort_order' => 4, 'is_active' => true],
            ['category' => 'website', 'title' => 'UI/UX ডিজাইন', 'slug' => 'ui-ux-design', 'sort_order' => 10, 'is_active' => true],
            ['category' => 'website', 'title' => 'স্ট্যাটিক ওয়েবসাইট ডিজাইন', 'slug' => 'static-website', 'sort_order' => 5, 'is_active' => false],
            ['category' => 'website', 'title' => 'ওয়ার্ডপ্রেস ওয়েবসাইট ডেভেলপমেন্ট', 'slug' => 'wordpress-website', 'sort_order' => 6, 'is_active' => false],
            ['category' => 'website', 'title' => 'রিসোর্ট ওয়েবসাইট ডিজাইন ও ডেভেলপমেন্ট', 'slug' => 'resort-website', 'sort_order' => 7, 'is_active' => false],
            ['category' => 'website', 'title' => 'ওয়েবসাইট ডেভেলপমেন্ট', 'slug' => 'website-development', 'sort_order' => 8, 'is_active' => false],
            ['category' => 'website', 'title' => 'ওয়েবসাইট মেইনটেন্যান্স', 'slug' => 'website-maintenance', 'sort_order' => 11, 'is_active' => true],
            // Digital marketing
            ['category' => 'digital-marketing', 'title' => 'ডিজিটাল মার্কেটিং', 'slug' => 'digital-marketing-service', 'sort_order' => 1, 'is_active' => false],
            ['category' => 'digital-marketing', 'title' => 'এসইও সার্ভিস', 'slug' => 'seo-service', 'sort_order' => 2, 'is_active' => false],
            ['category' => 'digital-marketing', 'title' => 'সোশ্যাল মিডিয়া মার্কেটিং', 'slug' => 'social-media-marketing', 'sort_order' => 3, 'is_active' => false],
            ['category' => 'digital-marketing', 'title' => 'ফেসবুক বুস্টিং সার্ভিস', 'slug' => 'facebook-boosting', 'sort_order' => 4, 'is_active' => false],
            // Software development
            ['category' => 'software', 'title' => 'এইচআর ম্যানেজমেন্ট সফটওয়্যার', 'slug' => 'hrms-software', 'sort_order' => 1, 'is_active' => false],
            ['category' => 'software', 'title' => 'সিআরএম সফটওয়্যার', 'slug' => 'crm-software', 'sort_order' => 2, 'is_active' => false],
            ['category' => 'software', 'title' => 'পেরোল ম্যানেজমেন্ট সফটওয়্যার', 'slug' => 'payroll-software', 'sort_order' => 3, 'is_active' => false],
            ['category' => 'software', 'title' => 'অ্যাকাউন্ট ম্যানেজমেন্ট সফটওয়্যার', 'slug' => 'accounting-software', 'sort_order' => 4, 'is_active' => false],
            ['category' => 'software', 'title' => 'ডায়াগনস্টিক সেন্টার ম্যানেজমেন্ট সফটওয়্যার', 'slug' => 'diagnostic-center-software', 'sort_order' => 5, 'is_active' => false],
            ['category' => 'software', 'title' => 'স্কুল ম্যানেজমেন্ট সফটওয়্যার', 'slug' => 'school-management-software', 'sort_order' => 6, 'is_active' => false],
            ['category' => 'software', 'title' => 'ইনভেন্টরি ম্যানেজমেন্ট সফটওয়্যার', 'slug' => 'inventory-software', 'sort_order' => 7, 'is_active' => false],
            ['category' => 'software', 'title' => 'সুপার শপের জন্য পিওএস সফটওয়্যার', 'slug' => 'pos-software', 'sort_order' => 8, 'is_active' => false],
            // Others
            ['category' => 'others', 'title' => 'মোবাইল অ্যাপ ডেভেলপমেন্ট', 'slug' => 'mobile-app-development', 'sort_order' => 1, 'is_active' => false],
            ['category' => 'others', 'title' => 'আইটি কনসাল্টিং সার্ভিস', 'slug' => 'it-consulting', 'sort_order' => 2, 'is_active' => false],
            ['category' => 'others', 'title' => 'গ্রাফিক ডিজাইন', 'slug' => 'graphic-design', 'sort_order' => 3, 'is_active' => false],
            ['category' => 'others', 'title' => 'আর্কিটেকচারাল ডিজাইন', 'slug' => 'architectural-design', 'sort_order' => 4, 'is_active' => false],
        ];

        foreach ($services as $service) {
            if (! isset($categories[$service['category']])) {
                continue;
            }

            Service::updateOrCreate(
                ['slug' => $service['slug']],
                [
                    'service_category_id' => $categories[$service['category']],
                    'title' => $service['title'],
                    'sort_order' => $service['sort_order'],
                    'is_active' => $service['is_active'],
                ],
            );
        }
    }
}
