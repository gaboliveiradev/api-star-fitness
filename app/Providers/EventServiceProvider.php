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
use App\Models\EnrollmentModel;
use App\Models\EvolutionExerciseAssocModel;
use App\Models\EvolutionModel;
use App\Models\ExerciseModel;
use App\Models\FoodModel;
use App\Models\GymMemberModel;
use App\Models\MealFoodAssocModel;
use App\Models\MealModel;
use App\Models\MeasurementModel;
use App\Models\PermissionModel;
use App\Models\RoutineExerciseAssocModel;
use App\Models\TypeModel;
use App\Models\WorkoutRoutineModel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Observer\AccessGroupEmployeeAssocObserver;
use App\Observer\AccessGroupObserver;
use App\Observer\AccessGroupPermissionAssocObserver;
use App\Observer\AddressObserver;
use App\Observer\BillingObserver;
use App\Observer\CityObserver;
use App\Observer\DietObserver;
use App\Observer\EmployeeObserver;
use App\Observer\EnrollmentObserver;
use App\Observer\EvolutionExerciseAssocObserver;
use App\Observer\EvolutionObserver;
use App\Observer\ExerciseObserver;
use App\Observer\FoodObserver;
use App\Observer\GymMemberObserver;
use App\Observer\MealFoodAssocObserver;
use App\Observer\MealObserver;
use App\Observer\MeasurementObserver;
use App\Observer\PermissionObserver;
use App\Observer\RoutineExerciseAssocObserver;
use App\Observer\TypeObserver;
use App\Observer\WorkoutRoutineObserver;


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
        EnrollmentModel::observe(EnrollmentObserver::class);
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
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
