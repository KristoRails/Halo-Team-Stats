<?php

include '../halo-team-stats/php/database.php';

function outputPlayerStats()
{
    $list = getPlayerStats();
    $mike_picture = "<img src='../Halo-Team-Stats/images/profile-picture-mike.jpg' alt=''>";
    $avo_picture = "<img src='../Halo-Team-Stats/images/profile-picture-avo.jpg' alt=''>";
    $calvin_picture = "<img src='../Halo-Team-Stats/images/calvin_profile_picture.png' alt=''>";
    $chris_picture = "<img src='../Halo-Team-Stats/images/profile-picture.jpg' alt=''>";
    $current_picture = null;

    $chris_twitter = "https://twitter.com/TrueKristo";
    $calvin_twitter = "https://twitter.com/shadowindahood";
    $mike_twitter = "https://twitter.com/MKViableManatee";
    $avo_twitter = "https://twitter.com/Avo_JT";
    $current_twitter = null;

    for ($index = 0; $index < count($list); $index++) {
        if($index == 0)
        {
            $current_picture = $mike_picture;
            $current_twitter = $mike_twitter;
        }
        else if($index==1)
        {
            $current_picture = $avo_picture;
            $current_twitter = $avo_twitter;

        }
        else if($index == 2)
        {
            $current_picture = $calvin_picture;
            $current_twitter = $calvin_twitter;
        }
        else
        {
            $current_picture = $chris_picture;
            $current_twitter = $chris_twitter;
        }
        echo "<div class='row players-rows'>
    <div class='col-3 image-column'>
        ".$current_picture."
    </div>
    <div class='col-3 player-stats' id=".$index.">
        <h2>Player Stats</h2>
        <ul class='nav d-flex justify-content-between'>
            <li class='nav-item'>
                <h4>Kills</h4>
            </li>
            <li class='nav-item'>
                <h4>".$list[$index]->getKills()."</h4>
            </li>
        </ul>
        <ul class='nav d-flex justify-content-between'>
            <li class='nav-item'>
                <h4>Deaths</h4>
            </li>
            <li class='nav-item'>
                <h4>".$list[$index]->getDeaths()."</h4>
            </li>
        </ul>
        <ul class='nav d-flex justify-content-between'>
            <li class='nav-item'>
                <h4>Assists</h4>
            </li>
            <li class='nav-item'>
                <h4>".$list[$index]->getAssists()."</h4>
            </li>
        </ul>
        <ul class='nav d-flex justify-content-between'>
            <li class='nav-item'>
                <h4>K/D Ratio</h4>
            </li>
            <li class='nav-item'>
                <h4>".$list[$index]->calculateRatio()."</h4>
            </li>
        </ul>
    </div>
    <div class='col-2'>

    </div>
    <div class='col-3 player-social-media'>
        <h2>Social Media</h2>
        <ul class='nav'>
            <li class='nav-item'>
                <a href=".$current_twitter." target=_blank><img src='../Halo-Team-Stats/images/twitter.svg' alt=''></a>
            </li>
            <li class='nav-item'>
                <a href='#'><img src='../Halo-Team-Stats/images/twitch.svg' alt=''></a>
            </li>
            <li class='nav-item'>
                <a href='#'><img src='../Halo-Team-Stats/images/instagram.svg' alt=''></a>
            </li>
        </ul>
    </div>
</div>";
    }
}
