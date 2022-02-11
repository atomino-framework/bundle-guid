<?php namespace Atomino\Carbon\Plugins\Guid;

use Atomino\Carbon\Generator\CodeWriter;
use Atomino\Carbon\Plugin\Plugin;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Guid extends Plugin{
	public function __construct(public string $field = "guid"){ }
	public function generate(\ReflectionClass $ENTITY, CodeWriter $codeWriter){
		$codeWriter->addAttribute("#[Immutable( '" . $this->field . "', true )]");
		$codeWriter->addAttribute("#[Protect( '" . $this->field . "', true, false )]");
		$codeWriter->addAttribute("#[RequiredField('" . $this->field . "', \Atomino\Carbon\Field\StringField::class)]");
	}
	public function getTrait(): string|null{ return GuidTrait::class; }
}