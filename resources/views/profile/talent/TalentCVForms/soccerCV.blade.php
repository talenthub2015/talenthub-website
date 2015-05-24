<p>Please provide as much information as you can.</p>
<?php
$dataMap = talenthub\TalentCareerStatisticsModels\SoccerStatistics::$dataMap;
if(count($sportStatistics)==0)
{
    $sportStatistics[0] = new talenthub\TalentCareerStatisticsModels\SoccerStatistics();
}

?>
<div class="duplicate_content_container form_container">
    <div class="duplicate_this_content carrer_statistics">

        {!! Form::input('hidden',$sportDataMap["goalkeeper"],'goalkeeper',null) !!}
        {!! Form::input('hidden',$sportDataMap["defender"],'defender',null) !!}
        {!! Form::input('hidden',$sportDataMap["midfield"],'midfield',null) !!}
        {!! Form::input('hidden',$sportDataMap["forward"],'forward',null) !!}

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
            <p class="text-center trigger"> + Add Statistics for GoalKeeper</p>
            <div class="collapsed-content">
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1">
                        <table class="table">
                            <caption>GoalKeeper</caption>
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
                                <td>{!! Form::text($sportDataMap["goal_GP"],$sportStatistics[0]->$dataMap["goal_GP"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["goal_GS"],$sportStatistics[0]->$dataMap["goal_GS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["goal_W"],$sportStatistics[0]->$dataMap["goal_W"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["goal_D"],$sportStatistics[0]->$dataMap["goal_D"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["goal_L"],$sportStatistics[0]->$dataMap["goal_L"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["goal_GA"],$sportStatistics[0]->$dataMap["goal_GA"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["goal_PKG"],$sportStatistics[0]->$dataMap["goal_PKG"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["goal_CS"],$sportStatistics[0]->$dataMap["goal_CS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["goal_YC"],$sportStatistics[0]->$dataMap["goal_YC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["goal_RC"],$sportStatistics[0]->$dataMap["goal_RC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["goal_MP"],$sportStatistics[0]->$dataMap["goal_MP"],['class'=>'form-control']) !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="collapse-content">
            <p class="text-center trigger"> + Add Statistics for Defender</p>
            <div class="collapsed-content">
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1">
                        <table class="table">
                            <caption>Defender</caption>
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
                                <td>{!! Form::text($sportDataMap["defender_GP"],$sportStatistics[0]->$dataMap["defender_GP"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["defender_GS"],$sportStatistics[0]->$dataMap["defender_GS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["defender_G"],$sportStatistics[0]->$dataMap["defender_G"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["defender_A"],$sportStatistics[0]->$dataMap["defender_A"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["defender_CS"],$sportStatistics[0]->$dataMap["defender_CS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["defender_YC"],$sportStatistics[0]->$dataMap["defender_YC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["defender_RC"],$sportStatistics[0]->$dataMap["defender_RC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["defender_MP"],$sportStatistics[0]->$dataMap["defender_MP"],['class'=>'form-control']) !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="collapse-content">
            <p class="text-center trigger"> + Add Statistics for Midfield</p>
            <div class="collapsed-content">
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1">
                        <table class="table">
                            <caption>Midfield</caption>
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
                                <td>{!! Form::text($sportDataMap["midfield_GP"],$sportStatistics[0]->$dataMap["midfield_GP"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["midfield_GS"],$sportStatistics[0]->$dataMap["midfield_GS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["midfield_G"],$sportStatistics[0]->$dataMap["midfield_G"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["midfield_A"],$sportStatistics[0]->$dataMap["midfield_A"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["midfield_YC"],$sportStatistics[0]->$dataMap["midfield_YC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["midfield_RC"],$sportStatistics[0]->$dataMap["midfield_RC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["midfield_MP"],$sportStatistics[0]->$dataMap["midfield_MP"],['class'=>'form-control']) !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
                                <th title="">G</th>
                                <th title="">A</th>
                                <th title="">PKG</th>
                                <th title="">YC</th>
                                <th title="">RC</th>
                                <th title="">MP</th>
                            </tr>
                            <tbody class="form_container">
                            <tr>
                                <td>{!! Form::text($sportDataMap["forward_GP"],$sportStatistics[0]->$dataMap["forward_GP"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_GS"],$sportStatistics[0]->$dataMap["forward_GS"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_G"],$sportStatistics[0]->$dataMap["forward_G"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_A"],$sportStatistics[0]->$dataMap["forward_A"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_PKG"],$sportStatistics[0]->$dataMap["forward_PKG"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_YC"],$sportStatistics[0]->$dataMap["forward_YC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_RC"],$sportStatistics[0]->$dataMap["forward_RC"],['class'=>'form-control']) !!}</td>
                                <td>{!! Form::text($sportDataMap["forward_MP"],$sportStatistics[0]->$dataMap["forward_MP"],['class'=>'form-control']) !!}</td>
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

            {!! Form::input('hidden',$sportDataMap["goalkeeper"],'goalkeeper',null) !!}
            {!! Form::input('hidden',$sportDataMap["defender"],'defender',null) !!}
            {!! Form::input('hidden',$sportDataMap["midfield"],'midfield',null) !!}
            {!! Form::input('hidden',$sportDataMap["forward"],'forward',null) !!}

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
                <p class="text-center trigger"> + Add Statistics for GoalKeeper</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-11 col-xs-offset-1">
                            <table class="table">
                                <caption>GoalKeeper</caption>
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
                                    <td>{!! Form::text($sportDataMap["goal_GP"],$sportStatistics[$i]->$dataMap["goal_GP"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["goal_GS"],$sportStatistics[$i]->$dataMap["goal_GS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["goal_W"],$sportStatistics[$i]->$dataMap["goal_W"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["goal_D"],$sportStatistics[$i]->$dataMap["goal_D"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["goal_L"],$sportStatistics[$i]->$dataMap["goal_L"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["goal_GA"],$sportStatistics[$i]->$dataMap["goal_GA"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["goal_PKG"],$sportStatistics[$i]->$dataMap["goal_PKG"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["goal_CS"],$sportStatistics[$i]->$dataMap["goal_CS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["goal_YC"],$sportStatistics[$i]->$dataMap["goal_YC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["goal_RC"],$sportStatistics[$i]->$dataMap["goal_RC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["goal_MP"],$sportStatistics[$i]->$dataMap["goal_MP"],['class'=>'form-control']) !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="collapse-content">
                <p class="text-center trigger"> + Add Statistics for Defender</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-11 col-xs-offset-1">
                            <table class="table">
                                <caption>Defender</caption>
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
                                    <td>{!! Form::text($sportDataMap["defender_GP"],$sportStatistics[$i]->$dataMap["defender_GP"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["defender_GS"],$sportStatistics[$i]->$dataMap["defender_GS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["defender_G"],$sportStatistics[$i]->$dataMap["defender_G"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["defender_A"],$sportStatistics[$i]->$dataMap["defender_A"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["defender_CS"],$sportStatistics[$i]->$dataMap["defender_CS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["defender_YC"],$sportStatistics[$i]->$dataMap["defender_YC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["defender_RC"],$sportStatistics[$i]->$dataMap["defender_RC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["defender_MP"],$sportStatistics[$i]->$dataMap["defender_MP"],['class'=>'form-control']) !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="collapse-content">
                <p class="text-center trigger"> + Add Statistics for Midfield</p>
                <div class="collapsed-content">
                    <div class="row">
                        <div class="col-xs-11 col-xs-offset-1">
                            <table class="table">
                                <caption>Midfield</caption>
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
                                    <td>{!! Form::text($sportDataMap["midfield_GP"],$sportStatistics[$i]->$dataMap["midfield_GP"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["midfield_GS"],$sportStatistics[$i]->$dataMap["midfield_GS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["midfield_G"],$sportStatistics[$i]->$dataMap["midfield_G"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["midfield_A"],$sportStatistics[$i]->$dataMap["midfield_A"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["midfield_YC"],$sportStatistics[$i]->$dataMap["midfield_YC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["midfield_RC"],$sportStatistics[$i]->$dataMap["midfield_RC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["midfield_MP"],$sportStatistics[$i]->$dataMap["midfield_MP"],['class'=>'form-control']) !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                                    <th title="">G</th>
                                    <th title="">A</th>
                                    <th title="">PKG</th>
                                    <th title="">YC</th>
                                    <th title="">RC</th>
                                    <th title="">MP</th>
                                </tr>
                                <tbody class="form_container">
                                <tr>
                                    <td>{!! Form::text($sportDataMap["forward_GP"],$sportStatistics[$i]->$dataMap["forward_GP"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_GS"],$sportStatistics[$i]->$dataMap["forward_GS"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_G"],$sportStatistics[$i]->$dataMap["forward_G"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_A"],$sportStatistics[$i]->$dataMap["forward_A"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_PKG"],$sportStatistics[$i]->$dataMap["forward_PKG"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_YC"],$sportStatistics[$i]->$dataMap["forward_YC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_RC"],$sportStatistics[$i]->$dataMap["forward_RC"],['class'=>'form-control']) !!}</td>
                                    <td>{!! Form::text($sportDataMap["forward_MP"],$sportStatistics[$i]->$dataMap["forward_MP"],['class'=>'form-control']) !!}</td>
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
