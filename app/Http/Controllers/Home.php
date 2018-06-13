<?php
namespace App\Http\Controllers;

use App\Data\Repositories\Articles;
use App\Data\Repositories\Articles as ArticlesRepository;

class Home extends Controller
{
    /**
     * @var ArticlesRepository
     */
    private $articlesRepository;

    public function __construct(ArticlesRepository $articlesRepository)
    {
        $this->articlesRepository = $articlesRepository;
    }

    public function index()
    {
        return view('home.index');
    }

    public function post()
    {
        return view('home.post');
    }
}
