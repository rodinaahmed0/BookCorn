@extends('layouts.dashboard')

@section('title')
Show Tickets
@endsection
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h3 class="card-title">Show for Movie : {{$show->movie->name}}</h3>
        <h4 class="card-title">Time :  {{$show->date}} {{  Carbon\Carbon::parse($show->time->show_time)->format('g:i A') }}</h4>
        <h4 class="card-title"> {{$show->tickets->count()}} Tickets</h4>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th style="width: 10px">#</th>
                <th>Ticket Owner Name</th>
                <th>Price</th>
                <th>N.O Seats</th>
                <th>Payment Type</th>
                <th>Ticket Random Number</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>

              @foreach ($tickets as $ticket)
               <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{$ticket->seats->count() * $ticket->show->time->price}}LE</td>
                    <td> {{ $ticket->seats->count() }}</td>
                    <td> {{ $ticket->payment_type }}</td>
                    <td> {{ $ticket->ticket_num }}</td> 

                    <td >
                        <button data-target="#modal-{{ $ticket->id }}" data-toggle="modal" class="btn btn-warning btn-sm photoFilepond" >
                            Pay
                        </button>  
                       
                        <form
                        action="{{ route('shows.approve' , $ticket->id) }}"
                        method="post"
                        style="display: inline-block;"
                    >
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-success btn-sm"
                                onclick="return confirm('{{ __('Are you sure?') }}')">
                            Approve
                        </button>
                      </form>

                        <form
                        action="{{ route('shows.charge' , $ticket->id) }}"
                        method="post"
                        style="display: inline-block;"
                    >
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('{{ __('Are you sure?') }}')">
                            Charge
                        </button>
                      </form>


                    </td>
                </tr>
                @include('dashboard.shows.modals._showPayment' , $ticket)
            @endforeach

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>

@endsection

