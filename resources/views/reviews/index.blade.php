<!DOCTYPE html>
<html lang="en">

<head>

    @include('user.css')

</head>

<body>

    @include('user.header')

    <div class="container text-center" style="padding-top:100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if($purchased)
                            <h1 class="m-3" style="font-size: 2rem;">Write comment for {{ $product->title }}</h1>
                            <form action="{{ url('/addcomment') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <textarea class="w-50" name="user_comment" placeholder="Write a comment..." cols="30" rows="5"></textarea><br>
                                <button type="submit" class="btn btn-primary m-3">Submit</button>
                            </form>
                        @else
                            <div class="alert alert-danger">
                                <h1 class="m-3" style="font-size: 2rem;">You cannot review this product!</h1>
                                <p class="m-3">Only customers who purchased can review the item</p>
                                <a href="{{ url('/') }}" class="btn btn-primary m-3">Back to home</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('user.footer')

    @include('user.scripts')

</body>

</html>
