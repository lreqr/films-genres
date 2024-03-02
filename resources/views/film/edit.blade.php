<x-layout>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <form action="{{route('film.update', ['film' => $film->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="title" class="form-label">Name</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Name" name="title" id="title" value="{{$film->title}}">
                </div>
                <div class="input-group mb-3">
                    @error('title')
                        <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <p>Current photo</p>
                    <img src="{{asset($film->poster)}}" alt="" style="height: 150px">
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
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    <select class="form-select" id="inputGroupSelect01" name="status" type="string">
                        <option value="draft" {{$film->status === 'draft' ? 'selected' : ''}}>draft</option>
                        <option value="published" {{$film->status === 'published' ? 'selected' : ''}}>published</option>
                        <option value="archived" {{$film->status === 'archived' ? 'selected' : ''}}>archived</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    @error('status')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</x-layout>
