<?php

namespace App\View\Components;

use App\User;
use Illuminate\View\Component;

class AccountDropdown extends Component
{
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.account-dropdown');
    }
}
