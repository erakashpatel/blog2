<?php

namespace App;

class ProjectFilters extends QueryFilter
{
    public function filter_difficulty($level)
	{
		if($level){
			return $this->builder->where('difficulty',$level);
		}
	} 
	public function filter_duration($duration)
	{
		if($duration){
			return $this->builder->where('duration',$duration);
		}
	} 
	public function filter_search($search)
	{
		//if($search){
			return $this->builder->where('title','like','%'.$search.'%');
		//}
	}
	public function popular($order = 'desc'){
			return $this->builder->orderby('id',$order);
	}

}
