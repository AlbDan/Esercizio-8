<x-layout title="modify tag">
    
    <div class="d-flex justify-content-center">
        <div class="regWrapperForm">
            <form action="{{route('tag.update', compact('tag'))}}" method="POST" class="f-kanit">
                @method('PUT')
                @csrf
                <h1 class="text-center f-right display-3">Game News</h1>
                <h2 class="text-center mb-3">Modify Tag: <br class="mb-2"> {{$tag['name']}}</h2>
                @if (session('status')) {{-- se la nostra sessione contiene un dato di tipo status allora... --}}
                <div class="alert alert-success text-center" role="alert">
                    {{session('status')}}
                </div>
                @endif
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="mb-3 title-cst">
                        <label for="insTagWrapper" class="form-label">Tag</label>
                        <input type="text" class="form-control inputarea-cst @error('name') is-invalid @enderror" id="insTagWrapper" name="name" value="{{$tag['name']}}">
                    </div>
                    @error('name')
                    <div class="text-danger mb-2 error-cst">{{$message}}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn-cst fs-3 my-3">Modify</button>
                </div>
            </form>
        </div>
    </div>
    
    
    
</x-layout>