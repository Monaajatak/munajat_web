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
            <img :src="screen.img" :alt="screen.title" class="screen-img" loading="lazy" decoding="async">
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
    margin-top: 20px;
}

.mockup-display {
    position: relative;
    width: 100%;
  height: 660px;
    display: flex;
    justify-content: center;
  margin-bottom: 16px;
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
    gap: 32px;
}

.mockup-slide.active {
    opacity: 1;
    transform: scale(1);
    pointer-events: all;
}

.phone-device {
    width: 290px;
    height: 580px;
    background: #0f172a;
    border-radius: 40px;
    padding: 12px;
    position: relative;
    box-shadow: 0 40px 100px rgba(0,0,0,0.2), 0 0 0 4px rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
}

.phone-screen {
    width: 100%;
    height: 100%;
    overflow: hidden;
    background: #000;
    border-radius: 32px;
    position: relative;
}

.screen-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.mockup-caption {
    text-align: center;
    max-width: 320px;
}

.mockup-badge {
    display: inline-block;
    padding: 4px 12px;
    background: rgba(var(--primary-rgb), 0.1);
    color: var(--primary);
    border-radius: 99px;
    font-size: 11px;
    font-weight: 800;
    margin-bottom: 8px;
    border: 1px solid rgba(var(--primary-rgb), 0.1);
}

.mockup-caption h3 {
    font-size: 20px;
    font-weight: 800;
    margin-bottom: 8px;
    color: var(--text);
}

.mockup-caption p {
    font-size: 14px;
    color: var(--muted);
    line-height: 1.6;
}

/* Nav */
.mockup-nav {
    display: flex;
    align-items: center;
    gap: 24px;
    margin-top: 40px;
}

.mockup-arrow {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: 1px solid var(--border-color);
    background: var(--surface);
    color: var(--text);
    display: grid;
    place-items: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.mockup-arrow:hover {
    background: var(--primary);
    color: #fff;
    border-color: var(--primary);
}

.mockup-dots {
    display: flex;
    gap: 12px;
}

.mockup-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--border-color);
    cursor: pointer;
    transition: all 0.3s ease;
}

.mockup-dot.active {
    background: var(--primary);
    transform: scale(1.4);
}

@media (max-width: 768px) {
    .mockup-display {
    height: 560px;
    margin-bottom: 12px;
    }
    .phone-device {
    width: 220px;
    height: 440px;
        padding: 8px;
        border-radius: 32px;
    }
    .phone-screen {
        border-radius: 24px;
    }
    .mockup-slide {
        gap: 20px;
    }
    .mockup-caption h3 {
        font-size: 18px;
    }
    .mockup-caption p {
        font-size: 13px;
        padding: 0 20px;
    }
    .mockup-nav {
        margin-top: 24px;
    }
}

@media (max-width: 480px) {
    .mockup-display {
    height: 480px;
    margin-bottom: 10px;
    }
    .phone-device {
    width: 190px;
    height: 380px;
    }
    .mockup-arrow {
        width: 36px;
        height: 36px;
    }
}

@media (max-width: 360px) {
  .mockup-display {
    height: 440px;
    margin-bottom: 8px;
  }
  .phone-device {
    width: 170px;
    height: 340px;
  }
}
</style>
