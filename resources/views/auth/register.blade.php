@extends('layouts.app', ['title' => 'Member Registration — Gymstick'])

@section('content')
@auth
<script>
    window.location.replace("{{ route('home') }}");
</script>
@endauth
<div class="min-h-[85vh] flex items-center justify-center py-16 px-4 sm:px-6 bg-[#080a0f] relative overflow-hidden select-none">
    <!-- Giant Subtle Outline Watermark -->
    <div class="bg-watermark top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[18vw] leading-none whitespace-nowrap opacity-20">
        JOIN
    </div>

    <div class="max-w-md w-full card-vibrant rounded-2xl p-8 sm:p-10 shadow-2xl relative z-10">
        <!-- Brand Header -->
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 mb-4 group">
                <div class="flex items-center gap-[3px] h-7">
                    <span class="w-[3px] h-3 bg-gradient-to-t from-[#ff5e14] to-[#ff9e58] rounded-full"></span>
                    <span class="w-[4px] h-6 bg-gradient-to-t from-[#ff5e14] to-[#ff9e58] rounded-full"></span>
                    <span class="w-[4px] h-4 bg-gradient-to-t from-[#ff5e14] to-[#ff9e58] rounded-full"></span>
                    <span class="w-[3px] h-2 bg-gradient-to-t from-[#ff5e14] to-[#ff9e58] rounded-full"></span>
                </div>
                <span class="font-heading text-2xl font-black tracking-wider text-white">Gymstick</span>
            </a>
            <div>
                <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full badge-glow text-[10px] font-bold uppercase tracking-wider mb-2">
                    <i class="fa-solid fa-bolt text-[#ff5e14]"></i>
                    <span>Join The Movement</span>
                </span>
            </div>
            <h1 class="font-heading text-2xl sm:text-3xl font-black text-white uppercase tracking-tight">
                Create Account
            </h1>
            <p class="text-xs text-slate-400 mt-1">Start your athletic transformation journey with us today.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
            @csrf

            @if (request('plan'))
                <div class="p-3.5 rounded-xl bg-[#ff5e14]/10 border border-[#ff5e14]/30 flex items-center justify-between text-xs">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 block">Selected Gym Package</span>
                        <strong class="text-white text-sm">{{ request('plan') }}</strong>
                        <span class="text-[#ff9e58] font-semibold text-[11px] block capitalize">({{ request('cycle', 'monthly') }} Billing)</span>
                    </div>
                    <input type="hidden" name="package_name" value="{{ request('plan') }}">
                    <input type="hidden" name="billing_cycle" value="{{ request('cycle', 'monthly') }}">
                    <span class="text-[10px] bg-gradient-to-r from-[#ff7a1a] to-[#ff5e14] text-white font-black px-2.5 py-1 rounded-full uppercase tracking-wider shadow-sm">
                        Selected
                    </span>
                </div>
            @endif

            <!-- Full Name -->
            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Full Name
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-xs">
                        <i class="fa-regular fa-user"></i>
                    </span>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name') }}" 
                        required 
                        autofocus
                        class="w-full bg-[#111624] border border-white/10 rounded-xl pl-10 pr-3.5 py-3 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-[#ff5e14] focus:ring-1 focus:ring-[#ff5e14]"
                        placeholder="John Doe"
                    >
                </div>
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Email Address
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-xs">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        required 
                        class="w-full bg-[#111624] border border-white/10 rounded-xl pl-10 pr-3.5 py-3 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-[#ff5e14] focus:ring-1 focus:ring-[#ff5e14]"
                        placeholder="athlete@gymstick.com"
                    >
                </div>
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Phone Number
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-xs">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                    <input 
                        type="tel" 
                        name="phone" 
                        id="phone" 
                        value="{{ old('phone') }}" 
                        class="w-full bg-[#111624] border border-white/10 rounded-xl pl-10 pr-3.5 py-3 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-[#ff5e14] focus:ring-1 focus:ring-[#ff5e14]"
                        placeholder="+1 (555) 234-5678"
                    >
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Password
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-xs">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        class="w-full bg-[#111624] border border-white/10 rounded-xl pl-10 pr-10 py-3 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-[#ff5e14] focus:ring-1 focus:ring-[#ff5e14]"
                        placeholder="At least 6 characters"
                    >
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility('password', this)"
                        class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-500 hover:text-white text-xs cursor-pointer"
                        aria-label="Toggle password visibility"
                    >
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Confirm Password
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-xs">
                        <i class="fa-solid fa-shield-halved"></i>
                    </span>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        required 
                        class="w-full bg-[#111624] border border-white/10 rounded-xl pl-10 pr-10 py-3 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-[#ff5e14] focus:ring-1 focus:ring-[#ff5e14]"
                        placeholder="Re-enter password"
                    >
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility('password_confirmation', this)"
                        class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-500 hover:text-white text-xs cursor-pointer"
                        aria-label="Toggle password confirmation visibility"
                    >
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Terms & Conditions Checkbox -->
            <div class="pt-2">
                <label class="flex items-start gap-3 cursor-pointer group select-none">
                    <div class="relative flex items-center pt-0.5">
                        <input 
                            type="checkbox" 
                            name="terms" 
                            id="terms" 
                            required
                            class="peer sr-only"
                        >
                        <div class="w-5 h-5 rounded border border-white/20 bg-[#111624] peer-checked:bg-[#ff5e14] peer-checked:border-[#ff5e14] flex items-center justify-center transition-all group-hover:border-[#ff5e14]/70">
                            <i class="fa-solid fa-check text-white text-xs opacity-0 peer-checked:opacity-100 transition-opacity font-black"></i>
                        </div>
                    </div>
                    <span class="text-xs text-slate-300 leading-snug">
                        I agree to the 
                        <button type="button" onclick="showTermsModal()" class="text-[#ff9e58] font-bold hover:underline cursor-pointer">Terms & Conditions</button>, 
                        Gym Safety Rules, and 
                        <button type="button" onclick="showTermsModal()" class="text-[#ff9e58] font-bold hover:underline cursor-pointer">Privacy Policy</button>.
                    </span>
                </label>
                @error('terms')
                    <p class="text-rose-400 text-[11px] mt-1.5 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full btn-glow-orange text-white font-black text-xs uppercase tracking-wider py-3.5 rounded-xl transition-all shadow-lg shadow-[#ff5e14]/30 cursor-pointer mt-4"
            >
                Create Account & Join
            </button>
        </form>

        <!-- Footer Links -->
        <div class="mt-8 pt-6 border-t border-white/10 text-center text-xs text-slate-400">
            <span>Already have an account?</span>
            <a href="{{ route('login') }}" class="text-[#ff9e58] font-bold hover:underline ml-1">
                Log In
            </a>
        </div>
    </div>
</div>

<!-- Terms & Conditions Modal -->
<div id="terms-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4">
    <div class="bg-[#0e121a] border border-white/15 rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative max-h-[85vh] flex flex-col">
        <button type="button" onclick="closeTermsModal()" class="absolute top-4 right-4 text-slate-400 hover:text-white text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="mb-4">
            <span class="text-[10px] font-bold text-[#ff9e58] uppercase tracking-wider">Gymstick Training Facility</span>
            <h3 class="font-heading text-xl font-bold text-white mt-1">Gym Membership Terms & Conditions</h3>
        </div>
        <div class="overflow-y-auto space-y-3 text-xs text-slate-300 pr-2 flex-1 leading-relaxed border-t border-b border-white/10 py-4 my-2">
            <p><strong class="text-white">1. Facility Etiquette:</strong> Always re-rack barbells, dumbbells, and weight plates after completing your sets. Wipe down benches and machines after use.</p>
            <p><strong class="text-white">2. Safety & Attire:</strong> Proper athletic footwear (closed-toe gym shoes) and athletic clothing are required at all times inside training zones.</p>
            <p><strong class="text-white">3. Access & ID:</strong> Member cards or digital QR/Barcodes must be scanned at turnstiles upon every entry. Access is non-transferable.</p>
            <p><strong class="text-white">4. Health Declaration:</strong> By registering, you confirm that you are physically capable of engaging in exercise and have consulted a physician if needed.</p>
            <p><strong class="text-white">5. Cancellation & Refunds:</strong> Monthly recurring memberships can be paused or cancelled with 7 days advance notice prior to your next billing cycle.</p>
        </div>
        <div class="pt-2">
            <button type="button" onclick="acceptAndCloseTerms()" class="w-full btn-glow-orange text-white font-black text-xs uppercase tracking-wider py-3 rounded-xl transition-all cursor-pointer">
                I Understand & Accept
            </button>
        </div>
    </div>
</div>

<script>
function showTermsModal() {
    const modal = document.getElementById('terms-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeTermsModal() {
    const modal = document.getElementById('terms-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function acceptAndCloseTerms() {
    const cb = document.getElementById('terms');
    if (cb) cb.checked = true;
    closeTermsModal();
}

function togglePasswordVisibility(inputId, button) {
    const input = document.getElementById(inputId);
    const icon = button.querySelector('i');
    if (!input) return;
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
@endsection
