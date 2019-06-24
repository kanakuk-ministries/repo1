// var app = new Vue({
//   el: "#search-results",
//   data: {
//     kamps: kamps,
//     filters: {
//       term_length: null, //'2 Weeks', // null,
//       month: "April",
//       kamp_name: null,
//       hide_full_terms: null
//     }
//   },
//   methods: {
//     clearAllFilters: function() {
//       this.filters = {
//         term_length: null,
//         month: null,
//         kamp_name: null,
//         hide_full_terms: null
//       };
//     },
//     isVisible: function(row) {
//       let visible = true;

//       // term length filter
//       if (this.filters.term_length) {
//         let term_length = row.Days / 7 + " Weeks";
//         visible = visible && term_length === this.filters.term_length;
//       }

//       if (visible && this.filters.month) {
//         visible = visible && row.Month === this.filters.month;
//       }

//       if (visible && this.filters.kamp_name) {
//         visible = visible && row.KampName === this.filters.kamp_name;
//       }

//       if (visible && this.filters.hide_full_terms) {
//         visible = visible && row.PercentFull < 100;
//       }

//       return visible;
//     }
//   }
// });

// (function($) {
//   // $("#search-filter-month-tooltip").html('fart');
//   // $("#search-filter-month-tooltip").foundation('open');
// })(jQuery);
