<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\AirlineBookingProcess\BookingScriptAction;
use Redirect;
use DB;
use Validator;


class BookingController extends Controller
{
    public function __construct(BookingScriptAction $airline_booking)
    {
    	// HERE WE ARE INJECTING DEPENDENCIES FROM BUSSINEESS LAYER /REPOSITORY
      
        $this->airline_booking=$airline_booking;
    }

    public function get_available_seat($airline_id)
    {   
    	//Here Fetching the available seats & SENDING IT TO THE BLADE FILE

		$data=$this->airline_booking->getAvailableSeatsByAirline($airline_id);

		dd($data);

		return view('booking/detail')
			  ->with('data',$data);
    }

    public function get_booking_page($airline_id)
    {   
    	//Here Fetching the available seats & SENDING IT TO THE BLADE FILE

    	$data=array();
    	//AIRLINE MODEL DATA //LOCATION // TERMINAL DATA ETC
    	$data=$this->cookingFormSelectionData();

		return view('booking/booking_page')
			  ->with('data',$data);
    }

    public function assign_seats(Request $request)
    {
    	//AIRLINE SEAT ASSIGNMENT TO CUSTOMER

        $validator = Validator::make($request->all(), [
        'airline_id' => 'required',
        'location' => 'required',
        'customer_information'=>'required'
       
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();

        }

        $customer_booking_data=array();

        $customer_booking_data=$this->prepare_data_array($request->all());

	    $data=$this->airline_booking->assignSeats($customer_booking_data);

	    if($data['result']=='success'){

	    	//SUCCESS BOOKING
	    	$message=$data['booking_number'].'/ '.$data['message'] ;

	    	return redirect()->back()->with('success',$message);

	    }else{

            //FAIL BOOKING
	    	return redirect()->back()->with('success',$data['message']);
	    }

	}

	public function get_passenger_list($booking_number)
	{
	 	$data=$this->airline_booking->getPassengerList($airline_id);
		return view('booking/airline/list')
			  ->with('data',$data);
	}

	public function get_aircraft_detail($aircraft_id)
	{
	 	$data=$this->airline_booking->getAircraftInfo($aircraft_id);
		return view('booking/aircraft/detail')
			  ->with('data',$data);
	}

	public function prepare_data_array(Request $request){

		//DATA PREPARE LOGIC WILL BE WRIITEN HERE
	}

	public function cookingFormSelectionData(Request $request){

		//FORM DATA PREPARE LOGIC WILL BE WRIITEN HERE
	}

	

}
