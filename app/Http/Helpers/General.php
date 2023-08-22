<?php

use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Role;
use Repository\AdminCompanyRepositories\AdminCompanyRepository;
use Domain\AdminCompany;




function getIdLastRoleSystem()
{

    $roleID = Role::where('name', "ClientUser")->first();

    return $roleID->id;
}

function get_default_lang()
{
    return   Config::get('app.locale');
}


function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}


function uploadVideo($folder, $video)
{
    $video->store('/', $folder);
    $filename = $video->hashName();
    $path = 'video/' . $folder . '/' . $filename;
    return $path;
}

function getAdminy( AdminCompanyRepository $adminCompanyRepository){

    return $adminCompanyRepository;
 }

if (!function_exists('getAdminCompany')) {
function getAdminCompany(){
  //  $getAdminCompany = $adminCompanyRepository->findWhere(['id_user' => auth('system_users')->user()->id])->pluck(['id_company'])->toArray();
  //  return $getAdminCompany;
 }
}




if (!function_exists('isHasAdminCompany')) {
function isHasAdminCompany($id){
    $getAdminCompany = getAdminCompany();
    dd("S");
   // return in_array(  $id  , $getAdminCompany  ) ? true : false;

 }
}
