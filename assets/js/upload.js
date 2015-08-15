$('#fileupload')
		.fileupload(
				{
					url : site_url + "upload/do_upload/" + product_id + "/" + image_id,
					dataType : 'json',
					acceptFileTypes : /(\.|\/)(gif|jpe?g|png)$/i,
					maxFileSize : 999000,
					// Enable image resizing, except for Android and Opera,
					// which actually support image resizing, but fail to
					// send Blob objects via XHR requests:
					disableImageResize : /Android(?!.*Chrome)|Opera/
							.test(window.navigator.userAgent),
					previewMaxWidth : 200,
					previewMaxHeight : 200,
					previewCrop : true
				})
		.on('fileuploadadd', function(e, data) {
			data.context = $('<div/>').appendTo('#files');
			$.each(data.files, function(index, file) {
				var node = $('<p/>').append($('<span/>').text(file.name));
				if (!index) {
					node.append('<br>');
				}
				node.appendTo(data.context);
			});
		})
		.on(
				'fileuploadprocessalways',
				function(e, data) {
					var index = data.index, file = data.files[index], node = $(data.context
							.children()[index]);
					if (file.preview) {
						node.prepend('<br>').prepend(file.preview);
					}
					if (file.error) {
						node.append('<br>').append(
								$('<span class="text-danger"/>').text(
										file.error));
					}
					if (index + 1 === data.files.length) {
						data.context.find('button').text('Upload').prop(
								'disabled', !!data.files.error);
					}
				}).on('fileuploadprogressall', function(e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#progress .progress-bar').css('width', progress + '%');
		}).on(
				'fileuploaddone',
				function(e, data) {
					$.each(data.result.files, function(index, file) {
						if (file.url_upload) {
							var link = $('<a>').attr('target', '_blank').prop(
									'href', file.url_upload);
							$(data.context.children()[index]).wrap(link);
						} else if (file.error) {
							var error = $('<span class="text-danger"/>').text(
									file.error);
							$(data.context.children()[index]).append('<br>')
									.append(error);
						}
					});
				}).on(
				'fileuploadfail',
				function(e, data) {
					$.each(data.files, function(index) {
						var error = $('<span class="text-danger"/>').text(
								'File upload failed.');
						$(data.context.children()[index]).append('<br>')
								.append(error);
					});
				}).prop('disabled', !$.support.fileInput).parent().addClass(
				$.support.fileInput ? undefined : 'disabled');