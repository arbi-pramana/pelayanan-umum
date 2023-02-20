@extends('admin::layout.master')
@section('header')
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      // timeZone: 'Asia/Jakarta',
      locale: 'en-GB',
      startime: '08:00:00', /* calendar start Timing */
      endime: '16:00:00',  /* calendar end Timing */
      headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
          },
      events: @json($events),
      eventTimeFormat: { // like '14:30:00'
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false
  }

    });
    calendar.render();
  });

</script>
@endsection
@section('content')
  @include('admin::partials.alert-messages')
    <div class="block-header">
      <h2>Rangkuman Data Berjalan Aplikasi Pelayanan Umum</h2>
    </div>
      @component('admin::partials.card', [
      'title' => 'Permohonan Kendaraan',
      'description' => ''
        ])
      @slot('header_dropdown')
      @endslot
      <div id='calendar'></div>
    @endcomponent
@stop
@section('js')
    
@endsection