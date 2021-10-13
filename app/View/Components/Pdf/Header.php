<?php

namespace App\View\Components\Pdf;

use Illuminate\View\Component;

class Header extends Component
{
    public $watermark;

    public $orientation;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $watermark = false, string $orientation = 'portrait')
    {
        $this->watermark = $watermark;

        $this->orientation = $orientation;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pdf.header');
    }
}
