<?php

namespace App\Http\Controllers\CMS\Master\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Interfaces\CMS\Master\Users\UserInterface;
use App\Interfaces\CMS\Master\Users\ProfileInterface;

class ProfileController extends Controller
{
    protected $userInterface, $profileInterface;

    public function __construct(UserInterface $userInterface, ProfileInterface $profileInterface)
    {
        $this->userInterface = $userInterface;
        $this->profileInterface = $profileInterface;
    }
    
    public function index($id)
    {
        $user = $this->userInterface->getUserById($id);
        
        // Check for the correct user
        if($user->id !== auth()->user()->id) return abort(403);
        else return view('cms.master.users.profiles.index', compact('user'));
    }

    public function updateUserProfile(ProfileRequest $request, $id)
    {
        $user = $this->userInterface->getUserById($id);
        
        // Check for the correct user
        if($user->id !== auth()->user()->id) return abort(403);
        else return $this->profileInterface->updateUserProfile($request, $id);
    }

    public function editPassword($id)
    {
        $user = $this->userInterface->getUserById($id);
        
        // Check for the correct user
        if($user->id !== auth()->user()->id) return abort(403);
        else return view('cms.master.users.profiles.password.index', compact('user'));
    }

    public function updatePassword(PasswordRequest $request, $id)
    {
        $user = $this->userInterface->getUserById($id);

        // Check for the correct user
        if($user->id !== auth()->user()->id) return abort(403);
        else return $this->profileInterface->updateUserPassword($request, $id);
    }
}
