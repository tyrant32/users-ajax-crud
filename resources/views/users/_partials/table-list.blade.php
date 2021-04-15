<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-users" aria-hidden="true"></i>&nbsp;Users List

        <div class="pull-right">
            Total Users: <strong>{{ $users->total() }}</strong>
            Showing: <strong>{{ $users->count() }}</strong>
        </div>
    </div>

    <div class="panel-body">

        <div class="table-responsive">
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr id="user-{{ $user->id }}">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">{{$users->links()}}</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>