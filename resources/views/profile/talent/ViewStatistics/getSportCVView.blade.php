<?php
//Reading mode, whether the template is requested in read mode or not
//If $rMode is true, it is read mode or, if it is false, then it is write mode


$data = compact('sportStatistics');


switch($sport_type)
{
    case \talenthub\Repositories\SportsRepository::BASKETBALL:
    ?>
    @include('profile.talent.ViewStatistics.basketballCV',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::BASEBALL:
    ?>
    @include('profile.talent.ViewStatistics.baseballCV',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::RUGBY:
    ?>
    @include('profile.talent.ViewStatistics.rugbyCV',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::SOCCER:
    ?>
    @include('profile.talent.ViewStatistics.soccerCV',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::TRACK_FIELD:
    ?>
    @include('profile.talent.ViewStatistics.trackAndFieldCV',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::FOOTBALL:
    ?>
    @include('',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::SOFTBALL:
    ?>
    @include('',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::SWIMMING:
    ?>
    @include('profile.talent.ViewStatistics.swimmingCV',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::TENNIS:
    ?>
    @include('',$data)
    <?php
    break;

    default:
            return false;
            break;
}
        ?>