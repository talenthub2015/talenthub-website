<div class="container">
    <div class="cover_pic">
        <img src="{{ $talentProfile->profile_cover_image_path != "" ? $talentProfile->profile_cover_image_path : asset('site_images/talenthub.jpg')}}">
    </div>

    <div class="row user_profile_details">
        <div class="col-xs-6 col-lg-3">
            @include("errors.error_raw_list")
            <div class="profile_image_container">
                <img src="{{ $talentProfile->profile_image_path }}">
            </div>
        </div>

        <div class="col-xs-6 col-lg-4 user_personal_data_container">
            <p class="user_name"><span >{{ $talentProfile->first_name }}</span> <span >{{ $talentProfile->last_name }}</span>
            </p>
            <p class="user_sport"><span>{{ $talentProfile->sport_type }}</span> | <span>{{ $talentProfile->dob }}</span>
            <p class="user_position"><span>{{ $talentProfile->preferred_position }}</span></p>
            <p class="user_management_level"><span>{{ $talentProfile->management_level }}</span></p>
            <p class="user_country"><span >{{ $talentProfile->country }}</span>
            </p>
        </div>

        <div class="col-xs-12 col-lg-5 about_container">
            <p class="about"><span >{{ $talentProfile->about ? $talentProfile->about : "Tell something about yourself"}}</span>
            </p>
        </div>
    </div>
</div>