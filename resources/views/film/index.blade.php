<x-layout>
    <div class="row">
        @foreach($films as $film)
            <div class="col-3">
                <div class="card mt-3" style="width: 18rem;">
                    <img src="{{$film->poster}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$film->title}}</h5>
                        <p class="card-text">@foreach($film->genres as $genre)
                                                 {{$genre->title}} {{!$loop->last ? ',' : ''}}
                        @endforeach</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{route('film.edit', ['film' => $film->id])}}" class="btn btn-primary">Edit</a>
                            @if(str_contains(url()->full(), 'status'))
                                <form action="{{route('film.publish', ['film' => $film->id])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Publish</button>
                                </form>
                            @endif
                            <form action="{{route('film.destroy', ['film' => $film->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>
