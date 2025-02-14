<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputLabel extends Component
{

    public string $id;
    public string $value;
    public string $class;
    public string $for;


    /**
     * Create a new component instance.
     */
    public function __construct(
        string $id = '',
        string $value = '',
        string $class = 'form-label',
        string $for = ''
    ) {
        $this->id = $id;
        $this->value = $value;
        $this->class = $class;
        $this->for = $for;
    }
    public function render(): View|Closure|string
    {
        return view('components.forms.input-label');
    }
}
