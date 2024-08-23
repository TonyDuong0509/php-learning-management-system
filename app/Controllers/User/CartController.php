<?php

namespace App\Controllers\User;

use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\CouponService;
use App\Services\CourseService;
use App\Services\EmailService;
use App\Services\OrdersService;
use App\Services\PaymentsService;
use App\Services\SubCategoryService;
use App\Services\UserService;

class CartController
{
    private $courseService;
    private $cartService;
    private $categoryService;
    private $subCategoryService;
    private $couponService;
    private $userService;
    private $paymentService;
    private $orderService;
    private $emailService;

    public function __construct(
        CourseService $courseService,
        CartService $cartService,
        CategoryService $categoryService,
        SubCategoryService $subCategoryService,
        CouponService $couponService,
        UserService $userService,
        PaymentsService $paymentService,
        OrdersService $orderService,
        EmailService $emailService,
    ) {
        $this->courseService = $courseService;
        $this->cartService = $cartService;
        $this->categoryService = $categoryService;
        $this->subCategoryService = $subCategoryService;
        $this->couponService = $couponService;
        $this->userService = $userService;
        $this->paymentService = $paymentService;
        $this->orderService = $orderService;
        $this->emailService = $emailService;
    }

    public function addToCart($id)
    {
        $course = $this->courseService->getById($id);

        if (isset($_SESSION['coupon']) || !empty($_SESSION['coupon'])) {
            unset($_SESSION['coupon']);
        }

        $cartItem = $this->cartService->checkExistCourse($course->getId());
        if ($cartItem !== false) {
            echo json_encode(['error' => 'Course is already on your cart']);
            exit;
        }

        if ($course->getDiscountPrice() == 0) {
            $paramsNotDiscount = [
                'course_id' => $id,
                'name' => $_POST['name'],
                'qty' => 1,
                'price' => $course->getSellingPrice(),
                'weight' => 1,
                'image' => $course->getImage(),
                'slug' => $_POST['slug'],
                'instructorId' => $_POST['instructorId'],
            ];
            $this->cartService->saveCart($paramsNotDiscount);
        } else if ($course->getDiscountPrice() != 0) {
            $amount = $course->getSellingPrice() - $course->getDiscountPrice();
            $paramsDiscount = [
                'course_id' => $id,
                'name' => $_POST['name'],
                'qty' => 1,
                'price' => $amount,
                'weight' => 1,
                'image' => $course->getImage(),
                'slug' => $_POST['slug'],
                'instructorId' => $_POST['instructorId'],
            ];
            $this->cartService->saveCart($paramsDiscount);
        }

        echo json_encode(['success' => 'Successfully added on your cart']);
        exit;
    }

    public function cartData()
    {
        $carts = $this->cartService->getAll();
        $cartTotal = $this->cartService->total();
        $cartQty = count($this->cartService->getAll());

        echo json_encode(
            array(
                'carts' => $carts,
                'cartTotal' => $cartTotal,
                'cartQty' => $cartQty,
            ),
        );
        exit;
    }

    public function addMiniCart()
    {
        return $this->cartData();
    }

    public function myCart()
    {
        $cartTotals = $this->cartService->total();
        $categories = $this->categoryService->getAllCategories();
        $subCategories = [];

        for ($i = 0; $i < count($categories); $i++) {
            $category_id = $categories[$i]->getId();
            $subCategories[$category_id] = $this->subCategoryService->getByCategoryId($category_id);
        }

        require ABSPATH . 'resources/user/mycart/mycart.php';
    }

    public function getCartCourse()
    {
        return $this->cartData();
    }

    public function cartRemove($id)
    {
        $result = $this->cartService->delete($id);

        if (isset($_SESSION['coupon']) || !empty($_SESSION['coupon'])) {
            $coupon_name =  $_SESSION['coupon']['coupon_name'];
            $coupon = $this->couponService->getCouponNameAndCheckExpire($coupon_name);

            $_SESSION['coupon'] = [
                'coupon_name' => $coupon->getCouponName(),
                'coupon_discount' => $coupon->getCouponDiscount(),
                'discount_amount' => round($this->cartService->total() * $coupon->getCouponDiscount() / 100),
                'total_amount' => round($this->cartService->total() - ($this->cartService->total() * $coupon->getCouponDiscount() / 100)),
            ];
        }

        if ($result) {
            echo json_encode(['success' => "Course removed from cart"]);
            exit;
        } else {
            echo json_encode(['error' => "Removed unsuccessfully, please try again"]);
            exit;
        }
    }

