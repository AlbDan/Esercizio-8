<x-layout title="Login">
    
    <div class="regWrapper">
        <div class="regWrapperForm">
            <form action="{{route('login')}}" method="POST" class="f-kanit">
                @csrf
                <h1 class="text-center f-right display-3">Game News</h1>
                <h2 class="text-center mb-3">Sign In</h2>
                <div class="mb-3">
                    <label for="emailLogin" class="form-label">Email address</label>
                    <input type="email" class="form-control inputarea-cst @error('email') is-invalid @enderror" id="emailLogin" name="email" aria-describedby="emailHelp">
                    @error('email')
                    <div class="text-danger mb-2 error-cst">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="passwordLogin" class="form-label">Password</label>
                    <input type="password" class="form-control inputarea-cst @error('password') is-invalid @enderror" id="passwordLogin" name="password">
                    @error('password')
                    <div class="text-danger mb-2 error-cst">{{$message}}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn-cst fs-3 my-3">Login</button>
                </div>
            </form>
        </div>
    </div>
    
</x-layout>