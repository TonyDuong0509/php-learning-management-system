<?php

namespace App\Controllers\User;

use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\CourseService;
use App\Services\SubCategoryService;
use App\Services\UserService;
use App\Services\WishListService;

class UserController
{
    private $userService;
    private $cartService;
    private $wishlistService;
    private $categoryService;
    private $subCategoryService;
    private $courseService;

    public function __construct(
        UserService $userService,
        CartService $cartService,
        WishListService $wishlistService,
        CategoryService $categoryService,
        SubCategoryService $subCategoryService,
        CourseService $courseService,
    ) {
        $this->userService = $userService;
        $this->cartService = $cartService;
        $this->wishlistService = $wishlistService;
        $this->categoryService = $categoryService;
        $this->subCategoryService = $subCategoryService;
        $this->courseService = $courseService;
    }

    public function registerForm()
    {
        require ABSPATH . 'resources/user/auth/registerForm.php';
    }

    public function loginForm()
    {
        require ABSPATH . 'resources/user/auth/loginForm.php';
    }

    private function getHeaderProfile()
    {
        $email = $_SESSION['user']['email'] ?? '';
        return $this->userService->getByEmail($email);
    }

    public function register()
    {
        $data = [];
        $data['name'] = $_POST['name'] ?? '';
        $data['username'] = $_POST['username'] ?? '';
        $data['email'] = $_POST['email'] ?? '';
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data['created_at'] = date('Y-m-d');
        $data['role'] = 'user';
        $data['status'] = 0;

        if ($this->userService->checkEmailToRegister($_POST['email'])) {
            $_SESSION['notification'] = [
                'message' => 'Email is exist, please try another email',
                'alert-type' => 'error',
            ];

            header("Location: /login");
            exit;
        }

        $this->userService->saveUser($data);
        $_SESSION['notification'] = [
            'message' => 'Register successfully, please login',
            'alert-type' => 'success',
        ];

        header("Location: /login");
        exit;
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userService->getByEmail($email);

        if (!$user) {
            $_SESSION['notification'] = [
                'message' => 'User not exist, please try again',
                'alert-type' => 'error',
            ];

            header("Location: /login");
            exit;
        }

        if (!password_verify($password, $user->getPassword())) {
            $_SESSION['notification'] = [
                'message' => 'Wrong password, please try again',
                'alert-type' => 'error',
            ];

            header("Location: /login");
            exit;
        }

        if ($user->getRole() !== 'user') {
            $_SESSION['notification'] = [
                'message' => 'This account is not authorized, please input correct account',
                'alert-type' => 'error',
            ];

            header("Location: /login");
            exit;
        }

        $_SESSION['user'] = [
            'email' => $email,
            'name' => $user->getName(),
            'role' => $user->getRole(),
        ];

        if (isset($_SESSION['redirect_after_login'])) {
            $redirectUrl = $_SESSION['redirect_after_login'];
            unset($_SESSION['redirect_after_login']);
        } else {
            $redirectUrl = '/';
        }

        $_SESSION['notification'] = [
            'message' => 'Sign in successfully',
            'alert-type' => 'success',
        ];

        header("Location: " . $redirectUrl);
        exit;
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location: /");
        exit;
    }

    public function dashboard()
    {
        $user = $this->getHeaderProfile();
        $cartTotal = $this->cartService->total();
        $carts = $this->cartService->getAll();
        $wishlists = $this->wishlistService->getWishListsCoursesSameUserId($user->getId());

        require ABSPATH . 'resources/user/dashboard/index.php';
    }

    public function profile($id)
    {
        $user = $this->getHeaderProfile();

        require ABSPATH . 'resources/user/dashboard/profile/profile.php';
    }

    public function changeProfile()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $old_image = $_POST['old_image'];
        $photo = $this->userService->handleImage('user_image', 'photo', 'user', $id, $old_image);

        $user = $this->userService->getById($id);
        $user->setName($name);
        $user->setUsername($username);
        $user->setPhoto($photo);

        $this->userService->updateUser($user);

        $_SESSION['notification'] = [
            'message' => 'Change Profile successfully',
            'alert-type' => 'success',
        ];

        header("Location: /user/profile/$id");
        exit;
    }

    public function changePassword()
    {
        $id = $_POST['id'];
        $user = $this->userService->getById($id);
        $old_password = $_POST['old_password'];
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        if (password_verify($old_password, $user->getPassword())) {
            $user->setPassword($new_password);
            $this->userService->updateUser($user);
            $_SESSION['notification'] = [
                'message' => 'Change Password successfully',
                'alert-type' => 'success',
            ];

            header("Location: /user/profile/$id");
            exit;
        } else {
            $_SESSION['notification'] = [
                'message' => 'Old password is not valid, please try again',
                'alert-type' => 'error',
            ];

            header("Location: /user/profile/$id");
            exit;
        }
    }

    public function deleteUserAccountBySelf($id)
    {
        $this->userService->deleteUser($id);
        unset($_SESSION['user']);
        $_SESSION['notification'] = [
            'message' => 'Deleted Account successfully',
            'alert-type' => 'success',
        ];

        header("Location: /");
        exit;
    }

    public function allCourse()
    {
        $courses = $this->courseService->getAllCourses();
        $categories = $this->categoryService->getAllCategories();

        $subCategories = [];
        for ($i = 0; $i < count($categories); $i++) {
            $category_id = $categories[$i]->getId();
            $subCategories[$category_id] = $this->subCategoryService->getByCategoryId($category_id);
        }

        require ABSPATH . 'resources/user/details/allCourse.php';
    }
}
