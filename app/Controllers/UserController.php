<?php
namespace App\Controllers;


use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UserController extends BaseController
{
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
            return redirect()->back()->withInput();
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
 


}
