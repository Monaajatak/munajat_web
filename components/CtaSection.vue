<!-- CtaSection.vue -->
<template>
  <div class="cta-section reveal" id="download">
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
                  <img src="/images/huawei-appgallery-thumb-150x150.png.webp" alt="AppGallery">
              </div>
              <div class="store-card-info">
                  <span class="store-card-text">تحميل من</span>
                  <span class="store-card-name">AppGallery</span>
              </div>
          </a>
      </div>
      <div class="mt-5">
          <a href="https://github.com/mosayyyed/monologue/releases/latest" target="_blank"
              class="btn btn-outline btn-lg" style="border-radius: 50px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" style="margin-left: 8px;">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                  <polyline points="7 10 12 15 17 10"></polyline>
                  <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
              تحميل مباشر (APK)
          </a>
      </div>
  </div>
</template>

<style scoped>
.cta-section {
    padding: 80px 20px;
    text-align: center;
    margin: 4rem 0;
    background: var(--cta-gradient);
    color: var(--cta-text);
    border-radius: 40px;
}
.mb-4 { margin-bottom: 1.5rem; }
.mb-5 { margin-bottom: 2.5rem; }
.mt-5 { margin-top: 2.5rem; }
</style>
