@extends('frontend.layouts.app')

@section('title', $post->meta_title ?: $post->title.' | WhexSoft ব্লগ')
@section('description', $post->meta_description ?: ($post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags((string) $post->content), 160)))
@section('page', 'blog')
@section('og_image', $post->getFirstMediaUrl('featured-image') ?: ($post->featured_image ?: asset('assets/frontend/images/blog-featured.jpg')))

@push('scripts')
    <script src="{{ asset('assets/frontend/js/blog-post.js') }}" defer></script>
@endpush

@section('content')
@php
    $blogImages = [
        asset('assets/frontend/images/blog-featured.jpg'),
        asset('assets/frontend/images/blog-1.jpg'),
        asset('assets/frontend/images/blog-2.jpg'),
        asset('assets/frontend/images/blog-3.jpg'),
        asset('assets/frontend/images/blog-4.jpg'),
        asset('assets/frontend/images/blog-5.jpg'),
        asset('assets/frontend/images/blog-6.jpg'),
        asset('assets/frontend/images/blog-cost.jpg'),
        asset('assets/frontend/images/blog-comparison.jpg'),
        asset('assets/frontend/images/blog-speed.jpg'),
    ];

    $content = (string) $post->content;
    $toc = [];
    if (preg_match_all('/<h2\b[^>]*>(.*?)<\/h2>/is', $content, $matches)) {
        foreach ($matches[1] as $index => $heading) {
            $toc[] = ['id' => 'section-'.($index + 1), 'title' => trim(strip_tags($heading))];
        }
        $counter = 0;
        $content = preg_replace_callback('/<h2\b[^>]*>(.*?)<\/h2>/is', function ($match) use (&$counter) {
            $counter++;
            return '<h2 id="section-'.$counter.'" class="scroll-mt-28">'.$match[1].'</h2>';
        }, $content);
    }
    $heroImage = $post->getFirstMediaUrl('featured-image') ?: ($post->featured_image ?: $blogImages[0]);
@endphp

