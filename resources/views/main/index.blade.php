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
                                <a href="#"><img src="{{ 'storage/' . $post->preview_image }}" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">{{ $post->category->title}}</span> <span
                                        class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2><a href="single-post.html">{{ $post->title }}</a></h2>
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
                                    <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">{{ $post->content }}</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
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

                                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span>
                                            <span>Jul 5th '22</span></div>
                                        <h2 class="mb-2"><a href="single-post.html">{{ $post->title }}</a></h2>
                                        <span class="author mb-3 d-block"></span>
                                        <p class="mb-4 d-block">{{ $post->content }}</p>

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
