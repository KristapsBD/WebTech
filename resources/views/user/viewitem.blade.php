<div class="view-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-item row">
                    <div class="col-md-7">
                        <a><img src="/productimage/{{ $product->image }}" alt="Product image"
                                style="width:300px; height:300px;" class="m-3"></a>
                    </div>
                    <div class="col-md-5">
                        <a>
                            <h1 class="m-3" style="font-size: 2rem;">{{ $product->title }}</h1>
                        </a>
                        <h6 class="m-3">${{ $product->price }}</h6>
                        <p class="m-3 w-100">{{ $product->description }}</p>
                        @php $ratenum = number_format($review_value) @endphp
                        <div class="rating">
                            <span class="m-3">Reviews: {{ $reviews->count() }}</span>
                            @for($i = 1; $i <= $ratenum; $i++) <i class="fa fa-star checked"></i>
                                @endfor
                                @for($j = $ratenum + 1; $j <= 5; $j++) <i class="fa fa-star"></i>
                                    @endfor
                        </div>
                        <button type="button" class="btn btn-outline-primary m-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Rate product
                        </button>
                        <div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ url('addreview') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value={{ $product->id }}>
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add rating for
                                                {{ $product->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="rating-css">
                                                <div class="star-icon">
                                                    <input type="radio" value="1" name="product_rating" checked
                                                        id="rating1">
                                                    <label for="rating1" class="fa fa-star"></label>
                                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                                    <label for="rating2" class="fa fa-star"></label>
                                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                                    <label for="rating3" class="fa fa-star"></label>
                                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                                    <label for="rating4" class="fa fa-star"></label>
                                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                                    <label for="rating5" class="fa fa-star"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            @if($product->quantity >0)
                                <label class="badge bg-success ml-3">In stock</label>
                            @else
                                <label class="badge bg-danger ml-3">Out of stock</label>
                            @endif
                        </div>
                        <form action="{{ url('addcart', $product->id) }}" method="post" class="m-3">
                            @csrf
                            <div class="input-group text-center" style="width: 130px">
                                <button class="input-group-text decrement-btn">-</button>
                                <input class="form-control text-center qty-input" type="number" value="1" min="1"
                                    name="quantity"></input>
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                            @if($product->quantity >0)
                                <input class="btn btn-outline-primary mt-3" type="submit" value="Add to cart"></input>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.increment-btn').click(function(e) {
        e.preventDefault();
        var inc_value = $('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function(e) {
        e.preventDefault();
        var dec_value = $('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $('.qty-input').val(value);
        }
    });
})
</script>