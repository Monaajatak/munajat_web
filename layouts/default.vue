<script setup>
const cursorDot = ref(null)
const cursorOutline = ref(null)
const zikrToast = ref(null)
const zikrText = ref(null)

const azkarList = [
  "اللهم صل وسلم على نبينا محمد ﷺ",
  "سبحان الله وبحمده، سبحان الله العظيم",
  "لا إله إلا الله وحده لا شريك له، له الملك وله الحمد وهو على كل شيء قدير",
  "أستغفر الله وأتوب إليه",
  "لا حول ولا قوة إلا بالله العلي العظيم",
  "سبحان الله، والحمد لله، ولا إله إلا الله، والله أكبر",
  "ربنا آتنا في الدنيا حسنة وفي الآخرة حسنة وقنا عذاب النار",
  "حسبي الله لا إله إلا هو عليه توكلت وهو رب العرش العظيم",
  "سبحان الله وبحمده، عدد خلقه، ورضا نفسه، وزنة عرشه، ومداد كلماته",
  "يا حي يا قيوم برحمتك أستغيث أصلح لي شأني كله ولا تكلني إلى نفسي طرفة عين",
  "اللهم أعني على ذكرك وشكرك وحسن عبادتك",
  "لا إله إلا أنت سبحانك إني كنت من الظالمين",
  "أستغفر الله العظيم الذي لا إله إلا هو الحي القيوم وأتوب إليه",
  "اللهم إنك عفو تحب العفو فاعف عني",
  "سبحان الملك القدوس",
  "اللهم اكفني بحلالك عن حرامك، وأغنني بفضلك عمن سواك",
  "رب اغفر لي وتب علي إنك أنت التواب الرحيم",
  "اللهم إني أسألك العلم النافع، والرزق الطيب، والعمل المتقبل",
  "رضيت بالله رباً، وبالإسلام ديناً، وبمحمد ﷺ نبياً",
  "بسم الله الذي لا يضر مع اسمه شيء في الأرض ولا في السماء وهو السميع العليم",
  "أعوذ بكلمات الله التامات من شر ما خلق",
  "سبحان الله",
  "الْحَمْدُ لِلَّهِ",
  "اللَّهُ أَكْبَرُ",
  "سُبْحَانَ اللَّهِ الْعَظِيمِ وَبِحَمْدِهِ"
]

const showRandomZikr = () => {
  if (!zikrToast.value) return
  const random = azkarList[Math.floor(Math.random() * azkarList.length)]
  zikrText.value.textContent = random
  zikrToast.value.classList.add('show')
  setTimeout(() => {
    zikrToast.value?.classList.remove('show')
  }, 6000)
}

const closeZikr = () => {
  zikrToast.value?.classList.remove('show')
}

onMounted(() => {
  // --- Custom Cursor Logic ---
  window.addEventListener('mousemove', (e) => {
    const posX = e.clientX
    const posY = e.clientY
    
    if (cursorDot.value) {
      cursorDot.value.style.left = `${posX}px`
      cursorDot.value.style.top = `${posY}px`
      cursorDot.value.style.opacity = 1
    }

    if (cursorOutline.value) {
      cursorOutline.value.animate({
        left: `${posX}px`,
        top: `${posY}px`
      }, { duration: 500, fill: "forwards" })
      cursorOutline.value.style.opacity = 1
    }
  })

  // Hover effects
  const interactables = document.querySelectorAll('a, button, .card, .nav-item, input, textarea')
  interactables.forEach(el => {
    el.addEventListener('mouseenter', () => {
      if (cursorOutline.value) {
        cursorOutline.value.classList.add('hovering')
      }
    })
    el.addEventListener('mouseleave', () => {
      if (cursorOutline.value) {
        cursorOutline.value.classList.remove('hovering')
      }
    })
  })

  // --- Scroll Reveal Logic ---
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active')
        observer.unobserve(entry.target)
      }
    })
  }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" })

  document.querySelectorAll('.reveal').forEach(el => observer.observe(el))

  // --- Zikr Timer ---
  setTimeout(showRandomZikr, 10000)
  setInterval(showRandomZikr, 180000)
})
</script>

<template>
  <div class="app-wrapper">
    <AppHeader />
    <main>
      <slot />
    </main>
    <AppFooter />

    <!-- Custom Cursor -->
    <div class="cursor-dot" ref="cursorDot"></div>
    <div class="cursor-outline" ref="cursorOutline"></div>

    <!-- Zikr Toast -->
    <div id="zikr-toast" class="dhikr-toast" ref="zikrToast">
      <div class="dhikr-content">
        <p ref="zikrText">اللهم صل وسلم على نبينا محمد ﷺ</p>
      </div>
      <button class="toast-close" @click="closeZikr" aria-label="إغلاق">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 6 6 18" />
          <path d="m6 6 12 12" />
        </svg>
      </button>
    </div>
  </div>
</template>

<style>
/* Additional inline styles from app.blade.php if not in app.css */
.app-wrapper {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

main {
  flex: 1;
}
</style>
