<template>
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <NuxtLink to="/" class="brand">
            <img src="/images/Icon_White_SVG.svg" alt="شعار مُناجاتك" width="32" height="32">
            <strong class="brand-name">مُناجاتك</strong>
          </NuxtLink>
          <p style="margin-top:12px;font-size:14px;color:var(--text-secondary);">رفيق الطاعة اليومي في رحلتك الإيمانية. تطبيق مجاني، خالي من الإعلانات، ويحترم خصوصيتك.</p>
        </div>
        <div class="footer-col">
          <h4>روابط سريعة</h4>
          <NuxtLink to="/#features">المميزات</NuxtLink>
          <NuxtLink to="/#about">القصة</NuxtLink>
          <NuxtLink to="/#team">الفريق</NuxtLink>
          <NuxtLink to="/#faq">الأسئلة الشائعة</NuxtLink>
        </div>
        <div class="footer-col">
          <h4>القانونية</h4>
          <a href="https://sites.google.com/view/munajat-app" target="_blank">سياسة الخصوصية</a>
        </div>
        <div class="footer-col">
          <h4>تواصل معنا</h4>
          <a href="mailto:Monaajatak@gmail.com">Monaajatak@gmail.com</a>
          <a href="https://wa.me/201093717869" target="_blank">واتساب</a>
          <a href="https://t.me/monaajatak" target="_blank">تليجرام</a>
        </div>
      </div>
      <div class="footer-bottom" style="flex-direction: column; gap: 12px; align-items: center; text-align: center;">
        <p>تم التطوير بكل 
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#ef4444" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-inline" style="margin:0 4px;"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
          بواسطة فريق <strong style="color:var(--primary);">مُناجاتك</strong></p>
        <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;justify-content:center;">
          <span>© {{ currentYear }} مُناجاتك — جميع الحقوق محفوظة</span>
          <div class="footer-social">
            <a href="https://facebook.com/Monaajatak" target="_blank" aria-label="Facebook">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
            <a href="https://instagram.com/monaajatak" target="_blank" aria-label="Instagram">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
            </a>
            <a href="https://tiktok.com/@monaajatak" target="_blank" aria-label="TikTok">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"/></svg>
            </a>
            <a href="https://wa.me/201093717869" target="_blank" aria-label="WhatsApp">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </a>
            <a href="https://t.me/monaajatak" target="_blank" aria-label="Telegram">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
const currentYear = new Date().getFullYear();
</script>
