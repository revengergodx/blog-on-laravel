@extends('layouts.main')
@section('content')
    <main id="main">

        <!-- ======= Post Grid Section ======= -->
        <section id="posts" class="posts">
            <div class="container" data-aos="fade-up">
                <div class="row col-12">
                    @foreach($posts as $post)
                        <div class="col-md-4">
                            <div class="post-entry-1">
                                <a href="{{ route('post.show', $post->id) }}"><img
                                        src="{{ asset('storage/' . $post->preview_image )}}" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">{{ $post->category->title}}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>{{ $post->postDateAsCarbon->translatedFormat('F') }} {{ $post->postDateAsCarbon->day }}, {{ $post->postDateAsCarbon->year }} - {{ $post->postDateAsCarbon->format('H:i') }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h2><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                                    @auth()
                                    <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                                        @csrf
                                        <span>{{ $post->liked_users_count }}</span>
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fa{{auth()->user()->likedPosts->contains($post->id) ? 's' : 'r'}} fa-heart"></i>
                                        </button>
                                    </form>
                                    @endauth
                                    @guest()
                                        <div>
                                            <span>{{ $post->liked_users_count }}</span>
                                            <i class="far fa-heart"></i>
                                        </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="mx-auto">
                        {{ $posts->links() }}
                    </div>
                </div> <!-- End .row -->
            </div>
        </section> <!-- End Post Grid Section -->
        <!-- ======= Business Category Section ======= -->
        <section class="category-section">
            <div class="container" data-aos="fade-up">

                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <h2>Випадкові пости</h2>
                </div>

                <div class="row">
                    @foreach($randomPosts as $post)
                        <div class="col-md-3">
                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta"><span class="date">{{ $post->category->title }}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>{{ $post->postDateAsCarbon->translatedFormat('F') }} {{ $post->postDateAsCarbon->day }}, {{ $post->postDateAsCarbon->year }} - {{ $post->postDateAsCarbon->format('H:i') }}</span></div>
                                <h2 class="mb-2"><a href="{{ route('post.show', $post->id) }}">{{ $post->content }}</a>
                                </h2>
                                @auth()
                                    <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                                        @csrf
                                        <span>{{ $post->liked_users_count }}</span>
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fa{{auth()->user()->likedPosts->contains($post->id) ? 's' : 'r'}} fa-heart"></i>

                                        </button>
                                    </form>
                                @endauth
                                @guest()
                                    <div>
                                        <span>{{ $post->liked_users_count }}</span>
                                        <i class="far fa-heart"></i>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Business Category Section -->

        <section class="category-section">
            <div class="container" data-aos="fade-up">

                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <h2>Популярні пости</h2>
                </div>

                <div class="row">
                    <div class="col-md-9 order-md-2">
                        <div class="row">
                            @foreach($likedPosts as $post)
                                <div class="col-lg-4">
                                    <div class="post-entry-1 border-bottom">

                                        <div class="post-meta"><span class="date">{{ $post->category->title }}</span> <span class="mx-1">&bullet;</span>
                                            <span>{{ $post->postDateAsCarbon->translatedFormat('F') }} {{ $post->postDateAsCarbon->day }}, {{ $post->postDateAsCarbon->year }} - {{ $post->postDateAsCarbon->format('H:i') }}</span></div>
                                        <h2 class="mb-2"><a
                                                href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                                        <span class="author mb-3 d-block"></span>
                                        <p class="mb-4 d-block">{{ $post->content }}</p>
                                        @auth()
                                            <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                                                @csrf
                                                <span>{{ $post->liked_users_count }}</span>
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fa{{auth()->user()->likedPosts->contains($post->id) ? 's' : 'r'}} fa-heart"></i>

                                                </button>
                                            </form>
                                        @endauth
                                        @guest()
                                            <div>
                                                <span>{{ $post->liked_users_count }}</span>
                                                <i class="far fa-heart"></i>
                                            </div>
                                        @endguest
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Business Category Section -->
    </main><!-- End #main -->

@endsection
