<?php
namespace jorgelsaud\ProgressERP\Sections;
class RevSlider{
	private $id;
	public function __construct($id)
	{
		$this->id=$id;
	}
	public function show(){
		putRevSlider($this->id);
	}
}
