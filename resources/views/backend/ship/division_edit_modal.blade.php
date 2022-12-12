<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal{{$item->id}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Update Shipping Division</h4>
            </div>
            <div class="modal-body">

                <form role="form" action="{{ route('division.edit', $item->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Shipping division</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" name="division_name" value="{{$item->division_name}}" placeholder="Enter shipping Division">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>