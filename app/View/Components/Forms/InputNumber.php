<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputNumber extends Component
{
    public string $id;
    public string $name;
    public string $value;
    public string $class;
    public string $placeholder;
    public bool $required;
    public bool $disabled;
    public bool $autofocus;
    public string $autocomplete;
    public ?int $min;
    public ?int $max;
    public ?int $step;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $id = '',
        string $name = '',
        ?string $value = '',
        string $class = 'form-control',
        string $placeholder = '',
        bool $required = false,
        bool $disabled = false,
        bool $autofocus = false,
        string $autocomplete = '',
        ?int $min = null,
        ?int $max = null,
        ?int $step = 1
    ) {
        $this->id = $id ?: $name;
        $this->name = $name;
        $this->value = $value ?? '';
        $this->class = $class;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->autofocus = $autofocus;
        $this->autocomplete = $autocomplete;
        $this->min = $min;
        $this->max = $max;
        $this->step = $step;
    }
    public function render(): View|Closure|string
    {
        return view('components.forms.input-number');
    }
}
