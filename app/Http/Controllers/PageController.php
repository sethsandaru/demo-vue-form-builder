<?php


namespace App\Http\Controllers;


use App\Models\VueForm;
use Illuminate\Support\Facades\Input;

class PageController
{
    public function index() {
        return view('pages.index');
    }

    public function showForm() {
        return view('pages.generic-form');
    }

    public function indexFormConfiguration() {
        $allForms = VueForm::all();
        return view('pages.form-configuration', compact('allForms'));
    }

    public function detailFormConfiguration($id) {
        $formDetail = null;

        if ($id != 0) {
            $formDetail = VueForm::find($id);
            if (empty($formDetail)) {
                return redirect()->to('/form-config');
            }
        }

        return view('pages.form-configuration-detail', compact('formDetail'));
    }

    public function showPostData() {
        dd(Input::all());
    }
}
