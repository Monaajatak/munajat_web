/* ============================================
   MUNAJAT WEB — Main JavaScript
   ============================================ */

document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    initMobileMenu();
    initScrollReveal();
    initPrayerTimes();
    initAzkarQuick();
    initCopyButtons();
    initCounters();
});

/* --- Theme Toggle --- */
function initTheme() {
    const body = document.body;
    const toggle = document.getElementById('themeToggle');
    const stored = localStorage.getItem('munajat-theme');

    if (stored) {
        body.dataset.theme = stored;
    } else if (window.matchMedia?.('(prefers-color-scheme: dark)').matches) {
        body.dataset.theme = 'dark';
    }

    updateThemeLabel();

    if (toggle) {
        toggle.addEventListener('click', () => {
            const next = body.dataset.theme === 'dark' ? 'light' : 'dark';
            body.dataset.theme = next;
            localStorage.setItem('munajat-theme', next);
            updateThemeLabel();
        });
    }
}

function updateThemeLabel() {
    const toggle = document.getElementById('themeToggle');
    if (!toggle) return;
    const isDark = document.body.dataset.theme === 'dark';
    
    // SVG icons for theme toggle
    const sunIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M22 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>`;
    const moonIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>`;

    toggle.innerHTML = isDark ? sunIcon : moonIcon;
    toggle.setAttribute('aria-label', isDark ? 'الوضع الفاتح' : 'الوضع الداكن');
    toggle.setAttribute('aria-pressed', isDark.toString());
}

/* --- Mobile Menu --- */
function initMobileMenu() {
    const menuBtn = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');

    const menuIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>`;
    const closeIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>`;

    if (menuBtn && navLinks) {
        menuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('open');
            const isOpen = navLinks.classList.contains('open');
            menuBtn.innerHTML = isOpen ? closeIcon : menuIcon;
            menuBtn.setAttribute('aria-expanded', isOpen.toString());
        });

        // Close menu on link click
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('open');
                menuBtn.innerHTML = menuIcon;
            });
        });
    }
}

/* --- Scroll Reveal --- */
function initScrollReveal() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
}

