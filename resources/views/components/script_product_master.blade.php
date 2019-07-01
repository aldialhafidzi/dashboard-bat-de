<script>

          function editProductForm(id){
            save_method = 'edit';
            jQuery('input[name = _method]').val('PATCH');
            jQuery('#modal_product_MasterLabel').text('Edit Product');
            jQuery('#submit_product_master').val('Update Data');
            jQuery('#form_product_master')[0].reset();
            jQuery.ajax({
              url : "{{ url('product') }}" + '/' + id + "/edit",
              type : "GET",
              dataType : "JSON",
              success : function(data){
                console.log(data);
                
                jQuery('#pid').val(data.pid);
                jQuery('#form_product_master').find('#p_name').val(data.p_name);
                jQuery('#form_product_master').find('#p_desc').val(data.p_desc);
                jQuery('#form_product_master').find('#price').val(data.price);
                jQuery('#form_product_master').find('#is_bat').val(data.is_bat);
                jQuery('#form_product_master').find('#bid').val(data.brand.bid);
                jQuery('#modal_product_Master').modal('show');
              }
            });
          }

        
          function deleteProductForm(id){
            url_hapus_data = 'product';
            jQuery('#hapus_product_master').val(id);
            jQuery('input[name = _method]').val('DELETE');
            jQuery('#modal_hapus_product_master').modal('show');
          }

          function tambahProductForm(){
            save_method = 'add';
            jQuery('input[name = _method]').val('POST');
            jQuery('#modal_product_MasterLabel').text('Tambah Data Product');
            jQuery('#submit_product_master').val('Tambah Data');
            jQuery('#form_product_master')[0].reset();
            jQuery('#modal_product_Master').modal('show');
          }


        (function($) {
            // "use strict";

          $('document').ready(function(){

            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
            
            var table_product_master = jQuery('#table_product_master').DataTable({
              processing:true,
              serverSide:false,
              order : [[ 0, "asc" ]],
              ajax: "{{ route('getAllProduct') }}",
              columns: [
                {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'p_name', name :'p_name'},
                {data:'p_desc', name :'p_desc'},
                {data:'price', name :'price'},
                {data:'action', name :'action', orderable:false, searchable:false}
              ],
              columnDefs: [
                { className: 'text-center', targets: [0, 4] },
                { render: jQuery.fn.dataTable.render.number(".", ".", 0, 'Rp. '),  targets: [3] }
              ],
              // dom: 'lBfrtip',
            });

        

            jQuery('#form_product_master').submit(function (event) {
              event.preventDefault();
              if (jQuery('#form_product_master')[0].checkValidity() === false) {
                  event.stopPropagation();
              } else {
                var id = jQuery('#form_product_master').find('#pid').val();

                if (save_method == 'add') url = "{{ url('product') }}";
                else url = "{{ url('product') . '/' }}" + id;
                jQuery.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData(jQuery('#form_product_master')[0]),
                  contentType : false,
                  processData : false,
                  success : function(data){
                    jQuery('#modal_product_Master').modal('hide');
                    table_product_master.ajax.reload();
                    jQuery.notify(" "+data.message,
                      {
                        align:"right", verticalAlign:"bottom",
                        close: true, delay:3000,
                        color: "#fff", background: "#41a845",
                        icon:"check"
                      });
                  },
                  error : function(data){
                    jQuery.notify("  Data gagal ditambahkan !",
                      {
                        align:"right", verticalAlign:"bottom",
                        close: true, delay:3000,
                        color: "#fff", background: "#c3383f",
                        icon:"close"
                      });
                  }

                });
              }
              jQuery('#form_product_master').addClass('was-validated');
            });


            $('#form_hapus_data_product').submit(function(event) {
            event.preventDefault();
            var id = $('#hapus_product_master').val();
            url = '{{ url('product') }}' + '/' + id;
            $.ajax({
              url : url,
              type : "POST",
              data : new FormData($('#form_hapus_data_product')[0]),
              contentType : false,
              processData : false,
              success : function(data){

                $('#modal_hapus_product_master').modal('hide');

                  table_product_master.ajax.reload();
                

                  $.notify(" "+data.message,
                    {
                      align:"right", verticalAlign:"bottom",
                      close: true, delay:3000,
                      color: "#fff", background: "#41a845",
                      icon:"check"
                    });
              },
              error : function(data){
                  $.notify("  Data gagal dihapus !",
                    {
                      align:"right", verticalAlign:"bottom",
                      close: true, delay:3000,
                      color: "#fff", background: "#c3383f",
                      icon:"close"
                    });
              }
            });
          });

            

            
          });


          


        })(jQuery);
</script>