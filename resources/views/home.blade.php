@extends('components.layout.app')

@section('title', 'مُناجاتك — رفيق الطاعة اليومي')
@section('meta_description', 'مُناجاتك — رفيق الطاعة اليومي. مواقيت الصلاة الحية، القرآن الكريم، الأذكار، الأدعية، والتسبيح في تجربة هادئة وسريعة.')
@section('og_title', 'مُناجاتك — رفيق الطاعة اليومي')
@section('og_description', 'رفيق الطاعة اليومي — مواقيت الصلاة، القرآن، الأذكار والأدعية في تجربة هادئة واحترافية.')

@push('schema')
    <script type="application/ld+json">
                        {
                            "@@context": "https://schema.org",
                            "@@type": "WebSite",
                            "name": "مُناجاتك",
                            "alternateName": "Munajatk",
                            "url": "{{ url('/') }}",
                            "description": "رفيق الطاعة اليومي — مواقيت الصلاة، القرآن، الأذكار والأدعية.",
                            "inLanguage": ["ar", "en"]
                        }
                        </script>
    <script type="application/ld+json">
                        {
                            "@@context": "https://schema.org",
                            "@@type": "MobileApplication",
                            "name": "مُناجاتك",
                            "operatingSystem": "Android",
                            "applicationCategory": "LifestyleApplication",
                            "offers": { "@@type": "Offer", "price": "0", "priceCurrency": "USD" },
                            "downloadUrl": "https://github.com/mosayyyed/monologue/releases/download/v2.0.0/Munaajatak.apk"
                        }
                        </script>
@endpush

