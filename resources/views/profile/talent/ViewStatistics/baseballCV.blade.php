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
            <div class="col-xs-11 col-xs-offset-1">
                <table class="table">
                    <caption>Batting</caption>
                    <tr>
                        <th title="">GP</th>
                        <th title="">AB</th>
                        <th title="">R</th>
                        <th title="">H</th>
                        <th title="">2B</th>
                        <th title="">3B</th>
                        <th title="">HR</th>
                        <th title="">RBI</th>
                        <th title="">SB</th>
                        <th title="">CS</th>
                        <th title="">BB</th>
                        <th title="">SO</th>

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
                        <th title="">POS</th>
                        <th title="">G</th>
                        <th title="">GS</th>
                        <th title="">CG</th>
                        <th title="">Inn</th>
                        <th title="">CH</th>
                        <th title="">PO</th>
                        <th title="">A</th>
                        <th title="">E</th>
                        <th title="">DP</th>

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
