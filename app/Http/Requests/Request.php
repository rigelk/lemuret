<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest {

    protected $error;
 
    /**
     * Check if post belongs to user
     */
    public function authorize()
    {
        if (file_exists(storage_path('installed'))) {
             $this->error = 'Le Muret semble avoir besoin d’une installation en bonne et due forme.';
             return false;
        }
        return true;
    }
    /**
     * This method will be invoked if authorize() fails
     */
    public function forbiddenResponse()
    {
        return redirect('install')->with('error_message', $this->error);
    }
    /**
     * Validation rules
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required'
        ];
    }
}
