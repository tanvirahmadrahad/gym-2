<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Official Invoice {{ $invoice['id'] }} — Gymstick Training</title>

    <!-- Google Fonts: Oswald & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Oswald:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- html2pdf.js for Single Page Vector PDF Download -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @page {
            size: A4 portrait;
            margin: 8mm;
        }

        @media print {
            html, body {
                background-color: #0e121a !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                margin: 0 !important;
                padding: 0 !important;
                height: 100% !important;
            }
            .no-print {
                display: none !important;
            }
            .invoice-page {
                box-shadow: none !important;
                border: 1px solid rgba(255,255,255,0.15) !important;
                margin: 0 auto !important;
                width: 100% !important;
                max-width: 100% !important;
                padding: 18px 22px !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }
        }

        .invoice-watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 100px;
            font-weight: 900;
            font-family: 'Oswald', sans-serif;
            color: rgba(255, 94, 20, 0.04);
            pointer-events-none;
            user-select: none;
            white-space: nowrap;
        }

        .paid-stamp {
            transform: rotate(-12deg);
            border: 3px dashed #10b981;
            color: #10b981;
            border-radius: 12px;
            padding: 8px 18px;
            display: inline-block;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            font-size: 18px;
            font-weight: 800;
            background: rgba(16, 185, 129, 0.08);
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.2);
        }
    </style>
