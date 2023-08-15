<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ServiceGroup extends Component
{
    public $GroupItems = [];
    public $allservices = [];
    public $discount_value = 0;
    public $tax = 15;
    public $name_group;
    public $notes;
    public $serviceSaved = false;
    public function render()
    {
        return view('livewire.GroupService.service-group');
    }
}
