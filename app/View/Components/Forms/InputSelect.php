<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelect extends Component
{
    public string $id;
    public string $name;
    public string $class;
    public array $options;
    public string|int|null $selected;
    public bool $required;
    public bool $disabled;
    public bool $autofocus;
    public bool $readonly;

    public string $placeholder;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $id = '',
        string $name = '',
        string $class = 'form-select',
        array $options = [],
        string|int|null $selected = null,
        bool $required = false,
        bool $disabled = false,
        bool $autofocus = false,
        bool $readonly = false,

        string $placeholder = ''
    ) {
        $this->id = $id ?: $name;
        $this->name = $name;
        $this->class = $class;
        $this->options = $options;
        $this->selected = $selected;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->autofocus = $autofocus;
        $this->readonly = $readonly;
        $this->placeholder = $placeholder;
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.input-select');
    }
}
