<?php namespace Atomino\Carbon\Plugins\Guid;

use Atomino\Carbon\Attributes\EventHandler;
use Atomino\Carbon\Entity;

trait GuidTrait{
	#[EventHandler( Entity::EVENT_BEFORE_INSERT )]
	protected function GuidPlugin_BeforeInsert($event, $data){
		/** @var \Atomino\Carbon\Model $model */
		$model = static::model();
		$this->{Guid::fetch($model)->field} = $model->getConnection()->getSmart()->getValue("SELECT uuid()");
	}
}
