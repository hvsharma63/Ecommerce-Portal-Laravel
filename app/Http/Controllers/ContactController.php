<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.contact.admin.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), 
            [
                "name"=>'required',
                // "email"=>'required',
                'email' => ['required', 'string', 'email', 'max:255'],
                "subject"=>'required',
                "message"=>'required',
            ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        $save=Contact::create($request->all());
        die(json_encode(array('success'=>True)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $columns = array( 
            0 =>'id', 
            1 =>'name',
            2=> 'email',
            3=> 'subject',
            4=> 'message',
            5=> 'created_at',
            6=> 'id',
        );

        $totalData = Contact::where('status','Y')
        ->count();
        $totalFiltered = $totalData; 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $Contacts = Contact::where('status','Y')
            ->orWhere('status','N')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }
        else {
            $search = $request->input('search.value'); 
            $Contacts =  Contact::where('id','LIKE',"%{$search}%")
            ->orWhere('name', 'LIKE',"%{$search}%")
            ->orWhere('email', 'LIKE',"%{$search}%")
            ->orWhere('subject', 'LIKE',"%{$search}%")
            ->orWhere('message', 'LIKE',"%{$search}%")
            ->orWhere('status','Y')
            ->orWhere('status','N')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered = Contact::where('id','LIKE',"%{$search}%")
            ->orWhere('name', 'LIKE',"%{$search}%")
            ->orWhere('email', 'LIKE',"%{$search}%")
            ->orWhere('subject', 'LIKE',"%{$search}%")
            ->orWhere('message', 'LIKE',"%{$search}%")
            ->orWhere('status','Y')
            ->orWhere('status','N')
            ->count();
        }
        $data = array();
        if(!empty($Contacts))
        {
            foreach ($Contacts as $Contact)
            {

                $recordId = $Contact->id;
                $nestedData['id'] = $Contact->id;
                $nestedData['name'] = $Contact->name;
                $nestedData['email'] = $Contact->email;
                $nestedData['subject'] = $Contact->subject;
                $nestedData['message'] = $Contact->message;
                $nestedData['created_at'] = date('j M Y',strtotime($Contact->created_at));
                $nestedData['action'] = "<div class='button-list'><a class='btn btn-action text-danger' style='background-color: transparent;' onclick='SwalDelete($recordId)'><i class='fa fa-trash'></i></a></div>";
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );
        echo json_encode($json_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=$request->deleteRecord;
        $delete=Contact::find($id);
        $delete->status='T';
        $delete->save();   
        die(json_encode(array("success"=>"true","message"=>"Deleted Successfully")));
    }
}
