<template>
  <section id="features" class="features-section container reveal">
    <div class="section-header">
      <span class="badge reveal-delay-1">مميزات التطبيق</span>
      <h2 class="reveal-delay-2">كل ما تحتاجه في <span class="text-gradient">تطبيق واحد</span></h2>
      <p class="reveal-delay-3">صممنا "مُناجاتك" ليكون رفيقك الإيماني المتكامل، مع تجربة مستخدم عصرية وسهلة.</p>
    </div>

    <div class="features-grid">
      <!-- 01: Quran -->
      <div class="feature-card reveal-delay-1">
        <div class="feature-icon quran-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5V4a2 2 0 0 1 2-2h10.9a2 2 0 0 1 2 2v15.5a2.5 2.5 0 0 1-2.5 2.5H6a2.5 2.5 0 0 1-2.5-2.5Z"/><path d="M9 2v8l3-2.25L15 10V2"/></svg>
        </div>
        <h3>القرآن الكريم</h3>
        <p>قراءة القرآن الكريم بالرسم العثماني مع إمكانية البحث وتفسير الآيات.</p>
      </div>

      <!-- 02: Audio Quran -->
      <div class="feature-card reveal-delay-2">
        <div class="feature-icon prayer-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
        </div>
        <h3>المصحف المسموع</h3>
        <p>استمع لتلاوات عطرة بأصوات أشهر القراء بجودة صوتية عالية.</p>
      </div>

      <!-- 03: Azkar -->
      <div class="feature-card reveal-delay-3">
        <div class="feature-icon azkar-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
        </div>
        <h3>الأذكار والأدعية</h3>
        <p>مكتبة شاملة من الأذكار الصباحية والمسائية والأدعية المستجابة لكل حال.</p>
      </div>

      <!-- 04: Sebha -->
      <div class="feature-card reveal-delay-4">
        <div class="feature-icon tasbih-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
        </div>
        <h3>سبحة إلكترونية</h3>
        <p>عداد تسبيح ذكي مع اهتزازات تفاعلية تساعدك على المداومة على الذكر.</p>
      </div>

      <!-- 05: Qibla -->
      <div class="feature-card reveal-delay-5">
        <div class="feature-icon qibla-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg>
        </div>
        <h3>بوصلة القبلة</h3>
        <p>حدد اتجاه القبلة بدقة متناهية من أي مكان في العالم عبر هاتفك.</p>
      </div>

      <!-- 06: Dark Mode -->
      <div class="feature-card reveal-delay-6">
        <div class="feature-icon notify-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6.36 6.36 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
        </div>
        <h3>الوضع الليلي</h3>
        <p>دعم كامل للوضع الداكن لتوفير راحة تامة للعين أثناء القراءة الليلية.</p>
      </div>
    </div>
  </section>
</template>

<style scoped>
.features-section {
    padding: 100px 0;
}

.section-header {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 60px;
}

.section-header h2 {
    font-size: clamp(32px, 4vw, 48px);
    margin: 20px 0;
}

/* Override/Extend global grid */
.features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

@media (max-width: 1024px) {
    .features-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .features-grid {
        grid-template-columns: 1fr;
    }
    .features-section {
        padding: 60px 0;
    }
}
</style>
