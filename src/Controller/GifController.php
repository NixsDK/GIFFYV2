<?php


namespace GIPHYV2\Controller;

use GIPHYV2\Model\Gif;

class GifController
{
    public function index($twig)
    {
        $gifs = Gif::fetchTrending();
        echo $twig->render('index.html.twig', ['gifs' => $gifs]);
    }

    public function search($twig, $searchTerm)
    {
        $gifs = Gif::search($searchTerm);
        echo $twig->render('index.html.twig', ['gifs' => $gifs]);
    }
}
