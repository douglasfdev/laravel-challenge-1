<?php

namespace App\Repositories;

use App\Http\Requests\VideoFormRequest;
use App\Models\Video;

interface VideoRepository
{
    public function add(VideoFormRequest $request): Video;
}
