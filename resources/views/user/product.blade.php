<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Recommended Products</h2>
              <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          @foreach($data as $product)

          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="/productimage/{{ $product->image }}" alt="Product image" style="width:300px; height:300px;"></a>
              <div class="down-content">
                <a href="#"><h4>{{ $product->title }}</h4></a>
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
        @if(method_exists($data, 'links'))
        <div class="d-flex justify-content-center">
            {!! $data->links() !!}
        </div>
        @endif
      </div>
    </div>