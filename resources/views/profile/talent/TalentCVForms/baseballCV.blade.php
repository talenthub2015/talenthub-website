<p>Please provide as much information as you can.</p>
<?php
        $dataMap = talenthub\TalentCareerStatisticsModels\BaseBallStatistics::$dataMap;
        if(count($sportStatistics)==0)
        {
            $sportStatistics[0] = new talenthub\TalentCareerStatisticsModels\BaseBallStatistics();
        }
?>
<div class="duplicate_content_container form_container">
    <div class="duplicate_this_content carrer_statistics">
        {!! Form::input('hidden',$sportDataMap["batting"],'batting',['class'=>'form-control']) !!}
        {!! Form::input('hidden',$sportDataMap["fielding"],'fielding',['class'=>'form-control']) !!}
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
                        <td>{!! Form::text($sportDataMap["GP"],$sportStatistics[0]->$dataMap["GP"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["AB"],$sportStatistics[0]->$dataMap["AB"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["R"],$sportStatistics[0]->$dataMap["R"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["H"],$sportStatistics[0]->$dataMap["H"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["2B"],$sportStatistics[0]->$dataMap["2B"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["3B"],$sportStatistics[0]->$dataMap["3B"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["HR"],$sportStatistics[0]->$dataMap["HR"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["RBI"],$sportStatistics[0]->$dataMap["RBI"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["SB"],$sportStatistics[0]->$dataMap["SB"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["CS"],$sportStatistics[0]->$dataMap["CS"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["BB"],$sportStatistics[0]->$dataMap["BB"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["SO"],$sportStatistics[0]->$dataMap["SO"],['class'=>'form-control']) !!}</td>
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
                        <td>{!! Form::text($sportDataMap["POS"],$sportStatistics[0]->$dataMap["POS"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["G"],$sportStatistics[0]->$dataMap["G"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["GS"],$sportStatistics[0]->$dataMap["GS"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["CG"],$sportStatistics[0]->$dataMap["CG"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["INN"],$sportStatistics[0]->$dataMap["INN"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["CH"],$sportStatistics[0]->$dataMap["CH"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["PO"],$sportStatistics[0]->$dataMap["PO"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["A"],$sportStatistics[0]->$dataMap["A"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["E"],$sportStatistics[0]->$dataMap["E"],['class'=>'form-control']) !!}</td>
                        <td>{!! Form::text($sportDataMap["DP"],$sportStatistics[0]->$dataMap["DP"],['class'=>'form-control']) !!}</td>
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
                    {!! Form::input('hidden',$sportDataMap["batting"],'batting',['class'=>'form-control']) !!}
                    {!! Form::input('hidden',$sportDataMap["fielding"],'fielding',['class'=>'form-control']) !!}
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
                                    <td>{!! Form::text($sportDataMap["GP"],$sportStatistics[$i]->$dataMap["GP"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["AB"],$sportStatistics[$i]->$dataMap["AB"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["R"],$sportStatistics[$i]->$dataMap["R"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["H"],$sportStatistics[$i]->$dataMap["H"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["2B"],$sportStatistics[$i]->$dataMap["2B"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["3B"],$sportStatistics[$i]->$dataMap["3B"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["HR"],$sportStatistics[$i]->$dataMap["HR"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["RBI"],$sportStatistics[$i]->$dataMap["RBI"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["SB"],$sportStatistics[$i]->$dataMap["SB"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["CS"],$sportStatistics[$i]->$dataMap["CS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["BB"],$sportStatistics[$i]->$dataMap["BB"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["SO"],$sportStatistics[$i]->$dataMap["SO"],['class'=>'form-control']) !!}</td>
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
                                    <td>{!! Form::text($sportDataMap["POS"],$sportStatistics[$i]->$dataMap["POS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["G"],$sportStatistics[$i]->$dataMap["G"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["GS"],$sportStatistics[$i]->$dataMap["GS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["CG"],$sportStatistics[$i]->$dataMap["CG"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["INN"],$sportStatistics[$i]->$dataMap["INN"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["CH"],$sportStatistics[$i]->$dataMap["CH"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["PO"],$sportStatistics[$i]->$dataMap["PO"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["A"],$sportStatistics[$i]->$dataMap["A"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["E"],$sportStatistics[$i]->$dataMap["E"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["DP"],$sportStatistics[$i]->$dataMap["DP"],['class'=>'form-control']) !!}</td>
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
