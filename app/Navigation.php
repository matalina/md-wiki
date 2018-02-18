<?php namespace App;

use Illuminate\Support\Collection;
use Storage;

class Navigation {
    public function get() {
        $disk = Storage::disk('notebook');
        $items = new Collection();

        return $this->recursiveMenuCreation($disk, $items, '/');
    }

    protected function recursiveMenuCreation($disk, $items, $path)
    {
        $dirs = $disk->directories($path);
        $files = $disk->files($path);

        foreach($files as $file) {
            $segments = explode('/',$file);
            $uri = explode('.', $segments[count($segments) - 1]);
            preg_match('/([0-9]*)\_?(.+)/', $uri[0], $match);
            $name = str_replace('-', ' ', $match[2]);
            $link = explode('.', $file);
            $link_uri = $link[0];
            $order = !empty($match[1])?$match[1]:$name;
            $items->put($order, [
                'name' => $name,
                'link' => str_replace('/','+',$link_uri),
            ]);
        }

        foreach($dirs as $dir) {
            $segments = explode('/',$dir);
            $uri = $segments[count($segments) - 1];
            preg_match('/([0-9]*)\_?(.+)/', $uri, $match);
            $new_dir = new Collection();
            $new_dir = $this->recursiveMenuCreation($disk, $new_dir, $dir);
            $name = str_replace('-', ' ', $match[2]);
            $order = !empty($match[1])?$match[1]:$name;
            $items->put($order, [
                'name' => $name,
                'folder' => $new_dir,
            ]);
        }

        return $items;
    }
}