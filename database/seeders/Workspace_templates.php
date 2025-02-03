<?php

namespace Database\Seeders;

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
                "description" => "Optimized for visualizing work and limiting work-in-progress.",
                "template_data" => [
                    "columns" => [
                        [
                            "name" => "Backlog",
                            "work_in_progress_limits" => 5,
                        ],
                        [
                            'name' => "To Do",
                            "work_in_progress_limits" => 3,

                        ],

                       [
                        "name"=> "In Progress",
                        "work_in_progress_limits" => null,

                       ]
                    ],
                    "features" => [
                        
                        "work_in_progress_limits" => true,
                        "focus_on_continuous_delivery"=>true

                    ],
                    
                ],
                 "ideal_for"=>"Teams with no strict timeframes or deadlines"
            ],









            [],
            [],
            [],
            []
        ];
    }
}
