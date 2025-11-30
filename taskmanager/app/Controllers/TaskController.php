<?php

namespace App\Controllers;
use App\Models\TaskModel;

class TaskController extends BaseController
{
    public function index()
    {
        if (!session()->get('user_logged_in')) {
            return redirect()->to('/admin/login')->with('error', 'Please log in.');
        }

        $model = new TaskModel();
        $data['tasks'] = $model->findAll();
        return view('tasks/index', $data);
    }

    public function create()
    {
        if (!session()->get('user_logged_in')) {
            return redirect()->to('/admin/login')->with('error', 'Please log in.');
        }

        return view('tasks/create');
    }

    public function store()
    {
        if (!session()->get('user_logged_in')) {
            return redirect()->to('/admin/login')->with('error', 'Please log in.');
        }

        $model = new TaskModel();
        $model->save($this->request->getPost());
        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        if (!session()->get('user_logged_in')) {
            return redirect()->to('/admin/login')->with('error', 'Please log in.');
        }

        $model = new TaskModel();
        $task = $model->find($id);
        if (!$task) {
            return redirect()->to('/tasks');
        }

        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        if (!session()->get('user_logged_in')) {
            return redirect()->to('/admin/login')->with('error', 'Please log in.');
        }

        $model = new TaskModel();
        $updatedData = $this->request->getPost();
        $model->update($id, $updatedData);
        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        if (!session()->get('user_logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to('/tasks')->with('error', 'Only admins can delete tasks.');
        }

        $model = new TaskModel();
        $task = $model->find($id);
        if ($task) {
            $model->delete($id);
        }
        return redirect()->to('/tasks');
    }
}
