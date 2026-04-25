<script setup lang="ts">
import policyDocument from '~/privacy_policy.json'

const policyMeta = policyDocument.meta
const policyData = policyDocument.data

const orderedSections = computed(() => {
  return [...policyData.sections].sort((a, b) => (a.order ?? 0) - (b.order ?? 0))
})

const textAlignClass = computed(() => {
  if (policyData.ui?.text_align === 'center') {
    return 'align-center'
  }

  return 'align-start'
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

useHead({
  title: `${policyData.title} | مُناجاتك`,
  meta: [
    {
      name: 'description',
      content: policyData.intro
    }
  ]
})
</script>

<template>
  <section class="section privacy-page">
    <div class="container privacy-container">
      <div class="privacy-header" :class="textAlignClass">
        <NuxtLink to="/" class="back-link">العودة إلى الرئيسية</NuxtLink>
        <h1>{{ policyData.title }}</h1>
        <p class="intro">{{ policyData.intro }}</p>

        <p v-if="policyData.ui?.show_last_updated" class="meta-line">
          آخر تحديث: {{ formatDate(policyMeta.last_updated) }}
        </p>
        <p v-if="policyData.ui?.show_effective_date" class="meta-line">
          تاريخ السريان: {{ formatDate(policyMeta.effective_date) }}
        </p>
      </div>

      <article class="privacy-content card" :class="textAlignClass">
        <template v-for="(section, index) in orderedSections" :key="section.id">
          <section class="policy-block" :class="{ 'highlighted': section.highlight }">
            <h2>{{ section.title }}</h2>

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

      <section v-if="policyData.footer?.note || policyData.footer?.show_contact" class="policy-footer card" :class="textAlignClass">
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
  padding-top: 40px;
}

.privacy-container {
  max-width: 900px;
  display: grid;
  gap: 24px;
}

.privacy-header {
  display: grid;
  gap: 10px;
}

.back-link {
  color: var(--primary);
  font-weight: 700;
  width: fit-content;
}

.back-link:hover {
  color: var(--primary-dark);
}

h1 {
  font-size: clamp(30px, 4vw, 44px);
}

.intro {
  color: var(--text-secondary);
  line-height: 1.9;
}

.meta-line {
  font-size: 14px;
  color: var(--muted);
}

.privacy-content,
.policy-footer {
  padding: 28px;
}

.policy-block {
  display: grid;
  gap: 12px;
}

.policy-block h2 {
  font-size: 22px;
}

.policy-block p {
  color: var(--text-secondary);
  line-height: 1.9;
}

.policy-block.highlighted {
  border-inline-start: 4px solid var(--primary);
  padding-inline-start: 14px;
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
}

.policy-footer a {
  color: var(--primary);
  font-weight: 700;
  width: fit-content;
}

.align-start {
  text-align: start;
}

.align-center {
  text-align: center;
  justify-items: center;
}

@media (max-width: 768px) {
  .privacy-content,
  .policy-footer {
    padding: 20px;
  }

  .privacy-page {
    padding-top: 24px;
  }
}
</style>
