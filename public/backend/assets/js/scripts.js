$(document).ready(function () {
    var ajaxSetup = $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    //Stop form Submit on Enter Key Press
    var el = document.getElementById("personForm");
    el.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
        }
    });

    $("#institute_type").append("<option>---- Select ----</option>");

    //Copy Button
    $("#copy_present_address").on("click", function () {
        $("#permanent_address").val($("#present_address").val());
    });

    //Inputs Hide And Show
    $("#next_button_personal").on("click", function () {
        $("#personal_info").hide();
        $("#educational_info").show();
        $("#professional_info").hide();
    });

    $("#back_button_educational").on("click", function () {
        $("#personal_info").show();
        $("#educational_info").hide();
        $("#professional_info").hide();
    });
    $("#next_button_educational").on("click", function () {
        $("#personal_info").hide();
        $("#educational_info").hide();
        $("#professional_info").show();
    });

    $("#back_button_professional").on("click", function () {
        $("#personal_info").hide();
        $("#educational_info").show();
        $("#professional_info").hide();
    });

    //Institute Fetch and Store With Ajax
    $.ajax({
        url: "ajax-get-institutes",
        type: "GET",
        data: {
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        success: function (data) {
            $("#education_institute_id").empty();
            $("#education_institute_id").append(
                "<option>Select Institute</option>"
            );
            $.each(data, function (key, value) {
                $("#education_institute_id").append(
                    "<option value=" +
                        value.id +
                        ">" +
                        value.institute_name +
                        "</option>"
                );
            });
        },
    });

    $("#save_edu_institute").on("click", function () {
        var institute_name = $("#edu_institute_name").val();
        $.ajax({
            url: "ajax-store-institute/" + institute_name,
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function (data) {
                $("#edu_institute_name").val("");
                $("#education_institute_id").empty();
                $("#education_institute_id").append(
                    "<option>Select Institute</option>"
                );
                $.each(data, function (key, value) {
                    $("#education_institute_id").append(
                        "<option value=" +
                            value.id +
                            ">" +
                            value.institute_name +
                            "</option>"
                    );
                });
            },
        });
    });

    //Educational Level Fetch and Store With Ajax
    $.ajax({
        url: "ajax-get-edu-level",
        type: "GET",
        data: {
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        success: function (data) {
            $("#education_level_id").empty();
            $("#education_level_id").append("<option>Select Level</option>");
            $.each(data, function (key, value) {
                $("#education_level_id").append(
                    "<option value=" +
                        value.id +
                        ">" +
                        value.level_name +
                        "</option>"
                );
            });
        },
    });
    $("#save_edu_level").on("click", function () {
        var level_name = $("#level_name").val();
        $.ajax({
            url: "ajax-store-edu-level/" + level_name,
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function (data) {
                $("#level_name").val("");
                $("#education_level_id").empty();
                $("#education_level_id").append(
                    "<option>Select Level</option>"
                );
                $.each(data, function (key, value) {
                    $("#education_level_id").append(
                        "<option value=" +
                            value.id +
                            ">" +
                            value.level_name +
                            "</option>"
                    );
                });
            },
        });
    });
    //Board Fetch and Store With Ajax
    $.ajax({
        url: "ajax-get-board",
        type: "GET",
        data: {
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        success: function (data) {
            $("#education_board_universities_id").empty();
            $("#education_board_universities_id").append(
                "<option>Select Board/University</option>"
            );
            $.each(data, function (key, value) {
                $("#education_board_universities_id").append(
                    "<option value=" +
                        value.id +
                        ">" +
                        value.board_university_name +
                        "</option>"
                );
            });
        },
    });
    $("#save_board_university").on("click", function () {
        var board_university_name = $("#board_university_name").val();
        $.ajax({
            url: "ajax-store-board/" + board_university_name,
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function (data) {
                $("#board_university_name").val("");
                $("#education_board_universities_id").empty();
                $("#education_board_universities_id").append(
                    "<option>Select Board/University</option>"
                );
                $.each(data, function (key, value) {
                    $("#education_board_universities_id").append(
                        "<option value=" +
                            value.id +
                            ">" +
                            value.board_university_name +
                            "</option>"
                    );
                });
            },
        });
    });
    //Multi Education Form
    var i = 1;
    $("#add_edu_record").on("click", function () {
        var edu_html = "";
        edu_html += '<tr id="card-' + i + '">';
        edu_html += "<td>";
        edu_html += '<div class="card">';
        edu_html += '<div class="card-body">';
        edu_html += '<div class="row pt-3" id="test_edu_record">';
        edu_html += '<div class="col-md-4">';
        edu_html +=
            '<label for="education_institute_id" class="form-label">Institute Name<sup class="text-danger">*</sup></label>';
        edu_html +=
            '<select  class="form-control" name="education_institute_id[]" id="education_institute_id-' +
            i +
            '">';
        edu_html += "</select>";
        edu_html += "</div>";
        edu_html += '<div class="col-md-2">';
        edu_html +=
            '<button style="margin-top:32px;" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#AddInstituteModal-' +
            i +
            '">';
        edu_html += '<i class="bi bi-plus-circle-fill"></i>';
        edu_html += " </button>";
        edu_html += "</div>";
        edu_html += '<div class="col-md-4">';
        edu_html +=
            '<label for="education_level_id" class="form-label">Education Level<sup class="text-danger">*</sup></label>';
        edu_html +=
            '<select  class="form-control" name="education_level_id[]" id="education_level_id-' +
            i +
            '">';
        edu_html += "</select>";
        edu_html += "</div>";
        edu_html += '<div class="col-md-2">';
        edu_html +=
            '<div><button style="margin-top:32px;" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#AddEducationLeveleModal-' +
            i +
            '">';
        edu_html += '<i class="bi bi-plus-circle-fill"></i>';
        edu_html += "</button></div>";
        edu_html += "</div>";
        edu_html += '<div class="col-md-4">';
        edu_html +=
            '<label for="education_board_universities_id" class="form-label">Board / University<sup class="text-danger">*</sup></label>';
        edu_html +=
            '<select  name="education_board_universities_id[]" class="form-control" id="education_board_universities_id-' +
            i +
            '">';
        edu_html += "</select>";
        edu_html += "</div>";
        edu_html += '<div class="col-md-2">';
        edu_html +=
            '<div><button style="margin-top:32px;" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#AddUniversityModal-' +
            i +
            '">';
        edu_html += '<i class="bi bi-plus-circle-fill"></i>';
        edu_html += "</button></div>";
        edu_html += "</div>";
        edu_html += '<div class="col-md-6">';
        edu_html +=
            '<label for="passing_year" class="form-label">Passing Year<sup class="text-danger">*</sup></label>';
        edu_html +=
            '<input  placeholder="Passing Year" name="passing_year[]"  type="number" class="form-control" id="passing_year">';
        edu_html += "</div>";
        edu_html += '<div class="col-md-6">';
        edu_html +=
            '<label for="result" class="form-label">Result<sup class="text-danger">*</sup></label>';
        edu_html +=
            '<input  placeholder="Result" type="text" name="result[]" class="form-control" id="result">';
        edu_html += "</div>";
        edu_html += '<div class="col-md-6">';
        edu_html +=
            '<div id="cancel_edu" value="' +
            i +
            '" style="margin-left:65%; margin-top:35px;" class="btn btn-danger"><i class="bi bi-x"></i> Remove</div>';
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html +=
            '<div class="modal fade" id="AddInstituteModal-' +
            i +
            '" tabindex="-1" aria-labelledby="AddInstituteModal-' +
            i +
            '" aria-hidden="true">';
        edu_html += '<div class="modal-dialog">';
        edu_html += '<div class="modal-content">';
        edu_html += '<div class="modal-header">';
        edu_html +=
            '<h1 class="modal-title fs-5" id="AddInstituteModal-' +
            i +
            '">New Educational Institute</h1>';
        edu_html +=
            '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
        edu_html += "</div>";
        edu_html += '<div class="modal-body">';
        edu_html += '<div class="row">';
        edu_html += '<div class="col-md-12">';
        edu_html +=
            '<label for="inst_name" class="pb-3">Educational Institute Name</label>';
        edu_html +=
            '<input  name="inst_name-' +
            i +
            '" id="inst_name-' +
            i +
            '" placeholder="Institute Name" type="text" class="form-control">';
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += '<div class="modal-footer">';
        edu_html +=
            '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
        edu_html +=
            '<button value="' +
            i +
            '" type="button" id="save_edu_institute-' +
            i +
            '" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>';
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html +=
            '<div class="modal fade" id="AddEducationLeveleModal-' +
            i +
            '" tabindex="-1" aria-labelledby="AddEducationLeveleModal-' +
            i +
            '" aria-hidden="true">';
        edu_html += '<div class="modal-dialog">';
        edu_html += '<div class="modal-content">';
        edu_html += '<div class="modal-header">';
        edu_html +=
            '<h1 class="modal-title fs-5" id="AddEducationLeveleModal-' +
            i +
            '">New Education Levele</h1>';
        edu_html +=
            '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
        edu_html += "</div>";
        edu_html += '<div class="modal-body">';
        edu_html += '<div class="row">';
        edu_html += '<div class="col-md-12">';
        edu_html +=
            '<label for="level_name" class="pb-3">Education Level Name</label>';
        edu_html +=
            '<input  name="level_name-' +
            i +
            '" id="level_name-' +
            i +
            '" placeholder="Education Level" type="text" class="form-control">';
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += '<div class="modal-footer">';
        edu_html +=
            '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
        edu_html +=
            '<button value="' +
            i +
            '" id="save_edu_level-' +
            i +
            '" type="button" data-bs-dismiss="modal" class="btn btn-primary">Save changes</button>';
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html +=
            '<div class="modal fade" id="AddUniversityModal-' +
            i +
            '" tabindex="-1" aria-labelledby="AddUniversityModal-' +
            i +
            '" aria-hidden="true">';
        edu_html += '<div class="modal-dialog">';
        edu_html += '<div class="modal-content">';
        edu_html += '<div class="modal-header">';
        edu_html +=
            '<h1 class="modal-title fs-5" id="AddUniversityModal-' +
            i +
            '">New Board/University</h1>';
        edu_html +=
            '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
        edu_html += "</div>";
        edu_html += '<div class="modal-body">';
        edu_html += '<div class="row">';
        edu_html += '<div class="col-md-12">';
        edu_html +=
            '<label for="board_university_name" class="pb-3">Board/University Name</label>';
        edu_html +=
            '<input  name="board_university_name-' +
            i +
            '" id="board_university_name-' +
            i +
            '" placeholder="Board/University" type="text" class="form-control">';
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += '<div class="modal-footer">';
        edu_html +=
            '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
        edu_html +=
            '<button value="' +
            i +
            '" id="save_board_university-' +
            i +
            '" type="button" data-bs-dismiss="modal" class="btn btn-primary">Save changes</button>';
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</div>";
        edu_html += "</td>";
        edu_html += "</tr>";

        $("#new_edu_record").append(edu_html);

        $(".clickAction").on("click", "#cancel_edu", function () {
            var value = $(this).attr("value");
            $("#card-" + value).empty();
        });

        $.ajax({
            url: "ajax-get-institutes",
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            async: false,
            success: function (data) {
                $("#education_institute_id-" + i).empty();
                $("#education_institute_id-" + i).append(
                    "<option>Select Institute</option>"
                );
                $.each(data, function (key, value) {
                    $("#education_institute_id-" + i).append(
                        "<option value=" +
                            value.id +
                            ">" +
                            value.institute_name +
                            "</option>"
                    );
                });
            },
        });

        $("#save_edu_institute-" + i).on("click", function () {
            var idData = $(this).attr("value");
            var institute_name = $("#inst_name-" + idData).val();
            $.ajax({
                url: "ajax-store-institute/" + institute_name,
                type: "GET",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                dataType: "json",
                async: false,
                success: function (data) {
                    $("#inst_name-" + idData).val("");
                    $("#education_institute_id-" + idData).empty();
                    $("#education_institute_id-" + idData).append(
                        "<option>Select Institute</option>"
                    );
                    $.each(data, function (key, value) {
                        $("#education_institute_id-" + idData).append(
                            "<option value=" +
                                value.id +
                                ">" +
                                value.institute_name +
                                "</option>"
                        );
                    });
                },
            });
        });

        $.ajax({
            url: "ajax-get-edu-level",
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            async: false,
            success: function (data) {
                $("#education_level_id-" + i).empty();
                $("#education_level_id-" + i).append(
                    "<option>Select Level</option>"
                );
                $.each(data, function (key, value) {
                    $("#education_level_id-" + i).append(
                        "<option value=" +
                            value.id +
                            ">" +
                            value.level_name +
                            "</option>"
                    );
                });
            },
        });
        $("#save_edu_level-" + i).on("click", function () {
            var idData = $(this).attr("value");
            var level_name = $("#level_name-" + idData).val();
            $.ajax({
                url: "ajax-store-edu-level/" + level_name,
                type: "GET",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                dataType: "json",
                async: false,
                success: function (data) {
                    $("#level_name-" + idData).val("");
                    $("#education_level_id-" + idData).empty();
                    $("#education_level_id-" + idData).append(
                        "<option>Select Level</option>"
                    );
                    $.each(data, function (key, value) {
                        $("#education_level_id-" + idData).append(
                            "<option value=" +
                                value.id +
                                ">" +
                                value.level_name +
                                "</option>"
                        );
                    });
                },
            });
        });

        $.ajax({
            url: "ajax-get-board",
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            async: false,
            success: function (data) {
                $("#education_board_universities_id-" + i).empty();
                $("#education_board_universities_id-" + i).append(
                    "<option>Select Board/University</option>"
                );
                $.each(data, function (key, value) {
                    $("#education_board_universities_id-" + i).append(
                        "<option value=" +
                            value.id +
                            ">" +
                            value.board_university_name +
                            "</option>"
                    );
                });
            },
        });
        $("#save_board_university-" + i).on("click", function () {
            var idData = $(this).attr("value");
            var board_university_name = $(
                "#board_university_name-" + idData
            ).val();
            $.ajax({
                url: "ajax-store-board/" + board_university_name,
                type: "GET",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                dataType: "json",
                async: false,
                success: function (data) {
                    $("#board_university_name-" + idData).val("");
                    $("#education_board_universities_id-" + idData).empty();
                    $("#education_board_universities_id-" + idData).append(
                        "<option>Select Board/University</option>"
                    );
                    $.each(data, function (key, value) {
                        $("#education_board_universities_id-" + idData).append(
                            "<option value=" +
                                value.id +
                                ">" +
                                value.board_university_name +
                                "</option>"
                        );
                    });
                },
            });
        });

        i = i + 1;
    });

    //Multi Profession Form Form
    var j = 50;
    $.ajax({
        url: "ajax-get-company",
        type: "GET",
        data: {
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        async: false,
        success: function (data) {
            $("#company_name").empty();
            $("#company_name").append("<option>Select Company</option>");
            $.each(data, function (key, value) {
                $("#company_name").append(
                    "<option value=" + value.id + ">" + value.name + "</option>"
                );
            });
        },
    });
    $.ajax({
        url: "ajax-get-company-type",
        type: "GET",
        data: {
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        async: false,
        success: function (data) {
            $("#inst_type_id").empty();
            $("#inst_type_id").append("<option>Select Company Type</option>");
            $.each(data, function (key, value) {
                $("#inst_type_id").append(
                    "<option value=" + value.id + ">" + value.name + "</option>"
                );
            });
        },
    });
    $("#save_company").on("click", function () {
        var new_company_name = $("#new_company_name").val();
        var inst_type_id = $("#inst_type_id").val();
        var trade_lic_number = $("#trade_lic_number").val();
        var trade_lic_validity = $("#trade_lic_validity").val();
        var owners_address = $("#owners_address").val();
        var address = $("#address").val();
        var number_of_employees = $("#number_of_employees").val();
        var owners_name = $("#owners_name").val();
        var established_year = $("#established_year").val();
        var notes = $("#notes").val();
        var nature_of_business = $("#nature_of_business").val();
        $.ajax({
            url: "ajax-store-company",
            type: "POST",
            async: false,
            data: {
                _token: csrfToken,
                new_company_name: new_company_name,
                inst_type_id: inst_type_id,
                trade_lic_number: trade_lic_number,
                trade_lic_validity: trade_lic_validity,
                owners_address: owners_address,
                address: address,
                number_of_employees: number_of_employees,
                owners_name: owners_name,
                established_year: established_year,
                notes: notes,
                nature_of_business: nature_of_business,
            },
            dataType: "json",
            async: false,
            success: function (company) {
                $("#company_name").empty();
                $("#company_name").append("<option>Select Company</option>");
                $.each(company, function (key, value) {
                    $("#company_name").append(
                        "<option value=" +
                            value.id +
                            ">" +
                            value.name +
                            "</option>"
                    );
                });
                $("#new_company_name").val();
                $("#inst_type_id").val();
                $("#trade_lic_number").val();
                $("#trade_lic_validity").val();
                $("#owners_address").val();
                $("#address").val();
                $("#number_of_employees").val();
                $("#owners_name").val();
                $("#established_year").val();
                $("#notes").val();
                $("#nature_of_business").val();

                new_company_name = "";
                inst_type_id = "";
                trade_lic_number = "";
                trade_lic_validity = "";
                owners_address = "";
                address = "";
                number_of_employees = "";
                owners_name = "";
                established_year = "";
                notes = "";
                nature_of_business = "";
            },
        });
    });

    $("#add_prof_record").on("click", function () {
        var prof_html = "";
        prof_html += '<tr id="prof-card-' + j + '">';
        prof_html += "<td>";
        prof_html += '<div class="card">';
        prof_html += '<div class="card-body">';
        prof_html += '<div class="row pt-3">';
        prof_html += '<div class="col-md-4">';
        prof_html +=
            '<label for="company_name" class="form-label">Company Name<sup class="text-danger">*</sup></label>';
        prof_html +=
            '<select  name="company_name[]" id="company_name-' +
            j +
            '" class="form-control">';
        prof_html += "</select>";

        prof_html += "</div>";
        prof_html += '<div class="col-md-2">';
        prof_html +=
            '<button style="margin-top:32px;" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#AddCompanyModal-' +
            j +
            '">';
        prof_html += '<i class="bi bi-plus-circle-fill"></i>';
        prof_html += "</button>";
        prof_html += "</div>";
        prof_html += '<div class="col-md-6">';
        prof_html +=
            '<label for="position" class="form-label">Position<sup class="text-danger">*</sup></label>';
        prof_html +=
            '<input  name="position[]" placeholder="Position" type="text" class="form-control" id="position1">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-6">';
        prof_html +=
            '<label for="joined_year" class="form-label">Joining Date / Year <sup class="text-danger">*</sup></label>';
        prof_html +=
            '<input  name="joined_year[]" placeholder="Joined At" type="text" class="form-control" id="joined_year">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-6">';
        prof_html +=
            '<label for="retirement_year" class="form-label">Retirement Date / Year </label>';
        prof_html +=
            '<input name="retirement_year[]" placeholder="Retirement Date / Year" type="text" class="form-control" id="retirement_year">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-12">';
        prof_html +=
            '<div id="cancel_prof" value="' +
            j +
            '" style="margin-left:80%; margin-top:35px;" class="btn btn-danger"><i class="bi bi-x"></i> Remove</div>';
        prof_html += "</div>";
        prof_html += "</div>";
        prof_html += "</div>";
        prof_html += "</div>";
        prof_html +=
            '<div class="modal fade" id="AddCompanyModal-' +
            j +
            '" tabindex="-1" aria-labelledby="AddCompanyModal-' +
            j +
            '" aria-hidden="true">';
        prof_html += '<div class="modal-dialog modal-xl">';
        prof_html += '<div class="modal-content">';
        prof_html += '<div class="modal-header">';
        prof_html +=
            '<h1 class="modal-title fs-5" id="AddCompanyModal-' +
            j +
            '">New Company</h1>';
        prof_html +=
            '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
        prof_html += "</div>";
        prof_html += '<div class="modal-body">';
        prof_html += '<div class="row">';
        prof_html += '<div class="col-md-4 mb-3">';
        prof_html +=
            '<label class="mb-2" for="company_name">Company Name</label>';
        prof_html +=
            '<input  name="new_company" id="new_company-' +
            j +
            '" placeholder="Company Name" type="text" class="form-control">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-4 mb-3">';
        prof_html +=
            '<label class="mb-2" for="inst_type_id">Company Type</label>';
        prof_html +=
            '<select  name="inst_type_id" id="inst_type_id-' +
            j +
            '" placeholder="Company Type" type="text" class="form-control">';
        prof_html += "</select>";
        prof_html += "</div>";
        prof_html += '<div class="col-md-4 mb-3">';
        prof_html +=
            '<label class="mb-2" for="trade_lic_number">Trade License No</label>';
        prof_html +=
            '<input  name="trade_lic_number" id="trade_lic_number' +
            j +
            '" placeholder="Trade License" type="text" class="form-control">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-4 mb-3">';
        prof_html +=
            '<label class="mb-2" for="trade_lic_validity">Trade License Validity</label>';
        prof_html +=
            '<input  name="trade_lic_validity" id="trade_lic_validity' +
            j +
            '" type="date" class="form-control">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-4 mb-3">';
        prof_html +=
            '<label class="mb-2" for="established_year">Established Year</label>';
        prof_html +=
            '<input  name="established_year" id="established_year' +
            j +
            '" placeholder="Trade License" type="month" class="form-control">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-4 mb-3">';
        prof_html +=
            '<label class="mb-2" for="owners_name">Owner\'s Name</label>';
        prof_html +=
            '<input  name="owners_name" id="owners_name' +
            j +
            '" placeholder="Owner\'s Name" type="text" class="form-control">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-4 mb-3">';
        prof_html +=
            '<label class="mb-2" for="number_of_employees">No of Employee</label>';
        prof_html +=
            '<input  name="number_of_employees" id="number_of_employees' +
            j +
            '" placeholder="No of Employee" type="text" class="form-control">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-4 mb-3">';
        prof_html += '<label class="mb-2" for="address">Address</label>';
        prof_html +=
            '<input  name="address" id="address' +
            j +
            '" placeholder="Address" type="text" class="form-control">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-4 mb-3">';
        prof_html +=
            '<label class="mb-2" for="owners_address">Owner\'s Address</label>';
        prof_html +=
            '<input  name="owners_address" id="owners_address' +
            j +
            '" placeholder="Owner\'s Address" type="text" class="form-control">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-4 mb-3">';
        prof_html +=
            '<label class="mb-2" for="nature_of_business">Nature of Business</label>';
        prof_html +=
            '<input  name="nature_of_business" id="nature_of_business' +
            j +
            '" placeholder="Nature of Business" type="text" class="form-control">';
        prof_html += "</div>";
        prof_html += '<div class="col-md-4 mb-3">';
        prof_html += '<label class="mb-2" for="notes">Notes</label>';
        prof_html +=
            '<input  name="notes" id="notes' +
            j +
            '" placeholder="Notes" type="text" class="form-control">';
        prof_html += "</div>";
        prof_html += "</div>";
        prof_html += "</div>";
        prof_html += '<div class="modal-footer">';
        prof_html +=
            '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
        prof_html +=
            '<button value="' +
            j +
            '" id="save_company-' +
            j +
            '" data-bs-dismiss="modal" type="button" class="btn btn-primary">Save changes</button>';
        prof_html += "</div>";
        prof_html += "</div>";
        prof_html += "</div>";
        prof_html += "</div>";
        prof_html += "</tr>";
        prof_html += "</td>";

        $("#new_prof_record").append(prof_html);

        $.ajax({
            url: "ajax-get-company",
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            async: false,
            success: function (data) {
                $("#company_name-" + j).empty();
                $("#company_name-" + j).append(
                    "<option>Select Company</option>"
                );
                $.each(data, function (key, value) {
                    $("#company_name-" + j).append(
                        "<option value=" +
                            value.id +
                            ">" +
                            value.name +
                            "</option>"
                    );
                });
            },
        });

        $.ajax({
            url: "ajax-get-company-type",
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            async: false,
            success: function (data) {
                $("#inst_type_id-" + j).empty();
                $("#inst_type_id-" + j).append(
                    "<option>Select Company Type</option>"
                );
                $.each(data, function (key, value) {
                    $("#inst_type_id-" + j).append(
                        "<option value=" +
                            value.id +
                            ">" +
                            value.name +
                            "</option>"
                    );
                });
            },
        });

        $("#save_company-" + j).on("click", function () {
            var targetJ = $(this).attr("value");
            var new_company_name = $("#new_company-" + targetJ).val();
            var inst_type_id = $("#inst_type_id" + targetJ).val();
            var trade_lic_number = $("#trade_lic_number" + targetJ).val();
            var trade_lic_validity = $("#trade_lic_validity" + targetJ).val();
            var owners_address = $("#owners_address" + targetJ).val();
            var address = $("#address" + targetJ).val();
            var number_of_employees = $("#number_of_employees" + targetJ).val();
            var owners_name = $("#owners_name" + targetJ).val();
            var established_year = $("#established_year" + targetJ).val();
            var notes = $("#notes" + targetJ).val();
            var nature_of_business = $("#nature_of_business" + targetJ).val();
            $.ajax({
                url: "ajax-store-company",
                type: "POST",
                async: false,
                data: {
                    _token: csrfToken,
                    new_company_name: new_company_name,
                    inst_type_id: inst_type_id,
                    trade_lic_number: trade_lic_number,
                    trade_lic_validity: trade_lic_validity,
                    owners_address: owners_address,
                    address: address,
                    number_of_employees: number_of_employees,
                    owners_name: owners_name,
                    established_year: established_year,
                    notes: notes,
                    nature_of_business: nature_of_business,
                },
                dataType: "json",
                async: false,
                success: function (company) {
                    $("#company_name-" + targetJ).empty();
                    $("#company_name-" + targetJ).append(
                        "<option>Select Company</option>"
                    );
                    $.each(company, function (key, value) {
                        $("#company_name-" + targetJ).append(
                            "<option value=" +
                                value.id +
                                ">" +
                                value.name +
                                "</option>"
                        );
                    });
                    $("#new_company-" + targetJ).val();
                    $("#inst_type_id" + targetJ).val();
                    $("#trade_lic_number" + targetJ).val();
                    $("#trade_lic_validity" + targetJ).val();
                    $("#owners_address" + targetJ).val();
                    $("#address" + targetJ).val();
                    $("#number_of_employees" + targetJ).val();
                    $("#owners_name" + targetJ).val();
                    $("#established_year" + targetJ).val();
                    $("#notes" + targetJ).val();
                    $("#nature_of_business" + targetJ).val();
                },
            });
        });

        $(".ProfClickAction").on("click", "#cancel_prof", function () {
            var value = $(this).attr("value");
            $("#prof-card-" + value).empty();
        });

        j = j + 1;
    });
});