<main class="w-full relative overflow-x-clip">
    <div class="fixed top-20 left-0 w-full h-[3px] bg-surface-container z-40">
        <div class="h-full bg-primary-container transition-all duration-150 w-0" id="readProgress"></div>
    </div>

    <section class="relative w-full overflow-hidden bg-canvas-base pt-32 md:pt-40 pb-12 md:pb-16">
        <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[700px] h-[500px] bg-primary-container/10 blur-[130px] rounded-full pointer-events-none -z-10"></div>
        <div class="absolute top-1/3 -right-32 w-[420px] h-[420px] bg-primary-fixed-dim/5 blur-[120px] rounded-full pointer-events-none -z-10"></div>
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <nav class="flex flex-wrap items-center gap-2 font-label-md text-label-md text-text-muted mb-space-md">
                <a class="hover:text-primary-container transition-colors" href="{{ route('home') }}">হোম</a>
                <span class="text-text-muted/60">/</span>
                <a class="hover:text-primary-container transition-colors" href="{{ route('blog.index') }}">ব্লগ</a>
                <span class="text-text-muted/60">/</span>
                <span class="text-primary-container font-semibold">{{ $post->category ?: 'আর্টিকেল' }}</span>
            </nav>
            <div class="flex flex-wrap items-center gap-space-sm mb-space-md">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-container/15 text-primary-container font-label-md text-label-md tracking-wider">
                    <span class="material-symbols-outlined text-[16px]">article</span> আর্টিকেল
                </span>
                @if ($post->category)
                    <span class="px-2.5 py-1 rounded-full bg-surface-card text-text-secondary font-label-md text-label-md">{{ $post->category }}</span>
                @endif
                <span class="text-text-muted text-caption font-caption hidden sm:inline-block">•</span>
                <span class="text-text-muted font-caption text-caption flex items-center gap-1">
                    <span class="material-symbols-outlined text-[15px]">schedule</span> পড়ার সময়: {{ $post->read_time }} মিনিট
                </span>
            </div>
            <h1 class="font-display-xl text-display-xl text-primary max-w-5xl tracking-tight mb-space-md leading-[1.15]">{{ $post->title }}</h1>
            @if ($post->excerpt)
                <p class="font-body-lg text-body-lg text-text-secondary max-w-4xl leading-relaxed mb-space-lg">{{ $post->excerpt }}</p>
            @endif
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-md py-space-md bg-surface-card/60 backdrop-blur-md px-space-md rounded-xl shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="relative w-11 h-11 rounded-full overflow-hidden bg-primary-container/20 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary-container text-[24px]">terminal</span>
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-success-whatsapp rounded-full ring-2 ring-surface-card"></div>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-title-md text-title-md text-primary leading-tight">WhexSoft টেক ও বিজনেস টিম</span>
                        </div>
                        <p class="font-caption text-caption text-text-muted mt-0.5">প্রকাশিত: {{ optional($post->published_at)->format('d M Y') ?: '—' }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <button class="h-9 px-3 rounded-lg bg-surface-container-high hover:bg-surface-bright text-text-primary font-label-md text-label-md flex items-center gap-1.5 transition-all shadow-sm" type="button" onclick="shareOnFB()">
                        <span class="material-symbols-outlined text-[17px] text-[#1877F2]">share</span>
                        <span class="hidden md:inline">ফেসবুক</span>
                    </button>
                    <a class="h-9 px-3 rounded-lg bg-surface-container-high hover:bg-surface-bright text-text-primary font-label-md text-label-md flex items-center gap-1.5 transition-all shadow-sm" href="https://wa.me/?text={{ urlencode($post->title.' — '.request()->url()) }}" rel="noopener noreferrer" target="_blank">
                        <span class="material-symbols-outlined text-[17px] text-success-whatsapp">chat</span>
                        <span class="hidden md:inline">হোয়াটসঅ্যাপ</span>
                    </a>
                    <button class="h-9 px-3 rounded-lg bg-surface-container-high hover:bg-surface-bright text-text-primary font-label-md text-label-md flex items-center gap-1.5 transition-all shadow-sm" id="copyBtn" type="button" onclick="copyArticleUrl()">
                        <span class="material-symbols-outlined text-[17px] text-primary-container">link</span>
                        <span id="copyText">লিঙ্ক কপি</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full bg-canvas-base relative py-8 md:py-12">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="relative w-full rounded-2xl overflow-hidden shadow-2xl bg-surface-card">
                <div class="absolute inset-0 bg-gradient-to-t from-canvas-base via-transparent to-transparent z-10"></div>
                <img class="w-full h-[280px] md:h-[440px] lg:h-[500px] object-cover object-center" alt="{{ $post->title }}" src="{{ $heroImage }}" />
            </div>
        </div>
    </section>

    <section class="w-full bg-canvas-base relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                <article class="lg:col-span-8 flex flex-col space-y-space-xl">
                    <div class="rounded-2xl bg-surface-card/90 shadow-xl p-space-lg relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-2 h-full bg-primary-container"></div>
                        <div class="flex items-center gap-2.5 mb-space-sm">
                            <span class="material-symbols-outlined text-primary-container text-[24px]">lightbulb</span>
                            <h2 class="font-headline-sm text-headline-sm text-primary">এক নজরে</h2>
                        </div>
                        <p class="font-body-md text-body-md text-text-secondary leading-relaxed">{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($content), 220) }}</p>
                    </div>

                    <div class="article-content text-text-secondary leading-relaxed space-y-5 [&_h2]:font-headline-md [&_h2]:text-headline-md [&_h2]:text-primary [&_h2]:font-bold [&_h2]:mt-10 [&_h2]:mb-3 [&_h3]:font-headline-sm [&_h3]:text-headline-sm [&_h3]:text-primary [&_h3]:font-semibold [&_h3]:mt-8 [&_h3]:mb-2 [&_p]:font-body-md [&_p]:text-body-md [&_p]:leading-relaxed [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:space-y-2 [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:space-y-2 [&_a]:text-primary-container [&_a]:underline [&_blockquote]:border-l-2 [&_blockquote]:border-primary-container [&_blockquote]:pl-4 [&_blockquote]:italic [&_img]:rounded-xl [&_img]:my-6">
                        @if (filled($content))
                            {!! $content !!}
                        @else
                            <p>এই আর্টিকেলের বিস্তারিত অংশ এখনো যোগ করা হয়নি।</p>
                        @endif
                    </div>

                    <div class="p-space-lg rounded-2xl bg-surface-card/70 backdrop-blur-md shadow-md space-y-space-sm">
                        <h3 class="font-headline-sm text-headline-sm text-primary flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary-container">format_quote</span> শেষ কথা
                        </h3>
                        <p class="font-body-md text-body-md text-text-secondary leading-relaxed">আপনার প্রজেক্ট নিয়ে প্রশ্ন থাকলে যোগাযোগ করুন। কাজের পরিধি ও সম্ভাব্য খরচ নিয়ে কথা বলতে পারি।</p>
                        <div class="pt-space-xs flex flex-wrap items-center justify-between gap-space-sm">
                            <span class="font-label-md text-label-md text-primary-container">প্রজেক্ট নিয়ে কথা বলতে চান?</span>
                            <a class="inline-flex items-center gap-2 font-label-md text-label-md text-primary hover:text-primary-container transition-colors" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                                <span>মেসেজ দিন সরাসরি</span>
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-2 pt-space-xs">
                        <span class="font-label-md text-label-md text-text-muted">ট্যাগসমূহ:</span>
                        @if ($post->category)
                            <a class="px-3 py-1 rounded-full bg-surface-card text-text-secondary font-label-md text-label-md hover:bg-surface-card-elevated hover:text-primary-container transition-colors" href="{{ route('blog.index', ['category' => $post->category]) }}">#{{ $post->category }}</a>
                        @endif
                    </div>
                </article>

                <aside class="lg:col-span-4 space-y-space-lg">
                    <div class="sticky top-28 space-y-space-lg">
                        @if (! empty($toc))
                            <div class="p-space-lg rounded-2xl bg-surface-card shadow-xl space-y-space-md">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-title-md text-title-md text-primary flex items-center gap-2">
                                        <span class="material-symbols-outlined text-primary-container text-[20px]">menu_book</span> আর্টিকেলের সূচিপত্র
                                    </h3>
                                    <span class="text-caption font-caption text-text-muted">{{ count($toc) }}টি অধ্যায়</span>
                                </div>
                                <ul class="space-y-space-sm font-body-sm text-body-sm text-text-secondary">
                                    @foreach ($toc as $item)
                                        <li>
                                            <a class="toc-link group flex items-start gap-2.5 hover:text-primary-container transition-colors" href="#{{ $item['id'] }}">
                                                <span class="font-label-md text-label-md text-primary-container/80 mt-0.5">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                                <span class="leading-snug">{{ $item['title'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="relative p-space-lg rounded-2xl bg-gradient-to-b from-surface-card-elevated to-surface-card shadow-2xl overflow-hidden">
                            <div class="absolute -top-12 -right-12 w-32 h-32 bg-primary-container/20 rounded-full blur-2xl"></div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-primary-container animate-pulse"></span>
                                <span class="font-label-md text-label-md text-primary-container font-semibold uppercase tracking-wider">আপনার প্রজেক্ট</span>
                            </div>
                            <h3 class="font-headline-sm text-headline-sm text-primary mb-2">আপনার ব্যবসার জন্য এমন ওয়েবসাইট চান?</h3>
                            <p class="font-body-sm text-body-sm text-text-secondary mb-space-md leading-relaxed">ওয়েবসাইট বা অনলাইন স্টোর নিয়ে আপনার প্রয়োজন জানালে কাজের পরিধি অনুযায়ী প্রস্তাব দেব।</p>
                            <div class="space-y-space-xs">
                                <a class="w-full h-12 rounded-xl bg-primary-container text-text-inverse font-label-lg text-label-lg font-bold flex items-center justify-center gap-2 hover:bg-primary-fixed-dim transition-all shadow-[0_0_20px_rgba(198,244,50,0.3)]" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                                    <span class="material-symbols-outlined text-[20px]">chat</span>
                                    <span>কথা বলুন ০১৩৩৫-১৯৮৮৫৯</span>
                                </a>
                                <a class="w-full h-11 rounded-xl bg-surface-container-high hover:bg-surface-bright text-text-primary font-label-md text-label-md flex items-center justify-center gap-2 transition-colors" href="{{ route('contact') }}">
                                    <span class="material-symbols-outlined text-[18px] text-primary-container">calculate</span>
                                    <span>ফ্রি কোটেশন নিন</span>
                                </a>
                            </div>
                        </div>

                        @if ($recentPosts->isNotEmpty())
                            <div class="p-space-lg rounded-2xl bg-surface-card shadow-xl space-y-space-md">
                                <h3 class="font-title-md text-title-md text-primary flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary-container text-[20px]">local_fire_department</span> জনপ্রিয় গাইডসমূহ
                                </h3>
                                <div class="space-y-space-md">
                                    @foreach ($recentPosts as $recent)
                                        @php
                                            $recentImage = $recent->getFirstMediaUrl('featured-image') ?: ($recent->featured_image ?: $blogImages[($loop->index + 1) % count($blogImages)]);
                                        @endphp
                                        <a class="group flex gap-3 items-center" href="{{ route('blog.show', $recent) }}">
                                            <div class="w-16 h-16 rounded-xl overflow-hidden bg-surface-default shrink-0">
                                                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" alt="{{ $recent->title }}" src="{{ $recentImage }}" />
                                            </div>
                                            <div>
                                                <span class="text-caption font-caption text-primary-container block">{{ $recent->category ?: 'ব্লগ' }}</span>
                                                <h4 class="font-body-sm text-body-sm text-text-primary group-hover:text-primary-container transition-colors line-clamp-2 font-medium">{{ $recent->title }}</h4>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="p-space-md rounded-xl bg-surface-default text-text-secondary font-body-sm text-body-sm space-y-2">
                            <div class="flex items-center gap-2 text-primary font-medium">
                                <span class="material-symbols-outlined text-primary-container text-[18px]">support_agent</span>
                                <span>সরাসরি অফিস ভিজিট করুন:</span>
                            </div>
                            <p class="font-caption text-caption text-text-muted leading-relaxed">সোনির আখড়া, যাত্রাবাড়ী, ঢাকা-১২৩৬।<br />শনিবার থেকে বৃহস্পতিবার, সকাল ১০টা - রাত ৮টা।</p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    @if ($relatedPosts->isNotEmpty())
        <section class="w-full bg-surface-default relative py-16 md:py-24">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-space-sm mb-space-xl">
                    <div>
                        <span class="font-label-md text-label-md text-primary-container uppercase tracking-wider block mb-1">পরবর্তী পাঠ</span>
                        <h2 class="font-headline-lg text-headline-lg text-primary tracking-tight">সম্পর্কিত প্রয়োজনীয় আর্টিকেলসমূহ</h2>
                    </div>
                    <a class="inline-flex items-center gap-1.5 font-label-lg text-label-lg text-primary-container hover:underline" href="{{ route('blog.index') }}">
                        <span>সব ব্লগ দেখুন</span>
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                    @foreach ($relatedPosts as $related)
                        @php
                            $relatedImage = $related->getFirstMediaUrl('featured-image') ?: ($related->featured_image ?: $blogImages[($loop->index + 2) % count($blogImages)]);
                        @endphp
                        <article class="rounded-2xl bg-surface-card overflow-hidden shadow-lg group hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                            <a class="block relative aspect-[16/10] overflow-hidden" href="{{ route('blog.show', $related) }}">
                                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $related->title }}" src="{{ $relatedImage }}" />
                                @if ($related->category)
                                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-card-elevated/90 backdrop-blur-md text-primary-container text-xs">{{ $related->category }}</span>
                                @endif
                            </a>
                            <div class="p-space-lg">
                                <a class="block group-hover:text-primary-container transition-colors" href="{{ route('blog.show', $related) }}">
                                    <h3 class="font-headline-sm text-headline-sm text-primary tracking-tight leading-snug">{{ $related->title }}</h3>
                                </a>
                                <p class="font-body-sm text-body-sm text-text-secondary mt-2 leading-relaxed">{{ \Illuminate\Support\Str::limit($related->excerpt ?: strip_tags((string) $related->content), 120) }}</p>
                                <div class="mt-4 flex items-center justify-between font-caption text-caption text-text-muted">
                                    <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">schedule</span> {{ $related->read_time }} মিনিট</span>
                                    <span>{{ optional($related->published_at)->format('d M Y') }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</main>
@endsection
