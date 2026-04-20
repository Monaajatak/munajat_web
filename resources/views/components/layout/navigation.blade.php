@props(['active' => ''])

<header class="nav container">
    <a href="{{ route('home') }}" class="brand">
        <img src="{{ asset('images/Icon_Teal_SVG.svg') }}" alt="شعار مُناجاتك" width="40" height="40" class="logo-light">
        <img src="{{ asset('images/Icon_White_SVG.svg') }}" alt="شعار مُناجاتك" width="40" height="40" class="logo-dark">
        <div class="brand-text">
            <span class="brand-kicker">Munajat</span>
            <strong class="brand-name">مُناجاتك</strong>
        </div>
    </a>

    <div class="nav-links" id="navLinks">
        <a href="{{ route('home') }}#hero">الرئيسية</a>
        <a href="{{ route('home') }}#features">المميزات</a>
        <a href="{{ route('home') }}#about">القصة</a>
        <a href="{{ route('home') }}#team">الفريق</a>
        <a href="{{ route('home') }}#faq">الأسئلة</a>
    </div>

    <div class="nav-actions">
        <button id="themeToggle" class="btn btn-icon btn-outline" type="button" aria-label="تبديل الوضع">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
        </button>
        <button id="menuToggle" class="menu-toggle" type="button" aria-label="القائمة" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
        </button>
        <a class="btn btn-primary btn-sm"
            href="https://play.google.com/store/apps/details?id=com.mahmoudmourad.monologue" target="_blank">
            تحميل التطبيق
        </a>
    </div>
</header>