<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    private $permissions , $user_permissions;


    public function __construct()
    {
        /*
        set the default permissions
        */
        $this->permissions =  [
                                /* user */

                                'view_users',
                                'add_users',
                                'edit_users',
                                'delete_users',
                                'assign_permissions',
                                'view_logins',

                                /* facturas */

                                'view_facturas',
                                'add_facturas',
                                'edit_facturas',
                                'delete_facturas',

                                /* proveedores */

                                'view_proveedores',
                                'add_proveedores',
                                'edit_proveedores',
                                'delete_proveedores',

                                /*Clientes*/

                                'view_clientes',
                                'add_clientes',
                                'edit_clientes',
                                'delete_clientes',

                                /*Empleados*/

                                'view_empleados',
                                'add_empleados',
                                'edit_empleados',
                                'delete_empleados',

                                /*Apertura de cajas*/

                                'view_apertura_caja',
                                'add_apertura_caja',
                                'edit_apertura_caja',
                                'delete_apertura_caja',

                                /*Cierre de cajas*/

                                'view_cierre_caja',
                                'add_cierre_caja',
                                'edit_cierre_caja',
                                'delete_cierre_caja',


                                 /* Productos */

                                'view_productos',
                                'add_productos',
                                'edit_productos',
                                'delete_productos',



                                 /* Movimientos de productos */

                                'view_movimientos',
                                'add_movimientos',
                                'edit_movimientos',
                                'delete_movimientos',

                                 /* Gastos del local */

                                 'view_gastos',
                                 'add_gastos',
                                 'edit_gastos',
                                 'delete_gastos',

                                 /*  Tasa diaria del dólar*/
                                 'add_tasa_diaria',
                                 'edit_tasa_diaria',
                                 'delete_tasa_diaria',

                                 /*  Historial de las cajas por vendedores*/
                                 'view_historial_cajas'



                              ];
        /*
        set the permissions for the user role, by default
        role admin we will assign all the permissions
        */
        $this->user_permissions = ['edit_users',
                                   'view_logins',

                                   /* Proveedores */
                                   'view_proveedores',
                                   'add_proveedores',
                                   'edit_proveedores',
                                   'delete_proveedores',

                                   /* Clientes */

                                   'view_clientes',
                                   'add_clientes',
                                   'edit_clientes',
                                   'delete_clientes',

                                   /* Facturas */

                                   'view_facturas',
                                   'add_facturas',
                                   'edit_facturas',
                                   'delete_facturas',

                                   /* Apertura de caja */

                                   'view_apertura_caja',
                                   'add_apertura_caja',

                                    /* Cierre de caja */
                                   'view_cierre_caja',
                                   'add_cierre_caja',

                                    /* Productos */
                                   'view_productos',
                                   'add_productos',
                                   'edit_productos',
                                   'delete_productos',

                                    /*  Tasa diaria del dólar*/
                                   'add_tasa_diaria',
                                   'edit_tasa_diaria'





                                ];

    }




    public function run()
	  {
    	  // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        foreach ($this->permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        // create the admin role and set all default permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo($this->permissions);

        // create the user role and set all user permissions
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo($this->user_permissions);
    }
}
