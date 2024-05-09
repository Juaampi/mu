<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class SendBulkEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $users = User::all();

        Mail::to('jessijuampi@gmail.com')->send(new YourEmailMailable());

/*        foreach ($users as $user) {
            // Aquí puedes enviar el correo electrónico a cada usuario
            Mail::to($user->email)->send(new YourEmailMailable($user));
        }*/

        $this->info('Bulk emails sent successfully!');
    }
}
