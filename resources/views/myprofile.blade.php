<x-layout title="My Profile">
    
    <div class="d-flex justify-content-center align-center">
        <div class="myprofile-wrapper f-kanit">
            <h1 class="text-center">My Profile</h1>
            <div class="fs-3 my-2 py-2 border-bottom border-1 border-warning d-flex justify-content-between"> 
                <p>Username:</p>
                <p class="text-white">{{Auth::user()->name}}</p>
            </div>
            <div class="fs-3 my-2 py-2 border-bottom border-1 border-warning d-flex justify-content-between"> 
                <p>Email:</p>
                <p class="text-white">{{Auth::user()->email}}</p>
            </div>
            <div class="fs-3 my-2 py-2 border-bottom border-1 border-warning d-flex justify-content-between"> 
                <p>Name:</p>
                <p class="text-white">{{Auth::user()->detail->realname}}</p>
            </div>
            <div class="fs-3 my-2 py-2 border-bottom border-1 border-warning d-flex justify-content-between"> 
                <p>Surname:</p>
                <p class="text-white">{{Auth::user()->detail->surname}}</p>
            </div>
            <div class="fs-3 my-2 py-2 border-bottom border-1 border-warning d-flex justify-content-between"> 
                <p>City:</p>
                <p class="text-white">{{Auth::user()->detail->city}}</p>
            </div>
        </div>
    </div>

    <h2 class="text-center f-kanit display-4">My articles:</h2>

    @if (session('status')) {{-- se la nostra sessione contiene un dato di tipo status allora... --}}
    <div class="alert alert-success text-center" role="alert">
        {{session('status')}}
    </div>
    @endif

    <div class="container">
        <div class="row">
            @foreach (Auth::user()->articles->sortByDesc('created_at')->values()->all() as $article)
                <div class="col-12 my-5">
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
                            <div class="d-flex flex-column align-items-center justify-content-center my-3">
                                <a href="{{route('article.edit', compact('article'))}}"><button class="btn btn-outline-warning f-kanit text-uppercase my-2 px-5">Modify</button></a>
                                <form action="{{route('article.delete',compact('article'))}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="w-100 my-2 btn btn-outline-danger f-kanit text-uppercase my-2 px-5" type="button">Delete</button>                           
                                </form>
                            </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
    
    
    
</x-layout>