    public function applyCoupon()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);
        $coupon_name = $data['coupon_name'];

        $coupon = $this->couponService->getCouponNameAndCheckExpire($coupon_name);
        if ($coupon) {
            $_SESSION['coupon'] = [
                'coupon_name' => $coupon->getCouponName(),
                'coupon_discount' => $coupon->getCouponDiscount(),
                'discount_amount' => round($this->cartService->total() * $coupon->getCouponDiscount() / 100),
                'total_amount' => round($this->cartService->total() - ($this->cartService->total() * $coupon->getCouponDiscount() / 100)),
            ];

            echo json_encode([
                'validity' => true,
                'success' => 'Applied Coupon successfully',
            ]);
            exit;
        } else {
            echo json_encode(['error' => 'Invalid Coupon or Coupon is expired']);
            exit;
        }
    }

    public function couponCalculation()
    {
        if (isset($_SESSION['coupon']) || !empty($_SESSION['coupon'])) {
            echo json_encode([
                'subtotal' => $this->cartService->total(),
                'coupon_name' => $_SESSION['coupon']['coupon_name'],
                'coupon_discount' => $_SESSION['coupon']['coupon_discount'],
                'discount_amount' => $_SESSION['coupon']['discount_amount'],
                'total_amount' => $_SESSION['coupon']['total_amount'],
            ]);
            exit;
        } else {
            echo json_encode(['total' => $this->cartService->total()]);
            exit;
        }
    }

    public function couponRemove()
    {
        unset($_SESSION['coupon']);
        echo json_encode(['success' => 'Removed Coupon successfully']);
    }

    public function checkoutCreate()
    {
        $email = $_SESSION['emailUser'] ?? '';
        $user = $this->userService->getByEmail($email);

        if ($user) {
            if ($this->cartService->total() > 0) {
                $carts = $this->cartService->getAll();
                $cartTotal = $this->cartService->total();
                $cartQty = count($this->cartService->getAll());

                require ABSPATH . 'resources/user/checkout/checkoutView.php';
            } else {
                header("Location: /mycart?error=1");
                exit;
            }
        } else {
            header("Location: /mycart?error=2");
            exit;
        }
    }

    public function payment()
    {
        if (isset($_SESSION['coupon']) || !empty($_SESSION['coupon'])) {
            $total_amount = $_SESSION['coupon']['total_amount'];
        } else {
            $total_amount = $this->cartService->total();
        }

        $paramsPayment = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'cash_delivery' => $_POST['cash_delivery'],
            'total_amount' => $total_amount,
            'payment_type' => 'Direct Payment',
            'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
            'order_date' => date_create('now')->format('d F Y'),
            'order_month' => date_create('now')->format('F'),
            'order_year' => date_create('now')->format('Y'),
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $paymentId = $this->paymentService->savePayment($paramsPayment);
        $payment = $this->paymentService->getById($paymentId);
        $email = $_SESSION['emailUser'] ?? '';
        $user = $this->userService->getByEmail($email);

        foreach ($_POST['course_name'] as $key => $course_name) {
            $existingOrder = $this->orderService->checkExist($user->getId(), $_POST['course_id'][$key]);
            if ($existingOrder) {
                header("location: /checkout?error=1");
                exit;
            }

            $paramsOrder = [
                'payment_id' => $payment->getId(),
                'user_id' => $user->getId(),
                'instructor_id' => $_POST['instructorId'][$key],
                'course_id' => $_POST['course_id'][$key],
                'course_title' => $course_name,
                'price' => $_POST['price'][$key],
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->orderService->saveOrder($paramsOrder);
        }
        unset($_SESSION['cart']);

        $to = $_POST['email'];
        $subject = "Aduca - Payment successfully !";
        $name = $_POST['name'];
        $website = get_domain();
        $content = "
            Hello $name, <br>
            This email from Aduca - E-Learning system. <br>
            We want to say thank you very much because your support to us. <br>
            If have some problem with our courses. Please send back email for us. We will support you. <br>
            Thank you very much !
            -----------------------<br>
            Email from $website
            ";

        if ($_POST['cash_delivery'] == 'stripe') {
            echo "Stripe";
        } else {
            $this->emailService->send($to, $subject, $content);
            header("location: /checkout?success=1");
            exit;
        }
    }
}
