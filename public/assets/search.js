$(document).ready(function() {
    $('#search-product').keydown(function(e) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url     : "http://localhost:8000/member/listproduk/api/search-product",
            type    : "POST",
            data    : {
                        'keyword' : $(this).val()
            },
            success : function(response) {
                console.log(response);

                $theme = "";

                $.each(response, function(key, val) {
                $theme += "<div class='col-md-3 w3ls_w3l_banner_left'>" + 
                                "<div class='hover14 column'>" +
                                    "<div class='agile_top_brand_left_grid w3l_agile_top_brand_left_grid'>" +
                                        "<div class='agile_top_brand_left_grid1'>" +
                                            "<figure>" +
                                                "<div class='snipcart-item block'>" +
                                                "<div class='snipcart-thumb'>" +
                                                "</div>" +
                                                "<div class='snipcart-details'>" +
                                                    "<img src='" + val.foto + "'>" +
                                                    "<h3>" + val.nama_produk + "</h3>" +
                                                    "<p><span class='badge badge-warning'>" + val.kategori + "</span></p>" +
                                                    "<p><span class='badge badge-danger'>Stok" + val.stok+ "</span></p>" +
                                                    "<p><span class='badge badge-default'>Rp." + val.harga + ",00</span</p>" +
                                                    "<a href='/member/cart?produkId=" + val.id_produk + "' class='btn btn-success'>Beli</a>" +
                                                "</div>" +
                                                "</div>" +
                                            "</figure>" +
                                        "</div>" +
                                    "</div>" +
                                "<br/>" +
                                "</div>" +
                            "</div>"
                });
                $('#list-produk').html(
                    $theme
                );
            }
        });
    });
});