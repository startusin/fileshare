<?php
namespace App\Helpers;

use App\Resource;

class FilesHelper {
    public function gen($field){
        do {
            $path = substr(strtolower(md5(microtime() . rand(1000, 9999))), 0, 12);
            $subpath = substr(strtolower(md5(microtime() . rand(1000, 9999))), 0, 24);
            $res = Resource::where($field, 'LIKE', $path . '/' . $subpath . '%')->first();
        } while($res);

        return $path. '/' .$subpath;
    }
}