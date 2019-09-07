<?php 
namespace App;

use Illuminate\Database\Eloquent\builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{

	protected $request;

	protected $builder;

	public function __construct(Request $request){
		$this->request = $request;
	}

	public function apply(Builder $builder){
		$this->builder = $builder;

		foreach ($this->filters() as $name => $value) {
			if ($name == 'popular') {
				if(method_exists($this,$name)){
						call_user_func_array([$this,$name],array_filter([$value]));
				}
			}else{
				if(method_exists($this,$name)){
						if($value){
							call_user_func_array([$this,$name],array_filter([$value]));
						}
				}
			}
		}

		return $this->builder;

	}

	public function filters(){

		return $this->request->all();
	}

}