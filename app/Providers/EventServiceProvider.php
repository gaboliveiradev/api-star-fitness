<?php

namespace App\Providers;

use App\Models\AccessGroupEmployeeAssocModel;
use App\Models\AccessGroupModel;
use App\Models\AccessGroupPermissionAssocModel;
use App\Models\AddressModel;
use App\Models\BillingModel;
use App\Models\CityModel;
use App\Models\DietModel;
use App\Models\EmployeeModel;
use App\Models\EvolutionExerciseAssocModel;
use App\Models\EvolutionModel;
use App\Models\ExerciseModel;
use App\Models\FoodModel;
use App\Models\GymMemberModel;
use App\Models\MealFoodAssocModel;
use App\Models\MealModel;
use App\Models\MeasurementModel;
use App\Models\PermissionModel;
use App\Models\PersonModel;
use App\Models\RoutineExerciseAssocModel;
use App\Models\TypeModel;
use App\Models\WorkoutRoutineModel;
use App\Observers\PersonObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Observers\AccessGroupEmployeeAssocObserver;
use App\Observers\AccessGroupObserver;
use App\Observers\AccessGroupPermissionAssocObserver;
use App\Observers\AddressObserver;
use App\Observers\BillingObserver;
use App\Observers\CityObserver;
use App\Observers\DietObserver;
use App\Observers\EmployeeObserver;
use App\Observers\EvolutionExerciseAssocObserver;
use App\Observers\EvolutionObserver;
use App\Observers\ExerciseObserver;
use App\Observers\FoodObserver;
use App\Observers\GymMemberObserver;
use App\Observers\MealFoodAssocObserver;
use App\Observers\MealObserver;
use App\Observers\MeasurementObserver;
use App\Observers\PermissionObserver;
use App\Observers\RoutineExerciseAssocObserver;
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
        AccessGroupEmployeeAssocModel::observe(AccessGroupEmployeeAssocObserver::class);
        AccessGroupModel::observe(AccessGroupObserver::class);
        AccessGroupPermissionAssocModel::observe(AccessGroupPermissionAssocObserver::class);
        AddressModel::observe(AddressObserver::class);
        BillingModel::observe(BillingObserver::class);
        CityModel::observe(CityObserver::class);
        DietModel::observe(DietObserver::class);
        EmployeeModel::observe(EmployeeObserver::class);
        EvolutionExerciseAssocModel::observe(EvolutionExerciseAssocObserver::class);
        EvolutionModel::observe(EvolutionObserver::class);
        ExerciseModel::observe(ExerciseObserver::class);
        FoodModel::observe(FoodObserver::class);
        GymMemberModel::observe(GymMemberObserver::class);
        MealFoodAssocModel::observe(MealFoodAssocObserver::class);
        MealModel::observe(MealObserver::class);
        MeasurementModel::observe(MeasurementObserver::class);
        PermissionModel::observe(PermissionObserver::class);
        RoutineExerciseAssocModel::observe(RoutineExerciseAssocObserver::class);
        TypeModel::observe(TypeObserver::class);
        WorkoutRoutineModel::observe(WorkoutRoutineObserver::class);
        PersonModel::observe(PersonObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
