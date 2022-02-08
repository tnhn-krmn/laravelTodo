<x-app-layout>

    <div class="container p-3">
        @if(\Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ \Session::get('message')  }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Task Update
            </div>

            <div class="card-body">
                <form action="{{ url('/todolist/taskUpdate')  }}">
                    @csrf
                    <div class="input-group mt-3">
                        <input type="hidden" name="id" value="{{$id}}">
                        <input id="txtTaskName" name="content" type="text" class="form-control"  aria-describedby="btnAddNewTask">
                        <div class="input-group-append">
                            <button value="submit" class="btn btn-success" >Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
