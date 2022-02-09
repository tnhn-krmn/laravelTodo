<x-app-layout>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container p-3">
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Tasks</th>
                <th>Users</th>
                <th></th>
                <th>Transactions</th>
            </tr>
            </thead>
            <tbody>


            @foreach($task as  $tasks)
                <tr>
                    <th scope="row"></th>
                    <td>{{ $tasks->content  }} </td>
                    @foreach($user as $users)
                        @php
                            $id = $users->id;
                            $name = $users->name;
                        @endphp
                        <td>@if($id == $tasks->user_id) {{$name}}@endif</td>
                    @endforeach
                    <td>
                        <a  href="{{ url('/todolist/edit',$tasks->id) }}" class="btn btn-warning" >Edit</a>
                        <a  href="{{ url('/todolist/delete',$tasks->id) }}" class="btn btn-success">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span>{{ $task->links() }}</span>
    </div>
</x-app-layout>
