<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Add State Division</h4>
            </div>
            <div class="modal-body">

                <form role="form" action="{{ route('state.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Shipping State</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" name="state_name" placeholder="Enter shipping state">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Shipping division</label>
                        <select class="form-control m-bot15" name="division_id">
                            <option value="0" selected readonly>-- Select Division --</option>
                            @foreach($shipdivision as $division)
                            <option value="{{$division->id}}">{{$division->division_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Shipping District</label>
                        <select class="form-control m-bot15" name="district_id">
                            <option value="0" selected readonly>-- Select District --</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/shipping/district/') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        })
                    }
                })
            }
        });
    });
</script>