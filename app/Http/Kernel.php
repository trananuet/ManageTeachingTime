<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'check_mod_admin' => \Modules\User\Http\Middleware\MiddlewareAdmin\CheckAdminMiddleware::class,

        //MIDDLERWARE MANAGE CATEGORY
        'check_manage_training' => \Modules\User\Http\Middleware\MiddlewareManageCategory\ManageTrainingMiddleware::class,
        'check_manage_school_year' => \Modules\User\Http\Middleware\MiddlewareManageCategory\ManageSchoolYearMiddleware::class,
        'check_manage_semester' => \Modules\User\Http\Middleware\MiddlewareManageCategory\ManageSemesterMiddleware::class,
        'check_manage_title' => \Modules\User\Http\Middleware\MiddlewareManageCategory\ManageTitleMiddleware::class,
        'check_manage_faculty' => \Modules\User\Http\Middleware\MiddlewareManageCategory\ManageFacultyMiddleware::class,
        'check_manage_teacher' => \Modules\User\Http\Middleware\MiddlewareManageCategory\ManageTeacherMiddleware::class,
        'check_manage_course' => \Modules\User\Http\Middleware\MiddlewareManageCategory\ManageCourseMiddleware::class,
        'check_manage_thesis' => \Modules\User\Http\Middleware\MiddlewareManageCategory\ManageThesisMiddleware::class,
        'check_manage_salary' => \Modules\User\Http\Middleware\MiddlewareManageCategory\ManageSalaryMiddleware::class,
        'check_manage_course_lecturer' => \Modules\User\Http\Middleware\MiddlewareManageCategory\ManageCourseLecturerMiddleware::class,
        'check_manage_thesis_lecturer' => \Modules\User\Http\Middleware\MiddlewareManageCategory\ManageThesisLecturerMiddleware::class,
        
        // MIDDLERWARE SYSTEM
        'check_manage_access' => \Modules\User\Http\Middleware\MiddlewareManageSystem\ManageAccessMiddleware::class,
        'check_manage_user' => \Modules\User\Http\Middleware\MiddlewareManageSystem\ManageUserMiddleware::class,
        'check_manage_functions' => \Modules\User\Http\Middleware\MiddlewareManageSystem\ManageFunctionsMiddleware::class,
        'check_manage_permission' => \Modules\User\Http\Middleware\MiddlewareManageSystem\ManagePermissionMiddleware::class,
        'check_manage_history' => \Modules\User\Http\Middleware\MiddlewareManageSystem\ManageHistoryMiddleware::class,
    ];
}
