$(document).ready(function () {
    var district = 29; // put District Id here
    var thana = 252; // put Thana id here
    var union = 1; // put Union Id here
    $.ajax({
        url: "/getDis/" + district,
        type: "get",
        data: {
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, value) {
                $("#district").append(
                    '<option value="' +
                        value.id +
                        '">' +
                        value.dis_name +
                        "</option>"
                );
            });
            $("#ward").html('<option value="">-- Select Ward --</option>');
            $("#village").html(
                '<option value="">-- Select Village --</option>'
            );
            $("#moholla").html(
                '<option value="">-- Select Moholla --</option>'
            );
            $("#holding").html(
                '<option value="">-- Select Holding --</option>'
            );
        },
    });
    $.ajax({
        url: "/getThana/" + thana,
        type: "get",
        data: {
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, value) {
                $("#thana").append(
                    '<option value="' +
                        value.id +
                        '">' +
                        value.thana_name +
                        "</option>"
                );
            });
            $("#ward").html('<option value="">-- Select Ward --</option>');
            $("#village").html(
                '<option value="">-- Select Village --</option>'
            );
            $("#moholla").html(
                '<option value="">-- Select Moholla --</option>'
            );
            $("#holding").html(
                '<option value="">-- Select Holding --</option>'
            );
        },
    });
    $.ajax({
        url: "/getUnion/" + union,
        type: "get",
        data: {
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, value) {
                $("#union").append(
                    '<option value="' +
                        value.id +
                        '">' +
                        value.uni_name +
                        "</option>"
                );
            });
            $("#ward").html('<option value="">-- Select Ward --</option>');
            $("#village").html(
                '<option value="">-- Select Village --</option>'
            );
            $("#moholla").html(
                '<option value="">-- Select Moholla --</option>'
            );
            $("#holding").html(
                '<option value="">-- Select Holding --</option>'
            );
        },
    });
    $.ajax({
        url: "/getWard/" + union,
        type: "get",
        data: {
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        success: function (data) {
            $("#ward").html('<option value="">-- Select Ward --</option>');
            $.each(data, function (key, value) {
                $("#ward").append(
                    '<option value="' +
                        value.id +
                        '">' +
                        value.ward_name +
                        "</option>"
                );
            });
            $("#village").html(
                '<option value="">-- Select Village --</option>'
            );
            $("#moholla").html(
                '<option value="">-- Select Moholla --</option>'
            );
            $("#holding").html(
                '<option value="">-- Select Holding --</option>'
            );
        },
    });
    $("#ward").on("change", function () {
        var union = $(this).val();
        $.ajax({
            url: "/getVillage/" + union,
            type: "get",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function (data) {
                $("#village").html(
                    '<option value="">-- Select Village --</option>'
                );
                $.each(data, function (key, value) {
                    $("#village").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.village_name +
                            "</option>"
                    );
                });
                $("#moholla").html(
                    '<option value="">-- Select Moholla --</option>'
                );
                $("#holding").html(
                    '<option value="">-- Select Holding --</option>'
                );
            },
        });
    });
    $("#village").on("change", function () {
        var village = $(this).val();
        $.ajax({
            url: "/getMoholla/" + village,
            type: "get",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function (data) {
                $("#moholla").html(
                    '<option value="">-- Select Moholla --</option>'
                );
                $.each(data, function (key, value) {
                    $("#moholla").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.moholla_name +
                            "</option>"
                    );
                });
                $("#holding").html(
                    '<option value="">-- Select Holding --</option>'
                );
            },
        });
    });
    $("#moholla").on("change", function () {
        var moholla = $(this).val();
        $.ajax({
            url: "/getHold/" + moholla,
            type: "get",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function (data) {
                $("#holding").html(
                    '<option value="">-- Select Holding --</option>'
                );
                $.each(data, function (key, value) {
                    $("#holding").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.hold_name +
                            "</option>"
                    );
                });
            },
        });
    });
});

