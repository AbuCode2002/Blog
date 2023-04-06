@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                • {{$data->translatedFormat('F')}} {{$data->day}}, {{$data->year}}• {{$data->format('H:i')}}
                • {{$post->comments->count()}} комментария</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('assets/images/blog-post-featured-img.png')}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed
                            graphic or web designs. The passage is at attributed to an unknown typesetters in 1the 5th
                            century who is thought scrambled with all parts of Cicero’s De. Lorem ipsum, or lipsum as it
                            is sometimes known, is dummy text used in laying out printed graphic or web designs</p>
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed
                            graphic or web designs. The passage is at attributed to an unknown typesetters in 1the 5th
                            century who is thought scrambled with all parts of Cicero’s De. Lorem ipsum, or lipsum as it
                            is sometimes known, is dummy text used in laying out printed graphic or web designs</p>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4 mb-3" data-aos="fade-right">
                        <img src="{{asset('assets/images/blog_post_1.jpg')}}" alt="blog post" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-3" data-aos="fade-up">
                        <img src="{{asset('assets/images/blog_post_2.jpg')}}" alt="blog post" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-3" data-aos="fade-left">
                        <img src="{{asset('assets/images/blog_post_3.jpg')}}" alt="blog post" class="img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section>
                        @auth()
                            <form action="{{ route('post.like.store', $post->id) }} " method="post">
                                @csrf
                                <span>{{$post->liked_users_count}}</span>
                                <button type="submit" class="border-0 bg-transparent">
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                        <i class="far fa-heart" style="color: #f2072b;"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                </button>
                            </form>
                        @endauth
                        @guest()
                            <span>{{$post->liked_users_count}}</span>
                            <i class="far fa-heart"></i>
                        @endguest
                    </section>
                    @if($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{asset('storage/'. $relatedPost->main_image)}}" alt="related post"
                                             class="post-thumbnail">
                                        <p class="post-category">{{$relatedPost->category->title}}</p>
                                        <a href="{{ route('post.show', $relatedPost->id) }}"><h5
                                                class="post-title">{{$post->title}}</h5></a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Комментарий</label>
                                    <textarea name="message" id="comment" class="form-control" placeholder="Комментарий"
                                              rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Добавить комментарий" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
