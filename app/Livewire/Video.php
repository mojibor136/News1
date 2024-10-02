<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Video as VideoModel;

class Video extends Component {
    use WithFileUploads;

    public $title;
    public $video;

    public function CreateVideo() {
        $this->validate( [
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimetypes:video/mp4,video/webm,video/x-msvideo,video/quicktime|max:102400',
        ] );

        if ( $this->video ) {
            $videoPath = $this->video->store( 'videos', 'public' );

            VideoModel::create( [
                'title' => $this->title,
                'video' => $videoPath,
            ] );

            session()->flash( 'message', 'Video uploaded successfully!' );

            $this->reset( [ 'title', 'video' ] );
        }
    }

    public function render() {
        return view( 'livewire.video' );
    }
}
