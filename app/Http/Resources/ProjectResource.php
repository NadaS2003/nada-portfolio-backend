<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'tech_stack' => $this->technologies, // لاحظي غيرنا الاسم ليكون أوضح للفرونت
            'image_url' => $this->image ? asset(  $this->image) : asset('images/default.jpg'),
            'github' => $this->github_url,
            'demo' => $this->demo_url,
        ];
    }
}
