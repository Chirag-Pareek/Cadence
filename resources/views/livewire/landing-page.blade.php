<div class="min-h-screen bg-canvas">
    {{-- Navigation --}}
    <nav class="fixed top-0 left-0 right-0 z-50 border-b border-hairline/60 bg-canvas/95 backdrop-blur-lg">
        <div class="w-full max-w-7xl px-5 sm:px-8 lg:px-12 py-4 mx-auto">
            <div class="flex items-center justify-between">
                <a href="/" class="flex items-center gap-2.5 group">
                    <span class="text-2xl transition-transform group-hover:rotate-45 duration-300">✦</span>
                    <span class="text-xl sm:text-2xl font-serif font-bold tracking-tight text-ink">Cadence</span>
                </a>
                <div class="flex items-center gap-3">
                    @auth
                    <a href="{{ route('tracker') }}" class="px-5 sm:px-7 py-2.5 text-sm font-semibold text-white rounded-full bg-coral hover:bg-coral-active transition-all duration-200 shadow-md hover:shadow-lg">Dashboard</a>
                    @else
                    <a href="/dev-login" class="px-5 sm:px-7 py-2.5 text-sm font-semibold text-white rounded-full bg-coral hover:bg-coral-active transition-all duration-200 shadow-md hover:shadow-lg">Get Started</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- ═══════════════════════════════════════════════════ --}}
    {{-- HERO: Split Layout — Text Left, Cat Art Right      --}}
    {{-- ═══════════════════════════════════════════════════ --}}
    <section class="relative pt-24 sm:pt-28 lg:pt-32 pb-16 sm:pb-20 lg:pb-24 overflow-hidden">
        {{-- Subtle canvas texture across the entire hero --}}
        <div class="absolute inset-0">
            <img src="{{ asset('images/canvas_texture.jpg') }}" alt="" class="object-cover w-full h-full opacity-[0.06]">
        </div>

        <div class="relative z-10 w-full max-w-7xl px-5 sm:px-8 lg:px-12 mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">

                {{-- Left Column: Text Content --}}
                <div class="order-2 lg:order-1 text-center lg:text-left">
                    {{-- Pill badge --}}
                    <div class="inline-flex items-center gap-2 px-4 py-2 mb-8 text-xs font-bold tracking-[0.15em] uppercase rounded-full bg-surface-card border border-hairline text-muted">
                        <span class="w-2 h-2 rounded-full bg-coral animate-pulse"></span>
                        Habit Engine
                    </div>

                    {{-- Headline --}}
                    <h1 class="font-serif font-bold text-ink leading-[1.08] tracking-[-0.03em]
                        text-[2.5rem] sm:text-[3.5rem] md:text-[4rem] lg:text-[4.5rem] xl:text-[5.5rem]">
                        Build rhythm.<br>
                        <span class="text-coral">Find cadence.</span><br>
                        Stay consistent.
                    </h1>

                    {{-- Description --}}
                    <p class="mt-6 sm:mt-8 text-base sm:text-lg lg:text-xl leading-relaxed text-body max-w-xl mx-auto lg:mx-0">
                        A consistency architecture for people who build habits like systems. Track your daily cadence, visualize momentum, and let discipline compound.
                    </p>

                    {{-- CTA Buttons --}}
                    <div class="flex flex-col sm:flex-row items-center lg:items-start gap-4 mt-8 sm:mt-10">
                        @auth
                        <a href="{{ route('tracker') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-8 py-4 text-base font-bold text-white rounded-full bg-coral hover:bg-coral-active shadow-lg hover:shadow-xl transition-all duration-200 hover:-translate-y-0.5">
                            Open Dashboard
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        @else
                        <a href="/dev-login" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-8 py-4 text-base font-bold text-white rounded-full bg-coral hover:bg-coral-active shadow-lg hover:shadow-xl transition-all duration-200 hover:-translate-y-0.5">
                            Start for Free
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ route('google.redirect') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-3.5 text-sm font-semibold rounded-full text-ink bg-white hover:bg-surface-soft border border-hairline shadow-sm transition-all duration-200">
                            <svg class="w-5 h-5" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 01-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                            Sign in with Google
                        </a>
                        @endauth
                    </div>

                    {{-- Social proof / stats --}}
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-6 mt-10 sm:mt-12 pt-8 border-t border-hairline">
                        <div>
                            <span class="block text-2xl sm:text-3xl font-serif font-bold text-ink">∞</span>
                            <span class="text-xs font-medium text-muted uppercase tracking-wider">Habits</span>
                        </div>
                        <div class="w-px h-10 bg-hairline"></div>
                        <div>
                            <span class="block text-2xl sm:text-3xl font-serif font-bold text-ink">12</span>
                            <span class="text-xs font-medium text-muted uppercase tracking-wider">Colors</span>
                        </div>
                        <div class="w-px h-10 bg-hairline"></div>
                        <div>
                            <span class="block text-2xl sm:text-3xl font-serif font-bold text-coral">0</span>
                            <span class="text-xs font-medium text-muted uppercase tracking-wider">Excuses</span>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Cat Art --}}
                <div class="order-1 lg:order-2 flex justify-center lg:justify-end">
                    <div class="relative w-full max-w-md lg:max-w-lg xl:max-w-xl">
                        {{-- Decorative ring --}}
                        <div class="absolute -inset-3 sm:-inset-4 rounded-[28px] bg-gradient-to-br from-coral/20 via-transparent to-amber-accent/20 animate-float"></div>
                        {{-- Art frame --}}
                        <div class="relative rounded-[20px] overflow-hidden border-2 border-hairline shadow-2xl">
                            <picture>
                                <source media="(min-width: 768px)" srcset="{{ asset('images/atelier_desktop_hero.jpg') }}">
                                <img src="{{ asset('images/atelier_mobile_hero.jpg') }}"
                                     alt="Cadence — Impasto painted cat on textured canvas"
                                     class="w-full h-auto object-cover aspect-[4/3] sm:aspect-[3/2]"
                                     loading="eager">
                            </picture>
                            {{-- Frame label --}}
                            <div class="absolute bottom-0 left-0 right-0 px-5 py-3 bg-gradient-to-t from-surface-dark/80 to-transparent">
                                <span class="text-xs font-mono tracking-wider text-on-dark/70 uppercase">Cadence · 2026</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════ --}}
    {{-- FEATURES: Premium Responsive Cards                  --}}
    {{-- ═══════════════════════════════════════════════════ --}}
    <section class="relative py-20 sm:py-28 lg:py-32 bg-white">
        <div class="w-full max-w-7xl px-5 sm:px-8 lg:px-12 mx-auto">
            {{-- Section Header --}}
            <div class="max-w-2xl mx-auto mb-14 sm:mb-20 text-center">
                <span class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-[0.15em] uppercase rounded-full bg-surface-card text-muted border border-hairline">Features</span>
                <h2 class="font-serif font-bold text-ink leading-[1.1] tracking-[-0.03em]
                    text-3xl sm:text-4xl lg:text-5xl">
                    Every habit is a<br><span class="text-coral">signal</span> in your system
                </h2>
                <p class="mt-5 text-base sm:text-lg text-muted max-w-lg mx-auto">Three tools designed to make consistency feel effortless and beautiful.</p>
            </div>

            {{-- Feature Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                {{-- Card 1 --}}
                <div class="group relative overflow-hidden rounded-2xl bg-canvas border border-hairline transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img src="{{ asset('images/streak_masterpiece.jpg') }}" alt="Streaks" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.08]">
                    </div>
                    <div class="p-6 sm:p-8">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2 h-2 rounded-full bg-coral"></span>
                            <span class="text-xs font-bold uppercase tracking-[0.12em] text-coral">Streaks</span>
                        </div>
                        <h3 class="text-lg sm:text-xl font-serif font-bold text-ink">Streak Engine</h3>
                        <p class="mt-2.5 text-sm sm:text-base leading-relaxed text-muted">Each day builds on the last. Watch streaks compound into unbreakable momentum.</p>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="group relative overflow-hidden rounded-2xl bg-canvas border border-hairline transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img src="{{ asset('images/brushstroke_accent.jpg') }}" alt="Palettes" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.08]">
                    </div>
                    <div class="p-6 sm:p-8">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2 h-2 rounded-full bg-amber-accent"></span>
                            <span class="text-xs font-bold uppercase tracking-[0.12em] text-amber-accent">Palettes</span>
                        </div>
                        <h3 class="text-lg sm:text-xl font-serif font-bold text-ink">Color Palettes</h3>
                        <p class="mt-2.5 text-sm sm:text-base leading-relaxed text-muted">12 handpicked artist colors — Prussian Blue, Burnt Umber, Venetian Ochre, and more.</p>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="group relative overflow-hidden rounded-2xl bg-canvas border border-hairline transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl sm:col-span-2 lg:col-span-1">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img src="{{ asset('images/canvas_texture.jpg') }}" alt="Focus" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.08]">
                    </div>
                    <div class="p-6 sm:p-8">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2 h-2 rounded-full bg-teal-accent"></span>
                            <span class="text-xs font-bold uppercase tracking-[0.12em] text-teal-accent">Focus</span>
                        </div>
                        <h3 class="text-lg sm:text-xl font-serif font-bold text-ink">Daily Canvas</h3>
                        <p class="mt-2.5 text-sm sm:text-base leading-relaxed text-muted">A visual calendar where every checkmark is a tactile seal — turning routine into ritual.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════════ --}}
    {{-- DARK CTA                                            --}}
    {{-- ═══════════════════════════════════════════════════ --}}
    <section class="relative overflow-hidden bg-surface-dark py-20 sm:py-28 lg:py-32">
        <div class="absolute inset-0 opacity-[0.07]">
            <img src="{{ asset('images/canvas_texture.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 w-full max-w-3xl px-5 sm:px-8 mx-auto text-center">
            <h2 class="font-serif font-bold text-on-dark leading-[1.1] tracking-[-0.03em]
                text-3xl sm:text-4xl lg:text-5xl">
                Ready to find<br>your <span class="text-coral">cadence</span>?
            </h2>
            <p class="mt-5 sm:mt-6 text-base sm:text-lg text-on-dark-soft max-w-md mx-auto">No account needed. Jump straight in and start building your system.</p>
            <div class="mt-8 sm:mt-10">
                <a href="/dev-login" class="inline-flex items-center gap-2.5 px-8 sm:px-10 py-4 text-base font-bold text-white rounded-full bg-coral hover:bg-coral-active shadow-lg hover:shadow-xl transition-all duration-200 hover:-translate-y-0.5">
                    Start for Free
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="py-10 sm:py-12 border-t bg-canvas border-hairline">
        <div class="w-full max-w-7xl px-5 sm:px-8 lg:px-12 mx-auto text-center">
            <div class="flex items-center justify-center gap-2.5 mb-3">
                <span class="text-lg">✦</span>
                <span class="font-serif text-lg font-bold text-ink">Cadence</span>
            </div>
            <p class="text-sm text-muted-soft">&copy; {{ date('Y') }} Cadence — A Minimalist Habit Engine</p>
        </div>
    </footer>
</div>
