<template>
  <section id="reviews" class="reviews-section container reveal">
    <div class="section-header">
      <span class="badge reveal-delay-1">آراء المستخدمين</span>
      <h2 class="reveal-delay-2">ماذا يقول <span class="text-gradient">المستخدمون</span></h2>
      <p class="reveal-delay-3">تجارب حقيقية من مجتمع مُناجاتك حول العالم.</p>
    </div>

    <div class="reviews-grid">
      <!-- Review 1 -->
      <div class="review-card card-glass reveal-delay-1">
        <div class="stars">★★★★★</div>
        <p class="review-text">"أخيراً تطبيق إسلامي نظيف تماماً من الإعلانات! التصميم هادئ جداً ويساعد على الخشوع، والمصحف خطه ممتاز ومريح للعين. جزاكم الله خيراً."</p>
        <span class="reviewer">— عبد الرحمن م.</span>
      </div>

      <!-- Review 2 -->
      <div class="review-card card-glass reveal-delay-2">
        <div class="stars">★★★★★</div>
        <p class="review-text">"أحترم جداً اهتمامكم بالخصوصية. فكرة أن التطبيق يعمل أوفلاين بالكامل ولا يطلب تسجيل دخول هي ميزة نادرة اليوم. تطبيق يستحق كل التقدير."</p>
        <span class="reviewer">— مريم ص.</span>
      </div>

      <!-- Review 3 -->
      <div class="review-card card-glass reveal-delay-3">
        <div class="stars">★★★★★</div>
        <p class="review-text">"مواقيت الصلاة دقيقة جداً، والقبلة تعمل بامتياز. أكثر ما يعجبني هو بساطة الواجهة وعدم وجود أي مشتتات. رفيقي اليومي فعلاً."</p>
        <span class="reviewer">— عمر خ.</span>
      </div>
    </div>
  </section>
</template>

<style scoped>
.reviews-section {
    padding: 100px 0;
    position: relative;
}

.section-header {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 60px;
}

.reviews-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
}

.review-card {
    padding: 32px;
    border-radius: 24px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.4s ease;
    border: 1px solid var(--border-color);
}

.review-card:hover {
    transform: translateY(-8px);
    border-color: rgba(var(--primary-rgb), 0.3);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
}

.stars {
    color: #f59e0b;
    font-size: 18px;
    margin-bottom: 20px;
    letter-spacing: 2px;
}

.review-text {
    font-size: 16px;
    line-height: 1.8;
    color: var(--text-secondary);
    margin-bottom: 24px;
    font-style: italic;
}

.reviewer {
    font-size: 14px;
    font-weight: 700;
    color: var(--primary);
    opacity: 0.8;
}

@media (max-width: 768px) {
    .reviews-section { padding: 60px 0; }
    .review-card { padding: 24px; }
}
</style>
