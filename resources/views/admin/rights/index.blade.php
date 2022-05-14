@extends('admin.layouts.app')

@section('title')

Permission Index

@endsection
<style>
    .alert-custom{
  background-color:#7fad39;
  color:#fff;
}
</style>


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">


                <div class="card-header">
                    <h3>Permissions Listing</h3>
                    @if(session()->has('message'))
                    <div class="alert alert-custom">{{session()->get('message')}}</div>
                 @elseif(session()->has('error'))
                    <div class="alert alert-danger">{{session()->get('error')}} </div>
                @endif
                {{-- @can('permissions.add') --}}
                <a href="{{ route('rights.create')}}" class="btn btn-primary ">Add new Permission</a>
                {{-- @endcan --}}
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="rights-table" class="table table-striped table-bordered">
                            <thead style="text-decoration: none;">
                                <tr style="font-size: 16px;font-weight:bold;">
                                    <td>
                                        S.N.
                                    </td>
                                    <td>
                                        Permission Name
                                    </td>

                                    <td >
                                        Actions
                                    </td>

                                </tr>

                            </thead>
                            @php $counter=1; @endphp
                            @foreach($permissions as $permission)
                            <tbody>
                                <td>
                                    {{$counter}}
                                </td>
                                <td>
                                    {{$permission->name}}
                                </td>
                                <td>


                                    <form method="POST" action="{{ route('rights.delete', $permission->id)}}">
                                        @csrf
                                        <a href="{{ route('rights.edit', $permission->id)}}" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>&nbsp;
                                        <input name="_method" type="hidden" value="POST">
                                        <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'> <i class="fa fa-trash"> </i></button>
                                    </form>
                                </td>
                            </tbody>
                            @php $counter++; @endphp
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this Permission?')) {
            e.preventDefault();
        }
    });
</script>
@endsection
