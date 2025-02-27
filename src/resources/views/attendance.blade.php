@extends('layouts.common')

@section('common')
<div class="container">
  <div class="attendance">

   <h5 class="titlebox username">全体勤怠表</h5>

    <div class="d-flex justify-content-between mb-4">
      <form action="{{ route('attendance') }}" method="get">
        <input type="hidden" name="date" value="{{ $previousDate }}">
        <button type="submit" class="attebtn btn btn-primary attendancebutton"><</button>
      </form>

        <p class="carbonbox username">{{ Carbon\Carbon::createFromFormat('Y-m-d', $currentDate)->format('Y-m-d') }}</p>
        
      <form action="{{ route('attendance') }}" method="get">
        <input type="hidden" name="date" value="{{ $nextDate }}">
        <button type="submit" class="attebtn btn btn-primary attendancebutton">></button>
      </form>
      <form action="{{ route('attendance') }}" method="get" class="calendar">
        <input class="calendarlabel" type="date" name="date" value="{{ $currentDate }}">
        <button type="submit" class="attebtn individualbutton">表示</button>
      </form>
    </div>
          
    <table class="attetable">
      <tr class="attendancetable username">
        <th>名前</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
        <th>休憩時間</th>
        <th>勤務時間</th>
      </tr>
    @foreach($workSummaries as $summary)
      <tr class="attendancebox username">
        <td>{{ $summary['user'] }}</td>
        <td>{{ $summary['start_work'] }}</td>
        <td>{{ $summary['end_work'] }}</td>
        <td>{{ $summary['breaktime'] }}</td>
        <td>{{ $summary['totalwork'] }}</td>
      </tr>
    @endforeach 
    </table>

    <div class="pagination">

      <p class="pagination">{{ $timestamps->appends(['date' => $currentDate])->links() }}</p>
    </div>
 </div>
</div>

@endsection

