<?php

namespace App\Livewire\Event;

use Livewire\Component;
use App\Models\Event;

class CreateEvent extends Component
{

    public $title;
    public $date;
    public $time;
    public $type;
    public $for_user;
    public $guideline;

    protected $rules = [
        'title'     => 'required|string|min:3|max:255',
        'date'      => 'required|date|after_or_equal:today',
        'time'      => 'required|date_format:H:i',
        'type'      => 'required|string|min:3|max:255', 
        'for_user'  => 'sometimes|required|exists:users,id', 
        'guideline' => 'required|string|max:1000',
    ];

    protected $listeners = ['userSelected'];


    
    public function userSelected($user_id){
     
        $this->for_user = $user_id;
    }

    public function saveEvent(){
    
        $this->validate();

        try{
            Event::create([
                'title'     => $this->title,
                'user_id' => auth()->user()->id,
                'date'      => $this->date,
                'time'      => $this->time,
                'type'      => $this->type,
                'for_user'  => $this->for_user,
                'guideline' => $this->guideline,
            ]);

            session()->flash('success', 'Event created successfully!');
            $this->reset(); 
        }
        catch(\Exception $e){
            session()->flash('error', 'Some Error Occured');
        }


        
    }
    public function render()
    {
        return view('livewire.event.create-event');
    }
}
