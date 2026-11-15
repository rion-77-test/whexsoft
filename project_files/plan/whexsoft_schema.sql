-- ============================================================
-- WhexSoft website: database design (MySQL 8 / utf8mb4)
--
-- Charset utf8mb4 is required for Bengali text.
--
-- IMPORTANT: this schema intentionally contains NO database-level
-- FOREIGN KEY constraints. Relations are plain indexed columns
-- (e.g. services.service_category_id, projects.service_id) and are
-- enforced by Laravel through Eloquent relations and validation.
--
-- Laravel's framework tables (password_reset_tokens, sessions, cache,
-- cache_locks, jobs, job_batches, failed_jobs, migrations) come from
-- `php artisan migrate` and are not repeated here.
--
-- Images are stored with Spatie Media Library (the `media` table), so
-- there are no image columns on the content tables.
-- ============================================================

CREATE DATABASE IF NOT EXISTS whexsoft
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE whexsoft;

-- 1. Admin users ---------------------------------------------
CREATE TABLE users (
  id                BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name              VARCHAR(255) NOT NULL,
  email             VARCHAR(255) NOT NULL,
  email_verified_at TIMESTAMP NULL DEFAULT NULL,
  password          VARCHAR(255) NOT NULL,
  remember_token    VARCHAR(100) NULL DEFAULT NULL,
  created_at        TIMESTAMP NULL DEFAULT NULL,
  updated_at        TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY users_email_unique (email)
) ENGINE=InnoDB;

-- 2. Service categories (groups on the Services overview page)
CREATE TABLE service_categories (
  id          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name        VARCHAR(150) NOT NULL,
  slug        VARCHAR(191) NOT NULL,             -- English slug
  description VARCHAR(255) NULL DEFAULT NULL,
  sort_order  SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  is_active   TINYINT(1) NOT NULL DEFAULT 1,
  created_at  TIMESTAMP NULL DEFAULT NULL,
  updated_at  TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY service_categories_slug_unique (slug)
) ENGINE=InnoDB;

-- 3. Services (one row = one card + one service detail page)
--    features / steps / faqs are JSON arrays:
--      features: [{"title": "...", "text": "..."}, ...]
--      steps:    [{"title": "...", "text": "..."}, ...]
--      faqs:     [{"question": "...", "answer": "..."}, ...]
CREATE TABLE services (
  id                  BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  service_category_id BIGINT UNSIGNED NOT NULL,  -- -> service_categories.id
  title               VARCHAR(255) NOT NULL,
  slug                VARCHAR(191) NOT NULL,     -- English slug
  short_description   VARCHAR(255) NULL DEFAULT NULL,
  intro               TEXT NULL,
  content             LONGTEXT NULL,             -- main service detail body
  features            JSON NULL,
  steps               JSON NULL,
  faqs                JSON NULL,
  meta_title          VARCHAR(70) NULL DEFAULT NULL,
  meta_description    VARCHAR(180) NULL DEFAULT NULL,
  sort_order          SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  is_active           TINYINT(1) NOT NULL DEFAULT 1,
  created_at          TIMESTAMP NULL DEFAULT NULL,
  updated_at          TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY services_slug_unique (slug),
  KEY services_category_active_sort (service_category_id, is_active, sort_order)
) ENGINE=InnoDB;

-- 4. Packages (each service can have multiple packages; NULL service_id
--    keeps support for a general package)
--    features: [{"text": "...", "included": true}, ...]
CREATE TABLE packages (
  id          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  service_id  BIGINT UNSIGNED NULL DEFAULT NULL, -- -> services.id
  name        VARCHAR(100) NOT NULL,             -- e.g. বেসিক
  tagline     VARCHAR(255) NULL DEFAULT NULL,
  price_label VARCHAR(60) NOT NULL,              -- e.g. "শুরু ৳১৫,০০০"
  features    JSON NOT NULL,
  is_popular  TINYINT(1) NOT NULL DEFAULT 0,
  sort_order  SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  is_active   TINYINT(1) NOT NULL DEFAULT 1,
  created_at  TIMESTAMP NULL DEFAULT NULL,
  updated_at  TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  KEY packages_service_active_sort (service_id, is_active, sort_order)
) ENGINE=InnoDB;

-- 5. Testimonials (optionally linked to a service)
CREATE TABLE testimonials (
  id            BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  service_id    BIGINT UNSIGNED NULL DEFAULT NULL, -- -> services.id
  client_name   VARCHAR(255) NOT NULL,
  business_name VARCHAR(255) NULL DEFAULT NULL,
  quote         TEXT NOT NULL,
  is_published  TINYINT(1) NOT NULL DEFAULT 0,
  sort_order    SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  created_at    TIMESTAMP NULL DEFAULT NULL,
  updated_at    TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  KEY testimonials_service_index (service_id),
  KEY testimonials_published_sort (is_published, sort_order)
) ENGINE=InnoDB;

