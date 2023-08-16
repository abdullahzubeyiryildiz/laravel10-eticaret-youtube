@extends('backend.layout.app')

@section('content')


    <div class="row">
      <div class="col-md-12 grid-margin transparent">
        <div class="row">
            <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>

@endsection

@section('customjs')
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: {!! json_encode($data['labels']) !!},
        datasets: [{
          label: 'En Çok Satın Alınanlar',
          data: {!! json_encode($data['data']) !!},
          borderWidth: 2,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>

@endsection
