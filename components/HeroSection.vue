<template>
  <section id="hero" class="hero reveal">
    <div class="hero-bg-pattern"></div>
    <div class="container hero-grid">
      <div class="hero-content">
        <div class="hero-logo-tagline reveal-delay-1">
          <span class="tagline-dot"></span>
          <span>مُناجاتك — رفيقك الإيماني اليومي</span>
        </div>
        
        <h1 class="reveal-delay-2">اجعل طاعتك أقرب مع <span class="text-teal">مُناجاتك</span></h1>
        
        <p class="lead reveal-delay-3">
          تجربة هادئة وسريعة تجمع لك القرآن الكريم، الأذكار، والتسبيح في تطبيق واحد. صُمم ليرافقك في كل خطوة نحو رضا الله، بدون إعلانات وبشكل مجاني تماماً.
        </p>

        <div class="hero-actions reveal-delay-4">
          <a href="https://play.google.com/store/apps/details?id=com.mahmoudmourad.monologue" target="_blank" class="btn btn-primary btn-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
            تحميل التطبيق الآن
          </a>
          <a href="#features" class="btn btn-outline btn-lg">اكتشف المميزات</a>
        </div>

        <div class="hero-trust-bar card card-glass reveal-delay-5">
           <div class="trust-item">
              <span class="trust-count">2000+</span>
              <span class="trust-label">تحميل التطبيق</span>
           </div>
           <div class="trust-divider"></div>
           <div class="trust-item">
              <span class="trust-count">4.9/5</span>
              <span class="trust-label">تقييم النجوم</span>
           </div>
           <div class="trust-divider"></div>
           <div class="trust-item">
              <span class="trust-count">100%</span>
              <span class="trust-label">مجاني للأبد</span>
           </div>
        </div>
      </div>

      <div class="hero-visual reveal-delay-3">
        <AppShowcase />
      </div>
    </div>
  </section>
</template>

<style scoped>
.hero {
    min-height: 88vh;
    display: flex;
    align-items: center;
    padding: 72px 0 84px;
}

.hero-grid {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 80px;
    align-items: center;
}

.ml-2 { margin-left: 8px; }

/* Content Styling */
.hero-content {
    text-align: right;
}

.hero-content h1 {
    font-size: clamp(32px, 4.5vw, 54px);
    margin: 20px 0 18px;
    line-height: 1.2;
}

.hero-actions {
    display: flex;
    gap: 16px;
    margin-bottom: 36px;
}

/* Brand emphasis aligned to mobile teal identity (no orange in hero). */
.text-teal {
    color: var(--primary);
    background: none;
    -webkit-text-fill-color: var(--primary);
}

/* Trust Bar */
.hero-trust-bar {
    display: flex;
    align-items: center;
    gap: 24px;
    padding: 14px 26px;
    width: fit-content;
    border-radius: 20px;
}

.trust-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    flex: 1;
}

.trust-count {
    font-size: 20px;
    font-weight: 800;
    color: var(--primary);
}

.trust-label {
    font-size: 13px;
    color: var(--muted);
    font-weight: 600;
}

.trust-divider {
    width: 1px;
    height: 32px;
    background: var(--border-color);
    opacity: 0.5;
}

/* Visual Styling */
.hero-visual {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

@media (max-width: 1024px) {
    .hero {
        padding: 36px 0 56px;
    }
    .hero-grid {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 40px;
    }
    .hero-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .hero-content h1 {
        margin: 0 auto 24px;
    }
    .hero-content .lead {
        margin: 0 auto 32px;
        max-width: 600px;
    }
    .hero-actions {
        justify-content: center;
    }
    .hero-trust-bar {
        margin: 0 auto;
    }
}

@media (max-width: 480px) {
    .hero {
        min-height: auto;
        padding: 48px 0 36px;
    }
    .hero-content h1 {
        font-size: 32px !important;
    }
    .hero-content .lead {
        font-size: 15px;
        max-width: 100%;
        padding: 0 6px;
    }
    .hero-actions {
        flex-direction: column;
        width: 100%;
        gap: 12px;
    }
    .hero-actions .btn {
        width: 100% !important;
        padding: 16px;
        font-size: 16px;
        gap: 10px;
    }
    .hero-trust-bar {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        display: grid;
        width: 100%;
        padding: 12px 10px;
        gap: 8px;
    }
    .hero-trust-bar .trust-item:last-child {
        grid-column: 1 / -1;
    }
    .trust-divider { display: none; }
    .trust-label { font-size: 10px; white-space: normal; }
    .trust-count { font-size: 17px; }
}

@media (max-width: 360px) {
    .hero {
        padding: 48px 0 36px;
    }
}
</style>
