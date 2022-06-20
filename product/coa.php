<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/dist/js/api.js"></script>
</head>

<body>
    <div style=" width:700px; padding:20px; font-family:Arial; border: black thin solid; background-color: #fffef4;">

        <table cellspacing="0" cellpadding="0" style="width: 100%; font-size: 17px;">
            <tr>
                <td colspan="3" style="padding: 15px; text-align: center; font-weight: bold; font-size: 35px;">CERTIFICATE OF AUTHENTICITY</td>
            </tr>
            <tr>
                <td style="padding: 8px; padding-top: 40px;"></td>
                <td colspan="2" style="padding: 8px; padding-top: 30px;">
                    <div style="text-align: center"><img id="artworkImage" height="250px" alt=""></div>
                    <p style="text-transform: uppercase;">ARTIST <br> <span id="artistName">{{artistName}}</span></p>
                    <p style="text-transform: uppercase;">ARTWORK <br> <span style="font-weight: 500; font-size: 25px;" id="artworkName">{{artworkName}}</span></p>
                    <p style="text-align: justify" id="bio"></p>

                    <p style="text-transform: uppercase;">MEDIUM <br> <span id="medium">{{medium}}</span></p>

                    <table cellpadding="0" cellspacing="0" style="width: 100%">
                        <tr>
                            <td>
                                <p style="text-transform: uppercase; margin-top: 0">DIMENSION<br> <span id="dimension">{{dimension}}</span></p>
                            </td>
                            <td>
                                <p style="text-transform: uppercase;">EDITION <br> <span id="edition">{{edition}}</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="text-transform: uppercase; margin-top: 0">DATE OF PRODUCTION <br> <span id="dop">{{dop}}</span></p>
                            </td>
                            <td>
                                <p style="text-transform: uppercase; margin-top: 0">DATE OF PURCHASE <br> <span id="dpurchase">{{dpurchase}}</span></p>
                            </td>
                        </tr>
                    </table>


                </td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td style="padding: 8px; line-height: 24px; width: 190px"><img src="/assets/dist/img/atrum-logo.png" height="40px" alt=""> <br>atrumart.com <br> +966 53833833 <br> Anas Ibn Malik Rd, Al Malqa, Riyadh 13521</td>
                <td style="padding: 8px; vertical-align: top; line-height: 27px; width: 40%">AUTHORIZED SIGNATURE <br> CO-FOUNDERS ATRUM <br>
                    <img src="/assets/dist/img/signature.jpg" height="70px" alt="">
                </td>
                <td style="padding: 8px; vertical-align: top; ">ARTIST'S SIGNATURE
                    <br /><img id="artistSign" src="" height="70px" alt="">
                </td>
            </tr>


        </table>


    </div>
</body>

<script>
    function __init_call() {
        getData();
    }

    function getData() {
        var pkId = getParameterByName("id");
        if (pkId == null) {
            return
        }

        __ajax_http("products/" + pkId, null, [], "GET", "product", function(res) {

            res = res.data.fetch;

            $("#dop").html(res.dateOfProduction);
            $("#dpurchase").html(res.dateOfProduction);
            $("#medium").html(res.medium);


            if (res.productImage) {
                $("#artworkImage").attr('src', res.productImage);
            }

            if (res.signature) {
                $("#artistSign").attr('src', res.signature);
            }

            $("#artworkName").html(res.productName);
            $("#edition").html(res.edition);
            $("#dimension").html(res.length + "cm x " + res.height + "cm ");
            $("#artistName").html(res.user.name);


            setTimeout(() => {
                window.onafterprint = window.close;
                window.print()
                window.onfocus = function() {
                    window.close();
                }
            }, 500)

        });

    }
</script>

</html>