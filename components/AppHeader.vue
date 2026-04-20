<script setup>
const isMenuOpen = ref(false)
const theme = ref('light')

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value
}

const closeMenu = () => {
  isMenuOpen.value = false
}

const toggleTheme = () => {
  const nextTheme = theme.value === 'dark' ? 'light' : 'dark'
  theme.value = nextTheme
  document.body.dataset.theme = nextTheme
  localStorage.setItem('munajat-theme', nextTheme)
}

onMounted(() => {
  const storedTheme = localStorage.getItem('munajat-theme')
  if (storedTheme) {
    theme.value = storedTheme
  } else if (window.matchMedia?.('(prefers-color-scheme: dark)').matches) {
    theme.value = 'dark'
  }
  document.body.dataset.theme = theme.value
})
</script>

<template>
  <header class="nav container">
    <NuxtLink to="/" class="brand">
      <img src="/images/Icon_Teal_SVG.svg" alt="شعار مُناجاتك" width="40" height="40" class="logo-light">
      <img src="/images/Icon_White_SVG.svg" alt="شعار مُناجاتك" width="40" height="40" class="logo-dark">
      <div class="brand-text">
        <span class="brand-kicker">Munajat</span>
        <strong class="brand-name">مُناجاتك</strong>
      </div>
    </NuxtLink>

    <div class="nav-links" :class="{ 'open': isMenuOpen }" id="navLinks">
      <NuxtLink to="/#hero" @click="closeMenu">الرئيسية</NuxtLink>
      <NuxtLink to="/#features" @click="closeMenu">المميزات</NuxtLink>
      <NuxtLink to="/#about" @click="closeMenu">القصة</NuxtLink>
      <NuxtLink to="/#team" @click="closeMenu">الفريق</NuxtLink>
      <NuxtLink to="/#faq" @click="closeMenu">الأسئلة</NuxtLink>
    </div>

    <div class="nav-actions">
      <button @click="toggleTheme" class="btn btn-icon btn-outline" type="button" aria-label="تبديل الوضع">
        <template v-if="theme === 'dark'">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-sun">
            <circle cx="12" cy="12" r="4" />
            <path d="M12 2v2" />
            <path d="M12 20v2" />
            <path d="m4.93 4.93 1.41 1.41" />
            <path d="m17.66 17.66 1.41 1.41" />
            <path d="M2 12h2" />
            <path d="M22 12h2" />
            <path d="m6.34 17.66-1.41 1.41" />
            <path d="m19.07 4.93-1.41 1.41" />
          </svg>
        </template>
        <template v-else>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-moon">
            <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
          </svg>
        </template>
      </button>
      <button @click="toggleMenu" class="menu-toggle" type="button" aria-label="القائمة"
        :aria-expanded="isMenuOpen.toString()">
        <template v-if="isMenuOpen">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
          </svg>
        </template>
        <template v-else>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-menu">
            <line x1="4" x2="20" y1="12" y2="12" />
            <line x1="4" x2="20" y1="6" y2="6" />
            <line x1="4" x2="20" y1="18" y2="18" />
          </svg>
        </template>
      </button>
      <a class="btn btn-primary btn-sm" href="https://play.google.com/store/apps/details?id=com.mahmoudmourad.monologue"
        target="_blank">
        تحميل التطبيق
      </a>
    </div>
  </header>
</template>
