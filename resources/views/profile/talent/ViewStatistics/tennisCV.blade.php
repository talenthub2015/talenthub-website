
<?php
use Illuminate\Support\Facades\Session;use talenthub\Repositories\SiteSessions;use talenthub\Repositories\SportsRepository;

$dataMap = talenthub\TalentCareerStatisticsModels\TennisStatistics::$dataMap;


for($i=0;$i<count($sportStatistics);$i++)
{

?>
<div class="form_container">
    <div class="carrer_statistics">

        <div class="row">
            <div class="col-xs-12 col-lg-12 col-lg-offset-1">

                <table class="table" width="300px" align="center">
                    <tr>
                        <th>Year</th>
                        <th>Age</th>
                        <th >Matches Played</th>
                        <th>Matches Won</th>
                        <th >Matches Lost</th>
                    </tr>
                    <tbody class="form_container">
                    <tr>
                        <td>{!! $sportStatistics[$i]->$dataMap["year"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["age"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["MP"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["MW"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["ML"] !!}</td>
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
