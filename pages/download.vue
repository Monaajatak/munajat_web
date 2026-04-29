<script setup>
const stores = [
  {
    id: 'googleplay',
    name: 'Google Play',
    href: 'https://play.google.com/store/apps/details?id=com.mahmoudmourad.monologue',
    icon: 'https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/google-play/default.svg'
  },
  {
    id: 'appstore',
    name: 'App Store',
    href: 'https://apps.apple.com/ua/app/%D9%85%D9%86%D8%A7%D8%AC%D8%A7%D8%AA%D9%83-%D8%B1%D9%81%D9%8A%D9%82-%D8%A7%D9%84%D8%B7%D8%A7%D8%B1%D8%A9-%D8%A7%D9%84%D9%8A%D9%88%D9%85%D9%8A/id6759576802',
    icon: 'https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/app-store/default.svg'
  },
  {
    id: 'appgallery',
    name: 'AppGallery',
    href: 'https://appgallery.huawei.com/app/C117271909',
    icon: 'https://cdn.jsdelivr.net/gh/glincker/thesvg@main/public/icons/huawei/default.svg'
  }
]

const platform = ref('web')
const redirecting = ref(false)
const route = useRoute()

const orderedStores = computed(() => {
  const preferredId = {
    ios: 'appstore',
    android: 'googleplay',
    huawei: 'appgallery'
  }[platform.value]

  if (!preferredId) {
    return stores
  }

  return [...stores].sort((a, b) => {
    if (a.id === preferredId) return -1
    if (b.id === preferredId) return 1
    return 0
  })
})

const detectPlatform = () => {
  const ua = navigator?.userAgent || ''
  const uaLower = ua.toLowerCase()

  if (/huawei|honor|hmscore/.test(uaLower)) {
    return 'huawei'
  }

  if (/iphone|ipad|ipod/.test(uaLower)) {
    return 'ios'
  }

  if (/android/.test(uaLower)) {
    return 'android'
  }

  return 'web'
}

onMounted(() => {
  platform.value = detectPlatform()
  const skipRedirect = route.query.all === '1'

  if (skipRedirect || platform.value === 'web' || platform.value === 'huawei') {
    return
  }

  const redirectMap = {
    ios: stores.find((store) => store.id === 'appstore')?.href,
    android: stores.find((store) => store.id === 'googleplay')?.href
  }

  const target = redirectMap[platform.value]
  if (target) {
    redirecting.value = true
    window.location.replace(target)
  }
})
</script>

<template>
  <section class="download-page section">
    <div class="container">
      <div class="download-card card-glass">
        <h1>تحميل مُناجاتك</h1>
        <p class="download-lead">
          نحدد المتجر الأنسب لجهازك تلقائيا. إذا لم يتم التحويل تلقائيا، اختر المتجر المناسب يدويًا.
        </p>

        <div v-if="redirecting" class="download-status">
          جارٍ تحويلك إلى المتجر المناسب...
        </div>

        <div class="store-cards">
          <a
            v-for="store in orderedStores"
            :key="store.id"
            :href="store.href"
            target="_blank"
            rel="noopener"
            class="store-card"
          >
            <div class="store-card-icon">
              <img :src="store.icon" :alt="store.name" />
            </div>
            <div class="store-card-info">
              <span class="store-card-text">تحميل من</span>
              <span class="store-card-name">{{ store.name }}</span>
            </div>
          </a>
        </div>

      </div>
    </div>
  </section>
</template>

<style scoped>
.download-page {
  display: flex;
  align-items: center;
  min-height: 70vh;
}

.download-card {
  padding: 48px 36px;
  border-radius: 28px;
  text-align: center;
  max-width: 760px;
  margin: 0 auto;
}

.download-card h1 {
  font-size: clamp(28px, 4vw, 40px);
  margin-bottom: 12px;
  color: var(--text);
}

.download-lead {
  color: var(--muted);
  font-size: 16px;
  line-height: 1.8;
  max-width: 640px;
  margin: 0 auto 24px;
}

.download-status {
  margin-bottom: 16px;
  font-weight: 700;
  color: var(--primary);
}

.store-cards {
  justify-content: center;
}

.download-note {
  margin-top: 20px;
  font-size: 13px;
  color: var(--muted);
}

@media (max-width: 768px) {
  .download-card {
    padding: 36px 24px;
  }
}

@media (max-width: 480px) {
  .download-card {
    padding: 28px 18px;
  }
  .download-lead {
    font-size: 14px;
  }
}
</style>
