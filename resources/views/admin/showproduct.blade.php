<!DOCTYPE html>
<html lang="en">
  <head>

	@include('admin.css');

  </head>
  <body>

	@include('admin.sidebar');

	@include('admin.navbar');

    <div class="container-fluid page-body-wrapper pb-3">
        <div class="container" align="center">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()-> get('message') }}
                <button type="button" class="close float-end" data-bs-dismiss="alert">X</button>
            </div>
        @endif

            <table class="table table-dark table-bordered text-white">
                <tr class="bg-black font-weight-bold">
                    <td class="p-3">Title</td>
                    <td class="p-3">Price</td>
                    <td class="p-3">Description</td>
                    <td class="p-3">Quantity</td>
                    <td class="p-3">Image</td>
                    <td class="p-3">Edit</td>
                </tr>

                @foreach($data as $product)

                <tr>
                    <td class="p-3">{{ $product->title }}</td>
                    <td class="p-3">{{ $product->price }}</td>
                    <td class="p-3">{{ $product->description }}</td>
                    <td class="p-3">{{ $product->quantity }}</td>
                    <td>
                        <img class="img-fluid" style="width: 100px; height: 100px; margin: 0 auto;" src="/productimage/{{ $product->image }}"></img>
                    </td>
                    <td style="width: 10%">
                        <a href="{{ url('updateview', $product->id) }}" class="btn btn-primary m-1">Update</a>
                        <a href="{{ url('deleteproduct', $product->id) }}" class="btn btn-danger m-1">Delete</a>
                    </td>
                </tr>

                @endforeach

            </table>
        </div>
    </div>

	@include('admin.scripts');
	
  </body>
</html>