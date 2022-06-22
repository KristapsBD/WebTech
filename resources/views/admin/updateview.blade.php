<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">

	@include('admin.css')

  </head>
  <body>

	@include('admin.sidebar')

	@include('admin.navbar')

    <div class="container-fluid page-body-wrapper mt-5">
        <div class="container" align="center">
            <h1 class="pt-3" style="font-size:2rem;">Update product info</h1>

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()-> get('message') }}
                <button type="button" class="close float-end" data-bs-dismiss="alert">X</button>
            </div>
            @endif

            <form action="{{ url('updateproduct', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-3">
                    <label>Title</label><br>
                    <input class="text-secondary" type="text" name="title" value="{{ $data->title }}" required></input>
                </div>
                <div class="p-3">
                    <label>Price</label><br>
                    <input class="text-secondary" type="number" name="price" value="{{ $data->price }}" required></input>
                </div>
                <div class="p-3">
                    <label>Description</label><br>
                    <input class="text-secondary" type="text" name="description" value="{{ $data->description }}" required></input>
                </div>
                <div class="p-3">
                    <label>Quantity</label><br>
                    <input class="text-secondary" type="number" name="quantity" value="{{ $data->quantity }}" required></input>
                </div>
                <div class="p-3">
                    <label>Old image</label><br>
                    <img src="/productimage/{{ $data->image }}" height="100" width="100"></img>
                </div>
                <div class="p-3 mx-auto" style="width: 250px;">
                    <label for="file">New image</label><br>
                    <input class="form-control" type="file" id="file" name="file"></input>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Update product</button>
            </form>
        </div>
    </div>

	@include('admin.scripts')
	
  </body>
</html>