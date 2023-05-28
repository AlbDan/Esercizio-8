<x-layout title="modify article">


    <div class="container">
        <div class="row my-5">
            <div class="articleWrapper ">
                <form action="{{route('article.update', compact('article'))}}" method="POST" class="f-kanit">
                    @method('PUT')
                    @csrf
                    <h1 class="text-center f-right display-3">Game News</h1>
                    <h2 class="text-center mb-3">Modify Article</h2>
                    @if (session('status')) {{-- se la nostra sessione contiene un dato di tipo status allora... --}}
                    <div class="alert alert-success text-center" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3 title-cst">
                            <label for="insTitleWrapper" class="form-label">Title</label>
                            <input type="text" class="form-control inputarea-cst @error('title') is-invalid @enderror" id="insTitleWrapper" name="title" placeholder="*" value="{{$article->title}}">
                        </div>
                        @error('title')
                        <div class="text-danger mb-2 error-cst">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label for="insBodyWrapper" class="form-label">Body</label>
                        <textarea name="body" id="insBodyWrapper" class="form-control inputarea-cst @error('body') txt-a-cst-inv @enderror" cols="30" rows="10" placeholder="*">{{$article->body}}</textarea>
                    </div>
                    @error('body')
                    <div class="text-danger mb-2 error-cst">{{$message}}</div>
                    @enderror
                    <div class="mb-3 d-flex flex-column">
                        <label for="insTagWrapper" class="form-label">Choose a tag:</label>
                        <select name="tags[]" id="insTagWrapper" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-cst fs-3 my-3">Modify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-layout>