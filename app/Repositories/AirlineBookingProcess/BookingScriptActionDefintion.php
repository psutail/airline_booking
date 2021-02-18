<?php
namespace App\Repositories\AirlineBookingProcess;
use Illuminate\Support\Facades\Config;
use Session ;
use DB;
use Auth;
use Carbon;
use App\Models\AvailableSeatsAirline;
use App\Models\PassengerBooking;
use App\Models\PassengerList;
use App\Models\AircraftInfo;
use App\Models\Airline;
use App\Models\Destination;
use App\Models\AirPortTerminal;

class BookingScriptActionDefintion implements BookingScriptAction
{

    public function generateBookingNumber()
    {
        // md5(uniqid($your_user_login, true))
        return md5(uniqid(rand(), true));
    }

    public function generateflightNumber($flight_id)
    {
        return md5(uniqid($flight_id, true));
    }

    public function getAvailableSeatsByAirline($airline_id){

        return  AvailableSeatsAirline::where('airline_id',$airline_id)->first();
    }

    public function getAvailableSeatALL($all){

        return  AvailableSeatsAirline::all();
    }

    public function getAvailableSeatType($airline_id,$seat_type){

        return  AvailableSeatsAirline::where('airline_id',$airline_id)->where('seat_type',$seat_type)->first();

    }

    public function updateAvailableSeat($model_id,Array $customer_information){

        $number_of_seats=count($customer_information['check_in_passenger']);

        $AvailableSeatsAirline=AvailableSeatsAirline::findOrFail($model_id);
        $AvailableSeatsAirline->seats=$number_of_seats;
        $AvailableSeatsAirline->save();

    }

    public function acceptPassengerBooking(Array $customer_information){

        // BOOKING MAIN TABLE
        $PassengerBooking=new PassengerBooking();
        $PassengerBooking->booking_number=$this->generateBookingNumber();
        $PassengerBooking->flight_number=$this->generateflightNumber($customer_information['flight_number']);
        $PassengerBooking->destination_id=$customer_information['destination_id'];
        $PassengerBooking->terminal=$customer_information['terminal'];
        $PassengerBooking->number_of_passenger=$customer_information['check_in_passenger'];
        $PassengerBooking->save();

        // PASSENGER DETAIL TABLE
        if($PassengerBooking->id){

            foreach ($customer_information['details'] as $individual_customer) {
                # code...
                $PassengerList=PassengerList::findOrFail($PassengerBooking->id);
                $PassengerList->booking_id=$PassengerBooking->id;
                $PassengerList->booking_number=$PassengerBooking->booking_number;
                $PassengerList->first_name=$individual_customer['first_name'];
                $PassengerList->last_name=$individual_customer['last_name'];
                $PassengerList->age=$individual_customer['age'];
                $PassengerList->gender=$individual_customer['gender'];
                $PassengerList->save();
            }

        }

        return $PassengerBooking->booking_number;

    }


    public function getPassengerList($booking_number){

        return  PassengerList::where('booking_number',$booking_number)->get();
    }

    public function getAircraftInfoAll(){

        return  AircraftInfo::all();
    }

    public function getAircraftInfo($aircraft_id){

         return  AvailableSeatsAirline::where('aircraft_id',$aircraft_id)->first();
    }

    public function assignSeats(Array $customer_information){

        ## THIS IS THE MAIN BOOKING PROCESS FUNCTION HERE 

        try {

            $data=$this->getAvailableSeatType();

            if(!empty($data->seat) && $data->seat>0){

                //UPDATING AVAILABLE SEATS TABLE WITH NUMBER OF PASSENGERS BY AIRLINE
                $this->updateAvailableSeat($data->id,$customer_information);

                //SAVE PASSENGER INFORMATION
                $booking_number=$this->acceptPassengerBooking($customer_information);

                return ['result'=>'success','booking_number'=>$booking_number,'message'=>$this->messages(1)];

            }else{

                return ['result'=>'fail','booking_number'=>'NA','message'=>$this->messages(0)];
            }

        }

        catch(Exception $e) { 

            error_log($e->getMessage());

            echo 'Message: ' .$e->getMessage();
        }

    }

    public function messages($result=null){

        if($result===0){

            return 'BOOKING FAILED!.';

        }elseif($result===1){

            return 'BOOKING SUCCESSFULLY DONE!.';

        }else{

            return 'SOMETHING WENT WRONG!';
        }
    }
   
}
