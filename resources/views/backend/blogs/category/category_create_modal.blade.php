<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Add Blog Category</h4>
            </div>
            <div class="modal-body">

                <form role="form" action="{{ route('blog.category.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Blog Category (Eng)</label>
                        <input type="text" class="form-control" name="blog_category_name_en" placeholder="Enter Blog Category Eng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Blog Category (Nep)</label>
                        <input type="text" class="form-control" name="blog_category_name_nep" placeholder="Enter Blog Category Nep">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>