<?php

$data = compact('sportDataMap','sportStatistics');


switch($sport_type)
{
    case \talenthub\Repositories\SportsRepository::BASKETBALL:
    ?>
    @include('profile.talent.TalentCVForms.basketballCV',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::BASEBALL:
    ?>
    @include('profile.talent.TalentCVForms.baseballCV',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::RUGBY:
    ?>
    @include('profile.talent.TalentCVForms.rugbyCV',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::SOCCER:
    ?>
    @include('profile.talent.TalentCVForms.soccerCV',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::TRACK_FIELD:
    ?>
    @include('profile.talent.TalentCVForms.trackAndFieldCV',$data)
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
    @include('profile.talent.TalentCVForms.swimmingCV',$data)
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::TENNIS:
    ?>
    @include('profile.talent.TalentCVForms.tennisCV',$data)
    <?php
    break;

    default:
            return false;
            break;
}
        ?>