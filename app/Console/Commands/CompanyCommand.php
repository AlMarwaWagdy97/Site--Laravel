<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;
use phpDocumentor\Reflection\Types\This;

class CompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company';
    // protected $signature = 'contact:company {name} {phone?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add New Company';

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
     * @return int
     */
    public function handle()
    {

        $name = $this->ask('What is the company name ?');
        $phone = $this->ask('What is the company  phone ?');
        $this->info('Company name is '. $name . ' and its phone is '. $phone);
        if($this->confirm('Are you ready to insert this ?' )){
            Company::create(['name'  => $name, 'phone' => $phone]);
            $this->info('Company Added Susessfully');
        }
        else {
            $this->warn('No Company Added');
        }


        // $company = Company::create([
        //     'name'  => $this->argument('name'),
        //     'phone' => $this->argument('phone') ??  'N/A', 
        // ]);
        // $this->info('Added '.$company->name);


    //     $this->info('Info here');
    //     $this->warn('Warning here');
    //     $this->error('Error here');
    }
}
