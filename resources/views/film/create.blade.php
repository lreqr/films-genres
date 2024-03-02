<x-layout>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <form action="{{route('film.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="title" class="form-label">Name</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Name" name="title" id="title" value="{{old('title')}}">
                </div>
                <div class="input-group mb-3">
                    @error('title')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" name="poster" type="file" id="formFile">
                </div>
                <div class="input-group mb-3">
                    @error('poster')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <label for="genres[]" class="form-label">Genres</label>
                <div class="input-group mb-3">

                    <select class="form-select" multiple aria-label="multiple select example" name="genres[]">
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    @error('genres')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</x-layout>
