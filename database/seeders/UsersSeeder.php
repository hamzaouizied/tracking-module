<?php
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
       User::create([
            'name'              => 'User-1',
            'email'             => env('email'),
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make(env('password')),
        ]);
    }
}
