<template>
  <section class="contact-section" id="contact">
    <div class="container">
      <div class="section-header reveal">
        <span class="badge">تواصل معنا</span>
        <h2>نحن هنا للاستماع إليك</h2>
        <p class="lead">سواء كان لديك تساؤل، اقتراح، أو ترغب في دعم المشروع، يسعدنا دائماً تواصلك معنا.</p>
      </div>

      <div class="contact-grid reveal">
        <a href="mailto:Monaajatak@gmail.com" class="contact-item">
          <div class="contact-icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect width="20" height="16" x="2" y="4" rx="2" />
              <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
            </svg>
          </div>
          <div class="contact-content">
            <span class="contact-label">البريد الإلكتروني</span>
            <span class="contact-value">Monaajatak@gmail.com</span>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="contact-arrow">
            <path d="m15 18-6-6 6-6" />
          </svg>
        </a>

        <a href="https://wa.me/201093717869" target="_blank" class="contact-item">
          <div class="contact-icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
            </svg>
          </div>
          <div class="contact-content">
            <span class="contact-label">واتساب</span>
            <span class="contact-value">201093717869+</span>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="contact-arrow">
            <path d="m15 18-6-6 6-6" />
          </svg>
        </a>

        <a href="https://t.me/monaajatak" target="_blank" class="contact-item">
          <div class="contact-icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m22 2-7 20-4-9-9-4Z" />
              <path d="M22 2 11 13" />
            </svg>
          </div>
          <div class="contact-content">
            <span class="contact-label">تليجرام</span>
            <span class="contact-value">t.me/monaajatak</span>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="contact-arrow">
            <path d="m15 18-6-6 6-6" />
          </svg>
        </a>

        <a href="https://facebook.com/Monaajatak" target="_blank" class="contact-item">
          <div class="contact-icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
            </svg>
          </div>
          <div class="contact-content">
            <span class="contact-label">فيسبوك</span>
            <span class="contact-value">Monaajatak</span>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="contact-arrow">
            <path d="m15 18-6-6 6-6" />
          </svg>
        </a>
      </div>
    </div>
  </section>
</template>

<style scoped>
.contact-section { padding: 6rem 0; background: var(--bg-secondary); border-radius: 40px; margin: 4rem 0; }
.contact-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-top: 3rem; }
.contact-item {
    background: var(--surface); border: 1px solid var(--border); padding: 1.5rem; border-radius: 20px;
    display: flex; align-items: center; gap: 1.25rem; text-decoration: none; color: inherit; transition: all 0.3s;
}
.contact-item:hover { border-color: var(--primary); transform: translateX(-5px); box-shadow: 0 10px 30px rgba(0, 162, 181, 0.1); }
.contact-icon-wrapper { width: 48px; height: 48px; border-radius: 12px; background: rgba(0, 162, 181, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center; }
.contact-content { flex: 1; display: flex; flex-direction: column; }
.contact-label { font-size: 0.8rem; color: var(--text-secondary); margin-bottom: 2px; }
.contact-value { font-weight: 600; font-size: 0.95rem; }
.contact-arrow { color: var(--muted); transition: transform 0.3s; }
.contact-item:hover .contact-arrow { color: var(--primary); transform: translateX(-5px); }
</style>