// <--- This script is for national use and union controller relationship attribute will be checked for national use -->
// $(document).ready(function () {
//     $('#division').on('change', function() {
//         var idDivision = $(this).val();
//         // console.log(idDivision);
//         // $("#district").html('');
//         $.ajax({
//             url: '/getDis/'+idDivision,
//             type: "get",
//             data: {
//                 _token: '{{ csrf_token() }}'
//             },
//             dataType: 'json',
//             success: function (data) {
//                 $('#district').html('<option value="">-- Select District --</option>');
//                 $.each(data, function (key, value) {
//                     $("#district").append('<option value="' + value.id + '">' + value.dis_name + '</option>');
//                 });
//                 $('#thana').html('<option value="">-- Select Thana --</option>');
//                 $('#union').html('<option value="">-- Select Union --</option>');
//                 $('#ward').html('<option value="">-- Select Ward --</option>');
//                 $("#village").html('<option value="">-- Select Village --</option>');
//                 $('#moholla').html('<option value="">-- Select Moholla --</option>');
//                 $('#holding').html('<option value="">-- Select Holding --</option>');
//             }
//         });
//     });
//     $('#district').on('change', function() {
//         var idDistrict = $(this).val();
//         // console.log(idDivision);
//         // $("#district").html('');
//         $.ajax({
//             url: '/getThana/'+idDistrict,
//             type: "get",
//             data: {
//                 _token: '{{ csrf_token() }}'
//             },
//             dataType: 'json',
//             success: function (data) {
//                 $('#thana').html('<option value="">-- Select Thana --</option>');
//                 $.each(data, function (key, value) {
//                     $("#thana").append('<option value="' + value.id + '">' + value.thana_name + '</option>');
//                 });
//                 $('#union').html('<option value="">-- Select Union --</option>');
//                 $('#ward').html('<option value="">-- Select Ward --</option>');
//                 $("#village").html('<option value="">-- Select Village --</option>');
//                 $('#moholla').html('<option value="">-- Select Moholla --</option>');
//                 $('#holding').html('<option value="">-- Select Holding --</option>');
//             }
//         });
//     });
//     $('#thana').on('change', function() {
//         var thana = $(this).val();
//         $.ajax({
//             url: '/getUnion/'+thana,
//             type: "get",
//             data: {
//                 _token: '{{ csrf_token() }}'
//             },
//             dataType: 'json',
//             success: function (data) {
//                 // console.log(data);
//                 $('#union').html('<option value="">-- Select Union --</option>');
//                 $.each(data, function (key, value) {
//                     $("#union").append('<option value="' + value.id + '">' + value.uni_name + '</option>');
//                 });
//                 $('#ward').html('<option value="">-- Select Ward --</option>');
//                 $("#village").html('<option value="">-- Select Village --</option>');
//                 $('#moholla').html('<option value="">-- Select Moholla --</option>');
//                 $('#holding').html('<option value="">-- Select Holding --</option>');
//             }
//         });
//     });
//     $('#union').on('change', function() {
//         var union = $(this).val();
//         $.ajax({
//             url: '/getWard/'+union,
//             type: "get",
//             data: {
//                 _token: '{{ csrf_token() }}'
//             },
//             dataType: 'json',
//             success: function (data) {
//                 // console.log(data);
//                 $('#ward').html('<option value="">-- Select Ward --</option>');
//                 $.each(data, function (key, value) {
//                     $("#ward").append('<option value="' + value.id + '">' + value.ward_name + '</option>');
//                 });
//                 $("#village").html('<option value="">-- Select Village --</option>');
//                 $('#moholla').html('<option value="">-- Select Moholla --</option>');
//                 $('#holding').html('<option value="">-- Select Holding --</option>');
//             }
//         });
//     });
//     $('#ward').on('change', function() {
//         var union = $(this).val();
//         $.ajax({
//             url: '/getVillage/'+union,
//             type: "get",
//             data: {
//                 _token: '{{ csrf_token() }}'
//             },
//             dataType: 'json',
//             success: function (data) {
//                 $('#village').html('<option value="">-- Select Village --</option>');
//                 $.each(data, function (key, value) {
//                     $("#village").append('<option value="' + value.id + '">' + value.village_name + '</option>');
//                 });
//                 $('#moholla').html('<option value="">-- Select Moholla --</option>');
//                 $('#holding').html('<option value="">-- Select Holding --</option>');
//             }
//         });
//     });
//     $('#village').on('change', function() {
//         var village = $(this).val();
//         $.ajax({
//             url: '/getMoholla/'+village,
//             type: "get",
//             data: {
//                 _token: '{{ csrf_token() }}'
//             },
//             dataType: 'json',
//             success: function (data) {
//                 $('#moholla').html('<option value="">-- Select Moholla --</option>');
//                 $.each(data, function (key, value) {
//                     $("#moholla").append('<option value="' + value.id + '">' + value.moholla_name + '</option>');
//                 });
//                 $('#holding').html('<option value="">-- Select Holding --</option>');

//             }
//         });

//     });
//     $('#moholla').on('change', function() {
//         var moholla = $(this).val();
//         $.ajax({
//             url: '/getHold/'+moholla,
//             type: "get",
//             data: {
//                 _token: '{{ csrf_token() }}'
//             },
//             dataType: 'json',
//             success: function (data) {
//                 $('#holding').html('<option value="">-- Select Holding --</option>');
//                 $.each(data, function (key, value) {
//                     $("#holding").append('<option value="' + value.id + '">' + value.hold_name + '</option>');
//                 });

//             }
//         });

//     });
// });
