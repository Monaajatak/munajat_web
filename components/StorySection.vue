<template>
  <section id="vision" class="story-section container reveal">
    <div class="section-header">
      <h2 class="reveal-delay-1">أثرٌ يبقى.. وبِعلمٍ يُنتفَعُ به</h2>
      <p class="reveal-delay-2">عندما تلتقي التقنية بالإخلاص، يولد الجمال.</p>
    </div>

    <div class="vision-container reveal-delay-3">
      <div class="vision-card card-glass">
        <div class="quote-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/></svg>
        </div>
        
        <div class="vision-content">
          <p>
            "لم أبني هذا التطبيق ليُكتب سطرًا في سيرتي الذاتية، بل ليكون <strong>رفيقًا مخلصًا</strong> لكل مسلم. 
            بدأت الفكرة برغبة في ترك <strong>صدقة جارية</strong> حقيقية، تطبيق نظيف من الإعلانات، يحفظ خصوصيتك، ويجمعك بالله في خلوتك. 
            هو إهداء لكل من علمني حرفًا، ولكل من رحل عن دنيانا ولم يجد من يتصدق عنه."
          </p>
        </div>

        <div class="vision-footer">
          <div class="author-info">
            <span class="author-name">محمود مراد</span>
            <div class="author-line"></div>
          </div>
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
    max-width: 900px;
    margin: 0 auto;
}

.vision-card {
    padding: 60px 80px;
    border-radius: 40px;
    position: relative;
    border: 1px solid rgba(var(--primary-rgb), 0.08);
}

.quote-icon {
    margin-bottom: 40px;
    color: rgba(var(--primary-rgb), 0.2);
    display: flex;
    justify-content: center;
}

.vision-content p {
    font-size: 20px;
    line-height: 2;
    color: var(--text);
    font-weight: 500;
    text-align: justify;
    text-align-last: center;
    direction: rtl;
}

.vision-content strong {
    color: var(--primary);
    font-weight: 800;
}

.vision-footer {
    margin-top: 40px;
    display: flex;
    justify-content: center;
}

.author-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}

.author-name {
    font-size: 18px;
    font-weight: 700;
    color: var(--muted);
}

.author-line {
    width: 40px;
    height: 2px;
    background: var(--primary);
    border-radius: 2px;
}

@media (max-width: 768px) {
    .story-section { padding: 60px 0; }
    .vision-card { padding: 40px 30px; border-radius: 30px; }
    .vision-content p { font-size: 17px; line-height: 1.8; }
}
</style>
