
<?php
defined('BASEPATH') or exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;

class User extends REST_Controller
{

    public function __construct()
    {
        header("Access-Control-Allow-Origin: http://localhost:5173/");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        parent::__construct();
        $this->load->library('Authorization_Token');
        $this->load->model('admin/User_model', 'User_model');
    }

    public function register_post()
    {
        $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required');

        if ($this->form_validation->run() === false) {
            $this->response(['Validation errors' => $this->form_validation->error_array()], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $email = $this->input->post('email');
            $data = array(
                'username' => $this->input->post('firstname') . ' ' . $this->input->post('lastname'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $email,
                'mobile_no' => $this->input->post('mobile_no'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'is_admin' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $result = $this->User_model->add_user($data);

            if ($result) {
                $token_data['uid'] = $result;
                $token_data['email'] = $email;
                $tokenData = $this->authorization_token->generateToken($token_data);
                $response = array(
                    'access_token' => $tokenData,
                    'status' => true,
                    'uid' => $result,
                    'message' => 'Thank you for registering your new account!',
                    'note' => 'You have successfully registered. Please check your email inbox to confirm your email address.'
                );
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $this->response(['There was a problem creating your new account. Please try again.'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function login_post()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === false) {
            $this->response(['Validation errors' => $this->form_validation->error_array()], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($this->User_model->resolve_user_login($email, $password)) {
                $user_id = $this->User_model->get_user_id_from_username($email);
                $user = $this->User_model->get_user($user_id);

                $_SESSION['user_id'] = (int)$user->id;
                $_SESSION['username'] = (string)$user->username;
                // $_SESSION['is_premium'] = (string)$user->is_premium;
                $_SESSION['email'] = (string)$user->email;
                $_SESSION['logged_in'] = (bool)true;
                $_SESSION['is_admin'] = (bool)$user->is_admin;

                $token_data['uid'] = $user_id;
                $token_data['username'] = $user->username;
                $token_data['email'] = $user->email;
                $tokenData = $this->authorization_token->generateToken($token_data);

                $response = array(
                    'user_id' => $user_id,
                    'username' => $user->username,
                    // 'is_premium'=>$user->is_premium,
                    'access_token' => $tokenData,
                    'status' => true,
                    'message' => 'Login success!',
                    'note' => 'You are now logged in.'
                );
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $this->response(['Wrong username or password.'], REST_Controller::HTTP_UNAUTHORIZED);
            }
        }
    }

    public function logout_post()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            $this->response(['Logout success!'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['There was a problem. Please try again.'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update_profile_post()
    {
        $this->form_validation->set_rules('user_id', 'User ID', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile_no', 'Phone Number', 'trim|numeric');

        if ($this->form_validation->run() === false) {
            $this->response(['Validation errors' => $this->form_validation->error_array()], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_id = $this->input->post('user_id');
            $email = $this->input->post('email');
            $mobile_no = $this->input->post('mobile_no');
            $user = $this->User_model->get_user($user_id);

            if ($user) {
                $updated_data = array();

                if ($email !== $user->email) {
                    $updated_data['email'] = $email;
                }

                if ($mobile_no !== $user->mobile_no) {
                    $updated_data['mobile_no'] = $mobile_no;
                }



                if (!empty($updated_data)) {
                    $result = $this->User_model->update_user($user_id, $updated_data);

                    if ($result) {
                        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user_id) {
                            $_SESSION['email'] = $email;
                            $_SESSION['mobile_no'] = $mobile_no;
                        }
                        $this->response(['User profile updated successfully!'], REST_Controller::HTTP_OK);
                    } else {
                        $this->response(['There was a problem. Please try again.'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }
                } else {
                    $this->response(['Nothing to update. Please change your email, phone number, or password.'], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(['User not found.'], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    

}
