<section id="schedule" class="py-20 lg:py-28 bg-[#080a0f] relative overflow-hidden select-none border-t border-white/[0.08]">
    <!-- Giant Subtle Outline Watermark -->
    <div class="bg-watermark top-12 left-1/2 -translate-x-1/2 text-[15vw] leading-none whitespace-nowrap opacity-20">
        SCHEDULE
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full badge-glow text-xs font-bold uppercase tracking-wider mb-3">
                <i class="fa-solid fa-calendar-days text-[#ff5e14]"></i>
                <span>Weekly Training Matrix</span>
            </span>
            <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight uppercase leading-tight mb-4">
                Our Class <span class="text-gradient-orange">Schedule</span>
            </h2>
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                Choose a plan that fits your goals, schedule, and lifestyle — our coached sessions run around the clock.
            </p>
        </div>

        <!-- Schedule Container: items-stretch so left sidebar and right table have the EXACT SAME length at bottom -->
        <div class="flex flex-col lg:flex-row gap-6 items-stretch">
            <!-- Left Filter Tabs -->
            <div class="w-full lg:w-48 flex lg:flex-col flex-wrap gap-2.5 shrink-0 justify-between">
                <button class="schedule-tab w-full text-left font-black text-xs uppercase tracking-wider py-3.5 px-4 rounded-xl btn-glow-orange text-white transition-all flex items-center justify-between shadow-md shadow-[#ff5e14]/30 cursor-pointer" data-category="all">
                    <span>ALL</span>
                    <i class="fa-solid fa-chevron-right text-[10px] hidden lg:inline"></i>
                </button>
                <button class="schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-xl card-vibrant text-slate-300 hover:text-white hover:border-[#ff5e14]/40 transition-all flex items-center justify-between cursor-pointer" data-category="aerobics">
                    <span>AEROBICS</span>
                </button>
                <button class="schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-xl card-vibrant text-slate-300 hover:text-white hover:border-[#ff5e14]/40 transition-all flex items-center justify-between cursor-pointer" data-category="cycling">
                    <span>CYCLING</span>
                </button>
                <button class="schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-xl card-vibrant text-slate-300 hover:text-white hover:border-[#ff5e14]/40 transition-all flex items-center justify-between cursor-pointer" data-category="cardio">
                    <span>CARDIO</span>
                </button>
                <button class="schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-xl card-vibrant text-slate-300 hover:text-white hover:border-[#ff5e14]/40 transition-all flex items-center justify-between cursor-pointer" data-category="yoga">
                    <span>YOGA</span>
                </button>
                <button class="schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-xl card-vibrant text-slate-300 hover:text-white hover:border-[#ff5e14]/40 transition-all flex items-center justify-between cursor-pointer" data-category="stretching">
                    <span>STRETCHING</span>
                </button>
            </div>

            <!-- Right Schedule Calendar Grid Table (Stretches to match exact bottom height) -->
            <div class="w-full flex-1 overflow-x-auto rounded-2xl border border-white/10 bg-[#0e121a] shadow-2xl flex flex-col justify-between">
                <table class="w-full h-full text-center border-collapse min-w-[700px]">
                    <!-- Days Header (Orange Radiant Header row) -->
                    <thead>
                        <tr class="bg-gradient-to-r from-[#ff7a1a] to-[#ff5e14] text-white font-heading font-black text-xs sm:text-sm tracking-wider uppercase h-12 shadow-sm">
                            <th class="py-3 px-3 border-r border-white/15">SUNDAY</th>
                            <th class="py-3 px-3 border-r border-white/15">MONDAY</th>
                            <th class="py-3 px-3 border-r border-white/15">TUESDAY</th>
                            <th class="py-3 px-3 border-r border-white/15">WEDNESDAY</th>
                            <th class="py-3 px-3 border-r border-white/15">THURSDAY</th>
                            <th class="py-3 px-3 border-r border-white/15">FRIDAY</th>
                            <th class="py-3 px-3">SATURDAY</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-xs text-slate-300 h-full">
                        <!-- Morning Slot -->
                        <tr class="divide-x divide-white/5 bg-[#111624]/60 hover:bg-[#161d2d] transition-colors h-[86px]">
                            <td class="p-4 class-item" data-type="aerobics">
                                <span class="font-bold text-white block">AEROBICS</span>
                                <span class="text-[11px] text-slate-400">10:30AM-11:30AM</span>
                            </td>
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 class-item" data-type="cycling">
                                <span class="font-bold text-white block">CYCLING</span>
                                <span class="text-[11px] text-slate-400">10:30AM-11:30AM</span>
                            </td>
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 class-item" data-type="cardio">
                                <span class="font-bold text-white block">CARDIO</span>
                                <span class="text-[11px] text-slate-400">10:30AM-11:30AM</span>
                            </td>
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 class-item" data-type="stretching">
                                <span class="font-bold text-white block">STRETCHING</span>
                                <span class="text-[11px] text-slate-400">10:30AM-11:30AM</span>
                            </td>
                        </tr>

                        <!-- Mid-day Slot -->
                        <tr class="divide-x divide-white/5 bg-[#0e121a]/60 hover:bg-[#161d2d] transition-colors h-[86px]">
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 class-item" data-type="cardio">
                                <span class="font-bold text-white block">CARDIO</span>
                                <span class="text-[11px] text-slate-400">02:00PM-03:00PM</span>
                            </td>
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 class-item" data-type="aerobics">
                                <span class="font-bold text-white block">AEROBICS</span>
                                <span class="text-[11px] text-slate-400">02:00PM-03:00PM</span>
                            </td>
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 class-item" data-type="yoga">
                                <span class="font-bold text-white block">YOGA</span>
                                <span class="text-[11px] text-slate-400">02:00PM-03:00PM</span>
                            </td>
                            <td class="p-4 text-slate-600">-</td>
                        </tr>

                        <!-- Afternoon Slot -->
                        <tr class="divide-x divide-white/5 bg-[#111624]/60 hover:bg-[#161d2d] transition-colors h-[86px]">
                            <td class="p-4 class-item" data-type="stretching">
                                <span class="font-bold text-white block">STRETCHING</span>
                                <span class="text-[11px] text-slate-400">04:00PM-05:00PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="cycling">
                                <span class="font-bold text-white block">CYCLING</span>
                                <span class="text-[11px] text-slate-400">04:00PM-05:00PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="yoga">
                                <span class="font-bold text-white block">YOGA</span>
                                <span class="text-[11px] text-slate-400">04:00PM-05:00PM</span>
                            </td>
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 class-item" data-type="cardio">
                                <span class="font-bold text-white block">CARDIO</span>
                                <span class="text-[11px] text-slate-400">04:00PM-05:00PM</span>
                            </td>
                            <td class="p-4 text-slate-600">-</td>
                        </tr>

                        <!-- Sunset Slot -->
                        <tr class="divide-x divide-white/5 bg-[#0e121a]/60 hover:bg-[#161d2d] transition-colors h-[86px]">
                            <td class="p-4 class-item" data-type="yoga">
                                <span class="font-bold text-white block">YOGA</span>
                                <span class="text-[11px] text-slate-400">05:30PM-06:30PM</span>
                            </td>
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 class-item" data-type="yoga">
                                <span class="font-bold text-white block">YOGA</span>
                                <span class="text-[11px] text-slate-400">05:30PM-06:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="cardio">
                                <span class="font-bold text-white block">CARDIO</span>
                                <span class="text-[11px] text-slate-400">05:30PM-06:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="cycling">
                                <span class="font-bold text-white block">CYCLING</span>
                                <span class="text-[11px] text-slate-400">05:30PM-06:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="yoga">
                                <span class="font-bold text-white block">YOGA</span>
                                <span class="text-[11px] text-slate-400">05:30PM-06:30PM</span>
                            </td>
                        </tr>

                        <!-- Evening Slot -->
                        <tr class="divide-x divide-white/5 bg-[#111624]/60 hover:bg-[#161d2d] transition-colors h-[86px]">
                            <td class="p-4 class-item" data-type="aerobics">
                                <span class="font-bold text-white block">AEROBICS</span>
                                <span class="text-[11px] text-slate-400">09:30PM-10:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="cycling">
                                <span class="font-bold text-white block">CYCLING</span>
                                <span class="text-[11px] text-slate-400">09:30PM-10:30PM</span>
                            </td>
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 text-slate-600">-</td>
                            <td class="p-4 class-item" data-type="cardio">
                                <span class="font-bold text-white block">CARDIO</span>
                                <span class="text-[11px] text-slate-400">09:30PM-10:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="stretching">
                                <span class="font-bold text-white block">STRETCHING</span>
                                <span class="text-[11px] text-slate-400">09:30PM-10:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="aerobics">
                                <span class="font-bold text-white block">AEROBICS</span>
                                <span class="text-[11px] text-slate-400">09:30PM-10:30PM</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.schedule-tab');
    const items = document.querySelectorAll('.class-item');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => {
                t.className = 'schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-xl card-vibrant text-slate-300 hover:text-white hover:border-[#ff5e14]/40 transition-all flex items-center justify-between cursor-pointer';
            });
            tab.className = 'schedule-tab w-full text-left font-black text-xs uppercase tracking-wider py-3.5 px-4 rounded-xl btn-glow-orange text-white transition-all flex items-center justify-between shadow-md shadow-[#ff5e14]/30 cursor-pointer';

            const cat = tab.getAttribute('data-category');
            items.forEach(item => {
                if (cat === 'all' || item.getAttribute('data-type') === cat) {
                    item.classList.remove('opacity-20');
                    item.classList.add('bg-[#ff5e14]/15');
                } else {
                    item.classList.add('opacity-20');
                    item.classList.remove('bg-[#ff5e14]/15');
                }
            });
        });
    });
});
</script>
