@extends('spacelayout')

@section('content')
@include('partials._spacehero')
@include('partials._search')

<style>
  canvas{width:50%}
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const labels = ['January','February','March','April','May','June'];
  const data = {
    labels: labels,
    datasets: [{
      label: 'Players over time',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  const data2 = {
      labels: [
        'Red',
        'Green',
        'Yellow',
        'Grey',
        'Blue'
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [11, 16, 7, 3, 14],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(75, 192, 192)',
          'rgb(255, 205, 86)',
          'rgb(201, 203, 207)',
          'rgb(54, 162, 235)'
        ]
      }]
  };

  const data3 = {
    labels: ['Eating','Drinking','Sleeping','Designing','Coding','Cycling','Running'],
    datasets: [{
      label: '2021',
      data: [65, 59, 90, 81, 56, 55, 40],
      fill: true,
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgb(255, 99, 132)',
      pointBackgroundColor: 'rgb(255, 99, 132)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(255, 99, 132)'
    }, {
      label: '2022',
      data: [28, 48, 40, 19, 96, 27, 100],
      fill: true,
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      borderColor: 'rgb(54, 162, 235)',
      pointBackgroundColor: 'rgb(54, 162, 235)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(54, 162, 235)'
    }]
  };

</script>

<h1 class="text-center text-3xl">S T A T I S T I C S</h1>

<canvas id="myChart"></canvas>

<canvas id="myChart2"></canvas>

<canvas id="myChart3"></canvas>

<script>
  const myChart = new Chart( document.getElementById('myChart'),{
    type: 'line',
    data: data,
    options: {}
  });

  const myChart2 = new Chart( document.getElementById('myChart2'),{
    type: 'polarArea',
    data: data2,
    options: {}
  });

  const myChart3 = new Chart( document.getElementById('myChart3'),{
    type: 'radar',
    data: data3,
    options: {
      elements: { line: { borderWidth: 3 } }
    }
  });
</script>

@endsection