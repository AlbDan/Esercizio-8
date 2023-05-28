<x-layout>
    <h3 class="text-center my-3 display-3 f-kanit">Manage Tags</h3>
    @if (session('status')) {{-- se la nostra sessione contiene un dato di tipo status allora... --}}
    <div class="alert alert-success text-center" role="alert">
        {{session('status')}}
    </div>
    @endif
    <div class="container my-3">
        <div class="row justify-content-center">
            <a href="{{route('tag.create')}}" class="w-25 btn-cst-ins my-3 text-uppercase">Insert Tag</a>
        </div>
        <div class="row">
            @for ($i = 0; $i < count($tags); $i++)
            <div class="col-12">
                <div class="tag-card-cst">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-xl-7">
                                <h4 class="text-center f-kanit text-warning">{{$tags[$i]['name']}}</h4>
                            </div>
                            <div class="col-12 col-xl-5">
                                <div class="d-flex justify-content-center">
                                    <a href="{{route('tag.edit', $tags[$i])}}" class="w-50 btn btn-outline-warning p-2 mx-2 text-uppercase">Modify Tag</a>
                                    <form action="{{route('tag.delete', $tags[$i])}}" method="POST" class="w-50 mx-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-100 btn btn-outline-danger p-2 text-uppercase">Delete Tag</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
    
    
</x-layout>