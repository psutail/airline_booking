# Airline-Passenger-Manifest
Travelling abroad is one of the best treats you can give yourself. But before you can fly out, you will have to go
through the check-in and boarding process which sometimes takes more than an hour to do. And this would take even
longer especially on peak seasons and if the system is unable to handle the volume of traffic.
To address these issues and to achieve the best customer experience, a newly built airport is looking for Software
Engineers to revamp a 60-year-old system from scratch. The new system design is expected to be modern, webbased, extensible, future proof and more robust than the old system which was built using FOXPRO.


                   /*  BUILT IN LARAVEL 8.0 WITH JETSTREAM AUTH */


INITIAL VERSION STRUCTURE & ITS EXPLANATION :::===================================


1)OOPS CODE STRCUTURE AND ITS BUSSINESS LOGIC WRTITTEN UNDER NAME SPACE :

Airline-Passenger-Manifest\app\Repositories

======================================================================================

MODEL ARE UNDER : -

2)Airline-Passenger-Manifest\app\Models : DATA ACTIVE DIRECTORY

========================================================================================

3)ALL DATA MIGRATION ARE UNDER : -

Airline-Passenger-Manifest\database\migrations

ALL WE NEED RUN THE MIGRATION USING PHP ARTISAN

"php artisan migrate"

=============================================================================================

 
4)We can further design our application basic of the bussinees logic wriiten under repo interface as mentioned above.

//WIRE FRAME OF OUR BOOKING APPLICATION UNDER BookingController.php : ---

Airline-Passenger-Manifest\app\Http\Controllers\BookingController.php  

"// HERE WE ARE INJECTING DEPENDENCIES FROM BUSSINEESS LAYER /REPOSITORY  IN TO CONSTRUCTOR"

<!--  public function __construct(AirlineBookingProcess $airline_booking)
    {
    	// HERE WE ARE INJECTING DEPENDENCIES FROM BUSSINEESS LAYER /REPOSITORY
      
        $this->airline_booking=$airline_booking;
    } -->

  AFTER THAT USING ALL THE FUNCTIONS DEFINE UNDER THE NAME SPACE INTERFACE  "Airline-Passenger-Manifest\app\Repositories" TO DO OUR BOOKING

  ==============================================================================================================

  6)ALL ROUTE ARE UNDER : Airline-Passenger-Manifest\route\web.php along with Lravel 8 jetstream Auth

  5) ALL BALDE FILE /HTML VIEW FILE ARE UNDER NAME SPACE 

  Airline-Passenger-Manifest\resources\views


NOW ALL THE BASIC IS READY TO DEVELOPE A FULL FLEDGE APPLICATION EXTENDING MODEL,VIEW,CONTROLLER & ITS BUSSINESS LOGIC

THANKS A LOT.