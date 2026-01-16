<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CommentResource;
use App\Http\Resources\Api\CommentsResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use tizis\laraComments\Entity\Comment;
use tizis\laraComments\UseCases\CommentService;

class CommentController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'commentable_type' => 'required|string|in:post,news',
            'commentable_id' => 'required|int|exists:posts,id|exists:news,id',
            'order_direction' => 'string|in:asc,desc'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $modelPath = match ($request->commentable_type) {
            'post' => 'App\Models\Post',
            'news' => 'App\Models\News'
        };

        if (!CommentService::modelIsExists($modelPath)) {
            throw new \DomainException('Model don\'t exists');
        }

        if (!CommentService::isCommentable(new $modelPath)) {
            throw new \DomainException('Model is\'t commentable');
        }

        $model = $modelPath::where('id', $request->commentable_id)->first();

        $order = ['column' => 'id', 'direction' => $request->order_direction];

        return response()->json([
            'status' => true,
            'data' => CommentsResource::collection(
                $model->commentsWithChildrenAndCommenter()
                    ->parentless()
                    ->orderBy($order['column'], $order['direction'])
                    ->get()
            ),
            'count' => $model->commentsWithChildrenAndCommenter()->count()
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'commentable_type' => 'required|string|in:post,news',
            'commentable_id' => 'required|int|exists:posts,id|exists:news,id',
            'text' => 'required|string|min:3|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $modelPath = match ($request->commentable_type) {
            'post' => 'App\Models\Post',
            'news' => 'App\Models\News'
        };

        if (!CommentService::modelIsExists($modelPath)) {
            throw new \DomainException('Model doesn\'t exists');
        }

        if (!CommentService::isCommentable(new $modelPath)) {
            throw new \DomainException('Model isn\'t commentable');
        }

        $model = $modelPath::findOrFail($request->commentable_id);

        $comment = CommentService::createComment(
            new Comment(),
            Auth::user(),
            $model,
            CommentService::htmlFilter($request->text)
        );

        return response()->json([
            'status' => true,
            'message' => 'Comment created successfully',
            'data' => new CommentResource($comment)
        ], 201);
    }


    /**
     * @param string $commentId
     * @return JsonResponse|CommentResource
     */
    public function show(string $commentId): JsonResponse|CommentResource
    {
        $comment = Comment::findOrFail($commentId);

        if (!$comment || $comment->commenter_id !== Auth::user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'Comment not found or you are not the author'
            ], 404);
        }

        return new CommentResource($comment);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $comment = Comment::findOrFail($id);

        if (!$comment || $comment->commenter_id !== Auth::user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'Comment not found or you are not the author'
            ], 404);
        }

        CommentService::updateComment(
            $comment,
            CommentService::htmlFilter($request->text)
        );

        return response()->json([
            'status' => true,
            'message' => 'Comment updated successfully',
            'data' => new CommentResource($comment)
        ]);
    }

    /**
     * @param string $id
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(string $id): JsonResponse
    {
        $comment = Comment::findOrFail($id);

        if (!$comment || $comment->commenter_id !== Auth::user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'Comment not found or you are not the author'
            ], 404);
        }

        try {
            CommentService::deleteComment($comment);
            $response = response()->json([
                'status' => true,
                'message' => 'Comment deleted successfully'
            ]);
        } catch (\DomainException $e) {
            $response = response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 403);
        }

        return $response;
    }

    /**
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function reply(Request $request, string $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|string|min:3|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $comment = Comment::findOrFail($id);

        $reply = CommentService::createComment(
            new Comment(),
            Auth::user(),
            $comment->commentable,
            CommentService::htmlFilter($request->text),
            $comment
        );

        return response()->json([
            'status' => true,
            'message' => 'Reply created successfully',
            'data' => new CommentResource($reply)
        ]);
    }
}
