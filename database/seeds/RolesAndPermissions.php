<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'create promocode']);
        Permission::create(['name' => 'read promocodes']);
        Permission::create(['name' => 'update promocode']);
        Permission::create(['name' => 'delete promocode']);

        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'read products']);
        Permission::create(['name' => 'update product']);
        Permission::create(['name' => 'delete product']);

        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'read roles']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'read permissions']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);

        Permission::create(['name' => 'create cart']);
        Permission::create(['name' => 'read carts']);
        Permission::create(['name' => 'update cart']);
        Permission::create(['name' => 'delete cart']);


        // create roles and assign created permissions
        // EDITOR
        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo('read promocodes');
        $role->givePermissionTo('read products');
        $role->givePermissionTo('read carts');
        $role->givePermissionTo('update promocode');
        $role->givePermissionTo('update product');
        $role->givePermissionTo('update cart');

        // MODERATOR
        $role = Role::create(['name' => 'moderator']);
        $role->givePermissionTo('create promocode');
        $role->givePermissionTo('read promocodes');
        $role->givePermissionTo('update promocode');
        $role->givePermissionTo('delete promocode');
        $role->givePermissionTo('create product');
        $role->givePermissionTo('read products');
        $role->givePermissionTo('update product');
        $role->givePermissionTo('delete product');
        $role->givePermissionTo('create cart');
        $role->givePermissionTo('read carts');
        $role->givePermissionTo('update cart');
        $role->givePermissionTo('delete cart');
        
        // SUPER-ADMIN
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        // CLIENTE
        $role = Role::create(['name' => 'cliente']);
        $role->givePermissionTo('read products');
        $role->givePermissionTo('create cart');
        $role->givePermissionTo('read carts');
        $role->givePermissionTo('update cart');
        $role->givePermissionTo('delete cart');
    }
}
