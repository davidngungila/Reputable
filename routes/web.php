<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OtpLoginController;
use App\Http\Controllers\Auth\SimpleLoginController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\CloudinaryController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\MountainTrekkingRouteController;
use App\Http\Controllers\Admin\TrekkingInfoController;
use App\Http\Controllers\Admin\TrekkingEquipmentController;
use App\Http\Controllers\Admin\TrekkingGuideController;
use App\Http\Controllers\Public\TourController as PublicTourController;
use App\Http\Controllers\Public\BookingController as PublicBookingController;
use App\Http\Controllers\Public\InquiryController as PublicInquiryController;
use App\Http\Controllers\Admin\ItineraryBuilderController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\SystemSettingsController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\SystemHealthController;
use App\Http\Controllers\Admin\SystemToolsController;
use App\Http\Controllers\Admin\EmailGatewayController;
use App\Http\Controllers\Admin\AccountSettingsController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\MountainController;

Route::get('/', [PublicTourController::class, 'home'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/destinations', function (\Illuminate\Http\Request $request) {
    $query = \App\Models\Destination::where('status', 'active');
    
    // Filter by region if specified
    if ($request->filled('region')) {
        $query->byRegion($request->region);
    }
    
    // Sort by region if requested
    if ($request->sort === 'region') {
        $destinations = $query->orderBy('region')->orderBy('name')->get();
    } else {
        $destinations = $query->latest()->get();
    }
    
    // Get available regions for filter dropdown
    $regions = \App\Models\Destination::where('status', 'active')
        ->whereNotNull('region')
        ->distinct()
        ->pluck('region')
        ->sort();
    
    return view('destinations', compact('destinations', 'regions'));
})->name('destinations');

// Circuit-based destination routes - using hyphens for better URL compatibility
// These must come BEFORE the general {id} route to avoid conflicts
Route::get('/destinations/Northern-Circuit', function () {
    $destinations = \App\Models\Destination::byRegion('Northern Circuit')->active()->get();
    return view('circuits.northern-circuit', compact('destinations'));
})->name('circuits.northern');

Route::get('/destinations/Southern-Circuit', function () {
    $destinations = \App\Models\Destination::byRegion('Southern Circuit')->active()->get();
    return view('circuits.southern-circuit', compact('destinations'));
})->name('circuits.southern');

Route::get('/destinations/Eastern-Circuit', function () {
    $destinations = \App\Models\Destination::byRegion('Eastern Circuit')->active()->get();
    return view('circuits.eastern-circuit', compact('destinations'));
})->name('circuits.eastern');

Route::get('/destinations/Western-Circuit', function () {
    $destinations = \App\Models\Destination::byRegion('Western Circuit')->active()->get();
    return view('circuits.western-circuit', compact('destinations'));
})->name('circuits.western');

Route::get('/destinations/Ocean-Islands', function () {
    $destinations = \App\Models\Destination::byRegion('Ocean Islands')->active()->get();
    return view('circuits.ocean-islands', compact('destinations'));
})->name('circuits.ocean-islands');

Route::get('/destinations/Mafia-Island', function () {
    $destinations = \App\Models\Destination::byRegion('Mafia Island')->active()->get();
    return view('circuits.mafia-island', compact('destinations'));
})->name('circuits.mafia-island');

Route::get('/destinations/Zanzibar-Island', function () {
    $destinations = \App\Models\Destination::byRegion('Zanzibar Island')->active()->get();
    return view('circuits.zanzibar-island', compact('destinations'));
})->name('circuits.zanzibar-island');

// General destination detail route - must come AFTER specific circuit routes
Route::get('/destinations/{id}', function ($id) {
    $destination = \App\Models\Destination::find($id);
    if (!$destination) {
        abort(404);
    }
    return view('destination-detail', compact('destination'));
})->name('destinations.show');

Route::get('/things-to-do', function () {
    return view('things-to-do');
})->name('things-to-do');

// Activity detail routes
Route::get('/activities/wildlife-safari', function () {
    return view('activities.wildlife-safari');
})->name('activities.wildlife-safari');

Route::get('/activities/mountain-trekking', function () {
    return view('activities.mountain-trekking');
})->name('activities.mountain-trekking');

Route::get('/activities/beach-activities', function () {
    return view('activities.beach-activities');
})->name('activities.beach-activities');

Route::get('/activities/balloon-safari', function () {
    return view('activities.balloon-safari');
})->name('activities.balloon-safari');

Route::get('/activities/cultural-visits', function () {
    return view('activities.cultural-visits');
})->name('activities.cultural-visits');

// Activity Pages (matching navigation URLs)
Route::get('/activity/game-drives', function () {
    return view('activities.game-drives');
})->name('activity.game-drives');

Route::get('/activity/wildlife-safari', function () {
    return view('activities.wildlife-safari');
})->name('activity.wildlife-safari');

Route::get('/activity/beach', function () {
    return view('activities.beach-activities');
})->name('activity.beach');

Route::get('/activity/balloon', function () {
    return view('activities.balloon-safari');
})->name('activity.balloon');

Route::get('/activity/cultural', function () {
    return view('activities.cultural-visits');
})->name('activity.cultural');

Route::get('/activity/bird-watching', function () {
    return view('activities.bird-watching');
})->name('activity.bird-watching');

Route::get('/activity/walking', function () {
    return view('activities.walking-tours');
})->name('activity.walking');

Route::get('/activity/night-game', function () {
    return view('activities.night-game-drives');
})->name('activity.night-game');

Route::get('/mountain-trekking', [PublicTourController::class, 'mountainTrekking'])->name('mountain-trekking');
Route::get('/mountain-trekking/trekking-info', function () { 
    $routes = \App\Models\MountainTrekkingRoute::active()->ordered()->get(); 
    return view('mountain-trekking.trekking-info', compact('routes')); 
})->name('mountain-trekking.info');
Route::get('/mountain-trekking/routes', function () { return view('mountain-trekking.routes'); })->name('mountain-trekking.routes');

// Mountain Trekking Pages
Route::get('/mountains', [MountainController::class, 'index'])->name('mountains.index');
Route::get('/mountains/{slug}', [MountainController::class, 'show'])->name('mountains.show');
Route::get('/mountains/{slug}/trekking-info', [MountainController::class, 'trekkingInfo'])->name('mountains.trekking-info');
Route::get('/mountains/{slug}/routes', [MountainController::class, 'routes'])->name('mountains.routes');
Route::get('/mountains/{slug}/equipment', [MountainController::class, 'equipmentGuide'])->name('mountains.equipment');
Route::get('/mountains/{slug}/guides', [MountainController::class, 'expertGuides'])->name('mountains.guides');

