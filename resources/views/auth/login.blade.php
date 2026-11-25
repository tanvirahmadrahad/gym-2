@extends('layouts.app', ['title' => 'Member Login — Gymstick'])

@section('content')
@auth
<script>
    window.location.replace("{{ route('home') }}");
</script>
@endauth
<div class="min-h-[80vh] flex items-center justify-center py-16 px-4 sm:px-6 bg-[#080a0f] relative overflow-hidden select-none">
    <!-- Giant Subtle Outline Watermark -->
    <div class="bg-watermark top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[18vw] leading-none whitespace-nowrap opacity-20">
        LOGIN
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
                    <i class="fa-solid fa-lock text-[#ff5e14]"></i>
                    <span>Welcome Back</span>
                </span>
            </div>
            <h1 class="font-heading text-2xl sm:text-3xl font-black text-white uppercase tracking-tight">
                Member Login
            </h1>
            <p class="text-xs text-slate-400 mt-1">Enter your credentials to access your athlete portal.</p>
        </div>

        <!-- Success or Error Feedback -->
        @if (session('success'))
            <div class="mb-6 p-3 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

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

        <!-- Login Form -->
        <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
            @csrf

            <!-- Email / Username -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Email or Username
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-xs">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input 
                        type="text" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                        class="w-full bg-[#111624] border border-white/10 rounded-xl pl-10 pr-3.5 py-3 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-[#ff5e14] focus:ring-1 focus:ring-[#ff5e14]"
                        placeholder="athlete@gymstick.com or username"
                    >
                </div>
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300">
                        Password
                    </label>
                    <a href="#" onclick="openResetPasswordModal(); return false;" class="text-[11px] text-[#ff9e58] hover:underline cursor-pointer">
                        Forgot Password?
                    </a>
                </div>
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
                        placeholder="••••••••"
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

            <!-- Remember Me -->
            <div class="flex items-center gap-2 pt-1">
                <input 
                    type="checkbox" 
                    name="remember" 
                    id="remember" 
                    class="w-4 h-4 rounded bg-[#111624] border-white/20 text-[#ff5e14] focus:ring-[#ff5e14] focus:ring-offset-0"
                    checked
                >
                <label for="remember" class="text-xs text-slate-400 cursor-pointer select-none">
                    Remember me on this browser
                </label>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full btn-glow-orange text-white font-black text-xs uppercase tracking-wider py-3.5 rounded-xl transition-all shadow-lg shadow-[#ff5e14]/30 cursor-pointer mt-2"
            >
                Login to Account
            </button>
        </form>

        <!-- 1-Click Demo Login Option (Direct login on click) -->
        <div class="mt-5 pt-4 border-t border-white/10 text-center">
            <button 
                type="button" 
                onclick="triggerDirectDemoLogin(this)" 
                class="w-full py-3 px-4 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 hover:border-[#ff5e14]/40 text-slate-300 hover:text-[#ff9e58] transition-all text-xs font-semibold flex items-center justify-center gap-2 cursor-pointer group"
            >
                <i class="fa-solid fa-bolt text-[#ff5e14] group-hover:scale-110 transition-transform"></i>
                <span>Instant Demo Login <span class="text-[11px] text-slate-400 font-normal">(demo / demo)</span></span>
            </button>
        </div>

        <!-- Footer Links -->
        <div class="mt-8 pt-6 border-t border-white/10 text-center text-xs text-slate-400">
            <span>Don't have an account yet?</span>
            <a href="{{ route('register') }}" class="text-[#ff9e58] font-bold hover:underline ml-1">
                Register Free
            </a>
        </div>
    </div>
</div>

<script>
async function triggerDirectDemoLogin(button) {
    const originalContent = button ? button.innerHTML : '';
    if (button) {
        button.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-[#ff5e14]"></i> <span>Logging in as Demo Member...</span>';
        button.disabled = true;
    }

    try {
        const csrfToken = document.querySelector('input[name="_token"]')?.value || '{{ csrf_token() }}';
        const formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('email', 'demo');
        formData.append('password', 'demo');

        const response = await fetch('{{ route("login.post") }}', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        });

        const data = await response.json();
        if (response.ok && data.success) {
            window.location.href = data.redirect || '{{ url("/") }}';
        } else {
            alert(data.message || 'Demo login failed');
            if (button) {
                button.innerHTML = originalContent;
                button.disabled = false;
            }
        }
    } catch (e) {
        window.location.href = '{{ route("login.demo") }}';
    }
}

function openResetPasswordModal() {
    const emailVal = document.getElementById('email')?.value || '';
    const modalEmail = document.getElementById('modal-email');
    if (modalEmail && emailVal) {
        modalEmail.value = emailVal;
    }
    if (typeof openLoginModal === 'function') {
        openLoginModal();
        if (typeof showResetPasswordView === 'function') {
            showResetPasswordView();
        }
    }
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
