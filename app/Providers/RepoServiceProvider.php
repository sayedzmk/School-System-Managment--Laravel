<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\TeacherRepositoryInterface',
            'App\Repository\TeacherRepository');

        $this->app->bind(
            'App\Repository\StudentRepositoryInterface',
            'App\Repository\StudentRepository');

        $this->app->bind(
            'App\Repository\StudentPromotionRepositoryInterface',
            'App\Repository\StudentPromotionRepository');

        $this->app->bind(
            'App\Repository\StudentGraduationRepositoryInterface',
            'App\Repository\StudentGraduationRepository');

        $this->app->bind(
            'App\Repository\FeesRepositoryInterface',
            'App\Repository\FeesRepository');

        $this->app->bind(
            'App\Repository\FeeInvoiceRepositoryInterface',
            'App\Repository\FeeInvoiceRepository');

        $this->app->bind(
            'App\Repository\ReceiptStudentsRepositoryInterface',
            'App\Repository\ReceiptStudentsRepository');
        $this->app->bind(
            'App\Repository\ProcessingFeeRepositoryInterface',
            'App\Repository\ProcessingFeeRepository');
        $this->app->bind(
            'App\Repository\PayementStudentRepositoryInterface',
            'App\Repository\PayementStudentRepository');
        $this->app->bind(
            'App\Repository\AttendanceStudentRepositoryInterface',
            'App\Repository\AttendanceStudentRepository');
        $this->app->bind(
            'App\Repository\SubjectRepositoryInterface',
            'App\Repository\SubjectRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
