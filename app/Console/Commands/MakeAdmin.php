<?php

namespace App\Console\Commands;

use App\Data\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parla:admin:make {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Turn user into admin by user email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($user = User::where('email', $this->argument('email'))->first()) {
            $user->is_admin = true;
            $user->save();
            $this->info($user->name . ' is now an administrator');
        } else {
            $this->info('User not found');
        }
    }
}
