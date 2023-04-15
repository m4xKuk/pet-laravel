<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        if(isset($data['preview_image'])){
            $data['preview_image'] = Storage::disc('public')->put('images/', $data['preview_image']);
        }
        $post = Post::firstOrCreate($data);

        return $post;
    }

    public function update($data, $post)
    {
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }
        $post->update($data);

        return $post;
    }
}
