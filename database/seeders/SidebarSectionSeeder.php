<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\SidebarSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class SidebarSectionSeeder extends Seeder
{

  public function addSections(){
      $features = [ 
            "drag_and_drop" => "Tasks",
            "work_in_progress_limits" => "Tasks",
            "focus_on_continuous_delivery" => "Releases",
            "backlog_management" => "Planning",
            "sprint_planning" => "Planning",
            "sprint_goals" => "Planning",
            "burn_down_chart" => "Planning",
            "velocity_tracking" => "Planning",
            "bug_security" => "Review",
            "reproduction_steps" => "Review",
            "integration_testing" => "Review",
            "gantt_charts" => "Milestones",
            "task_dependencies" => "Tasks",
            "resource_allocation" => "Milestones",
            "sla_tracking" => "Milestones",
            "ticket_prioritization" => "Tasks",
            "email_integration" => "Customization",
            "ci_cd_integration" => "Releases",
            "development_pipeline" => "Releases",
            "build_failure_alerts" => "Releases",
            "auto_scaling_notifications" => "Releases",
            "campaign_tracking" => "Customization",
            "content_calendar" => "Customization",
            "performace_metrics" => "Review",
            "asset_management" => "Customization",
            "milestone_tracking" => "Milestones",
            "priority_ranking" => "Tasks",
            "dependency_ranking" => "Tasks",
            "release_notes" => "Releases",
            "checklist_management" => "Tasks",
            "training_schedule" => "Planning",
            "document_signoff" => "Review",
            "reminder_notifications" => "Customization",
            "editorial_calendar" => "Customization",
            "review_workflow" => "Review",
            "content_versioning" => "Review",
            "multimedia_support" => "Customization",
            "custom_feilds" => "Customization",
            "automation_rules" => "Customization",
            "custom_notifications" => "Customization"
        ];
        

     foreach($features as $feature => $section){
        $sidebar=SidebarSection::where("section_name",$section)->get();
      Feature::where("feature_name",$feature)->update(["sidebar_section_id"=>$sidebar[0]->id]);
     }
    }
  
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections=[
            "Planning",
            "Tasks",
            "Milestones",
            "Releases",
            "Review",
            "Customization"
        ];
        foreach($sections as $section){
          SidebarSection::create([
            "section_name"=>$section,
          ]);
        }
       $this->addSections();
    }
}
