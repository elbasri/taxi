@extends('admin.layout.base')

@section('title', 'Promocodes ')

@section('content')

    <div class="content-area py-1">
        <div class="container-fluid">
            
            <div class="box box-block bg-white">
                <h5 class="mb-1"><i class="ti-bookmark-alt"></i>&nbsp;Promocodes</h5><hr>
                <a href="{{ route('admin.promocode.create') }}" style="margin-left: 1em;" class="btn shadow-box btn-success btn-rounded pull-right"><i class="fa fa-plus"></i> Add New Promocode</a>

                <table class="table table-striped table-bordered dataTable" id="table-2" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Promocode </th>
                            <th>Discount </th>
                            <th>Expiration</th>
                            <th>Status</th>
                            <th>Used Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($promocodes as $index => $promo)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$promo->promo_code}}</td>
                            <td>{{$promo->discount}}</td>
                            <td>
                                {{date('d-m-Y',strtotime($promo->expiration))}}
                            </td>
                            <td>
                                @if(date("Y-m-d") <= $promo->expiration)
                                    <span class="tag tag-success">Valid</span>
                                @else
                                    <span class="tag tag-danger">Expiration</span>
                                @endif
                            </td>
                            <td>
                                {{promo_used_count($promo->id)}}
                            </td>
                            <td>
                                <form action="{{ route('admin.promocode.destroy', $promo->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ route('admin.promocode.edit', $promo->id) }}" class="btn shadow-box btn-success"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger shadow-box" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Promocode </th>
                            <th>Discount </th>
                            <th>Expiration</th>
                            <th>Status</th>
                            <th>Used Count</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>
    </div>
@endsection