<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\PlanEarning;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('dashboard.*', function ($view) {
            if(is_client()){
                $client = client();
                $this->endSubscriptions($client);
                $this->deactivateSubscriptions($client);
            }else if(is_admin()){
                $users = User::role('client')->get();
                foreach($users as $user){
                    $client = Client::find($user->id);
                    $this->endSubscriptions($client);
                    $this->deactivateSubscriptions($client);
                }
            }
        });
    }
    
        private function endSubscriptions(Client $client)
        {
            $due_payments = $client->duePayments()->get();
            
            foreach($due_payments as $payment){
                $payment->markAsEarned();
            };
        }

        private function deactivateSubscriptions(Client $client)
        {
            $active_subscriptions = $client->deposits()->where('earning_completed', 0);

            foreach($active_subscriptions as $subscription)
            {
                $subscription->markAsCompleted();
            }
        }
}
