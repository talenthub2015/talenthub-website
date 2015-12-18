<?php
        $external_user = null;
        if(Session::has(\talenthub\Repositories\SiteSessions::USER_ID))
        {
            $external_user="";
        }
        else
        {
            $external_user="external/";
        }

?>

<div class="profile_menu_container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-9 col-lg-offset-3">
                <ul class="nav navbar-nav">
                    <li <?php echo $active_menu == 1 ? "class='active'" : "" ?>>
                        <a href="<?php echo url($external_user.'profile/'.$userProfile->user_id); ?>">Profile</a>
                    </li>
                    <li <?php echo $active_menu == 2 ? "class='active'" : "" ?>><a href="<?php echo url($external_user.'profile/'.$userProfile->user_id.'/curriculumvitae'); ?>">Curriculum Vitae</a></li>
                    <li <?php echo $active_menu == 3 ? "class='active'" : "" ?>><a href="<?php echo url($external_user.'profile/'.$userProfile->user_id.'/videos'); ?>">Videos</a></li>
                    <li <?php echo $active_menu == 4 ? "class='active'" : "" ?>><a href="<?php echo url($external_user.'profile/'.$userProfile->user_id.'/Images'); ?>">Photos</a></li>
                </ul>
            </div>
        </div>
    </div>

</div>