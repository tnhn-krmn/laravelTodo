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
        @if(\Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ \Session::get('message')  }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                New Task
            </div>
            <div class="card-body">
                <form action="{{ url('/todolist/create') }}">
                    @csrf
                    <div class="input-group mt-3">
                        <input id="txtTaskName" name="content" type="text" class="form-control" placeholder="Type a new task" aria-describedby="btnAddNewTask">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
            <table class="table table-striped">
                <thead>
                <tr>
                  <th></th>
                  <th>Tasks</th>
                  <th>Transactions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($task as  $tasks)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $tasks->content  }}</td>
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
