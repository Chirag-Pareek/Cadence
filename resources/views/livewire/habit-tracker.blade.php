<div class="min-h-screen bg-canvas">
    {{-- Top Navigation Bar --}}
    <nav class="border-b border-hairline bg-canvas/90 backdrop-blur-md">
        <div class="container px-6 py-4 mx-auto">
            <div class="flex items-center justify-between">
                <a href="{{ route('landing-page') }}" class="flex items-center gap-2 transition-opacity hover:opacity-70">
                    <span class="text-xl">✦</span>
                    <span class="text-xl font-serif font-semibold tracking-tight text-ink">Cadence</span>
                </a>
                <div class="flex items-center gap-2">
                    <a wire:confirm="Are you sure you want to logout?" wire:click="logout" class="px-4 py-2 text-sm font-medium transition duration-150 border rounded-md cursor-pointer text-error hover:bg-red-50 border-hairline">
                        <i class="mr-1 fa-solid fa-right-from-bracket"></i> Leave
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container px-6 mx-auto">
        {{-- Header with Title and Date --}}
        <div class="flex flex-col items-center justify-between gap-6 py-10 md:flex-row">
            <div>
                <h1 class="font-serif font-normal tracking-[-0.03em] text-ink text-3xl md:text-5xl">
                    Your <span class="text-coral">Canvas</span>
                </h1>
                <p class="mt-2 text-muted">Every mark matters. Every day counts.</p>
            </div>
            <div class="flex items-center gap-5">
                <div class="flex items-center gap-3 px-5 py-3 border rounded-card bg-surface-card border-hairline">
                    <span class="text-sm font-medium text-muted">Month</span>
                    <span class="text-xl font-serif font-semibold text-ink">{{ now()->startOfMonth()->addMonths($selected_month - 1)->monthName }}</span>
                    <span class="text-muted">/</span>
                    <span class="text-sm font-medium text-muted">Year</span>
                    <span class="text-xl font-serif font-semibold text-ink">{{ $selected_year }}</span>
                </div>
            </div>
        </div>

        {{-- Tabs --}}
        <div class="flex items-center gap-1 mb-6">
            <button wire:click="setTab('calendar')" class="px-5 py-2.5 text-sm font-medium rounded-md transition duration-150 {{ $current_tab === 'calendar' ? 'bg-coral text-white' : 'bg-surface-card text-muted hover:bg-surface-cream-strong border border-hairline' }}">
                <i class="mr-1.5 fa-solid fa-calendar-days"></i> Calendar
            </button>
            <button wire:click="setTab('habits')" class="px-5 py-2.5 text-sm font-medium rounded-md transition duration-150 {{ $current_tab === 'habits' ? 'bg-coral text-white' : 'bg-surface-card text-muted hover:bg-surface-cream-strong border border-hairline' }}">
                <i class="mr-1.5 fa-solid fa-palette"></i> Habits
            </button>
        </div>

        {{-- Calendar View --}}
        @if ($current_tab === 'calendar')
        <div class="p-6 border rounded-card bg-surface-card/50 border-hairline">
            <div class="overflow-x-auto" id="habit-tracker"
                x-data
                x-init="setTimeout(() => {
                    const today = new Date().getDate();
                    const todayCell = document.querySelector(`#habit-${today - 1}`);
                    if (todayCell) {
                        todayCell.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start',
                            inline: 'center'
                        });
                    }
                }, 200)">

                @if (count($habits) === 0)
                <div class="py-16 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-surface-card">
                        <i class="text-2xl fa-solid fa-palette text-coral"></i>
                    </div>
                    <h3 class="text-2xl font-serif text-ink">Your canvas awaits</h3>
                    <p class="mt-2 text-muted">Switch to the Habits tab to create your first brushstroke.</p>
                </div>
                @else
                <table class="w-full text-sm">
                    <thead>
                        <tr>
                            <th class="sticky left-0 z-10 px-3 py-3 text-xs font-medium tracking-wider text-left uppercase bg-surface-card text-muted">Habit</th>
                            @for ($i = 0; $i < $month_days; $i++)
                            <th class="px-1 py-3 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-[10px] font-medium text-muted-soft w-8">{{ now()->startOfMonth()->addDays($i)->format('D') }}</span>
                                    <span class="text-xs font-semibold text-ink w-8 {{ now()->day == $i + 1 ? 'text-coral' : '' }}">{{ $i + 1 }}</span>
                                </div>
                            </th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($habits->where('is_active', true)->sortBy('order') as $habit)
                        <tr class="transition-colors border-t border-hairline-soft hover:bg-surface-soft/50">
                            <td class="sticky left-0 z-10 px-3 py-2 bg-surface-card">
                                <div class="flex items-center gap-2">
                                    <span class="inline-block w-3 h-3 rounded-full shrink-0" style="background-color: {{ $habit->color }};"></span>
                                    <span class="text-sm font-medium text-ink whitespace-nowrap">{{ $habit->name }}</span>
                                </div>
                            </td>
                            @for ($j = 0; $j < $month_days; $j++)
                            <td class="px-1 py-2 text-center min-w-10" id="habit-{{ $j }}">
                                @php
                                    $cellDateStr = now()->startOfMonth()->addDays($j)->format('Y-m-d');
                                    $isCompleted = $habit->completions->contains(function ($c) use ($cellDateStr) {
                                        $val = is_string($c->completed_at) ? $c->completed_at : (is_object($c->completed_at) ? $c->completed_at->format('Y-m-d') : (string)$c->completed_at);
                                        return str_starts_with($val, $cellDateStr);
                                    });
                                    $isToday = $j + 1 == now()->day;
                                @endphp
                                <button
                                    type="button"
                                    wire:key="habit-cell-{{ $habit->id }}-{{ $j }}"
                                    wire:click="toggle({{ $habit->id }}, {{ $j }})"
                                    class="inline-flex items-center justify-center w-8 h-8 transition-all duration-200 rounded-full cursor-pointer hover:scale-110 active:scale-95 {{ $isCompleted ? 'scale-100 shadow-sm' : 'scale-90 hover:border-coral' }} {{ $isToday ? 'ring-2 ring-coral ring-offset-2' : '' }}"
                                    style="{{ $isCompleted ? 'background-color: ' . $habit->color . '; border: none;' : 'background-color: transparent; border: 2px solid #e6dfd8;' }}"
                                    title="{{ $habit->name }} - {{ now()->startOfMonth()->addDays($j)->format('M d') }}"
                                >
                                    @if($isCompleted)
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    @endif
                                </button>
                            </td>
                            @endfor
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
        @endif

        {{-- Habits Management View --}}
        @if ($current_tab === 'habits')
        <div class="p-6 border rounded-card bg-surface-card/50 border-hairline">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-serif font-medium text-ink">Your Palette</h3>
                <button class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white transition duration-150 rounded-md bg-coral hover:bg-coral-active" wire:click="$toggle('showNewHabitModal')">
                    <i class="fa-solid fa-plus"></i> New Habit
                </button>
            </div>

            @if (count($habits) === 0)
            <div class="py-16 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-surface-card">
                    <i class="text-2xl fa-solid fa-paintbrush text-coral"></i>
                </div>
                <h3 class="text-2xl font-serif text-ink">Begin your first brushstroke</h3>
                <p class="mt-2 text-muted">Click "New Habit" to add your first daily practice.</p>
            </div>
            @else
            <div class="overflow-hidden border rounded-card border-hairline">
                <table class="w-full">
                    <thead>
                        <tr class="bg-surface-card">
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left uppercase text-muted"></th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left uppercase text-muted">Color</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left uppercase text-muted">Habit</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left uppercase text-muted">Active</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-right uppercase text-muted">Actions</th>
                        </tr>
                    </thead>
                    <tbody wire:sortable="updateOrder">
                        @foreach ($habits->sortBy('order') as $habit)
                        <tr wire:sortable.item="{{ $habit->id }}" wire:key="habit-{{ $habit->id }}" class="transition-colors border-t bg-canvas border-hairline hover:bg-surface-soft">
                            <td wire:sortable.handle class="px-4 py-3 cursor-move">
                                <i class="fa-solid fa-grip-vertical text-muted-soft"></i>
                            </td>
                            <td class="px-4 py-3">
                                <div class="w-6 h-6 border rounded-full border-hairline" style="background-color: {{ $habit->color }};"></div>
                            </td>
                            <td class="px-4 py-3 font-medium text-ink {{ !$habit->is_active ? 'opacity-40' : '' }}">
                                {{ $habit->name }}
                            </td>
                            <td class="px-4 py-3">
                                <button wire:click="toggleActive({{ $habit->id }})" class="relative inline-flex items-center h-6 transition-colors duration-200 rounded-full w-11 {{ $habit->is_active ? 'bg-success' : 'bg-surface-cream-strong' }}">
                                    <span class="inline-block w-4 h-4 transition-transform duration-200 transform bg-white rounded-full shadow {{ $habit->is_active ? 'translate-x-6' : 'translate-x-1' }}"></span>
                                </button>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <button class="p-2 transition rounded-md text-muted hover:text-ink hover:bg-surface-card" wire:click="editHabit({{ $habit->id }})">
                                        <i class="text-sm fa-solid fa-pen"></i>
                                    </button>
                                    <button class="p-2 transition rounded-md text-muted hover:text-error hover:bg-red-50" wire:confirm="Are you sure you want to delete this habit?" wire:click="deleteHabit({{ $habit->id }})">
                                        <i class="text-sm fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
        @endif
    </div>

    {{-- Habit Create/Edit Modal --}}
    <div x-data="{ 
            open: false,
            init() {
                this.$watch('$wire.showNewHabitModal', value => {
                    this.open = value;
                });
            }
        }"
        @keydown.escape.window="open = false; $wire.showNewHabitModal = false"
        x-show="open"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4">

        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-ink/40 backdrop-blur-sm" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="open = false; $wire.showNewHabitModal = false"></div>

        {{-- Modal Panel --}}
        <div class="relative z-10 w-full max-w-md border shadow-2xl rounded-hero bg-canvas border-hairline" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95 translate-y-4" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95 translate-y-4">
            <div class="p-8">
                <h3 class="text-2xl font-serif font-medium text-ink">
                    {{ $editingHabit ? 'Refine Your Habit' : 'New Brushstroke' }}
                </h3>
                <p class="mt-1 text-sm text-muted">{{ $editingHabit ? 'Adjust the details of this practice.' : 'Add a new daily practice to your canvas.' }}</p>

                <form wire:submit.prevent="saveHabit" class="mt-6 space-y-5">
                    <div>
                        <label class="block mb-1.5 text-sm font-medium text-ink">Habit Name</label>
                        <input type="text" wire:model.live="habitForm.name" class="w-full px-4 py-2.5 text-sm border rounded-md bg-canvas text-ink border-hairline focus:ring-2 focus:ring-coral/30 focus:border-coral placeholder:text-muted-soft" placeholder="e.g. Morning meditation" autofocus />
                        @error('habitForm.name')
                        <span class="mt-1 text-xs text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-ink">Color Palette</label>
                        <div class="flex flex-wrap gap-2" x-data="{ colors: [
                            {name: 'Ultramarine', hex: '#1B263B'},
                            {name: 'Prussian Blue', hex: '#415A77'},
                            {name: 'Burnt Umber', hex: '#8B4513'},
                            {name: 'Venetian Ochre', hex: '#D4A373'},
                            {name: 'Cadmium Gold', hex: '#E09F3E'},
                            {name: 'Vermilion', hex: '#C84B31'},
                            {name: 'Emerald', hex: '#2D6A4F'},
                            {name: 'Olive Sage', hex: '#606C38'},
                            {name: 'Terracotta', hex: '#BC6C25'},
                            {name: 'Coral', hex: '#cc785c'},
                            {name: 'Teal', hex: '#5db8a6'},
                            {name: 'Amethyst', hex: '#7B2D8E'},
                        ] }">
                            <template x-for="color in colors" :key="color.hex">
                                <button type="button"
                                    @click="$wire.set('habitForm.color', color.hex)"
                                    class="relative w-8 h-8 transition-all duration-200 border-2 rounded-full hover:scale-110"
                                    :style="'background-color: ' + color.hex"
                                    :class="$wire.habitForm.color === color.hex ? 'border-ink scale-110 ring-2 ring-coral/30' : 'border-transparent'"
                                    :title="color.name">
                                    <span x-show="$wire.habitForm.color === color.hex" class="absolute inset-0 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                </button>
                            </template>
                        </div>
                        <input type="hidden" wire:model.live="habitForm.color">
                        @error('habitForm.color')
                        <span class="mt-1 text-xs text-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-hairline">
                        <button type="button" class="flex-1 px-5 py-2.5 text-sm font-medium transition duration-150 border rounded-md text-ink bg-canvas hover:bg-surface-soft border-hairline" @click="open = false; $wire.showNewHabitModal = false">
                            Cancel
                        </button>
                        <button type="submit" class="flex-1 px-5 py-2.5 text-sm font-medium text-white transition duration-150 rounded-md bg-coral hover:bg-coral-active">
                            {{ $editingHabit ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>