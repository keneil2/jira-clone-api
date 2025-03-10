<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\ProjectTemplate;
use App\Models\WorkspaceTemplate;
use Illuminate\Http\Request;

class ProjectTemplateController extends Controller
{
     /**
     * this functioin gets all the workspacetemplates
     * @return $data
     */
    public function all(){
     $data=ProjectTemplate::all();
      return [
       "data"=> $data
    ];
    }
}
