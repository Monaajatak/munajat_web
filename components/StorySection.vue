<template>
  <section id="vision" class="story-section container reveal">
    <div class="section-header">
      <h2 class="reveal-delay-1">أثرٌ يبقى.. وبِعلمٍ يُنتفَعُ به</h2>
      <p class="reveal-delay-2">عندما تلتقي التقنية بالإخلاص، يولد الجمال.</p>
    </div>

    <div class="vision-container reveal-delay-3">
      <div class="cta-box card-glass">
        <div class="cta-content">
          <h3>خُذ لحظتك الآن.. دعاءٌ يقرّبك ويطمئن قلبك</h3>
          <p>
            تطبيق مناجاة صُمّم ليكون رفيقك اليومي: بلا إعلانات، باحترام كامل لخصوصيتك،
            وبروحٍ تجمعك بالله في خلوتك. ابدأ اليوم، وشارك الأثر مع من تحب.
          </p>
        </div>

        <div class="cta-actions">
          <a class="cta-btn primary" href="#download">حمّل التطبيق الآن</a>
          <a class="cta-btn secondary" href="#features">اكتشف المميزات</a>
        </div>

        <div class="cta-highlights">
          <span>مجاني بالكامل</span>
          <span>بدون إعلانات</span>
          <span>خصوصية مضمونة</span>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.story-section {
    padding: 100px 0;
    text-align: center;
}

.section-header h2 {
    font-size: clamp(32px, 4vw, 42px);
    font-weight: 800;
    margin-bottom: 20px;
    color: var(--text);
}

.section-header p {
    color: var(--muted);
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 60px;
}

.vision-container {
  max-width: 980px;
  margin: 0 auto;
}

.cta-box {
  padding: 60px 70px;
  border-radius: 30px;
  position: relative;
  background: linear-gradient(140deg, rgba(var(--primary-rgb), 0.08), rgba(var(--primary-rgb), 0.02));
  border: 1px solid rgba(var(--primary-rgb), 0.16);
  box-shadow: var(--shadow-sm);
}

[data-theme="dark"] .cta-box {
  border-color: rgba(255, 255, 255, 0.12);
}

.cta-content h3 {
  font-size: clamp(24px, 3vw, 34px);
  font-weight: 800;
  color: var(--text);
  margin-bottom: 16px;
  direction: rtl;
}

.cta-content p {
  font-size: 18px;
  line-height: 1.9;
  color: var(--muted);
  margin: 0 auto 28px;
  max-width: 720px;
  direction: rtl;
}

.cta-actions {
  display: flex;
  gap: 14px;
  justify-content: center;
  flex-wrap: wrap;
}

.cta-btn {
  padding: 14px 26px;
  border-radius: 999px;
  font-weight: 700;
  font-size: 16px;
  text-decoration: none;
  transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease, color 0.2s ease;
}

.cta-btn.primary {
  background: var(--primary);
  color: #fff;
  box-shadow: 0 10px 24px rgba(var(--primary-rgb), 0.25);
}

.cta-btn.secondary {
  background: rgba(var(--primary-rgb), 0.10);
  color: var(--text);
}

.cta-btn:hover {
  transform: translateY(-2px);
}

.cta-highlights {
  margin-top: 24px;
  display: flex;
  justify-content: center;
  gap: 18px;
  flex-wrap: wrap;
  color: var(--muted);
  font-weight: 600;
  font-size: 14px;
}

.cta-highlights span {
  padding: 6px 14px;
  border-radius: 999px;
  background: rgba(var(--primary-rgb), 0.08);
}

@media (max-width: 768px) {
    .story-section { padding: 60px 0; }
    .cta-box { padding: 40px 28px; border-radius: 26px; }
    .cta-content p { font-size: 16px; line-height: 1.8; }
}

@media (max-width: 480px) {
  .story-section { padding: 48px 0; }
  .section-header h2 { font-size: 26px; }
  .section-header p { font-size: 15px; margin-bottom: 40px; }
  .cta-box { padding: 28px 20px; }
  .cta-content h3 { font-size: 22px; }
  .cta-content p { font-size: 15px; line-height: 1.7; }
  .cta-btn { width: 100%; text-align: center; }
}
</style>
