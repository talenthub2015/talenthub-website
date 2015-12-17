<?php
$dataMap = talenthub\TalentCareerStatisticsModels\BasketBallStatistics::$dataMap;
for($i=0;$i<count($sportStatistics);$i++)
{
?>
<div class=" form_container">
    <div class="carrer_statistics">
        <div class="row form_container">
            <div class="col-xs-3 col-lg-2">
                <div class="user_data_container">
                    <label><strong>Year:</strong></label>
                    <span class="user_data">{{$sportStatistics[$i]->$dataMap["year"]}}</span>
                </div>
            </div>
            <div class="col-xs-3 col-lg-2">
                <label><strong>Age:</strong></label>
                <span class="user_data">{{$sportStatistics[$i]->$dataMap["age"]}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-11 col-xs-offset-1">
                <table class="table">
                    <tr>
                        <th title="Games Played">GP</th>
                        <th title="Games Started">GS</th>
                        <th title="Points">PTS</th>
                        <th title="Offensive Rebounds">OREB</th>
                        <th title="Rebounds">REB</th>
                        <th title="Assists">AST</th>
                        <th title="Steals">STL</th>
                        <th title="Blocks">BLK</th>
                        <th title="Turnovers">TOV</th>

                    </tr>
                    <tbody class="form_container">
                    <tr>
                        <td>{!! $sportStatistics[$i]->$dataMap["GP"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["GS"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["PTS"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["OREB"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["REB"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["AST"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["STL"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["BLK"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["TOV"] !!}</td>
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