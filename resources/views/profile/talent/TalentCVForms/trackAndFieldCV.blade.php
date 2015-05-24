<p>Please provide as much information as you can.</p>
<?php
$dataMap = talenthub\TalentCareerStatisticsModels\TrackAndFieldStatistics::$dataMap;
if(count($sportStatistics)==0)
{
    $sportStatistics[0] = new talenthub\TalentCareerStatisticsModels\TrackAndFieldStatistics();
}

?>
<div class="duplicate_content_container form_container">
    <div class="duplicate_this_content carrer_statistics">

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
                        <td>{!! Form::text($sportDataMap["event_name"],$sportStatistics[0]->$dataMap["event_name"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["seasons"],$sportStatistics[0]->$dataMap["seasons"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["best1_min"],$sportStatistics[0]->$dataMap["best1_min"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["best1_sec"],$sportStatistics[0]->$dataMap["best1_sec"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["best1_hun"],$sportStatistics[0]->$dataMap["best1_hun"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["best1_date"],$sportStatistics[0]->$dataMap["best1_date"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["best2_min"],$sportStatistics[0]->$dataMap["best2_min"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["best2_sec"],$sportStatistics[0]->$dataMap["best2_sec"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["best2_hun"],$sportStatistics[0]->$dataMap["best2_hun"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["best2_date"],$sportStatistics[0]->$dataMap["best2_date"],['class'=>'form-control ']) !!}</td>
                    </tr>
                    </tbody>
                </table>
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

            <div class="row">
                <div class="col-xs-11 col-xs-offset-1">
                    <table class="table">
                        <caption>Event</caption>
                        <tr>
                            <th width="150px">Event Name</th>
                            <th>Seasons</th>
                            <th colspan="4">Best 1</th>
                            <th colspan="4">Best 2</th>
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
                            <td>{!! Form::text($sportDataMap["event_name"],$sportStatistics[$i]->$dataMap["event_name"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["seasons"],$sportStatistics[$i]->$dataMap["seasons"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["best1_min"],$sportStatistics[$i]->$dataMap["best1_min"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["best1_sec"],$sportStatistics[$i]->$dataMap["best1_sec"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["best1_hun"],$sportStatistics[$i]->$dataMap["best1_hun"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["best1_date"],$sportStatistics[$i]->$dataMap["best1_date"],['class'=>'form-control datepicker']) !!}</td>
                            <td>{!! Form::text($sportDataMap["best2_min"],$sportStatistics[$i]->$dataMap["best2_min"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["best2_sec"],$sportStatistics[$i]->$dataMap["best2_sec"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["best2_hun"],$sportStatistics[$i]->$dataMap["best2_hun"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["best2_date"],$sportStatistics[$i]->$dataMap["best2_date"],['class'=>'form-control datepicker']) !!}</td>
                        </tr>
                        </tbody>
                    </table>
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
        <button class="t-button duplicate_content_button" type="button"
                data-target-duplicate-content=".carrer_statistics"
                data-place-duplicate-content=".career_statistics_duplicated">Add more</button>"
    </div>
</div>
