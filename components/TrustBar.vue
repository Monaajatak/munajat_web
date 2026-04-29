<script setup>
const counters = [
  { target: 150, suffix: '+', label: 'تلاوة عذبة' },
  { target: 2000, suffix: '+', label: 'تحميل للتطبيق' },
  { target: 100, suffix: '%', label: 'مجاني للأبد' }
]

const animatedValues = reactive(counters.map(() => 0))

onMounted(() => {
  counters.forEach((c, i) => {
    animateValue(i, 0, c.target, 2000)
  })
})

function animateValue(index, start, end, duration) {
  let startTimestamp = null;
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    animatedValues[index] = Math.floor(progress * (end - start) + start);
    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  };
  window.requestAnimationFrame(step);
}
</script>

<template>
  <div class="trust-bar-section reveal">
    <div class="container">
      <div class="trust-grid">
        <div v-for="(c, i) in counters" :key="i" class="trust-item">
          <div class="counter-val">
            <span class="num">{{ animatedValues[i] }}</span>
            <span class="suffix">{{ c.suffix }}</span>
          </div>
          <span class="label">{{ c.label }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.trust-bar-section {
    padding: 2rem 0;
    background: var(--surface);
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    margin-bottom: 4rem;
}

.trust-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    text-align: center;
}

.trust-item {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.counter-val {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary);
    line-height: 1;
}

.label {
    font-size: 0.9rem;
    color: var(--text-secondary);
    font-weight: 500;
}

@media (max-width: 768px) {
    .trust-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    .counter-val {
        font-size: 2rem;
    }
}

@media (max-width: 480px) {
  .trust-bar-section {
    padding: 1.5rem 0;
    margin-bottom: 3rem;
  }

  .counter-val {
    font-size: 1.8rem;
  }

  .label {
    font-size: 0.85rem;
  }
}
</style>
