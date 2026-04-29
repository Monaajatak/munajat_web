<!-- CtaSection.vue -->
<template>
  <section class="cta-wrapper">
    <div class="cta-section reveal" id="download">
      <div class="cta-glow" aria-hidden="true"></div>
      <div class="cta-pattern" aria-hidden="true"></div>

      <div class="cta-inner">
        <span class="cta-eyebrow">
          <span class="eyebrow-dot"></span>
          ابدأ رحلتك الإيمانية
        </span>

        <h2>حمّل التطبيق واشعر بالسكينة</h2>

        <p class="cta-lead">
          تجربة عبادة متكاملة تعمل بدون إنترنت، بدون إعلانات، ومجانية بالكامل.
          اختر المتجر المفضل لديك للبدء.
        </p>

        <div class="store-cards">
          <a
            href="https://play.google.com/store/apps/details?id=com.mahmoudmourad.monologue"
            target="_blank"
            class="store-card"
          >
            <div class="store-card-icon">
              <img
                src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/google-play/default.svg"
                alt="Google Play"
              />
            </div>
            <div class="store-card-info">
              <span class="store-card-text">تحميل من</span>
              <span class="store-card-name">Google Play</span>
            </div>
          </a>

          <a
            href="https://apps.apple.com/ua/app/%D9%85%D9%86%D8%A7%D8%AC%D8%A7%D8%AA%D9%83-%D8%B1%D9%81%D9%8A%D9%82-%D8%A7%D9%84%D8%B7%D8%A7%D8%B1%D8%A9-%D8%A7%D9%84%D9%8A%D9%88%D9%85%D9%8A/id6759576802"
            target="_blank"
            class="store-card"
          >
            <div class="store-card-icon">
              <img
                src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/app-store/default.svg"
                alt="App Store"
              />
            </div>
            <div class="store-card-info">
              <span class="store-card-text">تحميل من</span>
              <span class="store-card-name">App Store</span>
            </div>
          </a>

          <a
            href="https://appgallery.huawei.com/app/C117271909"
            target="_blank"
            class="store-card"
          >
            <div class="store-card-icon">
              <img
                src="https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/huawei/default.svg"
                alt="AppGallery"
              />
            </div>
            <div class="store-card-info">
              <span class="store-card-text">تحميل من</span>
              <span class="store-card-name">AppGallery</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.cta-wrapper {
  padding: 4rem 24px;
  display: flex;
  justify-content: center;
}

/* Hero Teal Gradient — mirrors mobile Prayer/Streak hero card */
.cta-section {
  position: relative;
  width: 100%;
  max-width: 1100px;
  padding: 72px 48px;
  text-align: center;
  border-radius: 28px;
  overflow: hidden;
  color: #ffffff;
  background: linear-gradient(135deg, var(--teal-deep) 0%, var(--teal-light) 100%);
  border: 1px solid rgba(255, 255, 255, 0.08);
  box-shadow: 0 24px 60px rgba(15, 118, 110, 0.25);
  isolation: isolate;
}

[data-theme="dark"] .cta-section {
  box-shadow: 0 24px 60px rgba(0, 0, 0, 0.45);
}

/* Soft radial glow accent */
.cta-glow {
  position: absolute;
  inset: 0;
  background:
    radial-gradient(circle at 12% 18%, rgba(255, 255, 255, 0.18), transparent 40%),
    radial-gradient(circle at 90% 90%, rgba(0, 209, 227, 0.25), transparent 45%);
  z-index: -1;
  pointer-events: none;
}

/* Subtle dotted pattern for spiritual texture */
.cta-pattern {
  position: absolute;
  inset: 0;
  background-image: radial-gradient(rgba(255, 255, 255, 0.06) 1px, transparent 1px);
  background-size: 22px 22px;
  opacity: 0.6;
  z-index: -1;
  pointer-events: none;
}

.cta-inner {
  position: relative;
  z-index: 1;
}

/* Eyebrow chip */
.cta-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 18px;
  border-radius: var(--radius-pill);
  background: rgba(255, 255, 255, 0.12);
  border: 1px solid rgba(255, 255, 255, 0.18);
  font-size: 13px;
  font-weight: 700;
  color: #ffffff;
  letter-spacing: 0.02em;
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  margin-bottom: 24px;
}

.eyebrow-dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: #ffffff;
  opacity: 0.7;
}

.cta-section h2 {
  font-size: clamp(28px, 4vw, 42px);
  font-weight: 800;
  letter-spacing: -0.01em;
  margin-bottom: 16px;
  color: #ffffff;
  line-height: 1.3;
}

.cta-lead {
  max-width: 620px;
  margin: 0 auto 36px;
  font-size: 17px;
  line-height: 1.8;
  color: rgba(255, 255, 255, 0.85);
}

/* Store cards on dark teal background */
.store-cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 14px;
  margin-top: 0;
}

.cta-section .store-card {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  padding: 12px 22px;
  background: rgba(255, 255, 255, 0.10);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: var(--radius-pill);
  text-decoration: none;
  transition: all var(--transition-fast);
  min-width: 200px;
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
}

.cta-section .store-card:hover {
  background: rgba(255, 255, 255, 0.18);
  border-color: rgba(255, 255, 255, 0.32);
  transform: translateY(-3px);
  box-shadow: 0 10px 24px rgba(0, 0, 0, 0.18);
}

.cta-section .store-card-icon {
  width: 26px;
  height: 26px;
  display: grid;
  place-items: center;
  flex-shrink: 0;
}

.cta-section .store-card-icon img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}

.cta-section .store-card-info {
  display: flex;
  flex-direction: column;
  text-align: right;
}

.cta-section .store-card-text {
  font-size: 11px;
  color: rgba(255, 255, 255, 0.75);
  font-weight: 600;
}

.cta-section .store-card-name {
  font-size: 15px;
  font-weight: 800;
  color: #ffffff;
}

@media (max-width: 768px) {
  .cta-wrapper {
    padding: 3rem 16px;
  }
  .cta-section {
    padding: 48px 24px;
    border-radius: 24px;
  }
  .cta-lead {
    font-size: 15px;
  }
  .cta-section .store-card {
    min-width: 0;
    width: 100%;
    justify-content: center;
  }
}

@media (max-width: 480px) {
  .cta-wrapper {
    padding: 2.5rem 12px;
  }
  .cta-section {
    padding: 40px 18px;
    border-radius: 22px;
  }
  .cta-section h2 {
    font-size: 26px;
  }
  .cta-lead {
    font-size: 14px;
    margin-bottom: 28px;
  }
  .store-cards {
    gap: 10px;
  }
  .cta-section .store-card-icon {
    width: 22px;
    height: 22px;
  }
}
</style>
