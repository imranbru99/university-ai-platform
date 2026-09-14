# 🎓 Universe — AI-Powered University Information Platform

[![Laravel 9](https://img.shields.io/badge/Laravel-9.x-red?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP 8.0+](https://img.shields.io/badge/PHP-8.0%2B-blue?style=for-the-badge&logo=php)](https://php.net)
[![OpenAI](https://img.shields.io/badge/OpenAI-GPT--3-412991?style=for-the-badge&logo=openai)](https://openai.com)
[![MIT License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

> A full-featured Laravel-based SaaS platform for publishing and monetizing AI-generated university information content. Includes a PTC (Paid-to-Click) advertising ecosystem, multi-gateway payment processing, referral commissions, subscription plans, KYC verification, and more.

---

## 📋 Table of Contents

- [About the Application](#-about-the-application)
- [Tech Stack](#-tech-stack)
- [Core Features](#-core-features)
  - [1. User Authentication & Authorization](#1-user-authentication--authorization)
  - [2. AI Content Generation](#2-ai-content-generation)
  - [3. AI Chatbot](#3-ai-chatbot)
  - [4. Blog & Post Management](#4-blog--post-management)
  - [5. Subscription Plans](#5-subscription-plans)
  - [6. PTC Advertising System](#6-ptc-paid-to-click-advertising-system)
  - [7. Balance & Wallet System](#7-balance--wallet-system)
  - [8. Deposit & Payment Gateways](#8-deposit--payment-gateways)
  - [9. Withdrawal System](#9-withdrawal-system)
  - [10. Referral & Commission System](#10-referral--commission-system)
  - [11. KYC Verification](#11-kyc-know-your-customer-verification)
  - [12. Support Ticket System](#12-support-ticket-system)
  - [13. Notification System](#13-notification-system)
  - [14. Social Authentication](#14-social-authentication)
  - [15. Admin Panel](#15-admin-panel)
  - [16. Frontend Builder & SEO Tools](#16-frontend-builder--seo-tools)
  - [17. System Configuration](#17-system-configuration)
- [💡 Possible Feature Additions](#-possible-feature-additions)
  - [A. Advanced University Search & Filtering](#a-advanced-university-search--filtering)
  - [B. AI Image Enhancement (DALL·E 3)](#b-ai-image-enhancement-dalle-3)
  - [C. Community & Social Features](#c-community--social-features)
  - [D. University Comparison Tool](#d-university-comparison-tool)
  - [E. University Application Tracker](#e-university-application-tracker)
  - [F. Scholarship Finder](#f-scholarship-finder)
  - [G. Discussion Forum / Q&A Platform](#g-discussion-forum--qa-platform)
  - [H. Multi-Language Support](#h-multi-language-support)
  - [I. Advanced User Analytics Dashboard](#i-advanced-user-analytics-dashboard)
  - [J. REST API & Mobile App Endpoints](#j-rest-api--mobile-app-ready-endpoints)
  - [K. Email Marketing & Campaign Manager](#k-email-marketing--campaign-manager)
  - [L. Expanded Affiliate Program](#l-expanded-affiliate-program)
  - [M. University Course Aggregator](#m-university-course-aggregator)
  - [N. Browser Push Notifications](#n-browser-push-notifications)
  - [O. Dark Mode & Theme Customization](#o-dark-mode--theme-customization)
- [Installation & Setup](#-installation--setup)
- [Environment Variables](#-environment-variables)
- [Payment Gateways Supported](#-payment-gateways-supported)
- [SMS Providers Supported](#-sms-providers-supported)
- [Directory Structure](#-directory-structure)
- [License](#-license)

---

## 🌐 About the Application

**Universe** is a modern SaaS web application built on Laravel 9 that allows users to:

1. **Generate SEO-optimized university review articles** using OpenAI (GPT-3 & DALL·E) with a single keyword.
2. **Earn money** by viewing PTC advertisements, referring friends, and subscribing to premium plans.
3. **Deposit and withdraw funds** via 20+ global payment gateways.
4. **Manage a public-facing blog** featuring AI-generated university content with tags, comments, views, RSS feeds, and sitemaps.

The platform serves two primary audiences:
- **Content Publishers** — who want to build university content libraries at scale using AI automation.
- **Advertisers** — who want to run targeted PTC campaigns to a verified audience and earn back commission through the referral tree.

---

## 🛠 Tech Stack

| Layer | Technology |
|---|---|
| **Backend Framework** | Laravel 9 (PHP 8.0+) |
| **AI Engine** | OpenAI PHP SDK (`openai-php/client`) — GPT-3 / DALL·E |
| **Frontend** | Laravel UI, Blade Templates, Webpack Mix |
| **Database** | MySQL (via Eloquent ORM) |
| **Image Processing** | Intervention Image |
| **Authentication** | Laravel Sanctum + Socialite |
| **2FA Security** | Google Authenticator (TOTP) |
| **Email** | PHPMailer, SendGrid, Mailjet |
| **SMS** | Twilio, MessageBird, Vonage, TextMagic |
| **Payments** | 20+ gateways (Stripe, PayPal, Razorpay, Coingate, Mollie, etc.) |
| **Slug Generation** | `sohibd/laravelslug` |
| **Code Quality** | StyleCI, PHPUnit, Laravel Debugbar |

---

## 🚀 Core Features

### 1. User Authentication & Authorization

- **Standard Registration & Login** — Email/password with email verification.
- **Social Login (OAuth)** — Google, Facebook, GitHub, and other Socialite providers configured via Admin panel.
- **Mobile Verification** — OTP-based SMS verification using multiple SMS providers.
- **Two-Factor Authentication (2FA)** — Google Authenticator TOTP integration; users can enable/disable from their dashboard.
- **Forgot Password** — Code-based password reset via email.
- **Profile Completion** — Mandatory profile completion step after registration (firstname, lastname, education, skills, about, address).
- **Session Management** — Secure session handling with token regeneration.
- **Registration Toggle** — Admin can enable/disable new user registrations globally.
- **Registration Bonus** — Configurable welcome bonus credited automatically on sign-up.

---

### 2. AI Content Generation

The flagship feature of the platform — an automated content pipeline powered by **OpenAI GPT-3 (text-davinci-003)** and **DALL·E**.

When a user enters a **university name/keyword**, the system automatically generates a full post:

| Step | What is Generated |
|---|---|
| 1 | **SEO-Optimized Title** — via GPT prompt engineering |
| 2 | **Introduction Paragraph** — narrative intro, contextually tied to the title |
| 3 | **World Rankings** — last 5 years ranking data with structured sub-headings |
| 4 | **Location & Map Details** — geographic & cultural context |
| 5 | **History of the University** — institutional history narrative |
| 6 | **Academic Programs** — full list of programs/departments |
| 7 | **Student Opportunities** — admissions, scholarships, student life |
| 8 | **Importance Section** — SEO keyword-rich body content |
| 9 | **Career Opportunities** — career paths, industry connections |
| 10 | **3 AI Images** — DALL·E generated university-relevant images saved locally |
| 11 | **Tag Management** — user-provided tags attached to the post |
| 12 | **Auto-Publish** — assembled post stored with slug, image, and description |

**Image size options:** Small (256x256), Medium (512x512), Large (1024x1024)

---

### 3. AI Chatbot

- Integrated real-time **AI Chat** interface for users.
- Sends user input to OpenAI's API and returns intelligent responses.
- Dedicated chat page at `/user/chat`.
- AJAX-powered — no page reload required.

---

### 4. Blog & Post Management

**Public Side:**
- **Home Page** — Paginated latest posts listing.
- **Blog Page** — Full blog listing with pagination.
- **Post Detail Page** — Individual post with view count increment, tags, related posts, and comments.
- **RSS Feed** — `/feed` endpoint for syndication.
- **XML Sitemap** — `/sitemap.xml` auto-generated from all posts for SEO.
- **Slug-based URLs** — SEO-friendly URLs for every post.
- **Related Post Redirect** — Fuzzy slug matching redirects users to the closest post if exact slug not found.

**User Side:**
- **My Posts** — Users can view all their AI-generated posts.
- **Post Store** — Manual post creation endpoint.

**Admin Side:**
- **Post Management** — Admin can view, edit, update, and delete any post.
- **Post Overview** — Total post count shown on dashboard widget.

---

### 5. Subscription Plans

- Admin can create unlimited subscription plans with:
  - **Name & Tagline**
  - **Price**
  - **Daily Limit** (PTC views per day)
  - **Referral Level** (how many referral tiers unlocked)
  - **Validity** (duration in days)
  - **Highlight** (featured plan flag)
- Users can **browse and purchase** plans from the Plans page.
- **Default Plan** — Admin sets a default free plan for new users.
- **Running Plan Status** — System tracks active plan expiry per user.
- Plan purchase unlocks higher PTC daily limits and more referral levels.

---

### 6. PTC (Paid-to-Click) Advertising System

A complete advertising marketplace embedded in the platform.

**Ad Types Supported:**

| Type | Description |
|---|---|
| URL | External website link |
| Banner Image | Static image banner (JPEG/PNG/GIF) |
| Script | Embedded custom HTML/JS script |
| YouTube | YouTube video URL |

**Advertiser Flow (Users can post ads):**
1. User creates an ad — sets title, type, budget, duration, max show count.
2. Ad goes into **Pending** status awaiting admin review.
3. Admin approves or rejects. On rejection, user is refunded the balance.
4. Once active, the ad is served to other users.

**Viewer Flow:**
1. Authenticated users see available PTC ads.
2. They click **"View Ad"** — a timer runs for the required duration.
3. On confirmation, earning is credited to their wallet automatically.

**Admin PTC Management:**
- Filter ads: All / Pending / Active / Inactive / Rejected
- Create/Edit ads directly from admin panel
- Configure ad pricing per type (URL, Image, Script, YouTube)
- Set amount rewarded to viewers per view
- Enable/Disable user ad posting
- Auto-approve toggle for submitted ads

**Referral commissions** are also triggered on PTC views (multi-level).

---

### 7. Balance & Wallet System

- Every user has a personal **wallet balance** tracked in the database.
- Balance is updated on:
  - Deposit approval
  - Withdrawal (deduction)
  - PTC ad viewing (credit)
  - Referral commission (credit)
  - Admin manual add/subtract
  - Plan purchase (deduction)
  - Ad creation (deduction)
  - Ad rejection refund (credit)
- **Balance Transfer** — Users can transfer balance to other users (fixed + percentage fee configurable by admin).
- **Transaction History** — Full ledger of all credits/debits with TRX ID, type, remark, and post-balance.
- **Commission History** — Dedicated commission log per user.

---

### 8. Deposit & Payment Gateways

**20+ Automatic Gateways:**

| Gateway | Type |
|---|---|
| Stripe / StripeJS / StripeV3 | Credit/Debit Card |
| PayPal / PayPal SDK | PayPal |
| Razorpay | India |
| Mollie | Europe |
| Paystack | Africa |
| Flutterwave | Africa |
| Coingate | Crypto |
| Coinpayments / CoinpaymentsFiat | Crypto |
| Blockchain | Crypto |
| Coinbase Commerce | Crypto |
| Payeer | E-Wallet |
| Perfect Money | E-Wallet |
| Cashmaal | Pakistan |
| Skrill | E-Wallet |
| Paytm | India |
| Instamojo | India |
| MercadoPago | Latin America |
| Voguepay | Africa |

**Manual Gateways:**
- Admin can create unlimited custom payment methods (bank transfer, mobile banking, etc.)
- Users upload payment proof for manual review and approval.

**Deposit Management (Admin):**
- View deposits by status: Pending / Approved / Successful / Rejected / Initiated
- Summary totals per status category
- Filter by date range, gateway, or transaction ID
- Approve or reject with feedback message
- Rejection sends auto-notification to user

---

### 9. Withdrawal System

- Users can request withdrawals to any configured withdrawal method.
- **KYC gate** — Withdrawal requires KYC approval (configurable by admin).
- Withdrawal methods managed by admin (name, currency, fee, rate, limits, form fields).
- **Withdrawal Flow:**
  1. User selects method, enters amount, previews charge breakdown.
  2. Confirms — withdrawal stored as "Pending".
  3. Admin reviews — approves or rejects.
  4. On rejection, balance is automatically refunded and a refund transaction is created.
- **Withdrawal History** — Users see full withdrawal log with status.
- Admin views: Pending / Approved / Rejected / Full Log with summary totals.

---

### 10. Referral & Commission System

- Every user gets a unique **referral link** on registration.
- **Multi-Level Referrals** — Up to N levels deep (configured per plan).
- **Commission Types:**
  - `deposit_commission` — Triggered when a referred user makes a deposit.
  - `plan_subscribe_commission` — Triggered when a referred user buys a plan.
  - `ptc_view_commission` — Triggered when a referred user views a PTC ad.
- Each commission type has independent level-wise percentage rates.
- Admin can enable/disable each commission type independently.
- Users can view their referred users list and commission history.

---

### 11. KYC (Know Your Customer) Verification

- Admin builds a **dynamic KYC form** with custom fields (text, file upload, etc.).
- User submits KYC data — status goes to **Pending (Under Review)**.
- Admin can **Approve** or **Reject** KYC submissions.
- On rejection: uploaded documents are deleted from storage and KYC status reset.
- On approval: user is notified and withdrawal access unlocked.
- KYC status tracked: `0` = Unverified, `1` = Verified, `2` = Pending.
- KYC verification can be **required or optional** (configured in system settings).

---

### 12. Support Ticket System

- Both **guests and authenticated users** can open support tickets via the Contact page.
- **Ticket Features:**
  - Subject, priority, status tracking
  - Message thread with admin replies
  - File attachment support (upload/download)
  - Ticket close/reopen
  - CAPTCHA protection on public contact form
- **Admin Ticket Management:**
  - View by status: All / Pending / Closed / Answered
  - Reply, close, or delete tickets
  - Admin notifications on new ticket creation
  - Download ticket attachments

---

### 13. Notification System

**Email Notifications:**
- Configurable SMTP settings per environment.
- Built-in templates for all major events (KYC, deposit, withdrawal, balance, PTC, referral, etc.).
- Admin can edit notification templates (subject + body with variables).
- Test email sending from admin panel.
- SendGrid and Mailjet integration for transactional email.

**SMS Notifications:**
- Integrated providers: Twilio, MessageBird, Vonage, TextMagic.
- SMS triggered for same events as email.
- Toggleable per event in global notification settings.

**Admin Notifications:**
- In-app notification bell for admin panel.
- Auto-logged on key events (new tickets, KYC submission, etc.).
- Mark individual or all notifications as read.
- Notification log per user accessible from admin panel.

**Notification Log:**
- Full history of all notifications sent (email + SMS) per user.
- Accessible from admin user management notification log.

---

### 14. Social Authentication

- **Socialite** integration supporting multiple OAuth providers.
- Admin configures **Client ID, Client Secret** per provider from admin panel.
- Each provider can be individually **enabled/disabled**.
- Login/register with social account — auto-fills name & email.

---

### 15. Admin Panel

A comprehensive admin dashboard with full platform control:

**Dashboard Widgets:**
- Total Users
- Verified Users
- Email Unverified Users
- Mobile Unverified Users
- Total Posts

**User Management:**
- List users by: All / Active / Banned / Email Verified / Email Unverified / Mobile Verified / Mobile Unverified / KYC Unverified / KYC Pending / With Balance
- User detail view with deposit, withdrawal, transaction totals
- Edit user profile, verify fields (email/mobile/KYC) directly
- Add or subtract wallet balance manually with remark
- Send notification to individual user or all verified users
- Ban / Unban user with reason
- Login as any user (impersonation)

**Financial Management:**
- Deposit management (pending, approved, rejected, initiated, full log)
- Withdrawal management (pending, approved, rejected, full log)
- Transaction report with date filter

**Content Management:**
- Blog post management (view, edit, delete)
- PTC advertisement management (full CRUD + status control)

**Settings:**
- General Settings (site name, currency, colors, timezone, registration bonus, balance transfer fees, default plan)
- System Configuration (KYC on/off, email verification, SMS verification, secure password, registration, force SSL, balance transfer)
- Logo & Favicon upload
- Custom CSS editor
- GDPR Cookie notice
- Maintenance Mode
- SEO Settings
- Advertisement Pricing Settings
- Social Login Credentials
- Payment Gateway Management (automatic + manual)
- Withdrawal Method Management
- Subscription Plan Management
- Referral Commission Settings
- KYC Form Builder
- Notification Templates Editor
- Email Configuration
- Extensions/Plugins Manager
- Language Manager
- Frontend/Page Builder
- System Info (PHP info, server info, optimize cache)

---

### 16. Frontend Builder & SEO Tools

- **Page Builder** — Admin can build and manage frontend content sections.
- **SEO Editor** — Meta title, description, keywords configurable per page.
- **Sitemap** — Auto-generated XML sitemap from all posts.
- **RSS Feed** — XML feed for blog syndication.
- **Language Manager** — Multi-language support infrastructure with phrase editing.
- **About / Privacy / Terms Pages** — Dedicated static pages managed via frontend builder.

---

### 17. System Configuration

- **Maintenance Mode** — Full-site maintenance with custom message.
- **Force SSL** — Enforce HTTPS across all routes.
- **Secure Password** — Enforce strong password requirements.
- **Extensions Manager** — Enable/disable third-party extensions/plugins.
- **Cache Optimization** — One-click cache optimize and clear from admin panel.
- **Purchase Code** — License validation and bug/feature report submission.
- **System Info** — View PHP version, server info, loaded extensions.

---

## 💡 Possible Feature Additions

The following features are highly relevant to this application and can be added to expand its capabilities:

### A. Advanced University Search & Filtering

- **Elasticsearch or Laravel Scout integration** for full-text search across all posts.
- Filter posts by **country, ranking, programs, tags, or year**.
- Real-time search autocomplete with AJAX.
- Advanced **university comparison by search criteria**.

---

### B. AI Image Enhancement (DALL·E 3)

- **DALL·E 3 Upgrade** — Replace current DALL·E 1 calls with DALL·E 3 for dramatically higher quality images.
- **Multiple Image Styles** — Let users choose image style (realistic, artistic, campus view, aerial, etc.).
- **AI Image Alt Text** — Auto-generate descriptive alt text for all images using GPT-4 Vision for better accessibility and SEO.
- **Featured Image Re-generation** — Let users regenerate post images directly from their post list without re-generating the entire article.

---

### C. Community & Social Features

- **User Profiles** — Public profile pages showing a user's published posts and stats.
- **Follow System** — Users follow other content creators.
- **Like / Upvote Posts** — Engagement signals that influence homepage ranking.
- **Share to Social Media** — One-click share buttons (Twitter/X, Facebook, LinkedIn, WhatsApp).
- **Comment System Enhancement** — Threaded replies, likes on comments, spam moderation.
- **Reading List / Bookmarks** — Users save posts to read later.

---

### D. University Comparison Tool

- **Side-by-side comparison** of 2–4 universities across key metrics.
- Compare: Rankings, Programs, Location, Tuition Fees, Acceptance Rate, Student Population.
- Data sourced from the AI-generated content already on the platform.
- Shareable comparison URLs.

---

### E. University Application Tracker

- Users can **bookmark universities** they are interested in applying to.
- Track application status: Researching → Applied → Interview → Accepted / Rejected.
- **Deadline Reminders** — Email/SMS notifications for application deadlines.
- Notes field per university tracker entry.

---

### F. Scholarship Finder

- Dedicated **Scholarships section** — AI-generated scholarship posts with filtering by country, degree level, and field of study.
- Users can **bookmark scholarships**.
- **Scholarship Alert** — Notify users when new scholarships matching their profile are published.
- Integration with scholarship databases via API.

---

### G. Discussion Forum / Q&A Platform

- **University-specific Q&A threads** — "Ask a question about [University Name]".
- Upvote/downvote answers.
- **Verified answers** from users with KYC status.
- Topic tags: Admissions, Scholarships, Campus Life, Academics, Visa.
- AI-assisted answer suggestions using ChatGPT.

---

### H. Multi-Language Support

- Full **i18n system** with language switcher in navigation.
- AI content generation in **multiple languages** (add a language selector on the generate form).
- RTL layout support (Arabic, Urdu, Hebrew).
- Admin can add/manage languages from panel.

---

### I. Advanced User Analytics Dashboard

- **Content performance metrics** — Post views over time, top posts, tag performance.
- **Earnings analytics** — Charts for deposits, withdrawals, PTC earnings, commissions over time.
- **Referral tree visualization** — Visual tree showing referred users per level.
- Export reports as **CSV/Excel**.
- Integration with **Google Analytics** (tag injection from admin settings).

---

### J. REST API & Mobile App Ready Endpoints

- **Full REST API** with Laravel Sanctum token authentication.
- Endpoints for: posts (CRUD), AI generate, user profile, balance, PTC, plans.
- **API documentation** (Swagger/OpenAPI auto-generated).
- Rate limiting per API token.
- Enables building a **companion mobile app** (React Native / Flutter).

---

### K. Email Marketing & Campaign Manager

- Admin creates **email campaigns** with HTML builder.
- Target segments: all users, active users, by plan, by country.
- **Scheduled campaigns** — set date/time to auto-send.
- Campaign analytics: open rate, click rate, unsubscribe rate.
- **Drip sequences** — automated email series for new user onboarding.

---

### L. Expanded Affiliate Program

- **Public Affiliate Dashboard** — Dedicated page for affiliate stats.
- **Promotional banners** downloadable by affiliates.
- **Landing page per affiliate** with unique tracking.
- **Tiered affiliate ranks** (Bronze, Silver, Gold, Platinum) based on referral volume.
- Affiliate leaderboard visible to users (optional, toggle in admin).

---

### M. University Course Aggregator

- Aggregate **online courses** related to each university from Coursera, edX, FutureLearn APIs.
- Display relevant courses on each university post page.
- **Affiliate commission** from course enrollments (Coursera/edX affiliate programs).
- Filter by free vs paid, certification type, duration.

---

### N. Browser Push Notifications

- **Web push notifications** via Firebase Cloud Messaging (FCM).
- Notify users when: new posts matching their interests are published, PTC earnings are credited, withdrawal status is updated, new scholarship alerts.
- Admin sends push campaigns from admin panel.
- User opt-in/opt-out controls in profile settings.

---

### O. Dark Mode & Theme Customization

- **Dark/Light mode toggle** with `prefers-color-scheme` default detection.
- User preference saved to their profile.
- Admin can set default theme from general settings.
- **Custom base color + accent color** already supported — extend with live theme preview in admin.

---

## ⚙️ Installation & Setup

### Requirements

- PHP >= 8.0.2
- Composer
- MySQL 5.7+ / MariaDB 10.3+
- Node.js & NPM
- OpenAI API Key

### Steps

```bash
# 1. Clone the repository
git clone <repository-url>
cd university-core

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install && npm run dev

# 4. Copy environment file
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Configure database in .env, then run migrations
php artisan migrate --seed

# 7. Set storage permissions
chmod -R 775 storage bootstrap/cache

# 8. Create storage symlink
php artisan storage:link

# 9. Serve the application
php artisan serve
```

---

## 🔧 Environment Variables

```env
APP_NAME="UniVerse"
APP_URL=http://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_user
DB_PASSWORD=your_password

OPENAI_API_KEY=sk-xxxxxxxxxxxxxxxxxxxx

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_user
MAIL_PASSWORD=your_password

# Social Login (configured via Admin Panel)
# GOOGLE_CLIENT_ID=
# GOOGLE_CLIENT_SECRET=
# FACEBOOK_CLIENT_ID=
# FACEBOOK_CLIENT_SECRET=

# Payment Gateways (configured via Admin Panel)
# STRIPE_KEY=
# STRIPE_SECRET=
# PAYPAL_CLIENT_ID=
# PAYPAL_SECRET=

PURCHASE_CODE=your-purchase-code
```

---

## 💳 Payment Gateways Supported

| Gateway | Currency Support | Type |
|---|---|---|
| Stripe | Multi-currency | Automatic |
| PayPal | Multi-currency | Automatic |
| Razorpay | INR | Automatic |
| Mollie | EUR | Automatic |
| Paystack | NGN, GHS, ZAR | Automatic |
| Flutterwave | Multi-currency | Automatic |
| Coingate | BTC, ETH, LTC + 50 more | Automatic |
| Coinpayments | 800+ Crypto | Automatic |
| Blockchain | BTC | Automatic |
| Coinbase Commerce | Crypto | Automatic |
| Payeer | USD, EUR, RUB | Automatic |
| Perfect Money | USD, EUR | Automatic |
| Skrill | Multi-currency | Automatic |
| Instamojo | INR | Automatic |
| Paytm | INR | Automatic |
| MercadoPago | BRL, ARS, MXN | Automatic |
| Cashmaal | PKR | Automatic |
| Voguepay | NGN | Automatic |
| Custom Bank Transfer | Any | Manual |
| Any Custom Method | Any | Manual |

---

## 📱 SMS Providers Supported

| Provider | Region |
|---|---|
| Twilio | Global |
| MessageBird | Global |
| Vonage (Nexmo) | Global |
| TextMagic | Global |

---

## 📁 Directory Structure

```
university/core/
├── app/
│   ├── Console/           # Artisan commands
│   ├── Constants/         # Status constants
│   ├── Exceptions/        # Exception handling
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/     # All admin panel controllers
│   │   │   ├── Gateway/   # Payment gateway controllers (20+)
│   │   │   └── User/      # User-facing controllers
│   │   ├── Helpers/       # Global helper functions
│   │   ├── Middleware/    # Auth, KYC, Status middlewares
│   │   └── Kernel.php
│   ├── Lib/               # Libraries (GoogleAuth, FormProcessor, CurlRequest)
│   ├── Models/            # Eloquent models
│   ├── Notify/            # Notification system
│   ├── Rules/             # Custom validation rules
│   ├── Traits/            # Reusable traits (Searchable, etc.)
│   └── View/              # View composers
├── database/
│   ├── migrations/        # Database schema
│   ├── seeders/           # Initial data seeders
│   └── factories/         # Model factories
├── resources/
│   └── views/             # Blade templates
├── routes/
│   ├── web.php            # Public routes
│   ├── user.php           # Authenticated user routes
│   ├── admin.php          # Admin panel routes
│   ├── api.php            # REST API routes
│   └── ipn.php            # Payment IPN/webhook routes
└── .env                   # Environment configuration
```

---

## 📜 License

This project is licensed under the **MIT License** — see the [LICENSE](LICENSE) file for details.

---

## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

---

## 📞 Support

If you encounter any issues, please open a support ticket through the application's built-in support ticket system or contact the development team directly.

---

## 🤝 Let's Build Something Exceptional

I'm actively open to:

> **Remote Senior Full-Stack Roles · Freelance Contracts · Technical Partnerships · Long-Term Collaborations**
> in **Laravel · WordPress · React/Next.js · AI-powered Platforms · Security Audits · SaaS Architecture**

- 📍 **Timezone:** UTC+6 (Dhaka/Rangpur) — flexible overlap for US, EU & Asia
- ⚡ **Available:** Immediately · Production-first · Fast delivery · Transparent communication

---

### 👤 Imran Ahmed — Connect With Me

| Platform | Link |
|---|---|
| 🌐 Portfolio | [imrandev.bd](https://imrandev.bd/) |
| 💼 LinkedIn | [linkedin.com/in/imranbru99](https://www.linkedin.com/in/imranbru99/) |
| 🐙 GitHub | [github.com/imranbru99](https://github.com/imranbru99) |
| 🐦 X / Twitter | [@imrandev_bd](https://x.com/imrandev_bd) |
| 📺 YouTube | [@ImranDevBD](https://www.youtube.com/@ImranDevBD) |
| 📸 Instagram | [@imranbru99](https://www.instagram.com/imranbru99/) |
| 📘 Facebook | [ExpertImranDev](https://www.facebook.com/ExpertImranDev/) |
| 🎵 TikTok | [@imrandev_bd](https://www.tiktok.com/@imrandev_bd) |
| 🧵 Threads | [@imranbru99](https://www.threads.com/@imranbru99) |
| 📌 Pinterest | [@imrandev_bd](https://www.pinterest.com/imrandev_bd/) |
| 💬 WhatsApp | [+880 1576-918420](http://wa.me/+8801576918420) |
| 📧 Email | [me@imrandev.bd](mailto:me@imrandev.bd) |
| 🔗 All Links | [linktr.ee/ExpertImranDev](https://linktr.ee/ExpertImranDev) |

---

> *"Security isn't an add-on — it's the foundation. Scale, speed, and trust drive every line of code I write."*
> — **Imran Ahmed**

---

<p align="center">Made with ❤️ using Laravel & OpenAI | &copy; 2026 UniVerse Platform</p>
