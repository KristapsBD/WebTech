<!DOCTYPE html>
<html lang="en">

<head>

    @include('user.css')

</head>

<body>

    @include('user.header')

    <div style="padding: 100px;">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="p-3">Product name</th>
                    <th class="p-3">Quantity</th>
                    <th class="p-3">Price</th>
                    <th class="p-3 w-10">Edit</th>
                </tr>
                <form action="{{ url('order') }}" method="post">
                    @csrf
                    @php
                    $total = 0
                    @endphp
                    @foreach ($cart as $item)
                    <tr>
                        <td>
                            {{ $item->product_title }}
                            <input type="text" name="productname[]" value="{{ $item->product_title }}" hidden>
                        </td>
                        <td>
                            {{ $item->quantity }}
                            <input type="text" name="quantity[]" value="{{ $item->quantity }}" hidden>
                        </td>
                        <td>
                            ${{ $item->price }}
                            <input type="text" name="price[]" value="{{ $item->price }}" hidden>
                        </td>
                        <td><a class="btn btn-danger" href="{{ url('delete', $item->id) }}">Remove</a></td>
                        @php
                        $quantity = $item->quantity
                        @endphp
                        @for ($i = $quantity; $i > 0; $i--)
                        @php
                        $total += $item->price
                        @endphp
                        @endfor
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="bg-light">Total</td>
                        <td colspan="2" class="bg-light">${{ $total }}</td>
                    <tr>
        </table>
        <!-- Add hacker protection -->
        @if($total != 0)
        <div>
            <button class="btn btn-primary float-right">Confirm order</button>
        </div>
        @endif
        </form>
    </div>

    @include('user.scripts')

</body>

</html>