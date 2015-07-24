<?php

use KodiCMS\Plugins\Loader\PluginSchema;
use Illuminate\Database\Schema\Blueprint;

class News extends PluginSchema
{
	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'news';
	}

	public function up()
	{
		Schema::create($this->getTableName(), function (Blueprint $table) {
			$table->timestamps();
			$table->dateTime('published_at');

			$table->increments('id');
			$table->string('title');
			$table->string('slug')->unique();

			$table->integer('status');

			$table->integer('user_id')->index();
			$table->integer('category_id')->index();
		});
	}

	public function down()
	{
		Schema::dropIfExists($this->getTableName());
	}
}
