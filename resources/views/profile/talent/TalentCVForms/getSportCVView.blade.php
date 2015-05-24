<?php
switch($sport_type)
{
    case \talenthub\Repositories\SportsRepository::BASKETBALL:
    ?>
    @include('profile.talent.TalentCVForms.basketballCV',compact('sportDataMap','sportStatistics'))
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::BASEBALL:
    ?>
    @include('profile.talent.TalentCVForms.baseballCV',compact('sportDataMap','sportStatistics'))
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::RUGBY:
    ?>
    @include('profile.talent.TalentCVForms.rugbyCV',compact('sportDataMap','sportStatistics'))
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::SOCCER:
    ?>
    @include('profile.talent.TalentCVForms.soccerCV',compact('sportDataMap','sportStatistics'))
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::TRACK_FIELD:
    ?>
    @include('profile.talent.TalentCVForms.trackAndFieldCV',compact('sportDataMap','sportStatistics'))
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::FOOTBALL:
    ?>
    @include('',compact('sportDataMap','sportStatistics'))
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::SOFTBALL:
    ?>
    @include('',compact('sportDataMap','sportStatistics'))
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::SWIMMING:
    ?>
    @include('profile.talent.TalentCVForms.swimmingCV',compact('sportDataMap','sportStatistics'))
    <?php
    break;
    case \talenthub\Repositories\SportsRepository::TENNIS:
    ?>
    @include('',compact('sportDataMap','sportStatistics'))
    <?php
    break;

    default:
            return false;
            break;
}
        ?>