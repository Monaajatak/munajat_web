<template>
  <section id="team" class="team-section container reveal">
    <div class="section-header">
      <span class="badge reveal-delay-1">فريق العمل</span>
      <h2 class="reveal-delay-2">من يقف خلف <span class="text-gradient">مُناجاتك؟</span></h2>
      <p class="reveal-delay-3">نحن مجموعة من المطورين المهتمين بتطويع التقنية لخدمة المجتمع الإسلامي.</p>
    </div>

    <div class="team-grid">
      <!-- Mahmoud Mourad -->
      <div class="member-card card-glass reveal-delay-2">
        <div class="member-avatar">
          <div class="avatar-ring"></div>
          <img src="https://github.com/mahmoudmourad9.png" alt="Mahmoud Mourad" loading="lazy" decoding="async">
        </div>
        <div class="member-info">
          <h3>محمود مراد</h3>
          <span class="member-role">Software Engineer & Flutter Developer</span>
          <p class="member-bio">مؤسس مُناجاتك ومهندس برمجيات متخصص في تقنيات Flutter. يُكرس خبرته لبناء جسور رقمية تربط المسلم بعبادته، مؤمناً بأن التكنولوجيا وسيلة لإحداث أثر إيماني مستدام وصدقة جارية تنفع الأمة.</p>
          <div class="social-links">
            <a href="https://mahmoudmourad.com" target="_blank" class="social-btn" aria-label="Website">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
            </a>
            <a href="https://github.com/mahmoudmourad9" target="_blank" class="social-btn" aria-label="GitHub">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Mohamed Elsayed -->
      <div class="member-card card-glass reveal-delay-3">
        <div class="member-avatar">
          <div class="avatar-ring"></div>
          <img src="https://github.com/mosayyyed.png" alt="Mohamed Elsayed" loading="lazy" decoding="async">
        </div>
        <div class="member-info">
          <h3>محمد السيد</h3>
          <span class="member-role">Software Engineer & Flutter Developer</span>
          <p class="member-bio">مهندس برمجيات ومطور تطبيقات الهاتف المحمول. يجمع بين الدقة البرمجية واللمسة الفنية لبناء تجارب مستخدم استثنائية، مساهماً في تحويل الرؤية التقنية لمُناجاتك إلى واقع رقمي متكامل وعالي الأداء.</p>
          <div class="social-links">
            <a href="https://mosayyyed.me" target="_blank" class="social-btn" aria-label="Website">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
            </a>
            <a href="https://linkedin.com/in/mosayyyed" target="_blank" class="social-btn" aria-label="LinkedIn">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.team-section {
    padding: 100px 0;
}

.section-header {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 60px;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
}

.member-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 40px 30px;
    border-radius: 32px;
    transition: all 0.4s var(--transition-spring);
}

.member-card:hover {
    transform: translateY(-10px);
    border-color: rgba(var(--primary-rgb), 0.3);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.member-avatar {
    position: relative;
    width: 100px;
    height: 100px;
    margin-bottom: 24px;
}

.member-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    position: relative;
    z-index: 2;
    border: 3px solid var(--card-bg);
}

.avatar-ring {
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border: 2px dashed rgba(var(--primary-rgb), 0.3);
    border-radius: 50%;
    animation: rotate 20s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.member-info h3 {
    font-size: 22px;
    font-weight: 800;
    margin-bottom: 8px;
}

.member-role {
    color: var(--primary);
    font-weight: 700;
    font-size: 14px;
    display: block;
    margin-bottom: 16px;
    opacity: 0.9;
}

.member-bio {
    color: var(--text-secondary);
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 24px;
}

.social-links {
    display: flex;
    gap: 12px;
}

.social-btn {
    width: 38px;
    height: 38px;
    border-radius: 12px;
    background: rgba(var(--primary-rgb), 0.05);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text);
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.social-btn:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-3px);
}

@media (max-width: 768px) {
    .team-section { padding: 60px 0; }
    .member-card { padding: 30px 20px; }
}
</style>
