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
        $project_template_features = [
            [
                "project_templates_id" => 1,
                "feature_id" => 1,
            ],

            [
                "project_templates_id" => 1,
                "feature_id" => 1,
            ],
            [
                "project_templates_id" => 1,
                "feature_id" => 2,
            ],
            [
                "project_templates_id" => 1,
                "feature_id" => 3,
            ],

            [
                "project_templates_id" => 2,
                "feature_id" => 4,
            ],
            [
                "project_templates_id" => 2,
                "feature_id" => 5,
            ],
            [
                "project_templates_id" => 2,
                "feature_id" => 6,
            ],
            [
                "project_templates_id" => 2,
                "feature_id" => 7,
            ],
            [
                "project_templates_id" => 2,
                "feature_id" => 8,
            ],
            [
                "project_templates_id" => 3,
                "feature_id" => 9,
            ],
            [
                "project_templates_id" => 3,
                "feature_id" => 10,
            ],
            [
                "project_templates_id" => 3,
                "feature_id" => 11,
            ],

        ];
        foreach ($project_template_features as $feature) {
            ProjectTemplateFeature::create([
                "project_template_id" => $feature["project_templates_id"],
                "feature_id" => $feature["feature_id"],
            ]);
        }

    }
}
