// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },
  
  app: {
    head: {
      htmlAttrs: {
        lang: 'ar',
        dir: 'rtl'
      },
      title: 'مُناجاتك — رفيق الطاعة اليومي',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { name: 'description', content: 'مُناجاتك — رفيق الطاعة اليومي. مواقيت الصلاة الحية، القرآن الكريم، الأذكار، الأدعية، والتسبيح في تجربة هادئة وسريعة.' }
      ],
      link: [
        { rel: 'icon', type: 'image/svg+xml', href: '/images/Icon_White_SVG.svg' },
        { rel: 'preconnect', href: 'https://fonts.googleapis.com' },
        { rel: 'preconnect', href: 'https://fonts.gstatic.com', crossorigin: '' },
        { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Tajawal:wght@300;400;500;700;800&display=swap' }
      ]
    }
  },

  experimental: {
    viewTransition: true,
    componentIslands: true
  },

  css: [
    '~/assets/css/app.css'
  ]
})
