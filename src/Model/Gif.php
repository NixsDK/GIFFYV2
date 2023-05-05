<?php

namespace GIPHYV2\Model;

class Gif
{
    private static function fetchGifs($url)
    {
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        $gifs = [];

        foreach ($data['data'] as $gifData) {
            $gifs[] = [
                'title' => $gifData['title'],
                'url' => $gifData['images']['fixed_height']['url'],
            ];
        }

        return $gifs;
    }

    public static function fetchTrending()
    {
        $apiKey = getenv('GIPHY_API_KEY');
        $url = "https://api.giphy.com/v1/gifs/trending?api_key={$apiKey}&limit=10";
        return self::fetchGifs($url);
    }

    public static function search($searchTerm)
    {
        $apiKey = getenv('GIPHY_API_KEY');
        $url = "https://api.giphy.com/v1/gifs/search?q=" . urlencode($searchTerm) . "&api_key={$apiKey}&limit=10";
        return self::fetchGifs($url);
    }
}
