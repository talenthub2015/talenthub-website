<p>Please provide as much information as you can.</p>
<?php
$dataMap = talenthub\TalentCareerStatisticsModels\BasketBallStatistics::$dataMap;
if(count($sportStatistics)==0)
{
    $sportStatistics[0] = new talenthub\TalentCareerStatisticsModels\BasketBallStatistics();
}
?>
<div class="duplicate_content_container form_container">
    <div class="duplicate_this_content carrer_statistics">
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
        <div class="row">
            <div class="col-xs-11 col-xs-offset-1">
                <table class="table">
                    <tr>
                        <th title="">GP</th>
                        <th title="">GS</th>
                        <th title="">PTS</th>
                        <th title="">OREB</th>
                        <th title="">REB</th>
                        <th title="">AST</th>
                        <th title="">STL</th>
                        <th title="">BLK</th>
                        <th title="">TOV</th>

                    </tr>
                    <tbody class="form_container">
                    <tr>
                        <td>{!! Form::text($sportDataMap["GP"],$sportStatistics[0]->$dataMap["GP"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["GS"],$sportStatistics[0]->$dataMap["GS"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["PTS"],$sportStatistics[0]->$dataMap["PTS"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["OREB"],$sportStatistics[0]->$dataMap["OREB"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["REB"],$sportStatistics[0]->$dataMap["REB"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["AST"],$sportStatistics[0]->$dataMap["AST"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["STL"],$sportStatistics[0]->$dataMap["STL"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["BLK"],$sportStatistics[0]->$dataMap["BLK"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["TOV"],$sportStatistics[0]->$dataMap["TOV"],['class'=>'form-control']) !!}</td>
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
            <div class="row">
                <div class="col-xs-11 col-xs-offset-1">
                    <table class="table">
                        <tr>
                            <th title="">GP</th>
                            <th title="">GS</th>
                            <th title="">PTS</th>
                            <th title="">OREB</th>
                            <th title="">REB</th>
                            <th title="">AST</th>
                            <th title="">STL</th>
                            <th title="">BLK</th>
                            <th title="">TOV</th>

                        </tr>
                        <tbody class="form_container">
                        <tr>
                            <td>{!! Form::text($sportDataMap["GP"],$sportStatistics[0]->$dataMap["GP"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["GS"],$sportStatistics[0]->$dataMap["GS"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["PTS"],$sportStatistics[0]->$dataMap["PTS"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["OREB"],$sportStatistics[0]->$dataMap["OREB"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["REB"],$sportStatistics[0]->$dataMap["REB"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["AST"],$sportStatistics[0]->$dataMap["AST"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["STL"],$sportStatistics[0]->$dataMap["STL"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["BLK"],$sportStatistics[0]->$dataMap["BLK"],['class'=>'form-control']) !!}</td>
                            <td>{!! Form::text($sportDataMap["TOV"],$sportStatistics[0]->$dataMap["TOV"],['class'=>'form-control']) !!}</td>
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
