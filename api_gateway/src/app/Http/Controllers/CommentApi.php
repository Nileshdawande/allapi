<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\services\CommentService;
class CommentApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $response;
    private $CommentService;
    private $fetch_type;
    public function __construct(CommentService $CommentService)
    {
        $this->CommentService = $CommentService;
    }

    public function index(Request $request)
    {
        $data = $this->CommentService->show_all_Comment();
        return $data;
    }


    public function store(Request $request)
    {
        $data = $this->CommentService->create_Comment($request->all());
        return $data;
    }

    public function show($id,Request $request)
    {
        if($request['fetch_type'])
        {
            $this->fetch_type = $request['fetch_type'];
            $data = $this->CommentService->show_Comment($id,$this->fetch_type);
            return $data;
        }

        else
        {
            $this->fetch_type = "";
            $data = $this->CommentService->show_Comment($id,$this->fetch_type);
            return $data;
        }

    }


    public function update(Request $request, $id)
    {
        $data = $this->CommentService->update_Comment($id,$request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->CommentService->delete_Comment($id);
        return $data;
    }

}
