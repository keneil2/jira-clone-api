<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $features=[
        "drag_and_drop",
        "work_in_progress_limits",
        "focus_on_continuous_delivery",
        "backlog_management",
        "sprint_planning",
        'sprint_goals',
        'burn_down_chart',
        'velocity_tracking',
        'bug_security',
        'reproduction_steps',
        'integration_testing',
        'gantt_charts',
        'task_dependencies',
        'resource_allocation',
        'sla_tracking',
        'ticket_prioritization',
        'email_integration',
        'ci_cd_integration',
        'development_pipeline',
        'build_failure_alerts',
        'auto_scaling_notifications',
        'campaign_tracking',
        'content_calendar',
        'performace_metrics',
        'asset_management',
        'milestone_tracking',
        'priority_ranking',
        'dependency_ranking',
        'release_notes',
        'checklist_management',
        'training_schedule',
        'document_signoff',
        'reminder_notifications',
        'editorial_calendar',
        'review_workflow',
        'content_versioning',
        'multimedia_support',
        'custom_feilds',
        'automation_rules',
        'custom_notifications'
     ];

    }
}
