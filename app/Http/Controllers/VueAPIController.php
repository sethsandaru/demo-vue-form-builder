<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 10/9/2018
 * Time: 9:11 PM
 */

namespace App\Http\Controllers;


use App\Models\VueForm;
use Illuminate\Http\Request;

class VueAPIController extends Controller
{
    public function getDataSourceForm() {
        $allForms = VueForm::all();
        $result = [];
        foreach ($allForms as $form) {
            $result[] = [
                'id' => $form->ID,
                'text' => $form->Title,
                'version' => $form->Version
            ];
        }

        return response()->json($result);
    }

    public function getForm($id) {
        $form = VueForm::find($id);
        if ($form == null) {
            return response()->json(['error' => 'This form doesnt existed']);
        }

        // return data
        $result = [
            'Title' => $form->Title,
            'Version' => $form->Version,
            'Data' => $form->latest_child()->Data
        ];

        return response()->json($result);
    }

    public function insert(Request $rq) {
        if (config('sandaru.disable_populate')) {
            return response()->json(['error' => 'Add function is disabled on this site']);
        }

        $title = $rq->post("title");
        $data = $rq->post("formData");

        if (empty($title) || empty($data)) {
            return response()->json(['error' => 'Title is blank or Form doesnt have any config yet!']);
        }

        // insert new form
        $form_id = VueForm::insert_data($title, $data);

        // after inserted, you can get form_id to use and save it any where that you need to use

        return response()->json(['success' => 'Insert success']);
    }

    public function update($id, Request $rq) {
        if (config('sandaru.disable_populate')) {
            return response()->json(['error' => 'Update function is disabled on this site']);
        }

        $title = $rq->post("title");
        $data = $rq->post("formData");

        if (empty($title) || empty($data)) {
            return response()->json(['error' => 'Title is blank or Form doesnt have any config yet!']);
        }

        // update old form
        $form_id = VueForm::update_data($id, $title, $data);
        if ($form_id === false) {
            return response()->json(['error' => 'Update failed, form not existed to update']);
        }

        // after updated, you can get form_id to use and save it any where that you need to use
        return response()->json(['success' => 'Update success']);
    }
}