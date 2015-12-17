<p>Please provide as much information as you can.</p>
<?php
use Illuminate\Support\Facades\Session;use talenthub\Repositories\SiteSessions;use talenthub\Repositories\SportsRepository;

$dataMap = talenthub\TalentCareerStatisticsModels\TennisStatistics::$dataMap;
if(count($sportStatistics)==0)
{
    $sportStatistics[0] = new talenthub\TalentCareerStatisticsModels\TennisStatistics();
}

?>
<div class="duplicate_content_container form_container">
    <div class="duplicate_this_content carrer_statistics">

        <div class="row">
            <div class="col-xs-11 col-xs-offset-1">
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
                <br>
                <table class="table" width="300px" align="center">
                    <tr>
                        <th >Matches Played</th>
                        <th>Matches Won</th>
                        <th >Matches Lost</th>
                    </tr>
                    <tbody class="form_container">
                    <tr>
                        <td>{!! Form::text($sportDataMap["MP"],$sportStatistics[0]->$dataMap["MP"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["MW"],$sportStatistics[0]->$dataMap["MW"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["ML"],$sportStatistics[0]->$dataMap["ML"],['class'=>'form-control']) !!}</td>
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
                    <br>
                    <table class="table" width="300px" align="center">
                        <tr>
                            <th >Matches Played</th>
                            <th>Matches Won</th>
                            <th >Matches Lost</th>
                        </tr>
                        <tbody class="form_container">
                        <tr>
                            <td>{!! Form::text($sportDataMap["MP"],$sportStatistics[$i]->$dataMap["MP"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["MW"],$sportStatistics[$i]->$dataMap["MW"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["ML"],$sportStatistics[$i]->$dataMap["ML"],['class'=>'form-control']) !!}</td>
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
        <button class="btn btn-info statistic_button duplicate_content_button" type="button"
                data-target-duplicate-content=".carrer_statistics"
                data-place-duplicate-content=".career_statistics_duplicated">Add More Sport Statistic</button>
    </div>
</div>
