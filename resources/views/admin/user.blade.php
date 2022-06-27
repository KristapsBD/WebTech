<div class="container-fluid page-body-wrapper mt-5">
    <div class="container" align="center">

        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()-> get('message') }}
            <button type="button" class="close float-end" data-bs-dismiss="alert">X</button>
        </div>
        @endif

        <table class="table table-dark table-bordered text-white">
            <tr class="text-white">
                <th class="p-3 bg-black">Customer name</th>
                <th class="p-3 bg-black">Email</th>
                <th class="p-3 bg-black">Phone</th>
                <th class="p-3 bg-black">Address</th>
                <th class="p-3 bg-black">Usertype</th>
                <th class="p-3 bg-black">Action</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->usertype == 0 ? 'User' : 'Admin'}}</td>
                <td class="w-10">
                    <a class="btn btn-primary" href="{{ url('promote', $user->id) }}">Promote</a>
                    <a class="btn btn-danger" href="{{ url('deleteuser', $user->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
