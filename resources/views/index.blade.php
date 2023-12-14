<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trains</title>
  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Styles -->
  @vite('resources/js/app.js')
</head>

<body>
  <header class="mb-5">
    <div class="container">
      <h1>Treni che ancora devono partire</h1>
    </div>
  </header>
  
  <main>
    <div class="container">
      
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Compagnia</th>
            <th scope="col">Stazione di partenza</th>
            <th scope="col">Stazione di arrivo</th>
            <th scope="col">Data di partenza</th>
            <th scope="col">Data di arrivo</th>
            <th scope="col">Orario di partenza</th>
            <th scope="col">Orario di arrivo</th>
            <th scope="col">Codice treno</th>
            <th scope="col">Numero di carrozze</th>
            <th scope="col">Ritardo</th>
            <th scope="col">Cancellato</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($trains as $train)
            <tr>
              <td>{{ $train->company }}</td>
              <td>{{ $train->departure_station }}</td>
              <td>{{ $train->arrival_station }}</td>
              <td>{{ $train->departure_date }}</td>
              <td>{{ $train->arrival_date }}</td>
              <td>{{ $train->departure_time }}</td>
              <td>{{ $train->arrival_time }}</td>
              <td>{{ $train->train_code }}</td>
              <td>{{ $train->number_of_carriage }}</td>
              <td>{{ $train->in_time ? 'no' : 'si' }}</td>
              <td>{{ !$train->deleted ? 'no' : 'si' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>

</body>