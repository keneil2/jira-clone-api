<?php

namespace Database\Seeders;

use App\Models\TaskType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $taskTypes = [
            ['name' => 'Bug'],
            ['name' => 'Feature'],
            ['name' => 'Improvement'],
            ['name' => 'Task'],
            ['name' => 'Story'],
            ['name' => 'Epic'],
            ['name' => 'Sub-task'],
            ['name' => 'Technical Debt'],
            ['name' => 'Code Review'],
            ['name' => 'Design'],
            ['name' => 'Content'],
            ['name' => 'Campaign'],
            ['name' => 'Test Case'],
            ['name' => 'UAT'],
            ['name' => 'Spike'],
            ['name' => 'Support Request'],
            ['name' => 'Maintenance'],
            ['name' => 'DevOps'],
            ['name' => 'SEO'],
            ['name' => 'Research'],
       ];
       foreach($taskTypes as $task){
       TaskType::create($task);
       }
        
    }
}
