<?php

namespace App\Lib;

use Illuminate\Database\Schema\Blueprint;

class Migration
{
    public static function columns(Blueprint $table, $soft_delete = true)
    {
        $table->boolean('status')->default(1);

        $table->unsignedBigInteger('created_by')->nullable()->index();
        $table->unsignedBigInteger('updated_by')->nullable()->index();
        if ($soft_delete) {
            $table->unsignedBigInteger('deleted_by')->nullable()->index();
        }

        $table->timestamps();
        if ($soft_delete) {
            $table->softDeletes();
        }
    }
}
