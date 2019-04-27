<?php

namespace App\Services;

use App\Customer;
use Illuminate\Support\Facades\Log;

class  CustomerService
{

    /**
     * 全顧客情報取得
     * @return Customer[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function getCustomers()
    {
        return Customer::query()->select(['id', 'name'])->get();
    }

    /**
     * 顧客登録
     * @param String $name
     */
    public function addCustomer(String $name)
    {
        $customer = new Customer();
        $customer->name = $name;
        $customer->save();
    }

    /** idに紐づいて顧客情報取得
     * @param int $id
     * @return Customer|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getCustomer(int $id)
    {
        $customer = Customer::query()
            ->where('id', '=', $id)
            ->select(['id', 'name'])
            ->first();
        return $customer;
    }

    /** 指定したidに紐づく顧客情報取得が存在するか
     * @param int $id
     * @return bool
     */
    public function existCustomer(int $id)
    {
        return Customer::query()
            ->where('id', '=', $id)
            ->exists();
    }
}