-- 6. Project categories (filter tabs on the Portfolio page)
CREATE TABLE project_categories (
  id          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name        VARCHAR(255) NOT NULL,
  slug        VARCHAR(191) NOT NULL,             -- English slug
  description TEXT NULL DEFAULT NULL,
  is_active   TINYINT(1) NOT NULL DEFAULT 1,
  sort_order  SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  created_at  TIMESTAMP NULL DEFAULT NULL,
  updated_at  TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY project_categories_slug_unique (slug)
) ENGINE=InnoDB;

-- 7. Portfolio (a project may be related to one service)
CREATE TABLE projects (
  id                  BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  title               VARCHAR(255) NOT NULL,
  slug                VARCHAR(191) NOT NULL,     -- English slug
  project_category_id BIGINT UNSIGNED NOT NULL,  -- -> project_categories.id
  service_id          BIGINT UNSIGNED NULL DEFAULT NULL, -- -> services.id
  summary             VARCHAR(255) NOT NULL,
  description         TEXT NULL,
  live_url            VARCHAR(255) NULL DEFAULT NULL,
  is_real_client      TINYINT(1) NOT NULL DEFAULT 1,
  is_featured         TINYINT(1) NOT NULL DEFAULT 0,
  is_published        TINYINT(1) NOT NULL DEFAULT 0,
  sort_order          SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  created_at          TIMESTAMP NULL DEFAULT NULL,
  updated_at          TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY projects_slug_unique (slug),
  KEY projects_published_sort (is_published, sort_order),
  KEY projects_service_index (service_id),
  KEY projects_category_index (project_category_id)
) ENGINE=InnoDB;

-- 8. Post categories (blog categories)
CREATE TABLE post_categories (
  id          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name        VARCHAR(100) NOT NULL,
  slug        VARCHAR(191) NOT NULL,             -- English slug
  description TEXT NULL DEFAULT NULL,
  is_active   TINYINT(1) NOT NULL DEFAULT 1,
  created_at  TIMESTAMP NULL DEFAULT NULL,
  updated_at  TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY post_categories_slug_unique (slug)
) ENGINE=InnoDB;

-- 9. Blog posts
CREATE TABLE posts (
  id               BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  title            VARCHAR(255) NOT NULL,
  slug             VARCHAR(191) NOT NULL,        -- English slug
  category         VARCHAR(255) NULL DEFAULT NULL,
  excerpt          VARCHAR(255) NOT NULL,
  content          LONGTEXT NOT NULL,
  featured_image   VARCHAR(255) NULL DEFAULT NULL,
  status           VARCHAR(20) NOT NULL DEFAULT 'draft',
  published_at     TIMESTAMP NULL DEFAULT NULL,
  meta_title       VARCHAR(255) NULL DEFAULT NULL,
  meta_description VARCHAR(255) NULL DEFAULT NULL,
  created_at       TIMESTAMP NULL DEFAULT NULL,
  updated_at       TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY posts_slug_unique (slug)
) ENGINE=InnoDB;

-- 10. Spatie Media Library ------------------------------------
CREATE TABLE media (
  id                    BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  model_type            VARCHAR(255) NOT NULL,
  model_id              BIGINT UNSIGNED NOT NULL,
  uuid                  CHAR(36) NULL DEFAULT NULL,
  collection_name       VARCHAR(255) NOT NULL,
  name                  VARCHAR(255) NOT NULL,
  file_name             VARCHAR(255) NOT NULL,
  mime_type             VARCHAR(255) NULL DEFAULT NULL,
  disk                  VARCHAR(255) NOT NULL,
  conversions_disk      VARCHAR(255) NULL DEFAULT NULL,
  size                  BIGINT UNSIGNED NOT NULL,
  manipulations         JSON NOT NULL,
  custom_properties     JSON NOT NULL,
  generated_conversions JSON NOT NULL,
  responsive_images     JSON NOT NULL,
  order_column          INT UNSIGNED NULL DEFAULT NULL,
  created_at            TIMESTAMP NULL DEFAULT NULL,
  updated_at            TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY media_uuid_unique (uuid),
  KEY media_model_type_model_id_index (model_type, model_id),
  KEY media_order_column_index (order_column)
) ENGINE=InnoDB;

-- ============================================================
-- Starting data: categories and services
-- ============================================================

INSERT INTO project_categories (id, name, slug, sort_order, is_active, created_at, updated_at) VALUES
  (1, 'ই-কমার্স',               'ecommerce',  1, 1, NOW(), NOW()),
  (2, 'ল্যান্ডিং পেজ',          'landing',    2, 1, NOW(), NOW()),
  (3, 'কর্পোরেট ওয়েবসাইট',     'corporate',  3, 1, NOW(), NOW()),
  (4, 'পোর্টফোলিও ও ব্যক্তিগত', 'portfolio',  4, 1, NOW(), NOW()),
  (5, 'অন্যান্য',                'others',     5, 1, NOW(), NOW());

INSERT INTO post_categories (id, name, slug, sort_order, is_active, created_at, updated_at) VALUES
  (1, 'ওয়েবসাইট টিপস',          'website-tips',      1, 1, NOW(), NOW()),
  (2, 'ই-কমার্স',                'ecommerce',         2, 1, NOW(), NOW()),
  (3, 'ডিজিটাল মার্কেটিং',       'digital-marketing', 3, 1, NOW(), NOW()),
  (4, 'ব্যবসা বৃদ্ধি',            'business-growth',   4, 1, NOW(), NOW());

