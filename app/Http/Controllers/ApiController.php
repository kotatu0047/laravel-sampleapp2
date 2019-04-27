<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * @param CustomerService $customerService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCustomers(CustomerService $customerService)
    {
        return response()->json($customerService->getCustomers());
    }

    /**
     * 失敗時 422を返す
     *
     * @param Request $request
     * @param CustomerService $customerService
     */
    public function postCustomers(Request $request, CustomerService $customerService)
    {
        $this->validate($request, ['name' => 'required']);
        $customerService->addCustomer($request->json('name'));
    }

    /**
     * customer_idに紐づいく顧客情報を1つ取得
     * @param int $customer_id
     * @param CustomerService $customerService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCustomer(int $customer_id, CustomerService $customerService)
    {
        if (!$customerService->existCustomer($customer_id)) {
            abort(Response::HTTP_NOT_FOUND);
        }
        return response()->json($customerService->getCustomer($customer_id));
    }

    public function putCustomer()
    {
    }

    public function deleteCustomer()
    {
    }

    public function getReports()
    {
    }

    public function postReport()
    {
    }

    public function getReport()
    {
    }

    public function putReport()
    {
    }

    public function deleteReport()
    {
    }
}
