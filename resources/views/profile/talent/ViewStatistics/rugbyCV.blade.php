
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

        @if($sportStatistics[$i]->$dataMap["forward_GP"]!= "" || $sportStatistics[$i]->$dataMap["forward_GS"]!= "" ||
        $sportStatistics[$i]->$dataMap["forward_GC"]!= "" ||$sportStatistics[$i]->$dataMap["forward_LTA"]!= "" ||
        $sportStatistics[$i]->$dataMap["forward_LTS"]!= "" || $sportStatistics[$i]->$dataMap["forward_LJA"]!= "" ||
        $sportStatistics[$i]->$dataMap["forward_LJS"]!= "" || $sportStatistics[$i]->$dataMap["forward_YC"]!= "" ||
        $sportStatistics[$i]->$dataMap["forward_RC"]!= "" || $sportStatistics[$i]->$dataMap["forward_TR"]!= "" ||
        $sportStatistics[$i]->$dataMap["forward_TA"]!= "")
            <div class="collapse-content">
                <p class="text-center trigger"> Show stats for Forward</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-12 col-lg-12 col-lg-offset-1">
                            <table class="table">
                                <caption>Forward</caption>
                                <tr>
                                    <th title="Games Played">GP</th>
                                    <th title="Games Started">GS</th>
                                    <th title="Games Completed">GC</th>
                                    <th title="Lineout Throws Attempted">LTA</th>
                                    <th title="Lineout Throws Successful">LTS</th>
                                    <th title="Lineout Jumps Attempted">LJA</th>
                                    <th title="Line Jumps Successful">LJS</th>
                                    <th title="Yellow Cards">YC</th>
                                    <th title="Red Cards">RC</th>
                                    <th title="Tries">TR</th>
                                    <th title="Tries Assisted">TA</th>

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
        @endif

        @if($sportStatistics[$i]->$dataMap["back_GP"]!= "" || $sportStatistics[$i]->$dataMap["back_GS"]!= "" ||
        $sportStatistics[$i]->$dataMap["back_GC"]!= "" ||$sportStatistics[$i]->$dataMap["back_YC"]!= "" ||
        $sportStatistics[$i]->$dataMap["back_RC"]!= "" || $sportStatistics[$i]->$dataMap["back_TR"]!= "" ||
        $sportStatistics[$i]->$dataMap["back_TA"]!= "")

            <div class="collapse-content">
                <p class="text-center trigger"> Show stats for Backline</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-11 col-xs-offset-1">
                            <table class="table">
                                <caption>Backline</caption>
                                <tr>
                                    <th title="Games Played">GP</th>
                                    <th title="Games Started">GS</th>
                                    <th title="Games Completed">GC</th>
                                    <th title="Yellow Cards">YC</th>
                                    <th title="Red Cards">RC</th>
                                    <th title="Tries">TR</th>
                                    <th title="Tries Assisted">TA</th>

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
        @endif

        @if($sportStatistics[$i]->$dataMap["kick_CA"]!= "" || $sportStatistics[$i]->$dataMap["kick_CS"]!= "" ||
        $sportStatistics[$i]->$dataMap["kick_SC"]!= "" ||$sportStatistics[$i]->$dataMap["kick_LC"]!= "" ||
        $sportStatistics[$i]->$dataMap["kick_PA"]!= "" || $sportStatistics[$i]->$dataMap["kick_PS"]!= "" ||
        $sportStatistics[$i]->$dataMap["kick_SP"]!= "" || $sportStatistics[$i]->$dataMap["kick_LP"]!= "")
            <div class="collapse-content">
                <p class="text-center trigger"> Show stats for Kicker</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-11 col-xs-offset-1">
                            <table class="table">
                                <caption>Kicker</caption>
                                <tr>
                                    <th title="Conversions Attempted">CA</th>
                                    <th title="Conversions Successful ">CS</th>
                                    <th title="Short Range Conversions">SC</th>
                                    <th title="Long Range Conversions">LC</th>
                                    <th title="Penalties Attempted">PA</th>
                                    <th title="Penalties Successful ">PS</th>
                                    <th title="Short Range Penalties">SP</th>
                                    <th title="Long Range Penalties">LP</th>
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
        @endif
    </div>
</div>
<?php
}
        ?>
