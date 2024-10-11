<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Video as VideoModel;

class Video extends Component {

    public $videoId, $title, $video;

    protected $rules = [
        'title' => 'required|string|max:255',
        'video' => 'required|url',
    ];

    public function CreateVideo() {
        $this->validate();

        $videoId = '';
        if ( preg_match( '/(?:\?v=|\/embed\/|\/v\/|youtu\.be\/|\/watch\?v=|\/watch\?.+&v=)([^&?\/\s]{11})/i', $this->video, $matches ) ) {
            $videoId = $matches[ 1 ];
        }

        VideoModel::create( [
            'title' => $this->title,
            'video' => 'https://www.youtube.com/embed/' . $videoId,
        ] );

        $this->reset( [ 'title', 'video' ] );

        session()->flash( 'message', 'Video successfully saved.' );
    }

    public function editVideo( $id ) {
        $video = VideoModel::findOrFail( $id );
        $this->videoId = $video->id;
        $this->video = $video->video;
        $this->title = $video->title;
    }

    public function UpdateVideo() {
        $this->validate( [
            'title' => 'required|string|max:255',
            'video' => 'required|url',
        ] );

        $videoId = '';
        if ( preg_match( '/(?:\?v=|\/embed\/|\/v\/|youtu\.be\/|\/watch\?v=|\/watch\?.+&v=)([^&?\/\s]{11})/i', $this->video, $matches ) ) {
            $videoId = $matches[ 1 ];
        }

        $video = VideoModel::findOrFail( $this->videoId );
        $video->update( [
            'title' => $this->title,
            'video' => 'https://www.youtube.com/embed/' . $videoId,
        ] );

        $this->reset( [ 'title', 'video', 'videoId' ] );

        session()->flash( 'message', 'Video updated successfully.' );
    }

    public function deleteVideo( $id ) {
        VideoModel::findOrFail( $id )->delete();
        session()->flash( 'message', 'Video successfully delete.' );
    }

    public function render() {
        $videos = VideoModel::all();
        return view( 'livewire.video', [ 'videos' => $videos ] );
    }
}
