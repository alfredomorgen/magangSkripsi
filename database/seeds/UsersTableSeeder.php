<?php

use App\User;
use App\Company;
use App\Jobseeker;
use App\Constant;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Edward Hashner',
            'email' => 'edwardhashner@gmail.com',
            'password' => bcrypt('qwerty'),
            'description' => 'Binus University - 1701355892',
            'role' => Constant::user_admin,
        ]);

        $user_company = User::create([
            'name' => 'Axel Soedarsono',
            'email' => 'axelsoedarsono@gmail.com',
            'password' => bcrypt('qwerty'),
            'description' => 'Binus University - 1701314545',
            'role' => Constant::user_company,
        ]);

        Company::create([
            'user_id' => $user_company->id,
            'address' => 'Jln. U No 18A, Kemanggisan, Jakarta',
            'website' => 'axelsoedarsono.blogspot.com',
            'industry' => 'Technology',
            'size' => 500,
        ]);

        $user_jobseeker = User::create([
            'name' => 'Alfredo Morgen',
            'email' => 'alfredomorgen@gmail.com',
            'password' => bcrypt('qwerty'),
            'phone' => '087897255266',
            'description' => 'Binus University - 1701351162',
            'role' => Constant::user_jobseeker,
        ]);

        Jobseeker::create([
            'user_id' => $user_jobseeker->id,
            'gender' => 0,
            'dob' => '1995-10-07',
            'gpa' => '3.86',
            'major' => 'IT',
            'university' => 'Binus University',
        ]);

        factory(App\User::class, 'jobseeker', 20)->create()->each(function ($jobseeker){
            $jobseeker->jobseeker()->save(factory(App\Jobseeker::class)->make());
        });

        factory(App\User::class, 'company', 20)->create()->each(function ($u){
            $u->company()->save(factory(App\Company::class)->create())->each(function ($company){
                $company->job()->save(factory(App\Job::class)->make());
            });
        });
    }
}
