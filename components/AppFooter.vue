Anyway. Yeah. Eh. Variant. Yep. Traveling for Mr Nichols. <template>
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <NuxtLink to="/" class="brand">
            <img src="/images/Icon_Teal_SVG.svg" alt="شعار مُناجاتك" width="32" height="32" class="logo-light">
            <img src="/images/Icon_White_SVG.svg" alt="شعار مُناجاتك" width="32" height="32" class="logo-dark">
            <strong class="brand-name">مُناجاتك</strong>
          </NuxtLink>
          <p class="footer-desc">رفيق الطاعة اليومي في رحلتك الإيمانية. تطبيق مجاني، خالي من الإعلانات، ويحترم خصوصيتك.</p>
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
          <NuxtLink to="/privacy-policy">سياسة الخصوصية</NuxtLink>
        </div>
        <div class="footer-col">
          <h4>تواصل معنا</h4>
          <a href="mailto:Monaajatak@gmail.com">Monaajatak@gmail.com</a>
          <a href="https://wa.me/201093717869" target="_blank">واتساب</a>
          <a href="https://t.me/monaajatak" target="_blank">تليجرام</a>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="credits">
          <p>
            تم التطوير بكل 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#ef4444" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
            بواسطة فريق <strong class="brand-highlight">مُناجاتك</strong>
          </p>
        </div>
        <div class="legal-social">
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
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
const currentYear = new Date().getFullYear();
</script>

<style scoped>
.footer-desc {
    margin-top: 16px;
    font-size: 14px;
    color: var(--text-secondary);
    line-height: 1.7;
    max-width: 320px;
}

.footer-bottom {
    display: flex;
    flex-direction: column;
    gap: 20px;
    align-items: center;
    text-align: center;
    padding-top: 32px;
    border-top: var(--border);
}

.icon-heart {
    display: inline;
    margin: 0 4px;
    vertical-align: middle;
}

.brand-highlight {
    color: var(--primary);
}

.legal-social {
    display: flex;
    align-items: center;
    gap: 24px;
    flex-wrap: wrap;
    justify-content: center;
    font-size: 13px;
    color: var(--muted);
}

@media (max-width: 768px) {
    .footer-desc {
        max-width: 100%;
    }
}
</style>
