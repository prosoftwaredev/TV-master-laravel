<?php namespace Vinelab\Youtube;

use Illuminate\Support\Collection;

class VideoCollection extends Collection {

    protected $items = [];

    /**
     * Return the Channel data
     * @return array
     */
    public function get_videos()
    {
        return $this->items;
    }
}
