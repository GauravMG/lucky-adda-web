<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        return $this->games();
    }

    public function games(): string
    {
        $data = [
            'title' => 'Games',
            'page_heading' => 'Games'
        ];

        return view('games', $data);
    }

    public function gameAnnounceResult($gameId): string
    {
        $data = [
            'title' => 'Announce Game Result',
            'page_heading' => 'Announce Game Result',
            'data' => [
                'gameId' => $gameId
            ]
        ];

        return view('game-announce-result', $data);
    }

    public function userWithdrawRequests(): string
    {
        $data = [
            'title' => 'User Withdraw Requests',
            'page_heading' => 'User Withdraw Requests'
        ];

        return view('user-withdraw-requests', $data);
    }
}
