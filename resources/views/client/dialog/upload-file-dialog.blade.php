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
                <form enctype="multipart/form-data" id="form-upload-img" method="post">
                    @csrf
                    <input type="file" name="collect-image" class="form-control" id="input-file" multiple>
                </form>
                <div id="preview-img"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form-upload-img">Upload</button>
            </div>
        </div>
    </div>
</div>

<script>
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

    $('#open-modal-upload').click(function () {
        clearInputUpload();
    });

    /* After select files then validate file */
    $('#input-file').change(function (e) {
        let validateSuccess = true;

        if (_.get(e, 'target.files')) {
            if (e.target.files.length > 5) {
                alert('Upload maximum 5 file');
                clearInputUpload();
            }

            _.forEach(_.get(e, 'target.files'), item => {
                if (_.get(item, 'size') > 1024 * 1024) {
                    alert('File can\'t greater than 1Mb');
                    clearInputUpload();
                    validateSuccess = false;
                    return false;
                }

                if (!validImageTypes.includes(_.get(item, 'type'))) {
                    alert('Only Upload Image file');
                    clearInputUpload();
                    validateSuccess = false;
                    return false;
                }
            });

            if (validateSuccess) {
                const previewImg = $('#preview-img');
                previewImg.empty();

                _.forEach(_.get(e, 'target.files'), item => {
                    const img = document.createElement("img");

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        img.src = e.target.result;
                        img.classList = 'w-50'
                    }

                    reader.readAsDataURL(item);

                    previewImg.append(img);
                });
            }
        }
    });

    $('#form-upload-img').submit(function (e) {
        e.preventDefault();

        const data = $(this).serializeArray();

        const fileData = $('#input-file').prop('files');

        const formData = new FormData();

        _.forEach(fileData, (file, key) => {
            formData.append(`file-${key}`, file);
        });

        formData.append('_token', data[0]['value']);

        $.ajax({
            url: '{{ route('ajax.handle-upload-img') }}',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                console.log(res)
                if (res) {
                    $('#modal-upload-file').modal('hide');
                }
            }
        })
    })

    function clearInputUpload() {
        $('#input-file').val('');
    }
</script>
