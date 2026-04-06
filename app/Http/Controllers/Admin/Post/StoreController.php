<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
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

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(404);
        }

        return redirect()->route('admin.posts.index');
    }
}
