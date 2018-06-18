<?php
namespace App\Http\Controllers;

use App\Data\Repositories\Articles;
use App\Data\Repositories\Articles as ArticlesRepository;

class Posts extends Controller
{
    /**
     * @var ArticlesRepository
     */
    private $articlesRepository;

    public function __construct(ArticlesRepository $articlesRepository)
    {
        $this->articlesRepository = $articlesRepository;
    }

    public function show($year, $month, $number, $slug)
    {
        return view('home.post')
            ->with(
                'post',
                app(Articles::class)->findByEdition(
                    $year,
                    $month,
                    $number,
                    $slug
                )
            )
            ->with(
                'currentEdition',
                $this->articlesRepository->findEditionByNumber($number)
            );
    }
}
