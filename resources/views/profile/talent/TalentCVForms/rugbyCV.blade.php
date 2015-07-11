<p>Please provide as much information as you can.</p>
<?php
$dataMap = talenthub\TalentCareerStatisticsModels\RugbyStatistics::$dataMap;
if(count($sportStatistics)==0)
{
    $sportStatistics[0] = new talenthub\TalentCareerStatisticsModels\RugbyStatistics();
}
?>
<div class="duplicate_content_container form_container">
    <div class="duplicate_this_content carrer_statistics">

        {!! Form::input('hidden',$sportDataMap["forward"],'forward',null) !!}
        {!! Form::input('hidden',$sportDataMap["backline"],'backline',null) !!}
        {!! Form::input('hidden',$sportDataMap["kicker"],'kicker',null) !!}

        <div class="row form_container">
            <div class="col-xs-3 col-lg-2">
                {!! Form::label($sportDataMap["year"],'Year:') !!}
                {!! Form::text($sportDataMap["year"],$sportStatistics[0]->$dataMap["year"],['class'=>'form-control','data-validate'=>'year',
                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter year in correct format "YYYY".']) !!}
            </div>
            <div class="col-xs-3 col-lg-2">
                {!! Form::label($sportDataMap["age"],'Age:') !!}
                {!! Form::text($sportDataMap["age"],$sportStatistics[0]->$dataMap["age"],['class'=>'form-control','data-validate'=>'age',
                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter age correctly.']) !!}
            </div>
        </div>
        <div class="collapse-content">
            <p class="text-center trigger"> + Add Statistics for Forward</p>
            <div class="collapsed-content">
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1">
                        <table class="table">
                            <caption>Forward</caption>
                            <tr>
                                <th title="Games Played">GP</th>
                                <th title="Games Started">GS</th>
                                <th title="Games Completed">GC</th>
                                <th title="Lineout’s Attempted">LTA</th>
                                <th title="Lineout’s Successful">LTS</th>
                                <th title="Lineout Jumps Attempted">LJA</th>
                                <th title="Lineout Jumps Successful">LJS</th>
                                <th title="Yellow Cards">YC</th>
                                <th title="Red Cards">RC</th>
                                <th title="Tries">TR</th>
                                <th title="Tries Assisted">TA</th>

                            </tr>
                            <tbody class="form_container">
                            <tr>
                                <td>{!! Form::text($sportDataMap["forward_GP"],$sportStatistics[0]->$dataMap["forward_GP"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_GS"],$sportStatistics[0]->$dataMap["forward_GS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_GC"],$sportStatistics[0]->$dataMap["forward_GC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_LTA"],$sportStatistics[0]->$dataMap["forward_LTA"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_LTS"],$sportStatistics[0]->$dataMap["forward_LTS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_LJA"],$sportStatistics[0]->$dataMap["forward_LJA"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_LJS"],$sportStatistics[0]->$dataMap["forward_LJS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_YC"],$sportStatistics[0]->$dataMap["forward_YC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_RC"],$sportStatistics[0]->$dataMap["forward_RC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_TR"],$sportStatistics[0]->$dataMap["forward_TR"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_TA"],$sportStatistics[0]->$dataMap["forward_TA"],['class'=>'form-control']) !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="collapse-content">
            <p class="text-center trigger"> + Add Statistics for Backline</p>
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
                                <td>{!! Form::text($sportDataMap["back_GP"],$sportStatistics[0]->$dataMap["back_GP"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["back_GS"],$sportStatistics[0]->$dataMap["back_GS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["back_GC"],$sportStatistics[0]->$dataMap["back_GC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["back_YC"],$sportStatistics[0]->$dataMap["back_YC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["back_RC"],$sportStatistics[0]->$dataMap["back_RC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["back_TR"],$sportStatistics[0]->$dataMap["back_TR"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["back_TA"],$sportStatistics[0]->$dataMap["back_TA"],['class'=>'form-control']) !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="collapse-content">
            <p class="text-center trigger"> + Add Statistics for Kicker</p>
            <div class="collapsed-content">
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1">
                        <table class="table">
                            <caption>Kicker</caption>
                            <tr>
                                <th title="Conversions Attempted">CA</th>
                                <th title="Conversions Scored">CS</th>
                                <th title="Short Conversions">SC</th>
                                <th title="Long conversions">LC</th>
                                <th title="Punts Attempted">PA</th>
                                <th title="Punts Successful">PS</th>
                                <th title="Short Punts">SP</th>
                                <th title="Long Punts">LP</th>
                            </tr>
                            <tbody class="form_container">
                            <tr>
                                <td>{!! Form::text($sportDataMap["kick_CA"],$sportStatistics[0]->$dataMap["kick_CA"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["kick_CS"],$sportStatistics[0]->$dataMap["kick_CS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["kick_SC"],$sportStatistics[0]->$dataMap["kick_SC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["kick_LC"],$sportStatistics[0]->$dataMap["kick_LC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["kick_PA"],$sportStatistics[0]->$dataMap["kick_PA"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["kick_PS"],$sportStatistics[0]->$dataMap["kick_PS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["kick_SP"],$sportStatistics[0]->$dataMap["kick_SP"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["kick_LP"],$sportStatistics[0]->$dataMap["kick_LP"],['class'=>'form-control']) !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    </div>
    <div class="place_duplicate_content_here career_statistics_duplicated">
        <?php
        if(count($sportStatistics)>1)
        {
        for($i=1;$i<count($sportStatistics);$i++)
        {
        ?>
        <div class="content_duplicated">

            {!! Form::input('hidden',$sportDataMap["forward"],'forward',null) !!}
            {!! Form::input('hidden',$sportDataMap["backline"],'backline',null) !!}
            {!! Form::input('hidden',$sportDataMap["kicker"],'kicker',null) !!}

            <div class="row form_container">
                <div class="col-xs-3 col-lg-2">
                    {!! Form::label($sportDataMap["year"],'Year:') !!}
                    {!! Form::text($sportDataMap["year"],$sportStatistics[$i]->$dataMap["year"],['class'=>'form-control','data-validate'=>'year',
                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter year in correct format "YYYY".']) !!}
                </div>
                <div class="col-xs-3 col-lg-2">
                    {!! Form::label($sportDataMap["age"],'Age:') !!}
                    {!! Form::text($sportDataMap["age"],$sportStatistics[$i]->$dataMap["age"],['class'=>'form-control','data-validate'=>'age',
                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter age correctly.']) !!}
                </div>
            </div>

            <div class="collapse-content">
                <p class="text-center trigger"> + Add Statistics for Forward</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-11 col-xs-offset-1">
                            <table class="table">
                                <caption>Forward</caption>
                                <tr>
                                    <th title="Games Played">GP</th>
                                    <th title="Games Started">GS</th>
                                    <th title="Games Completed">GC</th>
                                    <th title="Lineout’s Attempted">LTA</th>
                                    <th title="Lineout’s Successful">LTS</th>
                                    <th title="Lineout Jumps Attempted">LJA</th>
                                    <th title="Lineout Jumps Successful">LJS</th>
                                    <th title="Yellow Cards">YC</th>
                                    <th title="Red Cards">RC</th>
                                    <th title="Tries">TR</th>
                                    <th title="Tries Assisted">TA</th>

                                </tr>
                                <tbody class="form_container">
                                <tr>
                                    <td>{!! Form::text($sportDataMap["forward_GP"],$sportStatistics[$i]->$dataMap["forward_GP"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_GS"],$sportStatistics[$i]->$dataMap["forward_GS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_GC"],$sportStatistics[$i]->$dataMap["forward_GC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_LTA"],$sportStatistics[$i]->$dataMap["forward_LTA"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_LTS"],$sportStatistics[$i]->$dataMap["forward_LTS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_LJA"],$sportStatistics[$i]->$dataMap["forward_LJA"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_LJS"],$sportStatistics[$i]->$dataMap["forward_LJS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_YC"],$sportStatistics[$i]->$dataMap["forward_YC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_RC"],$sportStatistics[$i]->$dataMap["forward_RC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_TR"],$sportStatistics[$i]->$dataMap["forward_TR"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_TA"],$sportStatistics[$i]->$dataMap["forward_TA"],['class'=>'form-control']) !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="collapse-content">
                <p class="text-center trigger"> + Add Statistics for Backline</p>
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
                                    <td>{!! Form::text($sportDataMap["back_GP"],$sportStatistics[$i]->$dataMap["back_GP"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["back_GS"],$sportStatistics[$i]->$dataMap["back_GS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["back_GC"],$sportStatistics[$i]->$dataMap["back_GC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["back_YC"],$sportStatistics[$i]->$dataMap["back_YC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["back_RC"],$sportStatistics[$i]->$dataMap["back_RC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["back_TR"],$sportStatistics[$i]->$dataMap["back_TR"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["back_TA"],$sportStatistics[$i]->$dataMap["back_TA"],['class'=>'form-control']) !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="collapse-content">
                <p class="text-center trigger"> + Add Statistics for Kicker</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-11 col-xs-offset-1">
                            <table class="table">
                                <caption>Kicker</caption>
                                <tr>
                                    <th title="Conversions Attempted">CA</th>
                                    <th title="Conversions Scored">CS</th>
                                    <th title="Short Conversions">SC</th>
                                    <th title="Long conversions">LC</th>
                                    <th title="Punts Attempted">PA</th>
                                    <th title="Punts Successful">PS</th>
                                    <th title="Short Punts">SP</th>
                                    <th title="Long Punts">LP</th>
                                </tr>
                                <tbody class="form_container">
                                <tr>
                                    <td>{!! Form::text($sportDataMap["kick_CA"],$sportStatistics[$i]->$dataMap["kick_CA"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["kick_CS"],$sportStatistics[$i]->$dataMap["kick_CS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["kick_SC"],$sportStatistics[$i]->$dataMap["kick_SC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["kick_LC"],$sportStatistics[$i]->$dataMap["kick_LC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["kick_PA"],$sportStatistics[$i]->$dataMap["kick_PA"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["kick_PS"],$sportStatistics[$i]->$dataMap["kick_PS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["kick_SP"],$sportStatistics[$i]->$dataMap["kick_SP"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["kick_LP"],$sportStatistics[$i]->$dataMap["kick_LP"],['class'=>'form-control']) !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="close_duplicate delete_duplicate_content_button">X</div>
        </div>
        <?php
        }
        }
        ?>
    </div>
    <div class="text-center">
        <button class="btn btn-info statistic_button duplicate_content_button" type="button"
                data-target-duplicate-content=".carrer_statistics"
                data-place-duplicate-content=".career_statistics_duplicated">Add More Sport Statistic</button>
    </div>
</div>
