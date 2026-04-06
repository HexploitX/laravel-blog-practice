<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post) {
        try {
            DB::beginTransaction();
            $data = $request->validated();
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
            abort(404);
        }

        return redirect()->route('admin.posts.show', compact('post'));
    }
}
