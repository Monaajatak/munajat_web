<script setup lang="ts">
const fallbackPolicyDocument = {
  meta: {
    version: 3,
    locale: 'ar',
    last_updated: '',
    effective_date: '',
    cache_ttl_hours: 24,
    force_update: false
  },
  data: {
    title: 'سياسة الخصوصية',
    intro: '',
    ui: {
      show_last_updated: true,
      show_effective_date: false,
      show_dividers: true,
      text_align: 'start'
    },
    sections: [],
    footer: {
      show_contact: false,
      contact_email: '',
      note: ''
    }
  }
}

const { data: policyDocument } = await useFetch('/api/privacy-policy', {
  default: () => fallbackPolicyDocument
})

const policyMeta = computed(() => {
  return policyDocument.value?.meta ?? fallbackPolicyDocument.meta
})

const policyData = computed(() => {
  return policyDocument.value?.data ?? fallbackPolicyDocument.data
})

const orderedSections = computed(() => {
  return [...policyData.value.sections].sort((a, b) => (a.order ?? 0) - (b.order ?? 0))
})

const formatDate = (value?: string) => {
  if (!value) {
    return ''
  }

  const date = new Date(value)

  if (Number.isNaN(date.getTime())) {
    return value
  }

  return new Intl.DateTimeFormat('ar-EG', {
    dateStyle: 'long'
  }).format(date)
}

const formatIndex = (value: number) => {
  return (value + 1).toLocaleString('ar-EG')
}

useHead(() => ({
  title: `${policyData.value.title} | مُناجاتك`,
  meta: [
    {
      name: 'description',
      content: policyData.value.intro || 'سياسة الخصوصية لتطبيق مُناجاتك'
    }
  ]
}))
</script>

<template>
  <section class="section privacy-page">
    <div class="container privacy-container">
      <section class="policy-hero">
        <div class="hero-icon" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 3l7 4v5c0 5-3.5 7.5-7 9-3.5-1.5-7-4-7-9V7l7-4z" />
            <path d="M12 11v4" />
            <path d="M12 8h.01" />
          </svg>
        </div>
        <div class="hero-content">
          <h2>{{ policyData.title }}</h2>
          <p>{{ policyData.intro }}</p>
          <p v-if="policyData.ui?.show_last_updated" class="meta-line">
            آخر تحديث: {{ formatDate(policyMeta.last_updated) }}
          </p>
          <p v-if="policyData.ui?.show_effective_date" class="meta-line">
            تاريخ السريان: {{ formatDate(policyMeta.effective_date) }}
          </p>
        </div>
      </section>

      <article class="privacy-content">
        <template v-for="(section, index) in orderedSections" :key="section.id">
          <section class="policy-block" :class="{ 'highlighted': section.highlight }">
            <div class="block-header">
              <span class="block-badge">{{ formatIndex(index) }}</span>
              <h2>{{ section.title }}</h2>
            </div>

            <p v-if="section.type === 'text'">{{ section.content }}</p>

            <ul v-else-if="section.type === 'bullet'" class="bullet-list">
              <li v-for="item in section.items" :key="item">{{ item }}</li>
            </ul>
          </section>

          <hr
            v-if="policyData.ui?.show_dividers && index !== orderedSections.length - 1"
            class="divider"
          >
        </template>
      </article>

      <section v-if="policyData.footer?.note || policyData.footer?.show_contact" class="policy-footer">
        <p v-if="policyData.footer?.note">{{ policyData.footer.note }}</p>
        <a v-if="policyData.footer?.show_contact" :href="`mailto:${policyData.footer.contact_email}`">
          {{ policyData.footer.contact_email }}
        </a>
      </section>
    </div>
  </section>
</template>

<style scoped>
.privacy-page {
  padding-top: 24px;
}

.privacy-container {
  max-width: 920px;
  display: grid;
  gap: 22px;
  text-align: right;
}

.policy-hero {
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 18px;
  align-items: center;
  background: linear-gradient(140deg, rgba(var(--primary-rgb), 0.08), rgba(var(--primary-rgb), 0.02));
  border: 1px solid rgba(var(--primary-rgb), 0.18);
  border-radius: 26px;
  padding: 24px 26px;
  box-shadow: var(--shadow-sm);
}

.hero-icon {
  width: 68px;
  height: 68px;
  border-radius: 22px;
  display: grid;
  place-items: center;
  background: rgba(var(--primary-rgb), 0.12);
  color: var(--primary);
}

.hero-content {
  display: grid;
  gap: 8px;
  text-align: right;
}

.hero-content h2 {
  margin: 0;
  font-size: 24px;
  color: var(--text);
}

.hero-content p {
  margin: 0;
  color: var(--text-secondary);
  line-height: 1.9;
}

.meta-line {
  font-size: 13px;
  color: var(--muted);
}

.privacy-content,
.policy-footer {
  padding: 24px;
  border-radius: 24px;
  background: var(--surface);
  border: 1px solid var(--border-color);
  box-shadow: var(--shadow-xs);
}

.policy-block {
  display: grid;
  gap: 12px;
  text-align: start;
}

.block-header {
  display: flex;
  align-items: center;
  gap: 12px;
}

.block-badge {
  width: 34px;
  height: 34px;
  border-radius: 50%;
  background: rgba(var(--primary-rgb), 0.15);
  color: var(--primary);
  display: grid;
  place-items: center;
  font-weight: 800;
  font-size: 14px;
  flex-shrink: 0;
}

.policy-block h2 {
  font-size: 20px;
  margin: 0;
}

.policy-block p {
  color: var(--text-secondary);
  line-height: 1.9;
}

.bullet-list {
  list-style: disc;
  padding-inline-start: 22px;
  display: grid;
  gap: 10px;
  color: var(--text-secondary);
}

.divider {
  margin: 24px 0;
  border: 0;
  border-top: var(--border);
}

.policy-footer {
  display: grid;
  gap: 10px;
  text-align: right;
}

.policy-footer a {
  color: var(--primary);
  font-weight: 700;
  width: fit-content;
}

@media (max-width: 768px) {
  .policy-hero {
    grid-template-columns: 1fr;
    text-align: center;
  }

  .hero-content {
    text-align: center;
  }

  .privacy-content,
  .policy-footer {
    padding: 20px;
  }
}

@media (max-width: 480px) {
  .policy-hero {
    padding: 20px;
  }

  .hero-icon {
    width: 58px;
    height: 58px;
    border-radius: 18px;
  }

  .block-badge {
    width: 30px;
    height: 30px;
  }
}
</style>
