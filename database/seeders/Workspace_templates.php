<?php

namespace Database\Seeders;

use App\Models\WorkspaceTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Workspace_templates extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workspace_templates = [
            [
                "name" => "Kanban",
                "description" => "Optimized for visualizing work and limiting work-in-progress.",
                "default_config" => [
                    "columns" => [
                        [
                            "name" => "To Do",
                            "work_in_progress_limits" => 5,
                        ],
                        [
                            'name' => "In Progress",
                            "work_in_progress_limits" => 3,

                        ],
                        [
                            "name"=> "Done",
                            "work_in_progress_limits" => null,
    
                           ]
                    ],
                    
                ],

                 "ideal_for"=>"Teams with no strict timeframes or deadlines"
            ],




            [
                "name" => "Scrum",
                "description" => "Structured for agile teams working in timeboxed iterations (sprints).",
                "default_config" => [
                    "columns" => [
                       
                        [
                            'name' => "To Do",
                            "work_in_progress_limits" => 3,

                        ],

                       [
                        "name"=> "In Progress",
                        "work_in_progress_limits" => null,

                       ],
                        [
                            "name" => "Done",
                            "work_in_progress_limits" => null,
                        ],
                    ],
                    "features" => [
                        
                        "work_in_progress_limits" => true,
                        "focus_on_continuous_delivery"=>true

                    ],
                    
                ],
                 "ideal_for"=>"Teams working in iterations with clear deliverables and regular sprint reviews."
            ],
            [
                "name" => "Bug Tracking",
                "description" => "Streamlines the process of reporting, tracking, and resolving bugs or issues.",
                "default_config" => [
                    "columns" => [
                       
                        [
                            'name' => "Reported",
                            "work_in_progress_limits" => 3,

                        ],

                       [
                        "name"=> "In Progress",
                        "work_in_progress_limits" => null,

                       ],
                        [
                            "name" => "Resolved",
                            "work_in_progress_limits" => null,
                        ],
                    ],
                    "features" => [
                        
                        "work_in_progress_limits" => true,
                        "focus_on_continuous_delivery"=>true

                    ],
                    
                ],
                 "ideal_for"=>"Streamlines the process of reporting, tracking, and resolving bugs or issues."
            ],

        ];
foreach($workspace_templates as $template){
    WorkspaceTemplate::create([
        "name"=>$template["name"],
        "ideal_for"=>$template["ideal_for"],
        "description"=>$template["descrition"],
        "default_config"=>$template['default_config']
    ]);

}

    }
}
