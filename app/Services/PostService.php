<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data) {
        try {
            DB::beginTransaction();
            $previewImage = $data['preview_image'] ?? null;
            $mainImage = $data['main_image'] ?? null;
            $tagIds = $data['tag_ids'] ?? null;

            unset($data['tag_ids']);

            if ($previewImage) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $previewImage);
            }

            if ($mainImage) {
                $data['main_image'] = Storage::disk('public')->put('/images', $mainImage);
            }

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, Post $post) {
        try {
            DB::beginTransaction();
            $previewImage = $data['preview_image'] ?? null;
            $mainImage = $data['main_image'] ?? null;
            $tagIds = $data['tag_ids'] ?? null;

            unset($data['tag_ids']);

            if ($previewImage) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $previewImage);
            }

            if ($mainImage) {
                $data['main_image'] = Storage::disk('public')->put('/images', $mainImage);
            }

            $post->update($data);
            $post->tags()->sync($tagIds);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}
