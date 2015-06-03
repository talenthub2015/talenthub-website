<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 23-05-2015
 * Time: 21:18
 */

namespace talenthub\Repositories;


class StorageLocationsRepository {

    const USER_DIRECTORY_TYPE_PROFILE_IMAGES = "profile_images";
    const USER_DIRECTORY_TYPE_COVER_IMAGES = "cover_images";
    const USER_DIRECTORY_TYPE_SPORT_IMAGES = "sport_images";

    const USER_PROFILE_IMAGE_PATH = '/storage/app/user_profile_data/images/original_images/';
    const USER_PROFILE_IMAGE_ICON_PATH = '/storage/app/user_profile_data/images/icon_images/';
    const USER_PROFILE_IMAGE_SMALL_PATH = '/storage/app/user_profile_data/images/small_images/';

    const USER_DEFAULT_PROFILE_IMAGE_PATH = 'images/talenthub_logo.png';

    const USER_COVER_IMAGE_PATH = '/storage/app/user_profile_data/images/cover_images/';

    //USER IMAGES SAVED FOR COACHES TO SEE
    const USER_SPORT_IMAGES_STORAGE_PATH = '/storage/app/user_images/images/';

}