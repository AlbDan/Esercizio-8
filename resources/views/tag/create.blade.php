<x-layout title="insert tag">
    
    <div class="d-flex justify-content-center">
        <div class="regWrapperForm">
                <form action="{{route('tag.store')}}" method="POST" class="f-kanit">
                    @csrf
                    <h1 class="text-center f-right display-3">Game News</h1>
                    <h2 class="text-center mb-3">Insert Tag</h2>
                    @if (session('status')) {{-- se la nostra sessione contiene un dato di tipo status allora... --}}
                    <div class="alert alert-success text-center" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-3 title-cst">
                            <label for="insTagWrapper" class="form-label">Tag</label>
                            <input type="text" class="form-control inputarea-cst @error('name') is-invalid @enderror" id="insTagWrapper" name="name" placeholder="*" value="{{old('name')}}">
                        </div>
                        @error('name')
                        <div class="text-danger mb-2 error-cst">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-cst fs-3 my-3">Insert</button>
                    </div>
                </form>
        </div>
    </div>
    
    
    
</x-layout>