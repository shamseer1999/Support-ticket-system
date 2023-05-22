<?php

namespace App\Http\Controllers;

use App\Models\Assigned_agent;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{

    public function index()
    {
        $user =auth()->user()->id;
        $query=Ticket::query();
        
        if(auth()->user()->role ==3)
        {
            $ticket = $query->with(['users','categories','labels'])->paginate(10);
        }else{
            $ticket = $query->with(['users','categories','labels'])->where('user_id',$user)->paginate(10);
        }
//  dd($ticket);
        $data['results'] = $ticket;
        
        return view('tickets.index',$data);
    }
    public function addTicket(Request $request)
    {
        if($request->isMethod('post'))
        {
            // dd($count=count($request->label));
            $validated=$request->validate([
                'title' =>'required',
                'message' =>'required',
                'priority' =>'required'
            ]);

            $ins_arr=array(
                'title' =>$validated['title'],
                'message' =>$validated['message'],
                'priority'=>$validated['priority'],
                'user_id' =>auth()->user()->id
            );

            $insert = Ticket::create($ins_arr);

            if($insert)
            {
                if(!empty($request->label))
                {
                    $label=$request->label;
                    $countLabel = count($request->label);

                    for($i=0; $i < $countLabel; $i++)
                    {
                        $label_arr=array(
                            'label_id'=>$label[$i],
                            'ticket_id'=>$insert->id
                        );

                        DB::table('ticket_labels')->insert($label_arr);
                    }
                }

                if(!empty($request->category))
                {
                    $category=$request->category;
                    $countCategory = count($request->category);

                    for($i=0; $i < $countCategory; $i++)
                    {
                        $category_arr=array(
                            'category_id'=>$category[$i],
                            'ticket_id'=>$insert->id
                        );

                        DB::table('ticket_categories')->insert($category_arr);
                    }
                }
                
            }

            return redirect()->route('tickets')->with('success','Ticket created successfully');
        }
        $data['labels']=DB::table('labels')->get();
        $data['categories']=DB::table('categories')->get();

        return view('tickets.add',$data);
    }

    public function assignto_agent(Request $request,$id)
    {
        $ticketId=decrypt($id);

        if($request->isMethod('post'))
        {
            $ins_arr=array(
                'ticket_id'=>$ticketId,
                'agent_id' =>$request->agent,
                'assigned_by' =>auth()->user()->id
            );

            $checkTicket=Assigned_agent::where(['ticket_id'=>$ticketId,'agent_id'=>$request->agent])->first();

            if($checkTicket !="")
            {
                return redirect()->route('tickets')->with('danger','Ticket already assigned this agent');
                
            }

                Assigned_agent::create($ins_arr);   
                return redirect()->route('tickets')->with('success','Ticket assigned to agent successfully');

        }

        $data['agents'] =User::where('role',2)->get();
        $data['ticket']=Ticket::find($ticketId);
        return view('mngr.tickets.assign_to_agents',$data);
    }

    public function view($id)
    {
        $ticketId=decrypt($id);

        $viewdata=Ticket::with(['agents','labels','categories'])->find($ticketId);

        $data['viewdata'] =$viewdata;

        return view('tickets.view_tickets',$data);
    }
}
