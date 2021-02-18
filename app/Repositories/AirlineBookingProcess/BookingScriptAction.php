<?php


namespace App\Repositories\AirlineBookingProcess;

// HERE WE ARE DEFINING THE BASIC STRCUTURE OF OUR BOOKING PROCESS


interface BookingScriptAction
{
    // FIRST GET AVAILABE SEATS
    public function getAvailableSeatsByAirline($airline_id);

    //CHECK AND ASSIGN SEATS TO PASSENGER

    public function assignSeats(Array $customer_information);

    //ACCEPT PASSENGER BOOKING

    public function acceptPassengerBooking(Array $customer_information);

    //GET PASSGNGER LIST BY AIRLINE ID

    public function getPassengerList($booking_number);

    // GET AIRCRAFT INFO

    public function getAircraftInfo($aircraft_id);

}
