<p>Please provide as much information as you can.</p>
<?php
$dataMap = talenthub\TalentCareerStatisticsModels\TrackAndFieldStatistics::$dataMap;

for($i=0;$i<count($sportStatistics);$i++)
{

?>
<div class=" form_container">
    <div class="carrer_statistics">

        <div class="row">
            <div class="col-xs-11 col-xs-offset-1">
                <table class="table">
                    <caption>Event Detail</caption>
                    <tr>
                        <th width="150px">Event Name</th>
                        <th>Seasons</th>
                        <th colspan="4" class="  text-center">Best 1</th>
                        <th colspan="4" class="  text-center">Best 2</th>
                    </tr>
                    <tr>
                        <th title=""></th>
                        <th title=""></th>
                        <th title="">min</th>
                        <th title="">sec</th>
                        <th title="">hun</th>
                        <th title="">date</th>
                        <th title="">min</th>
                        <th title="">sec</th>
                        <th title="">hun</th>
                        <th title="" >date</th>

                    </tr>
                    <tbody class="form_container">
                    <tr>
                        <td>{!! $sportStatistics[0]->$dataMap["event_name"] !!}</td>
                        <td>{!! $sportStatistics[0]->$dataMap["seasons"] !!}</td>
                        <td>{!! $sportStatistics[0]->$dataMap["best1_min"] !!}</td>
                        <td>{!! $sportStatistics[0]->$dataMap["best1_sec"] !!}</td>
                        <td>{!! $sportStatistics[0]->$dataMap["best1_hun"] !!}</td>
                        <td>{!! $sportStatistics[0]->$dataMap["best1_date"] !!}</td>
                        <td>{!! $sportStatistics[0]->$dataMap["best2_min"] !!}</td>
                        <td>{!! $sportStatistics[0]->$dataMap["best2_sec"] !!}</td>
                        <td>{!! $sportStatistics[0]->$dataMap["best2_hun"] !!}</td>
                        <td>{!! $sportStatistics[0]->$dataMap["best2_date"] !!}</td>
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
