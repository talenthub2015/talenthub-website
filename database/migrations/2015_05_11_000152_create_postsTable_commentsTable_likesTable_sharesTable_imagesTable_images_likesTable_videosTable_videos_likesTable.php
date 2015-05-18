<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTableCommentsTableLikesTableSharesTableImagesTableImagesLikesTableVideosTableVideosLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        /*
         * Create posts table
         */
        Schema::create('posts',function(Blueprint $table){

            $table->bigIncrements('post_id')->unsigned();
            /*
             * Setting up foreign key of user_id
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->text('content');
            $table->timestamp('posted_on');
            $table->timestamps();
        });

        /*
         * Create comments table
         */
        Schema::create('comments',function(Blueprint $table){

            /*
             * Setting up foreign key of post_id on posts
             */
            $table->bigInteger('post_id')->unsigned();
            $table->foreign('post_id')
                ->references('post_id')
                ->on('posts')
                ->onDelete('cascade');

            /*
             * Setting up foreign key of user_id
             */
            $table->integer('commented_by')->unsigned();
            $table->foreign('commented_by')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamp('commented_on');
            $table->timestamps();
        });

        /*
         * Create likes table
         */
        Schema::create('likes',function(Blueprint $table){

            /*
             * Setting up foreign key of post_id on posts
             */
            $table->bigInteger('post_id')->unsigned();
            $table->foreign('post_id')
                ->references('post_id')
                ->on('posts')
                ->onDelete('cascade');

            /*
             * Setting up foreign key of user_id
             */
            $table->integer('liked_by')->unsigned();
            $table->foreign('liked_by')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamp('liked_on');
            $table->timestamps();
        });

        /*
         * Create shares table
         */
        Schema::create('shares',function(Blueprint $table){

            /*
             * Setting up foreign key of post_id on posts
             */
            $table->bigInteger('post_id')->unsigned();
            $table->foreign('post_id')
                ->references('post_id')
                ->on('posts')
                ->onDelete('cascade');

            /*
             * Setting up foreign key of user_id
             */
            $table->integer('shared_by')->unsigned();
            $table->foreign('shared_by')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamp('shared_on');
            $table->timestamps();
        });


        /*
         * Create images table
         */
        Schema::create('images',function(Blueprint $table){

            $table->bigIncrements('image_id')->unsigned();

            /*
             * Setting up foreign key of user_id
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('title');
            $table->string('descriptions');
            $table->text('image_url');
            $table->timestamp('added_on');
            $table->timestamps();
        });

        /*
         * Create image_likes table
         */
        Schema::create('image_likes',function(Blueprint $table){

            /*
             * Setting up foreign key of image_id
             */
            $table->bigInteger('image_id')->unsigned();
            $table->foreign('image_id')
                ->references('image_id')
                ->on('images')
                ->onDelete('cascade');
            /*
             * Setting up foreign key of user_id
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamp('liked_on');
            $table->timestamps();
        });


        /*
         * Create videos table
         */
        Schema::create('videos',function(Blueprint $table){

            $table->bigIncrements('video_id')->unsigned();

            /*
             * Setting up foreign key of user_id
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('title');
            $table->string('descriptions');
            $table->text('video_url');
            $table->timestamp('added_on');
            $table->timestamps();
        });

        /*
         * Create image_likes table
         */
        Schema::create('video_likes',function(Blueprint $table){

            /*
             * Setting up foreign key of image_id
             */
            $table->bigInteger('video_id')->unsigned();
            $table->foreign('video_id')
                ->references('video_id')
                ->on('videos')
                ->onDelete('cascade');
            /*
             * Setting up foreign key of user_id
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamp('liked_on');
            $table->timestamps();
        });



    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        /*
         * Removing foreign key(s) set on video_likes.
         * After that deleting the table
         */
        Schema::table('video_likes',function(Blueprint $table){
            $table->dropForeign('video_likes_video_id_foreign');
            $table->dropForeign('video_likes_user_id_foreign');
        });
        Schema::drop('video_likes');

        /*
         * Removing foreign key(s) set on videos.
         * After that deleting the table
         */
        Schema::table('videos',function(Blueprint $table){
            $table->dropForeign('videos_user_id_foreign');
        });
        Schema::drop('videos');

        /*
         * Removing foreign key(s) set on image_likes.
         * After that deleting the table
         */
        Schema::table('image_likes',function(Blueprint $table){
            $table->dropForeign('image_likes_image_id_foreign');
            $table->dropForeign('image_likes_user_id_foreign');
        });
        Schema::drop('image_likes');

        /*
         * Removing foreign key(s) set on images.
         * After that deleting the table
         */
        Schema::table('images',function(Blueprint $table){
            $table->dropForeign('images_user_id_foreign');
        });
        Schema::drop('images');

        /*
         * Removing foreign key(s) set on shares.
         * After that deleting the table
         */
        Schema::table('shares',function(Blueprint $table){
            $table->dropForeign('shares_post_id_foreign');
            $table->dropForeign('shares_shared_by_foreign');
        });
        Schema::drop('shares');


        /*
         * Removing foreign key(s) set on likes.
         * After that deleting the table
         */
        Schema::table('likes',function(Blueprint $table){
            $table->dropForeign('likes_post_id_foreign');
            $table->dropForeign('likes_liked_by_foreign');
        });
        Schema::drop('likes');


        /*
         * Removing foreign key(s) set on comments.
         * After that deleting the table
         */
        Schema::table('comments',function(Blueprint $table){
            $table->dropForeign('comments_post_id_foreign');
            $table->dropForeign('comments_commented_by_foreign');
        });
        Schema::drop('comments');

        /*
         * Removing foreign key(s) set on posts.
         * After that deleting the table
         */
        Schema::table('posts',function(Blueprint $table){
            $table->dropForeign('posts_user_id_foreign');
        });
        Schema::drop('posts');
	}

}
