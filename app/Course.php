<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function saveCourse($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->save();
        return 1;
    }

    public function updateCourse($data)
    {
        $course = $this->find($data['id']);
        $course->id = $data['id'];
        $course->name = $data['name'];
        $course->description = $data['description'];
        $course->save();
        return 1;
    }
    protected $fillable = ['id', 'name', 'description', 'image'];
}
