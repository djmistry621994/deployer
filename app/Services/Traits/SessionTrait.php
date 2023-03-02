<?php

namespace App\Services\Traits;

trait SessionTrait
{
    public function success($message, $inputs)
    {
        foreach ($inputs as $key => $input) {
            $inputs[$key] = __($input);
        }
        session()->flash('message', __($message, $inputs));
        session()->flash('type', 'success');
    }

    public function warning($message, $inputs)
    {
        foreach ($inputs as $key => $input) {
            $inputs[$key] = __($input);
        }
        session()->flash('message', __($message, $inputs));
        session()->flash('type', 'warning');
    }
}
