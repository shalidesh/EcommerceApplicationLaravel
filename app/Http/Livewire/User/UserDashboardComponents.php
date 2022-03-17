<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDashboardComponents extends Component
{
    public function render()
    {
        return view('livewire.user.user-dashboard-components')->layout('layouts.base');
    }
}
