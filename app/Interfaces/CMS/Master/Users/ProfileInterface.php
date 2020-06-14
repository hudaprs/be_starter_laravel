<?php

namespace App\Interfaces\CMS\Master\Users;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;

interface ProfileInterface
{
    /**
     * Update user profile
     * 
     * @method POST cms/master/users/{id}/profile
     * @access private
     * 
     * @param App\Http\Requests\ProfileRequest $request
     * @param int $id
     */
    public function updateUserProfile(ProfileRequest $request, $id);

    /**
     * Update user password
     * 
     * @method POST cms/master/users/{id}/profile/change-password
     * @access private
     * 
     * @param App\Http\Requests\PasswordRequest $request
     * @param int $id
     */
    public function updateUserPassword(PasswordRequest $request, $id);
}