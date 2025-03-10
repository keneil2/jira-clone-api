<?php

namespace Database\Seeders;

use App\Models\ProjectTemplateFeature;
use App\Models\WorkspaceTemplateFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTemplateFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workspace_template_features = [
            [
                "workspace_templates_id" => 1,
                "feature_id" => 1,
            ],

            [
                "workspace_templates_id" => 1,
                "feature_id" => 1,
            ],
            [
                "workspace_templates_id" => 1,
                "feature_id" => 2,
            ],
            [
                "workspace_templates_id" => 1,
                "feature_id" => 3,
            ],

            [
                "workspace_templates_id" => 2,
                "feature_id" => 4,
            ],
            [
                "workspace_templates_id" => 2,
                "feature_id" => 5,
            ],
            [
                "workspace_templates_id" => 2,
                "feature_id" => 6,
            ],
            [
                "workspace_templates_id" => 2,
                "feature_id" => 7,
            ],
            [
                "workspace_templates_id" => 2,
                "feature_id" => 8,
            ],
            [
                "workspace_templates_id" => 3,
                "feature_id" => 9,
            ],
            [
                "workspace_templates_id" => 3,
                "feature_id" => 10,
            ],
            [
                "workspace_templates_id" => 3,
                "feature_id" => 11,
            ],

        ];
        foreach ($workspace_template_features as $feature) {
            ProjectTemplateFeature::create([
                "project_template_id" => $feature["workspace_templates_id"],
                "feature_id" => $feature["feature_id"]
            ]);
        }

    }
}
