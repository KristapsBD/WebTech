<!DOCTYPE html>
<html lang="en">
  <head>

	@include('admin.css')

  </head>
  <body>

	@include('admin.sidebar')

	@include('admin.navbar')
    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <table class="table table-dark table-bordered text-white">
                <tr class="text-white">
                    <th class="p-3">Customer name</th>
                    <th class="p-3">Phoe</th>
                    <th class="p-3">Address</th>
                    <th class="p-3">Product title</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Quantity</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Edit</th>
                </tr>
                @foreach($order as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->status}}</td>
                    <td class="w-10"><a class="btn btn-primary" href="{{ url('updatestatus', $item->id) }}">Delivered</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

	@include('admin.scripts')
	
  </body>
</html>