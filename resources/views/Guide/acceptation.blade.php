@extends('layouts.Guide')
@section('title')
Reservation management
@endsection
@section('main')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Users Reservation</h1>
        </div>
    </div>
{{-- @dd($tripReserves) --}}

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Last reservations</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Trip </th>
                        <th>Reservation Date</th>
                        <th class="justify-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tripReserves as $trip)
                    <tr>
                        <td>
                            <p>{{$trip->client->user->Name}}</p>
                        </td>
                        <td>{{$trip->voyage->title}}</td>
                        <td>{{$trip->created_at->format('d-M-Y')}}</td>
                        <td class="flex">
                            <form action="{{ route('guide.accepterReservation', $trip->id) }}" method="POST" >
                                @method('patch')
                                @csrf
                                <input type="hidden" name="status" value=1>
                                <button type="submit" class="mr-4">
                                    <span class="status process">Accept</span>
                                </button>
                            </form>
                              <form action="{{ route('guide.delete', $trip->id) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit"><span class="status red" >Delete</span>
                                </button>
                              </form>                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</main>
@endsection
