<?php

namespace App\Data\Repositories;

use App\Services\Markdown\Service as Markdown;
use App\Data\Models\Editorial as EditorialModel;

class Editorial
{
    public function get()
    {
        return EditorialModel::first();
    }

    public function post()
    {
        if (!$editorial = EditorialModel::first()) {
            $editorial = new EditorialModel();
        }

        $editorial->text = request()->get('editorial');

        info([$editorial]);

        $editorial->save();

        return $editorial;
    }

    public function getMarkdown()
    {
        if ($editorial = $this->get()) {
            return app(Markdown::class)->convert($editorial->text);
        }

        return '';
    }
}
