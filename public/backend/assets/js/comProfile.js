$(document).ready(function () {
    $(document).on("click", "#comProfile", function () {
        var getdata = $(this).attr("at");
        // console.log(getdata);
        $.ajax({
            type: "get",
            url: "committee-view-profile/" + getdata,
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    $(".com_name").text(response.getCommitteedata.com_name);
                    $(".head_of_committee").text(
                        response.getCommitteedata.head_of_comm
                    );
                    $(".number_of_member").text(
                        response.getCommitteedata.no_of_members
                    );
                    $(".committee_type").text(response.getComType.type_name);
                    $(".est_date").text(response.getCommitteedata.est_date);
                    $(".valid_till").text(response.getCommitteedata.valid_till);
                    $(".unionName").text(response.getUnion.uni_name);

                    if (response.getCommitteedata.ward_id == null) {
                        $(".ward_name").text("N/A");
                        $(".ward_name").addClass("text-danger");
                    } else {
                        $(".ward_name").removeClass("text-danger");
                        $(".ward_name").text(response.getWard.ward_name);
                        $(".ward_name").addClass("text-primary");
                    }
                    if (response.getCommitteedata.is_active == 0) {
                        $(".status").text("Not Active");
                        $(".status").addClass("text-danger");
                    } else {
                        $(".status").removeClass("text-danger");
                        $(".status").addClass("text-success");
                        $(".status").text("Active");
                    }
                    var count = 1;
                    $(".com_member").empty();
                    $.each(response.getComMemberData, function (key, item) {
                        $(".com_member").append(
                            '<div class="col-lg-3 col-md-4 label">' +
                                count +
                                '</div>\
                            <div class="col-lg-9 col-md-8 ">' +
                                item.members_name +
                                "</div>"
                        );
                        count++;
                    });

                    // console.log(response.getComMemberData);
                }
            },
        });
    });
});
