<?php


namespace App\Http\Controllers;


use App\Models\PageForm;
use App\Models\VueForm;

class PageFormAPIController
{
    /**
     * Get Form from Specific Path / Current Path
     * @return \Illuminate\Http\JsonResponse
     */
    public function getForm() {
        $path = request()->get('path');

        // only for dev-mode
        // i mean i use Vertrigo to create localhost, and I'm too lazy to create a new VirtualHost configuration
        // therefore I have to access like: http://localhost/vue-form/public =))
        if (!empty($path) && stristr($path, 'public/')) {
            $path = explode("public", $path)[1];
        }

        $currentPathForm = PageForm::getFormOfCurrentPath($path);
        if ($currentPathForm == null) {
            return response()->json(['error' => 'This page does not have any mapped form.']);
        }

        // get form and return data
        $form = VueForm::find($currentPathForm->form_id);

        // return data
        $result = [
            'Title' => $form->Title,
            'Version' => $form->Version,
            'Data' => $form->latest_child()->Data
        ];

        return response()->json($result);
    }
}
