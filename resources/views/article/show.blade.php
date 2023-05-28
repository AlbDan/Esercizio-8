<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <article class="card bg-202020 py-3 px-5">
                    @if (session('status')) {{-- se la nostra sessione contiene un dato di tipo status allora... --}}
                    <div class="alert alert-success text-center" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
                    <header class="pb-3 border-bottom border-1 border-warning">
                        <h1 class="text-center f-kanit text-warning">{{$article['title']}}</h1>
                        <div class="byline text-center text-white">
                            <address class="author">By <a rel="author" href="{{route('author.articles', $article->user)}}" class="by-cst">{{$article->user->detail->realname}} {{$article->user->detail->surname}}</a></address> 
                            on <time class="timeWrapper">{{$article['created_at']}}</time>
                        </div>
                        @if (count($article['tags'])!=0)
                        <h5 class="text-center f-kanit text-warning text-uppercase mt-3">Tags:</h5>
                        <div class="d-flex justify-content-center text-warning">
                            @for ($i = 0; $i < count($article['tags']); $i++)
                            <a href="{{route('tag.articles', $article['tags'][$i]['id'])}}" class="taglink-cst mx-1">{{$article['tags'][$i]['name']}}</a>
                            @endfor 
                        </div>
                        @endif
                    </header>
                    <div class="mt-3">
                        <p class="text-white f-kanit fs-5">{{$article['body']}}</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</x-layout>