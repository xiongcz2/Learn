<?php
session_start();
include_once "config.php";

if(!isset($_SESSION)){
				header("Location: login.php");
				die();
}else{

		$sql_user = "select * from userinfo where ID=" . $_SESSION["USER_ID"];

		$result      = mysqli_query($con, $sql_user);
		$rows_info      = mysqli_fetch_array($result);

}
    ini_set("display_errors", 0);

?>


<html>
    <head>
        <title>Main Page</title>

        <script src="telerik.kendoui.2016.3.1118.core/js/jquery.min.js"></script>
        <script src="telerik.kendoui.2016.3.1118.core/js/kendo.core.min.js"></script>
        <script src="telerik.kendoui.2016.3.1118.core/js/kendo.ui.core.min.js"></script>
        <script src="telerik.kendoui.2016.3.1118.core/js/kendo.toolbar.min.js"></script>
        <script src="telerik.kendoui.2016.3.1118.core/js/kendo.splitter.min.js"></script>
        <script src="telerik.kendoui.2016.3.1118.core/js/kendo.button.min.js"></script>
        <script src="telerik.kendoui.2016.3.1118.core/js/kendo.data.min.js"></script>
        <script src="telerik.kendoui.2016.3.1118.core/js/kendo.combobox.min.js"></script>
        <script src="telerik.kendoui.2016.3.1118.core/js/kendo.validator.min.js"></script>
        <script src="telerik.kendoui.2016.3.1118.core/js/kendo.numerictextbox.min.js"></script>
        <script src="telerik.kendoui.2016.3.1118.core/js/kendo.notification.min.js"></script>
        <script src="telerik.kendoui.2016.3.1118.core/js/kendo.dropdownlist.min.js"></script>
        <link rel="stylesheet" href="telerik.kendoui.2016.3.1118.core/styles/kendo.common.min.css"/>
        <link rel="stylesheet" href="telerik.kendoui.2016.3.1118.core/styles/kendo.rtl.min.css"/>
        <link rel="stylesheet" href="telerik.kendoui.2016.3.1118.core/styles/kendo.silver.min.css"/>
        <link rel="stylesheet" href="telerik.kendoui.2016.3.1118.core/styles/kendo.mobile.all.min.css"/>

        <style>
            a:link {
                 text-decoration: none;
                }
               #NavControl {
                    min-height:500px;
                }
                #undo {
                    text-align: center;
                    position: absolute;
                    white-space: nowrap;
                    padding: 1em;
                    cursor: pointer;
                }
                .armchair {
                	float: left;
                	margin: 30px 30px 120px 30px;
                	text-align: center;
                }
                .armchair img {
                    display: block;
                    margin-bottom: 10px;
                }
                .k-window-content a {
                    color: #BBB;
                }
                .k-window-content p {
                    margin-bottom: 1em;
                }

                @media screen and (max-width: 1023px) {
                    div.k-window {
                        display: none !important;
                    }
                }
                .demo-section p .k-button {
                    margin: 0 10px 0 0;
                }
                .k-button{
                    background: #6495ED;
                    min-width: 150px;
                }
            </style>
        </div>

        </style>

         <script>
                $(document).ready(function() {
                    var myWindow = $("#window"),
                        undo = $("#undo");

                    undo.click(function() {
                        myWindow.data("kendoWindow").open();
                        undo.fadeOut();
                    });

                    function onClose() {
                        undo.fadeIn();
                    }

                    myWindow.kendoWindow({
                        width: "480px",
                        title: "Bear Captain",
                        visible: false,
                        actions: [
                            "Pin"
                        ],
                        close: onClose
                    }).data("kendoWindow").center().open();
                });
            </script>


    </head>
    <body>
        <div id="NavControl">
        <div id = "window">
           <div class="demo-section k-content">
            <table>
                <tr>
                    <td>
                       <a href="customer.php" class="k-button" id="primaryTextButton"><p style="color: black">Customer Info</p></a>
                    </td>
                    <td>
                        <a href="" class="k-button" id="primaryTextButton"><p style="color: black">New Order</p></a>
                    </td>
                    <td>
                       <a href="" class="k-button" id="primaryTextButton"><p style="color: black">Shipping Manage</p></a>
                    </td>
                </tr>
            </table>
        </div>
            </div>
            </div>
    </body>
</html>
