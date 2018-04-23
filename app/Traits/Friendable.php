<?php

namespace App\Traits;

use App\Friendship;

trait Friendable
{
    public function add_friend($user_requested_id)
    {
        $friendships = Friendship::create([
            'requester' => $this->id,
            'user_requested' => $user_requested_id
        ]);

        if ($friendships)
        {
            return response()->json($friendships, 200);
        }
        return response()->json('fails', 501);
    }

    public function accept_friend($requester)
    {
        $friendships = Friendship::where('requester', $requester)->where('user_requested', $this->id)->first();

        if ($friendships)
        {
            $friendships->update([
                'status' => 1
            ]);

            return response()->json('ok', 200);
        }
        return response()->json('fails', 501);
    }
}