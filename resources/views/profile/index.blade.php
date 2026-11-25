@extends('layouts.app', ['title' => 'Athlete Profile & Membership — Gymstick'])

@section('content')
<div class="min-h-screen bg-[#080a0f] text-[#f3f4f6] py-10 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Ambient Background Watermark -->
    <div class="bg-watermark top-12 left-1/2 -translate-x-1/2 text-[15vw] leading-none whitespace-nowrap opacity-20">PROFILE</div>

    <div class="max-w-7xl mx-auto space-y-8 relative z-10">

        <!-- Top Profile Header Bar -->
        <div class="bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 shadow-xl">
            <div class="flex items-center gap-4 sm:gap-5">
                <!-- Avatar with Status Ring -->
                <div class="relative">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gradient-to-br from-[#1e2638] to-[#121620] border-2 border-[#ff5e14] flex items-center justify-center text-2xl sm:text-3xl font-heading font-black text-[#ff9e58] shadow-lg shadow-[#ff5e14]/10">
                        {{ strtoupper(substr($profile['name'], 0, 2)) }}
                    </div>
                    <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-[#131722] rounded-full animate-pulse" title="Status: Online & Active Member"></span>
                </div>

                <!-- Athlete Name & ID -->
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-1">
                        <h1 class="font-heading text-2xl sm:text-3xl font-black text-white tracking-wide">
                            {{ $profile['name'] }}
                        </h1>
                        <span class="px-2.5 py-0.5 rounded-full bg-[#ff5e14]/15 border border-[#ff5e14]/40 text-[#ff9e58] text-[10px] font-black uppercase tracking-wider">
                            <i class="fa-solid fa-circle-check text-[9px] mr-1"></i> {{ $profile['membership_status'] }}
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full bg-white/5 border border-white/10 text-gray-300 text-[10px] font-semibold">
                            VIP ATHLETE
                        </span>
                    </div>
                    <p class="text-xs text-gray-400 flex items-center gap-2 flex-wrap">
                        <span><i class="fa-regular fa-envelope text-gray-500 mr-1"></i> {{ $profile['email'] }}</span>
                        <span class="text-white/20">•</span>
                        <span><i class="fa-regular fa-id-badge text-[#ff9e58] mr-1"></i> Gym ID: <strong class="text-white font-mono">{{ $profile['gym_id'] }}</strong></span>
                        <span class="text-white/20">•</span>
                        <span><i class="fa-regular fa-calendar-check text-gray-500 mr-1"></i> Member Since: {{ $profile['member_since'] }}</span>
                    </p>
                </div>
            </div>

            <!-- Header Quick Actions -->
            <div class="flex items-center gap-3 w-full md:w-auto justify-end">
                <button 
                    type="button" 
                    onclick="openEditProfileModal()" 
                    class="flex items-center gap-2 bg-white/5 hover:bg-white/10 text-white text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-xl border border-white/10 transition-all cursor-pointer"
                >
                    <i class="fa-solid fa-user-pen text-[#ff9e58]"></i>
                    <span>Edit Profile</span>
                </button>
                <a 
                    href="{{ route('home') }}" 
                    class="flex items-center gap-2 btn-glow-orange text-white text-xs font-black uppercase tracking-wider px-4 py-2.5 rounded-xl transition-all shadow-md shadow-[#ff5e14]/30"
                >
                    <i class="fa-solid fa-house"></i>
                    <span>Back to Home</span>
                </a>
            </div>
        </div>

        <!-- Success Feedback Banner -->
        @if (session('success'))
            <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-base"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-400/60 hover:text-emerald-400">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        <!-- Grid 1: Digital Member Pass & Athlete Bio -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Digital Gym Card (1 Col) -->
            <div class="lg:col-span-1 space-y-4">
                <div class="flex items-center justify-between">
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-id-card text-[#ff9e58]"></i>
                        <span>Digital Gym Pass</span>
                    </h2>
                    <span class="text-[10px] text-gray-400 uppercase tracking-widest font-mono">SCAN READY</span>
                </div>

                <!-- Authentic Digital RFID Member Card -->
                <div class="relative rounded-2xl p-6 bg-gradient-to-tr from-[#0e121a] via-[#161d2d] to-[#1a2337] border-2 border-[#ff5e14]/40 shadow-2xl overflow-hidden group">
                    <!-- Subtle Gym Glow Background -->
                    <div class="absolute -top-12 -right-12 w-40 h-40 bg-[#ff5e14]/15 rounded-full blur-2xl group-hover:scale-125 transition-transform duration-700"></div>

                    <!-- Top Card Row: Logo & RFID Symbol -->
                    <div class="flex items-center justify-between relative z-10 pb-4">
                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-[2px] h-6">
                                <span class="w-[3px] h-3 bg-[#ff5e14] rounded-full"></span>
                                <span class="w-[4px] h-5 bg-[#ff5e14] rounded-full"></span>
                                <span class="w-[4px] h-4 bg-[#ff5e14] rounded-full"></span>
                                <span class="w-[3px] h-2 bg-[#ff5e14] rounded-full"></span>
                            </div>
                            <div>
                                <span class="font-heading text-base font-black tracking-wider text-white">Gymstick</span>
                                <span class="text-[7px] block tracking-[0.2em] text-[#ff9e58] font-bold">ALL-ACCESS</span>
                            </div>
                        </div>

                        <!-- RFID Chip & Contactless waves -->
                        <div class="flex items-center gap-1.5 text-gray-400">
                            <i class="fa-solid fa-wifi rotate-90 text-[#ff9e58] text-xs"></i>
                            <span class="text-[9px] uppercase font-bold tracking-wider text-gray-400">RFID</span>
                        </div>
                    </div>

                    <!-- EMV Golden Chip Graphic -->
                    <div class="w-11 h-8 rounded-md bg-gradient-to-tr from-amber-600 via-amber-400 to-amber-200 border border-amber-300 shadow-md relative z-10 mb-4 flex items-center justify-center overflow-hidden">
                        <div class="w-full h-[1px] bg-amber-800/40 absolute top-2"></div>
                        <div class="w-full h-[1px] bg-amber-800/40 absolute bottom-2"></div>
                        <div class="h-full w-[1px] bg-amber-800/40 absolute left-3"></div>
                        <div class="h-full w-[1px] bg-amber-800/40 absolute right-3"></div>
                        <div class="w-3 h-3 rounded-full border border-amber-800/50"></div>
                    </div>

                    <!-- Gym ID Code -->
                    <div class="relative z-10 mb-4">
                        <span class="text-[9px] text-gray-400 uppercase tracking-widest font-semibold block">Member ID Number</span>
                        <span class="font-mono text-xl sm:text-2xl font-black text-white tracking-widest drop-shadow">
                            {{ $profile['gym_id'] }}
                        </span>
                    </div>

                    <!-- Member Name & Package Tier -->
                    <div class="flex items-end justify-between relative z-10 pt-2 border-t border-white/10">
                        <div>
                            <span class="text-[9px] text-gray-400 uppercase tracking-widest block font-medium">Athlete Name</span>
                            <span class="font-heading text-sm font-bold text-white uppercase tracking-wider">
                                {{ $profile['name'] }}
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-[9px] text-gray-400 uppercase tracking-widest block font-medium">Access Tier</span>
                            <span class="text-xs font-black text-[#ff9e58] uppercase">
                                PRO ATHLETE
                            </span>
                        </div>
                    </div>

                    <!-- Simulated Barcode at bottom -->
                    <div class="mt-5 pt-3 border-t border-dashed border-white/10 flex flex-col items-center justify-center">
                        <div class="h-8 w-full flex items-center justify-between px-2 opacity-80 group-hover:opacity-100 transition-opacity">
                            @for ($i = 0; $i < 38; $i++)
                                <span class="bg-white h-full {{ $i % 4 == 0 ? 'w-[3px]' : ($i % 3 == 0 ? 'w-[1.5px]' : 'w-[1px]') }}"></span>
                            @endfor
                        </div>
                        <span class="text-[8px] font-mono text-gray-500 tracking-[0.3em] mt-1">{{ $profile['gym_id'] }}-SECURE-PASS</span>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-white/5 border border-white/10 text-xs text-gray-400 flex items-center gap-3">
                    <i class="fa-solid fa-turnstile text-base text-[#ff9e58]"></i>
                    <p class="leading-relaxed">
                        Present this digital pass or mention your Gym ID <strong class="text-white">{{ $profile['gym_id'] }}</strong> at the front reception turnstiles for instant entry.
                    </p>
                </div>
            </div>

            <!-- Member Details & Athletic Bio (2 Cols) -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center justify-between">
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-clipboard-user text-[#ff9e58]"></i>
                        <span>Athlete Profile Information</span>
                    </h2>
                    <button 
                        type="button" 
                        onclick="openEditProfileModal()" 
                        class="text-xs text-[#ff9e58] font-bold hover:underline cursor-pointer"
                    >
                        Update Info
                    </button>
                </div>

                <div class="bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 shadow-xl">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- Full Name -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Full Name
                            </span>
                            <span class="font-heading text-base font-bold text-white flex items-center gap-2">
                                <i class="fa-regular fa-user text-[#ff9e58] text-sm"></i>
                                {{ $profile['name'] }}
                            </span>
                        </div>

                        <!-- Email -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Email Address
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-2 truncate">
                                <i class="fa-regular fa-envelope text-[#ff9e58] text-sm"></i>
                                {{ $profile['email'] }}
                            </span>
                        </div>

                        <!-- Phone -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Phone Number
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-2">
                                <i class="fa-solid fa-phone text-[#ff9e58] text-sm"></i>
                                {{ $profile['phone'] }}
                            </span>
                        </div>

                        <!-- Emergency Contact -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Emergency Contact
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-2 truncate">
                                <i class="fa-solid fa-heart-pulse text-rose-400 text-sm"></i>
                                {{ $profile['emergency_contact'] }}
                            </span>
                        </div>

                        <!-- Blood Group -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Blood Group
                            </span>
                            <span class="text-xs font-bold text-[#ff9e58] flex items-center gap-2">
                                <i class="fa-solid fa-droplet text-rose-500 text-sm"></i>
                                {{ $profile['blood_group'] }}
                            </span>
                        </div>

                        <!-- Assigned Locker -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Assigned Locker
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-2">
                                <i class="fa-solid fa-key text-[#ff9e58] text-sm"></i>
                                {{ $profile['locker_number'] }}
                            </span>
                        </div>

                        <!-- Body Stats: Weight & Height -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Body Measurements
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-3">
                                <span><i class="fa-solid fa-weight-scale text-cyan-400 mr-1"></i> {{ $profile['weight'] }}</span>
                                <span><i class="fa-solid fa-ruler-vertical text-cyan-400 mr-1"></i> {{ $profile['height'] }}</span>
                            </span>
                        </div>

                        <!-- Assigned Coach -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Assigned Coach / Trainer
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-2">
                                <i class="fa-solid fa-dumbbell text-[#ff9e58] text-sm"></i>
                                {{ $profile['trainer_name'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Fitness Goals Banner -->
                    <div class="mt-5 p-4 rounded-xl bg-gradient-to-r from-[#182030] to-[#141a24] border border-[#ff5e14]/20 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                        <div>
                            <span class="text-[10px] font-bold text-[#ff9e58] uppercase tracking-wider block">
                                Primary Athletic Objective
                            </span>
                            <p class="font-heading text-sm font-bold text-white mt-0.5">
                                {{ $profile['fitness_goal'] }}
                            </p>
                        </div>
                        <span class="px-3 py-1 rounded-lg bg-[#ff5e14]/15 text-[#ff9e58] text-xs font-bold border border-[#ff5e14]/30 shrink-0">
                            On Track (Phase 2)
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid 2: Current Membership Status & Package -->
        <div class="space-y-4">
            <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                <i class="fa-solid fa-cubes text-[#ff9e58]"></i>
                <span>Current Gym Membership & Active Package</span>
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Package Summary Card (1 Col) -->
                <div class="bg-gradient-to-b from-[#161c28] to-[#10141e] border-2 border-[#ff5e14]/30 rounded-2xl p-6 sm:p-7 shadow-xl flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute top-0 right-0 transform translate-x-4 -translate-y-2">
                        <span class="text-6xl text-white/5 font-black font-heading select-none pointer-events-none">PRO</span>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="px-3 py-1 rounded-full bg-[#ff5e14] text-black font-extrabold text-[10px] uppercase tracking-widest">
                                CURRENT ACTIVE PLAN
                            </span>
                            <span class="flex items-center gap-1.5 text-xs text-emerald-400 font-bold">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                Auto-Renew
                            </span>
                        </div>

                        <h3 class="font-heading text-2xl font-black text-white mt-2">
                            {{ $profile['package_name'] }}
                        </h3>
                        <div class="flex items-baseline gap-1 my-3">
                            <span class="font-heading text-3xl font-black text-[#ff9e58]">{{ $profile['package_price'] }}</span>
                        </div>

                        <div class="space-y-2 pt-2 border-t border-white/10 text-xs text-gray-300">
                            <div class="flex items-center justify-between py-1">
                                <span class="text-gray-400">Status:</span>
                                <span class="font-bold text-emerald-400 uppercase">{{ $profile['membership_status'] }}</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <span class="text-gray-400">Next Billing Date:</span>
                                <span class="font-bold text-white">{{ $profile['renewal_date'] }}</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <span class="text-gray-400">Payment Card:</span>
                                <span class="font-bold text-white flex items-center gap-1">
                                    <i class="fa-brands fa-cc-visa text-blue-400"></i> Visa •••• 4242
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-white/10 flex flex-col sm:flex-row gap-2">
                        <button 
                            type="button" 
                            onclick="openRenewModal()"
                            class="flex-1 btn-glow-orange text-white font-extrabold text-xs uppercase tracking-wider py-2.5 px-3 rounded-lg transition-all text-center cursor-pointer shadow-md shadow-[#ff5e14]/30 flex items-center justify-center gap-1.5"
                        >
                            <i class="fa-solid fa-clock-rotate-left text-xs"></i>
                            <span>Renew / Extend</span>
                        </button>
                        <button 
                            type="button" 
                            onclick="openChangePlanModal()"
                            class="flex-1 bg-white/5 hover:bg-white/10 text-white hover:text-[#ff9e58] font-bold text-xs uppercase tracking-wider py-2.5 px-3 rounded-lg border border-white/10 transition-all text-center cursor-pointer flex items-center justify-center gap-1.5"
                        >
                            <i class="fa-solid fa-arrows-rotate text-xs"></i>
                            <span>Change Plan</span>
                        </button>
                        <button 
                            type="button" 
                            onclick="openFreezeModal()"
                            class="flex-1 bg-white/5 hover:bg-white/10 text-gray-300 hover:text-white font-bold text-xs uppercase tracking-wider py-2.5 px-3 rounded-lg border border-white/10 transition-all text-center cursor-pointer flex items-center justify-center gap-1.5"
                        >
                            <i class="fa-solid fa-pause text-xs text-amber-400"></i>
                            <span>Freeze</span>
                        </button>
                    </div>
                </div>

                <!-- Included Privileges & Workout Attendance Progress (2 Cols) -->
                <div class="lg:col-span-2 bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 shadow-xl flex flex-col justify-between">
                    <div>
                        <h4 class="font-heading text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-[#ff5e14] pl-2.5">
                            Included Privileges & Gym Access
                        </h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
                            @foreach ($packageFeatures as $feature)
                                <div class="flex items-start gap-2.5 text-xs text-gray-300 p-2.5 rounded-lg bg-[#182030] border border-white/5">
                                    <i class="fa-solid fa-circle-check text-[#ff9e58] text-sm mt-0.5 shrink-0"></i>
                                    <span class="leading-relaxed">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Attendance & Workout Consistency Progress -->
                    <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                        <div class="flex flex-wrap items-center justify-between gap-2 text-xs">
                            <span class="font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-fire text-[#ff5e36]"></i>
                                Monthly Workout Consistency (October 2026)
                            </span>
                            <span class="text-[#ff9e58] font-bold">
                                {{ $activity['monthly_visits'] }} of {{ $activity['monthly_target'] }} Sessions ({{ round(($activity['monthly_visits'] / $activity['monthly_target']) * 100) }}%)
                            </span>
                        </div>

                        <!-- Progress Bar -->
                        <div class="w-full bg-black/40 rounded-full h-3 overflow-hidden p-0.5 border border-white/10">
                            <div class="bg-gradient-to-r from-[#ff7a1a] to-[#ff5e14] h-full rounded-full transition-all duration-1000" style="width: {{ ($activity['monthly_visits'] / $activity['monthly_target']) * 100 }}%"></div>
                        </div>

                        <div class="grid grid-cols-3 gap-2 text-center pt-1 text-[11px] text-gray-400">
                            <div>Total Lifetime Visits: <strong class="text-white">{{ $activity['total_visits'] }}</strong></div>
                            <div>Active Streak: <strong class="text-[#ff5e36]">{{ $activity['streak_weeks'] }} Weeks 🔥</strong></div>
                            <div>Top Focus: <strong class="text-white">{{ $activity['favorite_workout'] }}</strong></div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Section: Athlete Achievement Badges & Leaderboard Link (Plan 2) -->
        <div class="space-y-4">
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div>
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-medal text-[#ff9e58]"></i>
                        <span>Athlete Badges & Achievements</span>
                    </h2>
                    <p class="text-xs text-gray-400">Track unlocked powerlifting PRs, consistency streaks, and turnstile milestones.</p>
                </div>
                <a 
                    href="{{ route('leaderboard') }}" 
                    class="text-xs text-[#ff9e58] font-bold hover:underline flex items-center gap-1.5 bg-[#ff5e14]/15 hover:bg-[#ff5e14]/20 border border-[#ff5e14]/30 px-3 py-1.5 rounded-full transition-all"
                >
                    <i class="fa-solid fa-trophy text-xs"></i>
                    <span>View Gym Leaderboard (#4 Ranked)</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Badge 1: Iron Warrior -->
                <div class="p-4 rounded-2xl bg-gradient-to-b from-[#ff5e14]/15 to-[#0e121a] border-2 border-[#ff5e14]/50 shadow-lg space-y-2 relative overflow-hidden">
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-[#ff5e14] text-black flex items-center justify-center text-lg font-bold shadow-md shadow-[#ff5e14]/30">
                            <i class="fa-solid fa-dumbbell"></i>
                        </div>
                        <span class="px-2 py-0.5 rounded-full bg-[#ff5e14] text-black text-[9px] font-black uppercase">
                            UNLOCKED
                        </span>
                    </div>
                    <div>
                        <h4 class="font-heading text-sm font-bold text-white uppercase tracking-wide">Iron Warrior</h4>
                        <p class="text-[11px] text-gray-400 mt-0.5">100+ kg lift verified (Current: 130 kg PR).</p>
                    </div>
                    <div class="w-full bg-white/10 rounded-full h-1.5 overflow-hidden">
                        <div class="bg-[#ff5e14] h-full rounded-full w-full"></div>
                    </div>
                </div>

                <!-- Badge 2: Consistency King -->
                <div class="p-4 rounded-2xl bg-gradient-to-b from-orange-500/10 to-[#131722] border-2 border-orange-500/50 shadow-lg space-y-2 relative overflow-hidden">
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-orange-500 text-white flex items-center justify-center text-lg font-bold shadow-md shadow-orange-500/30">
                            <i class="fa-solid fa-fire-flame-curved"></i>
                        </div>
                        <span class="px-2 py-0.5 rounded-full bg-orange-500 text-white text-[9px] font-black uppercase">
                            UNLOCKED
                        </span>
                    </div>
                    <div>
                        <h4 class="font-heading text-sm font-bold text-white uppercase tracking-wide">Consistency King</h4>
                        <p class="text-[11px] text-gray-400 mt-0.5">4+ week streak active (5 weeks logged).</p>
                    </div>
                    <div class="w-full bg-white/10 rounded-full h-1.5 overflow-hidden">
                        <div class="bg-orange-500 h-full rounded-full w-full"></div>
                    </div>
                </div>

                <!-- Badge 3: Century Club -->
                <div class="p-4 rounded-2xl bg-[#131722] border border-white/10 shadow-lg space-y-2 relative overflow-hidden">
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-amber-500/15 border border-amber-500/30 text-amber-400 flex items-center justify-center text-lg font-bold">
                            <i class="fa-solid fa-crown"></i>
                        </div>
                        <span class="px-2 py-0.5 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-400 text-[9px] font-extrabold uppercase">
                            68% Done
                        </span>
                    </div>
                    <div>
                        <h4 class="font-heading text-sm font-bold text-white uppercase tracking-wide">Century Club</h4>
                        <p class="text-[11px] text-gray-400 mt-0.5">100 check-in sessions (68/100 visits).</p>
                    </div>
                    <div class="w-full bg-white/10 rounded-full h-1.5 overflow-hidden">
                        <div class="bg-amber-400 h-full rounded-full" style="width: 68%;"></div>
                    </div>
                </div>

                <!-- Badge 4: Early Bird Striker -->
                <div class="p-4 rounded-2xl bg-[#131722] border border-white/10 shadow-lg space-y-2 relative overflow-hidden">
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-sky-500/15 border border-sky-500/30 text-sky-400 flex items-center justify-center text-lg font-bold">
                            <i class="fa-solid fa-sun"></i>
                        </div>
                        <span class="px-2 py-0.5 rounded-full bg-sky-500/15 border border-sky-500/30 text-sky-400 text-[9px] font-extrabold uppercase">
                            85% Done
                        </span>
                    </div>
                    <div>
                        <h4 class="font-heading text-sm font-bold text-white uppercase tracking-wide">Early Bird Striker</h4>
                        <p class="text-[11px] text-gray-400 mt-0.5">20 workouts before 7:00 AM (17/20).</p>
                    </div>
                    <div class="w-full bg-white/10 rounded-full h-1.5 overflow-hidden">
                        <div class="bg-sky-400 h-full rounded-full" style="width: 85%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Smart Workout Routine Generator (Plan 3) -->
        <div class="space-y-4">
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div>
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-wand-magic-sparkles text-[#ff9e58]"></i>
                        <span>Smart Workout Routine Generator</span>
                    </h2>
                    <p class="text-xs text-gray-400">Curated splits designed for maximum hypertrophy & strength. Tap any exercise to auto-load directly into your logger below.</p>
                </div>
                <div class="flex items-center gap-1.5">
                    <button type="button" onclick="switchRoutineTab('ppl')" id="tab-btn-ppl" class="routine-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold uppercase transition-all bg-[#ff5e14] text-black cursor-pointer">PPL (Push/Pull/Legs)</button>
                    <button type="button" onclick="switchRoutineTab('upper_lower')" id="tab-btn-upper_lower" class="routine-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold uppercase transition-all bg-[#182030] text-gray-300 hover:text-white border border-white/5 cursor-pointer">Upper / Lower</button>
                    <button type="button" onclick="switchRoutineTab('full_body')" id="tab-btn-full_body" class="routine-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold uppercase transition-all bg-[#182030] text-gray-300 hover:text-white border border-white/5 cursor-pointer">Full Body Shred</button>
                </div>
            </div>

            <!-- Routine Tab Content Container -->
            <div class="bg-[#131722] border border-white/10 rounded-2xl p-6 shadow-xl space-y-4">
                <!-- PPL Tab -->
                <div id="routine-panel-ppl" class="routine-panel space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-white/10">
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-heading text-base font-bold text-white uppercase tracking-wider">Push / Pull / Legs (PPL Hypertrophy Split)</h3>
                                <span class="px-2 py-0.5 rounded-md bg-[#ff5e14]/15 text-[#ff9e58] border border-[#ff5e14]/30 text-[10px] font-black uppercase">6 Days / Wk</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-0.5">Optimal compound volume for rapid muscle hypertrophy and progressive overload.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Push Day Card -->
                        <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-white text-xs flex items-center gap-1.5 uppercase">
                                    <i class="fa-solid fa-shield-halved text-[#ff9e58]"></i> Day 1: Push Focus
                                </span>
                                <span class="text-[9px] text-gray-400 font-mono">5 Exercises</span>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Barbell Bench Press</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 8 reps • 80 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Barbell Bench Press', 'Chest', 80.0, 4, 8)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Incline DB Press</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 10 reps • 26 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Incline Dumbbell Press', 'Chest', 26.0, 3, 10)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Overhead DB Press</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 10 reps • 20 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Overhead Dumbbell Press', 'Shoulders', 20.0, 3, 10)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Cable Lateral Raise</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 15 reps • 10 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Cable Lateral Raise', 'Shoulders', 10.0, 4, 15)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Triceps Rope Pushdown</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 12 reps • 25 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Triceps Rope Pushdown', 'Arms', 25.0, 3, 12)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Pull Day Card -->
                        <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-white text-xs flex items-center gap-1.5 uppercase">
                                    <i class="fa-solid fa-child text-sky-400"></i> Day 2: Pull Focus
                                </span>
                                <span class="text-[9px] text-gray-400 font-mono">5 Exercises</span>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Conventional Deadlift</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 5 reps • 120 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Conventional Deadlift', 'Back', 120.0, 4, 5)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Lat Pulldown</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 10 reps • 60 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Lat Pulldown', 'Back', 60.0, 4, 10)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Barbell Row</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 8 reps • 70 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Barbell Row', 'Back', 70.0, 3, 8)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Cable Face Pulls</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 15 reps • 20 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Cable Face Pulls', 'Shoulders', 20.0, 4, 15)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Incline DB Curl</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 12 reps • 14 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Incline DB Curl', 'Arms', 14.0, 3, 12)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Leg Day Card -->
                        <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-white text-xs flex items-center gap-1.5 uppercase">
                                    <i class="fa-solid fa-person-running text-amber-400"></i> Day 3: Legs Focus
                                </span>
                                <span class="text-[9px] text-gray-400 font-mono">5 Exercises</span>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Barbell Back Squat</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 8 reps • 100 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Barbell Back Squat', 'Legs', 100.0, 4, 8)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Romanian Deadlift (RDL)</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 10 reps • 80 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Romanian Deadlift (RDL)', 'Legs', 80.0, 3, 10)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Seated Leg Press</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 12 reps • 160 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Seated Leg Press', 'Legs', 160.0, 4, 12)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Standing Calf Raise</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 15 reps • 65 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Standing Calf Raise', 'Legs', 65.0, 4, 15)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Hanging Knee Raises</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 15 reps • Bodyweight</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Hanging Knee Raises', 'Core', 0.0, 3, 15)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upper / Lower Tab -->
                <div id="routine-panel-upper_lower" class="routine-panel space-y-4 hidden">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-white/10">
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-heading text-base font-bold text-white uppercase tracking-wider">Upper / Lower Strength Split</h3>
                                <span class="px-2 py-0.5 rounded-md bg-amber-500/15 text-amber-400 border border-amber-500/30 text-[10px] font-black uppercase">4 Days / Wk</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-0.5">Heavy compound focus designed for strength milestones and athletic power.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Upper Power Card -->
                        <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                            <span class="font-bold text-white text-xs flex items-center gap-1.5 uppercase">
                                <i class="fa-solid fa-arrows-up-down text-[#ff9e58]"></i> Day 1: Upper Power
                            </span>
                            <div class="space-y-2 text-xs">
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Incline Barbell Bench</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 6 reps • 75 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Incline Barbell Bench', 'Chest', 75.0, 4, 6)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Weighted Pull-Ups</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 6 reps • +15 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Weighted Pull-Ups', 'Back', 15.0, 4, 6)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Standing Overhead Press</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 8 reps • 50 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Standing Overhead Press', 'Shoulders', 50.0, 3, 8)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                            </div>
                        </div>

                        <!-- Lower Power Card -->
                        <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                            <span class="font-bold text-white text-xs flex items-center gap-1.5 uppercase">
                                <i class="fa-solid fa-person-running text-amber-400"></i> Day 2: Lower Power
                            </span>
                            <div class="space-y-2 text-xs">
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Front Squat</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 6 reps • 85 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Front Squat', 'Legs', 85.0, 4, 6)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Romanian Deadlift (RDL)</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 8 reps • 85 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Romanian Deadlift (RDL)', 'Legs', 85.0, 4, 8)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Cable Rope Crunch</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 20 reps • 30 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Cable Rope Crunch', 'Core', 30.0, 3, 20)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Full Body Tab -->
                <div id="routine-panel-full_body" class="routine-panel space-y-4 hidden">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-white/10">
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-heading text-base font-bold text-white uppercase tracking-wider">Full Body Fat Burn & Conditioning Shred</h3>
                                <span class="px-2 py-0.5 rounded-md bg-emerald-500/15 text-emerald-400 border border-emerald-500/30 text-[10px] font-black uppercase">3 Days / Wk</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-0.5">High-energy metabolic circuits designed for lean fat loss and stamina.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                        <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                            <div>
                                <div class="font-bold text-white">KB Goblet Squats</div>
                                <div class="text-[10px] text-gray-400">4 sets &times; 15 reps • 24 kg</div>
                            </div>
                            <button type="button" onclick="loadExerciseIntoForm('Kettlebell Goblet Squat', 'Legs', 24.0, 4, 15)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                        </div>
                        <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                            <div>
                                <div class="font-bold text-white">Explosive Push-Ups</div>
                                <div class="text-[10px] text-gray-400">4 sets &times; 18 reps • Bodyweight</div>
                            </div>
                            <button type="button" onclick="loadExerciseIntoForm('Explosive Push-Ups', 'Chest', 0.0, 4, 18)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                        </div>
                        <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                            <div>
                                <div class="font-bold text-white">Dumbbell Renegade Row</div>
                                <div class="text-[10px] text-gray-400">3 sets &times; 12 reps • 16 kg</div>
                            </div>
                            <button type="button" onclick="loadExerciseIntoForm('Dumbbell Renegade Row', 'Back', 16.0, 3, 12)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                        </div>
                        <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                            <div>
                                <div class="font-bold text-white">DB Squat to Press</div>
                                <div class="text-[10px] text-gray-400">3 sets &times; 12 reps • 14 kg</div>
                            </div>
                            <button type="button" onclick="loadExerciseIntoForm('DB Squat to Press', 'Shoulders', 14.0, 3, 12)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                        </div>
                        <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                            <div>
                                <div class="font-bold text-white">Weighted Plank Hold</div>
                                <div class="text-[10px] text-gray-400">3 sets &times; 60s • 15 kg</div>
                            </div>
                            <button type="button" onclick="loadExerciseIntoForm('Weighted Plank Hold', 'Core', 15.0, 3, 60)" class="px-2.5 py-1 rounded btn-glow-orange text-white text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Daily Workout & Set Tracker -->
        <div class="space-y-4">
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div>
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-dumbbell text-[#ff9e58]"></i>
                        <span>Daily Workout & Set Tracker</span>
                    </h2>
                    <p class="text-xs text-gray-400">Log muscle groups, sets, reps and progressive overload weights.</p>
                </div>
                <span class="text-xs text-[#ff9e58] font-bold bg-[#ff5e14]/15 px-3 py-1 rounded-full border border-[#ff5e14]/20 flex items-center gap-1.5">
                    <i class="fa-solid fa-fire text-[#ff5e36]"></i>
                    <span>{{ count($workoutLogs) }} Sessions Logged</span>
                </span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Log Workout Form (1 Col) -->
                <div id="workout-logger-form-card" class="bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 shadow-xl transition-all">
                    <h3 class="font-heading text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-[#ff5e14] pl-2.5">
                        Log Today's Exercise
                    </h3>

                    <form method="POST" action="{{ route('profile.workouts.store') }}" class="space-y-4">
                        @csrf

                        <!-- Muscle Group Selector -->
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-2">
                                Muscle Group Focus
                            </label>
                            <input type="hidden" name="muscle_group" id="selected_muscle_group" value="Chest">
                            <div class="grid grid-cols-3 sm:grid-cols-4 gap-1.5" id="muscle-group-pills">
                                @php
                                    $muscleGroups = [
                                        ['name' => 'Chest', 'icon' => 'fa-shield-halved'],
                                        ['name' => 'Back', 'icon' => 'fa-child'],
                                        ['name' => 'Legs', 'icon' => 'fa-person-running'],
                                        ['name' => 'Shoulders', 'icon' => 'fa-arrows-up-down'],
                                        ['name' => 'Arms', 'icon' => 'fa-hand-fist'],
                                        ['name' => 'Core', 'icon' => 'fa-bullseye'],
                                        ['name' => 'Cardio', 'icon' => 'fa-heart-pulse'],
                                    ];
                                @endphp
                                @foreach ($muscleGroups as $mg)
                                    <button 
                                        type="button" 
                                        onclick="selectMuscleGroup('{{ $mg['name'] }}')"
                                        class="muscle-pill py-2 px-1 text-center rounded-lg text-[10px] font-bold uppercase border transition-all cursor-pointer {{ $loop->first ? 'bg-[#ff5e14] text-black border-[#ff5e14]' : 'bg-[#182030] text-gray-300 border-white/5 hover:border-white/20' }}"
                                        data-group="{{ $mg['name'] }}"
                                    >
                                        <i class="fa-solid {{ $mg['icon'] }} block text-xs mb-0.5"></i>
                                        <span>{{ $mg['name'] }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Exercise Name -->
                        <div>
                            <label for="workout_exercise_name" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                                Exercise Name
                            </label>
                            <input 
                                type="text" 
                                name="exercise_name" 
                                id="workout_exercise_name" 
                                placeholder="e.g. Incline Dumbbell Press" 
                                required
                                class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                            >
                            <!-- Quick Chips -->
                            <div class="flex flex-wrap gap-1 mt-1.5">
                                <button type="button" onclick="setExerciseName('Bench Press')" class="text-[9px] px-2 py-0.5 rounded bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white cursor-pointer">+ Bench</button>
                                <button type="button" onclick="setExerciseName('Barbell Squat')" class="text-[9px] px-2 py-0.5 rounded bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white cursor-pointer">+ Squat</button>
                                <button type="button" onclick="setExerciseName('Deadlift')" class="text-[9px] px-2 py-0.5 rounded bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white cursor-pointer">+ Deadlift</button>
                                <button type="button" onclick="setExerciseName('Overhead Press')" class="text-[9px] px-2 py-0.5 rounded bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white cursor-pointer">+ OHP</button>
                            </div>
                        </div>

                        <!-- Sets, Reps & Weight Grid -->
                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <label for="workout_weight" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                                    Weight (kg)
                                </label>
                                <input 
                                    type="number" 
                                    step="0.5" 
                                    name="weight_kg" 
                                    id="workout_weight" 
                                    value="80.0" 
                                    required
                                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                                >
                            </div>
                            <div>
                                <label for="workout_sets" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                                    Sets
                                </label>
                                <input 
                                    type="number" 
                                    name="sets" 
                                    id="workout_sets" 
                                    value="4" 
                                    min="1" 
                                    required
                                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                                >
                            </div>
                            <div>
                                <label for="workout_reps" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                                    Reps
                                </label>
                                <input 
                                    type="number" 
                                    name="reps" 
                                    id="workout_reps" 
                                    value="10" 
                                    min="1" 
                                    required
                                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                                >
                            </div>
                        </div>

                        <!-- Notes / RPE -->
                        <div>
                            <label for="workout_notes" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                                Notes & RPE Intensity
                            </label>
                            <input 
                                type="text" 
                                name="notes" 
                                id="workout_notes" 
                                placeholder="RPE 8.5 • Felt explosive, good lockout"
                                class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                            >
                        </div>

                        <button 
                            type="submit" 
                            class="w-full py-2.5 rounded-xl btn-glow-orange text-white font-extrabold text-xs uppercase tracking-wider transition-all cursor-pointer shadow-md shadow-[#ff5e14]/30 flex items-center justify-center gap-1.5"
                        >
                            <i class="fa-solid fa-plus text-xs"></i>
                            <span>Log Workout Set</span>
                        </button>
                    </form>
                </div>

                <!-- Completed Workout History Table (2 Cols) -->
                <div class="lg:col-span-2 bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-heading text-sm font-bold text-white uppercase tracking-wider border-l-2 border-[#ff5e14] pl-2.5">
                                Recent Completed Workouts & Sets
                            </h3>
                            <span class="text-[10px] font-mono text-gray-400">LAST 15 ENTRIES</span>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs border-collapse">
                                <thead>
                                    <tr class="bg-[#182030] text-gray-400 uppercase text-[10px] tracking-wider border-b border-white/10">
                                        <th class="py-2.5 px-3 font-bold">Focus</th>
                                        <th class="py-2.5 px-3 font-bold">Exercise</th>
                                        <th class="py-2.5 px-3 font-bold">Sets &times; Reps</th>
                                        <th class="py-2.5 px-3 font-bold">Weight</th>
                                        <th class="py-2.5 px-3 font-bold">Notes</th>
                                        <th class="py-2.5 px-3 font-bold text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5 text-gray-300">
                                    @forelse ($workoutLogs as $log)
                                        <tr class="hover:bg-white/5 transition-colors">
                                            <td class="py-3 px-3">
                                                <span class="px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-white/5 border border-white/10 text-[#ff9e58]">
                                                    {{ $log->muscle_group }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-3 font-bold text-white">
                                                {{ $log->exercise_name }}
                                                <span class="block text-[10px] text-gray-500 font-normal">{{ $log->workout_date ? \Carbon\Carbon::parse($log->workout_date)->format('M d') : 'Today' }}</span>
                                            </td>
                                            <td class="py-3 px-3 font-mono text-white">
                                                {{ $log->sets }} &times; {{ $log->reps }}
                                            </td>
                                            <td class="py-3 px-3 font-heading font-black text-[#ff9e58]">
                                                {{ $log->weight_kg }} kg
                                            </td>
                                            <td class="py-3 px-3 text-gray-400 text-[11px] max-w-[150px] truncate" title="{{ $log->notes }}">
                                                {{ $log->notes ?: '—' }}
                                            </td>
                                            <td class="py-3 px-3 text-right">
                                                <form method="POST" action="{{ route('profile.workouts.delete', $log->id) }}" onsubmit="return confirm('Remove this workout record?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-7 h-7 rounded bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 border border-rose-500/20 flex items-center justify-center text-xs transition-colors cursor-pointer" title="Delete Log">
                                                        <i class="fa-solid fa-trash-can text-[10px]"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-8 text-gray-500 text-xs">
                                                No workout sets logged yet today. Use the form on the left to start your log!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Athlete Transformation & Body Progress -->
        <div class="space-y-4">
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div>
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-chart-line text-[#ff9e58]"></i>
                        <span>Athlete Transformation & Body Progress</span>
                    </h2>
                    <p class="text-xs text-gray-400">8-Week body composition trajectory, weight decline, and physical evolution.</p>
                </div>
                <button 
                    type="button" 
                    onclick="openWeighInModal()"
                    class="px-3.5 py-2 rounded-xl bg-white/5 hover:bg-[#ff5e14] text-white hover:text-black border border-white/10 hover:border-[#ff5e14] text-xs font-bold uppercase tracking-wider transition-all cursor-pointer flex items-center gap-1.5 shadow-sm"
                >
                    <i class="fa-solid fa-weight-scale text-xs"></i>
                    <span>Log New Weigh-In</span>
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- 8-Week Progress Chart (2 Cols) -->
                <div class="lg:col-span-2 bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 shadow-xl space-y-5">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-1.5 text-xs">
                                <span class="w-3 h-3 rounded-full bg-[#ff5e14]"></span>
                                <span class="text-gray-300 font-bold">Weight (kg)</span>
                            </div>
                            <div class="flex items-center gap-1.5 text-xs">
                                <span class="w-3 h-3 rounded-full bg-[#00d2ff]"></span>
                                <span class="text-gray-300 font-bold">Body Fat (%)</span>
                            </div>
                        </div>
                        <span class="text-[10px] uppercase font-mono text-emerald-400 bg-emerald-500/10 px-2.5 py-0.5 rounded-full border border-emerald-500/20 font-bold">
                            -5.5 kg Total Cut &bull; -7.7% Fat
                        </span>
                    </div>

                    <!-- Canvas -->
                    <div class="relative w-full h-64">
                        <canvas id="bodyProgressChart"></canvas>
                    </div>

                    <!-- Key Transformation Metrics Row -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-3 border-t border-white/10 text-center">
                        <div class="p-2.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[9px] text-gray-400 uppercase font-bold block">Starting (Wk 1)</span>
                            <span class="font-heading text-sm font-black text-white">84.0 kg <span class="text-[10px] text-gray-400 font-normal">(22.5%)</span></span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[9px] text-gray-400 uppercase font-bold block">Current (Wk 8)</span>
                            <span class="font-heading text-sm font-black text-[#ff9e58]">{{ $profile['weight'] }} <span class="text-[10px] text-cyan-400 font-normal">(14.8%)</span></span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[9px] text-gray-400 uppercase font-bold block">Waistline Cut</span>
                            <span class="font-heading text-sm font-black text-white">-6.0 cm <span class="text-[10px] text-emerald-400 font-normal">Lean</span></span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[9px] text-gray-400 uppercase font-bold block">Lean Mass</span>
                            <span class="font-heading text-sm font-black text-emerald-400">+1.2 kg <span class="text-[10px] text-gray-400 font-normal">Muscle</span></span>
                        </div>
                    </div>
                </div>

                <!-- Before vs After Transformation Card (1 Col) -->
                <div class="bg-gradient-to-b from-[#161c28] to-[#10141e] border-2 border-[#ff5e14]/30 rounded-2xl p-6 shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[10px] font-black uppercase tracking-widest text-[#ff9e58] bg-[#ff5e14]/15 px-2.5 py-0.5 rounded-full border border-[#ff5e14]/20">
                                8-WEEK RECOMPOSITION
                            </span>
                            <span class="text-xs font-bold text-emerald-400">Phase 2</span>
                        </div>

                        <h4 class="font-heading text-lg font-black text-white uppercase">
                            Visual Transformation
                        </h4>
                        <p class="text-[11px] text-gray-400 mt-1 mb-4 leading-relaxed">
                            Consistent caloric deficit coupled with progressive resistance overload resulted in distinct muscle definition.
                        </p>

                        <!-- Side by Side Silhouette / Photos -->
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <!-- Before -->
                            <div class="bg-[#182030] p-2.5 rounded-xl border border-white/10 text-center space-y-1.5">
                                <span class="text-[9px] font-bold uppercase tracking-wider text-gray-400 block">BEFORE (WK 1)</span>
                                <div class="h-32 rounded-lg bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700 flex flex-col items-center justify-center p-2 relative overflow-hidden">
                                    <i class="fa-solid fa-person text-4xl text-gray-400/80"></i>
                                    <span class="text-[9px] text-gray-300 font-mono mt-1 font-bold">84.0 kg &bull; 22.5%</span>
                                </div>
                                <span class="text-[10px] text-gray-400 block font-medium">Bulking Baseline</span>
                            </div>

                            <!-- After -->
                            <div class="bg-[#182030] p-2.5 rounded-xl border border-[#ff5e14]/40 text-center space-y-1.5 relative">
                                <span class="text-[9px] font-bold uppercase tracking-wider text-[#ff9e58] block">CURRENT (WK 8)</span>
                                <div class="h-32 rounded-lg bg-gradient-to-t from-emerald-950 via-[#16202e] to-[#1e2a3a] border border-[#ff5e14]/30 flex flex-col items-center justify-center p-2 relative overflow-hidden">
                                    <i class="fa-solid fa-person text-4xl text-[#ff9e58]"></i>
                                    <span class="text-[9px] text-[#ff9e58] font-mono mt-1 font-black">78.5 kg &bull; 14.8%</span>
                                    <span class="absolute top-1 right-1 text-[8px] bg-[#ff5e14] text-black font-extrabold px-1 rounded">HOT</span>
                                </div>
                                <span class="text-[10px] text-emerald-400 block font-bold">V-Taper Defined</span>
                            </div>
                        </div>

                        <!-- Milestones -->
                        <div class="space-y-1.5 text-[11px] text-gray-300">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-[#ff9e58]"></i>
                                <span>Abdominal separation clearly visible</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-[#ff9e58]"></i>
                                <span>Full bench & squat strength maintained</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-[#ff9e58]"></i>
                                <span>Resting metabolic output elevated</span>
                            </div>
                        </div>
                    </div>

                    <button 
                        type="button" 
                        onclick="openWeighInModal()"
                        class="w-full mt-5 py-2.5 rounded-xl bg-white/5 hover:bg-[#ff5e14] text-white hover:text-black border border-white/10 hover:border-[#ff5e14] text-xs font-bold uppercase tracking-wider transition-all cursor-pointer text-center"
                    >
                        Update Measurements
                    </button>
                </div>
            </div>
        </div>

        <!-- Section: Nutrition & Macro Calculator Component -->
        @include('components.nutrition-calculator')

        <!-- Section 3: Old Billing Info & Invoices -->
        <div class="space-y-4">
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div>
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-receipt text-[#ff9e58]"></i>
                        <span>Past Billing Records & Payment History</span>
                    </h2>
                    <p class="text-xs text-gray-400">All transaction history, past monthly dues, and downloadable gym receipts.</p>
                </div>
                <div class="text-xs text-gray-400">
                    Auto-billed via <span class="text-white font-semibold">Visa ending in •••• 4242</span>
                </div>
            </div>

            <!-- Invoices Table Container -->
            <div class="bg-[#131722] border border-white/10 rounded-2xl overflow-hidden shadow-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead>
                            <tr class="bg-[#182030] text-gray-400 uppercase text-[10px] tracking-wider border-b border-white/10">
                                <th class="py-3.5 px-5 font-bold">Invoice ID</th>
                                <th class="py-3.5 px-5 font-bold">Billing Date</th>
                                <th class="py-3.5 px-5 font-bold">Plan / Service Description</th>
                                <th class="py-3.5 px-5 font-bold">Amount</th>
                                <th class="py-3.5 px-5 font-bold">Payment Method</th>
                                <th class="py-3.5 px-5 font-bold">Status</th>
                                <th class="py-3.5 px-5 font-bold text-right">Receipt</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-gray-300">
                            @foreach ($invoices as $invoice)
                                <tr class="hover:bg-white/5 transition-colors">
                                    <!-- Invoice ID -->
                                    <td class="py-3.5 px-5 font-mono font-bold text-white">
                                        {{ $invoice['id'] }}
                                    </td>
                                    <!-- Date -->
                                    <td class="py-3.5 px-5 text-gray-300">
                                        {{ $invoice['date'] }}
                                    </td>
                                    <!-- Description -->
                                    <td class="py-3.5 px-5 text-white font-medium">
                                        {{ $invoice['plan'] }}
                                    </td>
                                    <!-- Amount -->
                                    <td class="py-3.5 px-5 font-heading text-sm font-bold text-[#ff9e58]">
                                        {{ $invoice['amount'] }}
                                    </td>
                                    <!-- Method -->
                                    <td class="py-3.5 px-5 text-gray-400">
                                        <i class="fa-regular fa-credit-card mr-1 text-gray-500"></i>
                                        {{ $invoice['method'] }}
                                    </td>
                                    <!-- Status -->
                                    <td class="py-3.5 px-5">
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                            <i class="fa-solid fa-check text-[9px]"></i>
                                            {{ $invoice['status'] }}
                                        </span>
                                    </td>
                                    <!-- Receipt Actions -->
                                    <td class="py-3.5 px-5 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a 
                                                href="{{ route('profile.invoice', ['id' => $invoice['id'], 'download' => 1]) }}" 
                                                target="_blank"
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white text-[11px] font-bold border border-rose-500/30 transition-all cursor-pointer"
                                                title="Download Single-Page Official PDF Receipt"
                                            >
                                                <i class="fa-solid fa-file-pdf"></i>
                                                <span>PDF</span>
                                            </a>
                                            <a 
                                                href="{{ route('profile.invoice', $invoice['id']) }}" 
                                                target="_blank"
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-[#ff5e14]/15 hover:bg-[#ff5e14] text-[#ff9e58] hover:text-black text-[11px] font-bold border border-[#ff5e14]/30 transition-all cursor-pointer"
                                                title="Open Full Page Official Tax Invoice (A4)"
                                            >
                                                <i class="fa-solid fa-print"></i>
                                                <span class="hidden sm:inline">Tax Invoice</span>
                                            </a>
                                            <button 
                                                type="button" 
                                                onclick="openReceiptModal('{{ $invoice['id'] }}', '{{ $invoice['date'] }}', '{{ $invoice['plan'] }}', '{{ $invoice['amount'] }}', '{{ $invoice['subtotal'] }}', '{{ $invoice['tax'] }}', '{{ $invoice['method'] }}')"
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-white/5 hover:bg-white/15 text-gray-300 text-[11px] font-bold border border-white/10 transition-all cursor-pointer"
                                            >
                                                <i class="fa-solid fa-receipt"></i>
                                                <span>Receipt</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer Summary -->
                <div class="p-4 bg-[#182030]/60 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-gray-400">
                    <span>Showing all {{ count($invoices) }} past invoices &bull; All membership payments are current & verified</span>
                    <a href="{{ route('profile.invoice', 'INV-2026-1002') }}" target="_blank" class="text-[#ff9e58] hover:underline font-bold flex items-center gap-1.5 cursor-pointer">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        <span>Print Latest Official Tax Invoice</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal 1: Edit Profile Information (Enhanced with Country Codes, Relations, Blood Group, Measurements) -->
<div id="edit-profile-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-[#131722] border border-white/10 rounded-2xl max-w-xl w-full p-6 sm:p-8 shadow-2xl relative max-h-[90vh] overflow-y-auto">
        <button type="button" onclick="closeEditProfileModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="mb-6">
            <span class="text-[10px] font-bold text-[#ff9e58] uppercase tracking-wider">Gymstick Athlete Portal</span>
            <h3 class="font-heading text-xl font-bold text-white mt-1">Update Athlete Information</h3>
            <p class="text-xs text-gray-400">Keep your biometric details, contact numbers, and emergency profile verified.</p>
        </div>

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
            @csrf

            <!-- Athlete Name -->
            <div>
                <label for="edit-name" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Athlete Full Name
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="edit-name" 
                    value="{{ old('name', $profile['name']) }}" 
                    required 
                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                >
            </div>

            <!-- Phone Number with Country Code Select -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Phone Number & Country Code
                </label>
                <div class="flex gap-2">
                    <select 
                        name="phone_country_code" 
                        class="bg-[#182030] border border-white/10 rounded-lg px-3 py-2.5 text-xs text-white focus:outline-none focus:border-[#ff5e14] shrink-0"
                    >
                        <option value="+880">🇧🇩 BD (+880)</option>
                        <option value="+1" selected>🇺🇸 US/CA (+1)</option>
                        <option value="+44">🇬🇧 UK (+44)</option>
                        <option value="+971">🇦🇪 UAE (+971)</option>
                        <option value="+966">🇸🇦 SA (+966)</option>
                        <option value="+91">🇮🇳 IN (+91)</option>
                        <option value="+61">🇦🇺 AU (+61)</option>
                        <option value="+49">🇩🇪 DE (+49)</option>
                    </select>
                    <input 
                        type="text" 
                        name="phone_number" 
                        id="edit-phone-number" 
                        value="{{ old('phone_number', preg_replace('/^\+\d+\s*/', '', $profile['phone'])) }}" 
                        placeholder="(555) 389-4210 or 1712-345678"
                        class="flex-1 bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                    >
                </div>
            </div>

            <!-- Blood Group & Bodyweight -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="edit-blood-group" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Blood Group
                    </label>
                    <select 
                        name="blood_group" 
                        id="edit-blood-group"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                    >
                        <option value="O+" {{ old('blood_group', $profile['blood_group']) === 'O+' ? 'selected' : '' }}>O Positive (O+)</option>
                        <option value="O-" {{ old('blood_group', $profile['blood_group']) === 'O-' ? 'selected' : '' }}>O Negative (O-)</option>
                        <option value="A+" {{ old('blood_group', $profile['blood_group']) === 'A+' ? 'selected' : '' }}>A Positive (A+)</option>
                        <option value="A-" {{ old('blood_group', $profile['blood_group']) === 'A-' ? 'selected' : '' }}>A Negative (A-)</option>
                        <option value="B+" {{ old('blood_group', $profile['blood_group']) === 'B+' ? 'selected' : '' }}>B Positive (B+)</option>
                        <option value="B-" {{ old('blood_group', $profile['blood_group']) === 'B-' ? 'selected' : '' }}>B Negative (B-)</option>
                        <option value="AB+" {{ old('blood_group', $profile['blood_group']) === 'AB+' ? 'selected' : '' }}>AB Positive (AB+)</option>
                        <option value="AB-" {{ old('blood_group', $profile['blood_group']) === 'AB-' ? 'selected' : '' }}>AB Negative (AB-)</option>
                    </select>
                </div>

                <div>
                    <label for="edit-weight-val" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Bodyweight (kg)
                    </label>
                    <div class="relative">
                        <input 
                            type="text" 
                            name="weight_val" 
                            id="edit-weight-val" 
                            value="{{ old('weight_val', preg_replace('/[^0-9.]/', '', $profile['weight']) ?: '78.5') }}" 
                            placeholder="78.5"
                            class="w-full bg-[#182030] border border-white/10 rounded-lg pl-3.5 pr-10 py-2.5 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                        >
                        <span class="absolute right-3 top-2.5 text-xs font-bold text-gray-400">kg</span>
                    </div>
                </div>
            </div>

            <!-- Height & Fitness Goal -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="edit-height-val" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Height (Feet / Inches / cm)
                    </label>
                    <input 
                        type="text" 
                        name="height_val" 
                        id="edit-height-val" 
                        value="{{ old('height_val', $profile['height']) }}" 
                        placeholder="5' 11\" (180 cm)"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                    >
                </div>

                <div>
                    <label for="edit-goal" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Primary Athletic Objective
                    </label>
                    <input 
                        type="text" 
                        name="fitness_goal" 
                        id="edit-goal" 
                        value="{{ old('fitness_goal', $profile['fitness_goal']) }}" 
                        placeholder="Hypertrophy & Strength Recomposition"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                    >
                </div>
            </div>

            <!-- Emergency Contact Structured Section -->
            <div class="p-4 rounded-xl bg-[#182030] border border-white/10 space-y-3">
                <span class="text-[11px] font-bold uppercase tracking-wider text-[#ff9e58] flex items-center gap-1.5">
                    <i class="fa-solid fa-heart-pulse text-rose-500"></i>
                    <span>Emergency Contact & Relationship</span>
                </span>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-bold uppercase text-gray-400 mb-1">
                            Contact Person Name
                        </label>
                        <input 
                            type="text" 
                            name="emergency_name" 
                            value="Sarah Ahmad"
                            placeholder="Full Name"
                            class="w-full bg-[#131722] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                        >
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase text-gray-400 mb-1">
                            Relationship to Athlete
                        </label>
                        <select 
                            name="emergency_relation" 
                            class="w-full bg-[#131722] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                        >
                            <option value="Spouse" selected>Spouse / Partner</option>
                            <option value="Parent">Parent (Father / Mother)</option>
                            <option value="Sibling">Sibling (Brother / Sister)</option>
                            <option value="Child">Child (Son / Daughter)</option>
                            <option value="Friend">Close Friend</option>
                            <option value="Colleague">Colleague / Coach</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase text-gray-400 mb-1">
                        Emergency Phone Number & Country Code
                    </label>
                    <div class="flex gap-2">
                        <select 
                            name="emergency_country_code" 
                            class="bg-[#131722] border border-white/10 rounded-lg px-2.5 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14] shrink-0"
                        >
                            <option value="+1" selected>🇺🇸 +1</option>
                            <option value="+880">🇧🇩 +880</option>
                            <option value="+44">🇬🇧 +44</option>
                            <option value="+971">🇦🇪 +971</option>
                            <option value="+966">🇸🇦 +966</option>
                            <option value="+91">🇮🇳 +91</option>
                        </select>
                        <input 
                            type="text" 
                            name="emergency_phone" 
                            value="555-891-2234"
                            placeholder="(555) 891-2234 or 1712-XXXXXX"
                            class="flex-1 bg-[#131722] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                        >
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="pt-3 flex items-center justify-end gap-3">
                <button 
                    type="button" 
                    onclick="closeEditProfileModal()" 
                    class="bg-white/5 hover:bg-white/10 text-gray-300 text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-lg border border-white/10 cursor-pointer"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="btn-glow-orange text-white font-extrabold text-xs uppercase tracking-wider px-6 py-2.5 rounded-lg transition-all cursor-pointer shadow-md shadow-[#ff5e14]/30"
                >
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Change plan modal included in layouts.app -->

<!-- Modal: Renew / Extend Gym Membership -->
<div id="renew-modal" class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md hidden items-center justify-center p-3 sm:p-4">
    <div class="bg-[#0e121a] border border-white/15 rounded-3xl max-w-xl w-full p-6 sm:p-8 shadow-2xl relative max-h-[92vh] overflow-y-auto">
        <button type="button" onclick="closeRenewModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg cursor-pointer w-9 h-9 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="mb-6">
            <span class="text-[10px] font-extrabold text-[#ff9e58] uppercase tracking-widest bg-[#ff5e14]/15 px-3 py-1 rounded-full border border-[#ff5e14]/30 inline-block mb-2">
                MEMBERSHIP PASS RENEWAL
            </span>
            <h3 class="font-heading text-2xl sm:text-3xl font-extrabold text-white">
                Renew & Extend Membership
            </h3>
            <p class="text-xs text-gray-400 mt-1">
                Extend your athlete pass seamlessly. Any remaining active days are retained and stacked automatically.
            </p>
        </div>

        <form method="POST" action="{{ route('profile.renew') }}" class="space-y-5">
            @csrf

            <!-- Current Membership Summary -->
            <div class="p-4 rounded-2xl bg-[#182030] border border-white/10 flex items-center justify-between text-xs">
                <div>
                    <span class="text-gray-400 text-[10px] uppercase font-bold block">Current Plan</span>
                    <strong class="text-white text-sm">{{ $profile['package_name'] }}</strong>
                    <div class="text-gray-400 text-[11px] mt-0.5">
                        Current Expiry: <strong class="text-[#ff9e58]">{{ $profile['renewal_date'] }}</strong>
                    </div>
                </div>
                <div class="text-right">
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                        <i class="fa-solid fa-circle-check text-[9px]"></i>
                        {{ $profile['membership_status'] }}
                    </span>
                </div>
            </div>

            <!-- Choose Extension Duration -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">
                    Select Extension Duration
                </label>
                <div class="grid grid-cols-2 gap-2.5">
                    <!-- 1 Month -->
                    <label class="p-3 rounded-xl bg-[#182030] border border-white/10 hover:border-[#ff5e14] transition-colors cursor-pointer flex flex-col justify-between group">
                        <div class="flex items-center justify-between mb-1">
                            <input type="radio" name="duration_months" value="1" checked class="accent-[#ff5e14]" onchange="updateRenewCalculation(1)">
                            <span class="text-[9px] font-bold uppercase tracking-wider text-gray-400">Monthly</span>
                        </div>
                        <div class="font-heading text-lg font-bold text-white group-hover:text-[#ff9e58] transition-colors">+1 Month</div>
                        <div class="text-[11px] text-gray-400 mt-0.5 renew-price-1">$53.00</div>
                    </label>

                    <!-- 3 Months -->
                    <label class="p-3 rounded-xl bg-[#182030] border border-white/10 hover:border-[#ff5e14] transition-colors cursor-pointer flex flex-col justify-between group">
                        <div class="flex items-center justify-between mb-1">
                            <input type="radio" name="duration_months" value="3" class="accent-[#ff5e14]" onchange="updateRenewCalculation(3)">
                            <span class="text-[9px] font-bold uppercase tracking-wider text-emerald-400 bg-emerald-500/10 px-1.5 py-0.5 rounded">Save 10%</span>
                        </div>
                        <div class="font-heading text-lg font-bold text-white group-hover:text-[#ff9e58] transition-colors">+3 Months</div>
                        <div class="text-[11px] text-gray-400 mt-0.5 renew-price-3">$143.10</div>
                    </label>

                    <!-- 6 Months -->
                    <label class="p-3 rounded-xl bg-[#182030] border border-white/10 hover:border-[#ff5e14] transition-colors cursor-pointer flex flex-col justify-between group">
                        <div class="flex items-center justify-between mb-1">
                            <input type="radio" name="duration_months" value="6" class="accent-[#ff5e14]" onchange="updateRenewCalculation(6)">
                            <span class="text-[9px] font-bold uppercase tracking-wider text-emerald-400 bg-emerald-500/10 px-1.5 py-0.5 rounded">Save 15%</span>
                        </div>
                        <div class="font-heading text-lg font-bold text-white group-hover:text-[#ff9e58] transition-colors">+6 Months</div>
                        <div class="text-[11px] text-gray-400 mt-0.5 renew-price-6">$270.30</div>
                    </label>

                    <!-- 12 Months -->
                    <label class="p-3 rounded-xl bg-[#182030] border-2 border-[#ff5e14]/50 hover:border-[#ff5e14] transition-colors cursor-pointer flex flex-col justify-between group bg-[#ff5e14]/5">
                        <div class="flex items-center justify-between mb-1">
                            <input type="radio" name="duration_months" value="12" class="accent-[#ff5e14]" onchange="updateRenewCalculation(12)">
                            <span class="text-[9px] font-black uppercase tracking-wider text-black bg-[#ff5e14] px-1.5 py-0.5 rounded">Best Value 23%</span>
                        </div>
                        <div class="font-heading text-lg font-bold text-[#ff9e58]">+12 Months (1 Year)</div>
                        <div class="text-[11px] text-gray-300 mt-0.5 renew-price-12">$490.00</div>
                    </label>
                </div>
            </div>

            <!-- Calculated Preview Card -->
            <div class="p-4 rounded-xl bg-[#182030]/80 border border-white/10 space-y-2 text-xs">
                <div class="flex justify-between items-center text-gray-400">
                    <span>New Expiration Date:</span>
                    <strong id="renew-preview-date" class="text-white text-sm">Dec 14, 2026</strong>
                </div>
                <div class="flex justify-between items-center text-gray-400">
                    <span>Duration Added:</span>
                    <span id="renew-preview-duration" class="font-bold text-[#ff9e58]">+1 Month (+30 Days)</span>
                </div>
                <div class="flex justify-between items-center pt-2 border-t border-white/10 text-white font-bold">
                    <span>Total Payable:</span>
                    <span id="renew-preview-price" class="font-heading text-xl text-[#ff9e58] font-black">$53.00</span>
                </div>
            </div>

            <!-- Payment Method Selector -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">
                    Payment Method
                </label>
                <div class="space-y-2">
                    <label class="flex items-center justify-between p-3 rounded-xl bg-[#182030] border border-white/10 hover:border-[#ff5e14] transition-colors cursor-pointer">
                        <div class="flex items-center gap-2.5 text-xs text-white">
                            <input type="radio" name="payment_method" value="Visa •••• 4242" checked class="accent-[#ff5e14]">
                            <i class="fa-brands fa-cc-visa text-blue-400 text-base"></i>
                            <span>Visa Card (ending •••• 4242)</span>
                        </div>
                        <span class="text-[10px] text-gray-400 font-mono">Instant Cleared</span>
                    </label>

                    <label class="flex items-center justify-between p-3 rounded-xl bg-[#182030] border border-white/10 hover:border-[#e2136e] transition-colors cursor-pointer">
                        <div class="flex items-center gap-2.5 text-xs text-white">
                            <input type="radio" name="payment_method" value="bKash Mobile Banking" class="accent-[#e2136e]">
                            <span class="w-5 h-5 rounded bg-[#e2136e] text-white flex items-center justify-center font-black text-[9px]">bK</span>
                            <span>bKash Mobile Banking</span>
                        </div>
                        <span class="text-[10px] text-[#e2136e] font-bold">Instant Gateway</span>
                    </label>

                    <label class="flex items-center justify-between p-3 rounded-xl bg-[#182030] border border-white/10 hover:border-[#ff5e14] transition-colors cursor-pointer">
                        <div class="flex items-center gap-2.5 text-xs text-white">
                            <input type="radio" name="payment_method" value="Front Desk Cash" class="accent-[#ff5e14]">
                            <i class="fa-solid fa-money-bill-wave text-emerald-400"></i>
                            <span>Pay Cash at Gym Reception</span>
                        </div>
                        <span class="text-[10px] text-gray-400">Front Desk</span>
                    </label>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-3 pt-2">
                <button 
                    type="button" 
                    onclick="closeRenewModal()"
                    class="flex-1 py-3 px-4 rounded-xl bg-white/5 hover:bg-white/10 text-gray-300 font-bold text-xs uppercase tracking-wider border border-white/10 cursor-pointer"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="flex-1 py-3 px-4 rounded-xl btn-glow-orange text-white font-extrabold text-xs uppercase tracking-wider cursor-pointer shadow-lg shadow-[#ff5e14]/30 flex items-center justify-center gap-2"
                >
                    <i class="fa-solid fa-bolt"></i>
                    <span>Confirm & Renew</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal 3: Freeze / Pause Membership Request Form -->
<div id="freeze-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-[#131722] border border-white/10 rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative">
        <button type="button" onclick="closeFreezeModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="mb-6">
            <span class="text-[10px] font-bold text-[#ff9e58] uppercase tracking-wider">Gymstick Membership Services</span>
            <h3 class="font-heading text-xl font-bold text-white mt-1">Pause / Freeze Membership</h3>
            <p class="text-xs text-gray-400">Going on vacation or recovering from injury? Pause your membership and preserve all remaining paid days.</p>
        </div>

        <form method="POST" action="{{ route('profile.freeze') }}" class="space-y-4">
            @csrf

            <!-- Member Summary -->
            <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                <div>
                    <span class="text-gray-400 text-[10px] uppercase font-bold block">Member</span>
                    <strong class="text-white">{{ $profile['name'] }}</strong>
                </div>
                <div class="text-right">
                    <span class="text-gray-400 text-[10px] uppercase font-bold block">Active Plan</span>
                    <strong class="text-[#ff9e58]">{{ $profile['package_name'] }}</strong>
                </div>
            </div>

            <!-- Start Date -->
            <div>
                <label for="freeze_start_date" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Freeze Start Date
                </label>
                <input 
                    type="date" 
                    name="freeze_start_date" 
                    id="freeze_start_date" 
                    value="{{ date('Y-m-d', strtotime('+1 day')) }}"
                    min="{{ date('Y-m-d') }}"
                    required 
                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                >
            </div>

            <!-- Pause Duration -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">
                    Freeze Duration
                </label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                    <label class="p-2.5 rounded-lg bg-[#182030] border border-white/10 text-center cursor-pointer hover:border-[#ff5e14] transition-colors block">
                        <input type="radio" name="freeze_duration_days" value="7" class="accent-[#ff5e14] mb-1">
                        <div class="text-xs font-bold text-white">7 Days</div>
                        <div class="text-[9px] text-gray-400">1 Week</div>
                    </label>

                    <label class="p-2.5 rounded-lg bg-[#182030] border border-[#ff5e14]/40 text-center cursor-pointer hover:border-[#ff5e14] transition-colors block">
                        <input type="radio" name="freeze_duration_days" value="14" checked class="accent-[#ff5e14] mb-1">
                        <div class="text-xs font-bold text-white">14 Days</div>
                        <div class="text-[9px] text-gray-400">2 Weeks</div>
                    </label>

                    <label class="p-2.5 rounded-lg bg-[#182030] border border-white/10 text-center cursor-pointer hover:border-[#ff5e14] transition-colors block">
                        <input type="radio" name="freeze_duration_days" value="30" class="accent-[#ff5e14] mb-1">
                        <div class="text-xs font-bold text-white">30 Days</div>
                        <div class="text-[9px] text-gray-400">1 Month</div>
                    </label>

                    <label class="p-2.5 rounded-lg bg-[#182030] border border-white/10 text-center cursor-pointer hover:border-[#ff5e14] transition-colors block">
                        <input type="radio" name="freeze_duration_days" value="60" class="accent-[#ff5e14] mb-1">
                        <div class="text-xs font-bold text-white">60 Days</div>
                        <div class="text-[9px] text-gray-400">2 Months</div>
                    </label>
                </div>
            </div>

            <!-- Reason for Freeze -->
            <div>
                <label for="freeze_reason" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Primary Reason for Pause
                </label>
                <select 
                    name="freeze_reason" 
                    id="freeze_reason" 
                    required 
                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                >
                    <option value="Medical Recovery / Injury">Medical Recovery / Injury</option>
                    <option value="Work Travel / Relocation">Work Travel / Relocation</option>
                    <option value="Vacation / Holiday">Vacation / Holiday</option>
                    <option value="Religious Observance / Fasting">Religious Observance / Fasting (Ramadan)</option>
                    <option value="Personal Sabbatical">Personal Sabbatical</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <!-- Additional Notes -->
            <div>
                <label for="freeze_notes" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Additional Comments / Notes (Optional)
                </label>
                <textarea 
                    name="freeze_notes" 
                    id="freeze_notes" 
                    rows="2"
                    placeholder="e.g. Advised 2 weeks knee recovery by physician..."
                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                ></textarea>
            </div>

            <!-- Policy Alert -->
            <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-[11px] text-gray-400 flex items-center gap-2">
                <i class="fa-solid fa-clock-rotate-left text-[#ff9e58]"></i>
                <span>Your remaining paid days will be automatically added to your next billing date. Zero cancellation penalty.</span>
            </div>

            <!-- Submit -->
            <div class="pt-2 flex items-center justify-end gap-3">
                <button 
                    type="button" 
                    onclick="closeFreezeModal()" 
                    class="bg-white/5 hover:bg-white/10 text-gray-300 text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-lg border border-white/10 cursor-pointer"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="btn-glow-orange text-white font-extrabold text-xs uppercase tracking-wider px-6 py-2.5 rounded-lg transition-all cursor-pointer shadow-md shadow-[#ff5e14]/30"
                >
                    Submit Freeze Request
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal 4: Official Gym Invoice / Receipt Modal -->
<div id="receipt-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-[#131722] border border-white/15 rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative">
        <button type="button" onclick="closeReceiptModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div id="receipt-printable-area">
            <!-- Receipt Header -->
            <div class="flex items-center justify-between pb-5 border-b border-white/10">
                <div class="flex items-center gap-2">
                    <div class="flex items-center gap-[2px] h-6">
                        <span class="w-[3px] h-3 bg-[#ff5e14] rounded-full"></span>
                        <span class="w-[4px] h-5 bg-[#ff5e14] rounded-full"></span>
                        <span class="w-[4px] h-4 bg-[#ff5e14] rounded-full"></span>
                    </div>
                    <span class="font-heading text-lg font-black text-white">Gymstick TRAINING</span>
                </div>
                <div class="text-right">
                    <span class="text-[10px] font-bold text-emerald-400 uppercase tracking-widest block">PAYMENT RECEIPT</span>
                    <span id="receipt-invoice-id" class="font-mono text-xs font-bold text-white"></span>
                </div>
            </div>

            <!-- Billing Details Grid -->
            <div class="grid grid-cols-2 gap-4 py-4 text-xs border-b border-white/10">
                <div>
                    <span class="text-gray-400 block text-[10px] uppercase font-bold">Billed To</span>
                    <strong class="text-white">{{ $profile['name'] }}</strong>
                    <div class="text-gray-400 text-[11px] font-mono mt-0.5">ID: {{ $profile['gym_id'] }}</div>
                </div>
                <div class="text-right">
                    <span class="text-gray-400 block text-[10px] uppercase font-bold">Payment Date</span>
                    <strong id="receipt-date" class="text-white"></strong>
                    <div id="receipt-method" class="text-gray-400 text-[11px] mt-0.5"></div>
                </div>
            </div>

            <!-- Line Items -->
            <div class="py-4 space-y-2 border-b border-white/10 text-xs">
                <div class="flex justify-between items-center text-gray-400 text-[10px] uppercase font-bold pb-1">
                    <span>Description</span>
                    <span>Amount</span>
                </div>
                <div class="flex justify-between items-center text-white py-1">
                    <span id="receipt-plan" class="font-medium"></span>
                    <span id="receipt-subtotal" class="font-bold"></span>
                </div>
                <div class="flex justify-between items-center text-gray-400 text-[11px]">
                    <span>Facility Maintenance & Tax (6%)</span>
                    <span id="receipt-tax"></span>
                </div>
                <div class="flex justify-between items-center text-white font-heading text-base font-black pt-2 border-t border-white/10">
                    <span>TOTAL PAID</span>
                    <span id="receipt-total" class="text-[#ff9e58]"></span>
                </div>
            </div>

            <div class="pt-4 text-center text-[10px] text-gray-500">
                Thank you for training with Gymstick. Keep crushing your fitness goals!
            </div>
        </div>

        <div class="mt-6 flex flex-wrap items-center justify-end gap-3">
            <button 
                type="button" 
                onclick="closeReceiptModal()" 
                class="bg-white/5 hover:bg-white/10 text-gray-300 text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-lg border border-white/10 cursor-pointer"
            >
                Close
            </button>
            <a 
                id="receipt-pdf-download-link"
                href="#" 
                target="_blank"
                class="bg-rose-600 hover:bg-rose-500 text-white font-extrabold text-xs uppercase tracking-wider px-4 py-2.5 rounded-lg transition-all cursor-pointer flex items-center gap-1.5 shadow-md shadow-rose-600/25"
                title="Download Single-Page Official PDF Receipt"
            >
                <i class="fa-solid fa-file-pdf"></i>
                <span>Download PDF (1 Page)</span>
            </a>
            <a 
                id="receipt-tax-invoice-link"
                href="#" 
                target="_blank"
                class="btn-glow-orange text-white font-extrabold text-xs uppercase tracking-wider px-4 py-2.5 rounded-lg transition-all cursor-pointer flex items-center gap-1.5 shadow-md shadow-[#ff5e14]/30"
            >
                <i class="fa-solid fa-print"></i>
                <span>Open Tax Invoice</span>
            </a>
        </div>
    </div>
</div>

<!-- Modal 5: Log New Weigh-In & Body Composition -->
<div id="weighin-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-[#131722] border border-white/10 rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative">
        <button type="button" onclick="closeWeighInModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="mb-5">
            <span class="text-[10px] font-bold text-[#ff9e58] uppercase tracking-wider">Transformation Tracker</span>
            <h3 class="font-heading text-xl font-bold text-white mt-1">Log Weekly Weigh-In</h3>
            <p class="text-xs text-gray-400">Record your current scale weight and body measurements to update your progress curve.</p>
        </div>

        <form method="POST" action="{{ route('profile.progress.store') }}" class="space-y-4">
            @csrf

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="weighin_weight" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Bodyweight (kg) *
                    </label>
                    <input 
                        type="number" 
                        step="0.1" 
                        name="weight_kg" 
                        id="weighin_weight" 
                        value="78.5" 
                        required
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                    >
                </div>

                <div>
                    <label for="weighin_fat" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Body Fat (%)
                    </label>
                    <input 
                        type="number" 
                        step="0.1" 
                        name="body_fat_pct" 
                        id="weighin_fat" 
                        value="14.8" 
                        placeholder="14.8"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                    >
                </div>
            </div>

            <div class="grid grid-cols-3 gap-2">
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                        Waist (cm)
                    </label>
                    <input 
                        type="number" 
                        step="0.5" 
                        name="waist_cm" 
                        value="82.0" 
                        placeholder="82.0"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-2.5 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                    >
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                        Chest (cm)
                    </label>
                    <input 
                        type="number" 
                        step="0.5" 
                        name="chest_cm" 
                        value="104.5" 
                        placeholder="104.5"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-2.5 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                    >
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                        Arms (cm)
                    </label>
                    <input 
                        type="number" 
                        step="0.5" 
                        name="arms_cm" 
                        value="40.0" 
                        placeholder="40.0"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-2.5 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                    >
                </div>
            </div>

            <div>
                <label for="weighin_notes" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Check-in Notes
                </label>
                <input 
                    type="text" 
                    name="notes" 
                    id="weighin_notes" 
                    placeholder="e.g. Fasted morning weigh-in, feeling leaner"
                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#ff5e14]"
                >
            </div>

            <div class="pt-3 flex items-center justify-end gap-3">
                <button 
                    type="button" 
                    onclick="closeWeighInModal()"
                    class="bg-white/5 hover:bg-white/10 text-gray-300 text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-lg border border-white/10 cursor-pointer"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="btn-glow-orange text-white font-extrabold text-xs uppercase tracking-wider px-6 py-2.5 rounded-lg transition-all cursor-pointer shadow-md shadow-[#ff5e14]/30"
                >
                    Record Weigh-In
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal 6: Turnstile RFID Check-In Confirmation -->
<div id="turnstile-modal" class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-[#131722] border-2 border-emerald-500/40 rounded-3xl max-w-sm w-full p-6 text-center shadow-2xl relative overflow-hidden">
        <!-- Glow Circle -->
        <div class="w-18 h-18 rounded-full bg-emerald-500/20 border-2 border-emerald-400 flex items-center justify-center mx-auto mb-4 text-emerald-400 text-3xl shadow-lg shadow-emerald-500/20">
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <span class="text-[10px] font-extrabold text-emerald-400 uppercase tracking-widest bg-emerald-500/10 px-3 py-0.5 rounded-full border border-emerald-500/30 inline-block mb-1">
            ACCESS GRANTED &bull; TURNSTILE UNLOCKED
        </span>

        <h3 class="font-heading text-xl font-black text-white mt-2">
            Welcome, {{ $profile['name'] }}!
        </h3>
        <p class="text-xs text-gray-400 mt-1">
            RFID Turnstile Gate A verified. Today's attendance logged successfully.
        </p>

        <div class="my-4 p-3.5 rounded-xl bg-[#182030] border border-white/5 text-xs text-left space-y-1.5 font-mono">
            <div class="flex justify-between text-gray-400">
                <span>Member ID:</span>
                <strong class="text-white">{{ $profile['gym_id'] }}</strong>
            </div>
            <div class="flex justify-between text-gray-400">
                <span>Access Gate:</span>
                <strong class="text-[#ff9e58]">VIP Turnstile Gate A</strong>
            </div>
            <div class="flex justify-between text-gray-400">
                <span>Check-in Time:</span>
                <strong id="turnstile-checkin-time" class="text-white">{{ date('h:i A') }}</strong>
            </div>
            <div class="flex justify-between text-gray-400">
                <span>Pass Status:</span>
                <strong class="text-emerald-400">Active VIP Athlete</strong>
            </div>
        </div>

        <button 
            type="button" 
            onclick="closeTurnstileModal()"
            class="w-full py-2.5 rounded-xl btn-glow-orange text-white font-extrabold text-xs uppercase tracking-wider transition-all cursor-pointer shadow-md shadow-[#ff5e14]/30"
        >
            Enter Training Zone
        </button>
    </div>
</div>

<!-- Chart.js CDN for Body Progress & Metrics Line Graph -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Turnstile Check-In Sound and Web Audio API Synthesizer
function playTurnstileChime() {
    try {
        const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        const now = audioCtx.currentTime;

        // Tone 1: 880 Hz (A5)
        const osc1 = audioCtx.createOscillator();
        const gain1 = audioCtx.createGain();
        osc1.type = 'sine';
        osc1.frequency.setValueAtTime(880, now);
        gain1.gain.setValueAtTime(0.2, now);
        gain1.gain.exponentialRampToValueAtTime(0.001, now + 0.12);
        osc1.connect(gain1);
        gain1.connect(audioCtx.destination);
        osc1.start(now);
        osc1.stop(now + 0.12);

        // Tone 2: 1320 Hz (E6, pleasant electronic unlock chime)
        const osc2 = audioCtx.createOscillator();
        const gain2 = audioCtx.createGain();
        osc2.type = 'sine';
        osc2.frequency.setValueAtTime(1320, now + 0.14);
        gain2.gain.setValueAtTime(0.25, now + 0.14);
        gain2.gain.exponentialRampToValueAtTime(0.001, now + 0.35);
        osc2.connect(gain2);
        gain2.connect(audioCtx.destination);
        osc2.start(now + 0.14);
        osc2.stop(now + 0.35);
    } catch (e) {
        console.log('Web Audio API not supported', e);
    }
}

function scanTurnstilePass() {
    const btn = document.getElementById('turnstile-scan-btn');
    if (btn) {
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-sm"></i> Verifying Pass...';
        btn.disabled = true;
    }

    fetch("{{ route('profile.check-in') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json"
        },
        body: JSON.stringify({ turnstile_gate: "Gate A - VIP Turnstile (West Wing)" })
    })
    .then(res => res.json())
    .then(data => {
        playTurnstileChime();
        if (btn) {
            btn.innerHTML = '<i class="fa-solid fa-qrcode text-sm"></i> Re-Scan Turnstile Entry';
            btn.disabled = false;
        }
        const timeEl = document.getElementById('turnstile-checkin-time');
        if (timeEl && data.timestamp) {
            timeEl.textContent = data.timestamp;
        }
        openTurnstileModal();
    })
    .catch(err => {
        console.error(err);
        playTurnstileChime();
        if (btn) {
            btn.innerHTML = '<i class="fa-solid fa-qrcode text-sm"></i> Re-Scan Turnstile Entry';
            btn.disabled = false;
        }
        openTurnstileModal();
    });
}

function openTurnstileModal() {
    const modal = document.getElementById('turnstile-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeTurnstileModal() {
    const modal = document.getElementById('turnstile-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Workout Logger Helpers
function selectMuscleGroup(name) {
    document.getElementById('selected_muscle_group').value = name;
    document.querySelectorAll('.muscle-pill').forEach(pill => {
        if (pill.getAttribute('data-group') === name) {
            pill.classList.remove('bg-[#182030]', 'text-gray-300', 'border-white/5');
            pill.classList.add('bg-[#ff5e14]', 'text-black', 'border-[#ff5e14]');
        } else {
            pill.classList.remove('bg-[#ff5e14]', 'text-black', 'border-[#ff5e14]');
            pill.classList.add('bg-[#182030]', 'text-gray-300', 'border-white/5');
        }
    });
}

function setExerciseName(name) {
    const input = document.getElementById('workout_exercise_name');
    if (input) {
        input.value = name;
        input.focus();
    }
}

// Smart Workout Routine Builder Helpers
function switchRoutineTab(tabId) {
    document.querySelectorAll('.routine-panel').forEach(panel => panel.classList.add('hidden'));
    const targetPanel = document.getElementById('routine-panel-' + tabId);
    if (targetPanel) targetPanel.classList.remove('hidden');

    document.querySelectorAll('.routine-tab-btn').forEach(btn => {
        btn.classList.remove('bg-[#ff5e14]', 'text-black');
        btn.classList.add('bg-[#182030]', 'text-gray-300', 'border', 'border-white/5');
    });
    const targetBtn = document.getElementById('tab-btn-' + tabId);
    if (targetBtn) {
        targetBtn.classList.remove('bg-[#182030]', 'text-gray-300', 'border', 'border-white/5');
        targetBtn.classList.add('bg-[#ff5e14]', 'text-black');
    }
}

function loadExerciseIntoForm(name, muscle, weight, sets, reps) {
    selectMuscleGroup(muscle);
    const nameInput = document.getElementById('workout_exercise_name');
    const weightInput = document.getElementById('workout_weight');
    const setsInput = document.getElementById('workout_sets');
    const repsInput = document.getElementById('workout_reps');

    if (nameInput) nameInput.value = name;
    if (weightInput) weightInput.value = weight;
    if (setsInput) setsInput.value = sets;
    if (repsInput) repsInput.value = reps;

    const formCard = document.getElementById('workout-logger-form-card');
    if (formCard) {
        formCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
        formCard.classList.add('ring-2', 'ring-[#ff5e14]', 'shadow-[#ff5e14]/30');
        setTimeout(() => {
            formCard.classList.remove('ring-2', 'ring-[#ff5e14]', 'shadow-[#ff5e14]/30');
        }, 1500);
    }
    if (nameInput) nameInput.focus();
}

// Weigh-In Modal
function openWeighInModal() {
    const modal = document.getElementById('weighin-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeWeighInModal() {
    const modal = document.getElementById('weighin-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Edit Profile Modal
function openEditProfileModal() {
    const modal = document.getElementById('edit-profile-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeEditProfileModal() {
    const modal = document.getElementById('edit-profile-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Renew / Extend Modal
function openRenewModal() {
    const modal = document.getElementById('renew-modal');
    if (!modal) return;
    updateRenewCalculation(1);
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeRenewModal() {
    const modal = document.getElementById('renew-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function updateRenewCalculation(months) {
    const planName = "{{ strtolower($profile['package_name']) }}";
    let base = 53.00;
    if (planName.includes('basic')) base = 29.00;
    else if (planName.includes('elite')) base = 99.00;

    let discount = 0;
    if (months === 3) discount = 0.10;
    else if (months === 6) discount = 0.15;
    else if (months === 12) discount = 0.23;

    const total = (base * months) * (1 - discount);
    const priceFormatted = '$' + total.toFixed(2);

    const priceEl = document.getElementById('renew-preview-price');
    const durEl = document.getElementById('renew-preview-duration');
    const dateEl = document.getElementById('renew-preview-date');

    if (priceEl) priceEl.textContent = priceFormatted;
    if (durEl) durEl.textContent = `+${months} ${months === 1 ? 'Month (+30 Days)' : 'Months'}`;

    const currentExpiryStr = "{{ $profile['renewal_date'] }}";
    let baseDate = new Date();
    if (currentExpiryStr) {
        const parsed = new Date(currentExpiryStr);
        if (!isNaN(parsed) && parsed > baseDate) {
            baseDate = parsed;
        }
    }
    const targetDate = new Date(baseDate);
    targetDate.setMonth(targetDate.getMonth() + months);
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    if (dateEl) dateEl.textContent = targetDate.toLocaleDateString('en-US', options);
}

// Freeze Modal
function openFreezeModal() {
    const modal = document.getElementById('freeze-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeFreezeModal() {
    const modal = document.getElementById('freeze-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Receipt Modal
function openReceiptModal(id, date, plan, total, subtotal, tax, method) {
    document.getElementById('receipt-invoice-id').textContent = id;
    document.getElementById('receipt-date').textContent = date;
    document.getElementById('receipt-plan').textContent = plan;
    document.getElementById('receipt-subtotal').textContent = subtotal;
    document.getElementById('receipt-tax').textContent = tax;
    document.getElementById('receipt-total').textContent = total;
    document.getElementById('receipt-method').textContent = method;

    const link = document.getElementById('receipt-tax-invoice-link');
    if (link) {
        link.href = '/profile/invoice/' + id;
    }

    const pdfLink = document.getElementById('receipt-pdf-download-link');
    if (pdfLink) {
        pdfLink.href = '/profile/invoice/' + encodeURIComponent(id) + '?download=1';
    }

    const modal = document.getElementById('receipt-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeReceiptModal() {
    const modal = document.getElementById('receipt-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Initialize Chart.js Progress Chart on Page Load
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('bodyProgressChart');
    if (ctx) {
        const labels = {!! json_encode($bodyProgress->pluck('recorded_date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('M d'))->toArray()) !!};
        const weights = {!! json_encode($bodyProgress->pluck('weight_kg')->toArray()) !!};
        const bodyFats = {!! json_encode($bodyProgress->pluck('body_fat_pct')->toArray()) !!};

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels.length ? labels : ['Aug 24', 'Aug 31', 'Sep 07', 'Sep 14', 'Sep 21', 'Sep 28', 'Oct 05', 'Oct 12'],
                datasets: [
                    {
                        label: 'Body Weight (kg)',
                        data: weights.length ? weights : [84.0, 83.2, 82.5, 81.6, 80.8, 79.9, 79.1, 78.5],
                        borderColor: '#ff5e14',
                        backgroundColor: 'rgba(226, 255, 56, 0.08)',
                        borderWidth: 2.5,
                        tension: 0.35,
                        fill: true,
                        pointBackgroundColor: '#ff5e14',
                        pointBorderColor: '#131722',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        yAxisID: 'yWeight',
                    },
                    {
                        label: 'Body Fat (%)',
                        data: bodyFats.length ? bodyFats : [22.5, 21.4, 20.2, 19.1, 17.8, 16.9, 15.6, 14.8],
                        borderColor: '#00d2ff',
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        borderDash: [4, 4],
                        tension: 0.35,
                        pointBackgroundColor: '#00d2ff',
                        pointBorderColor: '#131722',
                        pointBorderWidth: 2,
                        pointRadius: 3.5,
                        pointHoverRadius: 5,
                        yAxisID: 'yFat',
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#161d2d',
                        borderColor: 'rgba(255,255,255,0.15)',
                        borderWidth: 1,
                        titleColor: '#ffffff',
                        bodyColor: '#ff5e14',
                        padding: 10,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y + (context.datasetIndex === 0 ? ' kg' : '%');
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        ticks: { color: '#9ca3af', font: { size: 10 } }
                    },
                    yWeight: {
                        type: 'linear',
                        position: 'left',
                        min: 75,
                        max: 86,
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        ticks: {
                            color: '#ff5e14',
                            font: { size: 10 },
                            callback: (v) => v + ' kg'
                        }
                    },
                    yFat: {
                        type: 'linear',
                        position: 'right',
                        min: 10,
                        max: 25,
                        grid: { display: false },
                        ticks: {
                            color: '#00d2ff',
                            font: { size: 10 },
                            callback: (v) => v + '%'
                        }
                    }
                }
            }
        });
    }
});
</script>
@endsection
