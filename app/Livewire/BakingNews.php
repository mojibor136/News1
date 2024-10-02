<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BakingNews as BakingNewsModel;

class BakingNews extends Component {

    public $news;
    public $newsId;

    public function CreateNews() {
        $this->validate( [
            'news' => 'required',
        ] );

        BakingNewsModel::create( [
            'news' => $this->news,
        ] );

        session()->flash( 'message', 'News created successfully!' );
        $this->reset( 'news' );
    }

    public function editNews( $id ) {
        $news = BakingNewsModel::findOrFail( $id );
        $this->newsId = $news->id;
        $this->news = $news->news;
    }

    public function updateNews() {
        $this->validate( [
            'news' => 'required|string|max:255',
        ] );

        $news = BakingNewsModel::findOrFail( $this->newsId );
        $news->update( [
            'news' => $this->news,
        ] );

        session()->flash( 'message', 'News updated successfully!' );
        $this->reset( 'news' );
    }

    public function deleteNews( $id ) {
        BakingNewsModel::find( $id )->delete();
        session()->flash( 'message', 'News deleted successfully!' );
    }

    public function render() {
        $newse = BakingNewsModel::paginate( 10 );
        return view( 'livewire.baking-news', [ 'newse' => $newse ] );
    }
}