Route::get('/login', function () {
    return redirect()->route('simple.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Simple Login Routes
Route::get('/admin/login', [SimpleLoginController::class, 'showLoginForm'])->name('simple.login');
Route::post('/admin/login', [SimpleLoginController::class, 'login'])->name('simple.login');
Route::post('/admin/logout', [SimpleLoginController::class, 'logout'])->name('simple.logout');

Route::get('/login/otp', [OtpLoginController::class, 'show'])->name('login.otp');
Route::get('/login/otp/verify-link', [OtpLoginController::class, 'verifyLink'])->name('login.otp.verify_link');
Route::post('/login/otp', [OtpLoginController::class, 'verify'])->name('login.otp.verify');
Route::post('/login/otp/resend', [OtpLoginController::class, 'resend'])->name('login.otp.resend');
Route::get('/login/otp/splash', [OtpLoginController::class, 'splash'])->name('login.otp.splash');

// Password Recovery
Route::get('/password/reset', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/password/reset', function (Illuminate\Http\Request $request) {
    return back()->with('status', 'A recovery link has been sent to your inbox.');
})->name('password.email');

Route::get('/kilimanjaro', function () {
    return view('kilimanjaro');
})->name('kilimanjaro');

Route::prefix('regions')->name('regions.')->group(function () {
    Route::get('/serengeti', function () { return view('regions.serengeti'); })->name('serengeti');
    Route::get('/ngorongoro', function () { return view('regions.ngorongoro'); })->name('ngorongoro');
    Route::get('/zanzibar', function () { return view('regions.zanzibar'); })->name('zanzibar');
    Route::get('/tarangire', function () { return view('regions.tarangire'); })->name('tarangire');
    Route::get('/lake-manyara', function () { return view('regions.lake-manyara'); })->name('lake-manyara');
    Route::get('/nyerere', function () { return view('regions.nyerere'); })->name('nyerere');
    Route::get('/ruaha', function () { return view('regions.ruaha'); })->name('ruaha');
    Route::get('/mafia', function () { return view('regions.mafia'); })->name('mafia');
    Route::get('/arusha-national-park', function () { return view('regions.arusha-national-park'); })->name('arusha-national-park');
});

Route::get('/group-departures', function () {
    return view('group-departures');
})->name('group-departures');


Route::post('/analytics/track', [\App\Http\Controllers\AnalyticsController::class, 'track'])->name('analytics.track');

Route::get('/tours', [PublicTourController::class, 'index'])->name('tours.index');
Route::get('/tours/preview/{id}', [PublicTourController::class, 'preview'])->name('tours.preview');
Route::get('/tours/{id}', function($id) {
    return redirect()->route('tours.preview', 2);
})->name('tours.show');
Route::get('/bookings/create', [PublicBookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [PublicBookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{id}/checkout', [PublicBookingController::class, 'checkout'])->name('bookings.checkout');
Route::post('/bookings/{id}/confirm', [PublicBookingController::class, 'confirm'])->name('bookings.confirm');
Route::get('/bookings/{id}/invoice', [PublicBookingController::class, 'downloadInvoice'])->name('bookings.invoice');
Route::get('/bookings/{id}/invoice/preview', [PublicBookingController::class, 'previewInvoice'])->name('bookings.invoice.preview');

// Public Inquiry Routes
Route::get('/contact/inquiry', [PublicInquiryController::class, 'create'])->name('inquiries.create');
Route::post('/contact/inquiry', [PublicInquiryController::class, 'store'])->name('inquiries.store');

Route::prefix('client')->name('client.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'ensure.admin', 'activity.log'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Account Settings
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/settings/account', [DashboardController::class, 'accountSettings'])->name('settings.account');
    Route::put('/settings/account', [DashboardController::class, 'updateAccountSettings'])->name('settings.account.update');

    // Organization Management
    Route::resource('organizations', OrganizationController::class);
    Route::get('/organizations/{organization}/dashboard', [OrganizationController::class, 'dashboard'])->name('organizations.dashboard');

    // Branch Management
    Route::resource('branches', BranchController::class);
    Route::get('/branches/{branch}/dashboard', [BranchController::class, 'dashboard'])->name('branches.dashboard');

    // Department Management
    Route::resource('departments', DepartmentController::class);
    Route::get('/departments/{department}/dashboard', [DepartmentController::class, 'dashboard'])->name('departments.dashboard');

    Route::get('/placeholder', function (Request $request) {
        return view('admin.page', ['title' => (string) $request->query('title', 'Page')]);
    })->name('placeholder');

    Route::post('/nav-role-view', function (Request $request) {
        $user = $request->user();

        if (!$user || !method_exists($user, 'hasAnyRole') || !$user->hasAnyRole(['System Administrator'])) {
            abort(403);
        }

        $role = (string) $request->input('role');

        $allowed = [
            'super-admin',
            'admin-manager',
            'accountant',
            'marketing',
            'sales',
            'operations',
            'driver-guide',
            'external-agent',
            'client-portal',
            'branch-manager',
            'it-support',
        ];

        if (!in_array($role, $allowed, true)) {
            abort(422);
        }

        $request->session()->put('nav_role_view', $role);

        return back();
    })->name('nav-role-view.set');

    Route::post('/nav-role-view/clear', function (Request $request) {
        $user = $request->user();

        if (!$user || !method_exists($user, 'hasAnyRole') || !$user->hasAnyRole(['System Administrator'])) {
            abort(403);
        }

        $request->session()->forget('nav_role_view');

        return back();
    })->name('nav-role-view.clear');

    Route::resource('tours', TourController::class)->whereNumber('tour');

    // Tours & Packages Subpages
    Route::get('/tours/itinerary-builder', [TourController::class, 'itineraryBuilder'])->name('tours.itinerary-builder');
    Route::post('/tours/itinerary-builder', [TourController::class, 'storeItinerary'])->name('tours.itinerary-builder.store');
    Route::get('/api/tours/{tour}', [TourController::class, 'showApi'])->name('tours.api.show');
    Route::get('/tours/{tour}/itineraries', [TourController::class, 'itinerariesIndex'])->name('tours.itineraries.index');
    Route::put('/itineraries/{itinerary}', [TourController::class, 'updateItinerary'])->name('itineraries.update');
    Route::delete('/itineraries/{itinerary}', [TourController::class, 'destroyItinerary'])->name('itineraries.destroy');
    Route::get('/tours/availability-pricing', [TourController::class, 'availabilityPricing'])->name('tours.availability-pricing');
    Route::post('/tours/availability-pricing/{tour}', [TourController::class, 'updateAvailability'])->name('tours.availability-pricing.update');
    Route::get('/tours/destinations', [TourController::class, 'destinations'])->name('tours.destinations');
    Route::get('/tours/destinations/create', [TourController::class, 'createDestination'])->name('tours.destinations.create');
    Route::post('/tours/destinations', [TourController::class, 'storeDestination'])->name('tours.destinations.store');
    Route::get('/tours/destinations/{destination}/edit', [TourController::class, 'editDestination'])->name('tours.destinations.edit');
    Route::put('/tours/destinations/{destination}', [TourController::class, 'updateDestination'])->name('tours.destinations.update');
    Route::delete('/tours/destinations/{destination}', [TourController::class, 'destroyDestination'])->name('tours.destinations.destroy');

    // Mountain Trekking
    Route::get('/mountain/kilimanjaro-routes', [MountainController::class, 'adminKilimanjaroRoutes'])->name('mountain.kilimanjaro-routes');
    Route::get('/mountain/meru-climbing', [MountainController::class, 'adminMeruClimbing'])->name('mountain.meru-climbing');
    
    // Mountain Trekking Admin Routes (updated format)
    Route::get('/admin/mountain/kilimanjaro-routes', [MountainController::class, 'adminKilimanjaroRoutes'])->name('admin.mountain.kilimanjaro-routes');
    Route::get('/admin/mountain/meru-climbing', [MountainController::class, 'adminMeruClimbing'])->name('admin.mountain.meru-climbing');
    
    // Mountains Management
    Route::prefix('mountains')->name('mountains.')->group(function () {
        Route::get('/', [MountainController::class, 'adminIndex'])->name('admin.index');
        Route::get('/{slug}', [MountainController::class, 'adminShow'])->name('admin.show');
        Route::get('/{id}/edit', [MountainController::class, 'edit'])->name('edit');
        Route::put('/{id}', [MountainController::class, 'update'])->name('update');
    });

    // Things to Do - Activities
    Route::resource('activities', ActivityController::class)->whereNumber('activity');
    
    // Things to Do Subpages
    Route::get('/activities/view-all', [ActivityController::class, 'viewAllActivities'])->name('activities.view-all');
    Route::get('/activities/cultural-tours', [ActivityController::class, 'culturalTours'])->name('activities.cultural-tours');
    Route::get('/activities/beach-activities', [ActivityController::class, 'beachActivities'])->name('activities.beach-activities');
    Route::get('/activities/wildlife-experiences', [ActivityController::class, 'wildlifeExperiences'])->name('activities.wildlife-experiences');
    Route::get('/activities/management', [ActivityController::class, 'activitiesManagement'])->name('activities.management');

    // Inquiries Management
    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/export', [InquiryController::class, 'export'])->name('inquiries.export');
    Route::get('/inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
    Route::put('/inquiries/{inquiry}', [InquiryController::class, 'update'])->name('inquiries.update');
    Route::delete('/inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');
    Route::post('/inquiries/{inquiry}/respond', [InquiryController::class, 'markAsResponded'])->name('inquiries.respond');
    Route::post('/inquiries/{inquiry}/close', [InquiryController::class, 'markAsClosed'])->name('inquiries.close');

    // Media Management (Cloudinary)
    Route::prefix('cloudinary')->name('cloudinary.')->group(function () {
        Route::get('/', [CloudinaryController::class, 'index'])->name('index');
        Route::get('/upload', [CloudinaryController::class, 'upload'])->name('upload');
        Route::post('/upload', [CloudinaryController::class, 'store'])->name('store');
        Route::get('/folders', [CloudinaryController::class, 'folders'])->name('folders');
        Route::post('/folders', [CloudinaryController::class, 'createFolder'])->name('create-folder');
        Route::get('/analytics', [CloudinaryController::class, 'analytics'])->name('analytics');
        Route::get('/test', [CloudinaryController::class, 'test'])->name('test');
        Route::get('/test-api', [CloudinaryController::class, 'testApi'])->name('test-api');
        Route::delete('/{publicId}', [CloudinaryController::class, 'destroy'])->name('destroy');
    });

    // Hero Slides Management
    Route::prefix('hero-slides')->name('hero-slides.')->group(function () {
        Route::get('/', [HeroSlideController::class, 'index'])->name('index');
        Route::get('/create', [HeroSlideController::class, 'create'])->name('create');
        Route::post('/', [HeroSlideController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [HeroSlideController::class, 'edit'])->name('edit');
        Route::put('/{id}', [HeroSlideController::class, 'update'])->name('update');
        Route::delete('/{id}', [HeroSlideController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/toggle-status', [HeroSlideController::class, 'toggleStatus'])->name('toggle-status');
        Route::post('/reorder', [HeroSlideController::class, 'reorder'])->name('reorder');
    });

    // Mountain Trekking Management
    Route::prefix('mountain-trekking-routes')->name('mountain-trekking-routes.')->group(function () {
        Route::get('/', [MountainTrekkingRouteController::class, 'index'])->name('index');
        Route::get('/create', [MountainTrekkingRouteController::class, 'create'])->name('create');
        Route::post('/', [MountainTrekkingRouteController::class, 'store'])->name('store');
        Route::get('/{mountainTrekkingRoute}', [MountainTrekkingRouteController::class, 'show'])->name('show');
        Route::get('/{mountainTrekkingRoute}/edit', [MountainTrekkingRouteController::class, 'edit'])->name('edit');
        Route::put('/{mountainTrekkingRoute}', [MountainTrekkingRouteController::class, 'update'])->name('update');
        Route::delete('/{mountainTrekkingRoute}', [MountainTrekkingRouteController::class, 'destroy'])->name('destroy');
        Route::post('/{mountainTrekkingRoute}/toggle-status', [MountainTrekkingRouteController::class, 'toggleStatus'])->name('toggle-status');
        Route::post('/bulk-action', [MountainTrekkingRouteController::class, 'bulkAction'])->name('bulk-action');
        Route::post('/reorder', [MountainTrekkingRouteController::class, 'reorder'])->name('reorder');
    });

    Route::prefix('trekking-info')->name('trekking-info.')->group(function () {
        Route::get('/', [TrekkingInfoController::class, 'index'])->name('index');
        Route::get('/create', [TrekkingInfoController::class, 'create'])->name('create');
        Route::post('/', [TrekkingInfoController::class, 'store'])->name('store');
        Route::get('/{trekkingInfo}', [TrekkingInfoController::class, 'show'])->name('show');
        Route::get('/{trekkingInfo}/edit', [TrekkingInfoController::class, 'edit'])->name('edit');
        Route::put('/{trekkingInfo}', [TrekkingInfoController::class, 'update'])->name('update');
        Route::delete('/{trekkingInfo}', [TrekkingInfoController::class, 'destroy'])->name('destroy');
        Route::post('/{trekkingInfo}/toggle-status', [TrekkingInfoController::class, 'toggleStatus'])->name('toggle-status');
        Route::post('/bulk-action', [TrekkingInfoController::class, 'bulkAction'])->name('bulk-action');
    });

    Route::prefix('trekking-equipment')->name('trekking-equipment.')->group(function () {
        Route::get('/', [TrekkingEquipmentController::class, 'index'])->name('index');
        Route::get('/create', [TrekkingEquipmentController::class, 'create'])->name('create');
        Route::post('/', [TrekkingEquipmentController::class, 'store'])->name('store');
        Route::get('/{trekkingEquipment}', [TrekkingEquipmentController::class, 'show'])->name('show');
        Route::get('/{trekkingEquipment}/edit', [TrekkingEquipmentController::class, 'edit'])->name('edit');
        Route::put('/{trekkingEquipment}', [TrekkingEquipmentController::class, 'update'])->name('update');
        Route::delete('/{trekkingEquipment}', [TrekkingEquipmentController::class, 'destroy'])->name('destroy');
        Route::post('/{trekkingEquipment}/toggle-status', [TrekkingEquipmentController::class, 'toggleStatus'])->name('toggle-status');
        Route::post('/bulk-action', [TrekkingEquipmentController::class, 'bulkAction'])->name('bulk-action');
    });

    Route::prefix('trekking-guides')->name('trekking-guides.')->group(function () {
        Route::get('/', [TrekkingGuideController::class, 'index'])->name('index');
        Route::get('/create', [TrekkingGuideController::class, 'create'])->name('create');
        Route::post('/', [TrekkingGuideController::class, 'store'])->name('store');
        Route::get('/{trekkingGuide}', [TrekkingGuideController::class, 'show'])->name('show');
        Route::get('/{trekkingGuide}/edit', [TrekkingGuideController::class, 'edit'])->name('edit');
        Route::put('/{trekkingGuide}', [TrekkingGuideController::class, 'update'])->name('update');
        Route::delete('/{trekkingGuide}', [TrekkingGuideController::class, 'destroy'])->name('destroy');
        Route::post('/{trekkingGuide}/toggle-status', [TrekkingGuideController::class, 'toggleStatus'])->name('toggle-status');
        Route::post('/{trekkingGuide}/toggle-availability', [TrekkingGuideController::class, 'toggleAvailability'])->name('toggle-availability');
        Route::post('/bulk-action', [TrekkingGuideController::class, 'bulkAction'])->name('bulk-action');
    });

    // Mountain Trekking Admin Routes (matching requested URLs)
    Route::get('/mountain-trekking/trekking-info', [TrekkingInfoController::class, 'index'])->name('admin.mountain-trekking.trekking-info');
    Route::get('/mountain-trekking/routes', [MountainTrekkingRouteController::class, 'index'])->name('admin.mountain-trekking.routes');
    Route::get('/mountain-trekking/guides', [TrekkingGuideController::class, 'index'])->name('admin.mountain-trekking.guides');

    // Operations
    Route::prefix('operations')->name('operations.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\OperationsController::class, 'dashboard'])->name('dashboard');

        // Tour Planning
        Route::get('/calendar', [App\Http\Controllers\Admin\OperationsController::class, 'calendar'])->name('calendar');
        Route::get('/calendar/export-pdf', [App\Http\Controllers\Admin\OperationsController::class, 'calendarExportPdf'])->name('calendar.export-pdf');
        Route::get('/upcoming', [App\Http\Controllers\Admin\OperationsController::class, 'upcoming'])->name('upcoming');
        Route::get('/active-trips', [App\Http\Controllers\Admin\OperationsController::class, 'activeTrips'])->name('active-trips');

        // Assignments
        Route::get('/assign/guides', [App\Http\Controllers\Admin\OperationsController::class, 'assignGuides'])->name('assign.guides');
        Route::get('/assign/drivers', [App\Http\Controllers\Admin\OperationsController::class, 'assignDrivers'])->name('assign.drivers');
        Route::get('/assign/vehicles', [App\Http\Controllers\Admin\OperationsController::class, 'assignVehicles'])->name('assign.vehicles');

        // Logistics
        Route::get('/logistics/accommodation', [App\Http\Controllers\Admin\OperationsController::class, 'logisticsAccommodation'])->name('logistics.accommodation');
        Route::get('/logistics/park-fees', [App\Http\Controllers\Admin\OperationsController::class, 'logisticsParkFees'])->name('logistics.park-fees');
        Route::get('/logistics/flights', [App\Http\Controllers\Admin\OperationsController::class, 'logisticsFlights'])->name('logistics.flights');

        // Suppliers
        Route::get('/suppliers/operators', [App\Http\Controllers\Admin\OperationsController::class, 'suppliersOperators'])->name('suppliers.operators');
        Route::get('/suppliers/contracts', [App\Http\Controllers\Admin\OperationsController::class, 'suppliersContracts'])->name('suppliers.contracts');
        Route::get('/suppliers/payments', [App\Http\Controllers\Admin\OperationsController::class, 'suppliersPayments'])->name('suppliers.payments');

        // Monitoring
        Route::get('/monitoring/status', [App\Http\Controllers\Admin\MonitoringController::class, 'status'])->name('monitoring.status');

        Route::get('/monitoring/incidents', [App\Http\Controllers\Admin\IncidentReportController::class, 'index'])->name('monitoring.incidents');
        Route::get('/monitoring/incidents/create', [App\Http\Controllers\Admin\IncidentReportController::class, 'create'])->name('monitoring.incidents.create');
        Route::post('/monitoring/incidents', [App\Http\Controllers\Admin\IncidentReportController::class, 'store'])->name('monitoring.incidents.store');
        Route::get('/monitoring/incidents/{incident}/edit', [App\Http\Controllers\Admin\IncidentReportController::class, 'edit'])->name('monitoring.incidents.edit');
        Route::put('/monitoring/incidents/{incident}', [App\Http\Controllers\Admin\IncidentReportController::class, 'update'])->name('monitoring.incidents.update');
        Route::delete('/monitoring/incidents/{incident}', [App\Http\Controllers\Admin\IncidentReportController::class, 'destroy'])->name('monitoring.incidents.destroy');

        Route::get('/monitoring/feedback', [App\Http\Controllers\Admin\CustomerFeedbackController::class, 'index'])->name('monitoring.feedback');
        Route::get('/monitoring/feedback/create', [App\Http\Controllers\Admin\CustomerFeedbackController::class, 'create'])->name('monitoring.feedback.create');
        Route::post('/monitoring/feedback', [App\Http\Controllers\Admin\CustomerFeedbackController::class, 'store'])->name('monitoring.feedback.store');
        Route::get('/monitoring/feedback/{feedback}/edit', [App\Http\Controllers\Admin\CustomerFeedbackController::class, 'edit'])->name('monitoring.feedback.edit');
        Route::put('/monitoring/feedback/{feedback}', [App\Http\Controllers\Admin\CustomerFeedbackController::class, 'update'])->name('monitoring.feedback.update');
        Route::delete('/monitoring/feedback/{feedback}', [App\Http\Controllers\Admin\CustomerFeedbackController::class, 'destroy'])->name('monitoring.feedback.destroy');

        // Reports
        Route::get('/reports/completion', [App\Http\Controllers\Admin\OperationsController::class, 'reportsCompletion'])->name('reports.completion');
        Route::get('/reports/performance', [App\Http\Controllers\Admin\OperationsController::class, 'reportsPerformance'])->name('reports.performance');
    });
    
    // CRM & Sales
    Route::get('/bookings', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/pending', [App\Http\Controllers\Admin\BookingController::class, 'pending'])->name('bookings.pending');
    Route::get('/bookings/confirmed', [App\Http\Controllers\Admin\BookingController::class, 'confirmed'])->name('bookings.confirmed');
    Route::get('/bookings/calendar', [App\Http\Controllers\Admin\BookingController::class, 'calendar'])->name('bookings.calendar');
    Route::get('/bookings/create', [App\Http\Controllers\Admin\BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [App\Http\Controllers\Admin\BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}', [App\Http\Controllers\Admin\BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{id}/edit', [App\Http\Controllers\Admin\BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [App\Http\Controllers\Admin\BookingController::class, 'update'])->name('bookings.update');
    Route::get('/bookings/{id}/assignments', [App\Http\Controllers\Admin\BookingController::class, 'editAssignments'])->name('bookings.assignments.edit');
    Route::put('/bookings/{id}/assignments', [App\Http\Controllers\Admin\BookingController::class, 'updateAssignments'])->name('bookings.assignments.update');
    Route::post('/bookings/{id}/send-itinerary', [App\Http\Controllers\Admin\BookingController::class, 'sendItinerary'])->name('bookings.send-itinerary');
    Route::get('/bookings/{id}/receipt', [App\Http\Controllers\Admin\BookingController::class, 'downloadReceipt'])->name('bookings.receipt');
    Route::get('/bookings/{id}/receipt/preview', [App\Http\Controllers\Admin\BookingController::class, 'previewReceipt'])->name('bookings.receipt.preview');
    Route::post('/bookings/{id}/verify-payment', [App\Http\Controllers\Admin\BookingController::class, 'verifyPayment'])->name('bookings.verify-payment');
    Route::get('/quotations', function() { return view('admin.quotations.index'); })->name('quotations.index');
    Route::get('/quotations/create', function() { return view('admin.quotations.create'); })->name('quotations.create');
    Route::get('/quotations/accepted', function() { return view('admin.quotations.accepted'); })->name('quotations.accepted');
    Route::get('/quotations/export-pdf', function () {
        $quotes = [
            ['id' => 'QT-2026-001', 'client' => 'Marcus Aurelius', 'brief' => '8 Days Northern Circuit Premium', 'val' => '$12,400', 'status' => 'Sent'],
            ['id' => 'QT-2026-002', 'client' => 'Lucius Vorenus', 'brief' => '3 Days Serengeti Balloon Safari', 'val' => '$4,200', 'status' => 'Converted'],
            ['id' => 'QT-2026-003', 'client' => 'Julius Caesar', 'brief' => '14 Days Luxury Tanzania & Zanzibar', 'val' => '$32,500', 'status' => 'Draft'],
            ['id' => 'QT-2026-004', 'client' => 'Cleopatra VII', 'brief' => '5 Days Kili Marangu Route', 'val' => '$2,800', 'status' => 'Expired'],
        ];

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.quotations', [
            'quotes' => $quotes,
            'generatedAt' => now(),
            'generatedBy' => auth()->user(),
        ]);

        return $pdf->download('Quotations_' . now()->format('Ymd_His') . '.pdf');
    })->name('quotations.export-pdf');

    Route::get('/quotations/export-pdf/preview', function () {
        $quotes = [
            ['id' => 'QT-2026-001', 'client' => 'Marcus Aurelius', 'brief' => '8 Days Northern Circuit Premium', 'val' => '$12,400', 'status' => 'Sent'],
            ['id' => 'QT-2026-002', 'client' => 'Lucius Vorenus', 'brief' => '3 Days Serengeti Balloon Safari', 'val' => '$4,200', 'status' => 'Converted'],
            ['id' => 'QT-2026-003', 'client' => 'Julius Caesar', 'brief' => '14 Days Luxury Tanzania & Zanzibar', 'val' => '$32,500', 'status' => 'Draft'],
            ['id' => 'QT-2026-004', 'client' => 'Cleopatra VII', 'brief' => '5 Days Kili Marangu Route', 'val' => '$2,800', 'status' => 'Expired'],
        ];

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.quotations', [
            'quotes' => $quotes,
            'generatedAt' => now(),
            'generatedBy' => auth()->user(),
        ]);

        return $pdf->stream('Quotations_' . now()->format('Ymd_His') . '.pdf');
    })->name('quotations.export-pdf.preview');
    Route::get('/customers', function() { return view('admin.customers.index'); })->name('customers.index');
    
    // Inventory & Logistics
    Route::get('/hotels', function() { return view('admin.hotels.index'); })->name('hotels.index');
    Route::get('/fleet', function() { return view('admin.fleet.index'); })->name('fleet.index');
    
    // Finance & Analytics
    Route::get('/finance', [App\Http\Controllers\Admin\FinanceController::class, 'dashboard'])->name('finance.index');
    Route::get('/finance/export-pdf', [App\Http\Controllers\Admin\FinanceController::class, 'dashboardExportPdf'])->name('finance.export-pdf');
    Route::get('/finance/overview', [App\Http\Controllers\Admin\FinanceController::class, 'dashboard'])->name('finance.overview');
    Route::view('/finance/cash-position', 'admin.finance.page', ['title' => 'Cash Position'])->name('finance.cash-position');
    Route::view('/finance/monthly-summary', 'admin.finance.page', ['title' => 'Monthly Summary'])->name('finance.monthly-summary');

    Route::prefix('finance/revenue')->name('finance.revenue.')->group(function () {
        Route::get('/all-bookings', [App\Http\Controllers\Admin\FinanceController::class, 'revenueBookingRevenue'])->name('all-bookings');
        Route::get('/deposits', [App\Http\Controllers\Admin\FinanceController::class, 'revenueDeposits'])->name('deposits');
        Route::get('/outstanding-balances', [App\Http\Controllers\Admin\FinanceController::class, 'revenueOutstanding'])->name('outstanding-balances');
        Route::get('/multi-currency-tracker', [App\Http\Controllers\Admin\FinanceController::class, 'revenueMultiCurrency'])->name('multi-currency-tracker');
    });

    Route::prefix('finance/invoices')->name('finance.invoices.')->group(function () {
        Route::get('/all', [App\Http\Controllers\Admin\FinanceController::class, 'invoicesAll'])->name('all');
        Route::get('/all/export-pdf', [App\Http\Controllers\Admin\FinanceController::class, 'invoicesExportPdf'])->name('export-pdf');
        Route::get('/create', [App\Http\Controllers\Admin\FinanceController::class, 'invoicesCreate'])->name('create');
        Route::get('/draft', [App\Http\Controllers\Admin\FinanceController::class, 'invoicesDraft'])->name('draft');
        Route::get('/overdue', [App\Http\Controllers\Admin\FinanceController::class, 'invoicesOverdue'])->name('overdue');
        Route::get('/credit-notes', [App\Http\Controllers\Admin\FinanceController::class, 'invoicesCreditNotes'])->name('credit-notes');
    });

    Route::prefix('finance/ar')->name('finance.ar.')->group(function () {
        Route::get('/customer-balances', [App\Http\Controllers\Admin\FinanceController::class, 'arCustomerBalances'])->name('customer-balances');
        Route::get('/customer-balances/export-pdf', [App\Http\Controllers\Admin\FinanceController::class, 'arCustomerBalancesExportPdf'])->name('customer-balances.export-pdf');
        Route::get('/aging-report', [App\Http\Controllers\Admin\FinanceController::class, 'arAgingReport'])->name('aging-report');
        Route::get('/aging-report/export-pdf', [App\Http\Controllers\Admin\FinanceController::class, 'arAgingReportExportPdf'])->name('aging-report.export-pdf');
        Route::get('/payment-reminders', [App\Http\Controllers\Admin\FinanceController::class, 'arPaymentReminders'])->name('payment-reminders');
        Route::get('/payment-reminders/export-pdf', [App\Http\Controllers\Admin\FinanceController::class, 'arPaymentRemindersExportPdf'])->name('payment-reminders.export-pdf');
        Route::view('/installment-plans', 'admin.finance.page', ['title' => 'Installment Plans'])->name('installment-plans');
    });

    Route::prefix('finance/ap')->name('finance.ap.')->group(function () {
        Route::get('/supplier-bills', [App\Http\Controllers\Admin\FinanceAPController::class, 'supplierBills'])->name('supplier-bills');
        Route::get('/pending-payments', [App\Http\Controllers\Admin\FinanceAPController::class, 'pendingPayments'])->name('pending-payments');
        Route::get('/operator-payments', [App\Http\Controllers\Admin\FinanceAPController::class, 'operatorPayments'])->name('operator-payments');
        Route::view('/guide-payments', 'admin.finance.page', ['title' => 'Guide Payments'])->name('guide-payments');
        Route::get('/due-schedule', [App\Http\Controllers\Admin\FinanceAPController::class, 'dueSchedule'])->name('due-schedule');
        Route::get('/due-schedule/export-pdf', [App\Http\Controllers\Admin\FinanceAPController::class, 'dueScheduleExportPdf'])->name('due-schedule.export-pdf');
    });

    Route::prefix('finance/transactions')->name('finance.transactions.')->group(function () {
        Route::view('/all', 'admin.finance.page', ['title' => 'All Transactions'])->name('all');
        Route::view('/bank-transfers', 'admin.finance.page', ['title' => 'Bank Transfers'])->name('bank-transfers');
        Route::view('/cash', 'admin.finance.page', ['title' => 'Cash Transactions'])->name('cash');
        Route::view('/mobile-money', 'admin.finance.page', ['title' => 'Mobile Money (M-Pesa, Airtel)'])->name('mobile-money');
        Route::view('/stripe-card', 'admin.finance.page', ['title' => 'Stripe / Card Payments'])->name('stripe-card');
    });

    Route::prefix('finance/expenses')->name('finance.expenses.')->group(function () {
        Route::get('/', [ExpenseController::class, 'index'])->name('index');
        Route::get('/create', [ExpenseController::class, 'create'])->name('create');
        Route::post('/', [ExpenseController::class, 'store'])->name('store');
        Route::get('/{expense}/edit', [ExpenseController::class, 'edit'])->whereNumber('expense')->name('edit');
        Route::put('/{expense}', [ExpenseController::class, 'update'])->whereNumber('expense')->name('update');
        Route::delete('/{expense}', [ExpenseController::class, 'destroy'])->whereNumber('expense')->name('destroy');
        Route::get('/tracking', [App\Http\Controllers\Admin\ExpenseController::class, 'tracking'])->name('tracking');
        Route::get('/tracking/export-pdf', [App\Http\Controllers\Admin\ExpenseController::class, 'trackingExportPdf'])->name('tracking.export-pdf');

        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ExpenseCategoryController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\ExpenseCategoryController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\ExpenseCategoryController::class, 'store'])->name('store');
            Route::get('/{category}/edit', [App\Http\Controllers\Admin\ExpenseCategoryController::class, 'edit'])->whereNumber('category')->name('edit');
            Route::put('/{category}', [App\Http\Controllers\Admin\ExpenseCategoryController::class, 'update'])->whereNumber('category')->name('update');
            Route::delete('/{category}', [App\Http\Controllers\Admin\ExpenseCategoryController::class, 'destroy'])->whereNumber('category')->name('destroy');
        });

        Route::prefix('recurring')->name('recurring.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\RecurringExpenseController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\RecurringExpenseController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\RecurringExpenseController::class, 'store'])->name('store');
            Route::get('/{recurring}/edit', [App\Http\Controllers\Admin\RecurringExpenseController::class, 'edit'])->whereNumber('recurring')->name('edit');
            Route::put('/{recurring}', [App\Http\Controllers\Admin\RecurringExpenseController::class, 'update'])->whereNumber('recurring')->name('update');
            Route::delete('/{recurring}', [App\Http\Controllers\Admin\RecurringExpenseController::class, 'destroy'])->whereNumber('recurring')->name('destroy');
        });

        Route::view('/vendors', 'admin.finance.page', ['title' => 'Vendor Management'])->name('vendors');
    });

    Route::prefix('finance/commissions')->name('finance.commissions.')->group(function () {
        Route::view('/overview', 'admin.finance.page', ['title' => 'Commission Overview'])->name('overview');
        Route::view('/per-booking', 'admin.finance.page', ['title' => 'Per Booking Commission'])->name('per-booking');
        Route::view('/operator', 'admin.finance.page', ['title' => 'Operator Commission'])->name('operator');
        Route::view('/agent', 'admin.finance.page', ['title' => 'Agent Commission'])->name('agent');
        Route::view('/reports', 'admin.finance.page', ['title' => 'Commission Reports'])->name('reports');
    });

    Route::prefix('finance/banking')->name('finance.banking.')->group(function () {
        Route::get('/bank-accounts', [App\Http\Controllers\Admin\FinanceBankingController::class, 'bankAccounts'])->name('bank-accounts');
        Route::get('/bank-accounts/export-pdf', [App\Http\Controllers\Admin\FinanceBankingController::class, 'bankAccountsExportPdf'])->name('bank-accounts.export-pdf');

        Route::get('/cash-accounts', [App\Http\Controllers\Admin\FinanceBankingController::class, 'cashAccounts'])->name('cash-accounts');
        Route::get('/cash-accounts/export-pdf', [App\Http\Controllers\Admin\FinanceBankingController::class, 'cashAccountsExportPdf'])->name('cash-accounts.export-pdf');

        Route::get('/accounts/create', [App\Http\Controllers\Admin\FinanceBankingController::class, 'accountsCreate'])->name('accounts.create');
        Route::post('/accounts', [App\Http\Controllers\Admin\FinanceBankingController::class, 'accountsStore'])->name('accounts.store');
        Route::get('/accounts/{account}/edit', [App\Http\Controllers\Admin\FinanceBankingController::class, 'accountsEdit'])->whereNumber('account')->name('accounts.edit');
        Route::put('/accounts/{account}', [App\Http\Controllers\Admin\FinanceBankingController::class, 'accountsUpdate'])->whereNumber('account')->name('accounts.update');
        Route::delete('/accounts/{account}', [App\Http\Controllers\Admin\FinanceBankingController::class, 'accountsDestroy'])->whereNumber('account')->name('accounts.destroy');

        Route::get('/transfers', [App\Http\Controllers\Admin\FinanceBankingController::class, 'transfers'])->name('transfers');
        Route::get('/transfers/create', [App\Http\Controllers\Admin\FinanceBankingController::class, 'transfersCreate'])->name('transfers.create');
        Route::post('/transfers', [App\Http\Controllers\Admin\FinanceBankingController::class, 'transfersStore'])->name('transfers.store');
        Route::get('/transfers/export-pdf', [App\Http\Controllers\Admin\FinanceBankingController::class, 'transfersExportPdf'])->name('transfers.export-pdf');

        Route::get('/reconciliation', [App\Http\Controllers\Admin\FinanceBankingController::class, 'reconciliation'])->name('reconciliation');
        Route::get('/reconciliation/create', [App\Http\Controllers\Admin\FinanceBankingController::class, 'reconciliationCreate'])->name('reconciliation.create');
        Route::post('/reconciliation', [App\Http\Controllers\Admin\FinanceBankingController::class, 'reconciliationStore'])->name('reconciliation.store');
        Route::get('/reconciliation/export-pdf', [App\Http\Controllers\Admin\FinanceBankingController::class, 'reconciliationExportPdf'])->name('reconciliation.export-pdf');
    });

    Route::prefix('finance/reports')->name('finance.reports.')->group(function () {
        Route::view('/profit-loss', 'admin.finance.page', ['title' => 'Profit & Loss'])->name('profit-loss');
        Route::view('/balance-sheet', 'admin.finance.page', ['title' => 'Balance Sheet'])->name('balance-sheet');
        Route::view('/cash-flow', 'admin.finance.page', ['title' => 'Cash Flow'])->name('cash-flow');
        Route::get('/revenue-report', function() { return view('admin.finance.revenue-reports'); })->name('revenue-report');
        Route::view('/expense-report', 'admin.finance.page', ['title' => 'Expense Report'])->name('expense-report');
        Route::view('/commission-report', 'admin.finance.page', ['title' => 'Commission Report'])->name('commission-report');
        Route::view('/tax-report', 'admin.finance.page', ['title' => 'Tax Report'])->name('tax-report');
        Route::view('/custom-builder', 'admin.finance.page', ['title' => 'Custom Report Builder'])->name('custom-builder');
    });

    Route::prefix('finance/tax')->name('finance.tax.')->group(function () {
        Route::view('/vat-settings', 'admin.finance.page', ['title' => 'VAT Settings'])->name('vat-settings');
        Route::view('/tax-summary', 'admin.finance.page', ['title' => 'Tax Summary'])->name('tax-summary');
        Route::view('/tax-payments', 'admin.finance.page', ['title' => 'Tax Payments'])->name('tax-payments');
        Route::view('/withholding-tax', 'admin.finance.page', ['title' => 'Withholding Tax'])->name('withholding-tax');
    });

    Route::prefix('finance/settings')->name('finance.settings.')->group(function () {
        Route::view('/chart-of-accounts', 'admin.finance.page', ['title' => 'Chart of Accounts'])->name('chart-of-accounts');
        Route::view('/currencies', 'admin.finance.page', ['title' => 'Currencies'])->name('currencies');
        Route::view('/exchange-rates', 'admin.finance.page', ['title' => 'Exchange Rates'])->name('exchange-rates');
        Route::view('/payment-methods', 'admin.finance.page', ['title' => 'Payment Methods'])->name('payment-methods');
        Route::view('/financial-year', 'admin.finance.page', ['title' => 'Financial Year Settings'])->name('financial-year');
        Route::view('/approval-rules', 'admin.finance.page', ['title' => 'Approval Rules'])->name('approval-rules');
    });
    Route::get('/statistics', function() { return view('admin.statistics.index'); })->name('statistics.index');
    Route::get('/analytics/realtime', [\App\Http\Controllers\Admin\RealtimeAnalyticsController::class, 'index'])->name('analytics.realtime');
    Route::get('/analytics/map', [\App\Http\Controllers\Admin\RealtimeAnalyticsController::class, 'map'])->name('analytics.map');
    Route::get('/analytics/realtime/api', [\App\Http\Controllers\Admin\RealtimeAnalyticsController::class, 'api'])->name('analytics.realtime.api');
    
    // System & Content
    Route::get('/marketing', function() { return view('admin.marketing.index'); })->name('marketing.index');
    Route::get('/website', function() { return view('admin.website.index'); })->name('website.index');
    Route::get('/support', function() { return view('admin.support.index'); })->name('support.index');
    Route::get('/settings', [SystemSettingsController::class, 'edit'])->name('settings.index');
    Route::put('/settings', [SystemSettingsController::class, 'update'])->name('settings.update');
    Route::get('/settings/user-management', [UserManagementController::class, 'index'])->name('settings.users.index');
    Route::get('/settings/user-management/create', [UserManagementController::class, 'create'])->name('settings.users.create');
    Route::post('/settings/user-management', [UserManagementController::class, 'store'])->name('settings.users.store');
    Route::get('/settings/user-management/{user}', [UserManagementController::class, 'show'])->whereNumber('user')->name('settings.users.show');
    Route::put('/settings/user-management/{user}', [UserManagementController::class, 'update'])->whereNumber('user')->name('settings.users.update');
    Route::get('/settings/role-permissions', [RolePermissionController::class, 'index'])->name('settings.roles.index');
    Route::post('/settings/role-permissions/roles', [RolePermissionController::class, 'storeRole'])->name('settings.roles.store');
    Route::put('/settings/role-permissions/roles/{role}', [RolePermissionController::class, 'updateRole'])->whereNumber('role')->name('settings.roles.update');
    Route::get('/settings/activity-logs', [ActivityLogController::class, 'index'])->name('settings.activity-logs.index');
    Route::get('/settings/activity-logs/{log}', [ActivityLogController::class, 'show'])->whereNumber('log')->name('settings.activity-logs.show');
    Route::get('/settings/system-health', [SystemHealthController::class, 'index'])->name('settings.system-health.index');

    Route::prefix('settings/system-tools')->name('settings.system-tools.')->group(function () {
        Route::get('/logs', [SystemToolsController::class, 'systemLogs'])->name('logs');
        Route::get('/logs/download', [SystemToolsController::class, 'systemLogsDownload'])->name('logs.download');

        Route::get('/user-activity', [SystemToolsController::class, 'userActivity'])->name('user-activity');
        Route::get('/user-activity/export-csv', [SystemToolsController::class, 'userActivityExportCsv'])->name('user-activity.export-csv');

        Route::get('/integrations', [SystemToolsController::class, 'integrations'])->name('integrations');

        Route::get('/backup', [SystemToolsController::class, 'backup'])->name('backup');
        Route::post('/backup/run', [SystemToolsController::class, 'backupRun'])->name('backup.run');
        Route::get('/backup/download', [SystemToolsController::class, 'backupDownload'])->name('backup.download');

        Route::get('/maintenance', [SystemToolsController::class, 'maintenance'])->name('maintenance');
        Route::post('/maintenance/enable', [SystemToolsController::class, 'maintenanceEnable'])->name('maintenance.enable');
        Route::post('/maintenance/disable', [SystemToolsController::class, 'maintenanceDisable'])->name('maintenance.disable');
    });
    
    // SMS Gateway Settings
    Route::prefix('settings/sms-gateway')->name('settings.sms-gateway.')->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\SMSGatewayController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\SMSGatewayController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\Admin\SMSGatewayController::class, 'store'])->name('store');
        Route::put('/{id}', [App\Http\Controllers\Admin\SMSGatewayController::class, 'update'])->whereNumber('id')->name('update');
        Route::delete('/{id}', [App\Http\Controllers\Admin\SMSGatewayController::class, 'destroy'])->whereNumber('id')->name('destroy');
        Route::post('/{id}/test-connection', [App\Http\Controllers\Admin\SMSGatewayController::class, 'testConnection'])->whereNumber('id')->name('testConnection');
        Route::post('/{id}/toggle-active', [App\Http\Controllers\Admin\SMSGatewayController::class, 'toggleActive'])->whereNumber('id')->name('toggleActive');
        Route::post('/{id}/set-primary', [App\Http\Controllers\Admin\SMSGatewayController::class, 'setPrimary'])->whereNumber('id')->name('setPrimary');
        Route::post('/draft/test-connection', [App\Http\Controllers\Admin\SMSGatewayController::class, 'testDraftConnection'])->name('draft.testConnection');
        Route::post('/draft/test-sms', [App\Http\Controllers\Admin\SMSGatewayController::class, 'testDraftSms'])->name('draft.testSms');
        Route::post('/test', [App\Http\Controllers\Admin\SMSGatewayController::class, 'test'])->name('test');
    });

    // Email Gateway Settings
    Route::prefix('settings/email-gateway')->name('settings.email-gateway.')->group(function() {
        Route::get('/', [EmailGatewayController::class, 'edit'])->name('edit');
        Route::post('/', [EmailGatewayController::class, 'update'])->name('update');
        Route::post('/activate/{gateway}', [EmailGatewayController::class, 'activate'])->whereNumber('gateway')->name('activate');
        Route::post('/test', [EmailGatewayController::class, 'test'])->name('test');
    });

    // Account Management
    Route::get('/profile', function() { return view('admin.profile'); })->name('admin.profile');
    Route::get('/settings/account', [AccountSettingsController::class, 'edit'])->name('admin.settings.account');
    Route::post('/settings/account', [AccountSettingsController::class, 'update'])->name('admin.settings.account.update');
});
