@extends('admin.admin')

@section('content-list')
    <div class="container">
        <a href="{{ route($create) }}">
            <button type="button"  class="btn btn-info col-md-offset-11">Add new</button>
        </a>
    <table class="table table-bordered">
        <thead>
        <tr>
            @foreach($list[0] as $key => $item  )
            <th>{{$key}}</th>
            @endforeach
            <th>delete</th>
            <th>edit</th>
            <th>view</th>

        </tr>




                @foreach($list as $key => $record  )
                    <tr>
                    @foreach($record as $key => $value)
                    <td>
                    {{$value}}
                    </td>
                    @endforeach
                        <td>
                            <button onclick="deleteItem('{{ route($delete, $record['id']) }}')" class="btn btn-danger">Delete</button>
                        </td>

                        <td>
                            <a href="{{ route($edit, $record['id']) }}">
                                <button type="button"  class="btn btn-primary">Edit</button>
                            </a>
                        </td>


                        <td>
                            <a href="{{ route($show, $record['id']) }}">
                            <button type="button"  class="btn btn-success">View</button>
                            </a>
                        </td>
                    </tr>

                @endforeach


        </thead>

    </table>

    </div>


@endsection

@section('scripts')
    <script >

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteItem(route)
        {
            $.ajax({
                url : route,
                type :'DELETE',
                //data : {},
                dataType : 'json',
                success : function () {
                    alert('DELETED');
                },
                error : function(){
                    alert('ERROR');
                }
            });
        }
    </script>
@endsection