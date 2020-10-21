<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImportController extends Controller
{
    public function index()
    {
        return view('imports.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $apiPosts = $this->getAPI();

        if (!$apiPosts)
            return back()->with('toast_error', 'Null response from API')->withInput();

        $this->saveRetrievedPosts($apiPosts['data']);

        return redirect()->route('imports.index')->with('toast_success', 'Manual import successful!');
    }

    public function getAPI() {
        $response = Http::get(env('REST_API'));
        return $response->json();
    }

    public function saveRetrievedPosts($apiPosts) {

        // Find admin
        $adminRole = Role::where('name', '=', 'Admin')->firstOrFail(); // find admin role
        $admin = User::where('role_id', '=', $adminRole['id'])->firstOrFail(); // find admin user

        // Save data
        foreach ($apiPosts as $post) {
            Post::create([
                'user_id' => $admin['id'],
                'title' => $post['title'],
                'description' => $post['description'],
                'created_at' => $post['publication_date']
            ]);
        }
    }
}
