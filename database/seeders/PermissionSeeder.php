<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Issues & Tasks
            'create_issues',
            'assign_issues',
            'update_issues',
            'delete_issues',
            'comment_on_issues',
            'edit_comments',
            'delete_comments',
            'watch_issues',
            'unwatch_issue',
            'link_issues',
            'clone_issues',
            'add_attachments',
            'set_due_date',
            'set_priority',
            'transition_issues',
        
            // Projects
            'change_project_settings',
            'edit_project',
            'delete_project',
            'view_project',
            'create_components',
            'manage_labels',
            'manage_versions',
            'archive_project',
        
            // Workspace
            'create_workspace',
            'delete_workspace',
            'edit_workspace',
            'manage_domains',
            'configure_default_roles',
        
            // Users & Roles
            'add_users',
            'remove_users',
            'add_role',
            'add_permission',
            'remove_project_user',
            'add_project_members',
            'remove_project_members',
            'manage_project_roles',
            'manage_roles',
            'view_user_tasks',
            'mention_users',
            'view_project_activity',
        
            // Boards
            'create_boards',
            'create_board',
            'edit_board',
            'delete_board',
            'reorder_columns',
            'delete_columns',
        
            // Sprints
            'create_sprints',
            'start_sprints',
            'close_sprints',
            'move_task',
            'move_tasks_between_sprints',
        
            // Billing
            'view_billing',
            'manage_subscription',
            'cancel_subscription',
        
            // Notifications
            'manage_own_notifications',
            'manage_team_notifications',
        
            // Reports & Filters
            'use_advanced_filters',
            'view_reports',
            'export_issues', 
        ];

        foreach($permissions as $permission){
            $slug=strtolower(str_replace("_",".",$permission));
   
      Permission::create([
        "name"=>$permission,
        "slug"=>$slug
       ]);
        }
        
    }
}
