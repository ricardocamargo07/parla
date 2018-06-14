<?php
namespace App\Http\Controllers;

use App\Data\Repositories\Articles;

class Posts extends Controller
{
    public function show($year, $month, $number, $slug)
    {
        return view('home.post')->with(
            'post',
            app(Articles::class)->findByEdition($year, $month, $number, $slug)
        );
    }
}
