<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try{
            DB::beginTransaction();
            if (isset($data['categoryIds'])) {
                $categoryIds = $data['categoryIds'];
                unset($data['categoryIds']);
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disc('public')->put('images/', $data['preview_image']);
            }
            $post = Post::firstOrCreate($data);

            if (isset($categoryIds)) {
                $post->categories()->attach($categoryIds);
            }

            return $post;
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }

    }

    public function update($data, $post)
    {
        if (isset($data['categoryIds'])) {
            $categoryIds = $data['categoryIds'];
            unset($data['categoryIds']);
        }

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }
        $post->update($data);

        if (isset($categoryIds)) {
            $post->categories()->attach($categoryIds);
        }

        return $post;
    }
}