</head>
<body class="bg-[#080a0f] text-[#f3f4f6] font-sans antialiased min-h-screen py-6 px-3 sm:px-6">

    <!-- Screen Navigation & Action Bar (Hidden on Print) -->
    <div class="max-w-4xl mx-auto mb-6 flex flex-wrap items-center justify-between gap-4 no-print bg-[#0e121a] p-4 rounded-2xl border border-white/10 shadow-xl">
        <a href="{{ route('profile') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-300 hover:text-[#ff5e14] transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Back to Athlete Profile</span>
        </a>

        <div class="flex items-center gap-3">
            <button 
                type="button" 
                id="btn-download-pdf"
                onclick="downloadSinglePagePdf()" 
                class="bg-rose-600 hover:bg-rose-500 text-white font-extrabold text-xs uppercase tracking-wider px-4 py-2.5 rounded-xl transition-all cursor-pointer flex items-center gap-2 shadow-lg shadow-rose-600/25"
            >
                <i class="fa-solid fa-file-pdf"></i>
                <span id="btn-download-pdf-label">Download PDF (1 Page)</span>
            </button>
            <button 
                type="button" 
                onclick="window.print()" 
                class="btn-glow-orange text-white font-black text-xs uppercase tracking-wider px-4 py-2.5 rounded-xl transition-all cursor-pointer flex items-center gap-2 shadow-lg shadow-[#ff5e14]/30"
            >
                <i class="fa-solid fa-print"></i>
                <span>Print Official Invoice</span>
            </button>
        </div>
    </div>

    <!-- Official Full-Page Invoice Container -->
    <div class="invoice-page max-w-4xl mx-auto bg-[#0e121a] border-2 border-white/15 rounded-3xl p-6 sm:p-10 shadow-2xl relative overflow-hidden">
        
        <!-- Subtle Vector Watermark -->
        <div class="invoice-watermark">GYMSTICK CLUB</div>

        <!-- 1. Invoice Header & Brand Identity -->
        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-6 pb-6 border-b border-white/10 relative z-10">
            <div>
                <!-- Brand Lockup -->
                <div class="flex items-center gap-3 mb-3">
                    <div class="flex items-center gap-[3px] h-8">
                        <span class="w-[5px] h-4 bg-[#ff5e14] rounded-full"></span>
                        <span class="w-[6px] h-8 bg-gradient-to-t from-[#ff5e14] to-[#ff9e58] rounded-full"></span>
                        <span class="w-[6px] h-6 bg-gradient-to-t from-[#ff5e14] to-[#ff9e58] rounded-full"></span>
                        <span class="w-[5px] h-3 bg-[#ff5e14] rounded-full"></span>
                    </div>
                    <div>
                        <span class="font-heading text-3xl font-black tracking-wider text-white">Gymstick</span>
                        <span class="text-[10px] tracking-[0.3em] text-[#ff5e14] font-bold uppercase block">TRAINING & ATHLETICS</span>
                    </div>
                </div>
                <!-- Gym Details -->
                <div class="text-xs text-slate-400 space-y-0.5 font-medium">
                    <p><i class="fa-solid fa-location-dot text-[#ff5e14] w-4"></i> 123 Fitness Ave, Workout City, Suite 400</p>
                    <p><i class="fa-solid fa-envelope text-[#ff5e14] w-4"></i> billing@gymstickpro.com &bull; +1 (234) 567-890</p>
                    <p><i class="fa-solid fa-shield-halved text-[#ff5e14] w-4"></i> BIN/Tax ID: <strong class="text-white">TX-88294012</strong> &bull; License: <strong class="text-white">LIC-2024-NY-9021</strong></p>
                </div>
            </div>

            <!-- Invoice Status & Number -->
            <div class="text-left sm:text-right">
                <span class="px-3 py-1 rounded-full bg-[#ff5e14]/10 text-[#ff9e58] text-[10px] font-extrabold uppercase tracking-widest border border-[#ff5e14]/30 inline-block mb-2">
                    Tax Receipt & Statement
                </span>
                <h1 class="font-heading text-2xl sm:text-3xl font-black text-white uppercase tracking-tight">
                    INVOICE
                </h1>
                <div class="font-mono text-xs text-slate-400 mt-1">
                    Invoice No: <strong class="text-white">{{ $invoice['id'] }}</strong>
                </div>
                <div class="text-xs text-slate-400">
                    Issued: <strong class="text-white">{{ $invoice['date'] }}</strong>
                </div>

                <div class="mt-3">
                    <span class="paid-stamp">
                        PAID IN FULL
                    </span>
                </div>
            </div>
        </div>

        <!-- 2. Billed To & Payment Meta -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 py-6 border-b border-white/10 relative z-10 text-xs">
            <div>
                <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Billed To (Member):</span>
                <div class="font-heading text-lg font-bold text-white">{{ $profile['name'] }}</div>
                <div class="font-mono text-[#ff9e58] font-bold mt-0.5">Gym ID: {{ $profile['gym_id'] }}</div>
                <div class="text-slate-300 mt-1">{{ $profile['email'] }}</div>
                <div class="text-slate-400">{{ $profile['phone'] }}</div>
                <div class="text-slate-400 mt-1">Active Locker: <strong class="text-white font-mono">{{ $profile['locker_number'] }}</strong></div>
            </div>

            <div class="sm:text-right space-y-1 text-slate-300">
                <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Transaction Details:</span>
                <div>Payment Method: <strong class="text-white">{{ $invoice['method'] }}</strong></div>
                <div>Billing Period: <strong class="text-white font-mono">{{ $invoice['billing_period'] }}</strong></div>
                <div>Authorization Code: <strong class="text-white font-mono">{{ $invoice['auth_code'] }}</strong></div>
                <div>Turnstile Access: <strong class="text-emerald-400">UNLIMITED 24/7</strong></div>
                <div class="text-[11px] text-slate-400 pt-1">Status: <span class="text-emerald-400 font-bold">Processed Successfully</span></div>
            </div>
        </div>

        <!-- 3. Line Items Table -->
        <div class="py-6 border-b border-white/10 relative z-10">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-[#141a27] text-slate-300 uppercase tracking-wider text-[10px] font-bold border-b border-white/10">
                        <th class="py-3 px-4">Item & Description</th>
                        <th class="py-3 px-4">Period Covered</th>
                        <th class="py-3 px-4 text-center">Qty</th>
                        <th class="py-3 px-4 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <tr>
                        <td class="py-4 px-4 align-top">
                            <strong class="text-white font-bold block text-sm">{{ $invoice['plan'] }}</strong>
                            <p class="text-slate-400 text-[11px] mt-0.5 max-w-sm">
                                {{ $invoice['description'] }}
                            </p>
                        </td>
                        <td class="py-4 px-4 align-top font-mono text-slate-300">
                            {{ $invoice['billing_period'] }}
                        </td>
                        <td class="py-4 px-4 align-top text-center text-slate-300 font-mono">
                            1
                        </td>
                        <td class="py-4 px-4 text-right align-top font-heading text-sm font-bold text-gradient-orange">{{ $invoice['amount'] }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Barcode & Totals Summary -->
            <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-6 pt-4">
                <!-- Barcode Graphics & Verification -->
                <div class="flex flex-col items-center sm:items-start gap-2">
                    <div class="p-2.5 bg-white rounded-lg inline-block shadow-md">
                        <!-- Code 128 Simulated Barcode -->
                        <div class="flex items-center h-8 gap-[2px]">
                            <span class="w-[2px] h-full bg-black"></span>
                            <span class="w-[1px] h-full bg-black"></span>
                            <span class="w-[3px] h-full bg-black"></span>
                            <span class="w-[1px] h-full bg-black"></span>
                            <span class="w-[2px] h-full bg-black"></span>
                            <span class="w-[4px] h-full bg-black"></span>
                            <span class="w-[1px] h-full bg-black"></span>
                            <span class="w-[3px] h-full bg-black"></span>
                            <span class="w-[2px] h-full bg-black"></span>
                            <span class="w-[1px] h-full bg-black"></span>
                            <span class="w-[4px] h-full bg-black"></span>
                            <span class="w-[2px] h-full bg-black"></span>
                            <span class="w-[1px] h-full bg-black"></span>
                            <span class="w-[3px] h-full bg-black"></span>
                            <span class="w-[2px] h-full bg-black"></span>
                            <span class="w-[4px] h-full bg-black"></span>
                            <span class="w-[1px] h-full bg-black"></span>
                            <span class="w-[2px] h-full bg-black"></span>
                            <span class="w-[3px] h-full bg-black"></span>
                            <span class="w-[1px] h-full bg-black"></span>
                            <span class="w-[4px] h-full bg-black"></span>
                            <span class="w-[2px] h-full bg-black"></span>
                        </div>
                        <div class="text-[8px] font-mono text-slate-600 tracking-[0.3em] mt-1 text-center">
                            {{ $invoice['id'] }}-VERIFIED-{{ $invoice['auth_code'] }}
                        </div>
                    </div>
                    <p class="text-[10px] text-slate-400 max-w-sm">
                        * Electronic Gym Invoice generated by Gymstick Club Management System. Valid for official tax deductions and employer fitness reimbursement.
                    </p>
                </div>

                <!-- Totals Box -->
                <div class="w-full sm:w-72 bg-[#141a27] p-4 rounded-2xl border border-white/10 space-y-2">
                    <div class="flex justify-between text-slate-400">
                        <span>Subtotal:</span>
                        <span class="font-semibold text-white">{{ $invoice['subtotal'] }}</span>
                    </div>
                    <div class="flex justify-between text-slate-400">
                        <span>Tax & Maintenance (6%):</span>
                        <span class="font-semibold text-white">{{ $invoice['tax'] }}</span>
                    </div>
                    <div class="flex justify-between text-slate-400">
                        <span>Discount Applied:</span>
                        <span class="font-semibold text-emerald-400">$0.00</span>
                    </div>
                    <div class="flex justify-between text-white font-heading text-lg font-black pt-2 border-t border-white/10">
                        <span>TOTAL PAID:</span>
                        <span class="text-gradient-orange">{{ $invoice['amount'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Official Signatory & Footer -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-6 relative z-10 text-xs text-slate-400">
            <div>
                <p class="font-bold text-white mb-0.5">GYMSTICK TRAINING ENTERPRISE</p>
                <p class="text-[11px]">All memberships are non-transferable. 24/7 access granted via biometric RFID pass.</p>
            </div>

            <!-- Authorized Signatory -->
            <div class="text-center sm:text-right">
                <div class="h-10 flex items-center justify-center sm:justify-end">
                    <span class="font-heading text-xl italic text-slate-300 tracking-wider font-light">Alex Cox</span>
                </div>
                <div class="border-t border-white/20 pt-1 text-[10px] uppercase font-bold text-slate-400">
                    Authorized Signatory &bull; Chief Athletic Director
                </div>
            </div>
        </div>
    </div>

    <!-- Small Footer -->
    <div class="text-center text-[10px] text-slate-500 py-6 no-print">
        &copy; 2026 Gymstick Training Club. All rights reserved.
    </div>

    <script>
    function downloadSinglePagePdf() {
        const btn = document.getElementById('btn-download-pdf');
        const btnLabel = document.getElementById('btn-download-pdf-label');
        if (btn) {
            btn.disabled = true;
            btn.classList.add('opacity-75');
            if (btnLabel) btnLabel.textContent = 'Generating PDF (1 Page)...';
        }

        const invoiceElement = document.querySelector('.invoice-page');
        const opt = {
            margin: [4, 4, 4, 4],
            filename: 'Gymstick-Receipt-{{ $invoice['id'] }}.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { 
                scale: 2, 
                useCORS: true, 
                backgroundColor: '#0e121a',
                scrollY: 0
            },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
            pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
        };

        html2pdf().set(opt).from(invoiceElement).save().then(() => {
            if (btn) {
                btn.disabled = false;
                btn.classList.remove('opacity-75');
                if (btnLabel) btnLabel.textContent = 'Download PDF (1 Page)';
            }
        }).catch(err => {
            console.error('html2pdf generation error:', err);
            window.print();
            if (btn) {
                btn.disabled = false;
                btn.classList.remove('opacity-75');
                if (btnLabel) btnLabel.textContent = 'Download PDF (1 Page)';
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('download') === '1') {
            setTimeout(downloadSinglePagePdf, 500);
        } else if (urlParams.get('print') === '1') {
            setTimeout(() => window.print(), 400);
        }
    });
    </script>
</body>
</html>
