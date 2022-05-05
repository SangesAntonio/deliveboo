@extends('layouts.app')
@section('content')
  <div id="statistics">
    <div class="col-xs-12 col-md-6">
      <canvas id="myChart" height="200px"></canvas>
    </div>
    <div class="col-xs-12 col-md-6">
      <canvas id="myChart2"></canvas>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: {!! json_encode($productName) !!},
        datasets: [{
          label: 'Quantità di piatti venduti',

          data: {!! json_encode($totalQuantity) !!},
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 206, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 206, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)'
          ],
          borderWidth: 1
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

    const ctx2 = document.getElementById('myChart2');
    const myChart2 = new Chart(ctx2, {
      type: 'line',
      data: {
        labels: {!! json_encode($orderDate) !!},
        datasets: [{
          label: 'Incassi per Ordine',

          data: {!! json_encode($totalAmount) !!},
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 206, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 206, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)'
          ],
          borderWidth: 1
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
