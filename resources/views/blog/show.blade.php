@extends('layouts.app', ['title' => $post['title'] . ' — Gymstick Insights'])

@section('content')
<article class="py-12 lg:py-20 bg-[#080a0f] text-slate-300 min-h-screen select-none relative overflow-hidden">
    <!-- Giant Subtle Outline Watermark -->
    <div class="bg-watermark top-24 left-1/2 -translate-x-1/2 text-[15vw] leading-none whitespace-nowrap opacity-20">
        INSIGHTS
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb & Back Link -->
        <div class="flex items-center justify-between mb-8 text-xs text-slate-400">
            <a href="{{ route('home') }}#blog" class="inline-flex items-center gap-2 text-[#ff9e58] hover:text-[#ff5e14] transition-colors font-bold uppercase tracking-wider">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back to All Articles</span>
            </a>
            <div class="flex items-center gap-2">
                <a href="{{ route('home') }}" class="hover:text-white">Home</a>
                <span>/</span>
                <a href="{{ route('home') }}#blog" class="hover:text-white">Insights</a>
                <span>/</span>
                <span class="text-slate-500 truncate max-w-[180px] sm:max-w-xs">{{ $post['category'] }}</span>
            </div>
        </div>

        <!-- Header -->
        <header class="mb-10">
            <div class="flex flex-wrap items-center gap-3 mb-4">
                <span class="px-3 py-1 rounded-full text-white font-extrabold uppercase text-[11px] tracking-wider shadow-sm" style="background-color: {{ $post['badge_color'] }};">
                    {{ $post['category'] }}
                </span>
                <span class="text-xs text-slate-400 flex items-center gap-1.5">
                    <i class="fa-regular fa-calendar text-[#ff5e14]"></i>
                    {{ $post['date'] }}
                </span>
                <span class="text-slate-600">•</span>
                <span class="text-xs text-slate-400 flex items-center gap-1.5">
                    <i class="fa-regular fa-clock text-[#ff5e14]"></i>
                    {{ $post['read_time'] }}
                </span>
            </div>

            <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight mb-6 uppercase tracking-tight">
                {{ $post['title'] }}
            </h1>

            <!-- Author Box -->
            <div class="flex items-center gap-3 py-4 border-y border-white/10">
                <img 
                    src="{{ asset($post['author']['image']) }}" 
                    alt="{{ $post['author']['name'] }}" 
                    class="w-12 h-12 rounded-full object-cover object-top border-2 border-[#ff5e14]"
                >
                <div>
                    <h4 class="font-bold text-white text-sm">{{ $post['author']['name'] }}</h4>
                    <p class="text-xs text-slate-400">{{ $post['author']['role'] }}</p>
                </div>
            </div>
        </header>

        <!-- Main Featured Image -->
        <div class="rounded-3xl overflow-hidden border border-white/10 mb-10 shadow-2xl relative bg-[#0e121a]">
            <img 
                src="{{ asset($post['image']) }}" 
                alt="{{ $post['title'] }}" 
                class="w-full h-[320px] sm:h-[460px] object-cover object-center"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
        </div>

        <!-- Article Summary Lead -->
        <div class="p-6 rounded-2xl bg-[#0e121a] border-l-4 border-[#ff5e14] mb-10 text-base sm:text-lg text-slate-200 leading-relaxed font-medium card-vibrant">
            {{ $post['summary'] }}
        </div>

        <!-- Body Content Sections -->
        <div class="space-y-8 text-sm sm:text-base leading-relaxed text-slate-300">
            @foreach ($post['sections'] as $section)
                <div class="space-y-4">
                    <h2 class="font-heading text-2xl sm:text-3xl font-black text-white tracking-wide uppercase pt-2">
                        {{ $section['heading'] }}
                    </h2>
                    @foreach ($section['paragraphs'] as $para)
                        <p class="leading-relaxed text-slate-300">
                            {{ $para }}
                        </p>
                    @endforeach
                </div>
            @endforeach
        </div>

        <!-- Key Takeaways Highlight Box -->
        @if (isset($post['key_takeaways']) && count($post['key_takeaways']))
            <div class="mt-12 p-6 sm:p-8 rounded-3xl bg-gradient-to-br from-[#181a24] to-[#0e121a] border border-[#ff5e14]/30 shadow-xl card-vibrant">
                <div class="flex items-center gap-2.5 mb-4 text-[#ff5e14]">
                    <i class="fa-solid fa-bolt-lightning text-lg"></i>
                    <h3 class="font-heading text-xl font-black text-white uppercase tracking-wider">Coach's Key Takeaways</h3>
                </div>
                <ul class="space-y-3 text-xs sm:text-sm text-slate-200">
                    @foreach ($post['key_takeaways'] as $takeaway)
                        <li class="flex items-start gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#ff5e14]/20 text-[#ff5e14] flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">✓</span>
                            <span>{{ $takeaway }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Share & Actions -->
        <div class="mt-12 pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
            <span class="text-xs uppercase tracking-wider text-slate-400 font-bold">Share this article:</span>
            <div class="flex items-center gap-3">
                <button type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Article URL copied to clipboard!');" class="px-4 py-2 rounded-xl bg-white/5 hover:btn-glow-orange text-xs font-semibold text-slate-300 hover:text-white transition-all border border-white/10 flex items-center gap-2 cursor-pointer">
                    <i class="fa-regular fa-clone"></i>
                    <span>Copy Link</span>
                </button>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($post['title']) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="w-9 h-9 rounded-xl bg-white/5 hover:bg-[#ff5e14] hover:text-white text-slate-300 flex items-center justify-center text-sm transition-all border border-white/10">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-9 h-9 rounded-xl bg-white/5 hover:bg-[#ff5e14] hover:text-white text-slate-300 flex items-center justify-center text-sm transition-all border border-white/10">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
            </div>
        </div>

        <!-- Related Articles -->
        @if (isset($related) && count($related))
            <div class="mt-16 pt-12 border-t border-white/10">
                <h3 class="font-heading text-2xl font-black text-white mb-6 uppercase tracking-wider">
                    Recommended Insights
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($related as $rel)
                        <article class="card-vibrant rounded-2xl overflow-hidden group hover:border-[#ff5e14]/50 transition-all flex flex-col justify-between">
                            <div class="h-44 overflow-hidden relative">
                                <img src="{{ asset($rel['image']) }}" alt="{{ $rel['title'] }}" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase text-white shadow-sm" style="background-color: {{ $rel['badge_color'] }};">
                                    {{ $rel['category'] }}
                                </span>
                            </div>
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <h4 class="font-heading text-lg font-bold text-white group-hover:text-[#ff5e14] transition-colors mb-3">
                                    <a href="{{ route('blog.show', $rel['slug']) }}">{{ $rel['title'] }}</a>
                                </h4>
                                <a href="{{ route('blog.show', $rel['slug']) }}" class="text-xs text-[#ff9e58] font-bold inline-flex items-center gap-1.5 hover:underline">
                                    <span>Read Article</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</article>
@endsection
