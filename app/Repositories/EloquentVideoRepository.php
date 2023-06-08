<?php

namespace App\Repositories;

use App\Http\Requests\VideoFormRequest;
use App\Models\Video;
use Illuminate\Support\Facades\DB;

class EloquentVideoRepository implements VideoRepository
{
    public function add(VideoFormRequest $request): Video
    {
        return DB::transaction(function () use ($request) {
            $serie = Video::create([
                'nome' => $request->nome,
                'cover' => $request->coverPath,
            ]);
            $seasons = [];
            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i,
                ];
            }

            return $serie;
        });
    }
}
