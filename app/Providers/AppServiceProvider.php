<?php

namespace App\Providers;

use App\Constants\Permissions;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\RoleResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        $this->sidebarNavigation();
        $this->topbarNavigation();
    }

    private function topbarNavigation()
    {
        $topbarNavigationItems = [];

        // array_push($topbarNavigationItems, [
        //     'label' => 'Dashboard',
        //     'route' => 'dashboard',
        //     'icon' => 'dashboard',
        //     'pattern' => 'dashboard/*',
        //     'permission' => Permissions::getPermissionKey(Permissions::ACCESS_FRONTEND),
        //     'childrens' => []
        // ]);
        view()->share('topbarNavigationItems', $topbarNavigationItems);
    }

    private function sidebarNavigation()
    {
        $sidebarNavigationItems = [];

        array_push($sidebarNavigationItems, [
            'label' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => 'dashboard',
            'pattern' => 'dashboard/*',
            'permission' => Permissions::getPermissionKey(Permissions::ACCESS_FRONTEND),
            'childrens' => []
        ]);
        array_push($sidebarNavigationItems, [
            'label' => 'Kunden',
            'route' => 'customers.index',
            'pattern' => 'customers/*',
            'icon' => 'customer',
            'permission' => Permissions::getPermissionKey(Permissions::ACCESS_CUSTOMERS),
            'childrens' => [
                // [
                //     'label' => 'Kunden erstellen',
                //     'route' => 'customers.create'
                // ], [
                //     'label' => 'Übersicht',
                //     'route' => 'customers.index'
                // ]
            ]
        ]);
        array_push($sidebarNavigationItems, [
            'label' => 'Anfragen',
            'route' => 'inquiries.index',
            'pattern' => 'inquiries/*',
            'icon' => 'inquiry',
            'permission' => Permissions::getPermissionKey(Permissions::ACCESS_INQUIRIES),
            'childrens' => []
        ]);
        array_push($sidebarNavigationItems, [
            'label' => 'Kalkulation',
            'route' => 'calculations.index',
            'pattern' => 'calculations/*',
            'icon' => 'calculation',
            'permission' => Permissions::getPermissionKey(Permissions::ACCESS_CALCULATIONS),
            'childrens' => []
        ]);
        array_push($sidebarNavigationItems, [
            'label' => 'Angebote',
            'route' => 'offers.index',
            'pattern' => 'offers/*',
            'icon' => 'offer',
            'permission' => Permissions::getPermissionKey(Permissions::ACCESS_OFFERS),
            'childrens' => []
        ]);
        // array_push($sidebarNavigationItems, [
        //     'label' => 'Benutzer',
        //     'route' => 'users.index',
        //     'pattern' => 'users/*',
        //     'icon' => 'users',
        //     'childrens' => []
        // ]);
        // array_push($sidebarNavigationItems, [
        //     'label' => 'Rollen',
        //     'route' => 'roles.index',
        //     'pattern' => 'roles/*',
        //     'icon' => 'roles',
        //     'childrens' => []
        // ]);

        view()->share('sidebarNavigationItems', $sidebarNavigationItems);
    }
}
