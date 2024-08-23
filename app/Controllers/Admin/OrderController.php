<?php

namespace App\Controllers\Admin;

use App\Services\OrdersService;
use App\Services\PaymentsService;
use App\Services\UserService;

class OrderController
{
    private $userService;
    private $paymentsService;
    private $orderService;

    public function __construct(
        UserService $userService,
        PaymentsService $paymentsService,
        OrdersService $orderService,
    ) {
        $this->userService = $userService;
        $this->paymentsService = $paymentsService;
        $this->orderService = $orderService;
    }

    private function getInfoHeader()
    {
        $email = $_SESSION['emailAdmin'];
        return $this->userService->getByEmail($email);
    }

    public function adminPendingOrder()
    {
        $admin = $this->getInfoHeader();
        $payments = $this->paymentsService->getStatusPayment('pending');

        require ABSPATH . 'resources/admin/orders/pendingOrders.php';
    }

    public function adminOrderDetails($id)
    {
        $admin = $this->getInfoHeader();
        $payment = $this->paymentsService->getById($id);
        $orderItem = $this->orderService->getAllByPaymentId($payment->getId());

        require ABSPATH . 'resources/admin/orders/orderDetails.php';
    }

    public function pendingConfirm($id)
    {
        $payment = $this->paymentsService->getById($id);
        $this->paymentsService->updateStatus($payment);

        $_SESSION['notification'] = [
            'message' => "Order Confirmed successfully",
            'alert-type' => 'success',
        ];

        header("Location: /admin/confirm/order");
        exit;
    }

    public function adminConfirmOrder()
    {
        $admin = $this->getInfoHeader();
        $payments = $this->paymentsService->getStatusPayment('confirm');

        require ABSPATH . 'resources/admin/orders/confirmOrders.php';
    }

    private function getInstructorInSidebar()
    {
        $email = $_SESSION['emailInstructor'];
        return $this->userService->getByEmail($email);
    }

    public function instructorAllOrder()
    {
        $instructor = $this->getInstructorInSidebar();
        $orderItem = $this->orderService->getOrdersLatestByPaymentIdAndInstructorId($instructor->getId());
        require ABSPATH . 'resources/instructor/order/allOrder.php';
    }

    public function instructorOrderDetails($payment_id)
    {
        $instructor = $this->getInstructorInSidebar();
        $payment = $this->paymentsService->getById($payment_id);
        $orderItem = $this->orderService->getAllByPaymentId($payment_id);
        require ABSPATH . 'resources/instructor/order/orderDetails.php';
    }

    public function myCourse()
    {
        $email = $_SESSION['emailUser'];
        $user = $this->userService->getByEmail($email);
        $orderItem = $this->orderService->getOrdersLatestByCourseIdAndUserId($user->getId());

        require ABSPATH . 'resources/user/dashboard/myAllCourse.php';
    }
}
