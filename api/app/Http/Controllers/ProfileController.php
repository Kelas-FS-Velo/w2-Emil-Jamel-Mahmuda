<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            "name" => "Emil Jamel Mahmuda",
            "role" => "Full Stack Developer",
            "bio" => "Passionate about creating beautiful and functional websites. Always learning and exploring new technologies.",
            "avatar" => "https://avatars.githubusercontent.com/u/45848997?v=4",
            "social" => [
                "facebook" => "https://facebook.com/memiljamel",
                "linkedin" => "https://linkedin.com/in/memiljamel",
                "twitter" => "https://twitter.com/memiljamel",
                "github" => "https://github.com/memiljamel"
            ]
        ]);
    }
}
