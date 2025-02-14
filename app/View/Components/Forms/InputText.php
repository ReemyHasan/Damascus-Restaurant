<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputText extends Component
{
    public string $id;
    public string $name;
    public string $type;
    public string $value;
    public string $class;
    public string $placeholder;
    public bool $required;
    public bool $disabled;
    public bool $autofocus;
    public string $autocomplete;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $id = '',
        string $name = '',
        string $type = 'text',
        ?string $value = '',
        string $class = 'form-control',
        string $placeholder = '',
        bool $required = false,
        bool $disabled = false,
        bool $autofocus = false,
        string $autocomplete = ''
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value ?? '';
        $this->class = $class;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->autofocus = $autofocus;
        $this->autocomplete = $autocomplete;
    }
    public function render(): View|Closure|string
    {
        return view('components.forms.input-text');
    }
}
