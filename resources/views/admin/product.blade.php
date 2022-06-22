<!DOCTYPE html>
<html lang="en">
  <head>

	@include('admin.css')

  </head>
  <body>

	@include('admin.sidebar')

	@include('admin.navbar')

    <div class="container-fluid page-body-wrapper mt-5">
        <div class="container" align="center">
            <h1 class="pt-3" style="font-size:2rem;">Create new product</h1>

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()-> get('message') }}
                <button type="button" class="close float-end" data-bs-dismiss="alert">X</button>
            </div>
            @endif

            <form action="{{ url('uploadproduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-3">
                    <label>Title</label><br>
                    <input class="text-secondary" type="text" name="title" placeholder="Enter product title" required></input>
                </div>
                <div class="p-3">
                    <label>Price</label><br>
                    <input class="text-secondary" type="number" name="price" placeholder="Enter product price" required></input>
                </div>
                <div class="p-3">
                    <label>Description</label><br>
                    <input class="text-secondary" type="text" name="description" placeholder="Enter product description" required></input>
                </div>
                <div class="p-3">
                    <label>Quantity</label><br>
                    <input class="text-secondary" type="number" name="quantity" placeholder="Enter product quantity" required></input>
                </div>
                <div class="p-3 mx-auto" style="width: 250px;">
                    <label for="file">Image</label><br>
                    <input class="form-control" type="file" id="file" name="file" required></input>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Add product</button>
            </form>
        </div>
    </div>

	@include('admin.scripts')
	
  </body>
</html>