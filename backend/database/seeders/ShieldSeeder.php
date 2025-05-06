<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_autorizacion::por::entidad","view_any_autorizacion::por::entidad","create_autorizacion::por::entidad","update_autorizacion::por::entidad","restore_autorizacion::por::entidad","restore_any_autorizacion::por::entidad","replicate_autorizacion::por::entidad","reorder_autorizacion::por::entidad","delete_autorizacion::por::entidad","delete_any_autorizacion::por::entidad","force_delete_autorizacion::por::entidad","force_delete_any_autorizacion::por::entidad","view_ciudad","view_any_ciudad","create_ciudad","update_ciudad","restore_ciudad","restore_any_ciudad","replicate_ciudad","reorder_ciudad","delete_ciudad","delete_any_ciudad","force_delete_ciudad","force_delete_any_ciudad","view_contratacion::cliente","view_any_contratacion::cliente","create_contratacion::cliente","update_contratacion::cliente","restore_contratacion::cliente","restore_any_contratacion::cliente","replicate_contratacion::cliente","reorder_contratacion::cliente","delete_contratacion::cliente","delete_any_contratacion::cliente","force_delete_contratacion::cliente","force_delete_any_contratacion::cliente","view_contratacion::credenciale","view_any_contratacion::credenciale","create_contratacion::credenciale","update_contratacion::credenciale","restore_contratacion::credenciale","restore_any_contratacion::credenciale","replicate_contratacion::credenciale","reorder_contratacion::credenciale","delete_contratacion::credenciale","delete_any_contratacion::credenciale","force_delete_contratacion::credenciale","force_delete_any_contratacion::credenciale","view_departamento","view_any_departamento","create_departamento","update_departamento","restore_departamento","restore_any_departamento","replicate_departamento","reorder_departamento","delete_departamento","delete_any_departamento","force_delete_departamento","force_delete_any_departamento","view_empresa","view_any_empresa","create_empresa","update_empresa","restore_empresa","restore_any_empresa","replicate_empresa","reorder_empresa","delete_empresa","delete_any_empresa","force_delete_empresa","force_delete_any_empresa","view_entidad","view_any_entidad","create_entidad","update_entidad","restore_entidad","restore_any_entidad","replicate_entidad","reorder_entidad","delete_entidad","delete_any_entidad","force_delete_entidad","force_delete_any_entidad","view_equipo","view_any_equipo","create_equipo","update_equipo","restore_equipo","restore_any_equipo","replicate_equipo","reorder_equipo","delete_equipo","delete_any_equipo","force_delete_equipo","force_delete_any_equipo","view_especialidad","view_any_especialidad","create_especialidad","update_especialidad","restore_especialidad","restore_any_especialidad","replicate_especialidad","reorder_especialidad","delete_especialidad","delete_any_especialidad","force_delete_especialidad","force_delete_any_especialidad","view_extension::sede","view_any_extension::sede","create_extension::sede","update_extension::sede","restore_extension::sede","restore_any_extension::sede","replicate_extension::sede","reorder_extension::sede","delete_extension::sede","delete_any_extension::sede","force_delete_extension::sede","force_delete_any_extension::sede","view_linea::entidade","view_any_linea::entidade","create_linea::entidade","update_linea::entidade","restore_linea::entidade","restore_any_linea::entidade","replicate_linea::entidade","reorder_linea::entidade","delete_linea::entidade","delete_any_linea::entidade","force_delete_linea::entidade","force_delete_any_linea::entidade","view_medico","view_any_medico","create_medico","update_medico","restore_medico","restore_any_medico","replicate_medico","reorder_medico","delete_medico","delete_any_medico","force_delete_medico","force_delete_any_medico","view_medico::procedimiento::sede","view_any_medico::procedimiento::sede","create_medico::procedimiento::sede","update_medico::procedimiento::sede","restore_medico::procedimiento::sede","restore_any_medico::procedimiento::sede","replicate_medico::procedimiento::sede","reorder_medico::procedimiento::sede","delete_medico::procedimiento::sede","delete_any_medico::procedimiento::sede","force_delete_medico::procedimiento::sede","force_delete_any_medico::procedimiento::sede","view_nexxa","view_any_nexxa","create_nexxa","update_nexxa","restore_nexxa","restore_any_nexxa","replicate_nexxa","reorder_nexxa","delete_nexxa","delete_any_nexxa","force_delete_nexxa","force_delete_any_nexxa","view_p::g::p::asmet","view_any_p::g::p::asmet","create_p::g::p::asmet","update_p::g::p::asmet","restore_p::g::p::asmet","restore_any_p::g::p::asmet","replicate_p::g::p::asmet","reorder_p::g::p::asmet","delete_p::g::p::asmet","delete_any_p::g::p::asmet","force_delete_p::g::p::asmet","force_delete_any_p::g::p::asmet","view_p::g::p::sura","view_any_p::g::p::sura","create_p::g::p::sura","update_p::g::p::sura","restore_p::g::p::sura","restore_any_p::g::p::sura","replicate_p::g::p::sura","reorder_p::g::p::sura","delete_p::g::p::sura","delete_any_p::g::p::sura","force_delete_p::g::p::sura","force_delete_any_p::g::p::sura","view_p::q::r::s::f","view_any_p::q::r::s::f","create_p::q::r::s::f","update_p::q::r::s::f","restore_p::q::r::s::f","restore_any_p::q::r::s::f","replicate_p::q::r::s::f","reorder_p::q::r::s::f","delete_p::q::r::s::f","delete_any_p::q::r::s::f","force_delete_p::q::r::s::f","force_delete_any_p::q::r::s::f","view_procedimiento","view_any_procedimiento","create_procedimiento","update_procedimiento","restore_procedimiento","restore_any_procedimiento","replicate_procedimiento","reorder_procedimiento","delete_procedimiento","delete_any_procedimiento","force_delete_procedimiento","force_delete_any_procedimiento","view_procedimiento::sos::cedicaf","view_any_procedimiento::sos::cedicaf","create_procedimiento::sos::cedicaf","update_procedimiento::sos::cedicaf","restore_procedimiento::sos::cedicaf","restore_any_procedimiento::sos::cedicaf","replicate_procedimiento::sos::cedicaf","reorder_procedimiento::sos::cedicaf","delete_procedimiento::sos::cedicaf","delete_any_procedimiento::sos::cedicaf","force_delete_procedimiento::sos::cedicaf","force_delete_any_procedimiento::sos::cedicaf","view_procedimiento::sos::radiologos","view_any_procedimiento::sos::radiologos","create_procedimiento::sos::radiologos","update_procedimiento::sos::radiologos","restore_procedimiento::sos::radiologos","restore_any_procedimiento::sos::radiologos","replicate_procedimiento::sos::radiologos","reorder_procedimiento::sos::radiologos","delete_procedimiento::sos::radiologos","delete_any_procedimiento::sos::radiologos","force_delete_procedimiento::sos::radiologos","force_delete_any_procedimiento::sos::radiologos","view_sede","view_any_sede","create_sede","update_sede","restore_sede","restore_any_sede","replicate_sede","reorder_sede","delete_sede","delete_any_sede","force_delete_sede","force_delete_any_sede","view_tiempo::r::n::m","view_any_tiempo::r::n::m","create_tiempo::r::n::m","update_tiempo::r::n::m","restore_tiempo::r::n::m","restore_any_tiempo::r::n::m","replicate_tiempo::r::n::m","reorder_tiempo::r::n::m","delete_tiempo::r::n::m","delete_any_tiempo::r::n::m","force_delete_tiempo::r::n::m","force_delete_any_tiempo::r::n::m","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user"]},{"name":"panel_user","guard_name":"web","permissions":["view_autorizacion::por::entidad","view_any_autorizacion::por::entidad","view_ciudad","view_any_ciudad","view_contratacion::cliente","view_any_contratacion::cliente","view_contratacion::credenciale","view_any_contratacion::credenciale","view_extension::sede","view_any_extension::sede","view_linea::entidade","view_any_linea::entidade","view_medico::procedimiento::sede","view_any_medico::procedimiento::sede","view_nexxa","view_any_nexxa","view_p::g::p::asmet","view_any_p::g::p::asmet","view_p::g::p::sura","view_any_p::g::p::sura","view_p::q::r::s::f","view_any_p::q::r::s::f","view_procedimiento","view_any_procedimiento","view_procedimiento::sos::cedicaf","view_any_procedimiento::sos::cedicaf","view_procedimiento::sos::radiologos","view_any_procedimiento::sos::radiologos","view_sede","view_any_sede","view_tiempo::r::n::m","view_any_tiempo::r::n::m"]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
