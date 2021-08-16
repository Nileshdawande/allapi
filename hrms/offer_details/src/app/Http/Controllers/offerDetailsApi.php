<?php

namespace App\Http\Controllers;
use App\Models\Offer_detail;
use Illuminate\Http\Request;
class offerDetailsApi extends Controller
{

    private $response;
    public function index(Request $request)
    {
        if($request['page'])
        {
          $this->response = Offer_detail::paginate($request['limit']);
          if(count($this->response) != 0)
          {
             return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
          }

          else
          {
            return response(array("notice"=>"data not found"),404)->header("Content-Type","application/json");
          }
        }

        else
        {
            $this->response = Offer_detail::get();
            if(count($this->response) != 0)
            {
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
            }

            else
            {
              return response(array("notice"=>"data not found"),404)->header("Content-Type","application/json");
            }
        }

    }


    public function store(Request $request)
    {

      $this->response = Offer_detail::create($request->all());
      if($this->response)
      {
         return response(array("notice"=>"offer created"),201)->header("Content-Type","application/json");
      }

      else
      {
        return response(array("notice"=>"offer not created"),404)->header("Content-Type","application/json");
      }

    }

    public function show($id)
    {
        $this->response = Offer_detail::where("id",$id)->get();
        if(count($this->response) != 0)
        {
           return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
        }

        else
        {
          return response(array("notice"=>"data not found"),404)->header("Content-Type","application/json");
        }
    }


    public function update(Request $request, $id)
    {

        $this->response = Offer_detail::where("id",$id)->update(array(
          "interview_details_id"=>$request["interview_details_id"],
          "candidate_id"=>$request["candidate_id"],
          "offer_date"=>$request["offer_date"],
          "gross_salary_offered"=>$request["gross_salary_offered"],
          "offer_accepted"=>$request["offer_accepted"]
        ));

        if($this->response)
        {
           return response(array("notice"=>"Update Success"),200)->header("Content-Type","application/json");
        }

        else
        {
            return response(array("notice"=>"Update Failed"),404)->header("Content-Type","application/json");
        }
    }

    public function destroy($id)
    {
         $this->response = Offer_detail::where("id",$id)->delete();
         if($this->response)
         {
            return response(array("notice"=>"Delete Success"),200)->header("Content-Type","application/json");
         }

         else
         {
           return response(array("notice"=>"Delete Failed"),404)->header("Content-Type","application/json");
         }
    }




}
