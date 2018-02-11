
<?php
use Illuminate\Support\Facades\Session;use talenthub\Repositories\SiteSessions;use talenthub\Repositories\SportsRepository;

$dataMap = talenthub\TalentCareerStatisticsModels\SwimmingStatistics::$dataMap;


for($i=0;$i<count($sportStatistics);$i++)
{
?>
<div class="form_container">
    <div class="carrer_statistics">
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-lg-offset-1">
                <table class="table">
                    <caption>Event Detail</caption>
                    <tr>
                        <th width="150px">Event Name</th>
                        <th>Distance</th>
                        <th >Type</th>
                        <th >min</th>
                        <th >sec</th>
                        <th>hun</th>
                        <th >date</th>
                    </tr>
                    <tbody class="form_container">
                    <tr>
                        <td>{!! $sportStatistics[$i]->$dataMap["event_name"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["distance"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["type"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["min"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["sec"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["hun"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["date"] !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php
}
?>

