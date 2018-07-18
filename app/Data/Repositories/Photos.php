<?php
namespace App\Data\Repositories;

use App\Data\Models\ArticlePhoto;

class Photos
{
    private function findById($photoId)
    {
        return ArticlePhoto::find($photoId);
    }

    public function setMain($photoId, $isMain = true)
    {
        $photo = $this->findById($photoId);

        ArticlePhoto
            ::where('article_id', $photo->article_id)
            ->update(['main' => false]);

        $photo->main = $isMain;

        $photo->save();
    }

    public function update($photoId, $attributes)
    {
        $photo = $this->findById($photoId);

        $photo->fill($attributes);

        $photo->save();
    }

    public function create($attributes)
    {
        info($attributes);

        $photo = new ArticlePhoto();

        $photo->fill($attributes);

        $photo->save();

        return $photo;
    }
}
