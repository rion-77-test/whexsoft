@extends('frontend.layouts.app')

@section('title', 'ব্লগ | WhexSoft')
@section('description', 'ওয়েবসাইট, ই-কমার্স ও অনলাইন ব্যবসা নিয়ে WhexSoft-এর লেখা ও ব্যবহারিক পরামর্শ পড়ুন।')
@section('page', 'blog')

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
    $isFiltered = $search !== '' || $activeCategory !== '';
    $featured = (! $isFiltered && $posts->currentPage() === 1) ? $posts->first() : null;
    $gridPosts = $featured ? $posts->getCollection()->slice(1) : $posts->getCollection();
@endphp

<main class="w-full relative overflow-x-clip">
    <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[850px] h-[450px] bg-primary-container/10 blur-[130px] rounded-full pointer-events-none -z-10"></div>
    <div class="absolute top-[35%] -right-48 w-[600px] h-[500px] bg-tertiary-fixed-dim/5 blur-[150px] rounded-full pointer-events-none -z-10"></div>
    <div class="absolute bottom-20 -left-48 w-[650px] h-[550px] bg-primary-container/5 blur-[160px] rounded-full pointer-events-none -z-10"></div>

    <section class="w-full relative pt-32 md:pt-40 pb-12 md:pb-16">
        <div class="max-w-7xl mx-auto flex flex-col items-center text-center w-full relative px-5 sm:px-8 lg:px-10">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-card-elevated shadow-sm mb-space-md">
                <span class="w-2.5 h-2.5 rounded-full bg-primary-container shadow-[0_0_10px_#C6F432]"></span>
                <span class="font-label-md text-label-md text-primary-container tracking-wider uppercase">ওয়েব ও অনলাইন ব্যবসা</span>
            </div>
            <h1 class="font-display-xl text-display-xl text-primary max-w-4xl tracking-tight mb-space-md">ওয়েবসাইট ও অনলাইন ব্যবসা নিয়ে লেখা</h1>
            <p class="font-body-lg text-body-lg text-text-secondary max-w-2xl leading-relaxed mb-space-xl">ওয়েব ডিজাইন, ই-কমার্স ও ডিজিটাল টুল নিয়ে সহজ ভাষায় লেখা পড়ুন।</p>
            <div class="w-full max-w-4xl flex flex-col gap-space-md items-center">
                <form class="w-full relative" action="{{ route('blog.index') }}" method="GET">
                    @if ($activeCategory !== '')
                        <input name="category" type="hidden" value="{{ $activeCategory }}" />
                    @endif
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-text-muted text-[22px]">search</span>
                    <input class="w-full h-[54px] pl-12 pr-28 rounded-xl bg-surface-default text-text-primary placeholder:text-text-muted font-body-md text-body-md shadow-md focus:outline-none focus:bg-surface-card transition-all" name="q" value="{{ $search }}" placeholder="বিষয় বা কিওয়ার্ড লিখে সার্চ করুন (যেমন: ই-কমার্স, এসইও, স্পিড)..." type="text" />
                    <button class="absolute right-2 top-1/2 -translate-y-1/2 h-10 px-5 rounded-lg bg-primary-container text-text-inverse font-label-md text-label-md font-bold hover:bg-primary-fixed-dim transition-colors" type="submit">সার্চ</button>
                </form>
                <div class="flex flex-wrap items-center justify-center gap-2 pt-space-xs">
                    <a class="px-5 py-2 rounded-full font-label-lg text-label-lg transition-all {{ $activeCategory === '' ? 'bg-primary-container text-text-inverse shadow-md' : 'bg-surface-card text-text-secondary hover:text-text-primary hover:bg-surface-card-elevated' }}" href="{{ route('blog.index', array_filter(['q' => $search])) }}">সকল আর্টিকেল</a>
                    @foreach ($categories as $category)
                        <a class="px-5 py-2 rounded-full font-label-lg text-label-lg transition-all {{ $activeCategory === $category->name ? 'bg-primary-container text-text-inverse shadow-md' : 'bg-surface-card text-text-secondary hover:text-text-primary hover:bg-surface-card-elevated' }}" href="{{ route('blog.index', array_filter(['category' => $category->name, 'q' => $search])) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
                @if ($isFiltered)
                    <p class="text-xs text-text-muted">
                        @if ($search !== '') «{{ $search }}» @endif
                        @if ($activeCategory !== '') ক্যাটাগরি: {{ $activeCategory }} @endif
                        — {{ $posts->total() }}টি আর্টিকেল পাওয়া গেছে।
                        <a class="text-primary-container hover:underline ml-1" href="{{ route('blog.index') }}">ফিল্টার মুছুন</a>
                    </p>
                @endif
            </div>
        </div>
    </section>

    @if ($featured)
        <section class="w-full relative py-8 md:py-12">
            <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
                <div class="relative rounded-2xl bg-surface-card overflow-hidden shadow-xl group hover:shadow-2xl transition-all duration-300">
                    <div class="grid grid-cols-1 lg:grid-cols-12 items-stretch">
                        <div class="lg:col-span-7 p-space-lg lg:p-space-2xl flex flex-col justify-between z-10">
                            <div>
                                <div class="flex flex-wrap items-center gap-2.5 mb-space-md">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-primary-container text-text-inverse font-label-md text-label-md font-bold uppercase tracking-wider">
                                        <span class="material-symbols-outlined text-[15px]">article</span> নির্বাচিত লেখা
                                    </span>
                                    @if ($featured->category)
                                        <span class="px-3 py-1 rounded-md bg-surface-card-elevated text-primary-container font-label-md text-label-md">{{ $featured->category }}</span>
                                    @endif
                                </div>
                                <a class="block group-hover:text-primary-container transition-colors" href="{{ route('blog.show', $featured) }}">
                                    <h2 class="font-headline-lg text-headline-lg text-primary tracking-tight mb-space-md leading-tight">{{ $featured->title }}</h2>
                                </a>
                                <p class="font-body-lg text-body-lg text-text-secondary leading-relaxed mb-space-lg">{{ \Illuminate\Support\Str::limit($featured->excerpt ?: strip_tags((string) $featured->content), 240) }}</p>
                            </div>
                            <div class="pt-space-md flex flex-wrap items-center justify-between gap-space-md">
                                <div class="flex items-center gap-space-md">
                                    <div class="w-10 h-10 rounded-full bg-surface-card-elevated flex items-center justify-center text-primary-container font-title-md text-title-md">W</div>
                                    <div class="flex flex-col">
                                        <span class="font-title-md text-title-md text-text-primary leading-tight">WhexSoft টেক টিম</span>
                                        <span class="font-caption text-caption text-text-muted">{{ optional($featured->published_at)->format('d M Y') ?: 'ড্রাফট' }} • {{ $featured->read_time }} মিনিট পাঠ সময়</span>
                                    </div>
                                </div>
                                <a class="inline-flex items-center gap-2 h-11 px-space-lg rounded-xl bg-primary-container text-text-inverse font-label-lg text-label-lg font-bold hover:bg-primary-fixed-dim transition-all shadow-md group/btn" href="{{ route('blog.show', $featured) }}">
                                    <span>পুরো আর্টিকেল পড়ুন</span>
                                    <span class="material-symbols-outlined text-[18px] group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                        <div class="lg:col-span-5 relative bg-surface-card-elevated flex items-center justify-center p-space-lg overflow-hidden min-h-[340px]">
                            <div class="absolute inset-0 bg-gradient-to-t from-surface-card/90 via-transparent to-transparent z-10 lg:hidden"></div>
                            <a class="relative w-full h-full rounded-xl overflow-hidden shadow-lg group-hover:scale-[1.02] transition-transform duration-500 block" href="{{ route('blog.show', $featured) }}">
                                <img alt="{{ $featured->title }}" class="w-full h-full min-h-[300px] object-cover" src="{{ $featured->getFirstMediaUrl('featured-image') ?: ($featured->featured_image ?: $blogImages[0]) }}" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-xl">
                <div>
                    <span class="font-label-md text-label-md text-primary-container uppercase tracking-wider">লেখাগুলো দেখুন</span>
                    <h2 class="font-headline-md text-headline-md text-primary tracking-tight mt-1">{{ $isFiltered ? 'আপনার খোঁজার ফলাফল' : 'সাম্প্রতিক লেখা' }}</h2>
                </div>
                <p class="font-body-sm text-body-sm text-text-secondary max-w-md">ওয়েবসাইট ও অনলাইন ব্যবসার কাজে লাগতে পারে—এমন ধারণা ও অভিজ্ঞতা ভাগ করে নিই।</p>
            </div>

            @if ($gridPosts->isEmpty())
                <div class="rounded-2xl bg-surface-card p-10 text-center text-text-secondary">কোনো আর্টিকেল পাওয়া যায়নি। অন্য কীওয়ার্ড বা ক্যাটাগরি চেষ্টা করুন।</div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                    @foreach ($gridPosts as $post)
                        @php
                            $image = $post->getFirstMediaUrl('featured-image') ?: ($post->featured_image ?: $blogImages[($loop->index + 1) % count($blogImages)]);
                        @endphp
                        <article class="flex flex-col bg-surface-card rounded-2xl overflow-hidden shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                            <div class="relative w-full aspect-[16/10] bg-surface-default overflow-hidden">
                                <a href="{{ route('blog.show', $post) }}">
                                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $post->title }}" src="{{ $image }}" />
                                </a>
                                @if ($post->category)
                                    <div class="absolute top-4 left-4 z-10">
                                        <span class="px-3 py-1 rounded-full bg-surface-card-elevated/90 backdrop-blur-md text-primary-container font-label-md text-label-md shadow-sm">{{ $post->category }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-space-lg flex flex-col flex-1 justify-between">
                                <div>
                                    <a class="block group-hover:text-primary-container transition-colors" href="{{ route('blog.show', $post) }}">
                                        <h3 class="font-headline-sm text-headline-sm text-primary tracking-tight mb-space-xs leading-snug">{{ $post->title }}</h3>
                                    </a>
                                    <p class="font-body-sm text-body-sm text-text-secondary leading-relaxed mb-space-md">{{ \Illuminate\Support\Str::limit($post->excerpt ?: strip_tags((string) $post->content), 150) }}</p>
                                </div>
                                <div class="pt-space-sm flex items-center justify-between font-caption text-caption text-text-muted">
                                    <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">schedule</span> {{ $post->read_time }} মিনিট রিড</span>
                                    <span>{{ optional($post->published_at)->format('d M Y') }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{ $posts->links('frontend.partials.pagination') }}
            @endif
        </div>
    </section>

    <section class="w-full relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto w-full relative px-5 sm:px-8 lg:px-10">
            <div class="bg-gradient-to-r from-surface-card-elevated via-surface-card to-surface-card-elevated p-8 lg:p-12 rounded-3xl shadow-2xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="absolute -left-16 -top-16 w-60 h-60 bg-primary-fixed/10 blur-[80px] pointer-events-none rounded-full"></div>
                <div class="flex flex-col gap-2 max-w-xl text-center md:text-left relative">
                    <span class="font-label-md text-primary-fixed uppercase tracking-wider">ফ্রি গাইডলাইন</span>
                    <h3 class="font-headline-md text-text-primary">আপনার ব্যবসার জন্য কোন ওয়েবসাইটটি সঠিক, জানতে চান?</h3>
                    <p class="font-body-sm text-text-secondary">আমাদের টিমের সাথে সরাসরি কথা বলুন। আপনার প্রয়োজন বুঝে সঠিক সমাধান ও বাজেট জানিয়ে দেব।</p>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-4 shrink-0 w-full sm:w-auto relative">
                    <a class="w-full sm:w-auto px-8 py-4 bg-primary-fixed text-text-inverse font-headline-sm font-bold rounded-xl shadow-[0_0_25px_rgba(197,243,49,0.3)] hover:bg-primary-fixed-dim hover:scale-105 active:scale-95 transition-all text-center flex items-center justify-center gap-2" href="{{ route('contact') }}">
                        <span class="material-symbols-outlined text-[20px]">calculate</span>
                        <span>ফ্রি কোটেশন</span>
                    </a>
                    <a class="w-full sm:w-auto px-6 py-4 bg-surface-card-elevated text-text-primary font-headline-sm font-semibold rounded-xl hover:bg-surface-container-high transition-all text-center flex items-center justify-center gap-2" href="https://wa.me/8801335198859" rel="noopener noreferrer" target="_blank">
                        <span class="material-symbols-outlined text-[20px] text-success-whatsapp">chat</span>
                        <span>হোয়াটসঅ্যাপে কথা বলুন</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
