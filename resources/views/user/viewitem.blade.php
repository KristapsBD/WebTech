<div class="view-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-item row">
                    <div class="col-md-7">
                        <a><img src="/productimage/{{ $product->image }}" alt="Product image"
                                style="width:300px; height:300px;"></a>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="col-md-5">
                            <a>
                                <h1 class="m-3" style="font-size: 2rem;">{{ $product->title }}</h1>
                            </a>
                            <h6 class="m-3">${{ $product->price }}</h6>
                            <p class="m-3">{{ $product->description }}</p>
                            <form action="{{ url('addcart', $product->id) }}" method="post" class="m-3">
                                @csrf

                                <input class="btn btn-outline-primary mt-3" type="submit" value="Add to cart"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>