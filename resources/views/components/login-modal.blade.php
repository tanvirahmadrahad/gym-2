<!-- Login Modal (Accessible from any page/header) -->
<div id="login-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="card-vibrant bg-[#0e121a] rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl relative transition-all duration-300">
        <!-- Close Button -->
        <button type="button" onclick="closeLoginModal()" class="absolute top-5 right-5 text-slate-400 hover:text-white transition-colors text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <!-- VIEW 1: Standard Credentials Login -->
        <div id="login-credentials-view">
            <!-- Brand Header -->
            <div class="text-center mb-6">
                <div class="flex items-center justify-center gap-2 mb-2">
                    <div class="flex items-center gap-[3px] h-6">
                        <span class="w-[3px] h-3 bg-gradient-to-t from-[#ff5e14] to-[#ff9e58] rounded-full"></span>
                        <span class="w-[4px] h-6 bg-gradient-to-t from-[#ff5e14] to-[#ff9e58] rounded-full"></span>
                        <span class="w-[4px] h-4 bg-gradient-to-t from-[#ff5e14] to-[#ff9e58] rounded-full"></span>
                        <span class="w-[3px] h-2 bg-gradient-to-t from-[#ff5e14] to-[#ff9e58] rounded-full"></span>
                    </div>
                    <span class="font-heading text-xl font-black text-white">Gymstick</span>
                </div>
                <h3 class="font-heading text-2xl font-black text-white uppercase tracking-tight">Member Login</h3>
                <p class="text-xs text-slate-400 mt-1">Sign in to your athlete profile</p>
            </div>

            <!-- Error Feedback Area -->
            <div id="login-modal-error" class="hidden mb-4 p-3 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span id="login-modal-error-text"></span>
            </div>

            <!-- Form -->
            <form id="login-modal-form" method="POST" action="{{ route('login.post') }}" class="space-y-4">
                @csrf

                <!-- Email / Username -->
                <div>
                    <label for="modal-email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                        Email or Username
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500 text-xs">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input 
                            type="text" 
                            name="email" 
                            id="modal-email" 
                            value="{{ old('email') }}" 
                            required 
                            class="w-full bg-[#111624] border border-white/10 rounded-xl pl-9 pr-3 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-[#ff5e14]"
                            placeholder="athlete@gymstick.com"
                        >
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="modal-password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300">
                            Password
                        </label>
                        <button type="button" onclick="showResetPasswordView()" class="text-[11px] text-[#ff9e58] hover:underline cursor-pointer font-medium">
                            Forgot?
                        </button>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500 text-xs">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input 
                            type="password" 
                            name="password" 
                            id="modal-password" 
                            value="" 
                            required 
                            class="w-full bg-[#111624] border border-white/10 rounded-xl pl-9 pr-9 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-[#ff5e14]"
                            placeholder="••••••••"
                        >
                        <button 
                            type="button" 
                            onclick="togglePasswordVisibility('modal-password', this)"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-500 hover:text-white text-xs cursor-pointer"
                        >
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between text-xs text-slate-400">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            class="w-3.5 h-3.5 rounded bg-[#111624] border-white/20 text-[#ff5e14] focus:ring-[#ff5e14]" 
                            checked
                        >
                        <span>Remember me</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    id="login-modal-submit-btn"
                    class="w-full btn-glow-orange text-white font-black text-xs uppercase tracking-wider py-3 rounded-xl transition-all shadow-md shadow-[#ff5e14]/30 cursor-pointer flex items-center justify-center gap-2"
                >
                    <span>Login to Account</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </button>
            </form>

            <!-- 1-Click Demo Login Option -->
            <div class="mt-4 pt-4 border-t border-white/10">
                <button 
                    type="button" 
                    onclick="triggerDemoLoginFromModal(this)" 
                    class="w-full py-2.5 px-4 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 hover:border-[#ff5e14]/40 text-slate-300 hover:text-[#ff9e58] transition-all text-xs font-semibold flex items-center justify-center gap-2 cursor-pointer group"
                >
                    <i class="fa-solid fa-bolt text-[#ff5e14] group-hover:scale-110 transition-transform"></i>
                    <span>Instant Demo Login <span class="text-[11px] text-slate-400 font-normal">(demo / demo)</span></span>
                </button>
            </div>

            <!-- Footer: Register Link -->
            <div class="mt-6 pt-4 border-t border-white/10 text-center text-xs text-slate-400">
                <span>Don't have an account?</span>
                <a href="{{ route('register') }}" class="text-[#ff9e58] font-bold hover:underline ml-1">
                    Register Free
                </a>
            </div>
        </div>

        <!-- VIEW 2: Reset Password / Recovery View -->
        <div id="login-reset-view" class="hidden">
            <div class="text-center mb-6">
                <div class="w-14 h-14 mx-auto rounded-2xl bg-[#ff5e14]/15 border border-[#ff5e14]/30 flex items-center justify-center text-[#ff5e14] mb-3 shadow-lg shadow-[#ff5e14]/20">
                    <i class="fa-solid fa-key text-xl"></i>
                </div>
                <h3 class="font-heading text-2xl font-black text-white uppercase tracking-tight">Account Recovery</h3>
                <p class="text-xs text-slate-400 mt-1">Enter your registered email address to receive password reset instructions.</p>
            </div>

            <!-- Reset Error Box -->
            <div id="login-reset-error" class="hidden mb-4 p-3 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span id="login-reset-error-text"></span>
            </div>

            <!-- Reset Form -->
            <form id="login-reset-form" onsubmit="event.preventDefault(); submitPasswordReset();" class="space-y-4">
                @csrf
                <div>
                    <label for="reset-email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                        Your Registered Email
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500 text-xs">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input 
                            type="email" 
                            id="reset-email" 
                            required 
                            class="w-full bg-[#111624] border border-white/10 rounded-xl pl-9 pr-3 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-[#ff5e14]"
                            placeholder="athlete@gymstick.com"
                        >
                    </div>
                </div>

                <button 
                    type="submit" 
                    id="reset-submit-btn"
                    class="w-full btn-glow-orange text-white font-black text-xs uppercase tracking-wider py-3 rounded-xl transition-all shadow-md shadow-[#ff5e14]/30 cursor-pointer flex items-center justify-center gap-2"
                >
                    <i class="fa-solid fa-paper-plane text-xs"></i>
                    <span>Send Reset Instructions</span>
                </button>
            </form>

            <div class="mt-6 pt-4 border-t border-white/10 text-center">
                <button type="button" onclick="showCredentialsView()" class="text-xs text-slate-400 hover:text-white transition-colors inline-flex items-center gap-1.5 font-medium cursor-pointer">
                    <i class="fa-solid fa-arrow-left text-[10px]"></i>
                    <span>Back to Member Login</span>
                </button>
            </div>
        </div>

        <!-- VIEW 3: Reset Success / Dispatched Confirmation -->
        <div id="login-reset-success-view" class="hidden text-center py-4">
            <div class="w-16 h-16 mx-auto rounded-full bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 mb-4 shadow-lg shadow-emerald-500/10">
                <i class="fa-solid fa-envelope-circle-check text-2xl"></i>
            </div>
            <h3 class="font-heading text-2xl font-black text-white uppercase tracking-tight mb-2">Instructions Sent!</h3>
            <p class="text-xs text-slate-300 leading-relaxed max-w-xs mx-auto mb-6">
                We've dispatched a temporary recovery token to <strong id="reset-success-email" class="text-[#ff9e58] break-all"></strong>. Check your inbox to set a new password.
            </p>

            <div class="p-3 bg-white/5 rounded-xl border border-white/5 text-[11px] text-slate-400 mb-6 flex items-start gap-2.5 text-left">
                <i class="fa-solid fa-shield-halved text-[#ff5e14] mt-0.5"></i>
                <span>Link expires in 60 minutes for account security. If not found, please check spam or bulk folders.</span>
            </div>

            <button 
                type="button" 
                onclick="showCredentialsView()" 
                class="w-full btn-glow-orange text-white font-black text-xs uppercase tracking-wider py-3 rounded-xl transition-all shadow-md shadow-[#ff5e14]/30 cursor-pointer mb-3"
            >
                Return to Login
            </button>

            <button 
                type="button" 
                id="reset-resend-btn"
                onclick="resendResetEmail()" 
                class="text-xs text-slate-400 hover:text-white transition-colors cursor-pointer"
            >
                Didn't receive email? <span class="text-[#ff9e58] font-semibold underline">Resend (<span id="reset-timer">60</span>s)</span>
            </button>
        </div>
    </div>
</div>

<script>
let resetCooldownTimer = null;
let resetSecondsLeft = 60;

function openLoginModal() {
    const modal = document.getElementById('login-modal');
    if (!modal) return;
    showCredentialsView();
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeLoginModal() {
    const modal = document.getElementById('login-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function showResetPasswordView() {
    const cView = document.getElementById('login-credentials-view');
    const rView = document.getElementById('login-reset-view');
    const sView = document.getElementById('login-reset-success-view');
    const emailVal = document.getElementById('modal-email')?.value || '';
    const resetInput = document.getElementById('reset-email');

    if (resetInput && emailVal) {
        resetInput.value = emailVal;
    }

    if (cView) cView.classList.add('hidden');
    if (sView) sView.classList.add('hidden');
    if (rView) rView.classList.remove('hidden');
}

function showCredentialsView() {
    const cView = document.getElementById('login-credentials-view');
    const rView = document.getElementById('login-reset-view');
    const sView = document.getElementById('login-reset-success-view');

    if (rView) rView.classList.add('hidden');
    if (sView) sView.classList.add('hidden');
    if (cView) cView.classList.remove('hidden');
}

async function triggerDemoLoginFromModal(button) {
    const originalContent = button ? button.innerHTML : '';
    if (button) {
        button.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-[#ff5e14]"></i> <span>Logging in...</span>';
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

async function submitPasswordReset() {
    const resetEmail = document.getElementById('reset-email');
    const submitBtn = document.getElementById('reset-submit-btn');
    const errorBox = document.getElementById('login-reset-error');
    const errorText = document.getElementById('login-reset-error-text');
    const successView = document.getElementById('login-reset-success-view');
    const resetView = document.getElementById('login-reset-view');
    const successEmailEl = document.getElementById('reset-success-email');

    if (!resetEmail || !resetEmail.value) return;

    errorBox.classList.add('hidden');
    const originalBtnHtml = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin text-[11px]"></i> <span>Dispatching Link...</span>';
    submitBtn.disabled = true;

    try {
        const response = await fetch("{{ route('password.email') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: resetEmail.value })
        });

        const data = await response.json();

        if (response.ok && data.success) {
            if (successEmailEl) successEmailEl.textContent = data.email || resetEmail.value;
            resetView.classList.add('hidden');
            successView.classList.remove('hidden');
            startResetCooldown();
        } else {
            errorText.textContent = data.message || 'Unable to send recovery instructions. Please try again.';
            errorBox.classList.remove('hidden');
        }
    } catch (err) {
        errorText.textContent = 'Network error. Please try again.';
        errorBox.classList.remove('hidden');
    } finally {
        submitBtn.innerHTML = originalBtnHtml;
        submitBtn.disabled = false;
    }
}

function startResetCooldown() {
    clearInterval(resetCooldownTimer);
    resetSecondsLeft = 60;
    const resendBtn = document.getElementById('reset-resend-btn');
    const timerSpan = document.getElementById('reset-timer');
    if (!resendBtn || !timerSpan) return;

    resendBtn.disabled = true;
    resendBtn.classList.add('opacity-50', 'cursor-not-allowed');

    resetCooldownTimer = setInterval(() => {
        resetSecondsLeft--;
        timerSpan.textContent = resetSecondsLeft;
        if (resetSecondsLeft <= 0) {
            clearInterval(resetCooldownTimer);
            resendBtn.disabled = false;
            resendBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            resendBtn.innerHTML = 'Didn\'t receive email? <span class="text-[#ff9e58] font-semibold underline">Resend Now</span>';
        }
    }, 1000);
}

function resendResetEmail() {
    if (resetSecondsLeft > 0) return;
    const resetView = document.getElementById('login-reset-view');
    const successView = document.getElementById('login-reset-success-view');
    if (successView) successView.classList.add('hidden');
    if (resetView) resetView.classList.remove('hidden');
    submitPasswordReset();
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('login-modal-form');
    const errorBox = document.getElementById('login-modal-error');
    const errorText = document.getElementById('login-modal-error-text');
    const submitBtn = document.getElementById('login-modal-submit-btn');

    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            errorBox.classList.add('hidden');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>Logging in...</span>';
            submitBtn.disabled = true;

            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
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
                    errorText.textContent = data.message || 'Login failed. Please check credentials.';
                    errorBox.classList.remove('hidden');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }
            } catch (err) {
                form.submit();
            }
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLoginModal();
    });
});
</script>
