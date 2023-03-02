<?php


namespace App\Lib;


class Route
{

    public static function route_to_reply_able($routes, $params = [], $condition = true)
    {
        $status = true;
        if ($params != []) {
            $query_string = http_build_query(request()->query());

            $string = http_build_query($params);

            if ($query_string != $string) {
                $status = false;
            }
        } else {
            if (request()->query() != []) {
                $status = false;
            }
        }

        return call_user_func_array([app('router'), 'is'], (array)$routes) && $condition && $status ? 'active' : '';
    }

    public static function route_to_reply_submenu($submenu, $true_return, $false_return = '')
    {
        $condition = true;

        $routes = self::get_submenu_active_routes($submenu);

        return call_user_func_array([app('router'), 'is'], (array)$routes) && $condition ? $true_return : $false_return;
    }

    public static function get_submenu_active_routes($submenu)
    {
        $submenu = collect($submenu);
        return $submenu->pluck('active_routes')->flatten()->toArray();
    }

    public static function can_see_submenu($submenu)
    {
        $submenu = collect($submenu);

        $all_permissions = collect([]);

        foreach ($submenu as $menu) {
            if (isset($menu['permission'])) {
                $all_permissions->push($menu['permission']);
            } else {
                if (isset($menu['values'])) {
                    foreach ($menu['values'] as $sub_menu) {
                        if (isset($sub_menu['permission'])) {
                            $all_permissions->push($sub_menu['permission']);
                        }
                    }
                }
            }
        }

        if ($all_permissions->contains('')) {
            return true;
        }
        if (self::hasAnyPermission($all_permissions->toArray())) {
            return true;
        }
        return false;
    }

    public static function hasAnyPermission($permission, $user = null)
    {
        if ($user == null) {
            $user = auth()->user();
        }

        if (!is_array($permission)) {
            $permission = [$permission];
        }
        return $user->hasAnyPermission($permission);
    }

}
