<?php

namespace App\Controllers;

use App\Models\Task;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use Framework\Http\HttpException;

class TaskController extends BaseController
{
    public function index(Request $request): Response
    {
        $tasks = Task::getAll();

        return $this->html([
            'tasks' => $tasks
        ]);
    }

    public function add(Request $request): Response
    {
        return $this->html([
            'task' => new Task(),
            'errors' => []
        ], 'form');
    }


    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $title = trim((string) $request->post('title'));

        if ($title === '' || mb_strlen($title) > 255) {
            throw new HttpException(400);
        }

        $status = (string) $request->post('status');
        $priority = (string) $request->post('priority');

        if (!in_array($status, ['todo', 'in_progress', 'done'], true)
            || !in_array($priority, ['low', 'medium', 'high'], true)) {
            throw new HttpException(400);
        }

        $id = (int) $request->post('id');

        if ($id > 0) {
            $task = Task::getOne($id);

            if ($task === null) {
                throw new HttpException(404);
            }
        } else {
            $task = new Task();
        }

        $task->setTitle($title);
        $task->setDescription($request->post('description') ?: null);
        $task->setStatus($status);
        $task->setPriority($priority);
        $task->setDueDate($request->post('due_date') ?: null);

        $task->save();

        return $this->redirect($this->url('task.index'));
    }

    public function edit(Request $request): Response
    {
        $id = (int) $request->get('id');

        $task = Task::getOne($id);

        if ($task === null) {
            throw new HttpException(404);
        }

        return $this->html([
            'task' => $task,
            'errors' => []
        ], 'form');
    }

    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $id = (int) $request->post('id');
        $task = Task::getOne($id);

        if ($task === null) {
            throw new HttpException(404);
        }

        $task->delete();

        return $this->redirect($this->url('task.index'));
    }
}