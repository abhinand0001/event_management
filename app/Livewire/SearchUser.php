<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUser extends Component
{
    public $selectedUser = null;
    public $not_current_user =  false;

    public function mount($exclude_current=false){

        $this->not_current_user = $exclude_current;
    }
   

    public function setForDispatch()
    {
        
        $this->dispatch('userSelected', $this->selectedUser);
    }

    public function render()
    {
        if(!$this->not_current_user){
            $users = User::select('id', 'name')->get();
        }
        else{
            $users = User::select('id', 'name')->where('id', '!=', auth()->user()->id)->get();
        }
     

        return view('livewire.search-user', compact('users'));
    }
}

