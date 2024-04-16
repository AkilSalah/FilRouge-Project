@extends('layouts.Admin')
@section('title')
Dashboard
@endsection
@section('main')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
        </div>
    </div>

    <ul class="box-info">
        <li>
            <i class='bx bxs-cart'></i> 
            <span class="text">
                <h3>{{$products}}</h3>
                <p>Total products</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-tag'></i> 
            <span class="text">
                <h3>{{$category}}</h3>
                <p>Categories</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-basket'></i> 
            <span class="text">
                <h3>{{$voyage}}</h3>
                <p>Voyages</p>
            </span>
        </li>
    </ul>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Orders</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Role</th>
                        <th class="pl-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>
                            <p>{{$user->Name}}</p>
                        </td>
                        <td>{{$user->role}}</td>
                        <td >
                            <span class="status @if($user->status === 'Unblocked') completed  @else pending @endif">
                                {{$user->status}}
                            </span>
                        </td>
                                            </tr>   
                    @endforeach
                   
                   
                </tbody>
            </table>
        </div>
        
    </div>
</main>
@endsection
