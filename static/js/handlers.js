function fileQueueError(file, errorCode, message) {
	try {
		alert('upload error!');

	} catch (ex) {
		this.debug(ex);
	}

}

function fileDialogComplete(numFilesSelected, numFilesQueued) {
	try {
		if (numFilesQueued > 0) {
			this.startUpload();
		}
	} catch (ex) {
		this.debug(ex);
	}
}

function uploadProgress(file, bytesLoaded) {

	try {
        //
	} catch (ex) {
		this.debug(ex);
	}
}

function uploadSuccess(file, serverData) {
	try {
        $('.uploadfile').append('<span onclick="insertImageToEditor(\'' + serverData + '\')">点击插入' + file.name + '</span><br />')
	} catch (ex) {
		this.debug(ex);
	}
}

function uploadComplete(file) {
	try {
        if (this.getStats().files_queued === 0) {
            alert('上传完成!');
        } else {
            this.startUpload();
        }
	} catch (ex) {
		this.debug(ex);
	}
}

function uploadError(file, errorCode, message) {
	try {
        alert('upload error');
	} catch (ex3) {
		this.debug(ex3);
	}

}
