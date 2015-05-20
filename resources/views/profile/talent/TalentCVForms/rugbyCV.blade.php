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
                                <td>{!! Form::text($sportDataMap["GP"],$sportStatistics[0]->$dataMap["GP"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["GS"],$sportStatistics[0]->$dataMap["GS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["GC"],$sportStatistics[0]->$dataMap["GC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["LTA"],$sportStatistics[0]->$dataMap["LTA"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["LTS"],$sportStatistics[0]->$dataMap["LTS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["LJA"],$sportStatistics[0]->$dataMap["LJA"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["LJS"],$sportStatistics[0]->$dataMap["LJS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["YC"],$sportStatistics[0]->$dataMap["YC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["RC"],$sportStatistics[0]->$dataMap["RC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["TR"],$sportStatistics[0]->$dataMap["TR"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["TA"],$sportStatistics[0]->$dataMap["TA"],['class'=>'form-control']) !!}</td>
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
                                <td>{!! Form::text($sportDataMap["GP"],$sportStatistics[0]->$dataMap["GP"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["GS"],$sportStatistics[0]->$dataMap["GS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["GC"],$sportStatistics[0]->$dataMap["GC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["YC"],$sportStatistics[0]->$dataMap["YC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["RC"],$sportStatistics[0]->$dataMap["RC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["TR"],$sportStatistics[0]->$dataMap["TR"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["TA"],$sportStatistics[0]->$dataMap["TA"],['class'=>'form-control']) !!}</td>
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
                            <caption>Backline</caption>
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
                                <td>{!! Form::text($sportDataMap["GP"],$sportStatistics[0]->$dataMap["GP"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["GS"],$sportStatistics[0]->$dataMap["GS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["GC"],$sportStatistics[0]->$dataMap["GC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["LTA"],$sportStatistics[0]->$dataMap["LTA"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["LTS"],$sportStatistics[0]->$dataMap["LTS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["LJA"],$sportStatistics[0]->$dataMap["LJA"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["LJS"],$sportStatistics[0]->$dataMap["LJS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["LJS"],$sportStatistics[0]->$dataMap["LJS"],['class'=>'form-control']) !!}</td>
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

            <div class="collapse-content">
                <p class="text-center trigger"> + Add Statistics for Forward</p>
                <div class="collapsed-content">
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
                                    <td>{!! Form::text($sportDataMap["GP"],$sportStatistics[0]->$dataMap["GP"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["GS"],$sportStatistics[0]->$dataMap["GS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["GC"],$sportStatistics[0]->$dataMap["GC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["LTA"],$sportStatistics[0]->$dataMap["LTA"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["LTS"],$sportStatistics[0]->$dataMap["LTS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["LJA"],$sportStatistics[0]->$dataMap["LJA"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["LJS"],$sportStatistics[0]->$dataMap["LJS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["YC"],$sportStatistics[0]->$dataMap["YC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["RC"],$sportStatistics[0]->$dataMap["RC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["TR"],$sportStatistics[0]->$dataMap["TR"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["TA"],$sportStatistics[0]->$dataMap["TA"],['class'=>'form-control']) !!}</td>
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
        <button class="t-button duplicate_content_button" type="button"
                data-target-duplicate-content=".carrer_statistics"
                data-place-duplicate-content=".career_statistics_duplicated">Add more</button>"
    </div>
</div>
