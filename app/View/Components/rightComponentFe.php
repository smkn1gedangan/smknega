<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class rightComponentFe extends Component
{
    /**
     * Create a new component instance.
     */
    public $channelId = "";
    public $videos;

    public function __construct($channelId)
    {
        $this->channelId = $channelId;
        $this->videos = $this->fetchLatestVideos();
    }

    /**
     * Mengambil dua video terbaru dari YouTube
     */
    public function fetchLatestVideos()
    {
        return cache()->remember('latest_youtube_videos', 60, function () {
            $apiKey = env('YOUTUBE_API_KEY');
            $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId={$this->channelId}&order=date&maxResults=2&key={$apiKey}";
    
            $response = Http::get($url);
    
            return $response->successful() ? $response->json()['items'] : [];
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.right-component-fe');
    }
}
