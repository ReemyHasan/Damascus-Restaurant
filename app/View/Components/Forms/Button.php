<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $type;
    public string $class;
    public bool $disabled;
    public string $id;
    public string $text;
    public $icon;
    public ?string $name;
    public ?string $value;

    public $iconStyle;
    public $slotPosition;
    public array $extraAttributes;


    /**
     * Create a new component instance.
     */
    public function __construct(
        string $type = 'button',
        string $class = 'btn btn-primary',
        bool $disabled = false,
        string $id = '',
        string $text = '',
        $icon = '',
        $name = '',
        $value = '',
        $iconStyle = '',
        $slotPosition = 'left',
        array $extraAttributes = []

    ) {
        $this->type = $type;
        $this->class = $class;
        $this->disabled = $disabled;
        $this->id = $id;
        $this->text = $text;
        $this->extraAttributes = $extraAttributes;
        $this->icon = $icon;
        $this->name = $name;
        $this->value = $value;
        $this->iconStyle = $iconStyle;
        $this->slotPosition = $slotPosition;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.button');
    }
}
