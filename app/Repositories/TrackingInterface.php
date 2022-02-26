<?php


namespace App\Repositories;

interface TrackingInterface
{
    /**
     * @return mixed
     */
    public function showTrackingLink();

    /**
     * @return mixed
     */
    public function getDataFromLink($request);

}