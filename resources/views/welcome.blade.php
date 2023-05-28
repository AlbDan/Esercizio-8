<x-layout title="home">
    
    
    
    
    <header class="welcome-header" style="background-image: url('imgs/Black-Aesthetic-Wallpaper-Gamer.jpg')">
        <h1 class="text-center display-1 fw-bold welcome-msg">Welcome to our gaming news!</h1>
    </header>
    <h3 class="text-center my-3 display-3 f-kanit">Take a look at our news!</h3>
    
    <div class="container">
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-12 my-3">
                <article class="card bg-202020 py-3">
                    <header>
                        <h1 class="text-center f-kanit"><a href="{{route('article.show', compact('article'))}}" class="articlelink-cst">{{$article['title']}}</a></h1>
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
                </article>
            </div>
            @endforeach
        </div>
    </div>
    
    {{-- @for ($i = 0; $i < count($tags); $i++)
        {{$tags[$i]['name']}}
        @endfor --}}
        
        
        
    </x-layout>