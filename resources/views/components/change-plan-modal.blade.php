<!-- Modal 2: Change Plan & Payment Modal -->
<div id="change-plan-modal" class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md hidden items-center justify-center p-3 sm:p-4 select-none">
    <div class="card-vibrant bg-[#0e121a] rounded-3xl max-w-5xl w-full p-6 sm:p-10 shadow-2xl relative max-h-[92vh] overflow-y-auto">
        <button type="button" onclick="closeChangePlanModal()" class="absolute top-5 right-5 text-slate-400 hover:text-white text-lg cursor-pointer w-9 h-9 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <!-- STEP 1: Plan Selection Screen -->
        <div id="change-plan-step-select">
            <div class="text-center max-w-xl mx-auto mb-8">
                <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full badge-glow text-[10px] font-bold uppercase tracking-wider mb-2">
                    <i class="fa-solid fa-award text-[#ff5e14]"></i>
                    <span>GYM MEMBERSHIP UPGRADE</span>
                </span>
                <h3 class="font-heading text-2xl sm:text-4xl font-black text-white uppercase tracking-tight">
                    Choose Your <span class="text-gradient-orange">Athletic Plan</span>
                </h3>
                <p class="text-xs sm:text-sm text-slate-400 mt-2">
                    Select the ideal training package for your fitness objectives. Switch or cancel anytime.
                </p>

                <!-- Monthly / Yearly Duration Toggle -->
                <div class="flex items-center justify-center gap-3 mt-6">
                    <span id="plan-modal-monthly-label" class="text-xs font-bold uppercase tracking-wider text-[#ff5e14] transition-colors">Monthly</span>
                    <button 
                        id="plan-modal-toggle" 
                        type="button" 
                        onclick="togglePlanModalDuration()"
                        class="w-14 h-7 bg-[#1c2230] rounded-full p-1 relative transition-colors border border-white/15 focus:outline-none cursor-pointer"
                        aria-label="Toggle duration"
                    >
                        <span id="plan-modal-toggle-ball" class="block w-5 h-5 rounded-full bg-[#ff5e14] shadow-md transition-transform translate-x-0"></span>
                    </button>
                    <span id="plan-modal-yearly-label" class="text-xs font-bold uppercase tracking-wider text-slate-400 transition-colors">
                        Yearly <span class="text-[10px] bg-[#ff5e14]/20 text-[#ff9e58] px-2 py-0.5 rounded-full font-extrabold ml-1 border border-[#ff5e14]/30">SAVE 20%+</span>
                    </span>
                </div>
            </div>

            <!-- 3 Pricing Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
                <!-- Card 1: Basic Plan -->
                <div class="bg-[#111624] border border-white/10 rounded-2xl p-6 sm:p-7 flex flex-col justify-between hover:border-white/20 transition-all">
                    <div>
                        <h4 class="font-heading text-2xl font-bold text-white mb-1">Basic Plan</h4>
                        <p class="text-xs text-slate-400 mb-6">For beginners starting their fitness.</p>

                        <div class="mb-6">
                            <span class="font-heading text-4xl sm:text-5xl font-black text-white plan-modal-price" data-monthly="$29" data-yearly="$260">$29</span>
                            <span class="text-xs text-slate-400 font-medium plan-modal-period">/month</span>
                        </div>

                        <button 
                            type="button" 
                            onclick="selectPlanToPay('Basic Plan', '$29', '$260')"
                            class="w-full text-center py-3 px-4 rounded-xl border border-white/20 hover:border-[#ff5e14] hover:bg-[#ff5e14] text-white hover:text-white font-extrabold text-xs uppercase tracking-wider transition-all mb-6 cursor-pointer"
                        >
                            Select Basic Plan
                        </button>

                        <div class="space-y-3 pt-2">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">What you get</span>
                            <div class="flex items-center gap-2.5 text-xs text-slate-300">
                                <i class="fa-solid fa-circle-check text-[#ff5e14]"></i>
                                <span>Standard gym access at off-peak hours</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-slate-300">
                                <i class="fa-solid fa-circle-check text-[#ff5e14]"></i>
                                <span>1 free fitness assessment session</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-slate-300">
                                <i class="fa-solid fa-circle-check text-[#ff5e14]"></i>
                                <span>Locker room & standard shower access</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Pro Plan (Featured) -->
                <div class="bg-[#141a27] border-2 border-[#ff5e14] rounded-2xl p-6 sm:p-7 flex flex-col justify-between relative shadow-xl shadow-[#ff5e14]/10 transform md:-translate-y-2">
                    <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-[#ff7a1a] to-[#ff5e14] text-white font-black text-[10px] uppercase tracking-widest px-4 py-1 rounded-full shadow-md">
                        MOST POPULAR
                    </div>

                    <div>
                        <h4 class="font-heading text-2xl font-bold text-white mb-1">Pro Plan</h4>
                        <p class="text-xs text-slate-400 mb-6">For regular gym-goers aiming to level up.</p>

                        <div class="mb-6">
                            <span class="font-heading text-4xl sm:text-5xl font-black text-gradient-orange plan-modal-price" data-monthly="$53" data-yearly="$490">$53</span>
                            <span class="text-xs text-slate-400 font-medium plan-modal-period">/month</span>
                        </div>

                        <button 
                            type="button" 
                            onclick="selectPlanToPay('Pro Plan', '$53', '$490')"
                            class="w-full text-center py-3 px-4 rounded-xl btn-glow-orange text-white font-black text-xs uppercase tracking-wider transition-all mb-6 cursor-pointer shadow-lg shadow-[#ff5e14]/30"
                        >
                            Select Pro Plan
                        </button>

                        <div class="space-y-3 pt-2">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Everything in Basic, plus</span>
                            <div class="flex items-center gap-2.5 text-xs text-slate-300">
                                <i class="fa-solid fa-circle-check text-[#ff5e14]"></i>
                                <span>Unlimited 24/7 gym & recovery access</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-slate-300">
                                <i class="fa-solid fa-circle-check text-[#ff5e14]"></i>
                                <span>Free group cycling & aerobic classes</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-slate-300">
                                <i class="fa-solid fa-circle-check text-[#ff5e14]"></i>
                                <span>1 complimentary PT session / month</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-slate-300">
                                <i class="fa-solid fa-circle-check text-[#ff5e14]"></i>
                                <span>Sauna & hydrotherapy plunge entry</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Elite Athlete -->
                <div class="bg-[#111624] border border-white/10 rounded-2xl p-6 sm:p-7 flex flex-col justify-between hover:border-white/20 transition-all">
                    <div>
                        <h4 class="font-heading text-2xl font-bold text-white mb-1">Elite Athlete</h4>
                        <p class="text-xs text-slate-400 mb-6">For advanced athletes seeking peak results.</p>

                        <div class="mb-6">
                            <span class="font-heading text-4xl sm:text-5xl font-black text-white plan-modal-price" data-monthly="$89" data-yearly="$799">$89</span>
                            <span class="text-xs text-slate-400 font-medium plan-modal-period">/month</span>
                        </div>

                        <button 
                            type="button" 
                            onclick="selectPlanToPay('Elite Athlete', '$89', '$799')"
                            class="w-full text-center py-3 px-4 rounded-xl border border-white/20 hover:border-[#ff5e14] hover:bg-[#ff5e14] text-white hover:text-white font-extrabold text-xs uppercase tracking-wider transition-all mb-6 cursor-pointer"
                        >
                            Select Elite Plan
                        </button>

                        <div class="space-y-3 pt-2">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Everything in Pro, plus</span>
                            <div class="flex items-center gap-2.5 text-xs text-slate-300">
                                <i class="fa-solid fa-circle-check text-[#ff5e14]"></i>
                                <span>Dedicated private coaching weekly</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-slate-300">
                                <i class="fa-solid fa-circle-check text-[#ff5e14]"></i>
                                <span>Custom macro nutrition protocol design</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-slate-300">
                                <i class="fa-solid fa-circle-check text-[#ff5e14]"></i>
                                <span>Permanent executive locker assignment</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-slate-300">
                                <i class="fa-solid fa-circle-check text-[#ff5e14]"></i>
                                <span>15% Pro Store supplement discount</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STEP 2: Instant Payment & Checkout Screen -->
        <div id="change-plan-step-pay" class="hidden">
            <div class="max-w-xl mx-auto">
                <!-- Back Link -->
                <div class="mb-6">
                    <button type="button" onclick="backToPlanSelection()" class="text-xs font-bold text-slate-400 hover:text-[#ff5e14] flex items-center gap-1.5 cursor-pointer">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Change Selected Tier</span>
                    </button>
                </div>

                <div class="text-center mb-8">
                    <span class="text-[10px] font-extrabold text-emerald-400 uppercase tracking-widest bg-emerald-500/10 px-3 py-1 rounded-full border border-emerald-500/30 inline-block mb-2">
                        SECURE CHECKOUT
                    </span>
                    <h3 class="font-heading text-2xl sm:text-3xl font-extrabold text-white">
                        Confirm Membership Upgrade
                    </h3>
                </div>

                <!-- Plan Summary Card -->
                <div class="bg-[#141a27] border border-white/10 rounded-2xl p-5 mb-6 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Upgrading To</span>
                        <h4 id="checkout-plan-name" class="font-heading text-xl font-bold text-white">Pro Plan</h4>
                        <span id="checkout-billing-cycle-label" class="text-xs text-[#ff9e58] block mt-0.5">Monthly Billing</span>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Total Amount</span>
                        <span id="checkout-plan-price" class="font-heading text-3xl font-black text-gradient-orange">$53.00</span>
                    </div>
                </div>

                <!-- Choose Payment Method Form -->
                <form id="change-plan-form" method="POST" action="{{ route('profile.change-plan') }}">
                    @csrf
                    <input type="hidden" name="package_name" id="form-plan-name" value="Pro Plan">
                    <input type="hidden" name="billing_cycle" id="form-billing-cycle" value="monthly">
                    <input type="hidden" name="plan_price" id="form-plan-price" value="$53">
                    <input type="hidden" name="transaction_id" id="form-trx-id" value="">

                    <div class="space-y-3 mb-6">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-300 block">Select Payment Channel</span>

                        <!-- Credit Card Option (Default) -->
                        <label class="flex items-center justify-between p-3.5 rounded-xl bg-[#111624] border border-white/10 cursor-pointer hover:border-[#ff5e14] transition-colors group">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="payment_method" value="Visa •••• 4242" checked class="accent-[#ff5e14]" onchange="updatePayButtonLabel('Visa')">
                                <i class="fa-brands fa-cc-visa text-2xl text-blue-400"></i>
                                <div>
                                    <span class="text-xs font-bold text-white group-hover:text-[#ff9e58] transition-colors">Visa Card (ending •••• 4242)</span>
                                    <span class="text-[10px] text-slate-400 block">Fast auto-charge via saved card</span>
                                </div>
                            </div>
                            <span class="text-[10px] bg-white/5 border border-white/10 text-slate-300 px-2 py-0.5 rounded font-mono">Default</span>
                        </label>

                        <!-- bKash Option -->
                        <label class="flex items-center justify-between p-3.5 rounded-xl bg-[#111624] border border-white/10 cursor-pointer hover:border-[#e2136e] transition-colors group">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="payment_method" value="bKash (017•••••678)" class="accent-[#e2136e]" onchange="updatePayButtonLabel('bKash')">
                                <div class="w-8 h-8 rounded-lg bg-[#e2136e]/20 border border-[#e2136e]/40 flex items-center justify-center text-[#e2136e] font-black text-xs font-mono">
                                    ৳
                                </div>
                                <div>
                                    <span class="text-xs font-bold text-white group-hover:text-[#e2136e] transition-colors">bKash Mobile Wallet</span>
                                    <span class="text-[10px] text-slate-400 block">Instant MFS PIN checkout (BDT / USD converted)</span>
                                </div>
                            </div>
                            <span class="text-[10px] bg-[#e2136e]/10 border border-[#e2136e]/30 text-[#e2136e] px-2 py-0.5 rounded font-bold">MFS</span>
                        </label>

                        <!-- Nagad Option -->
                        <label class="flex items-center justify-between p-3.5 rounded-xl bg-[#111624] border border-white/10 cursor-pointer hover:border-[#f7941d] transition-colors group">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="payment_method" value="Nagad (018•••••890)" class="accent-[#f7941d]" onchange="updatePayButtonLabel('Nagad')">
                                <div class="w-8 h-8 rounded-lg bg-[#f7941d]/20 border border-[#f7941d]/40 flex items-center justify-center text-[#f7941d] font-black text-xs font-mono">
                                    N
                                </div>
                                <div>
                                    <span class="text-xs font-bold text-white group-hover:text-[#f7941d] transition-colors">Nagad Account</span>
                                    <span class="text-[10px] text-slate-400 block">Postal MFS direct gateway checkout</span>
                                </div>
                            </div>
                            <span class="text-[10px] bg-[#f7941d]/10 border border-[#f7941d]/30 text-[#f7941d] px-2 py-0.5 rounded font-bold">MFS</span>
                        </label>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-3 pt-4 border-t border-white/10">
                        <button 
                            type="button" 
                            onclick="closeChangePlanModal()" 
                            class="px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-slate-300 font-bold text-xs uppercase tracking-wider transition-all cursor-pointer"
                        >
                            Cancel
                        </button>
                        <button 
                            type="button" 
                            id="plan-submit-pay-btn"
                            onclick="handlePlanPaymentSubmission()" 
                            class="flex-1 btn-glow-orange text-white font-black text-xs uppercase tracking-wider py-3 px-6 rounded-xl transition-all cursor-pointer shadow-lg shadow-[#ff5e14]/30 flex items-center justify-center gap-2"
                        >
                            <i class="fa-solid fa-lock text-xs"></i>
                            <span id="plan-submit-pay-text">Confirm & Pay Now</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
let isModalYearly = false;
let currentPaymentMethod = 'Visa';

function openChangePlanModal() {
    const modal = document.getElementById('change-plan-modal');
    if (!modal) return;
    backToPlanSelection();
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeChangePlanModal() {
    const modal = document.getElementById('change-plan-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function togglePlanModalDuration() {
    isModalYearly = !isModalYearly;
    const toggleBall = document.getElementById('plan-modal-toggle-ball');
    const labelMonthly = document.getElementById('plan-modal-monthly-label');
    const labelYearly = document.getElementById('plan-modal-yearly-label');
    const prices = document.querySelectorAll('.plan-modal-price');
    const periods = document.querySelectorAll('.plan-modal-period');

    if (isModalYearly) {
        if (toggleBall) {
            toggleBall.classList.remove('translate-x-0');
            toggleBall.classList.add('translate-x-7');
        }
        if (labelMonthly) labelMonthly.classList.replace('text-[#ff5e14]', 'text-slate-400');
        if (labelYearly) labelYearly.classList.replace('text-slate-400', 'text-[#ff5e14]');

        prices.forEach(el => el.textContent = el.getAttribute('data-yearly'));
        periods.forEach(el => el.textContent = '/year');
    } else {
        if (toggleBall) {
            toggleBall.classList.remove('translate-x-7');
            toggleBall.classList.add('translate-x-0');
        }
        if (labelMonthly) labelMonthly.classList.replace('text-slate-400', 'text-[#ff5e14]');
        if (labelYearly) labelYearly.classList.replace('text-[#ff5e14]', 'text-slate-400');

        prices.forEach(el => el.textContent = el.getAttribute('data-monthly'));
        periods.forEach(el => el.textContent = '/month');
    }
}

function selectPlanToPay(planName, monthlyPrice, yearlyPrice) {
    const price = isModalYearly ? yearlyPrice : monthlyPrice;
    const cycle = isModalYearly ? 'yearly' : 'monthly';
    const cycleLabel = isModalYearly ? 'Yearly Billing (Save 20%)' : 'Monthly Auto-Renewal';

    const checkoutName = document.getElementById('checkout-plan-name');
    const checkoutPrice = document.getElementById('checkout-plan-price');
    const checkoutLabel = document.getElementById('checkout-billing-cycle-label');

    if (checkoutName) checkoutName.textContent = planName;
    if (checkoutPrice) checkoutPrice.textContent = price;
    if (checkoutLabel) checkoutLabel.textContent = cycleLabel;

    const formName = document.getElementById('form-plan-name');
    const formCycle = document.getElementById('form-billing-cycle');
    const formPrice = document.getElementById('form-plan-price');

    if (formName) formName.value = planName;
    if (formCycle) formCycle.value = cycle;
    if (formPrice) formPrice.value = price;

    const stepSelect = document.getElementById('change-plan-step-select');
    const stepPay = document.getElementById('change-plan-step-pay');
    if (stepSelect) stepSelect.classList.add('hidden');
    if (stepPay) stepPay.classList.remove('hidden');

    const modal = document.getElementById('change-plan-modal');
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
}

function backToPlanSelection() {
    const stepSelect = document.getElementById('change-plan-step-select');
    const stepPay = document.getElementById('change-plan-step-pay');
    if (stepPay) stepPay.classList.add('hidden');
    if (stepSelect) stepSelect.classList.remove('hidden');
}

function updatePayButtonLabel(method) {
    currentPaymentMethod = method;
    const btnText = document.getElementById('plan-submit-pay-text');
    const btn = document.getElementById('plan-submit-pay-btn');
    if (!btn || !btnText) return;

    if (method === 'bKash') {
        btnText.textContent = 'Pay via bKash Gateway';
        btn.className = 'flex-1 bg-[#e2136e] hover:bg-[#c90f5f] text-white font-extrabold text-xs uppercase tracking-wider py-3 px-6 rounded-xl transition-all cursor-pointer shadow-lg shadow-[#e2136e]/20 flex items-center justify-center gap-2';
    } else if (method === 'Nagad') {
        btnText.textContent = 'Pay via Nagad Gateway';
        btn.className = 'flex-1 bg-[#f7941d] hover:bg-[#df7e0c] text-white font-extrabold text-xs uppercase tracking-wider py-3 px-6 rounded-xl transition-all cursor-pointer shadow-lg shadow-[#f7941d]/20 flex items-center justify-center gap-2';
    } else {
        btnText.textContent = 'Confirm & Pay Now';
        btn.className = 'flex-1 btn-glow-orange text-white font-black text-xs uppercase tracking-wider py-3 px-6 rounded-xl transition-all cursor-pointer shadow-lg shadow-[#ff5e14]/30 flex items-center justify-center gap-2';
    }
}

function handlePlanPaymentSubmission() {
    const randomTrx = 'TRX-' + Math.floor(100000 + Math.random() * 900000);
    const formTrx = document.getElementById('form-trx-id');
    if (formTrx) formTrx.value = randomTrx;

    const form = document.getElementById('change-plan-form');
    if (form) form.submit();
}
</script>
