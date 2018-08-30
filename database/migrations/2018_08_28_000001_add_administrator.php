<?php

use App\Data\Models\User;
use Illuminate\Database\Migrations\Migration;

class AddAdministrator extends Migration
{
    public function up()
    {
        User::where('username', 'afaria')->update(['is_admin' => true]);
    }

    public function down()
    {
    }
}
