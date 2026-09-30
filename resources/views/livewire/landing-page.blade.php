<div class="min-h-screen bg-canvas selection:bg-coral/20 selection:text-coral-active">
    {{-- Fixed Header / Navigation --}}
    <nav class="fixed top-0 left-0 right-0 z-50 border-b border-hairline/70 bg-canvas/90 backdrop-blur-md transition-all">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8 py-3.5 sm:py-4 mx-auto">
            <div class="flex items-center justify-between">
                <a href="/" class="flex items-center gap-2.5 group">
                    <span class="text-xl sm:text-2xl text-coral transition-transform group-hover:rotate-45 duration-300">✦</span>
                    <span class="text-2xl sm:text-3xl font-serif font-bold tracking-tight text-ink">Cadence</span>
                </a>
                <div class="flex items-center gap-3">
                    @auth
                    <a href="{{ route('tracker') }}" class="px-5 sm:px-7 py-2.5 text-sm sm:text-base font-semibold text-white rounded-full bg-coral hover:bg-coral-active transition-all duration-200 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                        Dashboard
                    </a>
                    @else
                    <a href="/dev-login" class="px-5 sm:px-7 py-2.5 text-sm sm:text-base font-semibold text-white rounded-full bg-coral hover:bg-coral-active transition-all duration-200 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                        Start Your Cadence
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- HERO SECTION: Crisp Impasto Art + Puzzle Typography Around Cat  --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}
    <section class="relative pt-16 sm:pt-20 min-h-[92vh] sm:min-h-screen flex flex-col justify-between overflow-hidden">
        {{-- Background Image: Crisp, sharp, NO blur, 100% natural impasto painting --}}
        <div class="absolute inset-0 hidden md:block">
            <img src="{{ asset('images/atelier_desktop_hero.jpg') }}" alt="Cadence Canvas" class="object-cover w-full h-full object-center">
        </div>
        <div class="absolute inset-0 block md:hidden">
            <img src="{{ asset('images/atelier_mobile_hero.jpg') }}" alt="Cadence Canvas" class="object-cover w-full h-full object-center">
        </div>

        {{-- Very subtle bottom transition into feature section --}}
        <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-canvas to-transparent pointer-events-none"></div>

        {{-- Hero Content Layer --}}
        <div class="relative z-10 w-full max-w-7xl px-4 sm:px-6 lg:px-8 mx-auto flex-1 flex flex-col justify-between py-6 sm:py-10">

            {{-- 1. TOP PUZZLE TYPOGRAPHY (Artistic Placement Above Cat) --}}
            <div class="text-center pt-4 sm:pt-8 animate-fade-in-up">
                {{-- Casual artistic question --}}
                <p class="text-lg sm:text-2xl md:text-3xl font-sans font-medium tracking-wide text-ink/90 drop-shadow-sm">
                    what time?
                </p>

                {{-- Bold Painted Masterpiece Title --}}
                <h1 class="font-serif font-black tracking-[-0.03em] text-ink text-4xl sm:text-6xl md:text-7xl lg:text-8xl leading-none mt-1 sm:mt-2 drop-shadow-sm">
                    cadence <span class="text-coral italic font-normal">time!</span>
                </h1>

                {{-- Floating Puzzle Badges (Playful tilt angles around the composition) --}}
                <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3.5 mt-4 sm:mt-6 max-w-2xl mx-auto">
                    <span class="inline-flex items-center gap-1.5 px-3.5 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm font-semibold tracking-wider bg-canvas/95 text-ink rounded-xl border border-hairline shadow-sm -rotate-2 hover:rotate-0 transition-transform duration-200">
                        <span class="text-coral">✦</span> Build rhythm
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-4 sm:px-5 py-1.5 sm:py-2 text-xs sm:text-sm font-semibold tracking-wider bg-coral text-white rounded-xl shadow-md rotate-1 hover:rotate-0 transition-transform duration-200">
                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span> Find cadence
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3.5 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm font-semibold tracking-wider bg-canvas/95 text-ink rounded-xl border border-hairline shadow-sm -rotate-1 hover:rotate-0 transition-transform duration-200">
                        <span class="text-coral">✦</span> Stay consistent
                    </span>
                    <span class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs sm:text-sm font-semibold tracking-wider bg-surface-card/95 text-ink rounded-xl border border-hairline shadow-sm rotate-2 hover:rotate-0 transition-transform duration-200">
                        <span>●</span> Daily ritual
                    </span>
                </div>
            </div>

            {{-- 2. CENTER STAGE (Completely Open & Unobstructed for the Cat Artwork) --}}
            <div class="w-full h-40 sm:h-64 md:h-80 lg:h-96 pointer-events-none flex items-center justify-center">
                {{-- Clean open space so the painted cat's expressive face is 100% visible --}}
            </div>

            {{-- 3. BOTTOM ACTION DOCK (Positioned Neatly Below the Cat) --}}
            <div class="text-center pb-4 sm:pb-8">
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 max-w-md mx-auto">
                    @auth
                    <a href="{{ route('tracker') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-8 sm:px-10 py-3.5 sm:py-4 text-base sm:text-lg font-bold text-white rounded-full bg-coral hover:bg-coral-active shadow-xl hover:shadow-2xl transition-all duration-200 hover:-translate-y-0.5">
                        Open Your Canvas
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    @else
                    <a href="/dev-login" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-8 sm:px-10 py-3.5 sm:py-4 text-base sm:text-lg font-bold text-white rounded-full bg-coral hover:bg-coral-active shadow-xl hover:shadow-2xl transition-all duration-200 hover:-translate-y-0.5">
                        Start Your Cadence
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('google.redirect') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 sm:px-7 py-3.5 text-sm sm:text-base font-semibold rounded-full text-ink bg-white/95 hover:bg-surface-soft border border-hairline shadow-md hover:shadow-lg transition-all duration-200">
                        <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 01-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                        Sign in with Google
                    </a>
                    @endauth
                </div>
                <p class="mt-3 text-xs sm:text-sm font-medium text-muted">
                    Instant access · No password required · Zero friction
                </p>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- INTERACTIVE PREVIEW: Live Habit Seals Demo                     --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}
    <section class="py-12 sm:py-16 bg-surface-card/60 border-y border-hairline/80">
        <div class="max-w-5xl px-4 sm:px-6 mx-auto">
            <div class="text-center mb-8">
                <span class="inline-block px-3.5 py-1 mb-3 text-xs font-bold tracking-[0.15em] uppercase rounded-full bg-surface-card text-muted border border-hairline">Interactive Demo</span>
                <h2 class="text-2xl sm:text-3xl font-serif font-bold text-ink">Feel the Cadence</h2>
                <p class="text-sm sm:text-base text-muted mt-1">Tap a circle to stamp your habit completion seal.</p>
            </div>

            <div class="p-6 sm:p-8 rounded-2xl bg-canvas border border-hairline shadow-lg" x-data="{
                habits: [
                    { name: 'Morning Meditation', color: '#cc785c', days: [true, true, true, true, false, false, true] },
                    { name: 'Deep Work Session', color: '#1B263B', days: [true, true, true, false, true, true, false] },
                    { name: 'Physical Practice', color: '#606C38', days: [false, true, true, true, true, false, true] },
                ],
                dayNames: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
            }">
                <div class="space-y-4">
                    <template x-for="(habit, hIdx) in habits" :key="hIdx">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-xl bg-surface-card/50 border border-hairline-soft">
                            <div class="flex items-center gap-2.5">
                                <span class="w-3.5 h-3.5 rounded-full shrink-0" :style="'background-color: ' + habit.color"></span>
                                <span class="font-serif font-bold text-base sm:text-lg text-ink" x-text="habit.name"></span>
                            </div>
                            <div class="flex items-center gap-2 sm:gap-3 justify-between sm:justify-end">
                                <template x-for="(checked, dIdx) in habit.days" :key="dIdx">
                                    <div class="flex flex-col items-center gap-1">
                                        <span class="text-[10px] font-medium text-muted" x-text="dayNames[dIdx]"></span>
                                        <button
                                            type="button"
                                            @click="habit.days[dIdx] = !habit.days[dIdx]"
                                            class="w-8 h-8 rounded-full flex items-center justify-center transition-all duration-200 transform hover:scale-110 active:scale-95 shadow-sm"
                                            :style="habit.days[dIdx] ? 'background-color: ' + habit.color + '; border: none;' : 'background-color: transparent; border: 2px solid #e6dfd8;'"
                                        >
                                            <svg x-show="habit.days[dIdx]" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- FEATURES: 3 Museum-Grade Curated Cards                         --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}
    <section class="py-16 sm:py-24 bg-white">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8 mx-auto">
            <div class="max-w-2xl mx-auto mb-12 sm:mb-16 text-center">
                <span class="inline-block px-4 py-1.5 mb-4 text-xs font-bold tracking-[0.15em] uppercase rounded-full bg-surface-card text-muted border border-hairline">Architecture</span>
                <h2 class="font-serif font-bold text-ink text-3xl sm:text-5xl tracking-[-0.03em] leading-tight">
                    Every habit is a<br><span class="text-coral">signal</span> in your system
                </h2>
                <p class="mt-4 text-base sm:text-lg text-muted">A tactile consistency system designed to make daily discipline feel like art.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                {{-- Card 1: Streaks --}}
                <div class="group relative overflow-hidden rounded-2xl bg-canvas border border-hairline transition-all duration-500 hover:-translate-y-1.5 hover:shadow-xl">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img src="{{ asset('images/streak_masterpiece.jpg') }}" alt="Streak Engine" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <div class="p-6 sm:p-8">
                        <span class="inline-block px-3 py-1 mb-3 text-xs font-bold uppercase tracking-wider text-white rounded-full bg-coral">Streaks</span>
                        <h3 class="text-xl font-serif font-bold text-ink">Streak Architecture</h3>
                        <p class="mt-2 text-sm sm:text-base leading-relaxed text-muted">Watch your consistency build like layers of oil paint. Each completed day adds depth and compounding momentum.</p>
                    </div>
                </div>

                {{-- Card 2: Palettes --}}
                <div class="group relative overflow-hidden rounded-2xl bg-canvas border border-hairline transition-all duration-500 hover:-translate-y-1.5 hover:shadow-xl">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img src="{{ asset('images/brushstroke_accent.jpg') }}" alt="Color Palettes" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <div class="p-6 sm:p-8">
                        <span class="inline-block px-3 py-1 mb-3 text-xs font-bold uppercase tracking-wider text-ink rounded-full bg-amber-accent">Palettes</span>
                        <h3 class="text-xl font-serif font-bold text-ink">Artist Color Palette</h3>
                        <p class="mt-2 text-sm sm:text-base leading-relaxed text-muted">Color-code your practices with 12 historic pigment shades — Prussian Blue, Venetian Ochre, Burnt Umber, and Cadmium Gold.</p>
                    </div>
                </div>

                {{-- Card 3: Canvas --}}
                <div class="group relative overflow-hidden rounded-2xl bg-canvas border border-hairline transition-all duration-500 hover:-translate-y-1.5 hover:shadow-xl">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img src="{{ asset('images/canvas_texture.jpg') }}" alt="Daily Canvas" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <div class="p-6 sm:p-8">
                        <span class="inline-block px-3 py-1 mb-3 text-xs font-bold uppercase tracking-wider text-white rounded-full bg-teal-accent">Focus</span>
                        <h3 class="text-xl font-serif font-bold text-ink">Daily Living Canvas</h3>
                        <p class="mt-2 text-sm sm:text-base leading-relaxed text-muted">A tactile calendar where every mark matters. Reorder habits by priority, toggle status in one click, and see your progress at a glance.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- CALL TO ACTION                                                 --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}
    <section class="relative py-20 sm:py-28 bg-surface-dark overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10">
            <img src="{{ asset('images/canvas_texture.jpg') }}" alt="" class="object-cover w-full h-full">
        </div>
        <div class="relative z-10 max-w-3xl px-4 sm:px-6 mx-auto">
            <h2 class="font-serif font-bold text-on-dark text-3xl sm:text-5xl lg:text-6xl tracking-[-0.03em] leading-tight">
                Ready to find<br>your <span class="text-coral">cadence</span>?
            </h2>
            <p class="mt-4 sm:mt-6 text-base sm:text-lg text-on-dark-soft max-w-xl mx-auto">
                No complex onboarding. Instant guest access to your living canvas in seconds.
            </p>
            <div class="mt-8 sm:mt-10">
                <a href="/dev-login" class="inline-flex items-center gap-2.5 px-8 sm:px-10 py-4 text-base sm:text-lg font-bold text-white rounded-full bg-coral hover:bg-coral-active shadow-xl hover:shadow-2xl transition-all duration-200 hover:-translate-y-0.5">
                    Enter Your Studio
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="py-8 sm:py-10 border-t bg-canvas border-hairline text-center">
        <div class="max-w-7xl px-4 sm:px-6 mx-auto">
            <div class="flex items-center justify-center gap-2 mb-2">
                <span class="text-coral">✦</span>
                <span class="font-serif text-lg font-bold text-ink">Cadence</span>
            </div>
            <p class="text-xs sm:text-sm text-muted">A Minimalist Habit Engine & Consistency Architecture &copy; {{ date('Y') }}</p>
        </div>
    </footer>
</div>
