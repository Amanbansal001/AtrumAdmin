<div class="card">
    <div class="card-header row">
        <div class="col-md-11">
            <h3 class="card-title"><?php echo $dtTagLine; ?></h3>
        </div>
        <?php if ($isTblAdd) { ?>
            <div class="col-md-1">
                <a href="detail.php" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
            </div>
        <?php } ?>

        <?php if ($updateShippingAmount) { ?>
            <div class="col-md-1">
                <button onclick='updateShipping()' class='btn btn-outline-primary btn-block'>Save</button>
            </div>
        <?php } ?>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="dataTableEl" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?php foreach ($columnsFace as $col) { ?>
                        <th><?php echo $col; ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <?php foreach ($columnsFace as $col) { ?>
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
            "order": [
                [0, "desc"]
            ],
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            buttons: [{
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

    function makeDt(res) {

        var html = "";
        var cols = <?php echo json_encode($columns); ?>;
        var columnsImg = "<?php echo $columnsImg; ?>";
        var actionDel = "<?php echo $actionDel; ?>";
        var tblId = "<?php echo $tblId; ?>";
        var updateShippingAmount = "<?php echo $updateShippingAmount; ?>";

        tableData = res.data.fetch;

        res.data.fetch.forEach((e, idx) => {
            html += '<tr>'
            cols.forEach(col => {
                if (col == "nocol") {
                    html += "<td></td>"
                } else if (col == "checkbox") {
                    html += "<td><input class='checkbox' type='checkbox' id='checkbox-" + idx + "' onchange='handleCheckbox()'/></td>"
                } else if (col == "orderId") {
                    html += "<td>" + `ORD${String(_.get(e, "id", '')).padStart(6, '0')}` + "</td>"
                } else if (col == "labelId") {
                    html += "<td><a target='_blank' href='" + API_URL + "uploads?file=" + _.get(e, "id", '') + "'/>Link</td>"
                } else if (col == "id" && tblId == "0") {
                    html += "<td>" + _.get(e, col, '') + "</td>"
                } else if (col == "id" && tblId == "") {
                    html += "<td><a href='detail.php?id=" + _.get(e, col) + "'/>" + _.get(e, col, '') + "</td>"
                } else if (col == "id" && tblId != "") {
                    html += "<td><a href='detail.php?id=" + _.get(e, tblId) + "'/>" + _.get(e, col, '') + "</td>"
                } else if (col == "url") {
                    html += "<td><a target='_blank' href='" + API_URL + "uploads?file=" + _.get(e, col, '') + "'/>Link</td>"
                } else if (col == "replyTo") {
                    html += "<td><a href='mailTo:" + _.get(e, "from") + "?subject=Reply::" + _.get(e, "category") + "&body'/>Reply</td>"
                } else if (actionDel == "1" && col == "action") {
                    html += "<td><a href='javascript:void(0);' onclick='__delete_call(" + e.id + ")'>Delete</a></td>";
                } else if (actionDel == "1" && col == "bidaction") {
                    var bidAction = _.get(e, 'bidStatus');
                    if (bidAction == "Pending") {
                        html += "<td><a href='javascript:void(0);' onclick='__win_call(" + e.id + ")'>Make Win</a></td>";
                    } else {
                        html += "<td>Result Declared</td>"
                    }
                } else if (actionDel == "1" && col == "softaction") {
                    var status = _.get(e, "status");
                    if (status == 1) {
                        html += "<td><a href='javascript:void(0);' onclick='__status_call(" + e.id + ")'>Inactive</a></td>";
                    } else {
                        html += "<td><a href='javascript:void(0);' onclick='__status_active_call(" + e.id + ")'>Active</a></td>";
                    }
                } else if (col == "createdAt") {
                    html += "<td>" + ddmmyyyy(_.get(e, col)) + "</td>";
                } else if (col == "comission") {
                    var comission = _.get(e, "comission");
                    if (comission) {
                        var price = _.get(e, "price");
                        var qty = _.get(e, "qty");
                        var grandTotal = price * qty;
                        var commisisonToArtist = (grandTotal * comission) / 100;
                        html += "<td>USD " + commisisonToArtist + " (" + _.get(e, "comission") + "%)</td>";
                    } else {
                        html += "<td>-</td>";
                    }
                } else if (col == "featured_art") {
                    html += "<td><a href='javascript:void(0);' onclick='_add_art_call(" + e.id + ")'>Add to Featured</a></td>";
                } else if (col == "coa") {
                    html += "<td><a target='_blank' href='/product/coa.php?id=" + _.get(e, "id") + "'>Download COA</a></td>";
                } else if (col == "featured_artist" && _.get(e, "roleType") == "Artist") {
                    html += "<td><a href='javascript:void(0);' onclick='_add_artist_call(" + e.id + ")'>Add to Featured</a></td>";
                } else if (col == "featured_artist" && _.get(e, "roleType") != "Artist") {
                    html += "<td></td>";
                } else if (col == "shippingAmount" && _.get(e, col) != "0") {
                    html += "<td>" + _.get(e, col) + "</td>"
                } else if (col == "estimatedPickupDate") {
                    var toHide = (!_.get(e, col)) ? '' : 'disabled';
                    var date = _.get(e, col);
                    date = (date) ? (new Date(_.get(e, col, '')).toISOString().substr(0, 10)) : "";
                    html += "<td><input class='form-control estimatedPickupDate col-md-4 ' id='estimatedPickupDate" + idx + "' type='date' value='" + date + "' " + toHide + " />";
                    html += "</td>"
                } else if (col == "estimatedDeliveryDate") {
                    var toHide = (!_.get(e, col)) ? '' : 'disabled';
                    var date = _.get(e, col);
                    date = (date) ? (new Date(_.get(e, col, '')).toISOString().substr(0, 10)) : "";
                    html += "<td><input class='form-control estimatedDeliveryDate col-md-4 ' id='estimatedDeliveryDate" + idx + "' type='date' value='" + date + "' " + toHide + " />";
                    html += "</td>"
                } else if (col == "pickUpDate") {
                    var toHide = (!_.get(e, col)) ? '' : 'disabled';
                    var date = _.get(e, col);
                    date = (date) ? (new Date(_.get(e, col, '')).toISOString().substr(0, 10)) : "";
                    html += "<td><input class='form-control pickUpDate col-md-4 ' id='pickUpDate" + idx + "' type='date' value='" + date + "' " + toHide + "/>";
                    html += "</td>"
                } else if (col == "deliveryDate") {
                    var toHide = (!_.get(e, col)) ? '' : 'disabled';
                    var date = _.get(e, col);
                    date = (date) ? (new Date(_.get(e, col, '')).toISOString().substr(0, 10)) : "";
                    html += "<td><input class='form-control deliveryDate col-md-4 ' id='deliveryDate" + idx + "' type='date' value='" + date + "' " + toHide + "/>";
                    html += "</td>"
                } else if (col == "order.trackingId") {

                    html += "<td><input class='form-control trackingId col-md-8 ' id='tracking_Id" + idx + "' type='text' value='" + _.get(e, col) + "' disabled/>";
                    html += "</td>"
                } else if (col == "_orderStatus") {

                    var selVal = _.get(e, "orderStatus");

                    var PSC = (selVal == "PENDING FOR SHIPPING CHARGES") ? 'selected' : '';
                    var PFP = (selVal == "PENDING FOR PAYMENT") ? 'selected' : '';
                    var CONF = (selVal == "CONFIRMED") ? 'selected' : '';
                    var ACC = (selVal == "ACCEPTED") ? 'selected' : '';
                    var SHIP = (selVal == "SHIPPED") ? 'selected' : '';
                    var DL = (selVal == "DELIVERED") ? 'selected' : '';

                    html += "<td>";
                    html += '<select class="form-control" id="orderStatus' + idx + '" >';
                    html += '<option value="PENDING FOR SHIPPING CHARGES" ' + PSC + '>PENDING FOR SHIPPING CHARGES</option>';
                    html += '<option value="PENDING FOR PAYMENT" ' + PFP + '>PENDING FOR PAYMENT</option>';
                    html += '<option value="CONFIRMED" ' + CONF + '>CONFIRMED</option>';
                    html += '<option value="ACCEPTED" ' + ACC + '>ACCEPTED</option>';
                    html += '<option value="SHIPPED" ' + SHIP + '>SHIPPED</option>';
                    html += '<option value="DELIVERED" ' + DL + '>DELIVERED</option>';
                    html += '</select>';
                    html += "</td>";
                } else if (col == "shippingAmount" && _.get(e, col) == "0") {
                    html += "<td><div class='row'><div class='col-md-12'><input class='form-control' min='0' onkeypress='return event.charCode >= 48' shippingAmount col-md-5' id='shippingAmount" + idx + "' name='shippingAmount' type='number' placeholder='Enter No' value='" + _.get(e, "shippingAmount") + "'/>";
                    html += "</div>";
                    html += "</td>";
                }
                //else if(col=="orderStatus"){
                //    html +="<td><select class='form-control orderStatus' onchange='updateOrderStatus()'><option value='"+_.get(e, col,'')+"' selected disabled>"+_.get(e, col)+"</option><option value='Confirmed'>Confirmed</option></option><option value='Shipped'>Shipped</option><option value='Delivered'>Delivered</option></select></td>";
                //}
                else if (columnsImg.indexOf(col) == -1) {
                    html += "<td>" + _.get(e, col) + "</td>"
                } else if (col == "urlImg") {
                    var url = _.get(e, "url");

                    url = "https://atrumart.com/api" + url;
                    html += "<td><img width='50px' src='" + url + "' onerror=\"this.src='https://www.touchtaiwan.com/images/default.jpg';this.onerror='';\"/></td>"
                } else {
                    var url = _.get(e, col);
                    var vUrl = isValidHttpUrl(url);
                    url = (!vUrl) ? url : url;
                    html += "<td><img width='50px' src='" + url + "' onerror=\"this.src='https://www.touchtaiwan.com/images/default.jpg';this.onerror='';\"/></td>"
                }

            });

            html += '</tr>'

        })

        $("tbody").html(html);
        setTimeout(() => {
            loadDt();
        }, 0)

    }

    function __init_call(res) {

        if (res) {
            if (res.code != 200) {
                alert(res.errorMessage);
                return;
            }
        }

        $('#dataTableEl').DataTable().clear().destroy();
        __ajax_http("<?php echo $apiCall; ?>", null, [], "GET", "<?php echo $apiCall; ?>", makeDt);
    }

    function __delete_call(id) {
        __ajax_http("<?php echo ($apiCall2) ? $apiCall2 : $apiCall; ?>/" + id, {
            isDelete: 1,
            id: id
        }, [], "PUT", "<?php echo $apiCall; ?>", __init_call);
    }

    function _add_art_call(id) {
        __ajax_http("trendingArtworks", {
            productId: id
        }, [], "POST", "<?php echo ($apiCall2) ? $apiCall2 : $apiCall; ?>", __init_call);
    }

    function _add_artist_call(id) {
        __ajax_http("trendingArtists", {
            userId: id
        }, [], "POST", "<?php echo $apiCall; ?>", __init_call);
    }

    function ddmmyyyy(date, delimitor = "-") {
        var today = new Date(date);
        var dd = today.getDate();

        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }
        //today = mm + '-' + dd + '-' + yyyy;

        today = `${dd}${delimitor}${mm}${delimitor}${yyyy}`;


        return today;
    }
</script>