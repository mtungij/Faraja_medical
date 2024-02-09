<?php
namespace App\Controllers;


use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UserController extends BaseController
{

    protected $helpers = ['form'];
    public function index()
    {
        return view("user/create");
    }

    public function create()
    {
        if (
            !$this->validate([
                'name' => 'required',
                'username' => 'required',
                'phone'=> 'required',
                'department'=>'required',
                'gender'=> 'required',
                'password' => 'required',
                'conf' => 'required|matches[password]'
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', 'Please fill all the fields correctly.');
        }

        $user_input = $this->validator->getValidated();

        $userExist=model(UserModel::class)->where(['username' => $user_input ['username']] )->first();

        // dd($userExist);
        

        if ($userExist) {
            return redirect()->back()->withInput()->with('errors', 'Username is already taken. Please choose a different one.');
        }

        else {
            $user_input['password'] = password_hash($user_input['password'], PASSWORD_BCRYPT, ['cost'=>12]);

            unset($user_input['conf']);
    
           
            model(UserModel::class)->insert($user_input);
    
            return redirect()->back()->with('success' ,'Staff Registered Successfully ');

        }


        //copilot are you there

       
    }

    public function all_staffs ()
    {
       $users=model(UserModel::class);
       $user=$users->findAll();
       

       return view('user/all_staff',['user'=> $user]);

    }

    public function update_user($id)
    {
        $user=model(UserModel::class)->find($id);

        // dd($user);

        return view('user/update_user',['user'=> $user]);

    }

    public function update_staff()
    {
       $id = $this->request->getPost('id');

        $name = $this->request->getPost('name');
        $username = $this->request->getPost('username');
        $phone = $this->request->getPost('phone');
        $department = $this->request->getPost('department');
        $gender = $this->request->getPost('gender');
        
        $data = [
            'name' => $name,
            'username' => $username,
            'phone' => $phone,
            'department' => $department,
            'gender'=> $gender,
        ];

        $model = model(UserModel::class);

        $result = $model->update($id, $data);

        if($result) {
            return redirect('staffs')->with('success','staff updated Successfully');
        } else {
            return redirect()->back()->with('errors','an error occurred');
        }

    }


    public function getDepartments()
    {
        $userModel = new UserModel();

        $departments = $userModel->distinct()->select('department')->findAll();

        return json_encode($departments);
    }

    public function getUsersByDepartment($department)
    {
        $userModel = new UserModel();

        $users = $userModel->where('department', $department)->findAll();

        return json_encode($users);
    }
 

    public function myprofile() {
        $user = model(UserModel::class)->find(session('user_id'));

        
        return view('myprofile', [
            'user' => $user,
        ]);

        
    }


    public function reset_password()
    {
        $oldPassword = $this->request->getPost('password');
        $newPassword = $this->request->getPost('new_password');
        $newPasswordConfirm = $this->request->getPost('new_password_confirm');

        $user = model(UserModel::class)->find(session('user_id'));

        if($newPassword != $newPasswordConfirm) {
            return redirect()->back()->with('errors' ,'Password does not match');
        }

        if(!password_verify($oldPassword, $user->password)) {
            return redirect()->back()->with('errors', 'Incorrect old password.');
        } else {
            model(UserModel::class)->update($user->id, ['password' => password_hash($newPassword, PASSWORD_BCRYPT, ['cost' => 12])]);
            return redirect()->back()->with('success', 'Password changed successfully.');
        }


    }


    public function change_profile()
    {
      $user =session()->get('user_id');
     
      
        return view('user/profile_pc' ,['user' => $user]);

    }

    public function update_profile()
    {
        $file = $this->request->getFile('img');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();

            
            $file->move('public/img', $newName);
            $user = model(UserModel::class)->find(session('user_id'));
            model(UserModel::class)->update($user->id, ['img' => $newName]);
            return redirect()->back()->with('success', 'Profile picture updated successfully.');
        } else {
            return redirect()->back()->with('errors', 'An error occurred while uploading the file.');
        }
   
}

// public function block_user($id)
// {
//     $user = model(UserModel::class)->find($id);
//     if($user->status == 'active') {
//         model(UserModel::class)->update($id, ['status' => 'blocked']);
//         return redirect()->back()->with('success', 'User blocked successfully.');
//     } else {
//         model(UserModel::class)->update($id, ['status' => 'active']);
//         return redirect()->back()->with('success', 'User unblocked successfully.');
//     }

// }
} 

