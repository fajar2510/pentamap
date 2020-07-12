$(document).on('click', '#btn-edit', function () {
	$('.modal-body #id-user').val($(this).data('id'));
	$('.modal-body #name').val($(this).data('name'));
	$('.modal-body #email').val($(this).data('email'));
})

$(document).on('click', '#btn-hapus', function () {
	var id = $(this).data('id');
	var email = $(this).data('email');
	console.log(email);
	$('#modalHapus #iduser').val(id);
	$('.hapus').html('Hapus ' + email);

	$(document).on('click', '.hapus', function () {
		//alert(id);
		$.ajax({
			url: '/user/hapus/' + id,
			method: 'POST',
			success: function (data) {
				//alert('tes');
				$('#modalHapus').modal('hide');
				location.reload();
			}
		});
	});
})



// $(document).on('click', '#btn-hapus', function () {
//     var id = $(this).data('id');
//     var nama = $(this).data('nama');
//     console.log(nama);
//     $('#modalHapus #idsiswa').val(id);
//     $('.hapus').html('Hapus ' + nama);

//     $(document).on('click', '.hapus', function () {
//         //alert(id);
//         $.ajax({
//             url: '/siswa/hapus/' + id,
//             method: 'POST',
//             success: function (data) {
//                 //alert('tes');
//                 $('#modalHapus').modal('hide');
//                 location.reload();
//             }
//         });
//     });
// })
