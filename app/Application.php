<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function saveApplication($data)
    {
        $this->user_id = auth()->user()->id;
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->email = $data['email'];
        $this->phone_number = $data['phone_number'];
        $this->save();
        return 1;
    }
    public function updateApplication($data)
    {
        $application = $this->find($data['id']);
        $application->user_id = auth()->user()->id;
        $application->first_name = $data['first_name'];
        $application->last_name = $data['last_name'];
        $application->email = $data['email'];
        $application->phone_number = $data['phone_number'];
        $application->save();
        return 1;
    }

    protected $fillable = ['user_id', 'first_name', 'last_name', 'email', 'phone_number'];
}