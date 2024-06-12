<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            // roles permission
            'addRole',
            'showRole',
            'editRole',
            'deleteRole',

            // user permission
            'addUser',
            'showUser',
            'editUser',
            'deleteUser',

            // resturant permission
            'addResturant',
            'showResturant',
            'editResturant',
            'deleteResturant',

            // clinic permission
            'addClinic',
            'showClinic',
            'editClinic',
            'deleteClinic',

            // menues
            'addMenu',
            'showMenu',
            'editMenu',
            'deleteMenu',

            // doctor permission
            'addDoctor',
            'showDoctor',
            'editDoctor',
            'deleteDoctor',

            // category permission
            'addCategory',
            'showCategory',
            'editCategory',
            'deleteCategory',

            // category clinic permission
            'addClinicCategory',
            'showClinicCategory',
            'editClinicCategory',
            'deleteClinicCategory',


            // product permission
            'addProduct',
            'showProduct',
            'editProduct',
            'deleteProduct',

            // Addtion permission
            'addAddon',
            'showAddon',
            'editAddon',
            'deleteAddon',

            // size permission
            'addSize',
            'showSize',
            'editSize',
            'deleteSize',

            // setting permission
            'updateAboutUS',
            'showContactUS',
            'deleteContactUS',

            // promo code permission
            'addPromoCode',
            'showPromoCode',
            'editPromoCode',
            'deletePromoCode',

            // promo code clinic permission
            'addClinicPromoCode',
            'showClinicPromoCode',
            'editClinicPromoCode',
            'deleteClinicPromoCode',


            // list order permission
            'showAllOrder',
            'trackorder',

            // reservation permission
            'listReservation',
            'deleteReservation',
            
            // list transaction
            'listTransaction',
            'deleteTransaction',
        ];

        foreach ($permission as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
