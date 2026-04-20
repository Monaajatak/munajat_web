<script setup>
const cursorDot = ref(null)
const cursorOutline = ref(null)

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