INSERT INTO service_categories (id, name, slug, sort_order, is_active, created_at, updated_at) VALUES
  (1, 'ওয়েবসাইট ডিজাইন ও ডেভেলপমেন্ট', 'website',           1, 1, NOW(), NOW()),
  (2, 'ডিজিটাল মার্কেটিং',               'digital-marketing', 2, 1, NOW(), NOW()),
  (3, 'সফটওয়্যার ডেভেলপমেন্ট',          'software',          3, 1, NOW(), NOW()),
  (4, 'অন্যান্য সেবা',                   'others',            4, 1, NOW(), NOW());

INSERT INTO services (service_category_id, title, slug, sort_order, is_active, created_at, updated_at) VALUES
  -- Website design and development
  (1, 'ই-কমার্স ওয়েবসাইট ডেভেলপমেন্ট',         'ecommerce-website',          1, 1, NOW(), NOW()),
  (1, 'ল্যান্ডিং পেজ ডিজাইন',                    'landing-page',               2, 1, NOW(), NOW()),
  (1, 'কর্পোরেট ও পোর্টফোলিও ওয়েবসাইট',         'corporate-portfolio-website',3, 1, NOW(), NOW()),
  (1, 'ডাইনামিক ওয়েবসাইট ডেভেলপমেন্ট',          'dynamic-website',            4, 1, NOW(), NOW()),
  (1, 'স্ট্যাটিক ওয়েবসাইট ডিজাইন',              'static-website',             5, 0, NOW(), NOW()),
  (1, 'ওয়ার্ডপ্রেস ওয়েবসাইট ডেভেলপমেন্ট',       'wordpress-website',          6, 0, NOW(), NOW()),
  (1, 'রিসোর্ট ওয়েবসাইট ডিজাইন ও ডেভেলপমেন্ট',  'resort-website',             7, 0, NOW(), NOW()),
  (1, 'ওয়েবসাইট ডেভেলপমেন্ট',                   'website-development',        8, 0, NOW(), NOW()),
  (1, 'ওয়েবসাইট মেইনটেন্যান্স',                  'website-maintenance',        9, 0, NOW(), NOW()),
  -- Digital marketing
  (2, 'ডিজিটাল মার্কেটিং',                       'digital-marketing-service',  1, 0, NOW(), NOW()),
  (2, 'এসইও সার্ভিস',                            'seo-service',                2, 0, NOW(), NOW()),
  (2, 'সোশ্যাল মিডিয়া মার্কেটিং',                'social-media-marketing',     3, 0, NOW(), NOW()),
  (2, 'ফেসবুক বুস্টিং সার্ভিস',                  'facebook-boosting',          4, 0, NOW(), NOW()),
  -- Software development
  (3, 'এইচআর ম্যানেজমেন্ট সফটওয়্যার',            'hrms-software',              1, 0, NOW(), NOW()),
  (3, 'সিআরএম সফটওয়্যার',                         'crm-software',               2, 0, NOW(), NOW()),
  (3, 'পেরোল ম্যানেজমেন্ট সফটওয়্যার',            'payroll-software',           3, 0, NOW(), NOW()),
  (3, 'অ্যাকাউন্ট ম্যানেজমেন্ট সফটওয়্যার',      'accounting-software',        4, 0, NOW(), NOW()),
  (3, 'ডায়াগনস্টিক সেন্টার ম্যানেজমেন্ট সফটওয়্যার','diagnostic-center-software',5, 0, NOW(), NOW()),
  (3, 'স্কুল ম্যানেজমেন্ট সফটওয়্যার',            'school-management-software', 6, 0, NOW(), NOW()),
  (3, 'ইনভেন্টরি ম্যানেজমেন্ট সফটওয়্যার',        'inventory-software',         7, 0, NOW(), NOW()),
  (3, 'সুপার শপের জন্য পিওএস সফটওয়্যার',         'pos-software',               8, 0, NOW(), NOW()),
  -- Others
  (4, 'মোবাইল অ্যাপ ডেভেলপমেন্ট',                'mobile-app-development',     1, 0, NOW(), NOW()),
  (4, 'আইটি কনসাল্টিং সার্ভিস',                  'it-consulting',              2, 0, NOW(), NOW()),
  (4, 'গ্রাফিক ডিজাইন',                           'graphic-design',             3, 0, NOW(), NOW()),
  (4, 'আর্কিটেকচারাল ডিজাইন',                     'architectural-design',       4, 0, NOW(), NOW());

-- ============================================================
-- Relations summary
-- ------------------------------------------------------------
-- services.service_category_id      -> service_categories.id
-- packages.service_id               -> services.id (nullable)
-- testimonials.service_id           -> services.id (nullable)
-- projects.project_category_id      -> project_categories.id
-- projects.service_id               -> services.id (nullable)
-- posts.category                    -> post_categories.name (by name)
-- media.model_type / media.model_id -> any Eloquent model (Spatie)
-- ============================================================
