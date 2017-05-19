<?php
use App\models\Roles;
use Illuminate\Database\Seeder;


class RolesSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ["name" => "Super Admin", "id" => "super-admin"], // Manage everything
            ["name" => "Project Admin", "id" => "project-admin"], // Manage most aspects of the site
            ["name" => "Editor", "id" => "editor"], // Scheduling and managing content
            ["name" => "Moderator", "id" => "moderator"], // Moderate user content
            ["name" => "Member", "id" => "member"], // Special user access
            ["name" => "User", "id" => "user"], // Average Joe
        ];

        DB::beginTransaction();

        try {
            foreach ($roles as $role) {
                $record = Roles::find($role['id']);

                if (!$record) {
                    Roles::create($role);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            echo 'Point of failure ' . $e->getCode() . ' ' . $e->getMessage();
            throw new Exception($e);
        }

        DB::commit();
    }
}