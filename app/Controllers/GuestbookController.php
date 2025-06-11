<?php

namespace App\Controllers;

use App\Models\GuestbookModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class GuestbookController extends BaseController {

    // controller for getting every guestbook entries and rendering associated views with data fetched
    public function index() {
        $model = model(GuestbookModel::class);
        $data = [
            'records_list' => $model->getRecords(),
        ];
        return view('templates/header', $data)
            . view('guestbook/index')
            . view('templates/footer');
    }

    // render form for users to create a new entry
    public function new() {
        // load form helper
        helper('form');
        return view('templates/header', ['title' => 'Create a new guestbook entry'])
            . view('guestbook/create')
            . view('templates/footer');
    }

    // handle post req for new entry
    public function create() {
        helper('form');
        $data = $this->request->getPost(['guestName', 'content']);
        // validation
        if (! $this->validateData($data, [
            'guestName' => 'required|max_length[20]|min_length[1]',
            'content'  => 'required|max_length[100]|min_length[2]',
        ])) {
            // returns the form if validation fails
            return $this->new();
        }
        $post = $this->validator->getValidated();
        $model = model(GuestbookModel::class);
        $model->save([
            'guestName' => $post['guestName'],
            'content'  => $post['content'],
        ]);
        return view('templates/header', ['title' => 'Create a new guestbook entry'])
            . view('guestbook/success')
            . view('templates/footer');
    }

    // render a form for users to edit an entry
    public function view(int $id) { 
        helper('form');
        $model = model(GuestbookModel::class);
        $data['entryData'] = $model->find($id);
        return view('templates/header', $data)
            . view('guestbook/view')
            . view('templates/footer');
    }

    // handle edit/update req on guestbook entries
    public function edit() {
        helper('form');
        $model = model(GuestbookModel::class);
        $id = $this->request->getPost('id');
        $targetEntry = $model->find($id);
        if (!$targetEntry) {
            throw new PageNotFoundException('Cannot find the requested guestbook entry.');
        }
        $data = $this->request->getPost(['guestName', 'content']);
        // validation
        if (! $this->validateData($data, [
            'guestName' => 'required|max_length[20]|min_length[1]',
            'content'  => 'required|max_length[100]|min_length[2]',
        ])) {
            // returns the form if validation fails
            return $this->new();
        }
        $post = $this->validator->getValidated();
        $model->update($id, [
            'guestName' => $post['guestName'],
            'content'  => $post['content'],
        ]);
        return view('templates/header', ['title' => 'Edit a guestbook entry.'])
        . view('guestbook/editsuccess')
        . view('templates/footer');
    }

    // delete an entry
    public function delete(int $id) {
        helper('form');
        $model = model(GuestbookModel::class);
        $targetEntry = $model->find($id);
        if (!$targetEntry) {
            throw new PageNotFoundException('Cannot find the requested guestbook entry.');
        }
        $model->delete($id);
        return view('templates/header', ['title' => 'Delete a guestbook entry.'])
        . view('guestbook/deletesuccess')
        . view('templates/footer');
    }

}