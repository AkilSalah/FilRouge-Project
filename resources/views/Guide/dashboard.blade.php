@extends('layouts.Guide')
@section('title')
Dashboard
@endsection
@section('main')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Trips Reservation</h1>
        </div>
    </div>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>My trips</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Trip title</th>
                        <th>Trip Date</th>
                        <th>Seats available</th>
                        <th>Reserved seats</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trips as $trip)
                    <tr>
                        <td>
                            <img src="{{ asset($trip->image) }} ">
                            <p>{{$trip->title}}</p>
                        </td>
                        <td>{{$trip->date}}</td>
                        <td>{{$trip->nbPlaces}}</td>
                        <td><span class="status completed">{{$trip->reservation_count}} </span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</main>
@endsection
