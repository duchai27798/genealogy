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
                    <input type="file" class="d-none" id="input-file" multiple>
                    <label class="btn btn-success" for="input-file">Add Asset</label>
                </form>
                <div id="preview-img" class="d-flex justify-content-around flex-wrap"></div>
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
    let fileList = [];

    $('#open-modal-upload').click(function () {
        clearInputUpload();
    });

    /* After select files then validate file */
    $('#input-file').change(function (e) {
        let validateSuccess = true;

        if (_.get(e, 'target.files')) {
            if (e.target.files.length + fileList.length > 5) {
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
                _.forEach(_.get(e, 'target.files'), file => {
                    file.filename = `${Date.now()}-${file['name']}`;
                    fileList.push(file)
                });
                renderPreview(fileList);
            }
        }
    });

    function renderPreview(files) {
        const previewImg = $('#preview-img');
        previewImg.empty();

        _.forEach(files, item => {
            const container = document.createElement('div');
            const btnRemove = document.createElement('div');
            const icon = document.createElement('i');
            const img = document.createElement('img');

            container.classList = 'preview-img-item mt-3';
            btnRemove.classList = 'btn-remove';
            icon.classList = 'far fa-trash-alt size-36 text-danger';

            btnRemove.onclick = () => removeItemImgPreview(item['filename']);

            const reader = new FileReader();

            reader.onload = function(e) {
                img.src = e.target.result;
                img.classList = 'w-100'
            }

            reader.readAsDataURL(item);

            container.append(img);
            btnRemove.append(icon);
            container.append(btnRemove);
            previewImg.append(container);
        });
    }

    function removeItemImgPreview(filename) {
        fileList = _.filter(fileList, file => file['filename'] !== filename);
        renderPreview(fileList);
    }

    $('#form-upload-img').submit(function (e) {
        e.preventDefault();

        const data = $(this).serializeArray();

        const formData = new FormData();

        _.forEach(fileList, (file, key) => {
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
                if (res) {
                    clearInputUpload();
                    $('#modal-upload-file').modal('hide');
                }
            }
        })
    })

    function clearInputUpload() {
        fileList = [];
        $('#input-file').val('');
        $('#preview-img').empty();
    }
</script>
