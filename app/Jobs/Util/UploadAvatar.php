<?php
/**
 * Africa Novatech (https://africanovatech.com).
 *
 * @link https://africanovatech.com source repository
 *
 * @copyright Copyright (c) 2023. Invoice Novatech LLC (https://africanovatech.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace App\Jobs\Util;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\File;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class UploadAvatar implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;

    protected $directory;

    public function __construct($file, $directory)
    {
        $this->file = $file;
        $this->directory = $directory;
    }

    public function handle() : ?string
    {
        $tmp_file = sha1(time()).'.png';

        $im = imagecreatefromstring(file_get_contents($this->file));
        imagealphablending($im, false);
        imagesavealpha($im, true);
        $file_png = imagepng($im, sys_get_temp_dir().'/'.$tmp_file);

        $path = Storage::putFile($this->directory, new File(sys_get_temp_dir().'/'.$tmp_file));

        $url = Storage::url($path);

        //return file path
        if ($url) {
            return $url;
        } else {
            return null;
        }
    }
}
