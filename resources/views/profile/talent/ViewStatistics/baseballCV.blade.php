<?php
        $dataMap = talenthub\TalentCareerStatisticsModels\BaseBallStatistics::$dataMap;
    for($i=0;$i<count($sportStatistics);$i++)
    {
?>
<div class="form_container">
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
            <div class="col-xs-12 col-lg-12 col-lg-offset-1">
                <table class="table">
                    <caption>Batting</caption>
                    <tr>
                        <th title="Games Played">GP</th>
                        <th title="At Bat">AB</th>
                        <th title="Runs Scored">R</th>
                        <th title="Hits">H</th>
                        <th title="Double">2B</th>
                        <th title="Triple">3B</th>
                        <th title="Home Runs">HR</th>
                        <th title="Runs Batted In">RBI</th>
                        <th title="Stolen Base">SB</th>
                        <th title="Caught Stealing">CS</th>
                        <th title="Base on Balls">BB</th>
                        <th title="Strike Out">SO</th>

                    </tr>
                    <tbody class="form_container">
                    <tr>
                        <td>{!! $sportStatistics[$i]->$dataMap["GP"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["AB"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["R"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["H"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["2B"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["3B"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["HR"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["RBI"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["SB"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["CS"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["BB"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["SO"] !!}</td>
                    </tr>
                    </tbody>
                </table>
                <table class="table">
                    <caption>Fielding</caption>
                    <tr>
                        <th title="Position">POS</th>
                        <th title="Games">G</th>
                        <th title="Games Started">GS</th>
                        <th title="Complete Games">CG</th>
                        <th title="Innings">Inn</th>
                        <th title="Chances">CH</th>
                        <th title="Put Out">PO</th>
                        <th title="Assists">A</th>
                        <th title="Errors">E</th>
                        <th title="Double Plays">DP</th>

                    </tr>
                    <tbody>
                    <tr>
                        <td>{!! $sportStatistics[$i]->$dataMap["POS"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["G"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["GS"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["CG"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["INN"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["CH"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["PO"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["A"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["E"] !!}</td>
                        <td>{!! $sportStatistics[$i]->$dataMap["DP"] !!}</td>
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
