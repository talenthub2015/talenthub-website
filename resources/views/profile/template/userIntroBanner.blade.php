<div class="container">
    <div class="cover_pic">
        @if($userProfile->profile_cover_image_path != "" )
            <?php
            $coverUserMeta = $userProfile->userMeta(talenthub\Repositories\UserMetaRepository::COVER_IMAGE_TOP_POSITION)->first();
            $coverUserMeta = is_null($coverUserMeta) ? "0" : $coverUserMeta->meta_value;
            ?>
            <img src="{{ $userProfile->profile_cover_image_path != "" ? $userProfile->profile_cover_image_path : ""}}"
                 style="top:{{ $coverUserMeta.'px' }}">
        @endif
    </div>

    <div class="row user_profile_details">
        <div class="col-xs-6 col-lg-3">
            @include("errors.error_raw_list")
            <div class="profile_image_container">
                <?php
                $profileTopMeta = $userProfile->userMeta(talenthub\Repositories\UserMetaRepository::PROFILE_IMAGE_TOP_POSITION)->first();
                $profileLeftMeta = $userProfile->userMeta(talenthub\Repositories\UserMetaRepository::PROFILE_IMAGE_LEFT_POSITION)->first();

                $profileTopMeta = is_null($profileTopMeta) ? "0" : $profileTopMeta->meta_value;
                $profileLeftMeta = is_null($profileLeftMeta) ? "0" : $profileLeftMeta->meta_value;
                ?>
                <img src="{{ $userProfile->profile_image_path }}" style="left:{{ $profileLeftMeta.'px' }};top:{{ $profileTopMeta.'px' }}">
            </div>
        </div>

        <div class="col-xs-6 col-lg-4 user_personal_data_container">
            <p class="user_name"><span >{{ $userProfile->first_name }}</span> <span >{{ $userProfile->last_name }}</span>
            </p>
            <p class="user_sport"><span>{{ $userProfile->sport_type }}</span> | <span>{{ $userProfile->dob }}</span>
            <p class="user_position"><span>{{ $userProfile->preferred_position }}</span></p>
            <p class="user_management_level"><span>{{ ucfirst($userProfile->management_level) }}</span></p>
            <p class="user_country"><span >{{ $userProfile->country }}</span>
            </p>
        </div>

        <div class="col-xs-12 col-lg-5 about_container">
            <p class="about"><span >{{ $userProfile->about ? $userProfile->about : "Tell something about yourself"}}</span>
            </p>
        </div>
    </div>
</div>