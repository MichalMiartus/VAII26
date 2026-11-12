<?php

namespace App\Controllers;

use App\Models\Project;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use Framework\Http\HttpException;

class ProjectController extends BaseController
{
    public function index(Request $request): Response
    {
        $projects = Project::getAll();

        return $this->html([
            'projects' => $projects
        ]);
    }

    public function add(Request $request): Response
    {
        return $this->html([
            'project' => new Project()
        ], 'form');
    }

    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $name = trim((string) $request->post('name'));
        $description = trim((string) $request->post('description'));
        $type = (string) $request->post('type');

        if ($name === '' || mb_strlen($name) > 150) {
            throw new HttpException(400);
        }

        if (!in_array($type, ['personal', 'team'], true)) {
            throw new HttpException(400);
        }

        $id = (int) $request->post('id');

        if ($id > 0) {
            $project = Project::getOne($id);

            if ($project === null) {
                throw new HttpException(404);
            }
        } else {
            $project = new Project();
            $project->setCreatedAt(date('Y-m-d H:i:s'));
        }

        $project->setName($name);
        $project->setDescription($description === '' ? null : $description);
        $project->setType($type);

        $project->save();

        return $this->redirect($this->url('project.index'));
    }

    public function edit(Request $request): Response
    {
        $id = (int) $request->get('id');

        $project = Project::getOne($id);

        if ($project === null) {
            throw new HttpException(404);
        }

        return $this->html([
            'project' => $project
        ], 'form');
    }

    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $id = (int) $request->post('id');
        $project = Project::getOne($id);

        if ($project === null) {
            throw new HttpException(404);
        }

        $project->delete();

        return $this->redirect($this->url('project.index'));
    }

    public function show(Request $request): Response
    {
        $id = (int) $request->get('id');

        $project = Project::getOne($id);

        if ($project === null) {
            throw new HttpException(404);
        }

        return $this->html([
            'project' => $project,
            'tasks' => $project->getTasks()
        ]);
    }

}
