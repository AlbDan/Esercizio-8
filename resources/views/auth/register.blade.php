<x-layout title="Register">
    
    <div class="regWrapper">
        <div class="regWrapperForm">
            <form action="{{route('register')}}" method="POST" class="f-kanit">
                @csrf
                <h1 class="text-center f-right display-3">Game News</h1>
                <h2 class="text-center mb-3">Sign Up</h2>
                <div class="mb-3 d-flex justify-content-between">
                    <div class="w-50 me-3">
                        <label for="nameReg" class="form-label">Name</label>
                        <input type="text" class="form-control inputarea-cst @error('realname') is-invalid @enderror" id="nameReg" name="realname" value="{{old('realname')}}" placeholder="*">
                        @error('realname')
                        <div class="text-danger mb-2 error-cst">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="w-50 ms-3">
                        <label for="surnameReg" class="form-label">Surname</label>
                        <input type="text" class="form-control inputarea-cst @error('surname') is-invalid @enderror" id="surnameReg" name="surname" value="{{old('surname')}}" placeholder="*">
                        @error('surname')
                        <div class="text-danger mb-2 error-cst">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <div class="w-75">
                        <label for="cityReg" class="form-label">City</label>
                        <input type="text" class="form-control inputarea-cst @error('city') is-invalid @enderror" id="cityReg" name="city" value="{{old('city')}}" placeholder="*">
                        @error('city')
                        <div class="text-danger mb-2 error-cst">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="usernameReg" class="form-label">Username</label>
                    <input type="text" class="form-control inputarea-cst @error('name') is-invalid @enderror" id="usernameReg" name="name" value="{{old('name')}}" placeholder="*">
                    @error('name')
                    <div class="text-danger mb-2 error-cst">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="emailReg" class="form-label">Email address</label>
                    <input type="email" class="form-control inputarea-cst @error('email') is-invalid @enderror" id="emailReg" name="email" aria-describedby="emailHelp" value="{{old('email')}}" placeholder="*">
                    @error('email')
                    <div class="text-danger mb-2 error-cst">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="passwordReg" class="form-label">Password</label>
                    <input type="password" class="form-control inputarea-cst @error('password') is-invalid @enderror" id="passwordReg" name="password" placeholder="*">
                    @error('password')
                    <div class="text-danger mb-2 error-cst">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="passwordConfReg" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control inputarea-cst @error('password_confirmation') is-invalid @enderror" id="passwordConfReg" name="password_confirmation" placeholder="*">
                    @error('password_confirmation')
                    <div class="text-danger mb-2 error-cst">{{$message}}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn-cst fs-3 my-3">Register</button>
                </div>
            </form>
        </div>
    </div>
    
</x-layout>