/* --- Prayer Times (Aladhan API) --- */
async function initPrayerTimes() {
    const prayerCard = document.getElementById('prayerCard');
    if (!prayerCard) return;

    const locationEl = document.getElementById('prayerLocation');
    const nextNameEl = document.getElementById('nextPrayerName');
    const nextTimeEl = document.getElementById('nextPrayerTime');
    const countdownEl = document.getElementById('prayerCountdown');

    try {
        // Try geolocation
        let lat, lng, city;

        try {
            const pos = await new Promise((resolve, reject) => {
                navigator.geolocation.getCurrentPosition(resolve, reject, {
                    timeout: 5000,
                    enableHighAccuracy: false
                });
            });
            lat = pos.coords.latitude;
            lng = pos.coords.longitude;
        } catch {
            // Default fallback: Cairo
            lat = 30.0444;
            lng = 31.2357;
            city = 'القاهرة';
        }

        // Fetch prayer times
        const today = new Date();
        const dd = String(today.getDate()).padStart(2, '0');
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const yyyy = today.getFullYear();

        const res = await fetch(
            `https://api.aladhan.com/v1/timings/${dd}-${mm}-${yyyy}?latitude=${lat}&longitude=${lng}&method=5`
        );
        const data = await res.json();
        const timings = data.data.timings;

        // Get city from API meta
        if (!city) {
            city = data.data.meta?.timezone?.split('/')?.pop()?.replace(/_/g, ' ') || 'موقعك الحالي';
        }

        if (locationEl) locationEl.textContent = city;

        // Map prayer names
        const prayers = [
            { key: 'Fajr', name: 'الفجر', time: timings.Fajr },
            { key: 'Sunrise', name: 'الشروق', time: timings.Sunrise },
            { key: 'Dhuhr', name: 'الظهر', time: timings.Dhuhr },
            { key: 'Asr', name: 'العصر', time: timings.Asr },
            { key: 'Maghrib', name: 'المغرب', time: timings.Maghrib },
            { key: 'Isha', name: 'العشاء', time: timings.Isha },
        ];

        // Populate prayer times row
        const prayerRow = document.getElementById('prayerTimesRow');
        if (prayerRow) {
            prayerRow.innerHTML = prayers.map(p => `
        <div class="prayer-time-item" data-prayer="${p.key}">
          <span class="p-name">${p.name}</span>
          <span class="p-time">${p.time}</span>
        </div>
      `).join('');
        }

        // Find next prayer
        const now = new Date();
        let nextPrayer = null;

        for (const p of prayers) {
            const [h, m] = p.time.split(':').map(Number);
            const prayerDate = new Date(now);
            prayerDate.setHours(h, m, 0, 0);

            if (prayerDate > now) {
                nextPrayer = { ...p, date: prayerDate };
                break;
            }
        }

        // If no next prayer today, next is Fajr tomorrow
        if (!nextPrayer) {
            const [h, m] = prayers[0].time.split(':').map(Number);
            const tomorrow = new Date(now);
            tomorrow.setDate(tomorrow.getDate() + 1);
            tomorrow.setHours(h, m, 0, 0);
            nextPrayer = { ...prayers[0], date: tomorrow };
        }

        if (nextNameEl) nextNameEl.textContent = nextPrayer.name;
        if (nextTimeEl) nextTimeEl.textContent = nextPrayer.time;

        // Mark active prayer in row
        const activeItem = prayerRow?.querySelector(`[data-prayer="${nextPrayer.key}"]`);
        if (activeItem) activeItem.classList.add('active');

        // Countdown timer
        function updateCountdown() {
            const now = new Date();
            let diff = nextPrayer.date - now;
            if (diff < 0) {
                // Reload prayer times
                initPrayerTimes();
                return;
            }
            const hours = Math.floor(diff / 3600000);
            const mins = Math.floor((diff % 3600000) / 60000);
            const secs = Math.floor((diff % 60000) / 1000);

            if (countdownEl) {
                countdownEl.textContent = `متبقي ${hours > 0 ? hours + ' ساعة و ' : ''}${mins} دقيقة و ${secs} ثانية`;
            }
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);

    } catch (error) {
        console.error('Prayer times error:', error);
        if (nextNameEl) nextNameEl.textContent = 'غير متاح';
        if (nextTimeEl) nextTimeEl.textContent = '--:--';
    }
}

