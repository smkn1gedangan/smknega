<?php

namespace App\View\Components;

use App\Models\Article;
use App\Models\Galeri;
use GuzzleHttp\Client;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RightFeComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $galeris = Galeri::latest()->take(2)->get();

        $articleTerbarus = Article::take(5)->latest()->get();

        // $youtubeVideos = $this->getLatestYouTubeVideos();

        return view('components.right-fe-component', compact("articleTerbarus", "galeris"));
    }


    // private function getLatestYouTubeVideos()
    // {
    //     $channelId = 'UCaW8arAuV0WMEJEzM1rZ1Nw';
    //     $apiKey = env("YOUTUBE_API_KEY");

    //     $client = new Client();

    //     $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=$channelId&maxResults=2&order=date&key=$apiKey";

    //     $response = $client->get($url);
    //     $data = json_decode($response->getBody()->getContents(), true);

    //     $videos = [];
    //     foreach ($data['items'] as $item) {
    //         $videos[] = [
    //             'videoId' => $item['id']['videoId'],
    //             'title' => $item['snippet']['title'],
    //             'publishedAt' => $item['snippet']['publishedAt'],
    //             'url' => 'https://www.youtube.com/watch?v=' . $item['id']['videoId'],
    //             'thumbnail' => $item['snippet']['thumbnails']['high']['url'],
    //         ];
    //     }
    //     return $videos;
    // }
}
