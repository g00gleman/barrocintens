<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\rollen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
            if ($user &&
                Hash::check($request->password, $user->password)) {
                    
                $userrollen = rollen::all()->where('user_id', $user->id)->first();
                session()->put('admin', $userrollen->admin);
                session()->put('head_finance', $userrollen->head_finance);
                session()->put('finance', $userrollen->finance);
                session()->put('head_maintenance', $userrollen->head_maintenance);
                session()->put('maintenance', $userrollen->maintenance);
                session()->put('head_sales', $userrollen->head_sales);
                session()->put('sales', $userrollen->sales);
                session()->put('head_inkoop', $userrollen->head_inkoop);
                session()->put('inkoop', $userrollen->inkoop);
                session()->put('klant', $userrollen->klant);


                return $user;
            }
        });
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
