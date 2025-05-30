<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function index(): string
    {
        return $this->dashboard();
    }

    public function dashboard(): string
    {
        $data = [
            'title' => 'Dashboard',
            'page_heading' => 'Dashboard'
        ];

        return view('dashboard', $data);
    }

    public function reportBetsByNumbers(): string
    {
        $gameId = $this->request->getGet('gameId');

        $data = [
            'title' => 'Report - Bets By Numbers',
            'page_heading' => 'Report - Bets By Numbers',
            'data' => [
                'gameId' => $gameId
            ]
        ];

        return view('report-bets-by-numbers', $data);
    }

    public function reportBetsByUsers(): string
    {
        $gameId = $this->request->getGet('gameId');
        $number = $this->request->getGet('number');

        $data = [
            'title' => 'Report - Bets By Users',
            'page_heading' => 'Report - Bets By Users',
            'data' => [
                'gameId' => $gameId,
                'number' => $number
            ]
        ];

        return view('report-bets-by-users', $data);
    }

    public function games(): string
    {
        $data = [
            'title' => 'Games',
            'page_heading' => 'Games'
        ];

        return view('games', $data);
    }

    public function gameAdd(): string
    {
        $data = [
            'title' => 'Add Game',
            'page_heading' => 'Add Game'
        ];

        return view('add-game', $data);
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

        return view('announce-game-result', $data);
    }

    public function gameResultChart($gameId): string
    {
        $data = [
            'title' => 'Game Result Chart',
            'page_heading' => 'Game Result Chart',
            'data' => [
                'gameId' => $gameId
            ]
        ];

        return view('game-result-chart', $data);
    }

    public function gameEdit($gameId): string
    {
        $data = [
            'title' => 'Edit Game',
            'page_heading' => 'Edit Game',
            'data' => [
                'gameId' => $gameId
            ]
        ];

        return view('add-game', $data);
    }

    public function resultChart(): string
    {
        $data = [
            'title' => 'Result Chart',
            'page_heading' => 'Result Chart'
        ];

        return view('result-chart', $data);
    }

    public function users(): string
    {
        $data = [
            'title' => 'Users',
            'page_heading' => 'Users'
        ];

        return view('users', $data);
    }

    public function userDetails($userId): string
    {
        $data = [
            'title' => 'User Details',
            'page_heading' => 'User Details',
            'data' => [
                'userId' => $userId
            ]
        ];

        return view('user-details', $data);
    }

    public function userWithdrawRequests(): string
    {
        $data = [
            'title' => 'User Withdraw Requests',
            'page_heading' => 'User Withdraw Requests'
        ];

        return view('user-withdraw-requests', $data);
    }

    public function transactions(): string
    {
        $data = [
            'title' => 'Transactions',
            'page_heading' => 'Transactions'
        ];

        return view('transactions', $data);
    }

    public function appSettings(): string
    {
        $data = [
            'title' => 'App Settings',
            'page_heading' => 'App Settings'
        ];

        return view('app-settings', $data);
    }
}
