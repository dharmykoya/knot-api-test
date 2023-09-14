<?php

namespace App\Http\Controllers;

use App\Services\MerchantService;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    protected MerchantService $merchantService;

    public function __construct(MerchantService $merchantService) {
        $this->merchantService = $merchantService;
    }

    public function index(Request $request) {
        $merchants = $this->merchantService->getAllMerchants($request);

        return response()->ok($merchants);
    }
}
