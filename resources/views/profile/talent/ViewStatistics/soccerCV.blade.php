
<?php
$dataMap = talenthub\TalentCareerStatisticsModels\SoccerStatistics::$dataMap;

?>
<?php

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

        @if($sportStatistics[$i]->$dataMap["goal_GP"] != "" || $sportStatistics[$i]->$dataMap["goal_GS"] != "" || $sportStatistics[$i]->$dataMap["goal_W"] != "" ||
            $sportStatistics[$i]->$dataMap["goal_D"] != "" || $sportStatistics[$i]->$dataMap["goal_L"] != "" || $sportStatistics[$i]->$dataMap["goal_GA"] != "" ||
            $sportStatistics[$i]->$dataMap["goal_PKG"] != "" || $sportStatistics[$i]->$dataMap["goal_CS"] != "" || $sportStatistics[$i]->$dataMap["goal_YC"] != "" ||
            $sportStatistics[$i]->$dataMap["goal_RC"] != "" || $sportStatistics[$i]->$dataMap["goal_MP"] != "")
            <div class="collapse-content">
                <p class="text-center trigger"> Show stats for GoalKeeper</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-11 col-xs-offset-1">
                            <table class="table">
                                <tr>
                                    <th title="">GP</th>
                                    <th title="">GS</th>
                                    <th title="">W</th>
                                    <th title="">D</th>
                                    <th title="">L</th>
                                    <th title="">GA</th>
                                    <th title="">PKG</th>
                                    <th title="">CS</th>
                                    <th title="">YC</th>
                                    <th title="">RC</th>
                                    <th title="">MP</th>

                                </tr>
                                <tbody class="form_container">
                                <tr>
                                    <td>{!! $sportStatistics[$i]->$dataMap["goal_GP"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["goal_GS"] !!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["goal_W"] !!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["goal_D"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["goal_L"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["goal_GA"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["goal_PKG"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["goal_CS"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["goal_YC"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["goal_RC"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["goal_MP"]!!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if($sportStatistics[$i]->$dataMap["defender_GP"] != "" || $sportStatistics[$i]->$dataMap["defender_GS"] != "" ||
            $sportStatistics[$i]->$dataMap["defender_G"] != "" || $sportStatistics[$i]->$dataMap["defender_A"] != "" ||
            $sportStatistics[$i]->$dataMap["defender_CS"] != "" || $sportStatistics[$i]->$dataMap["defender_YC"] != "" ||
            $sportStatistics[$i]->$dataMap["defender_RC"] != "" || $sportStatistics[$i]->$dataMap["defender_MP"] != "")
            <div class="collapse-content">
                <p class="text-center trigger"> Show stats for Defender</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-11 col-xs-offset-1">
                            <table class="table">
                                <tr>
                                    <th title="">GP</th>
                                    <th title="">GS</th>
                                    <th title="">G</th>
                                    <th title="">A</th>
                                    <th title="">CS</th>
                                    <th title="">YC</th>
                                    <th title="">RC</th>
                                    <th title="">MP</th>

                                </tr>
                                <tbody class="form_container">
                                <tr>
                                    <td>{!! $sportStatistics[$i]->$dataMap["defender_GP"] !!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["defender_GS"] !!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["defender_G"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["defender_A"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["defender_CS"] !!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["defender_YC"] !!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["defender_RC"] !!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["defender_MP"] !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($sportStatistics[$i]->$dataMap["midfield_GP"] != "" || $sportStatistics[$i]->$dataMap["midfield_GS"] != "" ||
            $sportStatistics[$i]->$dataMap["midfield_G"] != "" || $sportStatistics[$i]->$dataMap["midfield_A"] != "" ||
            $sportStatistics[$i]->$dataMap["midfield_YC"] != "" || $sportStatistics[$i]->$dataMap["midfield_RC"] != "" ||
            $sportStatistics[$i]->$dataMap["midfield_MP"] != "")
            <div class="collapse-content">
                <p class="text-center trigger"> Show stats for Midfield</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-11 col-xs-offset-1">
                            <table class="table">
                                <tr>
                                    <th title="">GP</th>
                                    <th title="">GS</th>
                                    <th title="">G</th>
                                    <th title="">A</th>
                                    <th title="">YC</th>
                                    <th title="">RC</th>
                                    <th title="">MP</th>
                                </tr>
                                <tbody class="form_container">
                                <tr>
                                    <td>{!! $sportStatistics[$i]->$dataMap["midfield_GP"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["midfield_GS"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["midfield_G"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["midfield_A"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["midfield_YC"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["midfield_RC"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["midfield_MP"]!!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($sportStatistics[$i]->$dataMap["forward_GP"] != "" || $sportStatistics[$i]->$dataMap["forward_GS"] != "" ||
            $sportStatistics[$i]->$dataMap["forward_G"] != "" || $sportStatistics[$i]->$dataMap["forward_A"] != "" ||
            $sportStatistics[$i]->$dataMap["forward_PKG"] != "" || $sportStatistics[$i]->$dataMap["forward_YC"] != "" ||
            $sportStatistics[$i]->$dataMap["forward_RC"] != "" || $sportStatistics[$i]->$dataMap["forward_MP"] != "")
            <div class="collapse-content">
                <p class="text-center trigger"> Show stats for Forward</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-11 col-xs-offset-1">
                            <table class="table">
                                <tr>
                                    <th title="">GP</th>
                                    <th title="">GS</th>
                                    <th title="">G</th>
                                    <th title="">A</th>
                                    <th title="">PKG</th>
                                    <th title="">YC</th>
                                    <th title="">RC</th>
                                    <th title="">MP</th>
                                </tr>
                                <tbody class="form_container">
                                <tr>
                                    <td>{!! $sportStatistics[$i]->$dataMap["forward_GP"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["forward_GS"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["forward_G"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["forward_A"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["forward_PKG"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["forward_YC"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["forward_RC"]!!}</td>
                                    <td>{!! $sportStatistics[$i]->$dataMap["forward_MP"]!!}</td>
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
