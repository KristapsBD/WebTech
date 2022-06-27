<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($comments as $comment)
            <div class="user-comment">
                <label class="label-primary">{{ $comment->user->name }}</label>
                @if($comment->user_id == Auth::id())
                    <a href="{{ url('editcomment/'.$product->id.'/usercomment') }}">edit</a><br>
                @endif
                @if($comment->review)
                    @php
                        $user_rated = $comment->review->stars
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
