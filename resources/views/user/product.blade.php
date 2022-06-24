<div class="all-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h1 class="d-flex justify-content-center" style="font-size: 2rem;">All Products</h1>
                </div>
                <div class="border col-md-6 mx-auto mb-3">
                    <h1 class="d-flex justify-content-center" style="font-size: 2rem;">Filter</h1>
                    <form action="{{ url('filter') }}" method="get" align="center" class="m-1">
                        @csrf
                        <label for="sortby">Sort by:</label><br>
                        <select name="sortby" id="sortby">
                            <option value="asc" {{isset($request) ? $request->sortby == "asc" ? "selected" : "" : ""}}>
                                Price ascending</option>
                            <option value="desc"
                                {{isset($request) ? $request->sortby == "desc" ? "selected" : "" : ""}}>Price descending
                            </option>
                            <option value="desctime"
                                {{isset($request) ? $request->sortby == "desctime" ? "selected" : "" : ""}}>Newest first
                            </option>
                            <option value="asctime"
                                {{isset($request) ? $request->sortby == "asctime" ? "selected" : "" : ""}}>Oldest first
                            </option>
                        </select><br>
                        <button type="submit" class="btn btn-outline-primary text-blue m-3">Apply</button>
                    </form>
                </div>
            </div>

            @foreach($data as $product)
            <div class="col-md-4">
                <div class="product-item">
                    <a href="{{ url('viewproduct', $product->id) }}"><img src="/productimage/{{ $product->image }}"
                            alt="Product image" style="width:300px; height:300px;"></a>
                    <div class="down-content">
                        <a href="{{ url('viewproduct', $product->id) }}">
                            <h4>{{ $product->title }}</h4>
                        </a>
                        <h6>${{ $product->price }}</h6>
                        <p>{{ $product->description }}</p>
                        <form action="{{ url('addcart', $product->id) }}" method="post">
                            @csrf
                            <input class="form-control w-25" style="width: 25%" type="number" value="1" min="1"
                                name="quantity"></input>
                            <input class="btn btn-outline-primary mt-3 text-blue" type="submit"
                                value="Add to cart"></input>
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