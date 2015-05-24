<p>Please provide as much information as you can.</p>
<?php
use Illuminate\Support\Facades\Session;use talenthub\Repositories\SiteSessions;use talenthub\Repositories\SportsRepository;

$dataMap = talenthub\TalentCareerStatisticsModels\SwimmingStatistics::$dataMap;
if(count($sportStatistics)==0)
{
    $sportStatistics[0] = new talenthub\TalentCareerStatisticsModels\SwimmingStatistics();
}

$event_type=["0"=>"-- Select Type --"];
        foreach(SportsRepository::getSportPositions(Session::get(SiteSessions::USER_SPORT_TYPE)) as $key=>$value)
        {
            $event_type[$value]=$value;
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
                        <th>Distance</th>
                        <th >Type</th>
                        <th >min</th>
                        <th >sec</th>
                        <th>hun</th>
                        <th >date</th>
                    </tr>
                    <tbody class="form_container">
                    <tr>
                        <td>{!! Form::text($sportDataMap["event_name"],$sportStatistics[0]->$dataMap["event_name"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["distance"],$sportStatistics[0]->$dataMap["distance"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::select($sportDataMap["type"],$event_type,$sportStatistics[0]->$dataMap["type"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["min"],$sportStatistics[0]->$dataMap["min"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["sec"],$sportStatistics[0]->$dataMap["sec"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["hun"],$sportStatistics[0]->$dataMap["hun"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["date"],$sportStatistics[0]->$dataMap["date"],['class'=>'form-control']) !!}</td>
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
                        <caption>Event Detail</caption>
                        <tr>
                            <th width="150px">Event Name</th>
                            <th>Distance</th>
                            <th>Type</th>
                            <th>min</th>
                            <th>sec</th>
                            <th>hun</th>
                            <th> date</th>
                        </tr>
                        <tbody class="form_container">
                        <tr>
                            <td>{!! Form::text($sportDataMap["event_name"],$sportStatistics[0]->$dataMap["event_name"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["distance"],$sportStatistics[0]->$dataMap["distance"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::select($sportDataMap["type"],$event_type,$sportStatistics[0]->$dataMap["type"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["min"],$sportStatistics[0]->$dataMap["min"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["sec"],$sportStatistics[0]->$dataMap["sec"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["hun"],$sportStatistics[0]->$dataMap["hun"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["date"],$sportStatistics[0]->$dataMap["date"],['class'=>'form-control']) !!}</td>
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
