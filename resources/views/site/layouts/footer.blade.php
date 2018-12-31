<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <form  id="myForm"  action="/add" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">introduction:</label>
                        <textarea class="form-control" id="introduction" name="introduction"></textarea>
                        <span class="text-danger">
                                <strong id="introduction-error"></strong>
                            </span>
                    </div>
                            <hr>
                    <div  class="form-group">
                        <label for="message-text" class="col-form-label">category:</label>
                        <select name="category_id" id="category_id">

                        </select>
                    </div>
                            <hr>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">photo:</label>
                        <input  type="file" class="form-control" id="photo" name="photo">
                        <span class="text-danger">
                                <strong id="photo-error"></strong>
                            </span>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">price:</label>
                        <input  type="number" class="form-control" id="price" name="price">
                        <span class="text-danger">
                                <strong id="price-error"></strong>
                            </span>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">remain_count:</label>
                        <input  type="number" class="form-control" id="remain_count" name="remain_count">
                        <span class="text-danger">
                                <strong id="remain_count-error"></strong>
                            </span>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn-save" class="btn btn-primary">add Product</button>
                        <input id="product_id" type="hidden" value="0">
                    </div>

                </form>
            </div>

        </div>

    </div>
</div>
<meta name="_token" content="{!! csrf_token() !!}" />
<script src="{{asset('js/ajax.js')}}?date={{date('Y-m-d H:i:s')}}"></script>