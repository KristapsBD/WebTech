<div class="container text-center" style="padding-top:100px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="m-3" style="font-size: 2rem;">Update comment for {{ $comment->product->title }}</h1>
                    <form action="{{ url('/updatecomment') }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <textarea class="w-50" name="user_comment" placeholder="Write a comment..." cols="30" rows="5">{{ $comment->comment }}</textarea><br>
                        <button type="submit" class="btn btn-primary m-3">Update comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
