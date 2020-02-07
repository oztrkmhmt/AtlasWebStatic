<?php
class Users extends Controller {
    private $sessionUser;
    
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->sessionUser = new SessionUsers;
    }
    //Login to Atlas Web Service
    public function login() {
        if(isLoggedIn()){
            redirect('users/main');     
        }else{
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Initialize data
            $data = ['username' => trim($_POST['username']), 'password' => trim($_POST['password']), 'username_err' => '', 'password_err' => '', ];
            $_SESSION['name'] = $data['username'];
            $_SESSION['pass'] = $data['password'];
            //Check username and password
            if (empty($data['username'])) {
                $data['username_err'] = "Kullanıcı adı boş bırakılamaz !";
            }
            if (empty($data['password'])) {
                $data['password_err'] = "Kullanıcı parola boş bırakılamaz !";
            }
            // Check errors and load view
            if (empty($data['username_err']) && empty($data['password_err'])) {
                if ($this->userModel->GetUserHashCode($data)) {
                } elseif (isset($_SESSION['userDetail']['errorMessage'])) {
                    flash('hata_yakalandi', $_SESSION['userDetail']['errorMessage']);
                    $this->view('users/login', $data);
                } else {
                    $_SESSION['AWSession'] = $this->sessionUser;
                    $this->userModel->UserProducts($data);
                    $this->userModel->GetPolicyScreen($data);
                    $this->view('users/main', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);

            }
        } else {
            // Initialize data
            $data = ['username' => '', 'password' => '', 'username_err' => '', 'password_err' => '', ];
            // Load view
            $this->view('users/login', $data);
            }
        }
    }
    //Login details
    public function logindetails() {
        if(!isLoggedIn()){
            redirect('users/login');
        }else{
        $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass'], ];
        //load login details model
        $this->userModel->GetLoginDetails($data);
        $this->view('users/logindetails', $data);
        }
    }


    //Session logout
    public function logout() {
        unset($_SESSION['AWSession']);
        session_destroy();
        redirect('users/login');
    }
    
    //Atlas Web Service Main
    public function main() {
        if(!isLoggedIn()){
            redirect('users/login');
        }else{
        $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass']];
        if(isset($_POST['kimlikno'])){
            $data2 = ['username' => $_SESSION['name'],'kimlikno' => trim($_POST['kimlikno'])];    
            $this->userModel->GetCustomerDetails($data2);  
        }  
        $this->userModel->GetLoginDetails($data);
        $this->userModel->GetPolicyScreen($data);
        $this->view('users/main', $data);
            
        }
    }
  
    public function getProductDetailAbonman() {
        if(!isLoggedIn()){
            redirect('users/login');     
        }else{
            // Get Product Details Abonman
            $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass']];
            $this->userModel->GetProductDetailsAbonman($data);
            $this->view('users/productdetailsAbonman', $data);
        }
    }
    public function getProductDetailKati() {
        if(!isLoggedIn()){
            redirect('users/login');     
        }else{
            // Get Product Details Kati
            $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass']];
            $this->userModel->GetProductDetailsKati($data);
            $this->view('users/productdetailKati', $data);
        }
    }
    public function getProductDetailKaskomAtlas() {
        if(!isLoggedIn()){
            redirect('users/login');     
        }else{
            // Get Product Details Kati
            $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass']];
            $this->userModel->GetProductDetailsKaskomAtlas($data);
            $this->view('users/productdetailKaskomAtlas', $data);
        }
    }

    public function getShipNames() {
        if(!isLoggedIn()){
            redirect('users/login');     
        }else{
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Get Product Details Kati
            $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass']];
            $this->userModel->GetAtlasShips($data);
            $this->view('users/main', $data);
            }
        }
    }
}