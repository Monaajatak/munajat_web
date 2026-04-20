<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="@yield('meta_description', 'مُناجاتك — رفيق الطاعة اليومي. مواقيت الصلاة الحية، القرآن الكريم، الأذكار، الأدعية، والتسبيح في تجربة هادئة وسريعة.')">
    <meta name="keywords"
        content="@yield('meta_keywords', 'مناجاتك, مُناجاتك, محمد السيد, Mohamed Elsayed, mosayyyed, مواقيت الصلاة, القرآن الكريم, أذكار, أدعية, تسبيح, إسلام, عبادة, تطبيق إسلامي, Flutter, Laravel, مفتوح المصدر')">
    <meta name="author" content="Mahmoud Mourad">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="theme-color" content="#00a2b5">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'مُناجاتك — رفيقك اليومي للعبادة')">
    <meta property="og:description"
        content="@yield('og_description', 'مواقيت الصلاة، القرآن، الأذكار والأدعية في تجربة هادئة واحترافية.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="ar_AR">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'مُناجاتك — رفيقك اليومي للعبادة')">
    <meta name="twitter:description"
        content="@yield('og_description', 'مواقيت الصلاة، القرآن، الأذكار والأدعية في تجربة هادئة واحترافية.')">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/Icon_White_SVG.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/Icon_White_SVG.svg') }}">
    
    <!-- Social Preview Image -->
    <meta property="og:image" content="{{ asset('images/Icon_Teal_SVG.svg') }}">
    <meta name="twitter:image" content="{{ asset('images/Icon_Teal_SVG.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Tajawal:wght@300;400;500;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title', 'مُناجاتك — رفيقك اليومي للعبادة')</title>

    <style>
        :root {
            --font-body: 'Tajawal', sans-serif;
            --font-quran: 'Amiri', serif;
        }

        body {
            font-family: var(--font-body);
        }
    </style>

    @stack('schema')
    @stack('styles')
</head>

<body data-theme="light">

    <!-- ========== NAVIGATION ========== -->
    <x-layout.navigation :active="$activeNav ?? ''" />

    <!-- ========== MAIN CONTENT ========== -->
    @yield('content')

    <!-- ========== FOOTER ========== -->
    <x-layout.footer />


    <!-- Custom Cursor -->
    <div class="cursor-dot" id="cursor-dot"></div>
    <div class="cursor-outline" id="cursor-outline"></div>

    <!-- Reminders / Toast Notification -->
    <div id="zikr-toast" class="dhikr-toast">
        <div class="dhikr-content">
            <p id="zikr-text">اللهم صل وسلم على نبينا محمد ﷺ</p>
        </div>
        <button class="toast-close" onclick="closeZikr()" aria-label="إغلاق">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-x">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
            </svg>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        /* Cursor Styles */
        .cursor-dot,
        .cursor-outline {
            position: fixed;
            top: 0;
            left: 0;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            z-index: 9999;
            pointer-events: none;
        }

        .cursor-dot {
            width: 8px;
            height: 8px;
            background-color: var(--primary);
        }

        .cursor-outline {
            width: 40px;
            height: 40px;
            border: 1px solid var(--primary);
            transition: width 0.2s, height 0.2s, background-color 0.2s, opacity 0.2s;
            opacity: 0;
            /* Hidden initially until mouse moves */
        }

        .cursor-dot {
            opacity: 0;
            /* Hidden initially until mouse moves */
            pointer-events: none;
        }

        .cursor-outline.hovering {
            width: 60px;
            height: 60px;
            background-color: rgba(0, 162, 181, 0.1);
            border-color: transparent;
        }

        /* Hide cursor on touch devices */
        @media (hover: none) and (pointer: coarse) {

            .cursor-dot,
            .cursor-outline {
                display: none;
            }
        }

        /* Global Animation Classes */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-1 {
            transition-delay: 0.1s;
        }

        .reveal-delay-2 {
            transition-delay: 0.2s;
        }

        .reveal-delay-3 {
            transition-delay: 0.3s;
        }

        .reveal-delay-4 {
            transition-delay: 0.4s;
        }


        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Floating Zikr Toast */
        .dhikr-toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 16px 20px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 1.25rem;
            z-index: 10000;
            transform: translateY(150%);
            transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.4s ease;
            max-width: 400px;
            opacity: 0;
            pointer-events: none;
        }

        .dhikr-toast.show {
            transform: translateY(0);
            opacity: 1;
            pointer-events: all;
        }

        .dhikr-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        #zikr-text {
            margin: 0;
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--text);
            line-height: 1.5;
        }

        .zikr-close {
            background: transparent;
            border: none;
            color: var(--muted);
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0 4px;
            line-height: 1;
            transition: color 0.2s;
        }

        .zikr-close:hover {
            color: var(--danger, #ef4444);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // --- Custom Cursor Logic ---
            const cursorDot = document.getElementById('cursor-dot');
            const cursorOutline = document.getElementById('cursor-outline');

            window.addEventListener('mousemove', (e) => {
                const posX = e.clientX;
                const posY = e.clientY;

                // Dot follows immediately
                cursorDot.style.left = `${posX}px`;
                cursorDot.style.top = `${posY}px`;

                // Outline follows with slight delay (animation)
                cursorOutline.animate({
                    left: `${posX}px`,
                    top: `${posY}px`
                }, { duration: 500, fill: "forwards" });
            });

            // Hover effects
            const interactables = document.querySelectorAll('a, button, .card, .nav-item, input, textarea');
            interactables.forEach(el => {
                el.addEventListener('mouseenter', () => {
                    cursorOutline.style.width = '60px';
                    cursorOutline.style.height = '60px';
                    cursorOutline.style.backgroundColor = 'rgba(0, 162, 181, 0.1)';
                });
                el.addEventListener('mouseleave', () => {
                    cursorOutline.style.width = '40px';
                    cursorOutline.style.height = '40px';
                    cursorOutline.style.backgroundColor = 'transparent';
                });
            });

            // --- Scroll Reveal Logic ---
            const observerOptions = {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px"
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        observer.unobserve(entry.target); // Only animate once
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

            // --- Floating Zikr Logic ---
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
            ];

            const zikrToast = document.getElementById('zikr-toast');
            const zikrText = document.getElementById('zikr-text');

            // Function to show random Zikr
            function showRandomZikr() {
                if (!zikrToast) return;

                const random = azkarList[Math.floor(Math.random() * azkarList.length)];
                zikrText.textContent = random;

                zikrToast.classList.add('show');

                // Hide after 6 seconds
                setTimeout(() => {
                    zikrToast.classList.remove('show');
                }, 6000);
            }

            // Expose close function to global scope
            window.closeZikr = () => {
                zikrToast.classList.remove('show');
            };

            // Show first zikr after 10 seconds, then every 3 minutes (180,000ms)
            setTimeout(showRandomZikr, 10000);
            setInterval(showRandomZikr, 180000);
        });
    </script>

    @stack('scripts')
</body>

</html>