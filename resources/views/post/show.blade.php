@extends('layouts.main')
@section('content')
    <main id="main">

        <section class="single-post-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 post-content" data-aos="fade-up">

                        <!-- ======= Single Post Content ======= -->
                        <div class="single-post">
                            <div class="post-meta"><span class="date">{{ $post->category->title }}</span> <span
                                    class="mx-1">&bullet;</span>
                                <span>{{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }} - {{ $date->format('H:i') }} - {{ $post->comments->count() }} Коментарів</span>
                            </div>
                            <h1 class="mb-2">{{ $post->title }}</h1>
                            <div class="text-center col-10 mb-4 align-content-center">
                                <img src="{{ asset('storage/' . $post->main_image) }}" alt="" class="img-fluid w-50">
                            </div>
                            <p>{{ $post->content }}</p>
                            <div class="text-center col-12">
                                <img src="{{ asset('storage/' . $post->main_image) }}" alt="" class="img-fluid">
                            </div>
                        </div><!-- End Single Post Content -->

                        <div class="row mt-3 ">
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
                        <!-- ======= Comments ======= -->
                        <div class="comments">
                            <h5 class="comment-title py-4">Коментарі ({{ $post->comments->count() }})</h5>
                            <div class="comment d-flex mb-4">
                                <div class="flex-grow-1 ms-2 ms-sm-3">
                                    @foreach($post->comments as $comment)
                                        <div class="comment-meta d-flex align-items-baseline">
                                            <h6 class="me-2">{{ $comment->user->name }}</h6>
                                            <span
                                                class="text-muted">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                        </div>
                                        <div class="comment-body">
                                            {{ $comment->message }}
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div><!-- End Comments -->

                        @auth
                            <!-- ======= Comments Form ======= -->
                            <div class="row justify-content-center mt-5">

                                <div class="col-lg-12">
                                    <h5 class="comment-title">Залишити коментар</h5>
                                    <form action="{{ route('post.comment.store', $post->id) }}" , method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <textarea name="message" class="form-control" id="message"
                                                          placeholder="Введіть ваш коментар" cols="30"
                                                          rows="10"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <input type="submit" class="btn btn-primary" value="Відправити">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- End Comments Form -->

                        @endauth
                    </div>
                    <div class="col-md-3">
                        <!-- ======= Sidebar ======= -->
                        <div class="aside-block">

                            <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-related-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-popular" type="button" role="tab"
                                            aria-controls="pills-popular" aria-selected="true">Схожі пости
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <!-- Схожі пости -->

                                <div class="tab-pane fade show active" id="pills-related" role="tabpanel"
                                     aria-labelledby="pills-popular-tab">
                                    @foreach($relatedPosts as $post)
                                        <div class="post-entry-1 border-bottom">
                                            <div class="post-meta"><span
                                                    class="date">{{ $post->category->title }}</span> <span class="mx-1">&bullet;</span>
                                                <span>{{ $date->translatedFormat('M') }} {{ $date->day }}, {{ $date->year }} - {{ $date->format('H:i') }}</span>
                                            </div>
                                            <h2 class="mb-2"><a
                                                    href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                                            </h2>
                                            <span class="author mb-3 d-block">Jenny Wilson</span>
                                        </div>
                                    @endforeach
                                </div> <!-- End Схожі пости -->

                                <!-- Latest -->
                                <div class="tab-pane fade" id="pills-latest" role="tabpanel"
                                     aria-labelledby="pills-latest-tab">
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                            <span>Jul 5th '22</span></div>
                                        <h2 class="mb-2"><a href="#">Life Insurance And Pregnancy: A Working Mom’s
                                                Guide</a></h2>
                                        <span class="author mb-3 d-block">Jenny Wilson</span>
                                    </div>

                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span>
                                            <span>Jul 5th '22</span></div>
                                        <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples
                                                Away)</a></h2>
                                        <span class="author mb-3 d-block">Jenny Wilson</span>
                                    </div>

                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                            <span>Jul 5th '22</span></div>
                                        <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should
                                                Know</a></h2>
                                        <span class="author mb-3 d-block">Jenny Wilson</span>
                                    </div>

                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span>
                                            <span>Jul 5th '22</span></div>
                                        <h2 class="mb-2"><a href="#">How to Avoid Distraction and Stay Focused During
                                                Video Calls?</a></h2>
                                        <span class="author mb-3 d-block">Jenny Wilson</span>
                                    </div>

                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                            <span>Jul 5th '22</span></div>
                                        <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That
                                                Will Inspire Your New Haircut</a></h2>
                                        <span class="author mb-3 d-block">Jenny Wilson</span>
                                    </div>

                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span>
                                            <span>Jul 5th '22</span></div>
                                        <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium
                                                Hair</a></h2>
                                        <span class="author mb-3 d-block">Jenny Wilson</span>
                                    </div>

                                </div> <!-- End Latest -->

                            </div>
                        </div>

                        <div class="aside-block">
                            <h3 class="aside-title">Categories</h3>
                            <ul class="aside-links list-unstyled">
                                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Business</a></li>
                                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Culture</a></li>
                                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Sport</a></li>
                                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Food</a></li>
                                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Politics</a></li>
                                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Celebrity</a></li>
                                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Startups</a></li>
                                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Travel</a></li>
                            </ul>
                        </div><!-- End Categories -->

                        <div class="aside-block">
                            <h3 class="aside-title">Теги</h3>
                            <ul class="aside-tags list-unstyled">
                                @foreach($tags as $tag)
                                    <li><a href="#">{{ $tag->title }}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- End Tags -->

                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection
