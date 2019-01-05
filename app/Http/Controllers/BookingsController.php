<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\EventTemplateTask;
use App\ServiceCustomerBooking;
use App\Task;
use App\Event;

class BookingsController extends Controller
{
    public function make_reservation($event_id,$task_id,$svp_id,$service_id)
    {
        $event = Event::find($event_id);

        $booking = new Booking();
        $booking->date = $event->date;
        $booking->stime = $event->stime;
        $booking->etime = $event->etime;
        $booking->status = 0;
        $booking->service_provider_id = $svp_id;
        $booking->save();

        EventTemplateTask::where('event_id',$event_id)->where('task_id',$task_id)->delete();
        $ett = new EventTemplateTask();
        $ett->event_id = $event_id;
        $ett->task_id = $task_id;
        $ett->service_id = $service_id;
        $ett->booking_id = $booking->booking_id;
        $ett->save();

        $scb = new ServiceCustomerBooking();
        $scb->service_id = $service_id;
        $scb->customer_id = session()->get('customer_id');
        $scb->booking_id = $booking->booking_id;
        $scb->save();

        return 1;

    }
}