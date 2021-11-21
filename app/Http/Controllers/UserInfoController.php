<?php

namespace App\Http\Controllers;

use App\DataTables\UserInformationDataTable;
use App\Models\UserInformation;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    /**
     * @param UserInformationDataTable $dataTable
     * @return mixed
     */
    public function getAllUserData(UserInformationDataTable $dataTable){
        return $dataTable->render("backend.pages.user-info");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request ){
        $this->validate($request, [
            'name'   => 'required',
            'links'  => 'required',
            'skills' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email|unique:user_information',
            'age_range' => 'required',
            'current_institution' => 'required',
            'location'  => 'required'
        ]);

        $userInfo = new UserInformation();
        $userInfo->name = $request->input('name');
        $userInfo->links = $request->input('links');
        $userInfo->skills = $request->input('skills');
        $userInfo->contact_number = $request->input('contact_number');
        $userInfo->email = $request->input('email');
        $userInfo->age_range = $request->input('age_range');
        $userInfo->current_institution = $request->input('current_institution');
        $userInfo->location = $request->input('location');
        $userInfo->ip_address = $request->ip();
        $userInfo->save();
        return redirect('/')->with('success','User Information stored successfully.');
    }

    /**
     * @param $id
     */
    public function deleteUserInfo($id){
        UserInformation::where('id',$id)->delete();
        session()->flash('flash_success', 'User Information deleted successfully');
    }


}