@section('content')

    @push('styles')
        <style>
            .hero h1 {
                line-height: 1.3;
                font-weight: 800;
            }

            .brand-name {
                color: var(--brand-orange);
                -webkit-text-fill-color: var(--brand-orange);
                position: relative;
                display: inline-block;
            }

            .brand-name::after {
                content: '';
                position: absolute;
                bottom: 10px;
                left: 0;
                width: 100%;
                height: 12px;
                background: rgba(255, 126, 61, 0.15);
                z-index: -1;
                border-radius: 4px;
            }

            .cta-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 40px;
                background: linear-gradient(145deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.01));
                border: 1px solid rgba(0, 162, 181, 0.1);
                border-radius: 24px;
                padding: 40px;
                margin-top: 40px;
                text-align: right;
            }

            .cta-downloads,
            .cta-web {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

            .store-badges {
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
            }

            .store-badge-link img {
                height: 48px;
                transition: transform 0.2s;
            }

            .store-badge-link:hover img {
                transform: translateY(-2px);
            }

            .web-links-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
                gap: 12px;
                width: 100%;
            }

            .web-link-card {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 12px 16px;
                background: var(--card-bg);
                border: 1px solid rgba(0, 0, 0, 0.05);
                border-radius: 12px;
                text-decoration: none;
                color: var(--text);
                font-weight: 600;
                transition: all 0.2s;
            }

            .web-link-card:hover {
                background: #fff;
                border-color: var(--primary);
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0, 162, 181, 0.1);
            }

            @media (max-width: 768px) {
                .cta-grid {
                    grid-template-columns: 1fr;
                    gap: 32px;
                    padding: 24px;
                }

                .cta-downloads,
                .cta-web {
                    align-items: center;
                    text-align: center;
                }

                .store-badges {
                    justify-content: center;
                }
            }

            .slogan-highlight {
                background: linear-gradient(135deg, var(--text), var(--primary));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .store-badge-link.disabled {
                opacity: 0.6;
                cursor: not-allowed;
                filter: grayscale(1);
            }

            /* --- About & Team Sections --- */
            .story-section {
                max-width: 800px;
                margin: 0 auto 40px;
                position: relative;
            }

            .story-card {
                background: var(--card-bg);
                border: 1px solid var(--border);
                border-radius: 32px;
                padding: 48px;
                text-align: center;
                box-shadow: var(--shadow);
                position: relative;
                overflow: hidden;
            }

            .story-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--primary), transparent);
            }

            .quote-icon {
                font-size: 48px;
                color: var(--primary);
                opacity: 0.2;
                margin-bottom: 24px;
                display: block;
            }

            .story-text {
                font-size: 20px;
                line-height: 2;
                color: var(--text);
                font-weight: 500;
                margin-bottom: 32px;
            }

            .story-highlight {
                color: var(--primary);
                font-weight: 700;
            }

            .team-section {
                padding: 60px 0;
                border-top: 1px solid var(--border);
            }

            .team-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 40px;
                max-width: 900px;
                margin: 0 auto;
            }

            .member-card {
                background: var(--card-bg);
                border: 1px solid var(--border);
                border-radius: 24px;
                padding: 40px 32px;
                text-align: center;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
            }

            .member-card:hover {
                transform: translateY(-12px);
                box-shadow: var(--shadow-lg);
                border-color: rgba(var(--primary-rgb), 0.4);
            }

            .member-avatar {
                width: 140px;
                height: 140px;
                border-radius: 50%;
                margin: 0 auto 24px;
                border: 4px solid var(--bg);
                box-shadow: 0 0 0 2px rgba(var(--primary-rgb), 0.2);
                overflow: hidden;
                position: relative;
            }

            .member-avatar img {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                object-fit: cover;
                transition: transform 0.4s;
            }
            .member-card:hover .member-avatar img { transform: scale(1.1); }

            .member-info h3 {
                font-size: 24px;
                margin-bottom: 8px;
                color: var(--text);
            }

            .member-role {
                display: inline-block;
                background: rgba(var(--primary-rgb), 0.08);
                color: var(--primary);
                font-weight: 700;
                font-size: 13px;
                padding: 6px 16px;
                border-radius: 20px;
                margin-bottom: 20px;
            }

            .member-bio {
                font-size: 15px;
                color: var(--text-secondary);
                line-height: 1.7;
                margin-bottom: 24px;
            }

            .social-links {
                display: flex;
                justify-content: center;
                gap: 16px;
            }

            .social-btn {
                width: 44px;
                height: 44px;
                border-radius: 14px;
                background: var(--bg);
                border: 1px solid var(--border);
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--text-secondary);
                transition: all 0.3s;
            }

            .social-btn:hover {
                background: var(--primary);
                color: #fff;
                border-color: var(--primary);
                transform: translateY(-4px);
            }

            .social-btn svg {
                width: 20px;
                height: 20px;
            }

            .contributors-box {
                background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
                border-radius: 32px;
                padding: 60px;
                text-align: center;
                color: #fff;
                margin-top: 80px;
                position: relative;
                overflow: hidden;
            }

            .contributors-box h2 {
                font-size: 32px;
                margin-bottom: 16px;
                position: relative;
                z-index: 2;
            }

            .contributors-box p {
                color: rgba(255, 255, 255, 0.8);
                font-size: 18px;
                max-width: 600px;
                margin: 0 auto 40px;
                line-height: 1.6;
                position: relative;
                z-index: 2;
            }

            .btn-glow {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                background: #fff;
                color: #0f172a;
                font-weight: 800;
                padding: 16px 40px;
                border-radius: 100px;
                text-decoration: none;
                transition: transform 0.2s;
                position: relative;
                z-index: 2;
            }

            .btn-glow:hover {
                transform: scale(1.05);
                box-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
            }

            /* Inline Icons Stylings */
            .icon-inline {
                vertical-align: -0.125em;
                margin-inline-end: 8px;
            }
            .chip .icon-inline {
                margin-inline-end: 6px;
                width: 16px;
                height: 16px;
            }
            .perm-icon svg {
                width: 24px;
                height: 24px;
            }
            /* --- Contact Section (Image Match) --- */
            .contact-section {
                padding: 60px 0;
                background: linear-gradient(180deg, var(--bg) 0%, rgba(var(--primary-rgb), 0.05) 100%);
            }

            .contact-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
                gap: 20px;
                margin-top: 40px;
            }

            .contact-item {
                display: flex;
                align-items: center;
                gap: 20px;
                padding: 24px;
                background: var(--card-bg);
                border: 1px solid var(--border-color);
                border-radius: 24px;
                text-decoration: none;
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                position: relative;
                overflow: hidden;
            }

            .contact-item::after {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 4px;
                height: 100%;
                background: var(--primary);
                transform: scaleY(0);
                transition: transform 0.3s;
            }

            .contact-item:hover {
                transform: translateY(-8px);
                border-color: var(--primary);
                background: #fff;
                box-shadow: var(--shadow-lg);
            }

            .contact-item:hover::after {
                transform: scaleY(1);
            }

            .contact-icon-wrapper {
                width: 56px;
                height: 56px;
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--primary);
                background: rgba(var(--primary-rgb), 0.1);
                transition: all 0.3s;
                flex-shrink: 0;
            }

            .contact-item:hover .contact-icon-wrapper {
                background: var(--primary);
                color: #fff;
                transform: rotate(-8deg);
            }

            .contact-content {
                display: flex;
                flex-direction: column;
                gap: 4px;
                text-align: right;
            }

            .contact-label {
                font-size: 13px;
                font-weight: 700;
                color: var(--muted);
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }

            .contact-value {
                font-size: 16px;
                font-weight: 800;
                color: var(--text);
                word-break: break-all;
            }

            .contact-arrow {
                margin-right: auto;
                color: var(--muted);
                opacity: 0.3;
                transition: all 0.3s;
            }

            .contact-item:hover .contact-arrow {
                opacity: 1;
                color: var(--primary);
                transform: translateX(-4px);
            }

            @media (max-width: 768px) {
                .contact-grid {
                    grid-template-columns: 1fr;
                }
            }
                font-size: 13px;
                font-weight: 700;
                color: var(--text-secondary);
            }

            .contact-value {
                font-size: 16px;
                font-weight: 600;
                color: var(--text);
            }

            .contact-arrow {
                color: var(--text-secondary);
                opacity: 0.5;
                transition: transform 0.3s;
            }

            .contact-item:hover .contact-arrow {
                transform: translateX(-5px);
                color: var(--primary);
                opacity: 1;
            }

            /* Dark mode overrides for contact section */
            [data-theme="dark"] .contact-item:hover {
                background: rgba(255, 255, 255, 0.05);
            }
        </style>
    @endpush

    <!-- ========== HERO ========== -->
    <section class="hero" id="hero">
        <div class="container">
            <div class="hero-bg-pattern"></div>
            <div class="hero-grid">
                <div class="hero-content reveal">
                    <div class="hero-logo-showcase">
                        <div class="hero-logo-wrapper">
                            <div class="hero-logo-glow"></div>
                            <img src="{{ asset('images/Icon_Teal_SVG.svg') }}" alt="Munajat Logo" width="120" height="120" style="position:relative; z-index:2;">
                        </div>
                    </div>
                    <p class="eyebrow">مجاني بالكامل · بدون إعلانات · مفتوح المصدر</p>
                    <h1><span class="brand-name">مُناجاتك</span>.. <br> <span class="slogan-highlight">رفيق الطاعة اليومي.</span></h1>
                    <p class="lead">
                        اجعل هاتفك معيناً لك على طاعة الله. تطبيق شامل يجمع القرآن والأذكار والمواقيت بتصميم هادئ يحترم
                        خصوصيتك ويخلو من المشتتات.
                    </p>
                    <div class="store-cards">
                        <a href="https://play.google.com/store/apps/details?id=com.mahmoudmourad.monologue" target="_blank" class="store-card">
                            <div class="store-card-icon">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/d/d0/Google_Play_Arrow_logo.svg" alt="Google Play">
                            </div>
                            <div class="store-card-info">
                                <span class="store-card-text">تحميل من</span>
                                <span class="store-card-name">Google Play</span>
                            </div>
                        </a>
                        <a href="https://apps.apple.com/ua/app/%D9%85%D9%86%D8%A7%D8%AC%D8%A7%D8%AA%D9%83-%D8%B1%D9%81%D9%8A%D9%82-%D8%A7%D9%84%D8%B7%D8%A7%D8%B1%D8%A9-%D8%A7%D9%84%D9%8A%D9%88%D9%85%D9%8A/id6759576802" target="_blank" class="store-card">
                            <div class="store-card-icon">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="App Store" style="filter: var(--theme-icon-filter);">
                            </div>
                            <div class="store-card-info">
                                <span class="store-card-text">تحميل من</span>
                                <span class="store-card-name">App Store</span>
                            </div>
                        </a>
                        <a href="https://appgallery.huawei.com/app/C117271909" target="_blank" class="store-card">
                            <div class="store-card-icon">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/Huawei_AppGallery_logo.svg" alt="AppGallery">
                            </div>
                            <div class="store-card-info">
                                <span class="store-card-text">تحميل من</span>
                                <span class="store-card-name">AppGallery</span>
                            </div>
                        </a>
                    </div>
                    <div class="chip-group">
                        <span class="chip">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-inline"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            خصوصية تامة
                        </span>
                        <span class="chip">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-inline"><path d="M4 14.5L12 3v9h8L12 21v-9H4z"/></svg>
                            سريع وخفيف
                        </span>
                        <span class="chip">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-inline"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                            وضع ليلي حقيقي
                        </span>
                    </div>
                </div>

                <!-- Hero Cards -->
                <div class="hero-cards reveal reveal-delay-2">

                    <!-- Prayer Times Card -->
                    <div class="prayer-card" id="prayerCard">
                        <div class="prayer-card-header">
                            <div class="prayer-location">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-inline"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                <span id="prayerLocation">جاري التحديد...</span>
                            </div>
                            <span class="pill">مواقيت حية</span>
                        </div>
                        <div class="prayer-next">
                            <div class="label">الصلاة القادمة</div>
                            <div class="name" id="nextPrayerName">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                            <div class="time" id="nextPrayerTime">--:--</div>
                            <div class="countdown" id="prayerCountdown">جاري الحساب...</div>
                        </div>
                        <div class="prayer-times-row" id="prayerTimesRow">
                            <!-- Populated by JS -->
                        </div>
                    </div>

                    <!-- Zikr Card -->
                    <div class="card azkar-quick-card">
                        <div style="display:flex;justify-content:space-between;align-items:center;">
                            <p class="eyebrow" style="margin:0;">ذكر سريع</p>
                            <span class="muted" id="azkarSource" style="font-size:12px;font-weight:600;">متفق
                                عليه</span>
                        </div>
                        <p class="azkar-text" id="azkarText">سُبْحَانَ اللَّهِ وَبِحَمْدِهِ</p>
                        <div class="azkar-counter" id="azkarCounter"></div>
                        <div class="azkar-actions">
                            <button class="btn btn-ghost btn-sm" data-copy="azkarText">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-inline"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                                نسخ
                            </button>
                            <button class="btn btn-ghost btn-sm" onclick="shareAzkar()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-inline"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                                مشاركة
                            </button>
                            <button class="btn btn-primary btn-sm" id="azkarNext">
                                ذكر آخر
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-inline" style="margin-inline-start:8px;"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!-- ========== APP SCREENSHOTS MOCKUP ========== -->
    <section class="section" id="appPreview">
        <div class="container">
            <div class="section-head reveal">

                <h2>تصميم يجمع بين البساطة والعمق</h2>
                <p class="lead">كل شاشة مصممة بعناية لتوفر تجربة عبادة هادئة واحترافية.</p>
            </div>

            <div class="mockup-showcase reveal">
                <div class="mockup-track" id="mockupTrack">

                    <!-- Screen 1: Overview -->
                    <div class="mockup-slide active">
                        <div class="phone-device">
                            <div class="phone-notch"></div>
                            <div class="phone-screen">
                                <img src="{{ asset('images/screenshots/01_App_Overview.png') }}" alt="الشاشة الرئيسية"
                                    onerror="this.parentElement.classList.add('placeholder');this.remove();">
                            </div>
                        </div>
                        <div class="mockup-caption">
                            <span class="mockup-badge">الرئيسية</span>
                            <h3>واجهة عصرية وبسيطة</h3>
                            <p>مواقيت الصلاة والعد التنازلي مع ذكر اليوم وتتبع العبادات في لمحة واحدة وبدون مشتتات.</p>
                        </div>
                    </div>

                    <!-- Screen 2: Quran Reading -->
                    <div class="mockup-slide">
                        <div class="phone-device">
                            <div class="phone-notch"></div>
                            <div class="phone-screen">
                                <img src="{{ asset('images/screenshots/02_Quran_Reading.png') }}" alt="القرآن الكريم"
                                    onerror="this.parentElement.classList.add('placeholder');this.remove();">
                            </div>
                        </div>
                        <div class="mockup-caption">
                            <span class="mockup-badge">القرآن</span>
                            <h3>القراءة والتدبر</h3>
                            <p>نص قرآني واضح بخط عثماني مع إمكانية التنقل بين السور والأجزاء بسهولة تامة.</p>
                        </div>
                    </div>

                    <!-- Screen 3: Quran Listening -->
                    <div class="mockup-slide">
                        <div class="phone-device">
                            <div class="phone-notch"></div>
                            <div class="phone-screen">
                                <img src="{{ asset('images/screenshots/03_Quran_Listening.png') }}" alt="القرآن الكريم"
                                    onerror="this.parentElement.classList.add('placeholder');this.remove();">
                            </div>
                        </div>
                        <div class="mockup-caption">
                            <span class="mockup-badge">القرآن</span>
                            <h3>تلاوات صوتية</h3>
                            <p>استمع للقرآن الكريم بأصوات أشهر القراء مع إمكانية التحميل للاستماع بدون إنترنت.</p>
                        </div>
                    </div>

                    <!-- Screen 4: Electronic Sebha -->
                    <div class="mockup-slide">
                        <div class="phone-device">
                            <div class="phone-notch"></div>
                            <div class="phone-screen">
                                <img src="{{ asset('images/screenshots/04_Electronic_Sebha.png') }}" alt="السبحة الإلكترونية"
                                    onerror="this.parentElement.classList.add('placeholder');this.remove();">
                            </div>
                        </div>
                        <div class="mockup-caption">
                            <span class="mockup-badge">السبحة</span>
                            <h3>سبحة إلكترونية ذكية</h3>
                            <p>عداد تسبيح تفاعلي يساعدك في الحفاظ على وردك اليومي مع حفظ تلقائي للمجموع.</p>
                        </div>
                    </div>

                    <!-- Screen 5: Prayer Times -->
                    <div class="mockup-slide">
                        <div class="phone-device">
                            <div class="phone-notch"></div>
                            <div class="phone-screen">
                                <img src="{{ asset('images/screenshots/05_Prayer_Times.png') }}" alt="مواقيت الصلاة"
                                    onerror="this.parentElement.classList.add('placeholder');this.remove();">
                            </div>
                        </div>
                        <div class="mockup-caption">
                            <span class="mockup-badge">الصلاة</span>
                            <h3>دقة في المواعيد</h3>
                            <p>حساب دقيق لمواقيت الصلاة حسب موقعك الجغرافي مع عرض مواقيت الأيام القادمة.</p>
                        </div>
                    </div>

                    <!-- Screen 6: Athkar Daily -->
                    <div class="mockup-slide">
                        <div class="phone-device">
                            <div class="phone-notch"></div>
                            <div class="phone-screen">
                                <img src="{{ asset('images/screenshots/06_Athkar_Daily.png') }}" alt="الأذكار"
                                    onerror="this.parentElement.classList.add('placeholder');this.remove();">
                            </div>
                        </div>
                        <div class="mockup-caption">
                            <span class="mockup-badge">الأذكار</span>
                            <h3>أذكار المسلم</h3>
                            <p>مكتبة شاملة للأذكار والأدعية اليومية مرتبة ومفهرسة لسهولة الوصول إليها.</p>
                        </div>
                    </div>

                    <!-- Screen 7: Qibla Compass -->
                    <div class="mockup-slide">
                        <div class="phone-device">
                            <div class="phone-notch"></div>
                            <div class="phone-screen">
                                <img src="{{ asset('images/screenshots/07_Qibla_Compass.png') }}" alt="القبلة"
                                    onerror="this.parentElement.classList.add('placeholder');this.remove();">
                            </div>
                        </div>
                        <div class="mockup-caption">
                            <span class="mockup-badge">القبلة</span>
                            <h3>اتجاه القبلة</h3>
                            <p>بوصلة بصرية دقيقة تساعدك على معرفة اتجاه الكعبة في أي مكان تتواجد فيه.</p>
                        </div>
                    </div>

                    <!-- Screen 8: Dark Light Mode -->
                    <div class="mockup-slide">
                        <div class="phone-device">
                            <div class="phone-notch"></div>
                            <div class="phone-screen">
                                <img src="{{ asset('images/screenshots/08_Dark_Light_Mode.png') }}" alt="الوضع الداكن"
                                    onerror="this.parentElement.classList.add('placeholder');this.remove();">
                            </div>
                        </div>
                        <div class="mockup-caption">
                            <span class="mockup-badge">التصميم</span>
                            <h3>الوضع الداكن والفاتح</h3>
                            <p>تصميم مريح للعين يدعم الوضع الليلي ليوفر تجربة قراءة هادئة في كافة الأوقات.</p>
                        </div>
                    </div>

                </div>

                <!-- Navigation -->
                <div class="mockup-nav">
                    <button class="mockup-arrow mockup-prev" id="mockPrev" aria-label="السابق">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </button>
                    <div class="mockup-dots" id="mockDots">
                        <span class="mockup-dot active" data-i="0"></span>
                        <span class="mockup-dot" data-i="1"></span>
                        <span class="mockup-dot" data-i="2"></span>
                        <span class="mockup-dot" data-i="3"></span>
                        <span class="mockup-dot" data-i="4"></span>
                        <span class="mockup-dot" data-i="5"></span>
                        <span class="mockup-dot" data-i="6"></span>
                        <span class="mockup-dot" data-i="7"></span>
                    </div>
                    <button class="mockup-arrow mockup-next" id="mockNext" aria-label="التالي">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== TRUST BAR ========== -->
    <section class="container">
        <div class="trust-bar reveal">
            <div class="trust-item">
                <span class="trust-value" data-count="1500" data-prefix="+">+٠</span>
                <span class="trust-label">تحميل للتطبيق</span>
            </div>
            <div class="trust-item">
                <span class="trust-value">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#facc15" stroke="#facc15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-inline" style="margin-inline-end:4px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    5.0
                </span>
                <span class="trust-label">تقييم المتجر</span>
            </div>
            <div class="trust-item">
                <span class="trust-value" data-count="6" data-prefix="+">+٠</span>
                <span class="trust-label">مميزات رئيسية</span>
            </div>
            <div class="trust-item">
                <span class="trust-value">21 ابريل 2026</span>
                <span class="trust-label">آخر تحديث</span>
            </div>
        </div>
    </section>

    <!-- ========== FEATURES ========== -->
    <section id="features" class="section">
        <div class="container">
            <div class="section-head reveal">
                <p class="eyebrow">كل ما تحتاجه في مكان واحد</p>
                <h2>مميزات صُممت لراحتك</h2>
                <p class="lead">تجربة استخدام سلسة تجمع بين جمال التصميم وعمق المحتوى، لتكون رفيقك الأمثل في العبادة.</p>
            </div>
            <div class="features-grid">
                <!-- Quran -->
                <article class="feature-card reveal reveal-delay-1">
                    <div class="feature-icon quran-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                    </div>
                    <h3>القرآن الكريم</h3>
                    <p>مصحف رقمي متكامل بخط عثماني واضح، مع تلاوات صوتية لأشهر القراء، وتفسير ميسر للآيات.</p>
                </article>

                <!-- Azkar -->
                <article class="feature-card reveal reveal-delay-2">
                    <div class="feature-icon azkar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M8 12h8"></path>
                            <path d="M12 8v8"></path>
                        </svg>
                    </div>
                    <h3>الأذكار والتسبيح</h3>
                    <p>أذكار الصباح والمساء مرتبة بعناية، مع سبحة إلكترونية ذكية تحفظ تقدمك اليومي.</p>
                </article>

                <!-- Prayer Times -->
                <article class="feature-card reveal reveal-delay-3">
                    <div class="feature-icon prayer-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <h3>مواقيت الصلاة</h3>
                    <p>دقة عالية في تحديد أوقات الصلاة حسب موقعك، مع عد تنازلي وتنبيهات مريحة.</p>
                </article>

                <!-- Qibla -->
                <article class="feature-card reveal reveal-delay-4">
                    <div class="feature-icon qibla-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                        </svg>
                    </div>
                    <h3>القبلة الذكية</h3>
                    <p>بوصلة بصرية دقيقة ترشدك لاتجاه الكعبة المشرفة فورياً أينما كنت حول العالم.</p>
                </article>

                <!-- Duas -->
                <article class="feature-card reveal reveal-delay-1">
                    <div class="feature-icon dua-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4.5 12.5l6-6a4.24 4.24 0 0 1 6 6l-6 6"></path>
                            <path d="M19.5 12.5l-6-6a4.24 4.24 0 0 0-6 6l6 6"></path>
                        </svg>
                    </div>
                    <h3>جوامع الدعاء</h3>
                    <p>مختارات من الأدعية القرآنية ومن السنة النبوية، مصنفة لتناسب كل حالاتك وأوقاتك.</p>
                </article>

                <!-- Notifications -->
                <article class="feature-card reveal reveal-delay-2">
                    <div class="feature-icon notify-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </div>
                    <h3>تنبيهات مخصصة</h3>
                    <p>تحكم كامل في إشعارات الصلوات والأذكار، لتذكرك بالخير دون أن تقطع خلوتك.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- ========== REVIEWS ========== -->
    <section class="section">
        <div class="container">
            <div class="section-head reveal">
                <p class="eyebrow">ماذا يقول المستخدمون</p>
                <h2>تجارب حقيقية من مجتمع <span class="brand-name">مُناجاتك</span></h2>
            </div>
            <div class="reviews-grid reveal">
                <div class="card review-card">
                    <div class="stars">★★★★★</div>
                    <p class="review-text">"أخيراً تطبيق إسلامي نظيف تماماً من الإعلانات! التصميم هادئ جداً ويساعد على
                        الخشوع، والمصحف خطه ممتاز ومريح للعين. جزاكم الله خيراً."</p>
                    <span class="reviewer">— عبد الرحمن م.</span>
                </div>
                <div class="card review-card">
                    <div class="stars">★★★★★</div>
                    <p class="review-text">"أحترم جداً اهتمامكم بالخصوصية. فكرة أن التطبيق يعمل أوفلاين بالكامل ولا يطلب
                        تسجيل دخول هي ميزة نادرة اليوم. تطبيق يستحق كل التقدير."</p>
                    <span class="reviewer">— مريم ص.</span>
                </div>
                <div class="card review-card">
                    <div class="stars">★★★★★</div>
                    <p class="review-text">"مواقيت الصلاة دقيقة جداً، والقبلة تعمل بامتياز. أكثر ما يعجبني هو بساطة
                        الواجهة وعدم وجود أي مشتتات. رفيقي اليومي فعلاً."</p>
                    <span class="reviewer">— عمر خ.</span>
                </div>
            </div>
        </div>
    </section>


    <!-- ========== ABOUT & STORY ========== -->
    <section class="section" id="about">
        <div class="container">
            <div class="section-head reveal">
                <p class="eyebrow">قصتنا</p>
                <h2>أثرٌ يبقى.. وعلمٌ ينتفعُ به</h2>
                <p class="lead">عندما تلتقي التقنية بالإخلاص، يولد الجمال.</p>
            </div>

            <div class="story-section reveal">
                <div class="story-card">
                    <span class="quote-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-quote"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 1 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c1 0 1.25.25 1.25 1.25V15c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/></svg>
                    </span>
                    <p class="story-text">
                        "لم أبني هذا التطبيق ليُكتب سطرًا في سيرتي الذاتية، بل ليكون <span
                            class="story-highlight">رفيقًا مخلصًا</span> لكل مسلم.
                        بدأت الفكرة برغبة في ترك <span class="story-highlight">صدقة جارية</span> حقيقية، تطبيق نظيف من
                        الإعلانات، يحفظ خصوصيتك، ويجمعك بالله في خلوتك.
                        هو إهداء لكل من علمني حرفًا، ولكل من رحل عن دنيانا ولم يجد من يتصدق عنه."
                    </p>
                    <div style="font-family: 'Amiri', serif; font-style: italic; color:var(--text-secondary);">— 
                        محمود مراد</div>
                </div>
            </div>

            <!-- Team -->
            <div class="team-section" id="team">
                <div class="section-head reveal">
                    <h2>العقول خلف العمل</h2>
                    <p class="lead">فريق يجمع بين الشغف التقني والرسالة السامية</p>
                </div>

                <div class="team-grid reveal">

                  <!-- Mahmoud Mourad -->
                    <div class="member-card">
                        <div class="member-avatar">
                            <img src="https://github.com/mahmoudmourad9.png" alt="Mahmoud Mourad"
                                onerror="this.src='{{ asset('images/logo.png') }}'">
                        </div>
                        <div class="member-info">
                            <h3>محمود مراد</h3>
                            <span class="member-role">Software Engineer & Flutter Developer </span>
                            <p class="member-bio">
                                مطور تطبيقات Flutter وشغوف ببناء حلول برمجية تترك أثراً طيباً. أسس مشروع مُناجاتك كصدقة جارية بهدف توفير تجربة عبادة تقنية نقية وخالية من المشتتات لكل مسلم.
                            </p>
                            <div class="social-links">
                                <a href="https://mahmoud-mourad.vercel.app/" target="_blank" class="social-btn" aria-label="Website">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                </a>
                                <a href="https://github.com/mahmoudmourad9" target="_blank" class="social-btn" aria-label="GitHub">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                                </a>
                                <a href="https://www.linkedin.com/in/mahmoud-mourad-19233b247" target="_blank" class="social-btn" aria-label="LinkedIn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                </a>
                                <a href="mailto:mahmoud.mourad2004@gmail.com" class="social-btn" aria-label="Email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                </a>
                                <a href="https://wa.me/201027821272" target="_blank" class="social-btn" aria-label="WhatsApp">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Mohamed Elsayed -->
                    <div class="member-card">
                        <div class="member-avatar">
                            <img src="https://github.com/mosayyyed.png" alt="Mohamed Elsayed"
                                onerror="this.src='{{ asset('images/logo.png') }}'">
                        </div>
                        <div class="member-info">
                            <h3>محمد السيد</h3>
                            <span class="member-role">Software Engineer & Flutter Developer</span>
                            <p class="member-bio">
                                مطور برمجيات متخصص في تقنيات Flutter و Laravel، ساهم في تطوير الجوانب التقنية للمشروع وتحويل الرؤية البرمجية إلى واقع ملموس يخدم المجتمع.
                            </p>
                            <div class="social-links">
                                <a href="https://mosayyyed.me" target="_blank" class="social-btn" aria-label="Website">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                </a>
                                <a href="https://github.com/mosayyyed" target="_blank" class="social-btn" aria-label="GitHub">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                                </a>
                                <a href="mailto:mosayyyed@gmail.com" class="social-btn" aria-label="Email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                </a>
                                <a href="https://linkedin.com/in/mosayyyed" target="_blank" class="social-btn" aria-label="LinkedIn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                </a>
                                <a href="https://wa.me/201092918573" target="_blank" class="social-btn" aria-label="WhatsApp">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                  
                </div>

                <!-- Final Call to Action -->
                <div class="cta-section reveal" style="padding: 60px 20px; text-align: center; margin-top: 60px; background: var(--cta-gradient); color: var(--cta-text); border-radius: 32px;">
                    <p class="eyebrow" style="color: var(--primary-2);">ابدأ الآن</p>
                    <h2 class="mb-4">حمّل التطبيق واشعر بالسكينة</h2>
                    <p class="mb-5" style="max-width: 600px; margin-inline: auto; opacity: 0.85;">
                        تجربة عبادة متكاملة تعمل بدون إنترنت ومجانية بالكامل. اختر المتجر المفضل لديك للبدء في رحلتك الإيمانية.
                    </p>
                    <div class="store-cards" style="justify-content: center;">
                        <a href="https://play.google.com/store/apps/details?id=com.mahmoudmourad.monologue" target="_blank" class="store-card">
                            <div class="store-card-icon">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/d/d0/Google_Play_Arrow_logo.svg" alt="Google Play">
                            </div>
                            <div class="store-card-info">
                                <span class="store-card-text">تحميل من</span>
                                <span class="store-card-name">Google Play</span>
                            </div>
                        </a>
                        <a href="https://apps.apple.com/ua/app/%D9%85%D9%86%D8%A7%D8%AC%D8%A7%D8%AA%D9%83-%D8%B1%D9%81%D9%8A%D9%82-%D8%A7%D9%84%D8%B7%D8%A7%D8%B1%D8%A9-%D8%A7%D9%84%D9%8A%D9%88%D9%85%D9%8A/id6759576802" target="_blank" class="store-card">
                            <div class="store-card-icon">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="App Store" style="filter: var(--theme-icon-filter);">
                            </div>
                            <div class="store-card-info">
                                <span class="store-card-text">تحميل من</span>
                                <span class="store-card-name">App Store</span>
                            </div>
                        </a>
                        <a href="https://appgallery.huawei.com/app/C117271909" target="_blank" class="store-card">
                            <div class="store-card-icon">
                                <img src="{{ asset('images/huawei-appgallery-thumb-150x150.png.webp') }}" alt="AppGallery">
                            </div>
                            <div class="store-card-info">
                                <span class="store-card-text">تحميل من</span>
                                <span class="store-card-name">AppGallery</span>
                            </div>
                        </a>
                    </div>
                    <div class="mt-5">
                        <a href="https://github.com/mosayyyed/monologue/releases/latest" target="_blank"
                            class="btn btn-outline-primary rounded-pill">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="me-2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            تحميل مباشر (APK)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CONTACT SECTION ========== -->
    <section class="contact-section" id="contact">
        <div class="container">
            <div class="section-head reveal">
                <p class="eyebrow">تواصل معنا</p>
                <h2>نحن هنا للاستماع إليك</h2>
                <p class="lead">سواء كان لديك تساؤل، اقتراح، أو ترغب في دعم المشروع، يسعدنا دائماً تواصلك معنا.</p>
            </div>

            <div class="contact-grid reveal">
                <!-- Email -->
                <a href="mailto:Monaajatak@gmail.com" class="contact-item">
                    <div class="contact-icon-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    </div>
                    <div class="contact-content">
                        <span class="contact-label">البريد الإلكتروني</span>
                        <span class="contact-value">Monaajatak@gmail.com</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="contact-arrow"><path d="m15 18-6-6 6-6"/></svg>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/201093717869" target="_blank" class="contact-item">
                    <div class="contact-icon-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                    </div>
                    <div class="contact-content">
                        <span class="contact-label">واتساب</span>
                        <span class="contact-value">201093717869+</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="contact-arrow"><path d="m15 18-6-6 6-6"/></svg>
                </a>

                <!-- Telegram -->
                <a href="https://t.me/monaajatak" target="_blank" class="contact-item">
                    <div class="contact-icon-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                    </div>
                    <div class="contact-content">
                        <span class="contact-label">تليجرام</span>
                        <span class="contact-value">t.me/monaajatak</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="contact-arrow"><path d="m15 18-6-6 6-6"/></svg>
                </a>

                <!-- Facebook -->
                <a href="https://facebook.com/Monaajatak" target="_blank" class="contact-item">
                    <div class="contact-icon-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </div>
                    <div class="contact-content">
                        <span class="contact-label">فيسبوك</span>
                        <span class="contact-value">Monaajatak</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="contact-arrow"><path d="m15 18-6-6 6-6"/></svg>
                </a>

                <!-- Instagram -->
                <a href="https://instagram.com/monaajatak" target="_blank" class="contact-item">
                    <div class="contact-icon-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    </div>
                    <div class="contact-content">
                        <span class="contact-label">انستجرام</span>
                        <span class="contact-value">@monaajatak</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="contact-arrow"><path d="m15 18-6-6 6-6"/></svg>
                </a>

                <!-- TikTok -->
                <a href="https://tiktok.com/@monaajatak" target="_blank" class="contact-item">
                    <div class="contact-icon-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"/></svg>
                    </div>
                    <div class="contact-content">
                        <span class="contact-label">تيك توك</span>
                        <span class="contact-value">@monaajatak</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="contact-arrow"><path d="m15 18-6-6 6-6"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ========== FAQ ========== -->
    <section id="faq" class="section">
        <div class="container">
            <div class="section-head reveal">
                <p class="eyebrow">أسئلة شائعة</p>
                <h2>كل ما تحتاج معرفته</h2>
            </div>
            <div class="faq-list reveal">
                <details open>
                    <summary>هل التطبيق مجاني بالكامل؟</summary>
                    <p>نعم، <span class="brand-name">مُناجاتك</span> مجاني %100 بدون إعلانات أو مشتريات داخلية، وسيظل كذلك بإذن الله.</p>
                </details>
                <details>
                    <summary>هل يعمل بدون إنترنت؟</summary>
                    <p>نعم، القرآن والأذكار والأدعية متاحة أوفلاين. مواقيت الصلاة تحتاج اتصال للتحديث الأول فقط.</p>
                </details>
                <details>
                    <summary>كيف أشغّل الوضع الداكن؟</summary>
                    <p>اضغط على أيقونة الوضع الليلي في الشريط العلوي أو سيتم تفعيله تلقائيًا حسب إعدادات جهازك.</p>
                </details>
                <details>
                    <summary>هل بياناتي آمنة؟</summary>
                    <p>لا توجد خوادم خلفية — كل بياناتك (تسابيح، أدعية مفضلة، آخر موضع قراءة) محفوظة على جهازك فقط
                        ويمكنك حذفها في أي وقت.</p>
                </details>
                <details>
                    <summary>ما مصادر المحتوى الشرعي؟</summary>
                    <p>القرآن بنص مصحف المدينة (رواية حفص)، والأذكار والأدعية من مصادر صحيحة (صحيح البخاري ومسلم
                        والسنن)، مع مراجعة دورية.</p>
                </details>
                <details>
                    <summary>كيف أتواصل معكم؟</summary>
                    <p>تواصل عبر واتساب: <a href="https://wa.me/201093717869"
                            style="color:var(--primary);font-weight:700;">201093717869+</a> أو البريد <a
                            href="mailto:Monaajatak@gmail.com"
                            style="color:var(--primary);font-weight:700;">Monaajatak@gmail.com</a>.</p>
                </details>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // ── Mockup Carousel ──
            const track = document.getElementById('mockupTrack');
            const slides = document.querySelectorAll('.mockup-slide');
            const dots = document.querySelectorAll('.mockup-dot');
            const prevBtn = document.getElementById('mockPrev');
            const nextBtn = document.getElementById('mockNext');
            let currentSlide = 0;
            let autoTimer;

            function goToSlide(i) {
                if (i < 0) i = slides.length - 1;
                if (i >= slides.length) i = 0;
                currentSlide = i;

                track.style.transform = `translateX(${currentSlide * 100}%)`;

                slides.forEach((s, idx) => {
                    s.classList.toggle('active', idx === currentSlide);
                });
                dots.forEach((d, idx) => {
                    d.classList.toggle('active', idx === currentSlide);
                });

                resetAutoPlay();
            }

            prevBtn.addEventListener('click', () => goToSlide(currentSlide - 1));
            nextBtn.addEventListener('click', () => goToSlide(currentSlide + 1));

            dots.forEach(dot => {
                dot.addEventListener('click', () => goToSlide(parseInt(dot.dataset.i)));
            });

            // Auto-play
            function resetAutoPlay() {
                clearInterval(autoTimer);
                autoTimer = setInterval(() => goToSlide(currentSlide + 1), 5000);
            }
            resetAutoPlay();

            // Swipe on mockup
            let mockTouchStart = 0;
            const showcase = document.querySelector('.mockup-showcase');
            showcase.addEventListener('touchstart', e => { mockTouchStart = e.touches[0].clientX; }, { passive: true });
            showcase.addEventListener('touchend', e => {
                const diff = e.changedTouches[0].clientX - mockTouchStart;
                if (Math.abs(diff) > 50) {
                    if (diff > 0) goToSlide(currentSlide - 1);
                    else goToSlide(currentSlide + 1);
                }
            }, { passive: true });
        });
    </script>
@endpush
