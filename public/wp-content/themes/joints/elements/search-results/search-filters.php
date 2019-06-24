<div class="search-filter-container" v-bind:class="{ 'open': mobile_filter_menu_visible }">
    <div class="search-filter-options-container">
        
        <div class="search-filter-option-container">
            <p class="bold dark-gray search-filter-text margin-bottom-0 margin-right-20">Term Length</p>
            <a class="flex-container justify-space-between search-filter-text dark-blue bold" href="#" data-toggle="example-dropdown">{{filters.term_length || 'Selection'}}</a>
            <div class="dropdown-pane" id="example-dropdown" data-dropdown data-close-on-click="true" data-close-on-click="true" data-v-offset="5">
                <ul class="menu submenu vertical">
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectTermLength(null)"><a href="#">Any Term Length</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectTermLength('1 Week')"><a href="#">1 week</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectTermLength('2 Weeks')"><a href="#">2 weeks</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectTermLength('4 Weeks')"><a href="#">4 weeks</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectTermLength('6 Weeks')"><a href="#">6 weeks</a></li>
                </ul>
            </div>
        </div>

        <div class="search-filter-option-container">
            <p class="bold dark-gray search-filter-text margin-bottom-0 margin-right-20">Month</p>
            <a class="flex-container justify-space-between search-filter-text dark-blue bold" href="#" data-toggle="example-dropdown1">{{filters.month || 'Selection'}}</a>
            <div class="dropdown-pane" id="example-dropdown1" data-dropdown data-close-on-click="true" data-v-offset="5">
                <ul class="menu submenu vertical">
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth(null)"><a href="#">Any Month</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('January')"><a href="#">January</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('February')"><a href="#">February</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('March')"><a href="#">March</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('April')"><a href="#">April</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('May')"><a href="#">May</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('June')"><a href="#">June</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('July')"><a href="#">July</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('August')"><a href="#">August</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('September')"><a href="#">September</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('October')"><a href="#">October</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('November')"><a href="#">November</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectMonth('December')"><a href="#">December</a></li>
                </ul>
            </div>
        </div>

        <div class="search-filter-option-container">
            <p class="bold dark-gray search-filter-text margin-bottom-0 margin-right-20">Kamp</p>
            <a class="flex-container justify-space-between search-filter-text dark-blue bold" href="#" data-toggle="example-dropdown2">{{filters.kamp_name || 'Selection'}}</a>
            <div class="dropdown-pane" id="example-dropdown2" data-dropdown data-close-on-click="true" data-v-offset="5">
                <ul class="menu submenu vertical">
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectKamp(null)"><a href="#">All Kamps</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectKamp('K-Kauai')"><a href="#">K-Kauai</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectKamp('K-Seven')"><a href="#">K-Seven</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectKamp('K-2')"><a href="#">K-2</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectKamp('K-West')"><a href="#">K-West</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectKamp('K-1')"><a href="#">K-1</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectKamp('K-Kountry')"><a href="#">K-Kountry</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectKamp('K-Worldview Kamp')"><a href="#">K-Worldview Kamp</a></li>
                    <li class="kamp-type-dropdown-option-item" v-on:click="selectKamp('K-KampOut!')"><a href="#">K-KampOut!</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="search-filter-form-elements-container">

        <div class="search-filter-form-container">
            <div class="checkbox-container show-for-medium">
                <input id="hide-full-terms" type="checkbox" v-model="filters.hide_full_terms" @change="toggleEventsVisibility()"><label for="hide-full-terms">Hide Full Terms</label>
            </div>
        </div>
        <div class="search-filter-form-container align-right"><a class="clear-all-button" @click.prevent="clearAllFilters()">Clear All</a></div>

    </div>
</div>