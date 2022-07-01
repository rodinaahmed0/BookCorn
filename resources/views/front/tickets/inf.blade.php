  @extends('layouts.app')

@section('links')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/ticket.css')}}" />
@endsection

@section('title')
Ticket
@endsection

@section('content')

@include('includes.navbar_background')

 <!-- ====================Start Ticket information====================== -->
 <section class="ticket">
      
    <div class="qr__container">
      <div class="qr">
        <span class="qr__circle"></span>
        <h2 class="qr__code heading-2"> {{$ticket->ticket_num}} </h2>
        <div id="qrcode"></div>
      </div>
    </div>
    <div class="ticket__info">
    <ul class="ticket__informatoins">
      <li class="ticket__information">
        <p class="ticket__info--paragraph">
          <strong>Name:</strong> {{$ticket->user->name}}
        </p>
      </li>
      <li class="ticket__information">
        <p class="ticket__info--paragraph">
          <strong>Cinema:</strong> {{$ticket->show->cinema->name}}
        </p>
      </li>
      <li class="ticket__information">
        <p class="ticket__info--paragraph">
          <strong>When:</strong> {{$ticket->show->date}} / {{  Carbon\Carbon::parse($ticket->show->time->show_time)->format('g:i A') }}
        </p>
      </li>
      <li class="ticket__information">  
        <p class="ticket__info--paragraph">
          <strong>N.O Seats:</strong> {{$ticket->seats->count()}}
        </p>
      </li>
    
      <li class="ticket__information">
        
        <p class="ticket__info--paragraph">
          <strong>Hall:</strong> {{$ticket->show->hall->number}}
        </p>
      </li>
      <li class="ticket__information">
        <p class="ticket__info--paragraph">
          <strong>Movie:</strong> {{$ticket->show->movie->name}}
        </p>
      </li>
      <li class="ticket__information">
        <p class="ticket__info--paragraph">
          <strong>Price:</strong> {{$ticket->seats->count() * $ticket->show->time->price}}LE
        </p>
      </li>

      <li class="ticket__information">
        <p class="ticket__info--paragraph">
          <strong>Payment Type:</strong> {{$ticket->payment_type}}
        </p>
      </li>
    </ul>
  </div>
</section>

<h6 class="heading--6">You can cancel only 3 hours before show after that you will be charged.</h6>


  <form action="{{route('ticket.cancel' , $ticket->id)}}" method="post"  class="invoice">
    @csrf
    <input type="submit" class="invoice__btn btn-2" id="invoice__btn" value="Cancel Ticket">
    </form>


@endsection


@section('scripts')
<script src="{{asset('js/ticket.js')}}"></script>
{{-- <script src="{{asset('js/qrCode.js')}}"></script> --}}
<script src="{{asset('js/script.js')}}"></script>
@endsection
