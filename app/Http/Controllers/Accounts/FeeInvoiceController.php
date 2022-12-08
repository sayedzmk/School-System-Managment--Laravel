<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\FeeInvoiceRepositoryInterface;

class FeeInvoiceController extends Controller
{
    protected $Fees_invoice;

    public function __construct(FeeInvoiceRepositoryInterface $Fees_invoice)
    {
        $this->Fees_invoice = $Fees_invoice;
    }


    public function index()
    {
        return $this->Fees_invoice->index();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->Fees_invoice->store($request);
    }


    public function show($id)
    {
        return $this->Fees_invoice->show($id);
    }


    public function edit($id)
    {
        return $this->Fees_invoice->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Fees_invoice->update($request);

    }


    public function destroy(Request $request)
    {
        return $this->Fees_invoice->destroy($request);
    }
}
