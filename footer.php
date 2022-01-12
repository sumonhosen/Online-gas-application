                 <footer>
                    <div class="content-body footer-content">
                        <div class="right hidden-for-small-only" id="footerTime">22:22</div>
                        <div class="right hidden-for-small-only" id="footerDate">Sep 26, 2021</div>
                        <div class="right hidden-for-small-only">
                            Version : 0.2
                        </div>


                        <div class="hide">
                            ?
                        </div>
                        <div class="left" title="The creator of PrismERP">
                            � <span>2021</span> <a href="https://www.sgcl.org.bd/" target="_blank">SGCL</a>
                        </div>

                    </div>
                </footer>
            </div>
        </div>

        <div id="dialog-confirm" title="Delete!" style="display: none;">
            <p>
                <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
                This information will be permanently deleted and cannot be recovered. Are you sure?
            </p>
        </div>

        <div id="dialog-ledger" title="Confirm!" style="display: none;">
            <p>
                <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
                This action cannot be undone. Do you want to continue?
            </p>
        </div>

        <script type="text/javascript" src="modernizr.js.download"></script>
        <script type="text/javascript" src="jquery.core.js.download"></script>
        <script type="text/javascript" src="jquery.ui.js.download"></script>
        <script type="text/javascript" src="plugins.js.download"></script>
        <script type="text/javascript" src="slick_grid.js.download"></script>

        <!--<script type="text/javascript" src="/static/src/js/z/grid.js?v=1.2.1" ></script>-->
        <script type="text/javascript" src="slick.common.js.download"></script>
        <script type="text/javascript" src="datepicker.all.js.download"></script>
        <script type="text/javascript" src="jquery.maskedinput.min.js.download"></script>
        <script type="text/javascript" src="hack.js.download"></script>
            <script type="text/javascript">
                
            var ind1 = '<?php echo $organization_data??''; ?>';
            var ind2 = '<?php echo $industry2_sql??''; ?>';
            var ind3 = '<?php echo $industry3_sql??''; ?>';

                if(ind1==1){
                    $('#industry_div1').hide();
                    $('#industry_div2').show();
                }
        
                if(ind2==1){
                    $('#industry_div1').hide();
                    $('#industry_div2').hide();
                    $('#industry_div3').show();
                }
                if(ind3==1){
                    $('#industry_div1').hide();
                    $('#industry_div2').hide();
                    $('#industry_div3').hide();
                    $('#industry_div4').show();
                }

                $(".clickSlide ul").hide();
                    $(".clickSlide").click(function(){
                        $(this).children("ul").stop(true,true).slideToggle("fast"),
                        $(this).toggleClass("dropdown-active");
                    });

                       var contextPath = "";
                        var moduleName = "";
                        var subModuleName = "";
                        var pathVariables = [];
                        var supportedUploadTypes = ".pdf,.jpg,.jpeg,.png";

                        var loggedIn = !true;
                        var lang = "";

                        $(document).on("click", "#addPop, .addPop", function (ev) {
                            ev.preventDefault();
                        });

                        $(function () {
                            $('.search-hide').click(function (e) {
                                e.preventDefault();
                                if ($('section.grid div.search').hasClass('hide')) {
                                    $('section.grid div.search').show();
                                    $(this).text('Serach Hide');
                                    $('section.grid div.search').removeClass('hide');


                                }
                                else {
                                    $(this).text('Serach Show');
                                    $('section.grid div.search').addClass('hide');
                                    $('section.grid div.search').hide();

                                }
                                return false;
                            });

                            $('.slick-row-ctr').click(function (e) {
                                if ($('.slickgridView').hasClass('compact')) {
                                    $('.slickgridView').addClass('comfortable');
                                    $('.slickgridView').removeClass('compact');
                                    c4s.components.grid();
                                }
                                else {
                                    $('.slickgridView').addClass('compact');
                                    $('.slickgridView').removeClass('comfortable');
                                    c4s.components.grid();
                                }
                            });


                            detectTouchSupport();
                            c4s.init_once();

                            if (loggedIn) {




                            } else {
                                $("#desktop-view").hide();
                            }



                            var $content = $('#page-content');

                            var host = location.host;
                            var url = location.href;

                            var ind = url.indexOf("?");
                            if (ind != -1) {
                                url = url.substr(0, ind);
                            }
                            ind = url.indexOf("#");
                            if (ind != -1) {
                                url = url.substr(0, ind);
                            }
                            ind = url.lastIndexOf("/");
                            if (ind == url.length-1) {
                                url = url.substr(0, ind);
                            }

                            ind = url.indexOf(host + contextPath);
                            if (ind != -1) {
                                moduleName = url.substr(
                                        ind+(host + contextPath).length);

                                if (moduleName.indexOf("/") == 0) {
                                    moduleName = moduleName.substr(1);
                                }

                                var parts = moduleName.split("/");
                                console.log(parts);
                                if (parts.length > 0) {
                                    moduleName = parts[0];
                                }
                                if (parts.length > 1) {
                                    subModuleName = parts[1];
                                }
                                if (parts.length > 2) {
                                    pathVariables = parts.slice(2);
                                }
                            }

                            ind = url.indexOf(host + contextPath);
                            url = url.substr(0, ind+(host + contextPath).length)
                                    + "/html" + url.substr(ind+(host + contextPath).length);
                            console.log(url);
                            url = url + ".html";

                            $.ajax({
                                method: "GET",
                                url: url,
                                headers: {"X-Requested-Layout": "ajax"},
                                success: function (data, textStatus, jqXHR) {
                                    $content.stop(true, true);
                                    $content.html(data);
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    //window.location.reload();
                                }
                            }); // end ajax

                        });
                        var desktopView;
                        desktopView = ' ';

                        function detectTouchSupport() {
                            msGesture = window.navigator && window.navigator.msPointerEnabled && window.MSGesture,
                                    touchSupport = (("ontouchstart" in window) || msGesture || window.DocumentTouch && document instanceof DocumentTouch);

                            if (touchSupport || navigator.userAgent.indexOf('AppleWebKit') != -1) {
                                if (navigator.userAgent.indexOf('AppleWebKit') != -1) {
                                    $("body").addClass("apple-screen");
                                }
                                else {
                                    $("body").addClass("touch-screen");
                                }

                                if ($('.header-content').hasClass('fixed')) {
                                    $('.header-content').removeClass('fixed');
                                    $('.header-content').addClass('scroll');
                                }
                                if ($('.menu-content').hasClass('fixed')) {
                                    $('.menu-content').removeClass('fixed');
                                    $('.menu-content').addClass('scroll');
                                }

                            }
                            else {
                                $("body").addClass("normal-screen");
                                if (!$('.header-content').hasClass('fixed')) {
                                    $('.header-content').removeClass('scroll');
                                    $('.header-content').addClass('fixed');
                                }
                                if (!$('.menu-content').hasClass('fixed')) {
                                    $('.menu-content').removeClass('scroll');
                                    $('.menu-content').addClass('fixed');
                                }
                            }
                        }

                            function showProgressBar() {
                                $("#page-content").oLoader({
                                    backgroundColor: '#888',
                                    image: '/static/images/loader1.gif',
                                    fadeInTime: 500,
                                    fadeOutTime: 1000,
                                    fadeLevel: 0.5
                                });
                            }

                            function hideProgressBar() {
                                try {
                                    $("#page-content").oLoader("hide");
                                } catch (e) {}
                                $('.ui-tooltip').hide();
                            }

                            function showMessage(msg) {
                                $("#message").html(msg);
                                $("#message").show();
                            }

                            function hideMessage() {
                                $("#message").html("");
                                $("#message").hide();
                            }

                            function templateLoadingComplete(response, status, jqXHR) {
                                c4s.init();
                                $(".masked-input").each(function (i, elm) {
                                    var that = $(this);
                                    if (!that.attr("is-masked")) {
                                        that.mask(that.attr("data-mask"));
                                        that.attr("is-masked", "true");
                                    }
                                });
                                $("input,select,textarea").each(function (i, elm) {
                                    var that = $(this);
                                    if (that.hasClass("required") && !that.attr("is-required")) {
                                        var label = $("label[for='"+that.attr('id')+"']");
                                        label.each(function(i, elm) {
                                            if (!$(this).hasClass("skip-require-mark")) {
                                                $(this).html($(this).text() + " <span style=\"color: red;\">*</span>");
                                            }
                                        });
                                        that.attr("is-required", "true");
                                    }
                                });
                                $(".required").blur(function(e) {
                                    var that = $(this);
                                    if ($.trim(that.val()) != "") {
                                        that.removeClass("value-missing");
                                    }
                                });
                                $("select").change(function(e) {
                                    var that = $(this);
                                    if ($.trim(that.val()) != "") {
                                        that.removeClass("value-missing");
                                        that.next().removeClass("value-missing");
                                    }

                                });
                                $("input[type='file']").change(function(e) {
                                    var that = $(this);
                                    if ($.trim(that.val()) != "") {
                                        that.removeClass("value-missing");
                                        that.next().removeClass("value-missing");
                                    }
                                });
                                $("#paperSize").change(function(e) {
                                    var that = $(this);
                                    if (that.val() == "1") {
                                        $("#cpl").val("132");
                                        $("#lpp").val("58");
                        //                $("#format").data("selectize").setValue("txt");
                                    } else if (that.val() == "2") {
                                        $("#cpl").val("80");
                                        $("#lpp").val("58");
                                    }
                                });
                                $("input[type='file']").each(function (i, elm) {
                                    console.log(supportedUploadTypes);
                                    $(this).attr("accept", supportedUploadTypes);
                                });
                            }

                            function requiredCheck() {
                                console.log("inside requiredCheck()");
                                var retVal = true;
                                $(".required").each(function(i, elm) {
                                    var that = $(this);
                                    var tag = that.prop("tagName");
                                    var type = that.attr("type");
                                    var value = that.val();

                                    if (tag == "INPUT" || tag == "SELECT" || tag == "TEXTAREA") {
                                        if ($.trim(value) == "") {
                                            that.addClass("value-missing");
                                            if (tag == "SELECT" || type == "file") {
                                                that.next().addClass("value-missing");
                                            }
                                            retVal = false;
                                        }
                                    }
                                });
                                if (!retVal) {
                                    showMessage("Please enter all required (*) values");
                                }
                                console.log("returning requiredCheck() > " + retVal);
                                return retVal;
                            }

                            function validateFormData() {
                                console.log("inside validateFormData()");
                                var retVal = true;
                                var msg = "";

                                $(".validator").each(function(i, elm) {
                                    var that = $(this);
                                    try {
                                        var type = that.attr("data-validation");

                                        if (type) {
                                            if (type == "month") {
                                                monthValidator(that);
                                            } else if (type == "date") {
                                                dateValidator(that);
                                            } else if (type == "email") {
                                                emailValidator(that);
                                            } else if (type == "y/n") {
                                                yesNoValidator(that);
                                            } else if (type == "ipAddress") {
                                                ipValidator(that);
                                            }
                                        }
                                    } catch (e) {
                                        retVal = false;
                                        console.log("ERROR: " + e);
                                        if (msg != "") {
                                            msg += "<br />";
                                        }
                                        e = $.trim(e);
                                        var ind = e.lastIndexOf("*");
                                        if (ind == e.length-1) {
                                            e = e.substr(0, ind);
                                        }
                                        msg += $.trim(e);
                                    }
                                });

                                if (msg != "") {
                                    showMessage(msg);
                                }

                                console.log("returning validateFormData() > " + retVal);
                                return retVal;
                            }

                function monthValidator(s) {
                    var v = s.val();
                    var pattern = /^\d{4}[\/\-](0?[1-9]|1[012])$/;
                    if (v.match(pattern) == null) {
                        var label = $("label[for='"+s.attr('id')+"']");
                        var msg = "Invalid ";

                        if (label.length > 0) {
                            msg += label.text().toLowerCase();
                        } else {
                            msg += "value";
                        }
                        throw msg;
                    }
                    return v.replace("-", "");
                }

                function dateValidator(s) {
                    var v = s.val();
                    var pattern = /^(0?[1-9]|[1-2][0-9]|3[01])[\/\-](0?[1-9]|1[0-2])[\/\-]\d{2}$/
                    if (v.match(pattern) == null) {
                        var label = $("label[for='"+s.attr('id')+"']");
                        var msg = "Invalid ";

                        if (label.length > 0) {
                            msg += label.text().toLowerCase();
                        } else {
                            msg += "value";
                        }
                        throw msg;
                    }
                    return v.replace("-", "");
                }

                function yesNoValidator(s) {

                }

                function ipValidator(s) {
                    var addr = s.val().split(".");
                    if (addr.length != 4) {
                        throw "Invalid ip address";
                    }
                    for (var i in addr) {
                        var block = "" + parseInt(addr[i]);
                        if (block == "NaN") {
                            throw "Invalid ip address";
                        }
                        if (parseInt(block) > 255) {
                            throw "Invalid ip address";
                        }
                    }
                    return s.val();
                }

                function emailValidator(s) {
                    var v = s.val();
                    if (v == "") {
                        return v;
                    }
                    var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    if (v.match(pattern) == null) {
                        var label = $("label[for='"+s.attr('id')+"']");
                        var msg = "Invalid ";

                        if (label.length > 0) {
                            msg += label.text().toLowerCase();
                        } else {
                            msg += "value";
                        }
                        throw msg;
                    }
                    return v;
                }

                function reloadGridData(grid) {
                    if (grid) {
                        var data_src = grid.attr("data-src");
                        grid.data('grid').getData().getData(data_src);
                    }
                }
            </script>
    </body>
</html>