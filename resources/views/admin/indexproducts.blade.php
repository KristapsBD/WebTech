<div class="container-fluid page-body-wrapper pb-3 mt-5">
    <div class="container" align="center">

        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()-> get('message') }}
            <button type="button" class="close float-end" data-bs-dismiss="alert">X</button>
        </div>
        @endif

        <table class="table table-dark table-bordered text-white">
            <tr class="text-white">
                <th class="p-3 bg-black">Title</th>
                <th class="p-3 bg-black">Price</th>
                <th class="p-3 bg-black">Description</th>
                <th class="p-3 bg-black">Quantity</th>
                <th class="p-3 bg-black">Image</th>
                <th class="p-3 bg-black">Edit</th>
            </tr>

            @foreach($data as $product)

            <tr>
                <td class="p-3">{{ $product->title }}</td>
                <td class="p-3">{{ $product->price }}</td>
                <td class="p-3">{{ $product->description }}</td>
                <td class="p-3">{{ $product->quantity }}</td>
                <td>
                    <img class="img-fluid" style="width: 100px; height: 100px; margin: 0 auto;"
                        src="/productimage/{{ $product->image }}"></img>
                </td>
                <td style="width: 10%">
                    <a href="{{ url('updateview', $product->id) }}" class="btn btn-primary m-1">Update</a>
                    <a href="{{ url('deleteproduct', $product->id) }}" class="btn btn-danger m-1"
                        onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>

            @endforeach

        </table>
    </div>
</div>