/* --- Quick Azkar --- */
const azkarList = [
    { text: 'سُبْحَانَ اللَّهِ وَبِحَمْدِهِ، سُبْحَانَ اللَّهِ الْعَظِيمِ', count: 3, source: 'متفق عليه' },
    { text: 'لَا إِلَهَ إِلَّا اللَّهُ وَحْدَهُ لَا شَرِيكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيرٌ', count: 10, source: 'متفق عليه' },
    { text: 'اللَّهُمَّ صَلِّ وَسَلِّمْ عَلَى نَبِيِّنَا مُحَمَّدٍ', count: 10, source: 'رواه مسلم' },
    { text: 'أَسْتَغْفِرُ اللَّهَ وَأَتُوبُ إِلَيْهِ', count: 10, source: 'متفق عليه' },
    { text: 'لَا حَوْلَ وَلَا قُوَّةَ إِلَّا بِاللَّهِ الْعَلِيِّ الْعَظِيمِ', count: 7, source: 'متفق عليه' },
    { text: 'سُبْحَانَ اللَّهِ، وَالْحَمْدُ لِلَّهِ، وَلَا إِلَهَ إِلَّا اللَّهُ، وَاللَّهُ أَكْبَرُ', count: 3, source: 'رواه مسلم' },
    { text: 'رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الْآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ', count: 1, source: 'سورة البقرة: 201' },
    { text: 'حَسْبِيَ اللَّهُ لَا إِلَهَ إِلَّا هُوَ عَلَيْهِ تَوَكَّلْتُ وَهُوَ رَبُّ الْعَرْشِ الْعَظِيمِ', count: 7, source: 'سورة التوبة: 129' },
    { text: 'سُبْحَانَ اللَّهِ وَبِحَمْدِهِ، عَدَدَ خَلْقِهِ، وَرِضَا نَفْسِهِ، وَزِنَةَ عَرْشِهِ، وَمِدَادَ كَلِمَاتِهِ', count: 3, source: 'رواه مسلم' },
    { text: 'يَا حَيُّ يَا قَيُّومُ بِرَحْمَتِكَ أَسْتَغِيثُ أَصْلِحْ لِي شَأْنِي كُلَّهُ وَلَا تَكِلْنِي إِلَى نَفْسِي طَرْفَةَ عَيْنٍ', count: 3, source: 'رواه النسائي' },
    { text: 'اللَّهُمَّ أَعِنِّي عَلَى ذِكْرِكَ وَشُكْرِكَ وَحُسْنِ عِبَادَتِكَ', count: 1, source: 'رواه أبو داود' },
    { text: 'لَا إِلَهَ إِلَّا أَنْتَ سُبْحَانَكَ إِنِّي كُنْتُ مِنَ الظَّالِمِينَ', count: 3, source: 'سورة الأنبياء: 87' },
    { text: 'أَسْتَغْفِرُ اللَّهَ الْعَظِيمَ الَّذِي لَا إِلَهَ إِلَّا هُوَ الْحَيَّ الْقَيُّومَ وَأَتُوبُ إِلَيْهِ', count: 3, source: 'رواه الترمذي' },
    { text: 'اللَّهُمَّ إِنَّكَ عَفُوٌّ تُحِبُّ الْعَفْوَ فَاعْفُ عَنِّي', count: 3, source: 'رواه الترمذي' },
    { text: 'سُبْحَانَ الْمَلِكِ الْقُدُّوسِ', count: 3, source: 'رواه أحمد' },
    { text: 'اللَّهُمَّ اكْفِنِي بِحَلَالِكَ عَنْ حَرَامِكَ، وَأَغْنِنِي بِفَضْلِكَ عَمَّنْ سِوَاكَ', count: 1, source: 'رواه الترمذي' },
    { text: 'رَبِّ اغْفِرْ لِي وَتُبْ عَلَيَّ إِنَّكَ أَنْتَ التَّوَّابُ الرَّحِيمُ', count: 7, source: 'رواه الترمذي' },
    { text: 'اللَّهُمَّ إِنِّي أَسْأَلُكَ الْعِلْمَ النَّافِعَ، وَالرِّزْقَ الطَّيِّبَ، وَالْعَمَلَ الْمُتَقَبَّلَ', count: 1, source: 'رواه ابن ماجة' },
    { text: 'رَضِيتُ بِاللَّهِ رَبَّاً، وَبِالْإِسْلَامِ دِيناً، وَبِمُحَمَّدٍ صلى الله عليه وسلم نَبِيّاً', count: 3, source: 'رواه الترمذي' },
    { text: 'بِسْمِ اللَّهِ الَّذِي لَا يَضُرُّ مَعَ اسْمِهِ شَيْءٌ فِي الْأَرْضِ وَلَا فِي السَّمَاءِ وَهُوَ السَّمِيعُ الْعَلِيمُ', count: 3, source: 'رواه الترمذي' },
    { text: 'أَعُوذُ بِكَلِمَاتِ اللَّهِ التَّامَّاتِ مِنْ شَرِّ مَا خَلَقَ', count: 3, source: 'رواه مسلم' },
    { text: 'سُبْحَانَ اللَّهِ', count: 33, source: 'سنة نبوية' },
    { text: 'الْحَمْدُ لِلَّهِ', count: 33, source: 'سنة نبوية' },
    { text: 'اللَّهُ أَكْبَرُ', count: 33, source: 'سنة نبوية' },
    { text: 'سُبْحَانَ اللَّهِ الْعَظِيمِ وَبِحَمْدِهِ', count: 3, source: 'رواه الترمذي' }
];

let currentAzkarIndex = Math.floor(Math.random() * azkarList.length);
let currentCheckCount = 0;

function initAzkarQuick() {
    showAzkar();

    const nextBtn = document.getElementById('azkarNext');
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            let nextIndex = currentAzkarIndex;
            while (nextIndex === currentAzkarIndex && azkarList.length > 1) {
                nextIndex = Math.floor(Math.random() * azkarList.length);
            }
            currentAzkarIndex = nextIndex;
            showAzkar();
        });
    }
}

