<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\OfferDetailService;
class offerDetailsApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $OfferDetailService;
    private $page;
    private $limit;
    public function __construct(OfferDetailService $OfferDetailService)
    {
        $this->OfferDetailService = $OfferDetailService;
    }

    public function index(Request $request)
    {
        if($request['page'])
        {
            $this->page = $request['page'];
            $this->limit = $request['limit'];
            $data = $this->OfferDetailService->show_all_offerDetails($this->page,$this->limit);
            return $data;
        }

        else
        {
            $this->page = "";
            $this->limit = "";
            $data = $this->OfferDetailService->show_all_offerDetails($this->page,$this->limit);
            return $data;
        }

    }


    public function store(Request $request)
    {
        $data = $this->OfferDetailService->create_offerDetails($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = $this->OfferDetailService->show_offerDetails($id);
        return $data;
    }


    public function update(Request $request, $id)
    {
        $data = $this->OfferDetailService->update_offerDetails($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->OfferDetailService->delete_offerDetails($id);
        return $data;
    }

}
