<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="{{ url('allproducts') }}">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          @foreach($latestdata as $product)

          <div class="col-md-4">
            <div class="product-item">
              <a href="{{ url('viewproduct', $product->id) }}"><img src="/productimage/{{ $product->image }}" alt="Product image" style="width:300px; height:300px;"></a>
              <div class="down-content">
                <a href="{{ url('viewproduct', $product->id) }}"><h4>{{ $product->title }}</h4></a>
                <h6>${{ $product->price }}</h6>
                <p>{{ $product->description }}</p>
                <form action="{{ url('addcart', $product->id) }}" method="post">
                  @csrf
                  <input class="form-control w-25" style="width: 25%" type="number" value="1" min="1" name="quantity"></input>
                  <input class="btn btn-outline-primary mt-3" type="submit" value="Add to cart"></input>
                </form>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>