<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal{{$item->id}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Update Shipping District</h4>
            </div>
            <div class="modal-body">

                <form role="form" action="{{ route('district.edit', $item->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Shipping District</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" name="district_name" value="{{$item->district_name}}" placeholder="Enter shipping Division">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Shipping division</label>
                        <select class="form-control m-bot15" name="division_id">
                            <option value="0" selected readonly>-- Select Division --</option>
                            @foreach($shipdivision as $division)
                            <option value="{{$division->id}}" @if($division->id == $item->division_id) selected @endif>{{$division->division_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>