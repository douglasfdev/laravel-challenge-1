<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class VideoController extends Controller {
    public function index()
    {
        $allVideos = Video::all();

        return response()->json($allVideos, 200);
    }

    public function getVideoById(string $uuid)
    {
        $video = Video::where('uuid', $uuid)->first();

        if (!$video) {
            return response()->json(["message" => "No one video with id $uuid, found."], 400);
        }
        
        return response()->json($video, 200);
    }

    public function store(Request $request)
    {
        $uuid = Uuid::uuid4()->toString();

        $validTitle = $request->filled('title');
        $validDuration = $request->filled('duration');
        $validDescription = $request->filled('description');
        $validUrl = $request->filled('url');

        if (!$validTitle || !$validDuration || !$validDescription || !$validUrl) {
            return response()->json(["message" => "The properties title, duration, description and url it's required"], 404);
        }

        $video = Video::create([
            'uuid' => $uuid,
            'title' => $request->input('title'),
            'duration' => $request->input('duration'),
            'description' => $request->input('description'),
            'url' => $request->input('url'),
        ]);

        return response()->json($video, 201);
    }

    /**
     * Atualiza um vídeo pelo seu UUID.
     *
     * @param Request $request
     * @param string $uuid
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateById(Request $request, string $uuid)
    {
        $data = $request->only('title', 'duration', 'description', 'url');
        $video = new Video();

        if (!$video) {
            return response()->json(["message" => "No one video with id $uuid, found to update"], 404);
        }

        $validTitle = $request->filled('title');
        $validDuration = $request->filled('duration');
        $validDescription = $request->filled('description');
        $validUrl = $request->filled('url');

        if (!$validTitle || !$validDuration || !$validDescription || !$validUrl) {
            return response()->json(["message" => "The properties title, duration, description and url it's required"], 404);
        }

        $video->where('uuid', $uuid)->update($data);
        $updatedVideo = $video->where('uuid', $uuid)->first();

        return response()->json($updatedVideo, 202);
    }

    public function deleteById(string $uuid)
    {
        $video = Video::where('uuid', $uuid);

        if (!$video) {
            return response()->json(["message" => "No one video with id $uuid, found to delete"], 404);
        }

        $video->delete($uuid);

        return response()->json('', 204);
    }
}