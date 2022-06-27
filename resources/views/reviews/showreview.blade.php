<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($comments as $comment)
            <div class="user-comment">
                <label class="label-primary mt-3">{{ $comment->user->name }}</label>
                @if($comment->user_id == Auth::id())
                <label class="badge bg-info ml-3"><a href="{{ url('editcomment/'.$product->id.'/usercomment') }}"">Edit</a></label>
                @endif
                <br>
                @php
                    $stars_rated = App\Models\Review::where('prod_id', $product->id)->where('user_id', $comment->user->id)->first();
                @endphp
                @if($stars_rated)
                    @php
                        $user_rated = $stars_rated->stars
                    @endphp
                    @for ($i = 1; $i <= $user_rated; $i++)
                        <i class="fa fa-star checked"></i>
                    @endfor
                    @for ($j = $user_rated + 1; $j <= 5; $j++)
                        <i class="fa fa-star"></i>
                    @endfor
                @endif
                <small>Reviewed on {{ $comment->created_at->format('d M Y') }}</small>
                <p>{{ $comment->comment }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
