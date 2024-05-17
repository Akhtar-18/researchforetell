$(function () {
  var $table = $("#bootstrap-table-example");
  var $remove = $("#bootstrap-table-remove");
  var selections = [];

  function getIdSelections() {
    return $.map($table.bootstrapTable("getSelections"), function (row) {
      return row.id;
    });
  }

  $table.bootstrapTable({
    height: 500,
    iconsPrefix: "opacity-75 ion",
    icons: {
      paginationSwitchDown: "ion-ios-arrow-down icon-chevron-down",
      paginationSwitchUp: "ion-ios-arrow-up icon-chevron-up",
      refresh: "ion-md-refresh icon-refresh",
      columns: "ion-md-apps icon-th",
      detailOpen: "ion-md-add icon-plus",
      detailClose: "ion-md-remove icon-minus",
      export: "ion-md-cloud-download icon-share",
    },
  });
});
