
<?php
$dataMap = talenthub\TalentCareerStatisticsModels\RugbyStatistics::$dataMap;
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
        <div class="collapse-content">
            <p class="text-center trigger"> Show stats for Forward</p>
            <div class="collapsed-content">
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1">
                        <table class="table">
                            <caption>Forward</caption>
                            <tr>
                                <th title="">GP</th>
                                <th title="">GS</th>
                                <th title="">GC</th>
                                <th title="">LTA</th>
                                <th title="">LTS</th>
                                <th title="">LJA</th>
                                <th title="">LJS</th>
                                <th title="">YC</th>
                                <th title="">RC</th>
                                <th title="">TR</th>
                                <th title="">TA</th>

                            </tr>
                            <tbody class="form_container">
                            <tr>
                                <td>{!! $sportStatistics[$i]->$dataMap["forward_GP"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["forward_GS"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["forward_GC"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["forward_LTA"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["forward_LTS"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["forward_LJA"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["forward_LJS"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["forward_YC"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["forward_RC"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["forward_TR"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["forward_TA"] !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="collapse-content">
            <p class="text-center trigger"> Show stats for Backline</p>
            <div class="collapsed-content">
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1">
                        <table class="table">
                            <caption>Backline</caption>
                            <tr>
                                <th title="">GP</th>
                                <th title="">GS</th>
                                <th title="">GC</th>
                                <th title="">YC</th>
                                <th title="">RC</th>
                                <th title="">TR</th>
                                <th title="">TA</th>

                            </tr>
                            <tbody class="form_container">
                            <tr>
                                <td>{!! $sportStatistics[$i]->$dataMap["back_GP"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["back_GS"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["back_GC"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["back_YC"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["back_RC"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["back_TR"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["back_TA"] !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="collapse-content">
            <p class="text-center trigger"> Show stats for Kicker</p>
            <div class="collapsed-content">
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1">
                        <table class="table">
                            <caption>Kicker</caption>
                            <tr>
                                <th title="">CA</th>
                                <th title="">CS</th>
                                <th title="">SC</th>
                                <th title="">LC</th>
                                <th title="">PA</th>
                                <th title="">PS</th>
                                <th title="">SP</th>
                                <th title="">LP</th>
                            </tr>
                            <tbody class="form_container">
                            <tr>
                                <td>{!! $sportStatistics[$i]->$dataMap["kick_CA"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["kick_CS"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["kick_SC"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["kick_LC"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["kick_PA"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["kick_PS"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["kick_SP"] !!}</td>
                                <td>{!! $sportStatistics[$i]->$dataMap["kick_LP"] !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
        ?>
