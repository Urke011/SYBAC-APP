<?php

namespace App\Console\Commands;

use App\Constants\Permissions;
use App\Models\Permission;
use Illuminate\Console\Command;

class SyncPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to sync all defined permissions in the system to the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $systemDefinedPermissions = Permissions::getAllSystemPermissions();

        $bar = $this->output->createProgressBar(count($systemDefinedPermissions));

        $bar->start();

        // First create or update model
        $permissions = collect($systemDefinedPermissions)->map(function ($systemDefinedPermission) use ($bar) {
            try {
                $existingPermission = Permission::findByName(Permissions::getPermissionKey($systemDefinedPermission));

                $existingPermission->update(Permissions::getPermissionModel($systemDefinedPermission));

                return $existingPermission;
            } catch (\Throwable $th) {
                return  Permission::create(Permissions::getPermissionModel($systemDefinedPermission));
            }

            $bar->advance(0.5);
        })
            // Second update model with parent
            ->map(function ($permission) use ($bar) {
                try {
                    $parentPermissonKey = Permissions::findPermissionParentKey($permission->name);

                    if ($parentPermissonKey) {
                        $parentPermisson = Permission::findByName($parentPermissonKey);
                        $permission->parent_id = $parentPermisson->id;

                        $saved = $permission->save();
                        if (!$saved) $this->error('failed save for key:' . $permission->name);
                    }

                    return $permission;
                } catch (\Throwable $th) {
                    $this->error('failed save for key:' . $permission->name);
                }

                $bar->advance(0.5);
            });

        $bar->finish();

        if (count($permissions) === count($systemDefinedPermissions)) {
            $this->newLine();
            $this->line('All permissiones are synced');

            $this->table(
                ['ID', 'Title', 'Key'],
                $permissions->map(fn ($permission) => [$permission->id, $permission->title, $permission->name])->toArray()
            );
        } else {
            $this->error('Not all permissions are synced');
        }




        return Command::SUCCESS;
    }
}
