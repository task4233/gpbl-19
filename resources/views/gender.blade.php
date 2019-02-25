@extends('layouts.app')

@section('title', 'Gender')

@section('content')
<div class="chart">
    <!-- chart.js -->
        <canvas id="genderChart" height="400"></canvas>
    <!-- end -->
</div>

<script>
  var ctx = document.getElementById("genderChart");
  var genderChart = new Chart(ctx, {
    // kind of grapheme_strpos
    type: 'doughnut',
    // data setting
    data: {
      // labels
      labels: [
        @foreach ($genders as $gender)
          "{{ $gender->gender }}",
        @endforeach
      ],
      //dataset
      datasets: [{
        // bg-color
        backgroundColor: [
            'rgba(236, 100, 75, 1)',
            'rgba(165, 55, 253, 1)'
        ],
        // bg-color(on hover)
        //hoverBackgroundColor: [

        //],
        // datas of graph
        data: [
          @foreach ($genders as $gender)
            {{ $gender->gender_cnt }},
          @endforeach
        ],
      }],
    },
    options: {
      title: {
          display: true,
          text: 'Gender',
          position: 'bottom',
      },
      legend: {
        display: true,
        position: 'top',
      },
      responsive: true,
      maintainAspectRatio: false,
    }
  });
</script>

<h1>Heading Conclusion</h1>
<p>
write something.
</p>
@endsection

@section('footer')
(c) 2019 hoge.
@endsection
