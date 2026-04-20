<script setup>
const currentSlide = ref(0)
const screenshots = [
  { img: '/images/screenshots/01_App_Overview.png', title: 'نظرة عامة', desc: 'تجربة مستخدم هادئة ومنظمة' },
  { img: '/images/screenshots/02_Quran_Reading.png', title: 'القرآن الكريم', desc: 'قراءة بالرسم العثماني مع تحكم في الخط' },
  { img: '/images/screenshots/03_Quran_Listening.png', title: 'الاستماع تلاوات', desc: 'أشهر القراء بأعلى جودة صوتية' },
  { img: '/images/screenshots/04_Electronic_Sebha.png', title: 'السبحة الإلكترونية', desc: 'عداد تسبيح ذكي مع اهتزازات' },
  { img: '/images/screenshots/06_Athkar_Daily.png', title: 'الأذكار اليومية', desc: 'أذكار الصباح والمساء وكل ما تحتاجه' },
  { img: '/images/screenshots/07_Qibla_Compass.png', title: 'بوصلة القبلة', desc: 'تحديد دقيق لاتجاه القبلة من أي مكان' },
  { img: '/images/screenshots/08_Dark_Light_Mode.png', title: 'الوضع الليلي', desc: 'دعم كامل للوضع الداكن لراحة عينك' }
]

const nextSlide = () => {
  currentSlide.value = (currentSlide.value + 1) % screenshots.length
}

const prevSlide = () => {
  currentSlide.value = (currentSlide.value - 1 + screenshots.length) % screenshots.length
}

const setSlide = (index) => {
  currentSlide.value = index
}
</script>

<template>
  <div class="app-showcase">
    <div class="mockup-display">
      <div v-for="(screen, index) in screenshots" :key="index" 
           class="mockup-slide" :class="{ 'active': currentSlide === index }">
        <div class="phone-device">
          <div class="phone-notch">
            <div class="phone-speaker"></div>
            <div class="phone-camera"></div>
          </div>
          <div class="phone-screen">
            <img :src="screen.img" :alt="screen.title" class="screen-img">
          </div>
          <div class="phone-buttons">
            <div class="power-btn"></div>
            <div class="volume-up"></div>
            <div class="volume-down"></div>
          </div>
        </div>
        
        <div class="mockup-caption">
          <span class="mockup-badge">الميزة الأساسية</span>
          <h3>{{ screen.title }}</h3>
          <p>{{ screen.desc }}</p>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <div class="mockup-nav">
      <button @click="prevSlide" class="mockup-arrow prev" aria-label="السابق">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
      </button>
      
      <div class="mockup-dots">
        <div v-for="(_, index) in screenshots" :key="index"
             class="mockup-dot" :class="{ 'active': currentSlide === index }"
             @click="setSlide(index)">
        </div>
      </div>

      <button @click="nextSlide" class="mockup-arrow next" aria-label="التالي">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
      </button>
    </div>
  </div>
</template>

<style scoped>
.app-showcase {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    width: 100%;
}

.mockup-display {
    position: relative;
    width: 100%;
    height: 680px;
    display: flex;
    justify-content: center;
}

.mockup-slide {
    position: absolute;
    top: 0;
    opacity: 0;
    transform: scale(0.95);
    transition: all 0.6s cubic-bezier(0.2, 0, 0, 1);
    pointer-events: none;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 24px;
}

.mockup-slide.active {
    opacity: 1;
    transform: scale(1);
    pointer-events: all;
}

.phone-screen {
    width: 100%;
    height: 100%;
    overflow: hidden;
    background: #000;
    border-radius: 32px;
}

.screen-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Animations for sliding effect */
.phone-device {
    transition: transform 0.4s var(--transition-spring);
}

.mockup-slide.active .phone-device:hover {
    transform: perspective(1000px) rotateY(-5deg) rotateX(2deg);
}

@media (max-width: 768px) {
    .mockup-display {
        height: 580px;
    }
}
</style>
