<?php

namespace App\Services;

class AnnouncementService{

    function getMarketAnnouncement($marketId) {
        $announcement = \App\Models\Announcement::where('market_id', $marketId)->pluck('text');

        if(isset($announcement[0])) {
            return $announcement[0];
        }

        return '';
    }
}