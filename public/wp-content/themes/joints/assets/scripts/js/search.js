jQuery(window).load(function() {
  var $ = jQuery;

  var foundationInit = function() {
    // Remove sticky functionality on mobile
    if (Foundation.MediaQuery.current == "small") {
      $(".sticky").removeAttr("data-sticky");
    }
    $(document).foundation();
  };

  // front-page search form
  if ($(".home #search-dropdown").length) {
    var searchDropdownApp = new Vue({
      el: "#search-dropdown",
      data: {
        user: kanakuk_user,
        // user: {
        //   first_name: 'Test',
        //   last_name: 'User',
        //   kampers: [
        //    {
        //       first_name: 'Ashley',
        //       last_name: 'User',
        //       id: 0,
        //       age: 9,
        //       gender: 'female'
        //    },
        //    {
        //       first_name: 'Gemini',
        //       last_name: 'User',
        //       id: 1,
        //       age: 6,
        //       gender: 'female'
        //    },
        //    {
        //       first_name: 'Cindy',
        //       last_name: 'User',
        //       id: 2,
        //       age: 12,
        //       gender: 'female'
        //    }
        //   ]
        // },
        options: ["Children", "Families"],
        selected_type: "",
        children_kamp: {
          added_children: {
            title: "Children",
            selection_prefix: "Child",
            min_age: 3,
            max_age: 18,
            selections: []
          }
        },
        family_kamp: {
          added_children_young: {
            title: "Children young",
            selection_prefix: "Child",
            min_age: 3,
            max_age: 18,
            selections: []
          },
          added_children_old: {
            title: "Children old",
            selection_prefix: "Child",
            min_age: 3,
            max_age: 18,
            selections: []
          },
          added_adults: {
            title: "Adults",
            selection_prefix: "Adult",
            min_age: 19,
            max_age: null,
            selections: []
          },
          added_infants: {
            title: "Infants",
            selection_prefix: "Infant",
            min_age: 0,
            max_age: 2,
            selections: []
          }
        },
        selected_kamp: {},
        age_dropdown_open: false,
        title: "WELCOME"
      },
      mounted: function() {
        foundationInit();
      },
      watch: {
        selected_type: function(val) {
          this.selected_kamp =
            val === "Children" ? this.children_kamp : this.family_kamp;
        }
      },
      created: function() {
        this.selectKampType("Children");
      },
      methods: {
        range: function(start, end) {
          return new Array(end - start + 1)
            .fill(undefined)
            .map((_, i) => i + start);
        },
        checkForSelections: function() {
          if (this.selected_type === "Children") {
            return !this.children_kamp.added_children.selections.length;
          } else if (this.selected_type === "Families") {
            return (
              !this.family_kamp.added_children_young.selections.length &&
              !this.family_kamp.added_children_old.selections.length &&
              !this.family_kamp.added_infants.selections.length &&
              !this.family_kamp.added_adults.selections.length
            );
          } else {
            return true;
          }
        },
        selectKampType: function(type) {
          if (type === "Children") {
            this.selected_type = type;
          } else {
            $('#kamp-type-family-modal').foundation('open');
          }
          if ($("#kamp-type-dropdown.is-open").length) {
            $("#kamp-type-dropdown").foundation("close");
          }
        },
        addKamper: function(value) {
          value.selections.push({ age: 0, gender: null });
        },
        selectKamper: function(value, kamper) {
          var existing_kamper_index = value.selections.findIndex(function(
            selection,
            index
          ) {
            return selection.id && selection.id === kamper.id;
          });

          if (existing_kamper_index > -1) {
            value.selections.splice(existing_kamper_index, 1);
          } else {
            value.selections.push(kamper);
          }
        },
        removeKamper: function(value) {
          if (value.selections.length) {
            value.selections.splice(-1, 1);
          }
        },
        isValid: function(selected_kamp) {
          var all_selections = Object.keys(selected_kamp).map(function(key) {
            var selections = selected_kamp[key].selections;
            return selections;
          });
          var kampers_selected = [].concat.apply([], all_selections);

          var selection_valid = this.selected_type && this.selected_type !== "";
          var ages_invalid = kampers_selected.some(function(kamper) {
            return kamper.age < 3 || kamper.age > 18;
          });

          if (selection_valid && !ages_invalid && kampers_selected.length > 0) {
            return true;
          }
        },
        handleSubmit: function() {
          // the wordpress action to use
          this.$data.action = "kan_search";

          jQuery.post("/wp-admin/admin-post.php", this.$data, function() {
            window.location = "/search-results?tab=0";
          });
        }
      }
    });
  }

  // search results page filters
  else if ($("#search-results").length) {
    var app = new Vue({
      el: "#search-results",
      data: {
        kamps: kamps,
        filters: {
          term_length: null, // "2 Weeks", // null,
          month: null, //'April',
          kamp_name: null,
          hide_full_terms: false
        },
        mobile_filter_menu_visible: false
      },
      mounted: function() {
        foundationInit();
      },
      methods: {
        moment: function(date) {
          return moment(date);
        },
        // called when the user wishes to clear search filters
        clearAllFilters: function() {
          this.filters = {
            term_length: null,
            month: null,
            kamp_name: null,
            hide_full_terms: false
          };
          this.toggleEventsVisibility();
        },
        selectMonth: function(month) {
          this.filters.month = month;
          this.toggleEventsVisibility();
        },
        selectKamp: function(kamp_name) {
          this.filters.kamp_name = kamp_name;
          this.toggleEventsVisibility();
        },
        selectTermLength: function(term_length) {
          this.filters.term_length = term_length;
          this.toggleEventsVisibility();
        },
        // this is leveraged by the computed property 'filtered_kamps' to decide if a kamp should currently be shown/hidden
        isVisible: function(row) {
          var visible = true;

          // term length filter
          if (this.filters.term_length) {
            var term_length = Math.ceil(row.Nights / 7);
            term_length += term_length == 1 ? ' Week' : ' Weeks';
            visible = visible && term_length === this.filters.term_length;
          }

          if (visible && this.filters.month) {
            visible = visible && row.Month === this.filters.month;
          }

          if (visible && this.filters.kamp_name) {
            visible = visible && row.KampName === this.filters.kamp_name;
          }

          if (visible && this.filters.hide_full_terms) {
            visible = visible && row.PercentFull < 100;
          }

          return visible;
        },
        toggleMobileFilterMenu: function() {
          this.mobile_filter_menu_visible = !this.mobile_filter_menu_visible;
        },
        toggleEventsVisibility: function() {
          for (key in this.kamps) {
            var visible_count = 0;
            for (var i = 0; i < this.kamps[key].circuitree.length; i++) {
              if (this.isVisible(this.kamps[key].circuitree[i])) {
                visible_count++;
                this.kamps[key].circuitree[i].visible = true;
              } else {
                this.kamps[key].circuitree[i].visible = false;
              }
            }
            if (visible_count === 0) {
              this.kamps[key].visible = false;
            } else {
              this.kamps[key].visible = true;
            }
          }
        }
      }
    });
  } 
  
  // faq page search filtering
  else if ($("#faqs-container").length) {
    var app = new Vue({
      el: "#faqs-container",
      data: {
        faqs: faqs,
        selected_category: "General",
        search_query: "",
        mobile_menu_open: false
      },
      computed: {
        faq_categories: function() {
          var categories = this.faqs.map(function(faq) {
            return faq.question_categories;
          });
          categories = [].concat.apply([], categories);
          categories = categories.filter(function(cat, index, self) {
            return self.indexOf(cat) === index;
          });
          return categories;
        },
        selected_category_faqs: function() {
          return this.category_faqs(this.selected_category, this.search_query);
        },
        visible_faqs: function() {
          return this.get_visible_faqs(
            this.selected_category,
            this.search_query
          );
        }
      },
      watch: {
        search_query: function(newVal) {
          this.faq_search(newVal);
        }
      },
      mounted: function() {
        // Remove sticky functionality on mobile
        if (Foundation.MediaQuery.current == "small") {
          jQuery(".sticky").removeAttr("data-sticky");
        }
        jQuery(document).foundation();
      },
      methods: {
        clearSearch: function() {
          this.search_query = "";
        },
        faq_search: function(query) {
          if (query === "" || !query) {
            return null;
          }

          var results = this.faqs.filter(function(faq) {
            if (
              faq.question &&
              faq.question.toLowerCase().indexOf(query.toLowerCase()) > -1
            ) {
              return faq;
            } else if (
              faq.answer &&
              faq.answer.toLowerCase().indexOf(query.toLowerCase()) > -1
            ) {
              return faq;
            }
          });

          return results;

          // jQuery.ajax({
          //   type: "POST",
          //   url: "/wp-admin/admin-ajax.php",
          //   dataType: "json",
          //   data: {
          //     action: "get_faq_search",
          //     query: this.search_query
          //   },
          //   success: function(response) {
          //     this.selected_category = null;
          //     console.log("RESPONSE", response);
          //     this.faqs = response.data.faqs[0];
          //   }
          // });
        },
        category_search: function(category, query) {
          if (query) {
            return null;
          }

          var filtered_faqs = [];
          if (category) {
            filtered_faqs = this.faqs.filter(function(f) {
              return f.question_categories.indexOf(category) > -1;
            });
          } else {
            filtered_faqs = this.faqs;
          }

          return filtered_faqs;
        },
        get_visible_faqs: function(category, query) {
          if (query && query.trim() !== "") {
            return this.faq_search(query);
          } else {
            return this.category_search(category, query);
          }
        },
        get_results: function(query) {
          return this.faq_search(query);
        },
        category_faqs: function(category, query) {
          if (query) {
            return null;
          }

          var filtered_faqs = [];
          if (category) {
            filtered_faqs = this.faqs.filter(function(f) {
              return f.question_categories.indexOf(category) > -1;
            });
          } else {
            filtered_faqs = this.faqs;
          }

          return filtered_faqs;
        },
        select_category: function(category) {
          this.selected_category = category;
          this.mobile_menu_open = false;
        },
        open_mobile_menu: function() {
          this.mobile_menu_open = !this.mobile_menu_open;
        }
      }
    });
  } 
  
  // my kanakuk page
  else if ($("#my-kan-container").length) {
    var app = new Vue({
      el: "#my-kan-container",
      data: {
        calendar_kamper: "All Kampers",
        calendar_length: "3 Days",
        today: new Date()
      },
      mounted: function() {
        // Remove sticky functionality on mobile
        if (Foundation.MediaQuery.current == "small") {
          jQuery(".sticky").removeAttr("data-sticky");
        }
        jQuery(document).foundation();
        // Get tabs container height
        this.getHeight();
      },
      methods: {
        getHeight: function() {
          var topHeight = 385;
          var height = this.$refs.tabContainer.clientHeight;
          var bottomHeight = height - topHeight;
          var accountBalanceCardHeight =
            this.$refs.accountBalanceCard.clientHeight + 30;
          var calendarSelectHeight =
            this.$refs.myKanCalendarSelectContainer.clientHeight + 40;
          var calendarHeight =
            bottomHeight - (accountBalanceCardHeight + calendarSelectHeight);
          var element = $("#my-kan-calendar-container");
          element.css("max-height", calendarHeight);
        },
        moment: function(date) {
          return moment(date);
        },
        selectCalendarKamper: function(kamper) {
          this.calendar_kamper = kamper;
        },
        selectCalendarLength: function(length) {
          this.calendar_length = length;
        }
      }
    });
  } 
  
  // initialize foundation
  else {
    foundationInit();
  }
});
