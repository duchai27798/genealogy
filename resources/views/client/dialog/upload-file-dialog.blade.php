<!-- Modal -->
<div class="modal fade" id="modal-upload-file" tabindex="-1" role="dialog" aria-labelledby="modal-upload-file-tile" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('handle-upload-img') }}" id="form" method="post">
                    @csrf
                    <input type="file" name="files" class="form-control" id="input-file" multiple>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form">Upload</button>
            </div>
        </div>
    </div>
</div>
