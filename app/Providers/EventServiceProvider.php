<?php

namespace App\Providers;

use App\Models\AccessGroupModel;
use App\Models\AddressModel;
use App\Models\BillingModel;
use App\Models\DietModel;
use App\Models\EmployeeModel;
use App\Models\EvolutionModel;
use App\Models\ExerciseModel;
use App\Models\FoodModel;
use App\Models\GymMemberModel;
use App\Models\MealModel;
use App\Models\MeasurementModel;
use App\Models\PaymentModel;
use App\Models\PersonModel;
use App\Models\TypeModel;
use App\Models\WorkoutRoutineModel;
use App\Observers\PaymentObserver;
use App\Observers\PersonObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Observers\AccessGroupObserver;
use App\Observers\AddressObserver;
use App\Observers\BillingObserver;
use App\Observers\DietObserver;
use App\Observers\EmployeeObserver;
use App\Observers\EvolutionObserver;
use App\Observers\ExerciseObserver;
use App\Observers\FoodObserver;
use App\Observers\GymMemberObserver;
use App\Observers\MealObserver;
use App\Observers\MeasurementObserver;
use App\Observers\TypeObserver;
use App\Observers\WorkoutRoutineObserver;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot(): void
    {
        AccessGroupModel::observe(AccessGroupObserver::class);
        AddressModel::observe(AddressObserver::class);
        BillingModel::observe(BillingObserver::class);
        DietModel::observe(DietObserver::class);
        EmployeeModel::observe(EmployeeObserver::class);
        EvolutionModel::observe(EvolutionObserver::class);
        ExerciseModel::observe(ExerciseObserver::class);
        FoodModel::observe(FoodObserver::class);
        GymMemberModel::observe(GymMemberObserver::class);
        MealModel::observe(MealObserver::class);
        MeasurementModel::observe(MeasurementObserver::class);
        TypeModel::observe(TypeObserver::class);
        WorkoutRoutineModel::observe(WorkoutRoutineObserver::class);
        PersonModel::observe(PersonObserver::class);
        PaymentModel::observe(PaymentObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
