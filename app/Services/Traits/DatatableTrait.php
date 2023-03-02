<?php

namespace App\Services\Traits;

use App\Lib\Auth;
use App\Enums\Status;

trait DatatableTrait
{

    public function status($status, $table_name, $id, $statuses = [])
    {
        if (count($statuses) == 0) {
            $statuses = Status::STATUSES;
        }
        return '<span data-table="' . $table_name . '" data-id="' . $id . '" class="badge badge-' . $statuses[$status]['color'] . ' " style="cursor: default;">' .
            __('words.' . $statuses[$status]['name']) .
            '</span>';
    }


    public function show_button($table_name, $url)
    {
        $auth = new Auth();
        $str = '';
        $permission = $table_name . '_show';
        if ($auth->has_permissions($permission)) {
            $str = '<a href="' . $url . '" class="btn btn-secondary" data-toggle="tooltip" title="' . __('words.show') . '">
                <i class="fa fa-eye"></i>
            </a>';
        }
        return $str;
    }

    public function edit_button($table_name, $url)
    {
        $auth = new Auth();
        $str = '';
        $permission = $table_name . '_edit';
        if ($auth->has_permissions($permission)) {
            $str = '<a href="' . $url . '" class="btn btn-secondary" data-toggle="tooltip" title="' . __('words.edit') . '">
                <i class="fa fa-edit"></i>
            </a>';
        }
        return $str;
    }

    public function delete_button($table_name, $name, $url)
    {
        $auth = new Auth();
        $str = '';
        $permission = $table_name . '_delete';
        if ($auth->has_permissions($permission)) {
            $title = __('messages.delete_confirmation', ['name' => __('words.' . $name)]);
            $message = __('messages.wont_be_able_to_revert_it');
            $str = '<button data-url="' . $url . '" data-title="' . $title . '" data-message="' . $message . '" class="btn btn-danger js--delete-element" data-toggle="tooltip"
               title="' . __('words.delete') . '">
                <i class="fa fa-times"></i>
            </button>';
        }
        return $str;
    }

    public function concat_buttons($buttons)
    {
        return implode('&nbsp;', $buttons);
    }
}
