<script setup>
const faqs = ref([
  {
    question: 'هل التطبيق مجاني بالكامل؟',
    answer: 'نعم، تطبيق "مُناجاتك" مجاني 100%، ولا يحتوي على أي إعلانات أو عمليات شراء داخل التطبيق. هو صدقة جارية خالصة لله تعالى.',
    open: true
  },
  {
    question: 'هل يدعم التطبيق العمل بدون إنترنت؟',
    answer: 'نعم، معظم ميزات التطبيق مثل القرآن والأذكار والمسبحة تعمل تماماً بدون اتصال بالإنترنت، مما يجعله رفيقك في السفر والأماكن البعيدة.',
    open: false
  },
  {
    question: 'هل يحافظ التطبيق على خصوصيتي؟',
    answer: 'بكل تأكيد. التطبيق لا يطلب أي صلاحيات غير ضرورية، ولا يجمع بياناتك الشخصية، ولا يطلب تسجيل دخول. بياناتك ملك لك وحدك.',
    open: false
  },
  {
    question: 'كيف يمكنني المساهمة في تطوير التطبيق؟',
    answer: 'نسعد دائماً بمقترحاتكم! يمكنك التواصل معنا عبر الواتساب أو البريد الإلكتروني الموجود في نهاية الصفحة، أو بمشاركة التطبيق مع من تحب.',
    open: false
  }
])

const toggleFaq = (index) => {
  faqs.value = faqs.value.map((f, i) => ({
    ...f,
    open: i === index ? !f.open : false
  }))
}
</script>

<template>
  <section id="faq" class="faq-section container reveal">
    <div class="section-header">
      <span class="badge reveal-delay-1">الأسئلة الشائعة</span>
      <h2 class="reveal-delay-2">لديك <span class="text-gradient">أسئلة؟</span> لدينا إجابات</h2>
    </div>

    <div class="faq-list reveal-delay-3">
      <div v-for="(faq, index) in faqs" :key="index" 
           class="faq-item" :class="{ 'active': faq.open }">
        <button class="faq-trigger" @click="toggleFaq(index)" :aria-expanded="faq.open">
          <h3>{{ faq.question }}</h3>
          <span class="faq-icon">
            <svg v-if="!faq.open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </span>
        </button>
        
        <div class="faq-content" :style="{ maxHeight: faq.open ? '200px' : '0' }">
          <div class="faq-inner">
            <p>{{ faq.answer }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.faq-section {
    padding: 100px 0;
}

.section-header {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 60px;
}

.faq-list {
    max-width: 800px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.faq-item {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s var(--transition-fast);
}

.faq-item.active {
    border-color: rgba(var(--primary-rgb), 0.3);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}

.faq-trigger {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px 32px;
    background: none;
    border: none;
    cursor: pointer;
    text-align: right;
    transition: background 0.3s ease;
}

.faq-trigger:hover {
    background: rgba(var(--primary-rgb), 0.02);
}

.faq-trigger h3 {
    font-size: 18px;
    font-weight: 700;
    color: var(--text);
    margin: 0;
}

.faq-icon {
    color: var(--primary);
    transition: transform 0.3s ease;
    flex-shrink: 0;
    margin-right: 20px;
}

.faq-content {
    overflow: hidden;
    transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.faq-inner {
    padding: 0 32px 24px;
}

.faq-inner p {
    color: var(--text-secondary);
    line-height: 1.8;
    font-size: 15px;
    margin: 0;
}

@media (max-width: 768px) {
    .faq-section { padding: 60px 0; }
    .faq-trigger { padding: 20px 24px; }
    .faq-inner { padding: 0 24px 20px; }
}
</style>
