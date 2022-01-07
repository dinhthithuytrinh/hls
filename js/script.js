$(document).ready(function () {
    $("#fldCN").hide();

    $("#btnNext").click(function (e) {
        $("#fldTK").hide();
        $("#fldCN").show();
        $("#txtHoTen").focus();
    });

    $("#btnPrevious").click(function (e) {
        $("#fldTK").show();
        $("#fldCN").hide();
        $("#txtTenTK").focus();
    });

    $("#lblDangKi").click(function (e) {
        $("#txtTenTK").val("huuphuoc29791");
        $("#txtMK").val("123456");
        $("#txtMK2").val("123456");
        $("#txtEmail").val("huuphuoc29791@gmail.com");
        $("#txtHoTen").val("Dương Hữu Phước");
        $("#txtSDT").val("0905939947");
        $("#txtDiaChi").val("Tp.HCM");
    });

    $("#lblDangNhap").click(function (e) {
        $("#txtTenTK").val("huuphuoc29791");
        $("#txtMK").val("123456");
    });
});