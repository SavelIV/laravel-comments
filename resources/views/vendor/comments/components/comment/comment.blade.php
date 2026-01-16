@if(isset($reply) && $reply === true)
    <div id="comment-{{ $comment->id }}" class="media">
@else
    <li id="comment-{{ $comment->id }}" class="media" >
@endif
    <img width="40" height="40"
         style="border-radius: 50%; height: 3rem; width: 3rem; float: left;"
         src='{{ $comment->commenter->picture }}'
         alt="User Image">
    <div class="media-body">
        <h5 class="mt-0 mb-1" style="margin-left: 20px; word-wrap: break-word;">
            {{ $comment->commenter->name }}
            <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small>
        </h5>
        <div style="white-space: pre-wrap; border-bottom: 1px solid #e9ecef; padding: 8px 0;">
            {!! $comment->comment!!}
        </div>
        @foreach($comment->allChildrenWithCommenter as $child)
            @include('comments::components.comment.comment', [
                    'comment' => $child,
                    'reply' => true
                ])
        @endforeach
    </div>
{!! isset($reply) && $reply === true ? '</div>' : '</li>' !!}
