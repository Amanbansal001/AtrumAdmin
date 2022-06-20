<div class="card">
    <div class="card-header row">
        <div class="col-md-11">
            <h3 class="card-title"><?php echo $dtTagLine; ?></h3>
        </div>
        <?php if($isTblAdd){ ?>
        <div class="col-md-1">
            <a href="detail.php" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
        </div>
        <?php } ?>

        <?php if($updateShippingAmount){ ?>
            <div class="col-md-1">
                <button onclick='updateShipping()' class='btn btn-outline-primary btn-block'>Save Shipping</button>
            </div>
        <?php } ?>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="dataTableEl" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?php foreach($columnsFace as $col){ ?>
                        <th><?php echo $col; ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
            <tfoot>
                <tr>
                    <?php foreach($columnsFace as $col){ ?>
                        <th><?php echo $col; ?></th>
                    <?php } ?>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<script>
    function loadDt() {
        $("#dataTableEl").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
           // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
           buttons: [
            {
                extend: 'copy',
                title: '<?php echo $heading ?>'
            },
            {
                extend: 'csv',
                title: '<?php echo $heading ?>'
            },
            {
                extend: 'excel',
                title: '<?php echo $heading ?>'
            },
            {
                extend: 'print',
                title: '<?php echo $heading ?>'
            },
            {
                extend: 'colvis',
            }
            ]
        }).buttons().container().appendTo('#dataTableEl_wrapper .col-md-6:eq(0)');
        
    }

    var tableData;

    function makeDt(res){
        
        var html = "";
        var cols = <?php echo json_encode($columns); ?>;
        var columnsImg= "<?php echo $columnsImg;?>";
        var actionDel= "<?php echo $actionDel;?>";
        var tblId= "<?php echo $tblId;?>";
        var updateShippingAmount= "<?php echo $updateShippingAmount;?>";
        
        tableData = res.data.fetch;

        res.data.fetch.current.forEach((el,idx1)=>{
            el.auction.forEach((e,idx)=>{
            html +='<tr>'
            cols.forEach(col=>{
                if(col=="id" && tblId==""){
                    html +="<td><a href='detail.php?id="+_.get(e, col)+"'/>"+_.get(e, col)+"</td>"
                }else if(col=="id" && tblId!=""){
                    html +="<td><a href='detail.php?id="+_.get(e, tblId)+"'/>"+_.get(e, col)+"</td>"
                }else if(col=="url"){
                    html +="<td><a target='_blank' href='"+API_URL+"uploads?file="+_.get(e, col)+"'/>Link</td>"
                }else if(col=="replyTo"){
                    html +="<td><a href='mailTo:"+_.get(e, "from")+"?subject=Reply::"+_.get(e, "category")+"&body'/>Reply</td>"
                }else if(actionDel=="1" && col=="action"){
                    html +="<td><a href='javascript:void(0);' onclick='__delete_call("+e.id+")'>Delete</a></td>";
                }else if(actionDel=="1" && col=="softaction"){
                    var status = _.get(e, "status");
                    if(status==1){
                        html +="<td><a href='javascript:void(0);' onclick='__status_call("+e.id+")'>Inactive</a></td>";
                    }else{
                        html +="<td><a href='javascript:void(0);' onclick='__status_active_call("+e.id+")'>Active</a></td>";
                    }
                }else if(col=="featured_art"){
                    html +="<td><a href='javascript:void(0);' onclick='_add_art_call("+e.id+")'>Add to Featured</a></td>";
                }else if(col=="featured_artist"){
                    html +="<td><a href='javascript:void(0);' onclick='_add_artist_call("+e.id+")'>Add to Featured</a></td>";
                }else if(col=="shippingAmount" && _.get(e, col)!="0"){
                    html +="<td>"+_.get(e, col)+"</td>"
                }else if(col=="deliveryDate"){
                    var toHide = (!_.get(e, col))?'':'hide';
                    html +="<td><input class='form-control deliveryDate "+toHide+"' onchange='updateDeliveryDate("+idx+")' type='date' value='"+_.get(e, col)+"' />";
                    html +=""+_.get(e, col,"")+"</td>"
                }else if(col=="pickUpDate"){
                    var toHide = (!_.get(e, col))?'':'hide';
                    html +="<td><input class='form-control pickUpDate "+toHide+"' onchange='updatePickupDate("+idx+")' type='date' value='"+_.get(e, col)+"' />";
                    html +=""+_.get(e, col,"")+"</td>"
                }else if(col=="shippingAmount" && _.get(e, col)=="0"){
                    html +="<td><div class='row'><div class='col-md-12'><input class='form-control shippingAmount' name='shippingAmount' type='number' placeholder='Enter No' value='"+_.get(e, "shippingAmount")+"'/>";
                    html +="</div>";
                    html +="</td>";
                }else if(col=="orderStatus"){
                    html +="<td><select class='form-control orderStatus' onchange='updateOrderStatus()'><option value='"+_.get(e, col)+"' selected disabled>"+_.get(e, col)+"</option><option value='Confirmed'>Confirmed</option></option><option value='Shipped'>Shipped</option><option value='Delivered'>Delivered</option></select></td>";
                }else if(col=="name"){
                    html +="<td>"+_.get(el, col)+"</td>"
                }else if(col=="startDate"){
                    html +="<td>"+(new Date(_.get(el, col, '')).toISOString().substr(0, 10)) +"</td>"
                }else if(col=="expiryDate"){
                    html +="<td>"+(new Date(_.get(el, col, '')).toISOString().substr(0, 10)) +"</td>"
                }else if(columnsImg.indexOf(col)==-1){
                    html +="<td>"+_.get(e, col)+"</td>"
                }else{
                    var url = _.get(e, col);
                    var vUrl = isValidHttpUrl(url);
                    url = (!vUrl)?url:url;
                    html +="<td><img width='50px' src='"+url+"'/></td>"
                }
            });
            });

            html +='</tr>'
            
        })

        res.data.fetch.upcoming.forEach((el,idx1)=>{
            el.auction.forEach((e,idx)=>{
            html +='<tr>'
            cols.forEach(col=>{
                if(col=="id" && tblId==""){
                    html +="<td><a href='detail.php?id="+_.get(e, col)+"'/>"+_.get(e, col)+"</td>"
                }else if(col=="id" && tblId!=""){
                    html +="<td><a href='detail.php?id="+_.get(e, tblId)+"'/>"+_.get(e, col)+"</td>"
                }else if(col=="url"){
                    html +="<td><a target='_blank' href='"+API_URL+"uploads?file="+_.get(e, col)+"'/>Link</td>"
                }else if(col=="replyTo"){
                    html +="<td><a href='mailTo:"+_.get(e, "from")+"?subject=Reply::"+_.get(e, "category")+"&body'/>Reply</td>"
                }else if(actionDel=="1" && col=="action"){
                    html +="<td><a href='javascript:void(0);' onclick='__delete_call("+e.id+")'>Delete</a></td>";
                }else if(actionDel=="1" && col=="softaction"){
                    var status = _.get(e, "status");
                    if(status==1){
                        html +="<td><a href='javascript:void(0);' onclick='__status_call("+e.id+")'>Inactive</a></td>";
                    }else{
                        html +="<td><a href='javascript:void(0);' onclick='__status_active_call("+e.id+")'>Active</a></td>";
                    }
                }else if(col=="featured_art"){
                    html +="<td><a href='javascript:void(0);' onclick='_add_art_call("+e.id+")'>Add to Featured</a></td>";
                }else if(col=="featured_artist"){
                    html +="<td><a href='javascript:void(0);' onclick='_add_artist_call("+e.id+")'>Add to Featured</a></td>";
                }else if(col=="shippingAmount" && _.get(e, col)!="0"){
                    html +="<td>"+_.get(e, col)+"</td>"
                }else if(col=="deliveryDate"){
                    var toHide = (!_.get(e, col))?'':'hide';
                    html +="<td><input class='form-control deliveryDate "+toHide+"' onchange='updateDeliveryDate("+idx+")' type='date' value='"+_.get(e, col)+"' />";
                    html +=""+_.get(e, col,"")+"</td>"
                }else if(col=="pickUpDate"){
                    var toHide = (!_.get(e, col))?'':'hide';
                    html +="<td><input class='form-control pickUpDate "+toHide+"' onchange='updatePickupDate("+idx+")' type='date' value='"+_.get(e, col)+"' />";
                    html +=""+_.get(e, col,"")+"</td>"
                }else if(col=="shippingAmount" && _.get(e, col)=="0"){
                    html +="<td><div class='row'><div class='col-md-12'><input class='form-control shippingAmount' name='shippingAmount' type='number' placeholder='Enter No' value='"+_.get(e, "shippingAmount")+"'/>";
                    html +="</div>";
                    html +="</td>";
                }else if(col=="orderStatus"){
                    html +="<td><select class='form-control orderStatus' onchange='updateOrderStatus()'><option value='"+_.get(e, col)+"' selected disabled>"+_.get(e, col)+"</option><option value='Confirmed'>Confirmed</option></option><option value='Shipped'>Shipped</option><option value='Delivered'>Delivered</option></select></td>";
                }else if(col=="name"){
                    html +="<td>"+_.get(el, col)+"</td>"
                }else if(col=="startDate"){
                    html +="<td>"+(new Date(_.get(el, col, '')).toISOString().substr(0, 10)) +"</td>"
                }else if(col=="expiryDate"){
                    html +="<td>"+(new Date(_.get(el, col, '')).toISOString().substr(0, 10)) +"</td>"
                }else if(columnsImg.indexOf(col)==-1){
                    html +="<td>"+_.get(e, col)+"</td>"
                }else{
                    var url = _.get(e, col);
                    var vUrl = isValidHttpUrl(url);
                    url = (!vUrl)?url:url;
                    html +="<td><img width='50px' src='"+url+"'/></td>"
                }
            });
            });

            html +='</tr>'
            
        })

        $("tbody").html(html);
        setTimeout(()=>{
            loadDt();
        },0)
        
    }

    function __init_call(){
        $('#dataTableEl').DataTable().clear().destroy();
        __ajax_http("<?php echo $apiCall;?>",null,[],"GET","<?php echo $apiCall;?>",makeDt);
    }

    function __delete_call(id){
        __ajax_http("<?php echo $apiCall;?>/"+id,{isDelete:1,id:id},[],"PUT","<?php echo $apiCall;?>",__init_call);
    }

    function _add_art_call(id){
        __ajax_http("trendingArtworks",{productId:id},[],"POST","<?php echo $apiCall;?>",__init_call);
    }

    function _add_artist_call(id){
        __ajax_http("trendingArtists",{userId:id},[],"POST","<?php echo $apiCall;?>",__init_call);
    }

</script>