<div class="container-fluid page-body-wrapper" style="padding-top: 100px;">
    <div class="container" align="center">
        <table class="table table-dark table-bordered text-white">
            <tr class="text-white">
                <th class="p-3 bg-black">Customer name</th>
                <th class="p-3 bg-black">Phone</th>
                <th class="p-3 bg-black">Address</th>
                <th class="p-3 bg-black">Product title</th>
                <th class="p-3 bg-black">Price</th>
                <th class="p-3 bg-black">Quantity</th>
                <th class="p-3 bg-black">Status</th>
                <th class="p-3 bg-black">Action</th>
            </tr>
            @foreach($orders as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->status}}</td>
                <td class="w-10"><a class="btn btn-primary" href="{{ url('viewproduct', $item->product_id) }}">Review</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>