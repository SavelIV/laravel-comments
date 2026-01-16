<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use tizis\laraComments\Http\Resources\CommentResource as BaseCommentResource;

class CommentResource extends BaseCommentResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'comment' => self::comment($this->comment),
            'created_at' => Carbon::parse($this->created_at)->toDateTimeString(),
            'updated_at' => Carbon::parse($this->updated_at)->toDateTimeString(),
            'commenter' => self::user($this->commenter)
        ];
    }
}