function showAzkar() {
    const textEl = document.getElementById('azkarText');
    const sourceEl = document.getElementById('azkarSource');
    const counterEl = document.getElementById('azkarCounter');

    if (!textEl) return;

    const azkar = azkarList[currentAzkarIndex];

    // Transition out
    textEl.style.opacity = '0';
    textEl.style.transform = 'translateY(10px)';

    setTimeout(() => {
        textEl.textContent = azkar.text;
        if (sourceEl) sourceEl.textContent = azkar.source;

        textEl.style.opacity = '1';
        textEl.style.transform = 'translateY(0)';

        if (counterEl) {
            counterEl.innerHTML = '';
            currentCheckCount = 0;

            if (azkar.count >= 1) {
                const countBoard = document.createElement('div');
                countBoard.className = 'azkar-count-large';
                countBoard.innerHTML = `
                    <span class="curr">0</span>
                    <span class="sep">/</span>
                    <span class="total">${azkar.count}</span>
                `;
                counterEl.appendChild(countBoard);

                countBoard.onclick = () => {
                    if (currentCheckCount < azkar.count) {
                        currentCheckCount++;
                        countBoard.querySelector('.curr').textContent = currentCheckCount;
                        
                        // Pulse animation on each increment
                        countBoard.classList.add('pulse');
                        setTimeout(() => countBoard.classList.remove('pulse'), 200);

                        if (currentCheckCount === azkar.count) {
                            countBoard.classList.add('completed');
                            // Trigger celebration pulse on the text itself
                            textEl.classList.add('completed-pulse');
                            setTimeout(() => textEl.classList.remove('completed-pulse'), 1000);
                        }
                    }
                };
            }
        }
    }, 200);
}

/* --- Copy Buttons --- */
function initCopyButtons() {
    document.querySelectorAll('[data-copy]').forEach(btn => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-copy');
            const targetEl = document.getElementById(targetId);
            if (!targetEl) return;

            navigator.clipboard.writeText(targetEl.textContent.trim()).then(() => {
                showToast('تم النسخ ✓');
            }).catch(() => {
                // Fallback
                const range = document.createRange();
                range.selectNodeContents(targetEl);
                const sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
                document.execCommand('copy');
                sel.removeAllRanges();
                showToast('تم النسخ ✓');
            });
        });
    });
}

/* --- Share --- */
function shareText(text) {
    if (navigator.share) {
        navigator.share({ text: text + '\n\n— مناجاتك' }).catch(() => { });
    } else {
        navigator.clipboard.writeText(text + '\n\n— مناجاتك').then(() => {
            showToast('تم نسخ النص للمشاركة ✓');
        });
    }
}

function shareAzkar() {
    const textEl = document.getElementById('azkarText');
    if (textEl) shareText(textEl.textContent.trim());
}

/* --- Toast --- */
function showToast(message) {
    let toast = document.getElementById('toast');
    if (!toast) {
        toast = document.createElement('div');
        toast.id = 'toast';
        toast.className = 'toast';
        document.body.appendChild(toast);
    }
    toast.textContent = message;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 2500);
}

/* --- Animated Counters --- */
function initCounters() {
    const counters = document.querySelectorAll('[data-count]');
    if (!counters.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(el => observer.observe(el));
}

function animateCounter(el) {
    const target = parseInt(el.getAttribute('data-count'), 10);
    const suffix = el.getAttribute('data-suffix') || '';
    const prefix = el.getAttribute('data-prefix') || '';
    const duration = 1500;
    const start = performance.now();

    function step(now) {
        const elapsed = now - start;
        const progress = Math.min(elapsed / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
        const current = Math.floor(eased * target);
        el.textContent = prefix + current.toLocaleString('ar-EG') + suffix;
        if (progress < 1) requestAnimationFrame(step);
    }

    requestAnimationFrame(step);
}

/* --- Smooth Scroll for anchor links --- */
document.addEventListener('click', (e) => {
    const link = e.target.closest('a[href^="#"]');
    if (!link) return;

    const id = link.getAttribute('href')?.slice(1);
    if (!id) return;

    const target = document.getElementById(id);
    if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
});
