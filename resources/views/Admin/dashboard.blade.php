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
                <h3>Recent Users</h3>
               
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
                            <form action="{{ route('blockAccess', $user->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <button type="submit">
                                 <span class="status @if($user->status === 'Unblocked') completed  @else pending @endif">
                                {{$user->status}}
                            </span>   
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

<script>
    function blockUser(userId) {
        var formId = '#blockForm' + userId;
        var statusId = '#status' + userId;

        $.ajax({
            url: $(formId).attr('action'),
            type: 'PATCH',
            data: $(formId).serialize(),
            success: function(response) {
                if (response.status === 'Blocked') {
                    $(statusId).removeClass('pending').addClass('completed').text('Blocked');
                } else {
                    $(statusId).removeClass('completed').addClass('pending').text('Unblocked');
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                // Gérer l'erreur ici
            }
        });
    }
</script>
