<script>

            function editLocationForm(id){
              console.log(id);
              
              save_method = 'edit';
              jQuery('input[name = _method]').val('PATCH');
              jQuery('#modal_location_MasterLabel').text('Edit Data Location');
              jQuery('#submit_location_master').val('Update Data');
              jQuery('#form_location_master')[0].reset();
              jQuery.ajax({
                url : "{{ url('location') }}" + '/' + id + "/edit",
                type : "GET",
                dataType : "JSON",
                success : function(data){
                  jQuery('#form_location_master').find('#province').val(data.province);
                  jQuery('#form_location_master').find('#regency').val(data.regency);
                  jQuery('#form_location_master').find('#district').val(data.district);
                  jQuery('#form_location_master').find('#village').val(data.village);

                  jQuery('#form_location_master').find('#id_province').val(data.id_province);
                  jQuery('#form_location_master').find('#id_regency').val(data.id_regency);
                  jQuery('#form_location_master').find('#id_district').val(data.id_district);
                  jQuery('#form_location_master').find('#id_village').val(data.id_village);
                  
                  jQuery('#modal_location_Master').modal('show');
                }
              });
            }

            function deleteLocationForm(id){
              url_hapus_data = 'location';
              jQuery('#hapus_location_master').val(id);
              jQuery('input[name = _method]').val('DELETE');
              jQuery('#modal_hapus_locationMaster').modal('show');
            }

            function tambahLocationForm(){
              save_method = 'add';
              jQuery('input[name = _method]').val('POST');
              jQuery('#modal_location_MasterLabel').text('Add New Location');
              jQuery('#submit_location_master').val('Submit');
              jQuery('#form_location_master')[0].reset();
              jQuery('#modal_location_Master').modal('show');
            }

        (function($) {
            // "use strict";

            jQuery(document).ready(function(){
            
              var table_location = jQuery('#table_location').DataTable({
                processing:true,
                serverSide:true,
                order : [[ 0, "asc" ]],
                ajax: "{{ route('getAllLocation') }}",
                columns: [
                  {data:'DT_RowIndex', name:'id_province'},
                  {data:'province', name :'province'},
                  {data:'regency', name :'regency'},
                  {data:'district', name :'district'},
                  {data:'village', name :'village'},
                  {data:'action', name :'action', orderable:false, searchable:false}
                ],
                columnDefs: [
                  { className: 'text-center', targets: [0, 5] },
                ],
                // dom: 'lBfrtip',
              });



              jQuery('#switch_edit_location').click(function () {
                var data = jQuery(this).attr('checked');
                
                if (data == 'checked') {
                  jQuery('#province').removeAttr('disabled');
                  jQuery('#regency').removeAttr('disabled');
                  jQuery('#district').removeAttr('disabled');
                  jQuery('#village').removeAttr('disabled');
                  jQuery('#id_province').removeAttr('disabled');
                  jQuery('#id_regency').removeAttr('disabled');
                  jQuery('#id_district').removeAttr('disabled');
                  jQuery('#id_village').removeAttr('disabled');
                  jQuery(this).removeAttr('checked');
                }
                else{
                  jQuery('#province').attr('disabled','disabled');
                  jQuery('#regency').attr('disabled','disabled');
                  jQuery('#district').attr('disabled','disabled');
                  jQuery('#village').attr('disabled','disabled');
                  jQuery('#id_province').attr('disabled','disabled');
                  jQuery('#id_regency').attr('disabled','disabled');
                  jQuery('#id_district').attr('disabled','disabled');
                  jQuery('#id_village').attr('disabled','disabled');
                 jQuery(this).attr('checked', 'checked');
                }
              });

              jQuery('#form_location_master').submit(function (event) {
                event.preventDefault();
                if (jQuery('#form_location_master')[0].checkValidity() === false) {
                    event.stopPropagation();
                } else {
                  var id = jQuery('#id_village').val();
                  console.log(save_method);
                  console.log(id);
                  
                  
                  if (save_method == 'add') url = "{{ url('location') }}";
                  else url = "{{ url('location') . '/' }}" + id;

                  jQuery.ajax({
                    url : url,
                    type : "POST",
                    data : new FormData(jQuery('#form_location_master')[0]),
                    contentType : false,
                    processData : false,
                    success : function(data){

                      jQuery('#modal_location_Master').modal('hide');
                      table_location.ajax.reload();
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
                jQuery('#form_location_master').addClass('was-validated');
              });

              $('#form_hapus_data_location').submit(function(event) {
                event.preventDefault();
                var id = $('#hapus_location_master').val();
                url = '{{ url('location') }}' + '/' + id;
                $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#form_hapus_data_location')[0]),
                  contentType : false,
                  processData : false,
                  success : function(data){

                    $('#modal_hapus_locationMaster').modal('hide');

                      table_location.ajax.reload();
                    

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


            // VIEW CHART!!!!

     




        })(jQuery);
</script>
