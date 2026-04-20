<template>
  <section class="contact-section" id="contact">
    <div class="container">
      <div class="section-head reveal">
        <span class="chip">تواصل معنا</span>
        <h2>نحن هنا للاستماع إليك</h2>
        <p class="lead">سواء كان لديك تساؤل، اقتراح، أو ترغب في دعم المشروع، يسعدنا دائماً تواصلك معنا.</p>
      </div>

      <div class="contact-grid reveal-delay-2">
        <a href="mailto:Monaajatak@gmail.com" class="contact-card">
          <div class="icon-box email">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
          </div>
          <div class="info">
            <span class="label">البريد الإلكتروني</span>
            <span class="value">Monaajatak@gmail.com</span>
          </div>
        </a>

        <a href="https://wa.me/201093717869" target="_blank" class="contact-card">
          <div class="icon-box whatsapp">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          </div>
          <div class="info">
            <span class="label">واتساب</span>
            <span class="value">201093717869+</span>
          </div>
        </a>

        <a href="https://t.me/monaajatak" target="_blank" class="contact-card">
          <div class="icon-box telegram">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
          </div>
          <div class="info">
            <span class="label">تليجرام</span>
            <span class="value">t.me/monaajatak</span>
          </div>
        </a>
      </div>
    </div>
  </section>
</template>

<style scoped>
.contact-section {
  padding: 80px 0;
  position: relative;
}

.contact-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  margin-top: 48px;
}

.contact-card {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 20px;
  background: var(--card-bg);
  border: 1px solid var(--border-color);
  border-radius: var(--radius-sm);
  transition: all var(--transition);
  text-decoration: none;
  color: inherit;
}

.contact-card:hover {
  transform: translateY(-5px);
  border-color: var(--primary);
  box-shadow: var(--shadow);
}

.icon-box {
  width: 52px;
  height: 52px;
  border-radius: 14px;
  display: grid;
  place-items: center;
  flex-shrink: 0;
}

.icon-box.email { background: rgba(var(--primary-rgb), 0.1); color: var(--primary); }
.icon-box.whatsapp { background: rgba(34, 197, 94, 0.1); color: #22c55e; }
.icon-box.telegram { background: rgba(var(--brand-orange), 0.1); color: var(--brand-orange); }

.info {
  display: flex;
  flex-direction: column;
}

.label {
  font-size: 13px;
  color: var(--muted);
  font-weight: 600;
  margin-bottom: 2px;
}

.value {
  font-weight: 700;
  font-size: 15px;
  color: var(--text);
  word-break: break-all;
}

@media (max-width: 992px) {
  .contact-grid {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 640px) {
  .contact-grid {
    grid-template-columns: 1fr;
  }
  .contact-card {
    padding: 16px;
  }
}
</style>
