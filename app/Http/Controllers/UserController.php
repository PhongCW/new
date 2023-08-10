<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\User;
use App\Models\StaffModel;
use App\Models\Staff;

class UserController extends Controller
{
    function login(Request $request){
        $data = $request->input("userid");
        $User = new User;
        $UserID = $data['userid'];
        $Password = $data['password'];

        $UserIDModel = $User::where("user_name", $UserID)->first();
        $UserPassword = $User::where("password", $Password)->first();

        if ($UserID == null && $Password == null){
            return "UserID and Password are required";
        }
        if ($UserID == null && $Password != null){
            return "UserID is required";
        }
        if ($UserID != null && $Password == null){
            return "Password is required";
        }
        if ($UserID != $UserIDModel && $Password != $UserPassword){
            return "UserID is not available";
        }
        if ($UserID != $UserIDModel && $Password == $UserPassword){
            return "UserID doesn't exist";
        }
        if ($UserID == $UserIDModel && $Password != $UserPassword){
            return "Password is incorrect";
        }
        if ($UserID == $UserIDModel && $Password == $UserPassword){
            if ($UserIDModel['role'] == 0){
                if ($UserIDModel['del_flg'] == 1){
                    return "Admin exists but deleted";
                }
            }
        }
        if ($UserID == $UserIDModel && $Password == $UserPassword){
            if ($UserIDModel['role'] == 0){
                if ($UserIDModel['del_flg'] == 0){
                    return "Admin exist and active";
                }
            }
        }
        if ($UserID == $UserIDModel && $Password == $UserPassword){
            if ($UserIDModel['role'] == 1){
                if ($UserIDModel['del_flg'] == 0){
                    return "User exist and active";
                }
            }
        }
        if ($UserID == $UserIDModel && $Password == $UserPassword){
            if ($UserIDModel['role'] == 1){
                if($UserIDModel['del_flg'] == 1){
                    return "User exist but delete";
                }
            }
        }
    }
    function ShowStaffListScreen(Request $request){
        $UserModel = new UserModel;
        $UserModel = $UserModel::all();
        return $UserModel;
    }
    function DeleteStaff(Request $request){
        $data = $request;
        $id = $data['id'];
        $StaffModel = new StaffModel;
        $StaffModel = $StaffModel::where("id", $id)->first();
        $StaffModel['del_flag'] = 1;
        $StaffModel['updated_user'] = "login_user";
        $StaffModel -> save();
        $StaffModel -> delete();
    }

    function StaffCreate(Request $request){
        $data = $request;
    }

    function Staff_Detail_Edit(Request $request){
        $data = $request;
        $id = $request['id'];
        $last_name = $data['last_name'];
        $first_name = $data['first_name'];
        $last_name_furigana = $data['last_name_furigana'];
        $first_name_furigana = $data['first_name_furigana'];

        $StaffModel = new Staff;
        $Staff_last_name = $StaffModel['last_name'];
        $Staff_first_name = $StaffModel['first_name'];
        $Staff_last_name_furigana = $StaffModel['last_name_furigana'];
        $Staff_first_name_furigana = $StaffModel['first_name_furigana'];
        $staff_type = $StaffModel['staff_type'];
        $Staff_del_flg = $StaffModel['del_flg'];
        $Staff_updated_user = $StaffModel['updated_user'];
        $Staff_updated_datetime = $StaffModel['updated_datetime'];

        if (strlen($last_name) > 6){
            return "Invalid Lastname";
        }
        if (strlen($first_name) > 6){
            return "Invalid Firstname";
        }

    }
}
