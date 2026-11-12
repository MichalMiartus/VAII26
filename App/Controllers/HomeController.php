<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use App\Models\Task;
use App\Models\Project;

/**
 * Class HomeController
 * Handles actions related to the home page and other public actions.
 *
 * This controller includes actions that are accessible to all users, including a default landing page and a contact
 * page. It provides a mechanism for authorizing actions based on user permissions.
 *
 * @package App\Controllers
 */
class HomeController extends BaseController
{
    /**
     * Authorizes controller actions based on the specified action name.
     *
     * In this implementation, all actions are authorized unconditionally.
     *
     * @param string $action The action name to authorize.
     * @return bool Returns true, allowing all actions.
     */
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    /**
     * Displays the default home page.
     *
     * This action serves the main HTML view of the home page.
     *
     * @return Response The response object containing the rendered HTML for the home page.
     */


    public function index(Request $request): Response
    {
        $projects = Project::getAll();
        $completedProjects = 0;

        foreach ($projects as $project) {
            $tasks = $project->getTasks();

            if (empty($tasks)) {
                continue;
            }

            $completedTasks = array_filter(
                $tasks,
                fn($task) => $task->getStatus() === 'done'
            );

            if (count($completedTasks) === count($tasks)) {
                $completedProjects++;
            }
        }

        return $this->html([
            'activeTasks' => Task::getCount(
                'status != ?', ['done']
            ),
            'inProgressTasks' => Task::getCount(
                'status = ?', ['in_progress']
            ),
            'completedTasks' => Task::getCount(
                'status = ?', ['done']
            ),
            'completedProjects' => $completedProjects,
            'projects' => $projects
        ]);
    }



    /**
     * Displays the contact page.
     *
     * This action serves the HTML view for the contact page, which is accessible to all users without any
     * authorization.
     *
     * @return Response The response object containing the rendered HTML for the contact page.
     */
    public function contact(Request $request): Response
    {
        return $this->html();
    }
}
